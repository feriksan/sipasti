@extends('layout/template')

@section('isi')

<!--start page wrapper -->
<div id="content" class="app-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-1">
        <div class="breadcrumb mb-0">
            <h4>{{$judul_halaman}}</h4>
        </div>
        <div class="ms-auto">
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahuser"><i class="fa fa-plus mr-1"></i> Tambah User Baru</button>

            <a href="/home" class="btn btn-danger btn-sm"><i class="fa fa-minus mr-1"></i> Tutup Halaman</a>
        </div>
    </div>
    <!--end breadcrumb-->

    <hr class="mt-1">

    <div class="card">
        <div class="card-body">
            <div class="table-responsive mt-1">
                <table id="TabelData1" class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th class="text-center" width="60px">Kode</th>
                            <th>Nama</th>
                            <th>e-mail</th>
                            <th>Status</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $baris)
                        <tr>
                            <td class="text-center">{{ $baris->kode_user }}</td>
                            <td>{{ $baris->nama }}</td>
                            <td>{{ $baris->email }}</td>
                            <td>{{ $baris->role }}</td>
                            <td class="text-center">
                                @if (empty($baris->foto_user))
                                <img src="{{ asset('uploads/foto_user/default.png') }}"  class="user-img" alt="user avatar" width="50px" height="50px"></td>
                                @else
                                <img src="{{asset('uploads')}}/foto_user/{{ $baris->foto_user }}"  class="user-img" alt="user avatar" width="50px" height="50px"></td>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="#edit{{$baris->kode_user}}" data-bs-toggle="modal" class="btn btn-xs btn-green"><i class="fa fa-edit mr-1"></i></a>

                                <a href="#delete{{$baris->kode_user}}" data-bs-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash-alt mr-1"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!--end page wrapper -->


<!-- ########## Modal Tambah ########## -->
<div class="modal fade" id="tambahuser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form action="/user/tambah" method="POST" id="frmuser" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h4 class="modal-title">Tambah User Baru</h4>
                    <div class="ms-auto">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save mr-1"></i> Simpan User</button>

                        <button type="reset" class="btn btn-sm btn-yellow"><i class="fa fa-undo mr-1"></i> Batal Input</button>

                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="fa fa-minus mr-1"></i> Tutup Halaman</button>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="row mt-0">

                        <div class="col-xl-12">
                            <div class="border p-4 rounded">

                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Kode User</b></label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-sm bg-secondary text-white" type="text" id="kode_user" name="kode_user" value="{{$kode_otomatis}}" readonly="True">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Nama</b></label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text" id="nama" name="nama" value="">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>E-Mail</b></label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text" id="email" name="email" value="">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Password</b></label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text" id="password" name="password" value="">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Role</b></label>
                                    <div class="col-sm-10">
                                        <select class="form-select form-select-sm" id="role" name="role">
                                            <option value="">-- Pilih --</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Operator">Operator</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-sm-2 col-form-label"><b>Foto User</b></label>
                                    <div class="col-sm-10">
                                        <input type="file" name="foto_user" id="preview_gambar" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <img src="{{ asset('uploads/foto_user/default.png') }}" id="gambar_load" width="150px">
                                    </div>
                                </div>
                            
                            </div>
                        </div>

                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- ########## End Modal Tambah ########## -->


<!-- ########## Modal Edit User ########## -->
@foreach($user as $baris)
<div class="modal fade" id="edit{{$baris->kode_user}}">
    <div class="modal-dialog modal-lg">
        <div class=" modal-content">

            <form action="/user/update/{{ $baris->kode_user }}" method="POST" id="frmuser" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Edit Data User</h5>
                    <div class="ms-auto">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save mr-1"></i> Ubah Data User</button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="fa fa-minus mr-1"></i> Tutup Halaman</button>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="row mt-0">

                        <div class="col-xl-12">
                            <div class="border p-4 rounded">

                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Kode User</b></label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-sm bg-secondary text-white" type="text" id="kode_user" name="kode_user" value="{{ $baris->kode_user}}" readonly="True">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Nama</b></label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text" id="nama" name="nama" value="{{ $baris->nama}}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>E-Mail</b></label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text" id="email" name="email" value="{{ $baris->email}}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Role</b></label>
                                    <div class="col-sm-10">
                                        <select class="form-select form-select-sm" id="role" name="role">
                                            <option value="{{ $baris->role}}">{{ $baris->role}}</option>
                                            <option value="admin">admin</option>
                                            <option value="operator">operator</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-sm-2 col-form-label"><b>Foto User</b></label>
                                    <div class="col-sm-10">
                                        <input type="file" name="foto_user" id="preview_gambar" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <img src="{{asset('uploads')}}/foto_user/{{ $baris->foto_user }}" id="gambar_load" width="150px">
                                    </div>
                                </div>

                                {{-- Hidden --}}
                                <input class="form-control form-control-sm" type="hidden" id="tgl_upload" name="tgl_upload" value="{{ $baris->created_at}}" readonly="True">
                            </div>
                        </div>

                    </div>
                </div>

            </form>
        </div>
    </div>
</div><!-- modal-dialog -->
@endforeach
<!-- ########## End Modal Edit User ########## -->


<!-- ########## Modal Hapus ########## -->
@foreach($user as $baris)
<div class="modal fade" id="delete{{$baris->kode_user}}">
    <div class="modal-dialog modal-xs">
        <div class=" modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus {{$judul_halaman}}</h5>
            </div>

            <div class="modal-body pd-25">
                Konfirmasi Hapus Data User : <b>{{$baris->nama}} ?</b>
            </div>

            <div class="modal-footer">
                <a href="/user/{{$baris->kode_user}}/hapus/" class="btn btn-sm btn-primary"><i class="fa fa-trash-alt mr-1"></i> Hapus Data User</a>

                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="fa fa-minus mr-1"></i> Tutup Halaman</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- ########## End Modal Hapus User ########## -->


@endsection