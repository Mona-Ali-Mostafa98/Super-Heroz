@extends('website.layout')
@section('content')
    <main class="main-content col-xs-12">
        <div class="breads col-xs-12" style="background-image: url(images/slide.jpg);">
            <div class="container">
                <h3>أقسام المركز</h3>
                <ul>
                    <li>
                        <a href="{{ route('website.index') }}">الرئيسية</a>
                    </li>
                    <li>أقسام المركز</li>
                </ul>
            </div>
        </div>
        <div class="categorie-s col-xs-12">
            <div class="container">
                <div class="g-body col-xs-12">
                    <div class="cardo col-xs-12" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
                        <div class="c-inner">
                            <div class="c-img col-md-4 col-xs-12">
                                {{-- <img src="images/about2.png" alt=""> --}}
                                <img src="{{ asset('storage/' . $category->image) }}" alt="">
                            </div>
                            <div class="c-data col-md-8 col-xs-12">
                                <a href="#">{{ $category->title }}</a>
                                <p>{{ $category->description }}</p>
                            </div>
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

                <div>
                    <a href="#" class="btn" data-aos="fade-up" data-aos-duration="700" data-aos-delay="400">احجز
                        الان.!</a>
                    <span data-aos="fade-up" data-aos-duration="700" data-aos-delay="600">
                        <i class="la la-whatsapp"></i>
                        12346879564787
                    </span>
                </div>
            </div>
        </div>
    </main>
@endsection
