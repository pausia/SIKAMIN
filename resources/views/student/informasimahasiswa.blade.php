
@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Kelengkapan Informasi Mahasiswa</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('student/add/page') }}">Mahasiswa</a></li>
                                <li class="breadcrumb-item active">Kelengkapan Informasi Mahasiswa</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card comman-shadow">
                        <div class="card-body">
                            <form action="{{ route('student/saveJadwalSidang') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title student-info">Informasi Pelaksanaan Sidang
                                            <span>
                                                <a href="javascript:;"></a>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Nama Lengkap <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('name_full') is-invalid @enderror" name="name_full" placeholder="Masukan Nama Lengkap" value="{{ old('name_full') }}">
                                            @error('name_full')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Nim <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" placeholder="Masukan Nim" value="{{ old('nim') }}">
                                            @error('nim')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Mobile Phone <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('mobile_phone') is-invalid @enderror" name="mobile_phone" placeholder="Masukan Mobile Phone" value="{{ old('mobile_phone') }}">
                                            @error('mobile_phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Alamat <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Masukan Alamat" value="{{ old('address') }}">
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Tanggal Lahir <span class="login-danger">*</span></label>
                                            <input class="form-control datetimepicker @error('birthdate') is-invalid @enderror" name="birthdate" type="text" placeholder="DD-MM-YYYY" value="{{ old('birthdate') }}">
                                            @error('birthdate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h5 class="form-title student-info">Informasi Dosen Pembimbing I & II
                                            <span>
                                                <a href="javascript:;"></a>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Pembimbing Pertama<span class="login-danger">*</span></label>
                                            <select class="form-control select @error('dosen_pembimbing_1_id') is-invalid @enderror" name="dosen_pembimbing_1_id">
                                                <option selected disabled>Please Select Pembimbing</option>
                                                @foreach($dosens as $dosen)
                                                    <option value="{{ $dosen->user_id }}" {{ old('dosen_pembimbing_1_id') == $dosen->user_id ? "selected" : "" }}>
                                                        {{ $dosen->name_full }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('dosen_pembimbing_1_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Pembimbing Kedua<span class="login-danger">*</span></label>
                                            <select class="form-control select @error('dosen_pembimbing_2_id') is-invalid @enderror" name="dosen_pembimbing_2_id">
                                                <option selected disabled>Please Select Pembimbing</option>
                                                @foreach($dosens as $dosen)
                                                    <option value="{{ $dosen->user_id }}" {{ old('dosen_pembimbing_2_id') == $dosen->user_id ? "selected" : "" }}>
                                                        {{ $dosen->name_full }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('dosen_pembimbing_2_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="student-submit">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

    function confirmation(ev) {

      ev.preventDefault();

      var urlToRedirect = ev.currentTarget.getAttribute('href');  

      console.log(urlToRedirect); 

      swal({

          title: "Are you sure to cancel this product",

          text: "You will not be able to revert this!",

          icon: "warning",

          buttons: true,

          dangerMode: true,

      })

      .then((willCancel) => {

          if (willCancel) {





               

              window.location.href = urlToRedirect;

             

          }  





      });

  }

</script>


