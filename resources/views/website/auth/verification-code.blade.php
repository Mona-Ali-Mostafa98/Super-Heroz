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
    <link href="css/style.css" rel="stylesheet">
    <!-- <link href="css/bootstrap-rtl.min.css" rel="stylesheet"> -->
    <link href="css/style-res.css" rel="stylesheet">
   <link href="css/style-en.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.png">

</head>

<body>

    <div id="loading">
        <div class="loading">

        </div>
    </div>
    
    <div class="wrapper col-xs-12">
        <main class="main-content col-xs-12">
            <div class="back-home col-xs-12">
                <a href="#">
                    <i class="la la-angle-right"></i>
                    عودة للصفحة الرئيسية
                </a>
            </div>
            <div class="auth-wrap col-xs-12">
                <div class="c-card verify col-xs-12">
                    <img src="images/login1.png" alt="" class="log-img log1">
                    <img src="images/login2.png" alt="" class="log-img log2">
                    <img src="images/login3.png" alt="" class="log-img log3">
                    <img src="images/login4.png" alt="" class="log-img log4">
                    <div class="auth-top col-xs-12">
                    <img src="images/verify.png" alt="">
                    <h3>كود التحقق</h3>
                        <p>تم ارسال كود التحقق المكون من أربعة
 ارقام الى بريدك الالكترونى</p>
                </div>
                <div class="auth-form col-xs-12">
                    <form action="#" method="get">
                        <div class="form-group col-xs-12">
                            <input type="text" maxlength="1" min="0" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            <input type="text" maxlength="1" min="0" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            <input type="text" maxlength="1" min="0" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            <input type="text" maxlength="1" min="0" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        </div>
                        <div class="form-group col-xs-12">
                            <h5 id="timer">00:30</h5>
                        </div>
                        <div class="form-group col-xs-12">
                            <a href="#">
                                <i class="la la-redo-alt"></i>
                                إعادة ارسال
                            </a>
                        </div>
                        <div class="form-group col-xs-12 has-btn">
                            <button type="submit" class="btn">تسجيل</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </main>
    </div>



    <!-- Javascript Files -->
    <script src="js/jquery-2.2.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/script.js"></script>
<script>
    
    
time=5*60,r=document.getElementById('timer'),tmp=time;
setInterval(function(){
var c=tmp--,m=(c/60)>>0,s=(c-m*60)+'';
r.textContent='0' + m + ' : ' + (s.length>1?'':'0')+s
tmp!=0||(tmp=time);
},1000);


    </script>
</body>

</html>