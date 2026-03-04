@extends('layouts.admin')

@section('title', 'إدارة الوحدات')

@section('body-class', 'page-admin-units')

@section('content')
    <header class="page-header">
    <div>
        <div class="page-title-row">
        <h4 class="mb-1">إدارة الوحدات</h4>
        <span class="page-tag">لوحة الإدارة</span>
        </div>
        <p class="text-muted mb-0">مرحباً بك في لوحة إدارة منصة بنوك الأسئلة</p>
        <nav class="breadcrumb-lite" aria-label="مسار الصفحة">
        <span>لوحة التحكم</span>
        <i class="bi bi-chevron-left"></i>
        <span>إدارة الوحدات</span>
        </nav>


    </div>
    <button class="btn mobile-menu-btn d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#adminSidebar">
        <i class="bi bi-list"></i> القائمة
    </button>
    </header>

    <section class="header-actions">
    <div>
        <h5 class="mb-1">إدارة الوحدات الدراسية</h5>
        <p class="text-muted mb-0">إضافة وإدارة الوحدات وربطها بالمواد والصفوف</p>
    </div>
    <button class="btn add-btn" data-bs-toggle="modal" data-bs-target="#addUnitModal">
        <i class="bi bi-plus-lg"></i> إضافة وحدة جديدة
    </button>
    </section>

    <section class="units-grid">
        @foreach($units as $unit)
            <div class="unit-card reveal">
                <div class="card-actions">
                    {{-- زر الحذف --}}
                    <form action="{{ route('admin.units.destroy', $unit->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="icon-btn delete" type="submit" onclick="return confirm('هل أنت متأكد من حذف هذه الوحدة؟')" aria-label="حذف">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </form>

                    {{-- زر التعديل --}}
                    <a href="{{ route('admin.units.edit', $unit->id) }}" 
                    class="icon-btn edit" 
                    title="تعديل الوحدة" 
                    aria-label="تعديل">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </div>

                <div class="card-icon"><i class="bi bi-layers"></i><span>{{ $loop->iteration }}</span></div>
                
                <h6>{{ $unit->name }}</h6>
                
                <div class="unit-meta">
                    <div><i class="bi bi-journal-text"></i> {{ $unit->subject->name ?? 'مادة غير محددة' }}</div>
                    <div><i class="bi bi-mortarboard"></i> {{ $unit->subject->grade->name ?? 'صف غير محدد' }}</div>
                </div>

                {{-- <div class="card-footer">
                    <div><i class="bi bi-question-circle"></i> {{ $unit->questions_count ?? 0 }} الأسئلة</div>
                </div>  --}}
            </div>
        @endforeach
    </section>
    <!-- Modals -->
    <div class="modal fade" id="addUnitModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">إضافة وحدة جديدة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.units.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">اسم الوحدة</label>
                            <input type="text" name="name" class="form-control" placeholder="مثال: الأعداد الحقيقية" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">المادة والصف</label>
                            <select name="subject_id" class="form-select" required>
                                <option value="" selected disabled>اختر المادة...</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">
                                        {{ $subject->name }} - {{ $subject->grade->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">حفظ الوحدة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection