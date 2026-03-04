<x-guest-layout>

<body class="page-student-profile">

    <nav class="navbar student-header px-4 py-3">
        <div class="header-simple">
            <a class="brand-wrap text-decoration-none text-dark d-flex align-items-center gap-2" href="../index.html">
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
        <div class="profile-card p-4 p-md-5">
            <div class="text-center mb-4">
                <div class="profile-avatar mx-auto mb-3">
                    <i class="bi bi-person"></i>
                </div>
                <h2 class="fw-bold mb-1">الملف الشخصي</h2>
                <p class="text-muted mb-0">حدّث بياناتك والصف الدراسي</p>
            </div>

            <form id="profileForm" class="row g-3">
                <div class="col-12 col-md-6">
                    <label class="form-label">الاسم الكامل</label>
                    <input id="profileName" type="text" class="form-control" placeholder="مثال: أحمد محمد" required>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label">البريد الإلكتروني</label>
                    <input id="profileEmail" type="email" class="form-control" placeholder="example@email.com" required>
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label">الصف الدراسي</label>
                    <select id="profileGrade" class="form-select" required>
                        <option value="" disabled>اختر الصف</option>
                        <option value="1">الصف الأول (أساسي)</option>
                        <option value="2">الصف الثاني (أساسي)</option>
                        <option value="3">الصف الثالث (أساسي)</option>
                        <option value="4">الصف الرابع (أساسي)</option>
                        <option value="5">الصف الخامس (أساسي)</option>
                        <option value="6">الصف السادس (أساسي)</option>
                        <option value="7">الصف السابع (إعدادي)</option>
                        <option value="8">الصف الثامن (إعدادي)</option>
                        <option value="9">الصف التاسع (إعدادي)</option>
                        <option value="10">الصف العاشر (ثانوي)</option>
                        <option value="11s">الصف الحادي عشر - علمي</option>
                        <option value="11a">الصف الحادي عشر - أدبي</option>
                        <option value="12s">الصف الثاني عشر - علمي</option>
                        <option value="12a">الصف الثاني عشر - أدبي</option>
                    </select>
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label">كلمة المرور (اختياري)</label>
                    <input type="password" class="form-control" placeholder="كلمة مرور جديدة">
                </div>

                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">حفظ التغييرات</button>
                </div>
            </form>

            <div id="profileAlert" class="alert alert-success mt-4 d-none" role="alert">
                تم حفظ البيانات بنجاح.
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</x-guest-layout>

