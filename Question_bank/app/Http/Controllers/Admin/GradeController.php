<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
class GradeController extends Controller
{
public function index()
{
    // جلب الصفوف مع حساب عدد الطلاب والمواد المرتبطة بكل صف
    $grades = Grade::withCount(['students', 'subjects'])->get();
    
    return view('admin.grades.index', compact('grades'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'stage' => 'required|in:primary,middle,high',
    ]);

    \App\Models\Grade::create([
        'name' => $request->name,
        'stage' => $request->stage,
        'slug' =>'-' . str_replace(' ', '-', $request->name), 
    ]);

    return redirect()->back()->with('success', 'تم إضافة الصف بنجاح');
}
public function edit($id)
{
    $grade = Grade::findOrFail($id);
    return view('admin.grades.edit', compact('grade'));
}
public function update(Request $request, $id)
{
    $grade = Grade::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'stage' => 'required|in:primary,middle,high',
    ]);

    $grade->update([
        'name' => $request->name,
        'stage' => $request->stage,
        'slug' => str_replace(' ', '-', $request->name), 
    ]);

    return redirect()->route('admin.grades.index')->with('success', 'تم تحديث اسم الصف بنجاح ✅');
}

public function destroy($id)
{
    $grade = Grade::findOrFail($id);
    $grade->delete();
    return back()->with('success', 'تم حذف الصف بنجاح');
}
}
