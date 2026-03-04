@extends('layouts.admin')

@section('title', 'نتائج الطلاب')

@section('body-class', 'page-admin-results')

@section('content')
    <header class="page-header">
    <div>
        <div class="page-title-row">
        <h4 class="mb-1">النتائج</h4>
        <span class="page-tag">لوحة الإدارة</span>
        </div>
        <p class="text-muted mb-0">ملخص عام لنتائج الطلاب ومؤشرات الأداء</p>
        <nav class="breadcrumb-lite" aria-label="مسار الصفحة">
        <span>لوحة التحكم</span>
        <i class="bi bi-chevron-left"></i>
        <span>النتائج</span>
        </nav>
    </div>
    <button class="btn mobile-menu-btn d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#adminSidebar">
        <i class="bi bi-list"></i> القائمة
    </button>
    </header>


    <section class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon blue"><i class="bi bi-people"></i></div>
            <div class="stat-meta">إجمالي الطلاب</div>
            <div class="stat-value">{{ number_format($totalStudents) }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon purple"><i class="bi bi-clipboard-data"></i></div>
            <div class="stat-meta">متوسط الدرجات</div>
            <div class="stat-value">{{ round($avgScore) }}%</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon green"><i class="bi bi-check2-circle"></i></div>
            <div class="stat-meta">نسبة النجاح</div>
            <div class="stat-value">{{ round($successRate) }}%</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon orange"><i class="bi bi-exclamation-circle"></i></div>
            <div class="stat-meta">نسبة الرسوب</div>
            <div class="stat-value">{{ round($failRate) }}%</div>
        </div>
    </section>

    {{-- مؤجل --}}
    <section class="filters-card">
    <div class="filters-title">تصفية النتائج</div>
    <div class="row g-3">
        <div class="col-md-3">
        <label class="form-label">الصف</label>
        <select class="form-select">
            <option>الكل</option>
            <option>العاشر</option>
            <option>الحادي عشر</option>
            <option>الثاني عشر</option>
        </select>
        </div>
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
        <label class="form-label">الفترة</label>
        <select class="form-select">
            <option>آخر 30 يوم</option>
            <option>هذا الفصل</option>
            <option>هذا العام</option>
        </select>
        </div>
        <div class="col-md-3">
        <label class="form-label">بحث</label>
        <input type="text" class="form-control" placeholder="اسم الطالب أو الاختبار">
        </div>
    </div>
    </section>


    <section class="card-box">
    <div class="card-head">
        <div class="card-title">نتيجة التصفية</div>
        <span class="hint">مبنية على التصفية الحالية</span>
    </div>
    <div class="filter-summary">
        <div class="summary-item">
        <span class="label">الفئة</span>
        <strong>الصف الأول</strong>
        </div>
        <div class="summary-item">
        <span class="label">المادة</span>
        <strong>الرياضيات</strong>
        </div>
        <div class="summary-item">
        <span class="label">عدد النتائج</span>
        <strong>32</strong>
        </div>
        <div class="summary-item">
        <span class="label">متوسط العلامات</span>
        <strong>84%</strong>
        </div>
    </div>
    </section>

    <section class="row g-3">
    <div class="col-lg-7">
        <div class="card-box">
        <div class="card-head">
            <div class="card-title">نتائج حسب المادة</div>
            <span class="hint">آخر تحديث: اليوم</span>
        </div>
        <div class="result-row">
            <div>
            <div class="result-title">الرياضيات</div>
            <div class="result-meta">متوسط 86%</div>
            </div>
            <div class="mini-bar"><span style="width:86%"></span></div>
            <span class="badge-soft success">ممتاز</span>
        </div>
        <div class="result-row">
            <div>
            <div class="result-title">العلوم</div>
            <div class="result-meta">متوسط 79%</div>
            </div>
            <div class="mini-bar"><span style="width:79%"></span></div>
            <span class="badge-soft warning">جيد</span>
        </div>
        <div class="result-row">
            <div>
            <div class="result-title">اللغة العربية</div>
            <div class="result-meta">متوسط 72%</div>
            </div>
            <div class="mini-bar"><span style="width:72%"></span></div>
            <span class="badge-soft danger">يحتاج تحسين</span>
        </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card-box">
        <div class="card-head">
            <div class="card-title">تنبيهات ذكية</div>
        </div>
        <ul class="alert-list">
            <li>انخفاض في متوسط الرياضيات هذا الأسبوع.</li>
            <li>12 طالبًا تحت 50% في الفيزياء.</li>
            <li>أداء ممتاز للصف العاشر هذا الشهر.</li>
        </ul>
        </div>
    </div>
    </section>


    <section class="card-box mt-3">
    <div class="card-head">
        <div class="card-title">نتائج حسب الصف</div>
        <span class="hint">تقسيم مريح حسب الصف</span>
    </div>
    <ul class="nav nav-pills results-tabs" role="tablist">
        <li class="nav-item" role="presentation">
        <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-g1" type="button" role="tab">الصف
            الأول</button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-g2" type="button" role="tab">الصف
            الثاني</button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-g3" type="button" role="tab">الصف
            الثالث</button>
        </li>
    </ul>
    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="tab-g1" role="tabpanel">
        <div class="result-list">
            <div class="result-card-item">
            <div>
                <div class="result-title">اختبار الجبر</div>
                <div class="result-meta">الرياضيات • 2026/01/25</div>
            </div>
            <div class="result-score">95%</div>
            <span class="status success">ناجح</span>
            </div>
            <div class="result-card-item">
            <div>
                <div class="result-title">اختبار النحو</div>
                <div class="result-meta">اللغة العربية • 2026/01/20</div>
            </div>
            <div class="result-score">78%</div>
            <span class="status warning">جيد</span>
            </div>
        </div>
        </div>
        <div class="tab-pane fade" id="tab-g2" role="tabpanel">
        <div class="result-list">
            <div class="result-card-item">
            <div>
                <div class="result-title">اختبار الكسور</div>
                <div class="result-meta">الرياضيات • 2026/01/22</div>
            </div>
            <div class="result-score">88%</div>
            <span class="status success">ناجح</span>
            </div>
            <div class="result-card-item">
            <div>
                <div class="result-title">اختبار الحركة</div>
                <div class="result-meta">العلوم • 2026/01/16</div>
            </div>
            <div class="result-score">82%</div>
            <span class="status warning">جيد</span>
            </div>
        </div>
        </div>
        <div class="tab-pane fade" id="tab-g3" role="tabpanel">
        <div class="result-list">
            <div class="result-card-item">
            <div>
                <div class="result-title">اختبار الإملاء</div>
                <div class="result-meta">اللغة العربية • 2026/01/18</div>
            </div>
            <div class="result-score">65%</div>
            <span class="status danger">يحتاج تحسين</span>
            </div>
        </div>
        </div>
    </div>
    </section>
@endsection