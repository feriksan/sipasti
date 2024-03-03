@extends('layout/template')

@section('isi')
<!--start page wrapper -->
<div id="content" class="app-content">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb mb-0">
                <h4><?= $judul_halaman ?></h4>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr>

        <form action="/surke/data" method="GET">
            <?= csrf_field(); ?>

            <!-- baris atas -->
            <div class="row">
                <div class="col-lg-3">
                    <label class="form-label"><b>Tanggal Awal</b></label>
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-sm date-picker" type="text" id="tgl_awal" name="tgl_awal" value="<?php echo date('d-m-Y'); ?>">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <label class="form-label"><b>Tanggal Akhir</b></label>
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-sm date-picker" type="text" id="tgl_akhir" name="tgl_akhir" value="<?php echo date('d-m-Y'); ?>">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><b>Data Surat Keluar</b></label>
                        <div class="input-group input-group-sm">
                            <button type="submit" name="BtnTampil" id="BtnTampil" class="btn btn-primary btn-sm"><i class="fa fa-folder-open mr-1"></i> Buka Data Surat Keluar</button> &nbsp;

                            <a href="/surke" class="btn btn-sm btn-danger"><i class="fa fa-minus mr-1"></i> Tutup Halaman</a>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <!-- baris bawah -->
            <div class="card border-top border-0 border-3 border-primary">
                <div class="card-body">

                    <div class="table-responsive mt-1">
                        <table id="TabelData1" class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center" width="30px">No.</th>
                                    <th class="text-center" width="100px">Tgl Keluar</th>
                                    <th>No. Surat</th>
                                    <th>Nama Surat</th>
                                    <th>Tujuan</th>
                                    <th class="text-center">Admin</th>
                                    <th class="text-center" width="50px">Buka</th>
                                    <th class="text-center" width="60px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($data_surke as $baris)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td class="text-center">{{ date('d-m-Y', strtotime($baris->tgl_keluar)) }}</td>
                                    <td>{{ $baris->no_surat }}</td>
                                    <td>{{ $baris->nama_surat }}</td>
                                    <td>{{ $baris->tujuan }}</td>
                                    <td class="text-center">
                                        @if ($baris->status_admin == "Diproses")
                                            <span class="badge rounded-pill bg-danger">Diproses</span>
                                        @else
                                            <span class="badge rounded-pill bg-primary">Diteruskan</span>
                                        @endif
                                    </td>                    
                                    <td class="text-center">
                                        <a href="/surke/buka/{{ $baris->kode_surat}}" target="_blank" class="btn btn-xs btn-primary"><i class="fa fa-folder-open mr-1"></i></a>
                                    </td>
                                    <td class="text-center">
                                        <a href="#edit{{$baris->kode_surat}}" data-bs-toggle="modal" class="btn btn-xs btn-green"><i class="fa fa-edit mr-1"></i></a>
        
                                        <a href="#delete{{$baris->kode_surat}}" data-bs-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash-alt mr-1"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </form>

    </div>
</div>
<!--end page wrapper -->


<!-- ########## Modal Edit ########## -->
@foreach($data_surke as $baris)
<div class="modal fade" id="edit{{$baris->kode_surat}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form action="/surke/{{$baris->kode_surat}}/update/" method="POST" id="frmarsip" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Edit Surat Keluar</h5>
                    <div class="ms-auto">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save mr-1"></i> Update Surat</button>

                        <button type="reset" class="btn btn-sm btn-yellow"><i class="fa fa-undo mr-1"></i> Batal Update</button>

                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="fa fa-minus mr-1"></i> Tutup Halaman</button>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="row mt-0">

                        <div class="col-xl-12">
                            <div class="border p-4 rounded">

                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Kode Surat</b></label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-sm bg-secondary text-white" type="text" id="kode_surat" name="kode_surat" value="{{$baris->kode_surat}}" readonly="True">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Tgl. Keluar</b></label>
                                    <div class="col-sm-4">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control form-control-sm date-picker" name="tgl_keluar" id="tgl_keluar" value="{{ date('d-m-Y', strtotime($baris->tgl_keluar)) }}">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>No. Surat</b></label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text" id="no_surat" name="no_surat" value="{{$baris->no_surat}}">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Tgl. Surat</b></label>
                                    <div class="col-sm-4">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control form-control-sm date-picker" name="tgl_surat" id="tgl_surat" value="{{ date('d-m-Y', strtotime($baris->tgl_surat)) }}">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Nama Surat</b></label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text" id="nama_surat" name="nama_surat" value="{{$baris->nama_surat}}">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-sm-2 col-form-label"><b>Perihal</b></label>
                                    <div class="col-sm-10">
                                        <textarea id="perihal" name="perihal" class="form-control form-control-sm" rows="4">{{ $baris->perihal }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Tujuan</b></label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text" id="tujuan" name="tujuan" value="{{$baris->tujuan}}">
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
@endforeach
<!-- ########## End Modal Edit ########## -->



<!-- ########## Modal Hapus ########## -->
@foreach($data_surke as $baris)
<div class="modal fade" id="delete{{$baris->kode_surat}}">
    <div class="modal-dialog modal-xs">
        <div class=" modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus {{$judul_halaman}}</h5>
            </div>

            <div class="modal-body pd-25">
                Konfirmasi Hapus Surat : <b>{{$baris->nama_surat}} ?</b>
            </div>

            <div class="modal-footer">
                <a href="/surke/{{$baris->kode_surat}}/hapus/" class="btn btn-sm btn-primary"><i class="fa fa-trash-alt mr-1"></i> Hapus Data</a>

                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="fa fa-minus mr-1"></i> Tutup Halaman</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- ########## End Modal Hapus User ########## -->

@endsection