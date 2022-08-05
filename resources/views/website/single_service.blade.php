@extends('website.layout')
@section('content')
    <main class="main-content col-xs-12">
        <div class="breads col-xs-12" style="background-image: url({{ asset('website/images/slide.jpg') }});">
            <div class="container">
                <h3>{{ $service->title }}</h3>
                <ul>
                    <li>
                        <a href="{{ route('website.index') }}">الرئيسية</a>
                    </li>
                    <li>{{ $service->title }}</li>
                </ul>
            </div>
        </div>

        <div class="single-wrap col-xs-12">
            <div class="container">
                <div class="sing-box col-md-12 col-xs-12">
                    <div class="post-img col-xs-6">
                        <img src="{{ asset('storage/' . $service->image) }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <div class="post-data col-xs-12">
                            <div>
                                <h3>{{ $service->title }}</h3>
                                <a href="#">
                                    <i class="la la-share-alt"></i>
                                </a>
                            </div>
                            <p></p>
                            <p>{{ $service->description }}</p>
                            <p></p>
                        </div>
                        <div class="post-extra col-xs-12">
                            @if (!$previous_service == null)
                                <div class="p-item">
                                    <a href="{{ route('website.services.show', $previous_service->id) }}">
                                        <div class="i-img">
                                            <img src="{{ asset('storage/' . $previous_service->image) }}" alt="">
                                        </div>
                                        <div>
                                            <span class="spa-item">السابق</span>
                                            <h4 class="h4-item">{{ $previous_service->title }} </h4>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            @if (!$next_service == null)
                                <div class="p-item">
                                    <a href="{{ route('website.services.show', $next_service->id) }}">
                                        <div class="i-img">
                                            <img src="{{ asset('storage/' . $next_service->image) }}" alt="">
                                        </div>
                                        <div>
                                            <span class="spa-item">التالي</span>
                                            <h4 class="h4-item">{{ $next_service->title }} </h4>
                                        </div>
                                    </a>
                                </div>
                            @endif
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
