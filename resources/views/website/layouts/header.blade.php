<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>super heroes</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="author" content="Amir Nageh">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#00a650">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#00a650">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#00a650">

    <!-- Css Files -->
    <link href="{{ asset('website/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/style-res.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('website/css/style-en.css') }}" rel="stylesheet"> -->

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('website/images/favicon.png') }}">

</head>


<body>

    <div id="loading">
        <div class="loading">

        </div>
    </div>

    <div class="wrapper col-xs-12">

        {{-- @if (session()->has('success'))
            <div class="alert alert-success">
                <h4>{{ session('success') }}</h4>
            </div>
        @endif --}}

        <header class="main-head col-xs-12">
            <div class="top-head col-xs-12">
                <div class="container">
                    <ul>
                        <li>
                            <a href="tel:+122345878">
                                <i class="la la-phone"></i>
                                {{ $settings->phone }}
                            </a>
                        </li>
                        <li>
                            <a href="mailto:{{ $settings->email }}">
                                <i class="la la-envelope"></i>
                                {{ $settings->email }}
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="la la-map-marker"></i>
                                {{ $settings->region }}
                            </a>
                        </li>
                    </ul>
                    <div class="social">
                        @foreach ($social_links as $social_link)
                            <a href="{{ $social_link->website_url }}" class="{{ $social_link->website_name }}">
                                <i class="la la-{{ $social_link->website_name }}"></i>
                            </a>
                        @endforeach
                        {{-- <a href="#" class="{facebook}">
                            <i class="la la-facebook"></i>
                        </a>
                        <a href="#" class="twitter">
                            <i class="la la-twitter"></i>
                        </a>
                        <a href="#" class="instagram">
                            <i class="la la-instagram"></i>
                        </a> --}}
                    </div>
                </div>
            </div>
            <div class="search-area col-xs-12">
                <form action="#" method="GET">
                    <div class="form-group">
                        <input type="search" class="form-control" placeholder="ابحث هنا">
                        <button type="submit">
                            <i class="la la-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="bot-head col-xs-12">
                <div class="container">
                    <div class="logo">
                        <a href="{{ route('website.index') }}">
                            <img src="{{ asset('storage/' . $settings->logo) }}" alt="">
                        </a>
                    </div>
                    <div class="nav-menu">
                        <button type="button" class="cl-menu">
                            <i class="la la-close"></i>
                        </button>
                        <ul>
                            <li>
                                <a href="{{ route('website.index') }}">الرئيسية</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="javascript:void(0)">المركز</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ route('website.about_us') }}">من نحن</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('website.categories') }}">أقسام المركز</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('website.classes') }}">فصول المركز</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('website.policies') }}">السياسات والانظمه</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="javascript:void(0)">خدماتنا</a>
                                <ul class="sub-menu">
                                    @foreach ($services as $service)
                                        <li>
                                            <a
                                                href="{{ route('website.services.show', $service->id) }}">{{ $service->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('website.gallery') }}">البوم الصور</a>
                            </li>
                            <li>
                                <a href="{{ route('website.contact_us.create') }}">اتصل بنا</a>
                            </li>
                        </ul>
                    </div>
                    <div class="h-extra">
                        <button type="button" class="op-search">
                            <i class="la la-search"></i>
                        </button>
                        <div class="usr-area">
                            <ul>
                                <li class="menu-item-has-children">
                                    @if (Auth::id() == null)
                                        <a href="javascript:void(0)">تسجيل</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="{{ route('website.login') }}">دخول</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('website.register.create') }}">تسجيل عضوية</a>
                                            </li>
                                        </ul>
                                    @else
                                        <a href="javascript:void(0)">{{ Auth::user()->name }}</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="{{ route('website.profile') }}">الملف الشخصى</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('website.logout') }}">تسجيل الخروج</a>
                                            </li>
                                        </ul>
                                    @endif

                                </li>
                            </ul>
                        </div>
                        <a href="{{ route('website.reserve_service') }}" class="btn">احجز الأن</a>
                        <button type="button" class="op-menu">
                            <i class="la la-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="bottom-separator"></div>
        </header>
