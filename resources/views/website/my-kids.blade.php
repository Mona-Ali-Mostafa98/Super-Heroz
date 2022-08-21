@extends('website.layout')
@section('content')
    <main class="main-content col-xs-12">
        <div class="breads col-xs-12" style="background-image: url({{ asset('website/images/slide.jpg') }});">
            <div class="container">
                <h3> اطفالى</h3>
                <ul>
                    <li>
                        <a href="{{ route('website.index') }}">الرئيسية</a>
                    </li>
                    <li> اطفالى</li>
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
                        </div>
                        <a href="{{ route('website.add_kid_view') }}" class="btn btn-orange">
                            <i class="la la-plus"></i>
                            اضافة طفل
                        </a>
                    </div>
                    <div class="c-card col-xs-12">
                        <div class="card-inner">
                            <div class="my-kids">
                                @forelse ($user->kids as $kid)
                                    <div class="kid-item active">
                                        <div class="k-data">
                                            <div class="k-img">
                                                <img src="{{ asset('storage/' . $kid->recent_kid_photo) }}" alt="">
                                            </div>
                                            <a href="{{ route('website.kid_profile_view', $kid->id) }}">
                                                <div class="k-info">
                                                    <h3>{{ $kid->kid_name }}</h3>
                                                    <span>{{ $kid->educational_level }}</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="k-status">
                                            <span>مفعل</span>
                                        </div>
                                    </div>
                                @empty
                                    <div class="empty-kids-area">
                                        <img src="{{ asset('website/images/empty.png') }}" alt="">
                                        <p>لم تقم بإضافة اطفال</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
