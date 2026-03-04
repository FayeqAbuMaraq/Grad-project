<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamAttempt;
use App\Models\User;
class ResultController extends Controller
{
    public function index()
    {
        $totalStudents = User::role('student')->count();
        $avgScore = ExamAttempt::avg('total_score') ?? 0;

        // نسبة النجاح (الدرجات >= 50 مثلاً)
        $successCount = ExamAttempt::where('total_score', '>=', 50)->count();
        $totalAttempts = ExamAttempt::count();
        $successRate = $totalAttempts > 0 ? ($successCount / $totalAttempts) * 100 : 0;

        // نسبة الرسوب
        $failRate = $totalAttempts > 0 ? 100 - $successRate : 0;

        return view('admin.results.index', compact('totalStudents', 'avgScore', 'successRate', 'failRate'));
    }
}
