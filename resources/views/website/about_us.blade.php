@extends('website.layout')
@section('content')
    <main class="main-content col-xs-12">
        <div class="breads col-xs-12" style="background-image: url({{ asset('website/images/slide.jpg') }});">
            <div class="container">
                <h3>من نحن</h3>
                <ul>
                    <li>
                        <a href="{{ route('website.index') }}">الرئيسية</a>
                    </li>
                    <li>من نحن</li>
                </ul>
            </div>
        </div>
        <div class="about-wrap col-xs-12">
            <div class="about-s col-xs-12">
                <div class="container">
                    <div class="ab-img col-md-6 col-xs-12" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
                        <img src="{{ asset('storage/' . $settings->image) }}" alt="">
                    </div>
                    <div class="ab-data col-md-6 col-xs-12">
                        <h3 data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">{{ $settings->title }}</h3>
                        <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="400">{{ $settings->description }}</p>
                    </div>
                </div>
            </div>
            @foreach ($all_about_us as $about_us)
                <div class="about-item col-xs-12">
                    <div class="i-img col-md-6 col-xs-12">
                        <img src="{{ asset('storage/' . $about_us->image) }}" alt="">
                    </div>
                    <div class="i-data col-md-6 col-xs-12">
                        <h3>{{ $about_us->title }}</h3>
                        <p>{{ $about_us->description }}</p>
                    </div>
                </div>
            @endforeach
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
