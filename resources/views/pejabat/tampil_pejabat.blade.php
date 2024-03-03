@extends('layout/template')

@section('isi')
    <!--start page wrapper -->
    <div id="content" class="app-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-1">
            <div class="breadcrumb mb-0">
                <h4>{{ $judul_halaman }}</h4>
            </div>
            <div class="ms-auto">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambah"><i class="fa fa-plus mr-1"></i> Tambah Pejabat Baru</button>

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
                                <th class="text-center">Kode</th>
                                <th>Nama Pejabat</th>
                                <th>Jabatan</th>
                                <th>NIP</th>
                                <th>No. HP</th>
                                <th class="text-center">QR Code TTE</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pejabat as $baris)
                                <tr>
                                    <td class="text-center">{{ $baris->kode_pejabat }}</td>
                                    <td>{{ $baris->nama_pejabat }}</td>
                                    <td>{{ $baris->jabatan }}</td>
                                    <td>{{ $baris->nip }}</td>   
                                    <td>{{ $baris->no_hp }}</td>                                   
                                    <td class="text-center">
                                        @if (empty($baris->qrcode_tte))
                                        <img src="{{ asset('uploads/qrcode_tte/default.jpg') }}"  class="user-img" alt="user avatar" width="50px" height="50px"></td>
                                        @else
                                        <img src="{{asset('uploads')}}/qrcode_tte/{{ $baris->qrcode_tte }}"  class="user-img" alt="user avatar" width="50px" height="50px"></td>
                                        @endif
                                    </td>     
                                    <td class="text-center">
                                        <a href="#edit{{ $baris->kode_pejabat }}" data-bs-toggle="modal"
                                            class="btn btn-xs btn-green"><i class="fa fa-edit mr-1"></i></a>

                                        <a href="#delete{{ $baris->kode_pejabat }}" data-bs-toggle="modal"
                                            class="btn btn-xs btn-danger"><i class="fa fa-trash-alt mr-1"></i></a>
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
    <div class="modal fade" id="tambah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form action="/pejabat/tambah" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Pejabat Baru</h5>
                        <div class="ms-auto">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save mr-1"></i> Simpan Pejabat</button>

                            <button type="reset" class="btn btn-sm btn-yellow"><i class="fa fa-undo mr-1"></i> Batal Input</button>

                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="fa fa-minus mr-1"></i> Tutup Halaman</button>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row mt-0">

                            <div class="col-xl-12">
                                <div class="border p-4 rounded">

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label"><b>Kode Pejabat</b></label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-sm bg-secondary text-white"
                                                type="text" id="kode_pejabat" name="kode_pejabat"
                                                value="{{ $kode_otomatis }}" readonly="True">
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label"><b>Nama Pejabat</b></label>
                                        <div class="col-sm-9">
                                            <input class="form-control form-control-sm" type="text" id="nama_pejabat"
                                                name="nama_pejabat" value="">
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label"><b>Jabatan</b></label>
                                        <div class="col-sm-9">
                                            <input class="form-control form-control-sm" type="text" id="jabatan"
                                                name="jabatan" value="">
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label"><b>NIP</b></label>
                                        <div class="col-sm-9">
                                            <input class="form-control form-control-sm" type="text" id="nip"
                                                name="nip" value="">
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label"><b>No. Hp</b></label>
                                        <div class="col-sm-9">
                                            <input class="form-control form-control-sm" type="text" id="no_hp"
                                                name="no_hp" value="">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label class="col-sm-3 col-form-label"><b>QR Code TTE</b></label>
                                        <div class="col-sm-9">
                                            <input type="file" name="qrcode_tte" id="preview_gambar" class="form-control form-control-sm">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <img src="{{ asset('uploads/qrcode_tte/default.jpg') }}" id="gambar_load" width="110px">
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


    <!-- ########## Modal Edit ########## -->
    @foreach ($pejabat as $baris)
        <div class="modal fade" id="edit{{ $baris->kode_pejabat }}">
            <div class="modal-dialog modal-lg">
                <div class=" modal-content">

                    <form action="/pejabat/update/{{ $baris->kode_pejabat }}" method="POST" id="frmuser"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="modal-header">
                            <h5 class="modal-title">Edit Pejabat</h5>
                            <div class="ms-auto">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save mr-1"></i> Update Pejabat</button>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="fa fa-minus mr-1"></i> Tutup Halaman</button>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="row mt-0">

                                <div class="col-xl-12">
                                    <div class="border p-4 rounded">

                                        <div class="row mb-1">
                                            <label class="col-sm-3 col-form-label"><b>Kode Pejabat</b></label>
                                            <div class="col-sm-4">
                                                <input class="form-control form-control-sm bg-secondary text-white"
                                                    type="text" id="kode_pejabat" name="kode_pejabat"
                                                    value="{{ $baris->kode_pejabat }}" readonly="True">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-sm-3 col-form-label"><b>Nama Pejabat</b></label>
                                            <div class="col-sm-9">
                                                <input class="form-control form-control-sm" type="text"
                                                    id="nama_pejabat" name="nama_pejabat"
                                                    value="{{ $baris->nama_pejabat }}">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-sm-3 col-form-label"><b>Jabatan</b></label>
                                            <div class="col-sm-9">
                                                <input class="form-control form-control-sm" type="text"
                                                    id="jabatan" name="jabatan"
                                                    value="{{ $baris->jabatan }}">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-sm-3 col-form-label"><b>NIP</b></label>
                                            <div class="col-sm-9">
                                                <input class="form-control form-control-sm" type="text"
                                                    id="nip" name="nip"
                                                    value="{{ $baris->nip }}">
                                            </div>
                                        </div>
                                        <div class="row mb-1">
                                            <label class="col-sm-3 col-form-label"><b>No. Hp</b></label>
                                            <div class="col-sm-9">
                                                <input class="form-control form-control-sm" type="text"
                                                    id="no_hp" name="no_hp"
                                                    value="{{ $baris->no_hp }}">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label class="col-sm-3 col-form-label"><b>QR Code TTE</b></label>
                                            <div class="col-sm-9">
                                                <input type="file" name="qrcode_tte" id="preview_gambar" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <img src="{{asset('uploads')}}/qrcode_tte/{{ $baris->qrcode_tte }}" id="gambar_load" width="150px">
                                            </div>
                                        </div>
        
                                    </div>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div><!-- modal-dialog -->
    @endforeach
    <!-- ########## End Modal Edit ########## -->


    <!-- ########## Modal Hapus ########## -->
    @foreach ($pejabat as $baris)
        <div class="modal fade" id="delete{{ $baris->kode_pejabat }}">
            <div class="modal-dialog modal-xs">
                <div class=" modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus {{ $judul_halaman }}</h5>
                    </div>

                    <div class="modal-body pd-25">
                        Konfirmasi Hapus Pejabat : <b>{{ $baris->nama_pejabat }} ?</b>
                    </div>

                    <div class="modal-footer">
                        <a href="/pejabat/{{ $baris->kode_pejabat }}/hapus/" class="btn btn-sm btn-primary"><i
                                class="fa fa-trash-alt mr-1"></i> Hapus Data</a>

                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i
                                class="fa fa-minus mr-1"></i> Tutup Halaman</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- ########## End Modal Hapus User ########## -->
@endsection
