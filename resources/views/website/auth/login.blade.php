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
                <div class="c-card login-card col-xs-12">
                    <img src="{{ asset('website/images/login1.png') }}" alt="" class="log-img log1">
                    <img src="{{ asset('website/images/login2.png') }}" alt="" class="log-img log2">
                    <img src="{{ asset('website/images/login3.png') }}" alt="" class="log-img log3">
                    <img src="{{ asset('website/images/login4.png') }}" alt="" class="log-img log4">
                    <div class="auth-top col-xs-12">
                        <a href="{{ route('website.index') }}">
                            <img src="{{asset('storage/' . $settings->logo) }}" alt="">
                        </a>
                        <h3>تسجيل الدخول</h3>
                    </div>
                    <div class="auth-form col-xs-12">
                        <form action="{{ route('website.dologin') }}" method="post">
                            @csrf
                            <div class="form-group col-md-6 col-xs-12">
                                <h5> البريد الالكترونى</h5>
                                <input name="email" type="text" class="form-control">
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                                <h5>كلمة المرور</h5>
                                <input name="password" type="password" class="form-control" id="password-field">
                                <button type="button" class="show-pass" toggle="#password-field">
                                    <i class="la la-eye"></i>
                                </button>
                                @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                            </div>
                            <div class="form-group col-xs-12 has-extra">
                                <label>
                                    <input type="checkbox">
                                    <span>حفظ بيانات الدخول</span>
                                </label>
                                <a href="#" data-toggle="modal" data-target="#change_pass">نسيت كلمة المرور؟</a>
                            </div>
                            <div class="form-group col-xs-12 has-btn">
                                <button type="submit" class="btn">دخول</button>
                            </div>
                            <div class="form-group col-xs-12 has-social">
                                <p>او</p>
                                <ul>
                                    <li>
                                        <a href="#" class="insta">
                                            <i class="la la-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="twt">
                                            <i class="la la-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="gp">
                                            <i class="la la-google-plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group col-xs-12 has-hint">
                                <p class="login-hint">
                                    ليس لديك حساب؟
                                    <a href="{{ route('website.register.create') }}">حساب جديد</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div class="modal fade" id="change_pass">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                    <i class="la la-close"></i>
                </button>
                <div class="modal-body">
                    <div class="ch-form">
                        <form action="#" method="get">
                            <div class="form-group form-group-material">
                                <h4 class="material-label">
                                    <i class="la la-lock"></i>
                                    كلمة المرور القديمة
                                </h4>
                                <input type="password" class="form-control material-field" id="password-field1">
                                <button type="button" class="show-pass" toggle="#password-field1">
                                    <i class="la la-eye"></i>
                                </button>
                            </div>
                            <div class="form-group form-group-material">
                                <h4 class="material-label">
                                    <i class="la la-lock"></i>
                                    كلمة المرور الجديدة
                                </h4>
                                <input type="password" class="form-control material-field" id="password-field2">
                                <button type="button" class="show-pass" toggle="#password-field2">
                                    <i class="la la-eye"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <button type="submit" class="btn">حفظ</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- Javascript Files -->
    <script src="{{ asset('website/js/jquery-2.2.2.min.js')}}"></script>
    <script src="{{ asset('website/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('website/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{ asset('website/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('website/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('website/js/aos.js')}}"></script>
    <script src="{{ asset('website/js/script.js')}}"></script>
</body>

</html>
