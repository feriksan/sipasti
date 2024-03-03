@extends('layout/template')

@section('isi')

<!--start page wrapper -->
<div id="content" class="app-content">

  <form action="/password/update/{{ $profil->kode_user }}" method="POST" id="frmuser" enctype="multipart/form-data">
    @csrf

      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-1 col-6 m-auto">
        <div class="breadcrumb mb-0">
          <h5>{{$judul_halaman}}</h5>
        </div>
        <div class="ms-auto">
          <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save mr-1"></i> Ubah Password</button>
          <a href="/" class="btn btn-sm btn-danger"><i class="fa fa-minus mr-1"></i> Tutup Halaman</a>
        </div>
      </div>
      <!--end breadcrumb-->

      <hr class="col-6 m-auto">

      <div class="card col-6 m-auto">
        <div class="card-body">

          <div class="container">
              <div class="row">
                  {{-- Hidden --}}
                  <input type="hidden" class="form-control form-control-sm text-bg-secondary text-white" id="kode_user" name="kode_user" value="{{ $profil->kode_user }}" readonly>

                  <div class="row mb-0 mt-2">
                    <label class="col-sm-5 col-form-label"><b>Password Baru</b></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form-control-sm" id="new_password" name="new_password" value="">
                    </div>
                  </div>
                  <div class="row mb-0">
                    <label class="col-sm-5 col-form-label"><b>Konfirmasi Password Baru</b></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form-control-sm" id="new_password_confirmation" name="new_password_confirmation" value="">
                    </div>
                  </div>

              </div>
          </div>

        </div>
      </div>

  </form>

</div>
<!--end page wrapper -->

@endsection