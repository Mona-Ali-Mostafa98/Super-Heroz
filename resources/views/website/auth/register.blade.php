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
                <div class="c-card col-xs-12">
                    <img src="{{ asset('website/images/login1.png') }}" alt="" class="log-img log1">
                    <img src="{{ asset('website/images/login2.png') }}" alt="" class="log-img log2">
                    <img src="{{ asset('website/images/login3.png') }}" alt="" class="log-img log3">
                    <img src="{{ asset('website/images/login4.png') }}" alt="" class="log-img log4">
                    <div class="auth-top col-xs-12">
                    <a href="{{ route('website.index') }}">
                            <img src="{{asset('storage/' . $settings->logo) }}" alt="">
                        </a>
                    <h3>تسجيل حساب</h3>
                </div>
                <div class="auth-form col-xs-12">
                    <form action="{{route('website.register')}}" method="post">
                        @csrf
                        <div class="form-group col-md-6 col-xs-12">
                            <h5>الاسم ثلاثي</h5>
                            <input name="name" type="text" class="form-control">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <h5>رقم الهاتف</h5>
                            <input name="phone" type="text" class="form-control">
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <h5>البريد الالكترونى</h5>
                            <input name="email" type="email" class="form-control">
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
                        <div class="form-group col-xs-12 has-btn">
                            <button type="submit" class="btn">تسجيل</button>
                        </div>
                        <div class="form-group col-xs-12 has-hint">
                            <p class="login-hint">
                                لديك حساب بالفعل؟ 
                                <a href="{{route('website.login')}}">سجل دخول</a>
                            </p>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </main>
    </div>
    
    <div class="modal fade" id="addition_success">
  <div class="modal-dialog">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">
            <i class="la la-close"></i>
        </button>
      <div class="modal-body">
          <img src="images/check.svg" alt="">
          <p>تم إضافة الطفل بنجاح وسيتم
 التواصل معكم لكى يتم تفعيل
 حساب الطفل</p>
          <a href="#" class="btn">الذهاب للملف الشخصي</a>
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

<script>
    
    $('.add-n').click(function () {
       $('#p_spec').clone().appendTo('.append-persons');
    });
    </script>
</body>

</html>