@extends('layouts.admin')

@section('title', 'تعديل السؤال')

@section('content')

<div class="container-fluid py-4">
    <header class="page-header mb-4">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h4 class="fw-bold mb-1">تعديل السؤال</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background: none; padding: 0;">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.questions.index') }}">بنك الأسئلة</a></li>
                        <li class="breadcrumb-item active">تعديل</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('admin.questions.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-right"></i> عودة للأسئلة
            </a>
        </div>
    </header>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <form action="{{ route('admin.questions.update', $question->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- نص السؤال --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold">نص السؤال</label>
                            <textarea name="question_text" class="form-control @error('question_text') is-invalid @enderror" 
                                rows="3" style="background-color: #f8f9fa; border-radius: 8px;" required>{{ old('question_text', $question->question_text) }}</textarea>
                            @error('question_text') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="row">
                            {{-- اختيار الوحدة --}}
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">الوحدة الدراسية</label>
                                <select name="unit_id" class="form-select @error('unit_id') is-invalid @enderror" style="background-color: #f8f9fa;">
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->id }}" {{ $question->unit_id == $unit->id ? 'selected' : '' }}>
                                            {{ $unit->name }} - ({{ $unit->subject->name }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- مستوى الصعوبة --}}
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-bold">مستوى الصعوبة</label>
                                <select name="difficulty" class="form-select" style="background-color: #f8f9fa;">
                                    <option value="easy" {{ $question->difficulty == 'easy' ? 'selected' : '' }}>سهل</option>
                                    <option value="medium" {{ $question->difficulty == 'medium' ? 'selected' : '' }}>متوسط</option>
                                    <option value="hard" {{ $question->difficulty == 'hard' ? 'selected' : '' }}>صعب</option>
                                </select>
                            </div>
                        </div>


                                <div id="options-wrapper">
                                    <label class="form-label fw-bold">الخيارات المسجلة</label>
                                    
                                    @forelse($question->options as $option)
                                        <div class="input-group mb-3 shadow-sm">
                                            <span class="input-group-text bg-white">
                                                <input class="form-check-input" type="radio" name="correct_answer" 
                                                    value="{{ $option->id }}" 
                                                    {{ $question->correct_answer == $option->id ? 'checked' : '' }} required>
                                            </span>
                                            
                                            <input type="text" name="options[{{ $option->id }}]" class="form-control" 
                                                value="{{ old("options.$option->id", $option->option_text) }}" required>
                                        </div>
                                    @empty
                                        <div class="alert alert-danger border-0">
                                            <i class="bi bi-exclamation-octagon"></i> 
                                            عذراً، لم نتمكن من العثور على أي خيارات مرتبطة بهذا السؤال في قاعدة البيانات.
                                        </div>
                                    @endforelse
                                </div>
                </div>
            </div>

                        <div class="d-flex gap-2 justify-content-end mt-4">
                            <a href="{{ route('admin.questions.index') }}" class="btn btn-light px-4">إلغاء</a>
                            <button type="submit" class="btn btn-primary px-5 shadow-sm">حفظ التغييرات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- الجانب الإرشادي الملون --}}
        <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="card border-0 shadow-sm" style="background: #e7f1ff; border-radius: 12px; border-right: 5px solid #0d6efd !important;">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-primary"><i class="bi bi-info-circle"></i> كيف تعدل السؤال؟</h6>
                    <ul class="small text-muted mt-3 ps-3">
                        <li>قم بتعديل نص السؤال في الصندوق الكبير.</li>
                        <li>تأكد من اختيار **دائرة واحدة** فقط بجانب الخيار الصحيح.</li>
                        <li>إذا قمت بتغيير الوحدة، سيتغير تصنيف السؤال تلقائياً.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection