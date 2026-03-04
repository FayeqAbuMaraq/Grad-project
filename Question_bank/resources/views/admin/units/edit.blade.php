@extends('layouts.admin')

@section('title', 'تعديل الوحدة: ' . $unit->name)

@section('content')
<div class="container-fluid py-4">
    {{-- هيدر الصفحة --}}
    <header class="page-header mb-4">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h4 class="fw-bold mb-1">تعديل الوحدة الدراسية</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background: none; padding: 0;">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.units.index') }}">إدارة الوحدات</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تعديل وحدة</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('admin.units.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-right"></i> عودة للقائمة
            </a>
        </div>
    </header>

    <div class="row">
        {{-- قسم الفورم --}}
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <form action="{{ route('admin.units.update', $unit->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label fw-semibold">اسم الوحدة</label>
                            <input type="text" name="name" 
                                   class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                   value="{{ old('name', $unit->name) }}" 
                                   style="background-color: #f8f9fa; border-radius: 8px;" 
                                   placeholder="مثال: الوحدة الأولى: الجبر" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">المادة الدراسية التابعة لها</label>
                            <select name="subject_id" class="form-select form-select-lg @error('subject_id') is-invalid @enderror" 
                                    style="background-color: #f8f9fa; border-radius: 8px;" required>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ $unit->subject_id == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->name }} - ({{ $subject->grade->name }})
                                    </option>
                                @endforeach
                            </select>
                            @error('subject_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 justify-content-end mt-5">
                            <a href="{{ route('admin.units.index') }}" class="btn btn-light px-4">إلغاء</a>
                            <button type="submit" class="btn btn-primary px-5 shadow-sm">
                                <i class="bi bi-save"></i> حفظ التعديلات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="card border-0 shadow-sm" style="background-color: #fff3cd; border-right: 5px solid #ffc107 !important; border-radius: 12px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-warning-dark"><i class="bi bi-lightbulb"></i> نصيحة تنظيمية</h5>
                    <p class="small text-muted mb-0">
                        يفضل دائماً كتابة رقم الوحدة قبل اسمها (مثلاً: الوحدة الثانية: ...) ليسهل على الطلاب البحث عنها وترتيب الأسئلة بداخلها لاحقاً.
                    </p>
                    <hr>
                    <p class="small mb-0 text-muted">
                        <i class="bi bi-info-circle"></i> تغيير المادة سيؤدي لنقل هذه الوحدة بكامل أسئلتها إلى المادة الجديدة.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection