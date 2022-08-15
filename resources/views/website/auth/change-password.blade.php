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
                <div class="c-card ch-pass col-xs-12">
                    <img src="{{ asset('website/images/login1.png') }}" alt="" class="log-img log1">
                    <img src="{{ asset('website/images/login2.png') }}" alt="" class="log-img log2">
                    <img src="{{ asset('website/images/login3.png') }}" alt="" class="log-img log3">
                    <img src="{{ asset('website/images/login4.png') }}" alt="" class="log-img log4">
                    <div class="auth-top col-xs-12">
                        <img src="{{ asset('website/images/password.png') }}" alt="">
                        <h3>تعديل كلمة المرور</h3>
                        {{-- @include('website.alerts') --}}
                    </div>
                    <div class="auth-form col-xs-12">
                        <form action="{{ route('website.reset.password') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group col-md-6 col-xs-12" hidden>
                                <h5> البريد الالكترونى</h5>
                                <input name="email" type="email" class="form-control" value="{{ $email }}"
                                    required autofocus>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <h5>كلمة المرور الجديدة</h5>
                                <input name="password" type="password" class="form-control" id="password-field"
                                    required>
                                <button type="button" class="show-pass" toggle="#password-field">
                                    <i class="la la-eye"></i>
                                </button>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <h5>كلمة المرور الجديدة مرة اخرى</h5>
                                <input name="password_confirmation" type="password" class="form-control"
                                    id="password-field1" required>
                                <button type="button" class="show-pass" toggle="#password-field1">
                                    <i class="la la-eye"></i>
                                </button>
                                @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-xs-12 has-btn">
                                <button type="submit" class="btn">تاكيد</button>
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

    @include('sweetalert::alert')

</body>

</html>
