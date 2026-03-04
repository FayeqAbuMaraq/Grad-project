@extends('layouts.admin')

@section('title', 'إدارة الأسئلة')

@section('body-class', 'page-admin-questions')

@section('content')
    <header class="page-header">
    <div>
        <div class="page-title-row">
        <h4 class="mb-1">إدارة الأسئلة</h4>
        <span class="page-tag">لوحة الإدارة</span>
        </div>
        <p class="text-muted mb-0">مرحباً بك في لوحة إدارة منصة بنوك الأسئلة</p>
        <nav class="breadcrumb-lite" aria-label="مسار الصفحة">
        <span>لوحة التحكم</span>
        <i class="bi bi-chevron-left"></i>
        <span>إدارة الأسئلة</span>
        </nav>


    </div>
    <button class="btn mobile-menu-btn d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#adminSidebar">
        <i class="bi bi-list"></i> القائمة
    </button>
    </header>

    <section class="header-actions">
    <div>
        <h5 class="mb-1">إدارة الأسئلة</h5>
        <p class="text-muted mb-0">إضافة وإدارة الأسئلة وربطها بالوحدات الدراسية</p>
        <div class="breadcrumbs">
        <span>صف</span>
        <span class="sep">/</span>
        <span>مادة</span>
        <span class="sep">/</span>
        <span>وحدة</span>
        <span class="sep">/</span>
        <span>سؤال</span>
        </div>
    </div>
    <div class="actions-group">
        <button class="btn add-btn" data-bs-toggle="modal" data-bs-target="#addQuestionModal">
        <i class="bi bi-plus-lg"></i> إضافة سؤال جديد
        </button>
        <button class="btn filter-btn"><i class="bi bi-funnel"></i> تصفية</button>
    </div>
    </section>
    <section class="questions-list">
        @foreach($questions as $question)
            <div class="question-card reveal">
                <div class="q-head">
                        @if($question->difficulty == 'easy')
                            <span class="level easy">سهل</span>
                        @elseif($question->difficulty == 'medium')
                            <span class="level medium">متوسط</span>
                        @elseif($question->difficulty == 'hard')
                            <span class="level hard">صعب</span>
                        @endif
                    <div class="q-actions">
                        {{-- زر الحذف --}}
                        <form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="icon-btn delete" type="submit" onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>
                        
                        {{-- زر التعديل --}}
                        <a href="{{ route('admin.questions.edit', $question->id) }}" 
                        class="icon-btn edit" 
                        title="تعديل السؤال" 
                        style="text-decoration: none;">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </div>
                </div>

                <div class="q-title">
                    <h6>{{ $question->question_text }}</h6>
                    <span class="q-icon"><i class="bi bi-question-circle"></i></span>
                </div>

                <div class="q-meta">
                    {{ $question->unit->subject->grade->name ?? '' }} • 
                    {{ $question->unit->subject->name ?? '' }} • 
                    {{ $question->unit->name ?? '' }}
                </div>

                <div class="q-options">
                    @foreach($question->options as $option)
                        <label class="q-option {{ $option->is_correct ? 'correct' : '' }}">
                            <input type="radio" name="q{{ $question->id }}" {{ $option->is_correct ? 'checked' : '' }} disabled>
                            <span>{{ $option->option_text }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        @endforeach
    </section>

    <!-- Modals -->
<div class="modal fade" id="addQuestionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">إضافة سؤال جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.questions.store') }}" method="POST" id="questionForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 qtype-section form-section">
                        <label class="form-label">نوع السؤال</label>
                        <div class="type-grid">
                            <label class="type-card">
                                <input type="radio" name="type" value="mcq" checked>
                                <span>اختر من متعدد</span>
                            </label>
                            <label class="type-card">
                                <input type="radio" name="type" value="tf">
                                <span>صح أو خطأ</span>
                            </label>
                            <label class="type-card">
                                <input type="radio" name="type" value="fill">
                                <span>اكمل الفراغ</span>
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">نص السؤال</label>
                        <input type="text" name="question_text" class="form-control" placeholder="مثال: ما ناتج جمع 5 + 3 ؟" required>
                    </div>

                    <div class="row g-2 mb-3 form-section">
                        <div class="col-md-4">
                            <label class="form-label">الصف</label>
                            <select class="form-select" id="grade_select">
                                <option value="">اختر الصف</option>
                                @foreach($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">المادة</label>
                            <select class="form-select" id="subject_select" disabled>
                                <option value="">اختر المادة</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">الوحدة</label>
                            <select name="unit_id" class="form-select" id="unit_select" disabled required>
                                <option value="">اختر الوحدة</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 options-mcq form-section" id="section-mcq">
                        <label class="form-label">الخيارات (اختيار من متعدد)</label>
                        <div class="choices">
                            @for($i = 0; $i < 4; $i++)
                            <label class="choice-item">
                                <input type="radio" name="is_correct" value="{{ $i }}" {{ $i == 0 ? 'checked' : '' }}>
                                <input type="text" name="options[]" class="form-control" placeholder="الخيار {{ $i + 1 }}">
                            </label>
                            @endfor
                        </div>
                        <div class="form-hint">حدد الإجابة الصحيحة عبر تحديد الدائرة.</div>
                    </div>

                    <div class="mb-3 options-tf form-section" id="section-tf" style="display: none;">
                        <label class="form-label">الإجابة (صح/خطأ)</label>
                        <div class="choices">
                            <label class="choice-item">
                                <input type="radio" name="tf_answer" value="1">
                                <input type="text" class="form-control" value="صح" readonly>
                            </label>
                            <label class="choice-item">
                                <input type="radio" name="tf_answer" value="0">
                                <input type="text" class="form-control" value="خطأ" readonly>
                            </label>
                        </div>
                    </div>

                    <div class="mb-3 options-fill form-section" id="section-fill" style="display: none;">
                        <label class="form-label">الإجابة الصحيحة (اكمل الفراغ)</label>
                        <input type="text" name="fill_answer" class="form-control" placeholder="اكتب الإجابة الصحيحة">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">مستوى الصعوبة</label>
                        <div class="level-grid">
                            <label class="level-pill">
                                <input type="radio" name="difficulty" value="easy">
                                <span>سهل</span>
                            </label>
                            <label class="level-pill active">
                                <input type="radio" name="difficulty" value="medium" checked>
                                <span>متوسط</span>
                            </label>
                            <label class="level-pill">
                                <input type="radio" name="difficulty" value="hard">
                                <span>صعب</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">حفظ السؤال</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection