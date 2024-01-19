@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
    {{-- message --}}
    {!! Toastr::message() !!} 
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Penjadwalan Sidang</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="invoices.html">Jadwal Sidang</a></li>
                            <li class="breadcrumb-item active">Proposal</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('student/simpanjadwalsidangproposal') }}" class="invoices-links active">
                            <i class="fa fa-th" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card invoices-tabs-card border-0">
                <div class="card-body card-body pt-0 pb-0">
                    <div class="invoices-main-tabs">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-8">
                                <div class="invoices-tabs">
                                    <ul>
                                        <li><a class="active" href="{{ route('student/jadwalsidangproposal') }}">Proposal</a></li>
                                        <li><a href="{{ route('student/jadwalsidanghasil') }}">Hasil</a></li>
                                        <li><a href="{{ route('student/jadwalsidangskripsi') }}">Skripsi</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="invoices-settings-btn">
                                    <a href="{{ route('student/jadwalsidanghasil') }}" class="btn">
                                        <i class="feather feather-plus-circle"></i> Next Sidang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($jadwalSidangProposal->isEmpty())
                <div class="error-box">
                    <h1>466</h1>
                    <h3 class="h2 mb-3"><i class="fas fa-exclamation-triangle"></i> Oops! Your data is empty!</h3>
                    <p class="h4 font-weight-normal">The page you requested is blank, please fill it in.</p>
                    <a href="{{route('student/addJadwalSidang')}}" class="btn btn-primary">Add Sidang Proposal</a>
                </div>
            @else
                @foreach($jadwalSidangProposal as $jadwal)
                    <div class="row">
                        <div class="col-sm-6 col-lg-4 col-xl-12 d-flex">
                            <div class="card invoices-grid-card w-100">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <a href="view-invoice.html" class="invoice-grid-link">Sidang Proposal</a>
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
                                            <img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="{{ URL::to('/svg/proposal_icon.svg') }}" alt="User Image"> {{ $jadwal->judul_skripsi }} 
                                        </a>
                                    </h2>
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <span><i class="fa fa-clipboard-check"></i> {{ $jadwal->bimbingan_status }}</span>
                                            <h6 class="mb-0">{{ \Carbon\Carbon::parse($jadwal->tanggal_sidang)->format('l, j F Y') }} | {{ $jadwal->waktu_sidang }} WITA</h6>
                                        </div>
                                        <div class="col-auto">
                                            <span><i class="far fa-calendar-alt"></i> Delivery time</span>
                                            <h6 class="mb-0">{{ $jadwal->formatted_date}}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="badge bg-success-dark">{{ $jadwal->status}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
