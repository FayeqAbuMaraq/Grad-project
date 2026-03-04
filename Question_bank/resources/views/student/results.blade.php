@extends('layouts.student')

@section('title', 'سجل النتائج')

@section('body-class', 'page-student-results')

@section('content')
  <nav class="navbar student-header px-4 py-3">
    <div class="header-simple">
      <a class="brand-wrap text-decoration-none text-dark d-flex align-items-center gap-2" href="{{ url('/') }}">
        <img src="{{ asset('img/logo.jpg') }}" class="img-fluid" height="44" width="44" alt="الشعار">
        <strong class="text-primary brand-title">منصة بنوك الأسئلة</strong>
      </a>
      <a href="{{ route('student.dashboard') }}" class="back-link-inline text-decoration-none text-dark d-flex align-items-center gap-2">
        <span>الرئيسية</span><i class="bi bi-house"></i>
      </a>
      <div class="header-spacer" aria-hidden="true"></div>
    </div>
  </nav>


  <main class="container my-5">

    <section class="page-hero">
      <div class="hero-icon">
        <i class="bi bi-graph-up-arrow"></i>
      </div>
      <div>
        <h1>التقدير العام ونتائج الاختبارات</h1>
        <p>تابع أداءك الأكاديمي وتقدمك في الاختبارات</p>
      </div>
    </section>


    <section class="highlight-card">
      <div class="highlight-head">
        <div>
          <div class="highlight-title d-flex align-items-center gap-2"><i class="bi bi-award"></i>
            <h2 class="mb-0">المعدل العام</h2>
          </div>
        </div>
        <span class="grade-pill">ممتاز</span>

      </div>
      <div class="highlight-body">
        <div class="score">92%</div>
        <div class="progress" role="progressbar" aria-label="progress" aria-valuenow="92" aria-valuemin="0"
          aria-valuemax="100">
          <div class="progress-bar"></div>
        </div>
        <div class="note">أداء ممتاز، استمر على هذا المستوى!</div>
      </div>
    </section>


    <section class="stats-grid">
      <div class="stat-card">
        <div class="stat-icon purple"><i class="bi bi-clipboard-check"></i></div>
        <div class="stat-label">عدد الاختبارات</div>
        <div class="stat-value">18</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon blue"><i class="bi bi-arrow-up-circle"></i></div>
        <div class="stat-label">أعلى علامة</div>
        <div class="stat-value">98%</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon orange"><i class="bi bi-arrow-down-circle"></i></div>
        <div class="stat-label">أقل علامة</div>
        <div class="stat-value">64%</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon teal"><i class="bi bi-bar-chart"></i></div>
        <div class="stat-label">متوسط العلامات</div>
        <div class="stat-value">86%</div>
      </div>
      <div class="stat-card">
        <div class="stat-icon green"><i class="bi bi-check2-circle"></i></div>
        <div class="stat-label">ناجح / راسب</div>
        <div class="stat-value">16 / 2</div>
      </div>
    </section>


    <section class="filters-card">
      <div class="filters-title">تصفية النتائج</div>
      <div class="row g-3">
        <div class="col-md-3">
          <label class="form-label">المادة</label>
          <select class="form-select">
            <option>الكل</option>
            <option>الرياضيات</option>
            <option>العلوم</option>
            <option>اللغة العربية</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">الفترة الزمنية</label>
          <select class="form-select">
            <option>آخر 30 يوم</option>
            <option>آخر 3 أشهر</option>
            <option>هذا الفصل</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">الترتيب</label>
          <select class="form-select">
            <option>الأحدث</option>
            <option>أعلى علامة</option>
            <option>أقل علامة</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">بحث</label>
          <input type="text" class="form-control" placeholder="ابحث عن اسم اختبار">
        </div>
      </div>
    </section>

    <section class="table-card">
      <div class="table-head">
        <h5>نتائج الاختبارات</h5>
        <span class="hint">آخر النتائج</span>
      </div>
      <div class="table-responsive">
        <table class="table align-middle">
          <thead>
            <tr>
              <th>اسم الاختبار</th>
              <th>المادة</th>
              <th>الوحدة / الفصل</th>
              <th>العلامة</th>
              <th>التقدير</th>
              <th>تاريخ التقديم</th>
              <th>الحالة</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>اختبار الجبر</td>
              <td>الرياضيات</td>
              <td>الوحدة 2</td>
              <td>95%</td>
              <td>ممتاز</td>
              <td>2026/01/25</td>
              <td><span class="status success">ناجح</span></td>
            </tr>
            <tr>
              <td>اختبار الفيزياء</td>
              <td>العلوم</td>
              <td>الفصل الأول</td>
              <td>82%</td>
              <td>جيد جداً</td>
              <td>2026/01/20</td>
              <td><span class="status warning">جيد</span></td>
            </tr>
            <tr>
              <td>اختبار النحو</td>
              <td>اللغة العربية</td>
              <td>الوحدة 1</td>
              <td>64%</td>
              <td>مقبول</td>
              <td>2026/01/17</td>
              <td><span class="status danger">يحتاج تحسين</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  </main>

@endsection