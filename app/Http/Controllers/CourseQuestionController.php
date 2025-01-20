<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseAnswer;
use App\Models\CourseQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class CourseQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        //
        $students = $course->students()->orderBy('id','DESC')->get();
        return view('admin.questions.create', [
            'course'=> $course,
            'students' => $students
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        //
        try {
            $request->validate([
                'question.image' => 'image|max:3000|mimes:png,jpg,jpeg,svg',
                'answers.*.type' => 'string|in:text,image',
                'answers.*.score' => 'integer|min:0|max:100',
                'answers.*.image' => 'image|max:3000|mimes:png,jpg,jpeg,svg',
            ]);

            DB::beginTransaction();

            $questionData = [
                'number' => $request->input('question.number'),
                'type' => $request->input('question.type'),
                'course_id' => $course->id,
            ];

            // Simpan file gambar untuk question jika ada
            if ($request->hasFile('question.image')) {
                $imagePath = $request->file('question.image')->store('questions', 'public_html');
                $questionData['question'] = $imagePath;
            } else {
                $questionData['question'] = $request->input('question.text');
            }

            // Menyimpan pertanyaan menggunakan relasi
            $question = $course->questions()->create($questionData);
            
            foreach ($request->input('answers') as $i => $answer) {
                $answerData = [
                    'type' => $answer['type'],
                    'score' => $answer['score'] ?? 0,
                    'course_question_id' => $question->id,
                ];

                // Cek apakah input answer adalah teks atau gambar
                if ($answer['type'] === 'image' && $request->hasFile("answers.{$i}.image")) {
                    $imagePath = $request->file("answers.{$i}.image")->store('answers', 'public_html');
                    $answerData['answer'] = $imagePath;
                } else {
                    $answerData['answer'] = $answer['text'];
                }

                CourseAnswer::create($answerData);
            }

            DB::commit();
            return redirect()->route('dashboard.courses.show', $course->id);
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!', $e->getMessage()],
            ]);
            throw $error;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseQuestion $courseQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseQuestion $courseQuestion)
    {
        //
        $course = $courseQuestion->course;
        $students = $course->students()->orderBy('id','DESC')->get();
        return view('admin.questions.edit', [
            'courseQuestion' => $courseQuestion,
            'course' => $course,
            'students' => $students
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, CourseQuestion $courseQuestion)
    {
        try {
            $request->validate([
                'question.image' => 'image|max:3000|mimes:png,jpg,jpeg,svg',
                'answers.*.type' => 'string|in:text,image',
                'answers.*.score' => 'integer|min:0|max:100',
                'answers.*.image' => 'image|max:3000|mimes:png,jpg,jpeg,svg',
            ]);
            

            DB::beginTransaction();

            // Simpan data pertanyaan yang sudah ada
            $questionData = [
                'type' => $request->input('question.type'),
                'number' => $request->input('question.number')
            ];

            // Jika ada perubahan dari image ke text atau perubahan image
            if ($request->input('question.type') === 'text') {
                if ($courseQuestion->type === 'image' && $courseQuestion->question) {
                    // Hapus image lama dari storage
                    Storage::delete($courseQuestion->question);
                }
                $questionData['question'] = $request->input('question.text');
            } elseif ($request->hasFile('question.image')) {
                // Jika ada file image baru, hapus image lama
                if ($courseQuestion->type === 'image' && $courseQuestion->question) {
                    Storage::delete($courseQuestion->question);
                }
                $imagePath = $request->file('question.image')->store('questions', 'public_html');
                $questionData['question'] = $imagePath;
            }

            // Update pertanyaan
            $courseQuestion->update($questionData);

            // Update jawaban
            foreach ($request->input('answers') as $i => $answer) {
                $answerModel = $courseQuestion->answers[$i];
                $answerData = [
                    'type' => $answer['type'],
                    'score' => $answer['score'] ?? 0,
                ];

                // Jika ada perubahan dari image ke text atau perubahan image
                if ($answer['type'] === 'text') {
                    if ($answerModel->type === 'image' && $answerModel->answer) {
                        // Hapus image lama dari storage
                        Storage::delete($answerModel->answer);
                    }
                    $answerData['answer'] = $answer['text'];
                } elseif ($request->hasFile("answers.{$i}.image")) {
                    if ($answerModel->type === 'image' && $answerModel->answer) {
                        // Hapus image lama dari storage
                        Storage::delete($answerModel->answer);
                    }
                    $imagePath = $request->file("answers.{$i}.image")->store('answers', 'public_html');
                    $answerData['answer'] = $imagePath;
                }

                // Update jawaban
                $answerModel->update($answerData);
            }

            DB::commit();
            return redirect()->route('dashboard.courses.show', $courseQuestion->course_id);

        } catch (\Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                'system_error' => ['System error!', $e->getMessage()],
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseQuestion $courseQuestion)
    {
        // Begin a database transaction
        DB::beginTransaction();

        try {
            // Check if the question has an image and delete it from storage
            if ($courseQuestion->type === 'image' && $courseQuestion->question) {
                Storage::disk('public_html')->delete($courseQuestion->question);
            }

            // Get all answers related to this question
            $answers = $courseQuestion->answers;

            // Loop through the answers and delete images if the answer type is image
            foreach ($answers as $answer) {
                if ($answer->type === 'image' && $answer->answer) {
                    Storage::disk('public_html')->delete($answer->answer);
                }
            }

            // Delete the question and all related answers
            $courseQuestion->answers()->delete();
            $courseQuestion->delete();

            // Commit the transaction
            DB::commit();

            // Redirect or return a success response
            return redirect()->route('dashboard.courses.show', $courseQuestion->course_id);
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            // Handle the exception and return an error response
            return redirect()->back()->withErrors(['error' => 'Failed to delete the question: ' . $e->getMessage()]);
        }
    }
}
