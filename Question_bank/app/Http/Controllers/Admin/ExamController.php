<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Grade;
class ExamController extends Controller
{
public function index()
    {
        // جلب الاختبارات مع المادة التابعة لها وعد الأسئلة المرتبطة بكل اختبار
        $exams = Exam::with('subject.grade')->withCount('questions')->latest()->get();
        $subjects = Subject::with('grade')->get();
        return view('admin.exams.index', compact('exams', 'subjects'));
    }
public function create()
    {
        $grades = Grade::all();
        return view('admin.exams.create', compact('grades'));
    }
public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'duration' => 'required|integer|min:1',
        ]);

        Exam::create($request->all());

        return back()->with('success', 'تم إنشاء الاختبار بنجاح، يمكنك الآن إضافة الأسئلة له.');
    }

public function destroy($id)
    {
        Exam::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الاختبار بنجاح');
    }
}
