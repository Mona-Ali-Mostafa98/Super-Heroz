@extends('admin.layout')
@section('page_title', 'Show user')
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">المستخدمين</h1>
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
                <a href="{{ route('admin.users.index') }}" class="btn btn-primary mb-2 "><i
                        class="bi bi-caret-left-fill ms-1"></i> رجوع</a>
                </h1>
            </div>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-4 mb-3">تفاصيل عن المستخدم : "{{ $user->name }}" </h5>
                            <div class="container-fluid">
                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">#</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->id }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">صورة المستخدم</div>

                                    @if ($user->image)
                                        <div class="col-lg-9 col-md-8">
                                            <img id="image" src="{{ asset('storage/' . $user->image) }}" alt=""
                                                height="100" width="150">
                                        </div>
                                    @else
                                        المستخدم ليس له صورة غلاف
                                    @endif
                                    {{-- <div class="col-lg-9 col-md-8">
                                        <img id="image" src="{{ asset('storage/' . $user->image) }}" alt=""
                                            height="100" width="150">
                                    </div> --}}
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">العنوان</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">رقم الهاتف</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->phone }}</div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">البريد الالكترونى </div>
                                    <div class="col-lg-9 col-md-8"> {{ $user->email }} </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">تاريخ الانشاء</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ $user->created_at?->translatedFormat('l , j F Y , H:i:s') ?? 'N/A' }}
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">تاريخ التعديل </div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ $user->updated_at?->translatedFormat('l , j F Y , H:i:s') ?? 'N/A' }}
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-lg-3 col-md-4 label text-primary fw-bold">الأطفال التابعين للمستخدم
                                    </div>
                                    <div class="col-lg-9 col-md-8">
                                        <table class="table table-hover table-striped table-bordered border-dark"
                                            style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    {{-- <th scope="col">ID</th> --}}
                                                    <th scope="col">الأسم</th>
                                                    <th scope="col">رقم الهاتف</th>
                                                    <th scope="col">البريد الالكترونى</th>
                                                    <th scope="col">تاريخ الانشاء</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($kids as $kid)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td class="text-primary fw-bold"><a
                                                                href="{{ route('admin.info_about_kid', $kid->id) }}">{{ $kid->kid_name }}</a>
                                                        </td>
                                                        <td>{{ $kid->gender }}</td>
                                                        <td>{{ $kid->birth_date }}</td>
                                                        <td>{{ $kid->created_at?->translatedFormat('l , j F Y') ?? 'N/A' }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{-- <div class="mt-4 mb-3 d-flex justify-content-end">
                                            {{ $kids->links() }}
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
