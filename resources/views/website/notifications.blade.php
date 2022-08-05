@extends('website.layout')
@section('content')
    <main class="main-content col-xs-12">
        <div class="breads col-xs-12" style="background-image: url(images/slide.jpg);">
            <div class="container">
                <h3>الاشعارات</h3>
                <ul>
                    <li>
                        <a href="{{ route('website.index') }}">الرئيسية</a>
                    </li>
                    <li>الاشعارات</li>
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
                                <li>
                                    <a href="#">اطفالى</a>
                                </li>
                                <li class="active">
                                    <a href="#">الاشعارات</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="s-content col-md-9 col-xs-12">
                    <div class="c-head">
                        <h3>الاشعارات</h3>
                    </div>
                    <div class="c-card c-kids-list notifications col-xs-12">
                        <div class="card-inner">
                            <div class="kids-list">
                                <div class="kids-bottom">
                                    <div class="k-msgs">
                                        <div class="msgs-body">
                                            <div class="msg-item">
                                                <div class="m-img">
                                                    <img src="images/pic.png" alt="">
                                                </div>
                                                <div class="m-data">
                                                    <h3>
                                                        <a href="#">عنوان الاشعار</a>
                                                    </h3>
                                                    <p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص
                                                        منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً
                                                        ومؤقتاً.</p>
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
                                                    <h3>
                                                        <a href="#">عنوان الاشعار</a>
                                                    </h3>
                                                    <p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص
                                                        منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً
                                                        ومؤقتاً.</p>
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
                                                    <h3>
                                                        <a href="#">عنوان الاشعار</a>
                                                    </h3>
                                                    <p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص
                                                        منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً
                                                        ومؤقتاً.</p>
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
                                                    <h3>
                                                        <a href="#">عنوان الاشعار</a>
                                                    </h3>
                                                    <p>هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص
                                                        منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً
                                                        ومؤقتاً.</p>
                                                </div>
                                                <div class="m-extra">
                                                    <span>2/6/2021</span>
                                                    <span>05:00م</span>
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
