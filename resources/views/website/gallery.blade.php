@extends('website.layout')
@section('content')
    <main class="main-content col-xs-12">
        <div class="breads col-xs-12" style="background-image: url({{ asset('website/images/slide.jpg') }});">
            <div class="container">
                <h3>معرض الصور</h3>
                <ul>
                    <li>
                        <a href="{{ route('website.index') }}">الرئيسية</a>
                    </li>
                    <li>معرض الصور</li>
                </ul>
            </div>
        </div>
        <div class="gallery-s col-xs-12">
            <div class="container">
                <div class="g-body col-xs-12" data-aos="fade-up" data-aos-duration="700" data-aos-delay="400">
                    <div class="row">
                        @foreach ($galleries as $gallery)
                            <div class="item col-md-4 col-sm-6 col-xs-12">
                                <div class="i-img">
                                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="">
                                    <a href="{{ asset('storage/' . $gallery->image) }}" data-fancybox="images">
                                        <i class="la la-search"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="g-more col-xs-12" data-aos="fade-up" data-aos-duration="700" data-aos-delay="800">
                            <a href="#" class="btn">رؤية المزيد</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="serv-s col-xs-12" style="background-image: url({{ asset('website/images/slide.jpg') }});">
            <div class="container">
                <div>
                    <h3 data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">لا تتردد بالتواصل معنا .. سارع
                        بالحجز الأن!!</h3>
                    <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="300">قم بحجز خدمه من خدماتنا لأطفالك
                        الان
                    </p>
                </div>
                <a href="{{ route('website.reserve_service') }}" class="btn" data-aos="fade-up" data-aos-duration="700"
                    data-aos-delay="400">سجل
                    الأن!</a>
            </div>
        </div>
    </main>
@endsection
