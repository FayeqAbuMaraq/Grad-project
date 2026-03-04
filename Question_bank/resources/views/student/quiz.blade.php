@extends('layouts.student')

@section('title', 'الاختبار')

@section('body-class', 'page-quiz')

@section('content')
  <nav class="navbar student-header px-4 py-3">
    <div class="header-simple">
      <a class="brand-wrap text-decoration-none text-dark d-flex align-items-center gap-2" href="{{ url('/') }}">
        <img src="{{ asset('img/logo.jpg') }}" class="img-fluid" height="44" width="44" alt="الشعار">
        <strong class="text-primary brand-title">منصة بنوك الأسئلة</strong>
      </a>
      <a href="{{ route('student.units') }}" class="back-link-inline text-decoration-none text-dark d-flex align-items-center gap-2">
        <span>خروج</span><i class="bi bi-box-arrow-left"></i>
      </a>
      <div class="header-spacer" aria-hidden="true"></div>
    </div>
  </nav>

  <div class="container my-5">
      <div class="quiz-container reveal">
          
        <!-- شريط التقدم والوقت -->
      <div class="quiz-timer-bar">
        <div class="container d-flex align-items-center justify-content-between">
          <span class="timer-label">الوقت المتبقي</span>
          <div class="timer-chip">
            <span class="timer-dot"></span>
            <span>29:46</span>
          </div>
        </div>
      </div>

      <main class="quiz-wrapper">
        <div class="container">
          <div class="quiz-head">
            <div class="progress-label">20% مكتمل</div>
            <div class="progress" role="progressbar" aria-label="progress" aria-valuenow="20" aria-valuemin="0"
              aria-valuemax="100">
              <div class="progress-bar"></div>
            </div>
            <div class="question-count">السؤال 1 من 5</div>
          </div>

        <!-- منطقة السؤال -->
        <section class="question-area text-center mb-5">
            <h2 class="question-text fw-bold mb-5">ما هو ناتج جمع 5 + 3؟</h2>

            <div class="answers">
              <label class="answer-option">
                <input type="radio" name="q1">
                <span class="option-text">6</span>
              </label>
              <label class="answer-option">
                <input type="radio" name="q1">
                <span class="option-text">7</span>
              </label>
              <label class="answer-option">
                <input type="radio" name="q1">
                <span class="option-text">8</span>
              </label>
              <label class="answer-option">
                <input type="radio" name="q1">
                <span class="option-text">9</span>
              </label>
            </div>
        </section>

        <div class="quiz-actions">
            <button class="btn btn-light px-4"><i class="bi bi-arrow-right"></i> السابق</button>
            <!-- الزر التالي يوجه للنتيجة (كمثال للتصميم) -->
            <a href="{{ route('student.quiz.result') }}" class="btn btn-primary px-4">التالي <i class="bi bi-arrow-left"></i></a>
        </div>

        <!-- شريط أرقام الأسئلة -->
        <section class="questions-strip">
            <div class="strip-title">الأسئلة</div>
            <div class="strip-items">
              <button class="strip-item active">1</button>
              <button class="strip-item">2</button>
              <button class="strip-item">3</button>
              <button class="strip-item current">4</button>
              <button class="strip-item">5</button>
              <button class="strip-item">6</button>
            </div>
        </section>

      </div>
  </div>
@endsection