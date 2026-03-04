@extends('layouts.admin')

@section('title', 'إدارة الاختبارات')

@section('body-class', 'page-admin-exams')

@section('content')
    <header class="page-header">
        <div>
            <div class="page-title-row">
            <h4 class="mb-1">إدارة الاختبارات</h4>
            <span class="page-tag">لوحة الإدارة</span>
            </div>
            <p class="text-muted mb-0">مرحباً بك في لوحة إدارة منصة بنوك الأسئلة</p>
            <nav class="breadcrumb-lite" aria-label="مسار الصفحة">
            <span>لوحة التحكم</span>
            <i class="bi bi-chevron-left"></i>
            <span>إدارة الاختبارات</span>
            </nav>


        </div>
        <button class="btn mobile-menu-btn d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#adminSidebar">
            <i class="bi bi-list"></i> القائمة
        </button>
    </header>


    
    <section class="header-actions">
        <div>
            <h5 class="mb-1">إدارة الاختبارات</h5>
            <p class="text-muted mb-0">إنشاء وإدارة الاختبارات مع نظام الاختبار العشوائي للأسئلة</p>
        </div>
        <a class="btn add-btn" href="{{ route('admin.exams.create') }}">
            <i class="bi bi-plus-lg"></i> إنشاء اختبار جديد
        </a>
    </section>


    <section class="exam-card reveal">
        <div class="exam-head">
            <span class="status-pill">نشط</span>
            <div class="exam-title">
            <div class="exam-icon doc"><i class="bi bi-file-earmark-text"></i></div>
            <div>
                <h6 class="exam-name">اختبار الرياضيات - الوحدة الأولى</h6>
                <div class="exam-meta">
                <span>الصف العاشر</span>
                <span>الرياضيات</span>
                <span>2024/01/20</span>
                </div>
            </div>
            </div>
            <div class="exam-units">
            <div class="unit-label">الوحدات المشمولة:</div>
            <span class="pill">الأعداد الحقيقية</span>
            </div>
        </div>

        <div class="exam-stats">
            <div class="stat-box reveal">
            <div class="stat-label"><i class="bi bi-question-circle"></i> عدد الأسئلة</div>
            <strong>25</strong>
            </div>
            <div class="stat-box reveal">
            <div class="stat-label"><i class="bi bi-clock"></i> المدة</div>
            <strong>45 دقيقة</strong>
            </div>
            <div class="stat-box reveal">
            <div class="stat-label"><i class="bi bi-people"></i> المحاولات</div>
            <strong>142</strong>
            </div>
        </div>

        <div class="exam-actions">
            <button class="btn btn-action view"><i class="bi bi-eye"></i> معاينة</button>
            <button class="btn btn-action edit" data-bs-toggle="modal" data-bs-target="#editExamModal"><i
                class="bi bi-pencil-square"></i> تعديل</button>
            <button class="btn btn-action delete"><i class="bi bi-trash3"></i> حذف</button>
        </div>
    </section>

    <!-- Modals -->
    <div class="modal fade" id="editExamModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">تعديل الاختبار</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="exam-form">
                <div class="mb-3">
                <label class="form-label">اسم الاختبار</label>
                <input type="text" class="form-control" placeholder="مثال: اختبار الرياضيات - الوحدة الأولى">
                </div>
                <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">الصف</label>
                    <select class="form-select">
                    <option>الصف التاسع</option>
                    <option>الصف العاشر</option>
                    <option>الصف الحادي عشر</option>
                    <option>الصف الثاني عشر</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">المادة</label>
                    <select class="form-select">
                    <option>الرياضيات</option>
                    <option>العلوم</option>
                    <option>اللغة العربية</option>
                    <option>اللغة الإنجليزية</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">المدة (دقيقة)</label>
                    <input type="number" class="form-control" placeholder="مثال: 45">
                </div>
                <div class="col-md-6">
                    <label class="form-label">عدد الأسئلة</label>
                    <input type="number" class="form-control" placeholder="مثال: 25">
                </div>
                </div>
                <button type="button" class="btn btn-primary w-100 mt-3">حفظ التعديلات</button>
            </form>
            </div>
        </div>
        </div>
    </div>
@endsection