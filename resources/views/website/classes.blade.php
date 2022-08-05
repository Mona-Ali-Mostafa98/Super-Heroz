@extends('website.layout')
@section('content')
    <main class="main-content col-xs-12">
        <div class="breads col-xs-12" style="background-image: url(images/slide.jpg);">
            <div class="container">
                <h3>فصول المركز</h3>
                <ul>
                    <li>
                        <a href="{{ route('website.index') }}">الرئيسية</a>
                    </li>
                    <li>فصول المركز</li>
                </ul>
            </div>
        </div>
        <div class="class-s col-xs-12">
            <div class="container">
                <div class="g-body col-xs-12">
                    <div class="row">
                        @foreach ($classes as $class)
                            <div class="block col-md-4 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-duration="700"
                                data-aos-delay="200">
                                <div class="inner">
                                    <div class="i-img">
                                        <img src="{{ asset('storage/' . $class->image) }}" alt="">
                                        <a href="#"></a>
                                    </div>
                                    <div class="i-data">
                                        <svg class="bigHalfCircle" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            viewBox="0 0 100 100" preserveAspectRatio="none">
                                            <path d="M0 100 C40 0 60 0 100 100 Z"></path>
                                        </svg>
                                        <a href="#" class="title"> {{ $class->title }}</a>
                                        <span>العمر</span>
                                        <p>{{ $class->age }}</p>
                                        <span>أسم المعلمه</span>
                                        <p>{{ $class->teacher_name }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="g-more col-xs-12" data-aos="fade-up" data-aos-duration="700" data-aos-delay="500">
                            <a href="#" class="btn">رؤية المزيد</a>
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
                    <p data-aos="fade-up" data-aos-duration="700" data-aos-delay="300">ما أصله؟ خلافاَ للاعتقاد السائد فإن
                        لوريم إيبسوم ليس نصاَ عشوائياً، بل إن له جذور في الأدب اللاتيني الكلاسيكي منذ العام 45 قبل الميلاد،
                        مما يجعله أكثر من عام في القدم</p>
                </div>
                <a href="#" class="btn" data-aos="fade-up" data-aos-duration="700" data-aos-delay="400">سجل
                    الأن!</a>
            </div>
        </div>
    </main>
@endsection
