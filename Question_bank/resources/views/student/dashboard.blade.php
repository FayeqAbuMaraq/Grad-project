@extends('layouts.student')

@section('title', 'لوحة الطالب')

@section('body-class', 'page-dashboard-student')

@section('content')

    <header class="main-header">
        <div class="container-fluid">
            <div class="header-row">
                <div class="header-brand">
                    <img src="{{ asset('img/logo.jpg') }}" class="logo-img" alt="الشعار"style="width: 44px;">
                    <span class="brand-title">منصة بنوك الأسئلة</span>
                </div>

                <div class="header-user">
                    <span class="user-name">{{Auth::user()->name}}</span>
                    {{-- <span class="user-grade">{{Auth::grade()->name}}</span> --}}
                </div>

                <div class="header-left">
                    <button class="btn btn-light btn-sm d-md-none" data-bs-toggle="collapse"
                        data-bs-target="#studentHeaderMenu">
                        <i class="bi bi-list"></i>
                    </button>

                    <div class="header-actions header-actions-menu collapse" id="studentHeaderMenu">
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('student.subjects') }}">
                            <i class="bi bi-book"></i>
                            <span>المواد</span>
                        </a>
                        <a class="btn btn-outline-secondary btn-sm" href="{{ route('profile.edit') }}">
                            <i class="bi bi-gear"></i>
                            <span>الملف الشخصي</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf
                            
                            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-box-arrow-right"></i> خروج </button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </header>


    <div class="container main-content">
        <!-- قسم الترحيب -->
        <h1 class="mb-1 hero-name" style="font-weight: bold;">مرحباً، {{Auth::user()->name}}</h1>
        <p class="text-muted mb-4" style="font-size: large;">استمر في التقدم نحو أهدافك الدراسية</p>

        <!-- قسم الوقت المستغرق -->
        <div class="row g-3">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="stat-card reveal">
                    <div class="icon-box bg-blue"><i class="bi bi-book"></i></div>
                    <div class="card-text">
                        <small class="text-muted">الاختبارات المكتملة </small>
                        <div class="fw-bold">{{ $completedExams }}</div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="stat-card reveal">
                    <div class="icon-box bg-purple"><i class="bi bi-trophy"></i></div>
                    <div class="card-text">
                        <small class="text-muted">المعدل العام</small>
                        <div class="fw-bold">{{ round($averageScore) }}%</div>
                    </div>
                </div>
            </div>

<div class="col-12 col-sm-6 col-md-3">
    <div class="stat-card reveal">
        <div class="icon-box bg-green"><i class="bi bi-graph-up"></i></div>
        <div class="card-text">
            <small class="text-muted">التحسن</small>
            <div class="fw-bold {{ $improvement > 0 ? 'text-success' : ($improvement < 0 ? 'text-danger' : 'text-muted') }}">
                {{ $improvement >= 0.1 ? '+' : '' }}{{ round($improvement, 1) }}%
            </div>
        </div>
    </div>
</div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="stat-card reveal">
                    <div class="icon-box bg-orange"><i class="bi bi-clock"></i></div>
                    <div class="card-text">
                        <small class="text-muted">الوقت المستغرق</small>
                        <div class="fw-bold">{{ $totalHours }} ساعة</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 my-4">
            <div class="col-12 col-md-6">
                <a href="{{ route('student.subjects') }}" class="text-decoration-none text-dark d-block h-100">
                    <div class="start-exam h-100 reveal">
                        <div>
                            <i class="bi bi-book fs-1"></i>
                            <h3 class="mb-2 mt-2" style="font-weight: bold;">ابدأ اختباراً جديداً</h3>
                            <p class="mb-0 opacity-100">اختر المادة ثم الوحدة ثم ابدأ الاختبار</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-12 col-md-6">
                <a href="{{ route('student.results') }}" class="text-decoration-none text-dark d-block h-100">
                    <div class="result-card h-100 reveal">
                        <i class="bi bi-trophy fs-1 text-warning"></i>
                        <h3 class="mt-2 mb-2" style="font-weight: bold;">عرض النتائج</h3>
                        <p class="text-muted opacity-100">راجع أدائك في الاختبارات السابقة</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- آخر النتائج -->
        <div class="section-header mt-5 mb-4">
            <h4 class="fw-bold">آخر النتائج</h4>
        </div>
        <div class="recent-exams-card reveal">
            <h6 class="section-title">الاختبارات الأخيرة</h6>

            <div class="exam-row reveal">
                <div class="exam-info">
                    <div class="exam-icon">
                        <i class="bi bi-book"></i>
                    </div>
                    <div class="exam-text">
                        <div class="exam-title">اللغة العربية</div>
                        <div class="exam-subtitle">النحو</div>
                    </div>
                </div>
                <div class="exam-score">
                    <strong>90%</strong>
                    <small>2026/01/25</small>
                </div>
            </div>

            <div class="exam-row reveal">
                <div class="exam-info">
                    <div class="exam-icon">
                        <i class="bi bi-book"></i>
                    </div>
                    <div class="exam-text">
                        <div class="exam-title">اللغة العربية</div>
                        <div class="exam-subtitle">النحو</div>
                    </div>
                </div>
                <div class="exam-score">
                    <strong>85%</strong>
                    <small>2026/01/24</small>
                </div>
            </div>

            <div class="exam-row reveal">
                <div class="exam-info">
                    <div class="exam-icon">
                        <i class="bi bi-book"></i>
                    </div>
                    <div class="exam-text">
                        <div class="exam-title">اللغة العربية</div>
                        <div class="exam-subtitle">النحو</div>
                    </div>
                </div>
                <div class="exam-score">
                    <strong>78%</strong>
                    <small>2026/01/23</small>
                </div>
            </div>
        </div>
<br>
@endsection