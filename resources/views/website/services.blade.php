@extends('website.layout')
@section('content')
    <main class="main-content col-xs-12">
        <div class="breads col-xs-12" style="background-image: url({{ asset('website/images/slide.jpg') }});">
            <div class="container">
                <h3>خدماتنا</h3>
                <ul>
                    <li>
                        <a href="{{ route('website.index') }}">الرئيسية</a>
                    </li>
                    <li>خدماتنا</li>
                </ul>
            </div>
        </div>
        <div class="service-s col-xs-12">
            <div class="container">
                <div class="g-body col-xs-12">
                    <div class="row">
                        @foreach ($services as $service)
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
