@extends('admin.layout')
@section('page_title', 'Admins List')
@section('content')
    <main id="main" class="main">
        <div class="row pagetitle mb-2">
            <div class="col-sm-6 d-flex justify-content-start">
                <h1 class="mb-2 fs-2">تواصل معنا</h1>
            </div>
        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-4 mb-3">كل الرسائل القادمه من المستخدمين</h5>

                            {{-- @include('admin.alerts') --}}

                            <!-- Table with hoverable rows -->
                            <table class="table table-hover table-striped table-bordered border-dark" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">الاسم</th>
                                        <th scope="col">رقم الهاتف</th>
                                        <th scope="col">تاريخ الانشاء</th>
                                        <th scope="col">الأجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-primary fw-bold">{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->created_at }}</td>
                                            <td class="d-flex justify-content-start">
                                                <a href="{{ route('admin.contact.show', $contact->id) }}"
                                                    class=" btn btn-sm btn-success">عرض</a>
                                                <form class=" me-2 form-inline" method="post"
                                                    action="{{ route('admin.contact.destroy', $contact->id) }}">
                                                    @csrf
                                                    @method ('delete')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger show_confirm">حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            <!-- End Table with hoverable rows -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
