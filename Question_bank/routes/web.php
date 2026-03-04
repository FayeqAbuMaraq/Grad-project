<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
Route::get('/',[HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // لوحة التحكم الرئيسية
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // إدارة الصفوف
    Route::resource('grades', GradeController::class);
    //ادارة الامتحانات
    Route::resource('exams', ExamController::class);

    // إدارة المواد
    Route::resource('subjects', SubjectController::class);

    // // إدارة الوحدات الدراسية
    Route::resource('units', UnitController::class);

    // // إدارة الأسئلة
    Route::resource('questions', QuestionController::class);
    
    // مسار لعرض نتائج الطلاب
    Route::get('/results', [App\Http\Controllers\Admin\ResultController::class, 'index'])->name('results.index');
});
Route::middleware(['auth', 'role:student|admin'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Student\DashboardController::class, 'index'])->name('dashboard');
    Route::view('/subjects', 'student.subjects')->name('subjects');
    Route::view('/units', 'student.units')->name('units');
    Route::view('/quiz', 'student.quiz')->name('quiz');
    Route::view('/quiz/result', 'student.quiz_result')->name('quiz.result');
    Route::view('/results', 'student.results')->name('results');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// مسارات AJAX لتحميل المواد والوحدات بناءً على الصف والمادة المحددة
// تأكد أنها داخل مجموعة الـ admin أو أضف البريفكس المناسب
Route::get('/admin/get-subjects/{grade_id}', [QuestionController::class, 'getSubjects']);
Route::get('/admin/get-units/{subject_id}', [QuestionController::class, 'getUnits']);
require __DIR__.'/auth.php';
