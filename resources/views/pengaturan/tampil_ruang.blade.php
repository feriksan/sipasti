@extends('layout/template')

@section('isi')
    <!-- BEGIN #content -->
    <div id="content" class="app-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-1">
            <div class="breadcrumb mb-0">
                <h4><?= $judul_halaman ?></h4>
            </div>
            <div class="ms-auto">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tambahsurma"><i class="fa fa-plus mr-1"></i> Tambah Ruangan</button>

                <button class="btn btn-sm btn-yellow" data-bs-toggle="modal" data-bs-target="#importexcel"><i class="fa fa-download mr-1"></i> Import Data</button>

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
                            <th class="text-center" width="30">No.</th>
                            <th class="text-center" width="90">Kode Ruang</th>
                            <th class="text-center" width="150px">Nama Ruang</th>
                            <th>Unit Pengampu</th>
                            <th>Bidang-Bagian Pengampu</th>
                            <th class="text-center">Wadir Pengampu</th>
                            <th class="text-center" width="50px">Buka</th>
                            <th class="text-center" width="60px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($ruang as $baris)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td class="text-center">{{ $baris->kode_ruang }}</td>
                            <td>{{ $baris->nama_ruang }}</td>
                            <td>{{ $baris->unit_pengampu }}</td>
                            <td>{{ $baris->bidang_pengampu }}</td>
                            <td>{{ $baris->wadir_pengampu }}</td>
                            <td class="text-center">
                                <a href="/surma/buka/{{ $baris->kode_ruang}}" target="_blank" class="btn btn-xs btn-purple"><i class="fa fa-folder-open mr-1"></i></a>
                            </td>
                            <td class="text-center">
                                <a href="#edit{{$baris->kode_ruang}}" data-bs-toggle="modal" class="btn btn-xs btn-green"><i class="fa fa-edit mr-1"></i></a>

                                <a href="#delete{{$baris->kode_ruang}}" data-bs-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash-alt mr-1"></i></a>
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


<!-- ########## Modal Import Excel ########## -->
<div class="modal fade" id="importexcel">
    <div class="modal-dialog modal-lg">
        <div class=" modal-content">
            <form action="/ruang/import" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title">Import Data</h5>
                    <div class="ms-auto">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-download mr-1"></i> Tarik Data</button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="fa fa-undo mr-1"></i> Tutup Halaman</button>
                    </div>
                </div>
                <div class="modal-body pd-25">
                    <input type="file" name="file_excel" class="form-control form-control-sm" required>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ########## End Modal Hapus Obat ########## -->



<!-- ########## Modal Tambah ########## -->
<div class="modal fade" id="tambahsurma" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form action="/surma/tambah" method="POST" id="frmarsip" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Surat Masuk</h5>
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
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>No. Agenda</b></label>
                                    <div class="col-sm-7">
                                        <select id="unit" name="unit" class="form-select form-select-sm bg-transparent" aria-label="Default select example">
                                            <option value="">- Pilih -</option>
                                           
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <input class="form-control form-control-sm bg-secondary text-white text-center" type="text" id="no_agenda" name="no_agenda" value="" readonly="True">
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Tgl. Diterima</b></label>
                                    <div class="col-sm-4">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control form-control-sm date-picker" name="tgl_diterima" id="tgl_diterima" value="<?php echo date('d-m-Y'); ?>" readonly>
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>No. Surat</b></label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text" id="no_surat" name="no_surat" value="">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Tgl. Surat</b></label>
                                    <div class="col-sm-4">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control form-control-sm date-picker" name="tgl_surat" id="tgl_surat" value="<?php echo date('d-m-Y'); ?>" readonly>
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Jenis Surat</b></label>
                                    <div class="col-sm-4">
                                        <select id="jenis_surat" name="jenis_surat" class="form-select form-select-sm bg-transparent" aria-label="Default select example">
                                            <option value="">- Pilih -</option>
                                            <option value="Surat Masuk">Surat Masuk</option>
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
                                    <label class="col-sm-2 col-form-label"><b>Pengirim</b></label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text" id="pengirim" name="pengirim" value="">
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
@foreach($ruang as $baris)
<div class="modal fade" id="edit{{$baris->kode_ruang}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form action="/surma/{{$baris->kode_ruang}}/update/" method="POST" id="frmarsip" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Edit Surat Masuk</h5>
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
                                    <label class="col-sm-2 col-form-label"><b>No. Agenda</b></label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-sm bg-secondary text-white" type="text" id="kode_ruang" name="kode_ruang" value="{{$baris->kode_ruang}}" readonly="True">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Tgl. Diterima</b></label>
                                    <div class="col-sm-4">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control form-control-sm date-picker" name="tgl_diterima" id="tgl_diterima" value="">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>No. Surat</b></label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text" id="no_surat" name="no_surat" value="">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <label class="col-sm-2 col-form-label"><b>Tgl. Surat</b></label>
                                    <div class="col-sm-4">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control form-control-sm date-picker" name="tgl_surat" id="tgl_surat" value="">
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
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
                                    <label class="col-sm-2 col-form-label"><b>Pengirim</b></label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" type="text" id="pengirim" name="pengirim" value="">
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
@foreach($ruang as $baris)
<div class="modal fade" id="delete{{$baris->kode_ruang}}">
    <div class="modal-dialog modal-xs">
        <div class=" modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus {{$judul_halaman}}</h5>
            </div>

            <div class="modal-body pd-25">
                Hapus Surat No. Agenda : <b>{{$baris->kode_ruang}} - {{$baris->nama_ruang}} ?</b>
            </div>

            <div class="modal-footer">
                <a href="/surma/{{$baris->kode_ruang}}/hapus/" class="btn btn-sm btn-primary"><i class="fa fa-trash-alt mr-1"></i> Hapus Data</a>

                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal"><i class="fa fa-minus mr-1"></i> Tutup Halaman</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- ########## End Modal Hapus User ########## -->

<script>
    $(document).ready(function () {
        $('.default-select2').select2();
    });
</script>


@endsection


