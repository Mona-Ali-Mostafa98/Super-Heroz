@extends('website.layout')
@section('content')
    <main class="main-content col-xs-12">
        <div class="breads col-xs-12" style="background-image: url({{ asset('website/images/slide.jpg') }});">
            <div class="container">
                <h3>حسابي</h3>
                <ul>
                    <li>
                        <a href="{{ route('website.index') }}">الرئيسية</a>
                    </li>
                    <li>حسابي</li>
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
                                <li class="active">
                                    <a href="{{ route('website.profile') }}">الملف الشخصي</a>
                                </li>
                                <li>
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
                    <div class="c-head">
                        <h3>الملف الشخصي</h3>
                    </div>
                    <div class="c-card col-xs-12">
                        <div class="card-inner">
                            <div class="personal-data">
                                <div class="p-top">
                                    <span>رقم الجوال :{{ $user->phone }}</span>
                                    <a href="#">
                                        <i class="la la-lock"></i>
                                        تعديل كلمة المرور
                                    </a>
                                </div>
                                <div class="p-form">
                                    <form action="{{ route('website.profile.update', $user->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="form-group col-md-6 col-xs-12">
                                            <h5>اسم ولى الامر ثلاثي</h5>
                                            <input name="name" type="text" class="form-control"
                                                placeholder="اسم ولى الامر يكتب هنا" value="{{ $user->name }}">
                                            @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-xs-12">
                                            <h5>رقم الجوال</h5>
                                            <input name="phone" type="text" class="form-control"
                                                placeholder="رقم الهاتف يكتب هنا" value="{{ $user->phone }}">
                                            @error('phone')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-xs-12">
                                            <h5>البريد الالكترونى</h5>
                                            <input name="email" type="email" class="form-control"
                                                placeholder="البريد الالكترونى يكتب هنا" value="{{ $user->email }}">
                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-xs-12">
                                            <h5>العنوان</h5>
                                            <input name="address" type="text" class="form-control"
                                                placeholder="العنوان يكتب هنا" value="{{ $user->address }}">
                                            @error('address')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-xs-12">
                                            <h5>صورة البروفايل</h5>
                                            <input type="file" name="image" class="form-control">
                                            @error('image')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12 col-xs-12">
                                            <button type="submit" class="btn">تعديل</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection