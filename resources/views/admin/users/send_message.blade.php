@extends('admin.layout')
@section('page_title', 'send message')
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">المستخدمين / الأطفال</h1>
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
                <a href="{{ route('admin.info_about_kid', $kid->id) }}" class="btn btn-primary mb-2 "><i
                        class="bi bi-caret-left-fill ms-1"></i> رجوع</a>
            </div>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-4 mb-3"> أرسال رساله للطفل</h5>
                            <form method="POST" action="{{ route('admin.send_message') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input name="kid_id" type="text" value="{{ $kid->id }}" hidden>
                                    @error('kid_id')
                                        <strong class="alert alert-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="row">
                                    <input name="user_id" type="text" value="{{ $user->id }}" hidden>
                                    @error('user_id')
                                        <strong class="alert alert-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label">الرساله </label>
                                    <div class="col-sm-10">
                                        <textarea name="message" id="message" rows="4" placeholder="ادخل نص الرساله المراد ارسالها"
                                            class="col-sm-12 form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                                        @error('message')
                                            <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">أرسال</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
