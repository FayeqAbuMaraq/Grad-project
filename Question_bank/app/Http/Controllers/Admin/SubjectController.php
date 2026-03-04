<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Grade;
class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('grade')
            ->withCount('units') 
            ->get();
            
        $grades = Grade::all();
        
        return view('admin.subjects.index', compact('subjects', 'grades'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'grade_id' => 'required|exists:grades,id'
        ]);
        Subject::create($request->all());
        return back()->with('success', 'تم إضافة المادة بنجاح');
    }
    public function edit($id)
    {
        $subject = Subject::findOrFail($id); 
        $grades = Grade::all();
        
        return view('admin.subjects.edit', compact('subject', 'grades'));
    }
    public function update(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        
        $subject->update([
            'name' => $request->name,
            'grade_id' => $request->grade_id,
        ]);

        return redirect()->route('admin.subjects.index')->with('success', 'تم تحديث المادة بنجاح');
    }
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return back()->with('success', 'تم حذف المادة بنجاح');
    }
}
