@extends('layout/template')

@section('isi')
    <!-- BEGIN #content -->
    <div id="content" class="app-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-1">
            <div class="breadcrumb mb-0">
                <h4><?= $judul_halaman ?> | Tanggal : <?php echo date('d-m-Y') ?></h4>
            </div>
            <div class="ms-auto">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahsurke"><i class="fa fa-plus mr-1"></i> Tambah Surat Keluar</button>

                <a href="surke/data" onclick="baru();return false;" id="new_rm" name="new_rm" class="btn btn-yellow btn-sm"><i class="fa fa-search mr-1"></i> Data Surat Keluar</a>

                <a href="/home" class="btn btn-danger btn-sm"><i class="fa fa-minus mr-1"></i> Tutup Halaman</a>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr class="mt-0 mb-2">

        <!-- BEGIN row -->
        <div class="card">
            <div class="card-body">
                <table id="TabelData1" class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th class="text-center" width="30px">No.</th>
                            <th class="text-center" width="100px">Tgl Keluar</th>
                            <th>No. Surat</th>
                            <th>Nama Surat</th>
                            <th>Tujuan</th>                         
                            <th class="text-center">Validasi</th>
                            <th class="text-center">Direktur</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" width="50px">Buka</th>
                            <th class="text-center" width="60px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($surke as $baris)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($baris->tgl_keluar)) }}</td>
                            <td>{{ $baris->no_surat }}</td>
                            <td>{{ $baris->nama_surat }}</td>
                            <td>{{ $baris->tujuan }}</td>
                            <td class="text-center">{{ $baris->validasi }}</td>
                            <td class="text-center">
                                @if ($baris->status_direktur == "Belum")
                                    <span class="badge rounded-pill bg-danger">Belum</span>
                                @else
                                    <span class="badge rounded-pill bg-primary">Divalidasi</span>
                                @endif
                            </td>              
                            <td class="text-center">
                                @if ($baris->status_admin == "Diproses")
                                    <span class="badge rounded-pill bg-danger">Diproses</span>
                                @else
                                    <span class="badge rounded-pill bg-primary">Selesai</span>
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
        <!-- END row -->

    </div>
    <!-- END col-12 -->


<!-- ########## Modal Tambah ########## -->
<div class="modal fade" id="tambahsurke" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form action="/surke/tambah" method="POST" id="frmarsip" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Surat Keluar</h5>
                    <div class="ms-auto">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save mr-1"></i> Simpan Surat</button>

                        <button type="reset" class="btn btn-sm btn-yellow"><i class="fa fa-undo mr-1"></i> Batal Input</button>

                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="fa fa-minus mr-1"></i> Tutup Halaman</button>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="row mt-0">

                        <div class="col-xl-12">
                            <div class="border p-4 rounded">

                                <input class="form-control form-control-sm bg-secondary text-white" type="hidden" id="kode_surat" name="kode_surat" value="{{$kode_otomatis1}}" readonly="True">

                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Tgl. Keluar</b></label>
                                    <div class="col-sm-5">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control form-control-sm date-picker" name="tgl_keluar" id="tgl_keluar" value="<?php echo date('d-m-Y'); ?>" readonly>
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>No. Surat</b></label>
                                    <div class="col-sm-2">
                                        <input class="form-control form-control-sm" type="text" id="kode1" name="kode1" value="">
                                    </div>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm bg-secondary text-white" type="text" id="kode2" name="kode2" value="{{$kode_otomatis2}}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Tgl. Surat</b></label>
                                    <div class="col-sm-5">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control form-control-sm date-picker" name="tgl_surat" id="tgl_surat" value="<?php echo date('d-m-Y'); ?>" readonly>
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Jenis Surat</b></label>
                                    <div class="col-sm-5">
                                        <select id="jenis_surat" name="jenis_surat" class="form-select form-select-sm bg-transparent" aria-label="Default select example">
                                            <option value="">- Pilih -</option>
                                            <option value="Surat Keluar">Surat Keluar</option>
                                            <option value="Nota Dinas">Nota Dinas</option>
                                            <option value="Laporan">Laporan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Nama Surat</b></label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text" id="nama_surat" name="nama_surat" value="">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-sm-2 col-form-label"><b>Perihal</b></label>
                                    <div class="col-sm-10">
                                        <textarea id="perihal" name="perihal" class="form-control form-control-sm" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Tujuan</b></label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text" id="tujuan" name="tujuan" value="">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>File Surat</b></label>
                                    <div class="col-sm-10">
                                        <input type="file" id="file" name="file" class="form-control form-control-sm" value="">
                                    </div>
                                </div>

                                {{-- hidden --}}
                                <input class="form-control form-control-sm text-bg-danger text-center" type="hidden" id="status_admin" name="status_admin" value="Diproses" readonly="true">
                            
                                <input class="form-control form-control-sm text-bg-primary text-center" type="hidden" id="status_direktur" name="status_direktur" value="Belum" readonly="true">

                                <input class="form-control form-control-sm text-bg-primary text-center" type="hidden" id="status_pejabat" name="status_pejabat" value="Belum" readonly="true">

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
@foreach($surke as $baris)
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
@foreach($surke as $baris)
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
