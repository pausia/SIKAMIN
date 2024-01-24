@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Jadwal Sidang Mahasiswa</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Jadwal Sidang Mahasiswa</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Teachers</h3>
                    </div>
                    <div class="col-auto text-end float-end ms-auto download-grp">
                        <a href="{{ route('dosen/mahasiswabimbingan/list/page') }}" class="btn btn-outline-gray me-2">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        <a href="{{ route('dosen/mahasiswabimbingan/grid/page') }}" class="btn btn-outline-gray me-2 active">
                            <i class="fa fa-th" aria-hidden="true"></i>
                        <a href="#" class="btn btn-outline-primary me-2"><i
                                class="fas fa-download"></i> Download</a>
                    </div>
                </div>
            </div>
            <div class="col-6 page-header">
                <h5 class="card-title">Today’s Lesson</h5>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4 col-xl-6 d-flex">
                    <div class="card invoices-grid-card w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a href="view-invoice.html" class="invoice-grid-link">IN093439#@09</a>
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="edit-invoice.html"><i
                                            class="far fa-edit me-2"></i>Edit</a>
                                    <a class="dropdown-item" href="view-invoice.html"><i
                                            class="far fa-eye me-2"></i>View</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-middle">
                            <h2 class="card-middle-avatar">
                                <a href="profile.html">
                                    <img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="{{ URL::to('/images/photo_defaults.jpg') }}" alt="User Image"> StarCode Moore
                                </a>
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <span><i class="far fa-money-bill-alt"></i> Amount</span>
                                    <h6 class="mb-0">$1,54,220</h6>
                                </div>
                                <div class="col-auto">
                                    <span><i class="far fa-calendar-alt"></i> Due Date</span>
                                    <h6 class="mb-0">23 Mar, 2022</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="badge bg-success-dark">Paid</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-lg-4 col-xl-6 d-flex">
                    <div class="card invoices-grid-card w-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <a href="view-invoice.html" class="invoice-grid-link">IN093439#@09</a>
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="edit-invoice.html"><i
                                            class="far fa-edit me-2"></i>Edit</a>
                                    <a class="dropdown-item" href="view-invoice.html"><i
                                            class="far fa-eye me-2"></i>View</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-middle">
                            <h2 class="card-middle-avatar">
                                <a href="profile.html">
                                    <img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="{{ URL::to('/images/photo_defaults.jpg') }}" alt="User Image"> StarCode Moore
                                </a>
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <span><i class="far fa-money-bill-alt"></i> Amount</span>
                                    <h6 class="mb-0">$1,54,220</h6>
                                </div>
                                <div class="col-auto">
                                    <span><i class="far fa-calendar-alt"></i> Due Date</span>
                                    <h6 class="mb-0">23 Mar, 2022</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="badge bg-success-dark">Paid</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </div>
@section('script')
@endsection
@endsection
