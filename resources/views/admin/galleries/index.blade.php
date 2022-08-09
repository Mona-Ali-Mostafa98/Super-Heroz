@extends('admin.layout')
@section('page_title', 'Galleries List')
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">الصور</h1>
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
                <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary mb-2 ">
                    <i class="bi bi-plus-lg ms-1"></i> أضافة صوره</a>
            </div>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-4 mb-3">كل الصور</h5>

                            @include('admin.alerts')

                            <table class="table table-hover table-striped table-bordered border-dark" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        {{-- <th scope="col">ID</th> --}}
                                        <th scope="col">الصوره</th>
                                        <th scope="col">تاريخ الانشاء</th>
                                        <th scope="col">الاجراءت</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($galleries as $gallery)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            {{-- <td>{{ $gallery->id }}</td> --}}
                                            <td><img src="{{ asset('storage/' . $gallery->image) }}" alt=""
                                                    height="60" width="60"></td>
                                            <td>{{ $gallery->created_at->toDateString() }}</td>

                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <a href="{{ route('admin.galleries.show', $gallery->id) }}"
                                                        class=" btn btn-sm btn-success">عرض</a>
                                                    <form class=" me-2 form-inline" method="post"
                                                        action="{{ route('admin.galleries.destroy', $gallery->id) }}">
                                                        @csrf
                                                        @method ('delete')
                                                        <button type="submit" class="btn btn-sm btn-danger "
                                                            onclick="return confirm('هل انت متاكد من حذف هذا العنصر؟')">حذف</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-4 mb-3 d-flex justify-content-end">
                                {{ $galleries->links() }}
                            </div>
                            <!-- End Table with hoverable rows -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
