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
        <main class="main-content col-xs-12">
            <div class="back-home col-xs-12">
                <a href="{{ route('website.index') }}">
                    <i class="la la-angle-right"></i>
                    عودة للصفحة الرئيسية
                </a>
            </div>
            <div class="auth-wrap col-xs-12">
                <div class="c-card forgot col-xs-12">
                    <img src="{{ asset('website/images/login1.png') }}" alt="" class="log-img log1">
                    <img src="{{ asset('website/images/login2.png') }}" alt="" class="log-img log2">
                    <img src="{{ asset('website/images/login3.png') }}" alt="" class="log-img log3">
                    <img src="{{ asset('website/images/login4.png') }}" alt="" class="log-img log4">
                    <div class="auth-top col-xs-12">
                        <img src="{{ asset('website/images/forget.png') }}" alt="">
                        <h3>نسيت كلمة المرور</h3>
                        <p>اكتب عنوان البريد الالكترونى المسجل بالموقع و سيتم ارسال رابط لاعادة تعين كلمة المرور</p>
                        @include('website.alerts')
                    </div>
                    <div class="auth-form col-xs-12">
                        <form action="{{ route('website.forgot.password.link') }}" method="POST">
                            @csrf
                            <div class="form-group col-xs-12">
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                    placeholder="رقم الجوا ل او البريد الالكترونى" required autofocus>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-xs-12 has-btn">
                                <button type="submit" class="btn">ارسال</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Javascript Files -->
    <script src="{{ asset('website/js/jquery-2.2.2.min.js') }}"></script>
    <script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('website/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('website/js/aos.js') }}"></script>
    <script src="{{ asset('website/js/script.js') }}"></script>
</body>

</html>
