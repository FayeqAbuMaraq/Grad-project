<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>لوحة الإدارة</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@400;600;700&family=Noto+Naskh+Arabic:wght@400;600;700&display=swap"
    rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="@yield('body-class')">
<div class="layout">

    <aside class="sidebar offcanvas offcanvas-start offcanvas-lg" tabindex="-1" id="adminSidebar">
      <div class="offcanvas-header d-lg-none">
        <h5 class="offcanvas-title">القائمة</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="brand d-flex align-items-center gap-2">
          <img src="../img/logo.jpg" alt="الشعار">
          <span>منصة بنوك الأسئلة</span>
        </div>

        <nav class="nav-links">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid"></i> نظرة عامة
            </a>

            <a href="{{ route('admin.grades.index') }}" class="{{ request()->routeIs('admin.grades.*') ? 'active' : '' }}">
                <i class="bi bi-list-check"></i> الصفوف
            </a>

            <a href="{{ route('admin.subjects.index') }}" class="{{ request()->routeIs('admin.subjects.*') ? 'active' : '' }}">
                <i class="bi bi-journal-text"></i> المواد
            </a>

            <a href="{{ route('admin.units.index') }}" class="{{ request()->routeIs('admin.units.*') ? 'active' : '' }}">
                <i class="bi bi-collection"></i> الوحدات
            </a>

            <a href="{{ route('admin.questions.index') }}" class="{{ request()->routeIs('admin.questions.*') ? 'active' : '' }}">
                <i class="bi bi-question-circle"></i> الأسئلة
            </a>

            <a href="{{ route('admin.exams.index') }}" class="{{ request()->routeIs('admin.exams.*') ? 'active' : '' }}">
                <i class="bi bi-clipboard-check"></i> الاختبارات
            </a>

            <a href="{{ route('admin.results.index') }}" class="{{ request()->routeIs('admin.results.*') ? 'active' : '' }}">
                <i class="bi bi-trophy"></i> النتائج
            </a>
        </nav>
 
                <div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-danger w-100" type="submit">
                            <i class="bi bi-box-arrow-right"></i> تسجيل الخروج
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <main class="content">
            <!-- هنا يظهر محتوى الصفحة -->
            @yield('content')
            
        </main>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>

                // --- كود ربط الصف بالمادة بالوحدة ---
        const gradeSelect = document.getElementById('grade_select');
        const subjectSelect = document.getElementById('subject_select');
        const unitSelect = document.getElementById('unit_select');

        // 1. عند تغيير الصف -> جلب المواد
        gradeSelect.addEventListener('change', function() {
            const gradeId = this.value;
            subjectSelect.innerHTML = '<option value="">جاري التحميل...</option>';
            subjectSelect.disabled = true;
            unitSelect.disabled = true;

            if (gradeId) {
                fetch(`/admin/get-subjects/${gradeId}`) // تأكد من مطابقة المسار في الـ Routes
                    .then(res => res.json())
                    .then(data => {
                        subjectSelect.innerHTML = '<option value="">اختر المادة</option>';
                        data.forEach(subject => {
                            subjectSelect.innerHTML += `<option value="${subject.id}">${subject.name}</option>`;
                        });
                        subjectSelect.disabled = false; // فك التجميد هنا
                    });
            }
        });

        // 2. عند تغيير المادة -> جلب الوحدات
        subjectSelect.addEventListener('change', function() {
            const subjectId = this.value;
            unitSelect.innerHTML = '<option value="">جاري التحميل...</option>';
            unitSelect.disabled = true;

            if (subjectId) {
                fetch(`/admin/get-units/${subjectId}`) // تأكد من مطابقة المسار في الـ Routes
                    .then(res => res.json())
                    .then(data => {
                        unitSelect.innerHTML = '<option value="">اختر الوحدة</option>';
                        data.forEach(unit => {
                            unitSelect.innerHTML += `<option value="${unit.id}">${unit.name}</option>`;
                        });
                        unitSelect.disabled = false; // فك التجميد هنا
                    });
            }
        });



        document.addEventListener('DOMContentLoaded', function() {
        // 1. تبديل أقسام الأسئلة (MCQ, TF, Fill)
        const typeRadios = document.querySelectorAll('input[name="type"]');
        typeRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                document.getElementById('section-mcq').style.display = (this.value === 'mcq') ? 'block' : 'none';
                document.getElementById('section-tf').style.display = (this.value === 'tf') ? 'block' : 'none';
                document.getElementById('section-fill').style.display = (this.value === 'fill') ? 'block' : 'none';
            });
        });

        // 2. تغيير شكل الـ Level Pill عند الاختيار (اللون النشط)
        const levelPills = document.querySelectorAll('.level-pill input');
        levelPills.forEach(input => {
            input.addEventListener('change', function() {
                document.querySelectorAll('.level-pill').forEach(p => p.classList.remove('active'));
                if(this.checked) {
                    this.parentElement.classList.add('active');
                }
            });
        });
    });
</script>
</body>
</html>