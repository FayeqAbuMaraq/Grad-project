@extends('layouts.admin')

@section('title', 'تعديل مادة: ' . $subject->name)

@section('content')
<div class="container-fluid py-4">
    <header class="page-header mb-4">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h4 class="fw-bold mb-1">تعديل المادة</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0" style="background: none; padding: 0;">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.subjects.index') }}">إدارة المواد</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تعديل</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('admin.subjects.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-right"></i> عودة للمواد
            </a>
        </div>
    </header>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-body p-4">
                    <form action="{{ route('admin.subjects.update', $subject->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label fw-semibold">اسم المادة</label>
                            <input type="text" name="name" 
                                   class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                   value="{{ old('name', $subject->name) }}" 
                                   style="background-color: #f8f9fa; border-radius: 8px;" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">الصف الدراسي التابع له</label>
                            <select name="grade_id" class="form-select form-select-lg @error('grade_id') is-invalid @enderror" 
                                    style="background-color: #f8f9fa; border-radius: 8px;" required>
                                @foreach($grades as $grade)
                                    <option value="{{ $grade->id }}" {{ $subject->grade_id == $grade->id ? 'selected' : '' }}>
                                        {{ $grade->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('grade_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 justify-content-end mt-5">
                            <a href="{{ route('admin.subjects.index') }}" class="btn btn-light px-4">إلغاء</a>
                            <button type="submit" class="btn btn-primary px-5 shadow-sm">
                                <i class="bi bi-save"></i> حفظ التعديلات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="card border-0 shadow-sm text-white" style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%); border-radius: 12px;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class="bi bi-exclamation-triangle fs-4 text-warning"></i>
                        </div>
                        <div class="ms-3 small">
                            تأكد من اختيار الصف الصحيح للمادة لضمان ظهورها للطلاب المناسبين.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection