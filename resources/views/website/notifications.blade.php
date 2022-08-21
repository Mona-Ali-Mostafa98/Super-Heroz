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
                                <li>
                                    <a href="{{ route('website.user.kids') }}">اطفالى</a>
                                </li>
                                <li class="active">
                                    <a href="{{ route('website.notifications') }}">الاشعارات</a>
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
                                            @if (Auth::user()->notifications)
                                                @foreach (Auth::user()->notifications as $notification)
                                                    <div class="msg-item">
                                                        <div class="m-img">
                                                            <img src="{{ asset('storage/' . $user->image) }}"
                                                                alt="">
                                                        </div>
                                                        @if ($notification->type == 'App\Notifications\AdminSendImageForKid')
                                                            <div class="m-data">
                                                                <h3>
                                                                    <a
                                                                        href="{{ route('website.kid_profile_view', $kid->id) }}">لقد
                                                                        تم رفع صوره لطفل من أطفالك </a>
                                                                </h3>
                                                                <p>{{ $notification?->data['image'] }}</p>
                                                            </div>
                                                        @endif
                                                        @if ($notification?->type == 'App\Notifications\AdminSendReportForKid')
                                                            <div class="m-data">
                                                                <h3>
                                                                    <a
                                                                        href="{{ route('website.kid_profile_view', $kid->id) }}">لقد
                                                                        تم رفع تقرير لطفل من أطفالك</a>
                                                                </h3>
                                                                <p>{{ $notification->data['report'] }}</p>
                                                            </div>
                                                        @endif
                                                        @if ($notification?->type == 'App\Notifications\AdminSendMessageForKid')
                                                            <div class="m-data">
                                                                <h3>
                                                                    <a
                                                                        href="{{ route('website.kid_profile_view', $kid->id) }}">لقد
                                                                        تم أرسال رساله لطفل من أطفالك </a>
                                                                </h3>
                                                                <p>{{ $notification?->data['message'] }}</p>
                                                            </div>
                                                        @endif
                                                        <div class="m-extra">
                                                            <span>{{ $notification->created_at->translatedFormat('d/m/Y') }}</span>
                                                            <span>{{ $notification->created_at->translatedFormat('H:i A') }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="msg-item">
                                                    <div class="m-data">
                                                        <p>لا يوجد لديك أية اشعارات</p>
                                                    </div>
                                                </div>
                                            @endif
                                            {{-- <div class="msg-item">
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
                                            </div> --}}
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
