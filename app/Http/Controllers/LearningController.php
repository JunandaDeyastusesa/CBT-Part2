<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseQuestion;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearningController extends Controller
{
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

        return view('student.courses.index', [
            'my_courses' => $my_courses
        ]);
    }

    public function learning(Course $course, $question)
{
    $user = Auth::user();

    // Cek apakah pengguna terdaftar di kursus
    $isEnrolled = $user->courses()->where('course_id', $course->id)->exists();

    if (!$isEnrolled) {
        abort(404);
    }

    // Ambil pertanyaan saat ini
    $currentQuestion = CourseQuestion::where('course_id', $course->id)->where('id', $question)->firstOrFail();

    // Ambil semua pertanyaan kursus
    $questions = $course->questions()->get(); // Pastikan ini mengembalikan koleksi

    // Ambil jawaban siswa untuk pertanyaan saat ini
    $studentAnswer = StudentAnswer::where('user_id', $user->id)
                                    ->where('course_question_id', $currentQuestion->id)
                                    ->first();

    // Ambil semua jawaban siswa untuk kursus ini
    $allStudentAnswers = StudentAnswer::where('user_id', $user->id)
                                        ->whereIn('course_question_id', $questions->pluck('id'))
                                        ->get();

    return view('student.courses.learning', [
        'course' => $course,
        'question' => $currentQuestion,
        'questions' => $questions,
        'studentAnswer' => $studentAnswer, // Jawaban untuk pertanyaan saat ini
        'allStudentAnswers' => $allStudentAnswers // Semua jawaban siswa
    ]);
}

    
    // Fungsi untuk tombol kembali
    public function learning_back(Course $course, $question, Request $request)
    {
        $user = Auth::user();
    
        // Cek apakah user sudah terdaftar di course
        $isEnrolled = $user->courses()->where('course_id', $course->id)->exists();
        if (!$isEnrolled) {
            abort(404); // Jika user tidak terdaftar di course, tampilkan error 404
        }
    
        // Ambil pertanyaan saat ini
        $currentQuestion = CourseQuestion::where('course_id', $course->id)->where('id', $question)->firstOrFail();
        $questions = $course->questions()->get();
    
        // Jika ada jawaban yang dipilih (memastikan tidak ada error saat tidak ada input jawaban)
        if ($request->filled('answer_id')) {
            $answerId = $request->input('answer_id');
    
            // Simpan atau update jawaban jika answer_id tersedia
            StudentAnswer::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'course_question_id' => $currentQuestion->id,
                ],
                [
                    'answer_id' => $answerId
                ]
            );
        }
    
        // Logika untuk mengambil pertanyaan sebelumnya
        $previousQuestion = $questions
            ->where('number', '<', $currentQuestion->number)
            ->sortByDesc('number')
            ->first(); // Ambil pertanyaan sebelumnya berdasarkan nomor
    
        if (!$previousQuestion) {
            // Jika tidak ada pertanyaan sebelumnya, bisa redirect atau tampilkan error
            return redirect()->route('dashboard.learning.course', ['course' => $course->id])
                ->with('error', 'Tidak ada pertanyaan sebelumnya.');
        }
    
        // Redirect ke pertanyaan sebelumnya
        return redirect()->route('dashboard.learning.course', ['course' => $course->id, 'question' => $previousQuestion->id]);
    }

    // Finis learning
    public function learning_finished(Course $course)
    {
        $userId = Auth::id(); // Ambil ID pengguna yang sedang login
    
        // Ambil semua pertanyaan untuk kursus ini
        $questions = CourseQuestion::where('course_id', $course->id)->get();
    
        foreach ($questions as $question) {
            // Cek apakah pengguna sudah menjawab pertanyaan ini
            $studentAnswer = StudentAnswer::where('user_id', $userId)
                ->where('course_question_id', $question->id) // Ubah dari question_id ke course_question_id
                ->first();
    
            if (!$studentAnswer) {
                // Jika belum ada jawaban, simpan jawaban dengan nilai 0/null
                StudentAnswer::create([
                    'user_id' => $userId,
                    'answer_id' => null, // Nilai null untuk jawaban
                    'course_question_id' => $question->id, // Gunakan course_question_id
                    'score' => 0 // Nilai score 0
                ]);
            }
        }
    
        return view('student.courses.learning_finished', [
            'course' => $course
        ]);
    }



    public function learning_rapport(Course $course)
    {
        $userId = Auth::id();
    
        // Ambil jawaban siswa dengan relasi pertanyaan dan jawaban
        $studentAnswers = StudentAnswer::with(['question', 'question.answers'])
            ->whereHas('question', function ($query) use ($course) {
                $query->where('course_id', $course->id);
            })
            ->where('user_id', $userId)
            ->get()
            ->sortBy(function ($studentAnswer) {
                return $studentAnswer->question->number; // Urutkan berdasarkan nomor pertanyaan
            });
    
        // Hitung total pertanyaan
        $totalQuestions = CourseQuestion::where('course_id', $course->id)->count();
    
        // Hitung jumlah jawaban yang benar dan total score
        $correctAnswersCount = 0;
        $totalScore = 0;
    
        foreach ($studentAnswers as $studentAnswer) {
            // Ambil jawaban siswa
            $selectedAnswerId = $studentAnswer->answer_id;
    
            // Cek jawaban yang dipilih
            $selectedAnswer = $studentAnswer->question->answers->where('id', $selectedAnswerId)->first();
            
            // Ambil jawaban yang benar berdasarkan answer_id dengan score > 0
            $correctAnswer = $studentAnswer->question->answers
                ->where('score', '>', 0)
                ->first();
    
            // Jika jawaban dipilih ada
            if ($selectedAnswer) {
                // Cek apakah jawaban yang dipilih benar
                if ($correctAnswer && $selectedAnswer->id === $correctAnswer->id) {
                    $correctAnswersCount++;
                    $totalScore += $correctAnswer->score; // Gunakan score dari jawaban yang benar
                } else {
                    // Tambahkan score untuk jawaban yang dipilih jika tidak benar
                    $totalScore += $selectedAnswer->score; // Tambahkan score untuk jawaban yang dipilih
                }
            }
        }
    
        // Cek apakah lulus
        $passed = $correctAnswersCount == $totalQuestions;
    
        return view('student.courses.learning_rapport', [
            'passed' => $passed,
            'course' => $course,
            'studentAnswers' => $studentAnswers,
            'totalQuestions' => $totalQuestions,
            'correctAnswersCount' => $correctAnswersCount,
            'totalScore' => $totalScore,
        ]);
    }
}
