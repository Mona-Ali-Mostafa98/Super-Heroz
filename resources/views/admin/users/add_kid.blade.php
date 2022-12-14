@extends('admin.layout')
@section('page_title', 'Create new kid')
@section('content')
    @push('styles')
        <style>
            .form-group .f-labels {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .form-group .f-labels label {
                font-weight: normal;
                width: 48%;
                text-align: center;
            }

            .form-group .f-labels label span {
                height: 40px;
                border: 1px solid #EBEBEB;
                border-radius: 5px;
                display: block;
                line-height: 40px;
                font-family: 'f-bd';
                color: black;
                transition: all .3s;
                cursor: pointer;
            }

            .form-group .f-labels label input {
                display: none;
            }

            .form-group .f-labels label input:checked+span {
                color: #fff;
                border-color: #adb5bd;
                background-color: #adb5bd
            }

            .form-group .f-upload {
                position: relative;
                border-radius: 5px;
                height: 40px;
                /* margin-top: 72px; */
            }

            .form-group .f-upload input {
                position: absolute;
                right: 0;
                top: 0;
                width: 100%;
                height: 100%;
                opacity: 0;
                z-index: 2;
                cursor: pointer;
            }

            .form-group .f-upload .form-control {
                opacity: 1;
                z-index: 0;
                background: transparent;
            }

            .form-group .f-upload i {
                position: absolute;
                left: 12px;
                top: 12px;
                color: #B9B9B8;
                font-size: 21px;
            }

            .form-group .f-upload span {
                height: 100%;
                line-height: 40px;
                display: block;
                padding: 0 15px;
                color: #BEBEBE;
            }


            .form-group .prof-img {
                text-align: center;
                width: 100%;
            }

            .form-group .prof-img label {
                margin-bottom: 20px;
                display: block;
                position: relative;
                background-color: #F5F5F5;
                border-radius: 10px;
                height: 250px;
                overflow: hidden;
                cursor: pointer;
            }

            .form-group .prof-img p {
                color: #6A6A6A;
                font-family: 'f-rg';
                font-size: 15px;
                font-weight: bold;
            }

            .form-group .prof-img label i {
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                color: #273370;
                font-size: 30px;
            }

            .form-group .prof-img label input {
                position: absolute;
                right: 0;
                top: 0;
                width: 100%;
                height: 100%;
                opacity: 0;
            }

            .form-group .prof-img label i:after {
                content: '+';
                position: absolute;
                left: -10px;
                top: -10px;
                font-size: 22px;
                font-family: 'f-rg';
            }

            .form-group .prof-img label img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                outline: none !important;
                font-size: 0;
                z-index: 1;
                position: relative;
            }
        </style>
    @endpush
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">???????????????????? / ??????????????</h1>
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
                <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary mb-2 "><i
                        class="bi bi-caret-left-fill ms-1"></i> ????????</a>
                </h1>
            </div>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-4 mb-3"> ?????????? ?????? ???????????????? "{{ $user->name }}" </h5>
                            <form action="{{ route('admin.add_kid') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-md-12 col-sm-12 col-xs-12  mb-4 mt-4">
                                    <h3 class="text-primary">?????????????? ??????????</h3>
                                </div>

                                <input name="user_id" type="text" value="{{ $user->id }}" hidden>
                                @error('user_id')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror

                                <div class="row mb-4">
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>?????? ?????????? ??????????</h5>
                                        <input name="kid_name" type="text" class="form-control"
                                            placeholder="?????? ?????????? ???????? ??????" value="{{ old('kid_name') }}">
                                        @error('kid_name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>??????????</h5>
                                        <select name="gender" class="form-control">
                                            <option selected disabled>???????? ????????????????</option>
                                            <option value="??????" @if (old('gender') == '??????') selected @endif>??????
                                            </option>
                                            <option value="????????" @if (old('gender') == '????????') selected @endif>????????
                                            </option>
                                        </select>
                                        @error('gender')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>?????????? ??????????????</h5>
                                        <input name="birth_date" type="date" class="form-control"
                                            placeholder="mm/dd/yyyy" value="{{ old('birth_date') }}">
                                        {{-- <i class="la la-calendar"></i> --}}
                                        @error('birth_date')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>?????? ??????????????</h5>
                                        <input name="relative_relation" type="text" class="form-control"
                                            placeholder="?????? ?????????????? ???????? ??????" value="{{ old('relative_relation') }}">
                                        @error('relative_relation')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>?????????? ????????????</h5>
                                        <input name="home_address" type="text" class="form-control"
                                            placeholder="???????? - ????????????" value="{{ old('home_address') }}">
                                        @error('home_address')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>???? ?????????? ???????? ???? ??????????</h5>
                                        <select name="is_child_registered_school" class="form-control">
                                            <option selected disabled>???????? ????????????????</option>
                                            <option value="??????" @if (old('is_child_registered_school') == '??????') selected @endif>??????
                                            </option>
                                            <option value="????" @if (old('is_child_registered_school') == '????') selected @endif>????
                                            </option>
                                        </select>
                                        @error('is_child_registered_school')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>?????????????? ????????????????</h5>
                                        <input name="educational_level" type="text" class="form-control"
                                            placeholder="???????? ?????????????? ????????????????" value="{{ old('educational_level') }}">
                                        @error('educational_level')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12  mb-4 mt-4">
                                    <h3 class="text-primary">???????????? ?????????? ?????????? ???? ?????????????? ??????????????</h3>
                                </div>

                                <div class="row mb-4">
                                    {{-- <h6>???????????? ?????????? ??????????</h6> --}}
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <div>
                                            <h5>?????????? ??????????????</h5>
                                            <input name="emergency_first_name" type="text" class="form-control"
                                                value="{{ old('emergency_first_name') }}"
                                                placeholder="?????????? ?????????????? ???????? ??????">
                                            @error('emergency_first_name')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>?????? ????????????</h5>
                                        <input name="emergency_first_phone" type="text" class="form-control"
                                            value="{{ old('emergency_first_phone') }}" placeholder="?????? ???????????? ???????? ??????">
                                        @error('emergency_first_phone')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>?????? ??????????????</h5>
                                        <input name="emergency_first_relation" type="text" class="form-control"
                                            value="{{ old('emergency_first_relation') }}"
                                            placeholder="?????? ?????????????? ???????? ??????">
                                        @error('emergency_first_relation')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    {{-- <h6>???????????? ?????????? ????????????</h6> --}}
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <div>
                                            <h5>?????????? ??????????????</h5>
                                            <input name="emergency_second_name" type="text" class="form-control"
                                                value="{{ old('emergency_second_name') }}"
                                                placeholder="?????????? ?????????????? ???????? ??????">
                                            @error('emergency_second_name')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>?????? ????????????</h5>
                                        <input name="emergency_second_phone" type="text" class="form-control"
                                            value="{{ old('emergency_second_phone') }}"
                                            placeholder="?????? ???????????? ???????? ??????">
                                        @error('emergency_second_phone')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>?????? ??????????????</h5>
                                        <input name="emergency_second_relation" type="text" class="form-control"
                                            value="{{ old('emergency_second_relation') }}"
                                            placeholder="?????? ?????????????? ???????? ??????">
                                        @error('emergency_second_relation')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12  mb-4 mt-4">
                                    <h3 class="text-primary">???????????? ?????????? ?????????? ?????????????? ?????????????? ?????? ???????? ???????????? ????
                                        ????????????</h3>
                                </div>

                                <div class="row mb-4" id="p_spec">
                                    {{-- <h6>1</h6> --}}
                                    <div class="form-group col-md-3 col-sm-12 col-xs-12">
                                        <h5>?????????? ??????????????</h5>
                                        <input name="addmore[0][person_name]" type="text" class="form-control"
                                            value="{{ old('addmore.*.person_name') }}"
                                            placeholder="?????????? ?????????????? ???????? ??????">
                                        @error('addmore.*.person_name')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>?????? ????????????</h5>
                                        <input name="addmore[0][person_phone]" type="text" class="form-control"
                                            value="{{ old('addmore.*.person_phone') }}"
                                            placeholder="?????? ???????????? ???????? ??????">
                                        @error('addmore.*.person_phone')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>?????? ??????????????</h5>
                                        <input name="addmore[0][relation_to_kid]" type="text" class="form-control"
                                            value="{{ old('addmore.*.relation_to_kid') }}"
                                            placeholder="?????? ?????????????? ???????? ??????">
                                        @error('addmore.*.relation_to_kid')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                        <h5>???????????? ?????????? ??????????</h5>
                                        <button type="button" class="btn btn-success add-n">
                                            <i class="bi bi-plus-lg"></i>
                                            ?????????? ?????? ??????
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12 mb-4 mt-4">
                                    <h3 class="text-primary">?????????????? ???????? ???? ??????????</h3>
                                </div>

                                <div class="row mb-4">
                                    <div class="form-group col-md-5 col-sm-6 col-xs-12">
                                        <h5>???? ?????????? ???????????? ???? ???????????????? ????????????????</h5>
                                        <div class="f-labels">
                                            <label>
                                                <input name="kid_suffer_food_allergies" type="radio" value="??????"
                                                    @if (old('kid_suffer_food_allergies') == '??????') checked @endif>
                                                <span>??????</span>
                                            </label>
                                            <label>
                                                <input name="kid_suffer_food_allergies" type="radio" value="????"
                                                    @if (old('kid_suffer_food_allergies') == '????') checked @endif>
                                                <span>????</span>
                                            </label>
                                            @error('kid_suffer_food_allergies')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-md-7 col-sm-6 col-xs-12">
                                        <h5>???? ?????? ?????????????? ???????? ???????????? ?????????? ???????????? ???????????????? ?????????????? ????????????????</h5>
                                        <input name="if_yes_suffer_food_allergens" type="text" class="form-control"
                                            value="{{ old('if_yes_suffer_food_allergens') }}">
                                        @error('if_yes_suffer_food_allergens')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="form-group col-md-5 col-sm-6 col-xs-12">
                                        <h5>???? ?????????? ???????????? ???? ???? ?????? ?????? ???? ????????????????</h5>
                                        <div class="f-labels">
                                            <label>
                                                <input name="kid_suffer_other_type_of_allergy" type="radio"
                                                    value="??????" @if (old('kid_suffer_other_type_of_allergy') == '??????') checked @endif>
                                                <span>??????</span>
                                            </label>
                                            <label>
                                                <input name="kid_suffer_other_type_of_allergy" type="radio"
                                                    value="????" @if (old('kid_suffer_other_type_of_allergy') == '????') checked @endif>
                                                <span>????</span>
                                            </label>
                                            @error('kid_suffer_other_type_of_allergy')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group col-md-7 col-sm-6 col-xs-12">
                                        <h5>???? ?????? ?????????????? ???????? ???????????? ?????? ?????? ????????????????</h5>
                                        <input name="if_yes_state_the_type_of_allergy" type="text"
                                            class="form-control" value="{{ old('if_yes_state_the_type_of_allergy') }}">
                                        @error('if_yes_state_the_type_of_allergy')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="form-group col-md-5 col-sm-6 col-xs-12">
                                        <h5>???? ?????? ???????? ???????????? ?????????? ???????????? ???????????????? ???? ?????????? ?????????????? ????????
                                            ??????????????????????
                                            (????????????????????)?? ???? ???????? ???????????????? ???? ?????? ???????? ???? ?????? ???? ?????????? ???????? ????????????????
                                        </h5>
                                        <div class="f-labels">
                                            <label>
                                                <input name="use_injection_of_epinephrine" type="radio" value="??????"
                                                    @if (old('use_injection_of_epinephrine') == '??????') checked @endif>
                                                <span>??????</span>
                                            </label>
                                            <label>
                                                <input name="use_injection_of_epinephrine" type="radio" value="????"
                                                    @if (old('use_injection_of_epinephrine') == '????') checked @endif>
                                                <span>????</span>
                                            </label>
                                            @error('use_injection_of_epinephrine')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-md-7 col-sm-6 col-xs-12">
                                        <h5>???? ?????? ?????????????? ?? ???? ???????????? ?????????? ?????????? ?????? ???? ???????????? ???????? ?????? ???? ????????????
                                            ???? ??????????
                                            ?????????????? ??????????</h5>
                                        <div class="f-upload">
                                            <input name="medical_report_image" type="file">
                                            <i class="la la-file-text"></i>
                                            <input type="text" class="form-control mt-4" readonly=""
                                                placeholder="???????? ?????????? ?????????????? ??????">
                                            @error('medical_report_image')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="form-group col-md-5 col-sm-6 col-xs-12">
                                        <h5>???? ???????????? ???? ?????? ???????????????????? ????????????</h5>
                                        <div class="f-labels">
                                            <label>
                                                <input name="kid_with_special_needs" type="radio" value="??????"
                                                    @if (old('kid_with_special_needs') == '??????') checked @endif>
                                                <span>??????</span>
                                            </label>
                                            <label>
                                                <input name="kid_with_special_needs" type="radio" value="????"
                                                    @if (old('kid_with_special_needs') == '????') checked @endif>
                                                <span>????</span>
                                            </label>
                                        </div>
                                        @error('kid_with_special_needs')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-7 col-sm-6 col-xs-12">
                                        <h5>???? ?????? ?????????????? ???????? ???????????? ?????? ????????????</h5>
                                        <input name="if_yes_special_needs" type="text" class="form-control"
                                            value="{{ old('if_yes_special_needs') }}">
                                        @error('if_yes_special_needs')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="form-group col-xs-12">
                                        <h5>???????????? ?????????? ???? ?????????? ???????? ?????????? ???????? ????????????</h5>
                                        <textarea name="another_health_symptoms" class="form-control"rows='3'>{{ old('another_health_symptoms') }}</textarea>
                                        @error('another_health_symptoms')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-12 col-sm-12 col-xs-12 mb-4 mt-4 ">
                                    <h3 class="text-primary">?????????????????? ????????????????</h3>
                                </div>

                                <div class="row mb-4">
                                    <div class="form-group col-md-4 col-xs-12">
                                        <div class="prof-img">
                                            <label>
                                                <i class="la la-camera"></i>
                                                <input name="recent_kid_photo" type="file"
                                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                <img src="" id="blah" alt="">
                                            </label>
                                            <p>???????? ?????????? ?????????? ??????????</p>
                                            @error('recent_kid_photo')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
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
                                            <p>???????? ???? ?????? ??????????????</p>
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
                                            <p>???????? ???? ?????????? ??????????????</p>
                                            @error('birth_record_image')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="form-group col-md-4 col-xs-12">
                                        <div class="prof-img">
                                            <label>
                                                <i class="la la-camera"></i>
                                                <input name="vaccination_card_image" type="file"
                                                    onchange="document.getElementById('blah3').src = window.URL.createObjectURL(this.files[0])">
                                                <img src="" id="blah3" alt="">
                                            </label>
                                            <p>???????? ???? ???????? ??????????????</p>
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
                                            <p>?????????????? ????????</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="form-group col-md-3 col-xs-12">
                                        <div class="mb-1">
                                            <label>
                                                <input name="terms" type="checkbox" value="1"
                                                    @if (old('terms') == '1') checked @endif>
                                                <span>?????????? ??????
                                                    <a href="#"> ???????????? ????????????????</a>
                                                </span>
                                            </label>
                                        </div>
                                        @error('terms')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-9 col-xs-12">
                                        <div class="mb-1">
                                            <label>
                                                <input name="images_terms" type="checkbox" value="1"
                                                    @if (old('images_terms') == '1') checked @endif>
                                                <span>?????????? ?????? ?????? ?????? ?????????? ?????????????? ???? ?????????? ?????????????? ?????????????????? ??????????????
                                                    ???????????????? ???????????????????? ???????????? ?????????? ??????????????????????????</span>
                                            </label>
                                        </div>
                                        @error('images_terms')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">?????????? ??????????</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection

@push('scripts')
    <script type="text/javascript">
        var i = 0;
        $('.add-n').click(function() {
            ++i;
            $('#p_spec').append(
                '<div class="form-group col-md-3 col-sm-12 col-xs-12"><h5>?????????? ??????????????</h5><input name="addmore[' +
                --i +
                '][person_name]" type="text" class="form-control"></div><div class = "form-group col-md-3 col-sm-6 col-xs-12" ><h5> ?????? ???????????? </h5><input name = "addmore[' +
                i +
                '][person_phone]" type = "text" class = "form-control" value = "{{ old('person_phone') }}"> </div><div class = "form-group col-md-3 col-sm-6 col-xs-12" ><h5> ?????? ?????????????? </h5> <input name = "addmore[' +
                i +
                '][relation_to_kid]" type = "text" class = "form-control" value = "{{ old('relation_to_kid') }}"></div><div class="form-group col-md-2 col-sm-4 col-xs-12"><h5></h5><button type="button" class="btn btn-danger form-control remove-tr">Remove</button></div>'
            );
        });

        // $(document).on('click', '.remove-tr', function() {
        //     $(this).parents('#p_spec').remove();
        // });
    </script>
@endpush
