@extends('website.layout')
@section('content')
    <main class="main-content col-xs-12">
        <div class="breads col-xs-12" style="background-image: url(images/slide.jpg);">
            <div class="container">
                <h3>حجز خدمة</h3>
                <ul>
                    <li>
                        <a href="{{ route('website.index') }}">الرئيسية</a>
                    </li>
                    <li>حجز خدمة</li>
                </ul>
            </div>
        </div>
        <div class="s-wrap col-xs-12">
            <div class="container">
                <div class="kid-space reserve col-xs-12">
                    <form action="#" method="get">
                        <div class="form-group col-md-4 col-sm-6 col-xs-12">
                            <h5>اختر الخدمة</h5>
                            <select name="service" class="form-control">
                                <option selected disabled>يرجى الاختيار</option>
                                @foreach ($services as $service)
                                    <option>{{ $service->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-6 col-xs-12">
                            <h5>ميعاد الاشتراك</h5>
                            <input name="date" type="date" class="form-control" placeholder="0000/00/00">
                            {{-- <i class="la la-calendar"></i> --}}
                        </div>
                        <div class="form-group col-md-4 col-sm-6 col-xs-12">
                            <h5>اختر الطفل</h5>
                            <select name="child" class="form-control">
                                <option selected disabled>يرجى الاختيار</option>
                                <option>اختيار1</option>
                                <option>اختيار1</option>
                                {{-- <option><a href="{{ route('website.add_kid_view') }}">اضافة طفل اخر</a></option> --}}
                            </select>
                        </div>
                        <div class="form-group col-xs-12">
                            <button type="button" class="btn" data-toggle="modal" data-target="#reserve_success">حجز
                                خدمة</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @push('model')
        <div class="modal fade" id="reserve_success">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="la la-close"></i>
                    </button>
                    <div class="modal-body">
                        <img src="{{ asset('website/images/check.svg') }}" alt="">
                        <p> تم ارسال تفاصيل الحجز الى
                            الإدارة وسيتم التواصل معكم
                            ...شكرا</p>
                        <a href="#" class="btn">الرئيسية</a>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endpush
@endsection
