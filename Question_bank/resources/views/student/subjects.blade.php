@extends('layouts.student')

@section('title', 'المواد الدراسية')

@section('body-class', 'page-subject')

@section('content')
  <nav class="navbar student-header px-4 py-3">
    <div class="header-simple">
      <a class="brand-wrap text-decoration-none text-dark d-flex align-items-center gap-2" href="{{ url('/') }}">
        <img src="{{ asset('img/logo.jpg') }}" class="img-fluid" height="44" width="44" alt="الشعار">
        <strong class="text-primary brand-title">منصة بنوك الأسئلة</strong>
      </a>
      <a href="{{ route('student.dashboard') }}" class="back-link-inline text-decoration-none text-dark d-flex align-items-center gap-2">
        <span>رجوع</span><i class="bi bi-arrow-left"></i>
      </a>
      <div class="header-spacer" aria-hidden="true"></div>
    </div>
  </nav>

  <div class="container my-5">
    <div class="text-center mb-5">
      <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill mb-3 d-inline-block">الصف الأول</span>
      <h2 class="fw-bold">اختر المادة</h2>
      <p class="text-muted">اختر المادة الدراسية للانتقال للوحدات</p>
    </div>
    
    <div class="row g-4">
      
      <div class="col-lg-4 col-md-6">
        <div class="subject-card reveal">
          <div class="card-corner-math">
            <div class="icon-box icon-math">
              <i class="bi bi-calculator"></i>
            </div>
          </div>
          <h5 class="subject-title">الرياضيات</h5>
          <a href="{{ route('student.units') }}" class="start-btn d-flex align-items-center gap-2">
            <span>حدد الوحدة</span><i class="bi bi-arrow-left"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="subject-card reveal">
          <div class="card-corner-science">
            <div class="icon-box icon-science">
              <i class="fa-solid fa-flask"></i>
            </div>
          </div>
          <h5 class="subject-title">العلوم العامة</h5>
          <a href="{{ route('student.units') }}" class="start-btn d-flex align-items-center gap-2">
            <span>حدد الوحدة</span><i class="bi bi-arrow-left"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="subject-card reveal">
          <div class="card-corner-en">
            <div class="icon-box icon-en">
              <i class="bi bi-translate"></i>
            </div>
          </div>
          <h5 class="subject-title">اللغة الإنجليزية</h5>
          <a href="{{ route('student.units') }}" class="start-btn d-flex align-items-center gap-2">
            <span>حدد الوحدة</span><i class="bi bi-arrow-left"></i>
          </a>
        </div>
      </div>
      
    </div>
  </div>
@endsection