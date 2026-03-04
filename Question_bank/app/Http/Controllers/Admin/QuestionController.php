<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;
use App\Models\Unit;
use App\Models\Subject;
use App\Models\Grade;

class QuestionController extends Controller
{
// مسار AJAX لتحميل المواد بناءً على الصف المحدد
public function getSubjects($grade_id) {
    return response()->json(Subject::where('grade_id', $grade_id)->get());
}
// مسار AJAX لتحميل الوحدات بناءً على المادة المحددة
public function getUnits($subject_id) {
    return response()->json(Unit::where('subject_id', $subject_id)->get());
}


public function index()
{
    $questions = Question::with(['unit.subject.grade', 'options'])->latest()->get();
    $grades = Grade::all();
    $subjects = Subject::all();
    $units = Unit::all();
    return view('admin.questions.index', compact('questions', 'grades', 'subjects', 'units'));
}
public function store(Request $request)
{
    // 1. التحقق من البيانات المدخلة من الـ Modal
    $request->validate([
        'unit_id' => 'required|exists:units,id',
        'type' => 'required|in:mcq,tf,fill',
        'question_text' => 'required|string',
        'difficulty' => 'required|in:easy,medium,hard',
        'mark' => 'nullable|numeric',
    ]);

    // 2. حفظ السؤال الأساسي في جدول Questions
    $question = Question::create([
        'unit_id' => $request->unit_id,
        'type' => $request->type,
        'question_text' => $request->question_text,
        'difficulty' => $request->difficulty,
        'mark' => $request->mark ?? 1.0,
    ]);

    // 3. منطق حفظ الإجابات بناءً على نوع السؤال
    if ($request->type === 'mcq') {
        // حفظ خيارات الاختيار من متعدد
        foreach ($request->options as $index => $optionText) {
            if (!empty($optionText)) {
                Option::create([
                    'question_id' => $question->id,
                    'option_text' => $optionText,
                    'is_correct' => ($request->is_correct == $index),
                ]);
            }
        }
    } 
    elseif ($request->type === 'tf') {
        // حفظ خيارات الصح والخطأ
        Option::create([
            'question_id' => $question->id,
            'option_text' => 'صح',
            'is_correct' => ($request->tf_answer == "1"),
        ]);
        Option::create([
            'question_id' => $question->id,
            'option_text' => 'خطأ',
            'is_correct' => ($request->tf_answer == "0"),
        ]);
    } 
    elseif ($request->type === 'fill') {
        // حفظ الإجابة الصحيحة لسؤال أكمل الفراغ
        Option::create([
            'question_id' => $question->id,
            'option_text' => $request->fill_answer,
            'is_correct' => true,
        ]);
    }

    return redirect()->back()->with('success', 'تم إضافة السؤال بنجاح إلى بنك الأسئلة!');
}
public function edit($id)
{
    // تحميل السؤال مع خياراته لضمان عدم وجود قيم null
    $question = Question::with('options')->findOrFail($id);
    $units = Unit::all();
    
    return view('admin.questions.edit', compact('question', 'units'));
}
public function update(Request $request, $id)
{
    $question = Question::findOrFail($id);

    $question->update([
        'question_text' => $request->question_text,
        'unit_id' => $request->unit_id,
        'difficulty' => $request->difficulty,
    ]);

    //تحديث نصوص الخيارات وتحديد الإجابة الصحيحة
    foreach ($request->options as $optionId => $text) {
        $isCorrect = ($request->correct_answer == $optionId) ? 1 : 0;

        \App\Models\Option::where('id', $optionId)->update([
            'option_text' => $text,
            'is_correct' => $isCorrect
        ]);
    }

    return redirect()->route('admin.questions.index')->with('success', 'تم تحديث السؤال والخيارات بنجاح ✅');
}
public function destroy($id)
{
    $question = Question::findOrFail($id);
    $question->options()->delete(); // حذف الخيارات المرتبطة بالسؤال
    $question->delete(); // حذف السؤال نفسه

    return redirect()->route('admin.questions.index')->with('success', 'تم حذف السؤال بنجاح 🗑️');
}
}