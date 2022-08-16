@extends('website.layout')
@section('content')
    <main class="main-content col-xs-12">
        <div class="breads col-xs-12" style="background-image: url({{ asset('website/images/slide.jpg') }});">
            <div class="container">
                <h3>إضافة طفلك</h3>
                <ul>
                    <li>
                        <a href="{{ route('website.index') }}">الرئيسية</a>
                    </li>
                    <li>اضافة طفل</li>
                </ul>
            </div>
        </div>
        <div class="s-wrap col-xs-12">
            <div class="container">
                <div class="kid-space col-xs-12">
                    {{-- @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif --}}

                    <form action="{{ route('website.add_kid.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input name="user_id" type="text" value="{{ Auth::user()->id }}" hidden>
                        <ul class="nav-tabs col-xs-12">
                            <li class="active">
                                <a href="#" data-toggle="tab" data-target="#kid_infos">معلومات الطفل</a>
                            </li>
                            <li class="disabled">
                                <a href="#" data-toggle="tab" data-target="#kid_enrollment">الحضور والانصراف</a>
                            </li>
                            <li class="disabled">
                                <a href="#" data-toggle="tab" data-target="#kid_medics">معلومات طبيه</a>
                            </li>
                            <li class="disabled">
                                <a href="#" data-toggle="tab" data-target="#kid_docs">المستندات المطلوبة</a>
                            </li>
                        </ul>
                        <div class="tab-content col-xs-12">
                            <div class="tab-pane fade active in" id="kid_infos">
                                <div class="c-card col-xs-12">
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>اسم الطفل ثلاثي</h5>
                                        <input name="kid_name" type="text" class="form-control"
                                            placeholder="اسم الطفل يكتب هنا" value="{{ old('kid_name') }}">
                                        @error('kid_name')
                                            <p class="errors">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>الجنس</h5>
                                        <select name="gender" class="form-control">
                                            <option selected disabled>يرجى الاختيار</option>
                                            <option value="ذكر" @if (old('gender') == 'ذكر') selected @endif>ذكر
                                            </option>
                                            <option value="أنثى" @if (old('gender') == 'أنثى') selected @endif>أنثى
                                            </option>
                                        </select>
                                        @error('gender')
                                            <p class="errors">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>تاريخ الميلاد</h5>
                                        <input name="birth_date" type="date" class="form-control"
                                            placeholder="mm/dd/yyyy" value="{{ old('birth_date') }}">
                                        {{-- <i class="la la-calendar"></i> --}}
                                        @error('birth_date')
                                            <p class="errors">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>صلة القرابة</h5>
                                        <input name="relative_relation" type="text" class="form-control"
                                            placeholder="صلةالقرابه تكتب هنا" value="{{ old('relative_relation') }}">
                                        @error('relative_relation')
                                            <p class="errors">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>عنوان المنزل</h5>
                                        <input name="home_address" type="text" class="form-control"
                                            placeholder="الحى - الشارع" value="{{ old('home_address') }}">
                                        @error('home_address')
                                            <p class="errors">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>هل الطفل مسجل في مدرسة</h5>
                                        <select name="is_child_registered_school" class="form-control">
                                            <option selected disabled>يرجى الاختيار</option>
                                            <option value="نعم" @if (old('is_child_registered_school') == 'نعم') selected @endif>نعم
                                            </option>
                                            <option value="لا" @if (old('is_child_registered_school') == 'لا') selected @endif>لا
                                            </option>
                                        </select>
                                        @error('is_child_registered_school')
                                            <p class="errors">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>المرحلة الدراسية</h5>
                                        <input name="educational_level" type="text" class="form-control"
                                            placeholder="اكتب المرحلة الدراسية" value="{{ old('educational_level') }}">
                                        @error('educational_level')
                                            <p class="errors">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <h3>الرجاء إضافة شخصين في الحالات الطارئة</h3>
                                    </div>
                                    <div class="list-person col-xs-12">
                                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                            <h6>1</h6>
                                            <div>
                                                <h5>الاسم الثلاثي</h5>
                                                <input name="emergency_first_name" type="text" class="form-control"
                                                    value="{{ old('emergency_first_name') }}">
                                                @error('emergency_first_name')
                                                    <p class="errors">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                            <h5>رقم الجوال</h5>
                                            <input name="emergency_first_phone" type="text" class="form-control"
                                                value="{{ old('emergency_first_phone') }}">
                                            @error('emergency_first_phone')
                                                <p class="errors">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                            <h5>صلة القرابة</h5>
                                            <input name="emergency_first_relation" type="text" class="form-control"
                                                value="{{ old('emergency_first_relation') }}">
                                            @error('emergency_first_relation')
                                                <p class="errors">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="list-person col-xs-12">
                                        <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                            <h6>2</h6>
                                            <div>
                                                <h5>الاسم الثلاثي</h5>
                                                <input name="emergency_second_name" type="text" class="form-control"
                                                    value="{{ old('emergency_second_name') }}">
                                                @error('emergency_second_name')
                                                    <p class="errors">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                            <h5>رقم الجوال</h5>
                                            <input name="emergency_second_phone" type="text" class="form-control"
                                                value="{{ old('emergency_second_phone') }}">
                                            @error('emergency_second_phone')
                                                <p class="errors">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                            <h5>صلة القرابة</h5>
                                            <input name="emergency_second_relation" type="text" class="form-control"
                                                value="{{ old('emergency_second_relation') }}">
                                            @error('emergency_second_relation')
                                                <p class="errors">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <button type="button" class="btn next-step">التالى</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kid_enrollment">
                                <div class="c-card col-xs-12">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <h3>الرجاء أضافة أسماء الأشخاص المسموح لهم بأخذ الطالب من المركز</h3>
                                    </div>
                                    <div class="append-persons col-xs-12">
                                        <div class="list-person col-xs-12" id="p_spec">
                                            <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                                <h6>1</h6>
                                                <div>
                                                    <h5>الاسم الثلاثي</h5>
                                                    <input name="addmore[0][person_name]" type="text"
                                                        class="form-control"
                                                        value="{{ old('addmore[0][person_name]') }}">
                                                    @error('addmore[0][person_name]')
                                                        <p class="errors">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                                <h5>رقم الجوال</h5>
                                                <input name="addmore[0][person_phone]" type="text"
                                                    class="form-control" value="{{ old('addmore[0][person_phone]') }}">
                                                @error('addmore[0][person_phone]')
                                                    <p class="errors">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                                <h5>صلة القرابة</h5>
                                                <input name="addmore[0][relation_to_kid]" type="text"
                                                    class="form-control"
                                                    value="{{ old('addmore[0][relation_to_kid]') }}">
                                                @error('addmore[0][relation_to_kid]')
                                                    <p class="errors">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            {{-- <div class="form-group col-md-2 col-sm-4 col-xs-12">
                                                <button type="button" class="btn btn-danger remove-tr">Remove</button>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <button type="button" class="btn add-n">
                                            <i class="la la-plus"></i>
                                            اضافة شخص اخر
                                        </button>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <button type="button" class="btn prev-step">السابق</button>
                                        <button type="button" class="btn next-step">التالى</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kid_medics">
                                <div class="c-card col-xs-12">
                                    <div class="form-group col-md-5 col-sm-6 col-xs-12">
                                        <h5>هل يعاني الطالب من الحساسية الغذائية</h5>
                                        <div class="f-labels">
                                            <label>
                                                <input name="kid_suffer_food_allergies" type="radio" value="نعم"
                                                    @if (old('kid_suffer_food_allergies') == 'نعم') checked @endif>
                                                <span>نعم</span>
                                            </label>
                                            <label>
                                                <input name="kid_suffer_food_allergies" type="radio" value="لا"
                                                    @if (old('kid_suffer_food_allergies') == 'لا') checked @endif>
                                                <span>لا</span>
                                            </label>
                                            @error('kid_suffer_food_allergies')
                                                <p class="errors">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-7 col-sm-6 col-xs-12">
                                        <h5>في حال الإجابة بنعم الرجاء كتابة المواد الغذائية المسببة للحساسية</h5>
                                        <input name="if_yes_suffer_food_allergens" type="text" class="form-control"
                                            value="{{ old('if_yes_suffer_food_allergens') }}">
                                        @error('if_yes_suffer_food_allergens')
                                            <p class="errors">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-5 col-sm-6 col-xs-12">
                                        <h5>هل يعاني الطالب من أي نوع آخر من الحساسية</h5>
                                        <div class="f-labels">
                                            <label>
                                                <input name="kid_suffer_other_type_of_allergy" type="radio"
                                                    value="نعم" @if (old('kid_suffer_other_type_of_allergy') == 'نعم') checked @endif>
                                                <span>نعم</span>
                                            </label>
                                            <label>
                                                <input name="kid_suffer_other_type_of_allergy" type="radio"
                                                    value="لا" @if (old('kid_suffer_other_type_of_allergy') == 'لا') checked @endif>
                                                <span>لا</span>
                                            </label>
                                            @error('kid_suffer_other_type_of_allergy')
                                                <p class="errors">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-7 col-sm-6 col-xs-12">
                                        <h5>في حال الإجابة بنعم الرجاء ذكر نوع الحساسية</h5>
                                        <input name="if_yes_state_the_type_of_allergy" type="text"
                                            class="form-control" value="{{ old('if_yes_state_the_type_of_allergy') }}">
                                        @error('if_yes_state_the_type_of_allergy')
                                            <p class="errors">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-5 col-sm-6 col-xs-12">
                                        <h5>في حال تعرض الطالب لإحدى مسببات الحساسية هل يتطلب استخدام حقنة الأدرينالين
                                            (الإبينفرين)، في حالة الطوارئ، أي عند ظهور أي عرض من أعراض صدمة الحساسية</h5>
                                        <div class="f-labels">
                                            <label>
                                                <input name="use_injection_of_epinephrine" type="radio" value="نعم"
                                                    @if (old('use_injection_of_epinephrine') == 'نعم') checked @endif>
                                                <span>نعم</span>
                                            </label>
                                            <label>
                                                <input name="use_injection_of_epinephrine" type="radio" value="لا"
                                                    @if (old('use_injection_of_epinephrine') == 'لا') checked @endif>
                                                <span>لا</span>
                                            </label>
                                            @error('use_injection_of_epinephrine')
                                                <p class="errors">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-7 col-sm-6 col-xs-12">
                                        <h5>في حال الاجابة ب لا الرجاء تقديم تقرير طبي من الطبيب يشير الى أن الحالة لا تتطلب
                                            استخدام الحقن</h5>
                                        <div class="f-upload">
                                            <input name="medical_report_image" type="file">
                                            <i class="la la-file-text"></i>
                                            <input type="text" class="form-control" readonly=""
                                                placeholder="يرجي ارفاق التقرير هنا">
                                            @error('medical_report_image')
                                                <p class="errors">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 col-sm-6 col-xs-12">
                                        <h5>هل الطالب من ذوي الاحتياجات الخاصة</h5>
                                        <div class="f-labels">
                                            <label>
                                                <input name="kid_with_special_needs" type="radio" value="نعم"
                                                    @if (old('kid_with_special_needs') == 'نعم') checked @endif>
                                                <span>نعم</span>
                                            </label>
                                            <label>
                                                <input name="kid_with_special_needs" type="radio" value="لا"
                                                    @if (old('kid_with_special_needs') == 'لا') checked @endif>
                                                <span>لا</span>
                                            </label>
                                            @error('kid_with_special_needs')
                                                <p class="errors">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-7 col-sm-6 col-xs-12">
                                        <h5>في حال الإجابة بنعم الرجاء وصف الحالة</h5>
                                        <input name="if_yes_special_needs" type="text" class="form-control"
                                            value="{{ old('if_yes_special_needs') }}">
                                        @error('if_yes_special_needs')
                                            <p class="errors">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <h5>الرجاء كتابة أي أعراض صحية يعاني منها الطالب</h5>
                                        <textarea name="another_health_symptoms" class="form-control">{{ old('another_health_symptoms') }}</textarea>
                                        @error('another_health_symptoms')
                                            <p class="errors">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <button type="button" class="btn prev-step">السابق</button>
                                        <button type="button" class="btn next-step">التالى</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kid_docs">
                                <div class="c-card col-xs-12">
                                    <div class="form-group col-md-4 col-xs-12">
                                        <div class="prof-img">
                                            <label>
                                                <i class="la la-camera"></i>
                                                <input name="recent_kid_photo" type="file"
                                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                <img src="" id="blah" alt="">
                                            </label>
                                            <p>صورة شخصية حديثة للطفل</p>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-xs-12">
                                        <div class="prof-img">
                                            <label>
                                                <i class="la la-camera"></i>
                                                <input name="family_card_image" type="file"
                                                    onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0])">
                                                <img src="" id="blah1" alt="">
                                            </label>
                                            <p>صورة من كرت العائلة</p>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-xs-12">
                                        <div class="prof-img">
                                            <label>
                                                <i class="la la-camera"></i>
                                                <input name="birth_record_image" type="file"
                                                    onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                                                <img src="" id="blah2" alt="">
                                            </label>
                                            <p>صورة من شهادة الميلاد</p>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-xs-12">
                                        <div class="prof-img">
                                            <label>
                                                <i class="la la-camera"></i>
                                                <input name="vaccination_card_image" type="file"
                                                    onchange="document.getElementById('blah3').src = window.URL.createObjectURL(this.files[0])">
                                                <img src="" id="blah3" alt="">
                                            </label>
                                            <p>صورة من كارت التطعيم</p>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 col-xs-12">
                                        <div class="prof-img">
                                            <label>
                                                <i class="la la-camera"></i>
                                                <input name="other_documents" type="file"
                                                    onchange="document.getElementById('blah4').src = window.URL.createObjectURL(this.files[0])">
                                                <img src="" id="blah4" alt="">
                                            </label>
                                            <p>مستندات أخرى</p>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-xs-12">
                                        <div class="chx-itm">
                                            <label>
                                                <input name="terms" type="checkbox" value="1"
                                                    @if (old('terms') == '1') checked @endif>
                                                <span>اوافق على
                                                    <a href="#"> الشروط والاحكام</a>
                                                </span>
                                            </label>
                                            @error('terms')
                                                <p class="errors">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-xs-12">
                                        <div class="chx-itm">
                                            <label>
                                                <input name="images_terms" type="checkbox" value="1"
                                                    @if (old('images_terms') == '1') checked @endif>
                                                <span>اوافق على نشر صور الطفل المشترك في قنوات التواصل الاجتماعي والموقع
                                                    والتطبيق والمنشورات الخاصة بمركز سوبرهيروزلاند</span>
                                            </label>
                                            @error('images_terms')
                                                <p class="errors">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <button type="button" class="btn prev-step">السابق</button>
                                        <button type="submit" class="btn">اضافة</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('model')
    <div class="modal fade" id="addition_success">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="la la-close"></i>
                </button>
                <div class="modal-body">
                    <img src="images/check.svg" alt="">
                    <p>تم إضافة الطفل بنجاح وسيتم
                        التواصل معكم لكى يتم تفعيل
                        حساب الطفل</p>
                    <a href="#" class="btn">الذهاب للملف الشخصي</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endpush
@push('script')
    {{-- <script>
        $('.add-n').click(function() {
            $('#p_spec').clone().appendTo('.append-persons');
        });
    </script> --}}
    <script type="text/javascript">
        var i = 0;
        $('.add-n').click(function() {
            ++i;
            $('#p_spec').append(
                '<div class="form-group col-md-4 col-sm-12 col-xs-12"><h6>' + ++i +
                '</h6><div><h5>الاسم الثلاثي</h5><input name="addmore[' +
                --i +
                '][person_name]" type="text" class="form-control"></div></div><div class = "form-group col-md-3 col-sm-6 col-xs-12" ><h5> رقم الجوال </h5><input name = "addmore[' +
                i +
                '][person_phone]" type = "text" class = "form-control" value = "{{ old('person_phone') }}"> </div><div class = "form-group col-md-3 col-sm-6 col-xs-12" ><h5> صلة القرابة </h5> <input name = "addmore[' +
                i +
                '][relation_to_kid]" type = "text" class = "form-control" value = "{{ old('relation_to_kid') }}"></div><div class="form-group col-md-2 col-sm-4 col-xs-12"><h5></h5><button type="button" class="btn btn-danger form-control remove-tr">Remove</button></div>'
            );
        });

        $(document).on('click', '.remove-tr', function() {
            $(this).parents('#p_spec').remove();
        });
    </script>
@endpush
