@extends('admin.layout')
@section('page_title', 'Update Settings')
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">الأعدادات
                    <a href="{{ route('admin.settings.index') }}" class="ms-3 btn btn-outline-primary mb-2 "><i
                            class="bi bi-caret-left-fill"></i> Back</a>
                </h1>
            </div>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-4 mb-3">التعديل على الأعدادات </h5>
                            <form method="POST" action="{{ route('admin.settings.update', $setting->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label">اللوجو</label>
                                    <div class="col-sm-10">
                                        <input name="logo" type="file" id="logo"
                                            class="form-control mb-3 @error('logo') is-invalid @enderror">
                                        @error('logo')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                        <img id="logo" src="{{ asset('storage/' . $setting->logo) }}"
                                            style="height: 80px; width: 100px;" alt="no logo uploaded">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="title" class="col-sm-2 col-form-label">العنوان </label>
                                    <div class="col-sm-10">
                                        <input name="title" type="text" id="title" placeholder="ادخل عنوان للموقع"
                                            value="{{ old('title', $setting->title) }}"
                                            class="form-control @error('title') is-invalid @enderror">
                                        @error('title')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="description" class="col-sm-2 col-form-label">الوصف</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" id="description" rows="4" placeholder="ادخل وصف للموقع"
                                            class="col-sm-12 form-control @error('description') is-invalid @enderror">{{ old('description', $setting->description) }}</textarea>
                                        @error('description')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label">صوره للموقع</label>
                                    <div class="col-sm-10">
                                        <input name="image" type="file" id="image"
                                            class="form-control mb-3 @error('image') is-invalid @enderror">
                                        @error('image')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                        <img id="image" src="{{ asset('storage/' . $setting->image) }}"
                                            style="height: 80px; width: 100px;" alt="no image uploaded">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="region" class="col-sm-2 col-form-label">المنطقه</label>
                                    <div class="col-sm-10">
                                        <input name="region" type="text" id="region" placeholder="ادخل اسم المنطقه"
                                            value="{{ old('region', $setting->region) }}"
                                            class="form-control @error('region') is-invalid @enderror">
                                        @error('region')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="street" class="col-sm-2 col-form-label">الشارع </label>
                                    <div class="col-sm-10">
                                        <input name="street" type="text" id="street" placeholder="ادخل اسم الشارع"
                                            value="{{ old('street', $setting->street) }}"
                                            class="form-control @error('street') is-invalid @enderror">
                                        @error('street')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="phone" class="col-sm-2 col-form-label">رقم الهاتف </label>
                                    <div class="col-sm-10">
                                        <input name="phone" type="text" id="phone" placeholder="ادخل رقم الهاتف"
                                            value="{{ old('phone', $setting->phone) }}"
                                            class="form-control @error('phone') is-invalid @enderror">
                                        @error('phone')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="email" class="col-sm-2 col-form-label">البريد الالكترونى </label>
                                    <div class="col-sm-10">
                                        <input name="email" type="email" id="email"
                                            placeholder="ادخل عنوان البريدالالكترونى"
                                            value="{{ old('email', $setting->email) }}"
                                            class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="evening_care_times" class="col-sm-2 col-form-label">مواعيد الرعايه
                                        المسائيه
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="evening_care_times" type="evening_care_times"
                                            id="evening_care_times" placeholder="ادخل عنوان البريدالالكترونى"
                                            value="{{ old('evening_care_times', $setting->evening_care_times) }}"
                                            class="form-control @error('evening_care_times') is-invalid @enderror">
                                        @error('evening_care_times')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="day_care_times" class="col-sm-2 col-form-label"> مواعيد الرعايه النهاريه
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="day_care_times" type="day_care_times" id="day_care_times"
                                            placeholder="ادخل عنوان البريدالالكترونى"
                                            value="{{ old('day_care_times', $setting->day_care_times) }}"
                                            class="form-control @error('day_care_times') is-invalid @enderror">
                                        @error('day_care_times')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <label for="daily_care_times" class="col-sm-2 col-form-label"> مواعيد الرعايه اليوميه
                                    </label>
                                    <div class="col-sm-10">
                                        <input name="daily_care_times" type="daily_care_times" id="daily_care_times"
                                            placeholder="ادخل عنوان البريدالالكترونى"
                                            value="{{ old('daily_care_times', $setting->daily_care_times) }}"
                                            class="form-control @error('daily_care_times') is-invalid @enderror">
                                        @error('daily_care_times')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">تعديل</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
