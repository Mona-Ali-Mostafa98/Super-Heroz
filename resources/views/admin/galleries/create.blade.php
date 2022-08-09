@extends('admin.layout')
@section('page_title', 'اضافة صوره')
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">الصور</h1>
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-primary mb-2 "><i
                        class="bi bi-caret-left-fill ms-1"></i> رجوع</a>
            </div>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-4 mb-3"> أضافة صوره</h5>
                            <form method="POST" action="{{ route('admin.galleries.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <label class="col-sm-2 col-form-label">الصوره</label>
                                    <div class="col-sm-10">
                                        <input name="image" type="file" id="image"
                                            class="form-control mb-3 @error('image') is-invalid @enderror">
                                        @error('image')
                                            <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror
                                        <img id="image" src="{{ asset('storage/' . $gallery->image) }}"
                                            style="height: 80px; width: 100px;" alt="no image uploaded">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
