
@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Tambah Jadwal Sidang</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('student/add/page') }}">Mahasiswa</a></li>
                                <li class="breadcrumb-item active">Tambah Jadwal Sidang</li>
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
                                            <label>Judul Skripsi <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('judul_skripsi') is-invalid @enderror" name="judul_skripsi" placeholder="Masukan judul" value="{{ old('judul_skripsi') }}">
                                            @error('judul_skripsi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Deskripsi Sidang <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" placeholder="Masukan deskripsi sidang" value="{{ old('deskripsi') }}">
                                            @error('deskripsi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Jenis Sidang <span class="login-danger">*</span></label>
                                            <select class="form-control select  @error('jenis_sidang') is-invalid @enderror" name="jenis_sidang">
                                                <option selected disabled>Select Jenis Sidang</option>
                                                <option value="proposal" {{ old('jenis_sidang') == 'proposal' ? "selected" :"proposal"}}>Proposal</option>
                                                <option value="hasil" {{ old('jenis_sidang') == 'hasil' ? "selected" :""}}>Hasil</option>
                                                <option value="skripsi" {{ old('jenis_sidang') == 'skripsi' ? "selected" :""}}>Skripsi</option>
                                            </select>
                                            @error('jenis_sidang')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Tanggal Sidang <span class="login-danger">*</span></label>
                                            <input class="form-control datetimepicker @error('tanggal_sidang') is-invalid @enderror" name="tanggal_sidang" type="text" placeholder="DD-MM-YYYY" value="{{ old('tanggal_sidang') }}">
                                            @error('tanggal_sidang')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Waktu Sidang <span class="login-danger">*</span></label>
                                            <select class="form-control select  @error('waktu_sidang') is-invalid @enderror" name="waktu_sidang">
                                                <option selected disabled>Select Waktu Sidang</option>
                                                <option value="08:00-10:00" {{ old('waktu_sidang') == '08:00-10:00' ? "selected" :"08:00-10:00"}}>Pukul 08:00-10:00 WITA</option>
                                                <option value="10:30-12:30" {{ old('waktu_sidang') == '10:30-12:30' ? "selected" :""}}>Pukul 10:30-12:30 WITA</option>
                                                <option value="13:30-15:30" {{ old('waktu_sidang') == '13:30-15:30' ? "selected" :""}}>Pukul 13:30-15:30 WITA</option>
                                            </select>
                                            @error('waktu_sidang')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h5 class="form-title student-info">Informasi Dosen Pembimbing dan Penguji
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
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Penguji Pertama<span class="login-danger">*</span></label>
                                            <select class="form-control select @error('dosen_penguji_1_id') is-invalid @enderror" name="dosen_penguji_1_id">
                                                <option selected disabled>Please Select Penguji</option>
                                                @foreach($dosens as $dosen)
                                                    <option value="{{ $dosen->user_id }}" {{ old('dosen_penguji_1_id') == $dosen->user_id ? "selected" : "" }}>
                                                        {{ $dosen->name_full }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('dosen_penguji_1_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Penguji Kedua<span class="login-danger">*</span></label>
                                            <select class="form-control select @error('dosen_penguji_2_id') is-invalid @enderror" name="dosen_penguji_2_id">
                                                <option selected disabled>Please Select Penguji</option>
                                                @foreach($dosens as $dosen)
                                                    <option value="{{ $dosen->user_id }}" {{ old('dosen_penguji_2_id') == $dosen->user_id ? "selected" : "" }}>
                                                        {{ $dosen->name_full }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('dosen_penguji_2_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Penguji Ketiga<span class="login-danger">*</span></label>
                                            <select class="form-control select @error('dosen_penguji_3_id') is-invalid @enderror" name="dosen_penguji_3_id">
                                                <option selected disabled>Please Select Penguji</option>
                                                @foreach($dosens as $dosen)
                                                    <option value="{{ $dosen->user_id }}" {{ old('dosen_penguji_3_id') == $dosen->user_id ? "selected" : "" }}>
                                                        {{ $dosen->name_full }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('dosen_penguji_3_id')
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


