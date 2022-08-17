@extends('admin.layout')
@section('page_title', 'Service Booking List')
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">الخدمات المحجوزه</h1>
            </div>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-4 mb-3">كل الخدمات المحجوزه</h5>

                            {{-- @include('admin.alerts') --}}

                            <table class="table table-hover table-striped table-bordered border-dark" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">اسم المستخدم</th>
                                        <th scope="col">الخدمه</th>
                                        <th scope="col">تاريخ الحجز</th>
                                        <th scope="col">الطفل المحجوز له</th>
                                        <th scope="col">تاريخ الانشاء</th>
                                        <th scope="col">الاجراءت</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($booking_services as $booking_service)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ route('admin.users.show', $booking_service->user->id) }}">
                                                    {{ $booking_service->user->name }}</a>
                                            </td>
                                            <td>{{ $booking_service->service }}</td>
                                            <td>{{ $booking_service->date }}</td>
                                            <td>{{ $booking_service->child }}</td>
                                            <td>{{ $booking_service->created_at?->translatedFormat('l , j F Y') ?? 'N/A' }}
                                            </td>

                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    {{-- <a href="{{ route('admin.galleries.show', $gallery->id) }}"
                                                        class=" btn btn-sm btn-success">عرض</a> --}}
                                                    <form class=" me-2 form-inline" method="post"
                                                        action="{{ route('admin.booking_services.destroy', $booking_service->id) }}">
                                                        @csrf
                                                        @method ('delete')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger show_confirm">حذف</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-4 mb-3 d-flex justify-content-end">
                                {{ $booking_services->links() }}
                            </div>
                            <!-- End Table with hoverable rows -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
