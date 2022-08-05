@extends('website.layout')
@section('content')
    <main class="main-content col-xs-12">
        <div class="hero-s col-xs-12">
            <div class="hero-slider owl-carousel">
                @foreach ($sliders as $slider)
                    <div class="item">
                        <div class="i-img col-md-6 col-xs-12">
                            <img src="{{ asset('storage/' . $slider->image) }}" alt="">
                        </div>
                        <div class="i-data col-md-6 col-xs-12">
                            <h3>{{ $slider->title }}</h3>
                            <p>{{ $slider->description }}</p>
                            <a href="{{ route('website.add_kid_view') }}" class="btn">سجل طفلك الان</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="about-s col-xs-12">
            <div class="container">
                <div class="ab-img col-md-6 col-xs-12" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
                    <img src="{{ asset('storage/' . $settings->image) }}" alt="">
                </div>
                <div class="ab-data col-md-6 col-xs-12">
                    <h3 data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">{{ $settings->title }}</h3>
                    <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="400">{{ $settings->description }}</p>
                    <a href="{{ route('website.about_us') }}" class="btn">المزيد</a>
                </div>
            </div>
        </div>
        <div class="service-s col-xs-12">
            <div class="container">
                <div class="g-head col-xs-12" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
                    <h3>الخدمات</h3>
                </div>
                <div class="g-body col-xs-12">
                    <div class="row">
                        @foreach ($index_services as $service)
                            <div class="block col-md-4 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-duration="700"
                                data-aos-delay="200">
                                <div class="inner">
                                    <div class="i-img">
                                        <img src="{{ asset('storage/' . $service->image) }}" alt="">
                                        <a href="{{ route('website.services.show', $service->id) }}"></a>
                                    </div>
                                    <div class="i-data">
                                        <a href="{{ route('website.services.show', $service->id) }}"
                                            class="title">{{ $service->title }}</a>
                                        <span>{{ $service->age }}</span>
                                        <p>{{ $service->description }}</p>
                                        <a href="{{ route('website.services.show', $service->id) }}"
                                            class="btn">المزيد</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="g-more col-xs-12" data-aos="fade-up" data-aos-duration="700" data-aos-delay="800">
                            <a href="{{ route('website.services') }}" class="btn">رؤية المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="categorie-s col-xs-12">
            <div class="container">
                <div class="g-head col-xs-12" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
                    <h3>أقسام المركز</h3>
                </div>
                <div class="g-body col-xs-12">
                    <div class="row">
                        @foreach ($categories as $category)
                            <div class="block col-md-3 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-duration="700"
                                data-aos-delay="300">
                                <div class="inner">
                                    <div class="i-img">
                                        <img src="{{ asset('website/images/palette.png') }}" alt="">
                                    </div>
                                    <a href="#">{{ $category->title }}</a>
                                </div>
                            </div>
                        @endforeach
                        <div class="g-more col-xs-12" data-aos="fade-up" data-aos-duration="700" data-aos-delay="1000">
                            <a href="{{ route('website.categories') }}" class="btn">رؤية المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gallery-s col-xs-12">
            <div class="container">
                <div class="g-head col-xs-12" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
                    <h3>ألبوم الصور</h3>
                </div>
                <div class="g-body col-xs-12" data-aos="fade-up" data-aos-duration="700" data-aos-delay="400">
                    <div class="row">
                        <div class="gallery-slider owl-carousel">
                            @foreach ($galleries as $gallery)
                                <div class="item">
                                    <div class="i-img">
                                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="">
                                        <a href="{{ asset('storage/' . $gallery->image) }}" data-fancybox="images">
                                            <i class="la la-search"></i>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="serv-s col-xs-12" style="background-image: url(images/slide.jpg);">
            <div class="container">
                <div>
                    <h3 data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">لا تتردد بالتواصل معنا .. سارع
                        بالحجز الأن!!</h3>
                    <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="300">قم بحجز خدمه من خدماتنا لأطفالك
                        الان
                    </p>
                </div>
                <a href="{{ route('website.reserve_service') }}" class="btn" data-aos="fade-up"
                    data-aos-duration="700" data-aos-delay="400">سجل
                    الأن!</a>
            </div>
        </div>
        <div class="class-s col-xs-12">
            <div class="container">
                <div class="g-head col-xs-12" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
                    <h3>الفصول</h3>
                </div>
                <div class="g-body col-xs-12">
                    <div class="row">
                        @foreach ($center_classes as $center_class)
                            <div class="block col-md-4 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-duration="700"
                                data-aos-delay="200">
                                <div class="inner">
                                    <div class="i-img">
                                        <img src="{{ asset('storage/' . $center_class->image) }}" alt="">
                                        <a href="{{ route('website.classes') }}"></a>
                                    </div>
                                    <div class="i-data">
                                        <svg class="bigHalfCircle" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            viewBox="0 0 100 100" preserveAspectRatio="none">
                                            <path d="M0 100 C40 0 60 0 100 100 Z"></path>
                                        </svg>
                                        <a href="{{ route('website.classes') }}"
                                            class="title">{{ $center_class->title }}</a>
                                        <span>العمر</span>
                                        <p>{{ $center_class->age }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="g-more col-xs-12" data-aos="fade-up" data-aos-duration="700" data-aos-delay="500">
                            <a href="{{ route('website.classes') }}" class="btn">رؤية المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
