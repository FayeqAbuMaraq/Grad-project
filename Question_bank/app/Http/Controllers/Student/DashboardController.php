<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ExamAttempt;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
public function index()
{
    $studentId = auth()->id();

    // جلب آخر محاولتين للطالب
    $lastTwoAttempts = ExamAttempt::where('user_id', $studentId)
                        ->whereNotNull('finished_at')
                        ->latest()
                        ->take(2)
                        ->get();

    $improvement = 0;

    if ($lastTwoAttempts->count() >= 2) {
        $latestScore = $lastTwoAttempts[0]->total_score; // الدرجة الأخيرة
        $previousScore = $lastTwoAttempts[1]->total_score; // الدرجة اللي قبلها

        if ($previousScore > 0) {
            $improvement = (($latestScore - $previousScore) / $previousScore) * 100;
        }
    }

    // المتغيرات السابقة
    $completedExams = ExamAttempt::where('user_id', $studentId)->whereNotNull('finished_at')->count();
    $averageScore = ExamAttempt::where('user_id', $studentId)->avg('total_score') ?? 0;
    
    // حساب الوقت (بالساعات)
    $totalSeconds = ExamAttempt::where('user_id', $studentId)
                        ->whereNotNull('finished_at')
                        ->get()
                        ->sum(function($attempt) {
                            return \Carbon\Carbon::parse($attempt->finished_at)->diffInSeconds(\Carbon\Carbon::parse($attempt->started_at));
                        });
    $totalHours = floor($totalSeconds / 3600);

    return view('student.dashboard', compact('completedExams', 'averageScore', 'improvement', 'totalHours'));
}
}