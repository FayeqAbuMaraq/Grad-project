@extends('layouts.student')

@section('title', 'الوحدات')

@section('body-class', 'page-units')

@section('content')
    <nav class="navbar student-header px-4 py-3">
        <div class="header-simple">
            <a class="brand-wrap text-decoration-none text-dark d-flex align-items-center gap-2" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.jpg') }}" class="img-fluid" height="44" width="44" alt="الشعار">
                <strong class="text-primary brand-title">منصة بنوك الأسئلة</strong>
            </a>
            <a href="{{ route('student.subjects') }}" class="back-link-inline text-decoration-none text-dark d-flex align-items-center gap-2">
                <span>رجوع</span><i class="bi bi-arrow-left"></i>
            </a>
            <div class="header-spacer" aria-hidden="true"></div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="text-center mb-5">
            <div class="subject-badge mb-2">
            <span id="subjectBadge" class="badge bg-primary mb-2">المادة</span>
            </div>
            <h2 class="fw-bold">اختر الوحدة للاختبار</h2>
        </div>

        <h5 class="fw-bold mb-3" style="text-align: center;">الفصل الأول</h5>
        <div class="units-list mb-5">
            <div class="unit-card reveal d-flex justify-content-between align-items-center">
                <div>
                    <div class="unit-title">الوحدة 1: الأعداد الحقيقية</div>
                    <div class="unit-meta">عدد الأسئلة 45 • المدة 45 دقيقة</div>
                </div>
                <a href="{{ route('student.quiz') }}" class="btn btn-start">ابدأ الاختبار</a>
            </div><br>

            <div class="unit-card reveal d-flex justify-content-between align-items-center">
                <div>
                    <div class="unit-title">الوحدة 2: الهندسة والقياس</div>
                    <div class="unit-meta">عدد الأسئلة 30 • المدة 35 دقيقة</div>
                </div>
                <a href="{{ route('student.quiz') }}" class="btn btn-start">ابدأ الاختبار</a>
            </div>
            <br>
            <div class="unit-card reveal exam-card d-flex justify-content-between align-items-center">
                <div>
                    <div class="unit-title">الاختبار النهائي</div>
                    <div class="unit-meta">يغطي جميع وحدات الفصل الأول</div>
                </div>
                <a href="quiz.html" class="btn btn-start">ابدأ الاختبار</a>
            </div>
        </div>

        <h5 class="fw-bold mb-2" style="text-align: center;">الفصل الثاني</h5>
        <p class="text-muted text-center">سوف يتم عرض الفصل الثاني مع بداية الفصل الثاني</p>
    </div>
@endsection