<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
class StudentController extends Controller
{
    public function subjects()
    {
        $student = auth()->user();
        $grade = $student->grade; 
        $subjects = $grade->subjects; 

        return view('student.subjects', compact('grade', 'subjects'));
    }
    public function units($subject_id)
    {
        $subject = Subject::with('units')->findOrFail($subject_id);
        $units = $subject->units; 

        return view('student.units', compact('subject', 'units'));
    }
}
