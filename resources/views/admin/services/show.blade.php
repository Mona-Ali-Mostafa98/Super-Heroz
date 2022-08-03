@extends('admin.layout')
@section('page_title', 'Show Services')
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">الخدمات
                    <a href="{{ route('admin.services.index') }}" class="ms-3 btn btn-outline-primary mb-2 "><i
                            class="bi bi-caret-left-fill"></i> Back</a>
                </h1>
            </div>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-4 mb-3">تفاصيل عن خدمة "{{ $service->title }}" </h5>
                            <div class="container-fluid">
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">#</div>
                                    <div class="col-lg-9 col-md-8">{{ $service->id }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">الصور</div>
                                    <div class="col-lg-9 col-md-8">
                                        <img id="image" src="{{ asset('storage/' . $service->image) }}" alt=""
                                            height="100" width="150">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">العنوان</div>
                                    <div class="col-lg-9 col-md-8">{{ $service->title }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">العمر</div>
                                    <div class="col-lg-9 col-md-8">{{ $service->age }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">الوصف</div>
                                    <div class="col-lg-9 col-md-8">{{ $service->description }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">الميزه</div>
                                    <div class="col-lg-9 col-md-8">{{ $service->advantage }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">الحاله </div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ $service->status }}
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">تاريخ الانشاء</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ $service->created_at->translatedFormat('l , j F Y , H:i:s') }}
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">تاريخ التعديل </div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ $service->updated_at->translatedFormat('l , j F Y , H:i:s') }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection