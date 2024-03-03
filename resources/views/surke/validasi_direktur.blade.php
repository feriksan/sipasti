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
                <a href="/surke-direktur" onclick="window.close();" class="btn btn-danger btn-sm"><i class="fa fa-minus mr-1"></i> Tutup Halaman</a>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr class="mt-1">

        <div class="card border-top border-0 border-3 border-primary">
            <div class="card-body">

                <form action="/surke-direktur/validasi/{{ $buka_surke->kode_surat }}/tambah" method="POST" id="frmarsip" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-xl-5">
                        <div class="border p-4 rounded">

                            <div class="row mb-1">
                                <label class="col-sm-3 col-form-label"><b>Kode Surat</b></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" name="kode_surat" id="kode_surat" value="{{ $buka_surke->kode_surat }}" readonly>
                                </div>
                                <div class="col-sm-5">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" name="tgl_keluar" id="tgl_keluar" value="<?php echo date('d-m-Y'); ?>" readonly>
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label class="col-sm-3 col-form-label"><b>No. Surat</b></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="no_surat" id="no_surat" value="{{ $buka_surke->no_surat }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label class="col-sm-3 col-form-label"><b>Tujuan Surat</b></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="tujuan" id="tujuan" value="{{ $buka_surke->tujuan }}" readonly>
                                </div>
                            </div>
                        
                            <div class="row mb-1">
                                <label class="col-sm-3 col-form-label"><b>Sifat</b></label>
                                <div class="col-sm-4">
                                    <select id="sifat" name="sifat" class="form-select form-select-sm">
                                        @if ($buka_surke && $buka_surke->sifat)
                                            <option value="{{ $buka_surke->sifat }}">{{ $buka_surke->sifat }}</option>
                                            <option value="Biasa">Biasa</option>
                                            <option value="Penting">Penting</option>
                                            <option value="Segera">Segera</option>
                                            <option value="Rahasia">Rahasia</option>
                                        @else
                                            <option value="">- Pilih -</option>
                                            <option value="Biasa">Biasa</option>
                                            <option value="Penting">Penting</option>
                                            <option value="Segera">Segera</option>
                                            <option value="Rahasia">Rahasia</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm date-picker" name="tgl_validasi" id="tgl_validasi" value="<?php echo date('d-m-Y'); ?>" readonly>
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-1">
                                <label class="col-sm-3 col-form-label"><b>Validasi</b></label>
                                <div class="col-sm-9">
                                    <select id="validasi" name="validasi" class="form-select form-select-sm">
                                        @if ($buka_surke && $buka_surke->validasi)
                                            <option value="{{ $buka_surke->validasi }}">{{ $buka_surke->validasi }}</option>
                                            <option value="Disetujui">Disetujui</option>
                                            <option value="Direvisi">Direvisi</option>
                                            <option value="Ditunda">Ditunda</option>
                                            <option value="Dibatalkan">Dibatalkan</option>
                                        @else
                                            <option value="">- Pilih -</option>
                                            <option value="Disetujui">Disetujui</option>
                                            <option value="Direvisi">Direvisi</option>
                                            <option value="Ditunda">Ditunda</option>
                                            <option value="Dibatalkan">Dibatalkan</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <hr>

                            <div class="row mb-1">
                                <label class="col-sm-3 col-form-label"><b></b></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save mr-1"></i> Kirim Validasi</button>

                                    <button type="reset" class="btn btn-sm btn-yellow"><i class="fa fa-undo mr-1"></i> Batal Kirim</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Kolom Kanan -->
                    <div class="col-xl-7">
                        <iframe src=" {{ asset('uploads') }}/document/{{ $buka_surke->file }}"
                        style="border:1px solid black;" height="800px" width="100%"></iframe>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection


