@extends('admin.layout')
@section('page_title', "Show $setting->title setting")
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">الأعدادات</h1>
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
                <a href="{{ route('admin.settings.index') }}" class="btn btn-primary mb-2 "><i
                        class="bi bi-caret-left-fill ms-1"></i>رجوع</a>
            </div>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-4 mb-3"> عرض كل تفاصيل الأعدادات </h5>
                            <div class="container-fluid">
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold"> # </div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->id }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">اللوجو</div>
                                    <div class="col-lg-9 col-md-8">
                                        <img id="image" src="{{ asset('storage/' . $setting->logo) }}" alt=""
                                            height="100" width="150">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">العنوان الرئيسى</div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->title }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">وصف عن الموقع</div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->description }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">صوره عن الموقع</div>
                                    <div class="col-lg-9 col-md-8">
                                        <img id="image" src="{{ asset('storage/' . $setting->image) }}" alt=""
                                            height="100" width="150">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">عنوان المنطقه</div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->region }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">عنوان الشارع</div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->street }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">رقم الهاتف</div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->phone }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">البريد الالكترونى</div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->email }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold"> مواعيد الرعايه المسائيه
                                    </div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->evening_care_times }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold"> مواعيد الرعايه النهاريه
                                    </div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->day_care_times }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold"> مواعيد الرعايه اليوميه </div>
                                    <div class="col-lg-9 col-md-8">{{ $setting->daily_care_times }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">تاريخ الانشاء</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ $setting->created_at->translatedFormat('l , j F Y , H:i:s') }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">تاريخ التعديل</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ $setting->updated_at->translatedFormat('l , j F Y , H:i:s') }}</div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
