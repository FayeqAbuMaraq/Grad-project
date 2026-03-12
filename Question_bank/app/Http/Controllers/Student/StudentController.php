<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
class StudentController extends Controller
{
    public function subjects()
    {
        // جلب بيانات الطالب المسجل حالياً مع صفه الدراسي
        $student = auth()->user();
        $grade = $student->grade; // تأكد أنك عامل علاقة في موديل User

        // جلب المواد التابعة لهذا الصف فقط
        $subjects = $grade->subjects; 

        return view('student.subjects', compact('grade', 'subjects'));
    }
    public function units($subject_id)
    {
        // جلب المادة مع الوحدات التابعة لها
        $subject = Subject::with('units')->findOrFail($subject_id);
        
        // جلب الوحدات وتصفيتها (مثلاً للفصل الأول فقط حالياً كما في تصميمك)
        $units = $subject->units; 

        return view('student.units', compact('subject', 'units'));
    }
}
