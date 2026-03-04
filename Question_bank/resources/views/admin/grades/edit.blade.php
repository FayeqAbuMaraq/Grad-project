@extends('layouts.admin')

@section('title', 'تعديل الصف')

@section('content')
<div class="container-fluid py-4">
    {{-- هيدر الصفحة --}}
    <header class="page-header mb-4">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h4 class="fw-bold mb-1">تعديل الصف الدراسي</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background: none; padding: 0;">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.grades.index') }}">إدارة الصفوف</a></li>
                        <li class="breadcrumb-item active">تعديل</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('admin.grades.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-right"></i> عودة للقائمة
            </a>
        </div>
    </header>

    <div class="row">
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-body p-4">
                    <form action="{{ route('admin.grades.update', $grade->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label fw-bold">اسم الصف الدراسي</label>
                            <input type="text" name="name" 
                                   class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                   value="{{ old('name', $grade->name) }}" 
                                   style="background-color: #f8f9fa; border-radius: 10px;" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">المرحلة الدراسية</label>
                            <select name="stage" class="form-select form-select-lg @error('stage') is-invalid @enderror" 
                                    style="background-color: #f8f9fa; border-radius: 10px;" required>
                                <option value="primary" {{ $grade->stage == 'primary' ? 'selected' : '' }}>أساسي</option>
                                <option value="middle" {{ $grade->stage == 'middle' ? 'selected' : '' }}>إعدادي</option>
                                <option value="high" {{ $grade->stage == 'high' ? 'selected' : '' }}>ثانوي</option>
                            </select>
                            @error('stage')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex gap-2 justify-content-end mt-5">
                            <a href="{{ route('admin.grades.index') }}" class="btn btn-light px-4">إلغاء</a>
                            <button type="submit" class="btn btn-primary px-5 shadow-sm">
                                <i class="bi bi-check-lg"></i> حفظ التعديل
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- قسم الملاحظة الجانبي --}}
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm text-white" style="background: linear-gradient(45deg, #4e73df, #224abe); border-radius: 15px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold"><i class="bi bi-info-circle"></i> ملاحظة هامة</h5>
                    <p class="small opacity-75 mt-3">
                        تعديل اسم الصف سيظهر فوراً للطلاب في واجهة الاختبارات. تأكد من كتابة الاسم بشكل صحيح لضمان سهولة التصفح.
                    </p>
                    <hr class="opacity-25">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-layers fs-1 opacity-25"></i>
                        <div class="ms-auto text-end">
                            <span class="d-block small">عدد المواد المرتبطة</span>
                            <h3 class="fw-bold mb-0">{{ $grade->subjects->count() }} مواد</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection