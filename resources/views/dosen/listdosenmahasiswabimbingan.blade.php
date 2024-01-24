@extends('layouts.master')
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Mahasiswa Bimbingan</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dosen</a></li>
                            <li class="breadcrumb-item active">Mahasiswa Bimbingan</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">List Mahasiswa Bimbingan</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a href="dosen/mahasiswabimbingan/list/page" class="btn btn-outline-gray me-2 active">
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                        <a href="{{ route('dosen/mahasiswabimbingan/grid/page') }}" class="btn btn-outline-gray me-2">
                                            <i class="fa fa-th" aria-hidden="true"></i>
                                        <a href="#" class="btn btn-outline-primary me-2"><i
                                                class="fas fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>
    
                            <div class="table-responsive">
                                <table id="DataList" class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                    <thead class="student-thread"> 
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>NIM</th>
                                            <th>Progress</th>
                                            <th>Status Sidang</th>
                                            <th>Mobile Number</th>
                                            <th>Address</th>
                                            <th>Birthdate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listbimbingan as $key => $mahasiswa)
                                        <tr>
                                            <td hidden class="user_id">{{ $mahasiswa->user_id }}</td>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $mahasiswa->name_full }}</td>
                                            <td>{{ $mahasiswa->nim }}</td>
                                            <td>
                                                @php
                                                    $bgProgress = 'danger';
                                                    $progress = '0%';
                                            
                                                    // Mengambil nilai sidang terakhir dari tabel mahasiswa
                                                    $sidangTerakhir = $mahasiswa->sidang_terakhir;
                                            
                                                    // Logika untuk menghitung progress berdasarkan sidang terakhir
                                                    if ($sidangTerakhir == 'Pengajuan Judul') {
                                                        $progress = '0%';
                                                    } elseif ($sidangTerakhir == 'Proposal') {
                                                        $progress = '33.33%';
                                                        $bgProgress = 'warning';
                                                    } elseif ($sidangTerakhir == 'Hasil') {
                                                        $progress = '66.66%';
                                                        $bgProgress = 'info';
                                                    } elseif ($sidangTerakhir == 'Skripsi') {
                                                        $progress = '100%';
                                                        $bgProgress = 'success';
                                                    }
                                                @endphp
                                            
                                                <div class="progress progress-xs">
                                                    <div class="progress-bar bg-{{ $bgProgress }}" style="width: {{ $progress }}"></div>
                                                </div>
                                            </td>
                                            <td>{{ $mahasiswa->sidang_terakhir }}</td>
                                            <td>{{ $mahasiswa->mobile_phone }}</td>
                                            <td>{{ $mahasiswa->address }}</td>
                                            <td>{{ $mahasiswa->birthdate }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
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
