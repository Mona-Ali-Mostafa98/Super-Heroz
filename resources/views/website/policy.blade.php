@extends('website.layout')
@section('content')
    <main class="main-content col-xs-12">
        <div class="breads col-xs-12" style="background-image: url(images/slide.jpg);">
            <div class="container">
                <h3>سياسة الخصوصية</h3>
                <ul>
                    <li>
                        <a href="{{ route('website.index') }}">الرئيسية</a>
                    </li>
                    <li>سياسة الخصوصية</li>
                </ul>
            </div>
        </div>
        <div class="policy-wrap col-xs-12">
            <div class="container">
                @foreach ($policies as $policy)
                    <h3>{{ $policy->title }}</h3>
                    {!! $policy->description !!}
                @endforeach
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
