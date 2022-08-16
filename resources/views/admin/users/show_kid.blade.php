@extends('admin.layout')
@section('page_title', 'Show kid')
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">الأطفال التابعين للمستخدم </h1>
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary mb-2 "><i
                        class="bi bi-caret-left-fill ms-1"></i> رجوع</a>
                </h1>
            </div>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-4 mb-3">تفاصيل عن الطفل التابع للمستخدم : "{{ $kid->kid_name }}" </h5>
                            <div class="container-fluid">
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">#</div>
                                    <div class="col-lg-9 col-md-8">{{ $kid->id }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">صورة المستخدم</div>

                                    {{-- @if ($ki->image)
                                        <div class="col-lg-9 col-md-8">
                                            <img id="image" src="{{ asset('storage/' . $kid->image) }}" alt=""
                                                height="100" width="150">
                                        </div>
                                    @else
                                        المستخدم ليس له صورة غلاف
                                    @endif --}}
                                    {{-- <div class="col-lg-9 col-md-8">
                                        <img id="image" src="{{ asset('storage/' . $kid->image) }}" alt=""
                                            height="100" width="150">
                                    </div> --}}
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">أسم الطفل</div>
                                    <div class="col-lg-9 col-md-8">{{ $kid->kid_name }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">النوع</div>
                                    <div class="col-lg-9 col-md-8">{{ $kid->gender }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">تاريخ الميلاد</div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->birth_date }} </div>
                                </div>


                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">صلة القرابه</div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->relative_relation }} </div>
                                </div>


                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">عنوان المنزل </div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->home_address }} </div>
                                </div>


                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">
                                        هل الطفل مسجل في مدرسة </div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->is_child_registered_school }} </div>
                                </div>


                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">المرحلة الدراسية</div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->educational_level }} </div>
                                </div>


                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">بيانات الشخص الاول في الحالات
                                        الطارئة </div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->emergency_first_name }} </div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->emergency_first_phone }} </div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->emergency_first_relation }} </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">بيانات الشخص الثانى في الحالات
                                        الطارئة </div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->emergency_second_name }} </div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->emergency_second_phone }} </div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->emergency_second_relation }} </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">هل يعاني الطالب من الحساسية
                                        الغذائية </div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->kid_suffer_food_allergies }} </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">المواد الغذائية المسببة
                                        للحساسية </div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->if_yes_suffer_food_allergens }} </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">هل يعاني الطالب من أي نوع آخر
                                        من الحساسية </div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->kid_suffer_other_type_of_allergy }} </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">نوع الحساسية </div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->if_yes_state_the_type_of_allergy }} </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold"> هل يتطلب استخدام حقنة
                                        الأدرينالين </div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->use_injection_of_epinephrine }} </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">تقرير طبي</div>
                                    <div class="col-lg-9 col-md-8">
                                        <img id="image" src="{{ asset('storage/' . $kid->medical_report_image) }}"
                                            alt="" height="100" width="150">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">هل الطالب من ذوي الاحتياجات
                                        الخاصة </div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->kid_with_special_needs }} </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold"> وصف الحالة </div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->if_yes_special_needs }} </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold"> أعراض صحية يعاني </div>
                                    <div class="col-lg-9 col-md-8"> {{ $kid->another_health_symptoms }} </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">الصور</div>
                                    <div class="col-lg-9 col-md-8">
                                        <img id="image" src="{{ asset('storage/' . $kid->recent_kid_photo) }}"
                                            alt="" height="100" width="150">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">الصور</div>
                                    <div class="col-lg-9 col-md-8">
                                        <img id="image" src="{{ asset('storage/' . $kid->family_card_image) }}"
                                            alt="" height="100" width="150">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">الصور</div>
                                    <div class="col-lg-9 col-md-8">
                                        <img id="image" src="{{ asset('storage/' . $kid->birth_record_image) }}"
                                            alt="" height="100" width="150">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">الصور</div>
                                    <div class="col-lg-9 col-md-8">
                                        <img id="image" src="{{ asset('storage/' . $kid->vaccination_card_image) }}"
                                            alt="" height="100" width="150">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">الصور</div>
                                    <div class="col-lg-9 col-md-8">
                                        <img id="image" src="{{ asset('storage/' . $kid->other_documents) }}"
                                            alt="" height="100" width="150">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">تاريخ الانشاء</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ $kid->created_at?->translatedFormat('l , j F Y , H:i:s') ?? 'N/A' }}
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">تاريخ التعديل </div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ $kid->updated_at?->translatedFormat('l , j F Y , H:i:s') ?? 'N/A' }}
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
