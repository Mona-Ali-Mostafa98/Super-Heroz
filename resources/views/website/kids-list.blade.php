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
                    <img src="{{ asset('storage/' . $user->image) }}" alt="">
                </button>
                <div class="s-sidebar col-md-3 col-xs-12">
                    <div class="c-card">
                        <button class="cl-sidebar">
                            <i class="la la-close"></i>
                        </button>
                        <div class="s-top">
                            <div class="s-img">
                                @if (!$user->image == null)
                                    <img src="{{ asset('storage/' . $user->image) }}" alt="">
                                @else
                                    <img src="{{ asset('website/images/default_image.jpg') }}" alt="">
                                @endif
                            </div>
                            <div class="s-data">
                                <h3>{{ $user->name }}</h3>
                                <span>{{ $user->phone }}</span>
                            </div>
                        </div>
                        <div class="s-bottom">
                            <ul>
                                <li>
                                    <a href="{{ route('website.profile') }}">الملف الشخصي</a>
                                </li>
                                <li class="active">
                                    <a href="{{ route('website.user.kids') }}">اطفالى</a>
                                </li>
                                <li>
                                    <a href="{{ route('website.notifications') }}">الاشعارات</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="s-content col-md-9 col-xs-12">
                    <div class="c-spec-head">
                        <div class="c-head">
                            <h3>اطفالى</h3>
                            <span>{{ $kid->kid_name }}</span>
                        </div>
                        <a href="#" class="btn btn-orange">تعديل ملف الطفل</a>
                    </div>
                    <div class="c-card c-kids-list col-xs-12">
                        <div class="card-inner">
                            <div class="kids-list">
                                <div class="kids-top">
                                    <div class="top-info">
                                        <div class="t-img">
                                            <img src="{{ asset('storage/' . $kid->recent_kid_photo) }}" alt="">
                                        </div>
                                        <div class="t-data">
                                            <h3>{{ $kid->kid_name }}</h3>
                                            <p>{{ $kid->age }} سنوات</p>
                                        </div>
                                    </div>
                                    <div class="t-data">
                                        <h3>الصف الدراسي</h3>
                                        <p>{{ $kid->educational_level }}</p>
                                    </div>
                                    <div class="t-data">
                                        <h3>اسم المعلمة</h3>
                                        <p>{{ $kid_class->teacher_name }}</p>
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
                                                @foreach ($kid_images as $kid_image)
                                                    <div class="d-item col-md-2 col-sm-4 col-xs-6">
                                                        <a href="{{ asset('storage/kid_images/' . $kid_image->image) }}"
                                                            data-fancybox="gallery">
                                                            <img src="{{ asset('storage/kid_images/' . $kid_image->image) }}"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="kids_reports">
                                            <div class="k-reports">
                                                @foreach ($kid_reports as $kid_report)
                                                    <div class="report-item col-md-6 col-xs-12">
                                                        <div class="r-inner">
                                                            <div class="r-icon">
                                                                <i class="la la-file-pdf"></i>
                                                            </div>
                                                            <div class="r-info">
                                                                <a
                                                                    href="{{ asset('storage/kid_reports/' . $kid_report->report) }}">{{ $kid_report->report }}</a>
                                                                <span>{{ $kid_report->created_at->translatedFormat('d/m/Y') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="kids_msgs">
                                            <div class="k-msgs">
                                                <div class="msgs-body">
                                                    @foreach ($kid_messages as $kid_message)
                                                        <div class="msg-item">
                                                            <div class="m-img">
                                                                <img src="images/pic.png" alt="">
                                                            </div>
                                                            <div class="m-data">
                                                                <h3>اسم المدرس او المدرسة</h3>
                                                                <p>{{ $kid_message->message }}</p>
                                                            </div>
                                                            <div class="m-extra">
                                                                <span>{{ $kid_message->created_at->translatedFormat('d/m/Y') }}</span>
                                                                <span>{{ $kid_message->created_at->translatedFormat('H:i A') }}</span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    {{-- <div class="msg-item msg-in">
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
                                                    </div> --}}
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
