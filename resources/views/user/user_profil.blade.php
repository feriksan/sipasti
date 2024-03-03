@extends('layout/template')

@section('isi')

<!--start page wrapper -->

<div id="content" class="app-content">

  <form action="/profil/update/{{ $profil->kode_user }}" method="POST" id="frmuser" enctype="multipart/form-data">
    @csrf

  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-1 col-6 m-auto">
    <div class="breadcrumb mb-0">
      <h5>{{$judul_halaman}}</h5>
    </div>
    <div class="ms-auto">
      <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save mr-1"></i> Ubah Profil</button>
      <a href="/" class="btn btn-sm btn-danger"><i class="fa fa-minus mr-1"></i> Tutup Halaman</a>
    </div>
  </div>
  <!--end breadcrumb-->

  <hr class="col-6 m-auto">

  <div class="card col-6 m-auto">
    <div class="card-body">

      <div class="container">
          <div class="row">

            <div class="row mb-1 mt-2">
                <label class="col-sm-3 col-form-label"><b>Kode</b></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control form-control-sm text-bg-secondary text-white" id="kode_user" name="kode_user" value="{{ $profil->kode_user }}" readonly>
                </div>
            </div>
            <div class="row mb-1">
                <label class="col-sm-3 col-form-label"><b>Nama Lengkap</b></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="{{ $profil->nama }}">
                </div>
            </div>
            <div class="row mb-1">
                <label class="col-sm-3 col-form-label"><b>E-mail</b></label>
                <div class="col-sm-9">
                  <input type="text" class="form-control form-control-sm" id="email" name="email" value="{{ $profil->email }}">
                </div>
              </div>
            <div class="row mb-1">
                <label class="col-sm-3 col-form-label"><b>Foto Profil</b></label>
                <div class="col-sm-9">
                  <input type="file" name="foto_user" id="preview_gambar" class="form-control form-control-sm">
                </div>
              </div>
            <div class="row mb-2">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                  <img src="{{asset('uploads')}}/foto_user/{{ $profil->foto_user }}" id="gambar_load" class="img-circle" height="150px" width="130px">
                </div>
              </div>

              {{-- Hidden --}}
                <input type="hidden" class="form-control form-control-sm" id="role" name="role" value="{{ $profil->role }}" readonly>
                <input type="hidden" class="form-control form-control-sm" id="created_at" name="created_at" value="{{ $profil->created_at }}" readonly>

          </div>
      </div>

    </div>
  </div>

</form>

</div>
<!--end page wrapper -->

@endsection