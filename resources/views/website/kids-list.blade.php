@extends('website.layout')
@section('content')
    <main class="main-content col-xs-12">
        <div class="breads col-xs-12" style="background-image: url(images/slide.jpg);">
            <div class="container">
                <h3>قائمة اطفالى</h3>
                <ul>
                    <li>
                        <a href="{{ route('website.index') }}">الرئيسية</a>
                    </li>
                    <li>قائمة اطفالى</li>
                </ul>
            </div>
        </div>
        <div class="s-wrap col-xs-12">
            <div class="container">
                <button type="button" class="op-sidebar">
                    <img src="images/pic.png" alt="">
                </button>
                <div class="s-sidebar col-md-3 col-xs-12">
                    <div class="c-card">
                        <button class="cl-sidebar">
                            <i class="la la-close"></i>
                        </button>
                        <div class="s-top">
                            <div class="s-img">
                                <img src="images/pic.png" alt="">
                            </div>
                            <div class="s-data">
                                <h3>خديجة عبد الله</h3>
                                <span>05254652155</span>
                            </div>
                        </div>
                        <div class="s-bottom">
                            <ul>
                                <li>
                                    <a href="#">الملف الشخصي</a>
                                </li>
                                <li class="active">
                                    <a href="#">اطفالى</a>
                                </li>
                                <li>
                                    <a href="#">الاشعارات</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="s-content col-md-9 col-xs-12">
                    <div class="c-spec-head">
                        <div class="c-head">
                            <h3>اطفالى</h3>
                            <span>اسم الطفل</span>
                        </div>
                        <a href="#" class="btn btn-orange">تعديل ملف الطفل</a>
                    </div>
                    <div class="c-card c-kids-list col-xs-12">
                        <div class="card-inner">
                            <div class="kids-list">
                                <div class="kids-top">
                                    <div class="top-info">
                                        <div class="t-img">
                                            <img src="images/pic.png" alt="">
                                        </div>
                                        <div class="t-data">
                                            <h3>اسم الطفل</h3>
                                            <p>5 سنوات</p>
                                        </div>
                                    </div>
                                    <div class="t-data">
                                        <h3>الصف الدراسي</h3>
                                        <p>الأول الابتدائي</p>
                                    </div>
                                    <div class="t-data">
                                        <h3>اسم المعلمة</h3>
                                        <p>اسم المعلمة يكتب هنا</p>
                                    </div>
                                </div>
                                <div class="kids-bottom">
                                    <ul class="nav-tabs">
                                        <li class="active">
                                            <a href="#" data-toggle="tab" data-target="#kids_images">الصور</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tab" data-target="#kids_reports">التقارير</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="tab" data-target="#kids_msgs">الرسائل</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="kids_images">
                                            <div class="gallery-item">
                                                <p>الأربعاء 17/2/2020</p>
                                                <div class="d-item col-md-2 col-sm-4 col-xs-6">
                                                    <a href="images/pic.png" data-fancybox="gallery">
                                                        <img src="images/pic.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="d-item col-md-2 col-sm-4 col-xs-6">
                                                    <a href="images/pic.png" data-fancybox="gallery">
                                                        <img src="images/pic.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="d-item col-md-2 col-sm-4 col-xs-6">
                                                    <a href="images/pic.png" data-fancybox="gallery">
                                                        <img src="images/pic.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="d-item col-md-2 col-sm-4 col-xs-6">
                                                    <a href="images/pic.png" data-fancybox="gallery">
                                                        <img src="images/pic.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="d-item col-md-2 col-sm-4 col-xs-6">
                                                    <a href="images/pic.png" data-fancybox="gallery">
                                                        <img src="images/pic.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="d-item col-md-2 col-sm-4 col-xs-6">
                                                    <a href="images/pic.png" data-fancybox="gallery">
                                                        <img src="images/pic.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="gallery-item">
                                                <p>الثلاثاء 16/2/2020</p>
                                                <div class="d-item col-md-2 col-sm-4 col-xs-6">
                                                    <a href="images/pic.png" data-fancybox="gallery">
                                                        <img src="images/pic.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="d-item col-md-2 col-sm-4 col-xs-6">
                                                    <a href="images/pic.png" data-fancybox="gallery">
                                                        <img src="images/pic.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="d-item col-md-2 col-sm-4 col-xs-6">
                                                    <a href="images/pic.png" data-fancybox="gallery">
                                                        <img src="images/pic.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="d-item col-md-2 col-sm-4 col-xs-6">
                                                    <a href="images/pic.png" data-fancybox="gallery">
                                                        <img src="images/pic.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="d-item col-md-2 col-sm-4 col-xs-6">
                                                    <a href="images/pic.png" data-fancybox="gallery">
                                                        <img src="images/pic.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="d-item col-md-2 col-sm-4 col-xs-6">
                                                    <a href="images/pic.png" data-fancybox="gallery">
                                                        <img src="images/pic.png" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="kids_reports">
                                            <div class="k-reports">
                                                <div class="report-item col-md-6 col-xs-12">
                                                    <div class="r-inner">
                                                        <div class="r-icon">
                                                            <i class="la la-file-pdf"></i>
                                                        </div>
                                                        <div class="r-info">
                                                            <a href="#">اسم التقرير يكتب هنا</a>
                                                            <span>2/6/2021</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="report-item col-md-6 col-xs-12">
                                                    <div class="r-inner">
                                                        <div class="r-icon">
                                                            <i class="la la-file-pdf"></i>
                                                        </div>
                                                        <div class="r-info">
                                                            <a href="#">اسم التقرير يكتب هنا</a>
                                                            <span>2/6/2021</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="report-item col-md-6 col-xs-12">
                                                    <div class="r-inner">
                                                        <div class="r-icon">
                                                            <i class="la la-file-pdf"></i>
                                                        </div>
                                                        <div class="r-info">
                                                            <a href="#">اسم التقرير يكتب هنا</a>
                                                            <span>2/6/2021</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="report-item col-md-6 col-xs-12">
                                                    <div class="r-inner">
                                                        <div class="r-icon">
                                                            <i class="la la-file-pdf"></i>
                                                        </div>
                                                        <div class="r-info">
                                                            <a href="#">اسم التقرير يكتب هنا</a>
                                                            <span>2/6/2021</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="report-item col-md-6 col-xs-12">
                                                    <div class="r-inner">
                                                        <div class="r-icon">
                                                            <i class="la la-file-pdf"></i>
                                                        </div>
                                                        <div class="r-info">
                                                            <a href="#">اسم التقرير يكتب هنا</a>
                                                            <span>2/6/2021</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="report-item col-md-6 col-xs-12">
                                                    <div class="r-inner">
                                                        <div class="r-icon">
                                                            <i class="la la-file-pdf"></i>
                                                        </div>
                                                        <div class="r-info">
                                                            <a href="#">اسم التقرير يكتب هنا</a>
                                                            <span>2/6/2021</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="kids_msgs">
                                            <div class="k-msgs">
                                                <div class="msgs-body">
                                                    <div class="msg-item">
                                                        <div class="m-img">
                                                            <img src="images/pic.png" alt="">
                                                        </div>
                                                        <div class="m-data">
                                                            <h3>اسم المدرس او المدرسة</h3>
                                                            <p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو
                                                                وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه
                                                                مازال نصاً بديلاً ومؤقتاً.</p>
                                                        </div>
                                                        <div class="m-extra">
                                                            <span>2/6/2021</span>
                                                            <span>05:00م</span>
                                                        </div>
                                                    </div>
                                                    <div class="msg-item msg-in">
                                                        <div class="m-img">
                                                            <img src="images/pic.png" alt="">
                                                        </div>
                                                        <div class="m-data">
                                                            <h3>اسم الطفل</h3>
                                                            <p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو
                                                                وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه
                                                                مازال نصاً بديلاً ومؤقتاً.</p>
                                                        </div>
                                                        <div class="m-extra">
                                                            <span>2/6/2021</span>
                                                            <span>05:00م</span>
                                                        </div>
                                                    </div>
                                                    <div class="msg-item">
                                                        <div class="m-img">
                                                            <img src="images/pic.png" alt="">
                                                        </div>
                                                        <div class="m-data">
                                                            <h3>اسم المدرس او المدرسة</h3>
                                                            <p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو
                                                                وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه
                                                                مازال نصاً بديلاً ومؤقتاً.</p>
                                                        </div>
                                                        <div class="m-extra">
                                                            <span>2/6/2021</span>
                                                            <span>05:00م</span>
                                                        </div>
                                                    </div>
                                                    <div class="msg-item msg-in">
                                                        <div class="m-img">
                                                            <img src="images/pic.png" alt="">
                                                        </div>
                                                        <div class="m-data">
                                                            <h3>اسم الطفل</h3>
                                                            <p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو
                                                                وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه
                                                                مازال نصاً بديلاً ومؤقتاً.</p>
                                                        </div>
                                                        <div class="m-extra">
                                                            <span>2/6/2021</span>
                                                            <span>05:00م</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="msgs-footer">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder="اكتب رد"></textarea>
                                                        <button type="submit">
                                                            <i class="la la-paper-plane"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
