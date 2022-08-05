<footer class="main-footer col-xs-12">
    <div class="f-top col-xs-12">
        <div class="container">
            <div class="row">
                <div class="f-item col-md-6 col-xs-12" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
                    <div>
                        <div class="f-icon">
                            <i class="la la-clock"></i>
                        </div>
                        <div class="f-data">
                            <h4>ساعات العمل</h4>
                            <ul>
                                <li>
                                    <span>الرعاية المسائية</span>
                                    {{ $settings->evening_care_times }}
                                </li>
                                <li>
                                    <span>الرعاية المسائية</span>
                                    {{ $settings->day_care_times }}
                                </li>
                                <li>
                                    <span>الرعاية المسائية</span>
                                    {{ $settings->daily_care_times }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="f-item col-md-3 col-xs-12" data-aos="fade-up" data-aos-duration="700" data-aos-delay="300">
                    <div>
                        <div class="f-icon">
                            <i class="la la-map-marker"></i>
                        </div>
                        <div class="f-data">
                            <h4>الموقع</h4>
                            <ul>
                                <li>
                                    {{ $settings->region }} <br>
                                    شارع : <a href="#">{{ $settings->street }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="f-item col-md-3 col-xs-12" data-aos="fade-up" data-aos-duration="700" data-aos-delay="400">
                    <div>
                        <div class="f-icon">
                            <i class="la la-mobile"></i>
                        </div>
                        <div class="f-data">
                            <h4>بيانات التواصل</h4>
                            <ul>
                                <li>
                                    <a href="tel:+13458728">{{ $settings->phone }}</a>
                                </li>
                                <li>
                                    <a href="mailto:{{ $settings->adress }}">{{ $settings->adress }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="f-icon">
                            <i class="la la-share-alt"></i>
                        </div>
                        <div class="f-data">
                            <h4>مواقع التواصل الاجتماعي</h4>
                            <div class="soc">
                                @foreach ($social_links as $social_link)
                                    <a href="{{ $social_link->website_url }}" class="{{ $social_link->website_name }}">
                                        <i class="la la-{{ $social_link->website_name }}"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="f-bottom col-xs-12">
        <div class="container">
            <p>&copy; جميع الحقوق محفوظة 2021 لدي مركز سوبرهيروزلاند</p>
            <a href="http://smartvision4p.com/" title="تصميم وبرمجة مؤسسة سمارت فيجن">
                <img src="{{ asset('website/images/dev.svg') }}" alt="">
            </a>
        </div>
    </div>
    <div class="toTop">
        <i class="la la-angle-up"></i>
    </div>
</footer>
</div>

@stack('model')

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
