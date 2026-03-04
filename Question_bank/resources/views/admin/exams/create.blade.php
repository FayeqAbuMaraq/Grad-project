@extends('layouts.admin')

@section('title', 'إنشاء اختبار جديد')

@section('body-class', 'page-admin-exam-create')

@section('content')
      <header class="page-header">
        <div>
          <div class="page-title-row">
            <h4 class="mb-1">إنشاء اختبار جديد</h4>
            <span class="page-tag">لوحة الإدارة</span>
          </div>
          <p class="text-muted mb-0">مرحباً بك في لوحة إدارة منصة بنوك الأسئلة</p>
          <nav class="breadcrumb-lite" aria-label="مسار الصفحة">
            <span>لوحة التحكم</span>
            <i class="bi bi-chevron-left"></i>
            <span>إنشاء اختبار جديد</span>
          </nav>


        </div>
        <button class="btn mobile-menu-btn d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#adminSidebar">
          <i class="bi bi-list"></i> القائمة
        </button>
      </header>

      <section class="create-layout">
        <aside class="summary-card">
          <h6>ملخص الاختبار</h6>
          <div class="summary-item">
            <span>عدد الأسئلة</span>
            <strong>20</strong>
          </div>
          <div class="summary-item">
            <span>المدة</span>
            <strong>45 دقيقة</strong>
          </div>
          <div class="summary-item">
            <span>الوحدات المختارة</span>
            <strong>0</strong>
          </div>
          <div class="summary-item">
            <span>الأسئلة المتاحة</span>
            <strong>0</strong>
          </div>
        </aside>

        <section class="form-card">
          <h6>عنوان الاختبار</h6>
          <input type="text" class="form-control" placeholder="مثال: اختبار الرياضيات - الوحدة الأولى">

          <div class="form-row">
            <div>
              <label class="form-label">الصف الدراسي</label>
              <select class="form-select">
                <option>اختر الصف</option>
                <option>الصف التاسع</option>
                <option>الصف العاشر</option>
                <option>الصف الحادي عشر</option>
                <option>الصف الثاني عشر</option>
              </select>
            </div>
            <div>
              <label class="form-label">المادة الدراسية</label>
              <select class="form-select">
                <option>اختر المادة</option>
                <option>الرياضيات</option>
                <option>العلوم</option>
                <option>اللغة العربية</option>
                <option>اللغة الإنجليزية</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div>
              <label class="form-label">المدة (بالدقائق)</label>
              <div class="input-icon">
                <input type="number" class="form-control" value="45">
                <i class="bi bi-clock"></i>
              </div>
            </div>
            <div>
              <label class="form-label">عدد الأسئلة</label>
              <div class="input-icon">
                <input type="number" class="form-control" value="20">
                <i class="bi bi-question-circle"></i>
              </div>
            </div>
          </div>

          <div class="form-row single">
            <div>
              <label class="form-label">اختر الوحدات (يمكن اختيار أكثر من وحدة)</label>
              <div class="unit-grid">
                <label class="unit-card reveal">
                  <input type="checkbox">
                  <div class="unit-title">الأعداد الحقيقية</div>
                  <div class="unit-meta">45 سؤال متاح</div>
                </label>
                <label class="unit-card reveal">
                  <input type="checkbox">
                  <div class="unit-title">المعادلات والمتباينات</div>
                  <div class="unit-meta">52 سؤال متاح</div>
                </label>
                <label class="unit-card reveal">
                  <input type="checkbox">
                  <div class="unit-title">الهندسة التحليلية</div>
                  <div class="unit-meta">38 سؤال متاح</div>
                </label>
              </div>
            </div>
          </div>

          <button class="btn generate-btn">
            <i class="bi bi-arrow-repeat"></i> توليد الأسئلة عشوائياً
          </button>
        </section>
      </section>
@endsection