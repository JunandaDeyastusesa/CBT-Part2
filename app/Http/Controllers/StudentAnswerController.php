<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseAnswer;
use App\Models\CourseQuestion;
use App\Models\StudentAnswer;
// use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class StudentAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $my_courses = $user->courses()->with('category')->orderBy('id', 'DESC')->get();

        foreach ($my_courses as $course) {
            $totalQuestionsCount = $course->questions()->count();

            $answeredQuestionsCount = StudentAnswer::where('user_id', $user->id)
                ->whereHas('question', function ($query) use ($course) {
                    $query->where('course_id', $course->id);
                })->distinct()->count('course_question_id');

            if ($answeredQuestionsCount < $totalQuestionsCount) {
                $firstUnansweredQuestion = CourseQuestion::where('course_id', $course->id)
                    ->whereNotIn('id', function ($query) use ($user) {
                        $query->select('course_question_id')->from('student_answers')
                            ->where('user_id', $user->id);
                    })->orderBy('id', 'asc')->first();

                $course->nextQuestionId = $firstUnansweredQuestion ? $firstUnansweredQuestion->id : null;
            } else {
                $course->nextQuestionId = null;
            }
        }

        return view('student.courses.learning', [
            'my_courses' => $my_courses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course, $question)
    {
        DB::beginTransaction();
    
        try {
            // Ambil detail pertanyaan
            $question_details = CourseQuestion::findOrFail($question);
    
            // Jika ada jawaban yang dipilih, simpan jawaban
            if ($request->has('answer_id')) {
                // Validasi jawaban yang dipilih
                $validate = $request->validate([
                    'answer_id' => 'required|exists:course_answers,id'
                ]);
    
                // Ambil jawaban yang dipilih
                $selectedAnswer = CourseAnswer::findOrFail($validate['answer_id']);
    
                // Cek apakah jawaban terkait dengan pertanyaan
                if ($selectedAnswer->course_question_id != $question) {
                    return back()->withErrors('Jawaban tidak sesuai dengan pertanyaan.');
                }
    
                // Simpan atau update jawaban untuk pengguna
                StudentAnswer::updateOrCreate(
                    [
                        'user_id' => Auth::id(),
                        'course_question_id' => $question
                    ],
                    [
                        'answer_id' => $selectedAnswer->id // Simpan answer_id
                    ]
                );
            } else {
                // Jika jawaban di-unselect, hapus jawaban yang ada
                StudentAnswer::where('user_id', Auth::id())
                    ->where('course_question_id', $question)
                    ->delete();
            }
    
            // Commit transaksi jika ada penyimpanan
            DB::commit();
    
            // Redirect ke pertanyaan selanjutnya (skip final page even if no answer is given)
            $nextQuestion = CourseQuestion::where('course_id', $course->id)
                                          ->where('number', '>', $question_details->number)
                                          ->orderBy('number', 'asc')
                                          ->first();
    
            if ($nextQuestion) {
                return redirect()->route('dashboard.learning.course', ['course' => $course->id, 'question' => $nextQuestion->id]);
            } else {
                // Tetap di halaman terakhir jika tidak ada soal berikutnya, tapi tidak redirect ke akhir.
                return redirect()->route('dashboard.learning.finished.course', $course->id);
            }
    
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors('System error! ' . $e->getMessage());
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(StudentAnswer $studentAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentAnswer $studentAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentAnswer $studentAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentAnswer $studentAnswer)
    {
        //
    }
}
