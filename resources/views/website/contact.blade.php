@extends('website.layout')
@section('content')
    <main class="main-content col-xs-12">
        <div class="breads col-xs-12" style="background-image: url({{ asset('website/images/slide.jpg') }});">
            <div class="container">
                <h3>اتصل بنا</h3>
                <ul>
                    <li>
                        <a href="{{ route('website.index') }}">الرئيسية</a>
                    </li>
                    <li>اتصل بنا</li>
                </ul>
            </div>
        </div>
        <div class="contact-wrap col-xs-12">
            <div class="container">
                <div class="co-map col-xs-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14948656.71013136!2d54.110489326947274!3d23.833728990767888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2z2KfZhNiz2LnZiNiv2YrYqQ!5e0!3m2!1sar!2seg!4v1629992751898!5m2!1sar!2seg"></iframe>
                </div>
                <div class="co-inner col-xs-12">
                    <div class="row">
                        <div class="co-info col-md-4 col-xs-12">
                            <h4 class="co-head">بيانات التواصل</h4>
                            <ul>
                                <li>
                                    <div>
                                        <i class="la la-map-marker"></i>
                                    </div>
                                    <div>
                                        <h5>العنوان</h5>
                                        <p>{{ $settings->street }} </p>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <i class="la la-phone"></i>
                                    </div>
                                    <div>
                                        <h5>رقم الجوال</h5>
                                        <p>
                                            <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <i class="la la-at"></i>
                                    </div>
                                    <div>
                                        <h5>البريد الالكتروني</h5>
                                        <p>
                                            <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <i class="la la-share-alt"></i>
                                    </div>
                                    <div>
                                        <h5>تواصل عبر مواقع التواصل الاجتماعي</h5>
                                        <div>
                                            @foreach ($social_links as $social_link)
                                                <a href="{{ $social_link->website_url }}"
                                                    class="{{ $social_link->website_name }}">
                                                    <i class="la la-{{ $social_link->website_name }}"></i>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-form col-md-8 col-xs-12">
                            <h4 class="co-head">تواصل معنا !</h4>
                            <form action="{{ route('website.contact_us.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 col-xs-12">
                                        <h6>الاسم كاملاً <i>*</i></h6>
                                        <input name="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="أدخل الاسم كاملا" value="{{ old('name') }}">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 col-xs-12">
                                        <h6> البريد الإلكتروني <i>*</i></h6>
                                        <input name="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="أدخل البريد الإلكتروني" value="{{ old('email') }}">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12">
                                        <h6> الرسالة </h6>
                                        <textarea name="message" class="form-control @error('message') is-invalid @enderror" placeholder="اكتب رسالتك">{{ old('message') }}</textarea>
                                        @error('message')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12">
                                        <button type="submit" class="btn">ارسال</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="serv-s col-xs-12" style="background-image: url({{ asset('website/images/slide.jpg') }});">
            <div class="container">
                <div>
                    <h3 data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">لا تتردد بالتواصل معنا .. سارع
                        بالحجز الأن!!</h3>
                    <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="300">قم بحجز خدمه من خدماتنا لأطفالك الان
                    </p>
                </div>
                <a href="{{ route('website.reserve_service') }}" class="btn" data-aos="fade-up" data-aos-duration="700"
                    data-aos-delay="400">سجل
                    الأن!</a>
            </div>
        </div>
    </main>
@endsection
