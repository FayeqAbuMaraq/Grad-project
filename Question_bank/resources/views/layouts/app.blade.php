<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@400;600;700&family=Noto+Naskh+Arabic:wght@400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>منصة بنوك الأسئلة وفق المنهاج الفلسطيني</title>
</head>

<body class="page-home">


    <nav class="navbar navbar-expand-lg sticky-top shadow-sm"
        style="background: rgba(255,255,255,0.75); backdrop-filter: blur(12px);">
        <div class="container">

            <a class="navbar-brand d-flex align-items-center fw-bold brand-gradient" href="#">
                <img class="logo me-2" src="{{ asset('img/logo.jpg') }}" alt="logo">
                منصة بنوك الأسئلة
            </a>


            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarButtons" aria-controls="navbarButtons" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="width:30px; height:30px; background-image:none;">
                    <i class="bi bi-list" style="font-size:28px; color:#2563eb;"></i>
                </span>
            </button>


            <div class="collapse navbar-collapse justify-content-lg-end" id="navbarButtons">

                
                    @auth
                        <div class="dropdown">
                            <a class=" dropdown-toggle text-decoration-none fw-bold" href="#" role="button" data-bs-toggle="dropdown" style="color:#2563eb;">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end text-end">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">الملف الشخصي</a></li>
                                <li><hr class="dropdown-divider"></li>

                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">تسجيل الخروج</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                <div
                    class="d-flex flex-column flex-lg-row gap-2 gap-lg-3 mt-2 mt-lg-0 align-items-end align-items-lg-center">
                    <a href="{{ route('login') }}"
                        class="btn btn-outline-primary fw-bold px-4 py-2 rounded-pill shadow-sm">تسجيل
                        الدخول</a>
                    <a href="{{ route('register') }}" class="btn btn-gradient fw-bold px-4 py-2 rounded-pill shadow-sm"
                        style="background: linear-gradient(135deg,#7c3aed,#2563eb); color:#fff;">
                        إنشاء حساب
                    </a>
                </div>
                @endauth

            </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>


    <footer class="edu-footer mt-5">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-flex justify-content-center justify-content-lg-end align-items-center gap-3 mb-3">
                        <div class="footer-icon"><i class="bi bi-mortarboard-fill"></i></div>
                        <h4 class="mb-0 fw-bold">منصة التعليم</h4>
                    </div>
                    <p class="footer-desc">منصة تعليمية تفاعلية لدعم المنهاج الفلسطيني ومساعدة الطلبة على التفوق
                        الأكاديمي.</p>
                </div>
                <div class="col-lg-4 text-center">
                    <h6 class="fw-semibold mb-3">روابط سريعة</h6>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#">الرئيسية</a></li>
                        <li><a href="#">الأسئلة الشائعة</a></li>
                        <li><a href="#">تواصل معنا</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 text-center text-lg-start">
                    <h6 class="fw-semibold mb-3">معلومات</h6>
                    <p class="small mb-1">📧 fadialaa6407@gmail.com</p>
                    <p class="small mb-1">📞 +972 592 116 407</p>
                    <p class="small">📍 فلسطين</p>
                </div>
            </div>
            <hr class="footer-divider my-4">
            <div class="text-center small opacity-75">© 2026 جميع الحقوق محفوظة – منصة التعليم</div>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>

