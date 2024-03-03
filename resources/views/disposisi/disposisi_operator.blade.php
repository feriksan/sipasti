@extends('layout/template')

@section('isi')
    <!--start page wrapper -->
    <div id="content" class="app-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-1">
            <div class="breadcrumb mb-0">
                <h4>{{ $judul_halaman }} - {{ Auth::user()?->nama }}</h4>
            </div>
            <div class="ms-auto">
                <a href="/surma-operator" onclick="window.close();" class="btn btn-danger btn-sm">
                    <i class="fa fa-minus mr-1"></i> Tutup Halaman
                </a>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr class="mt-1">

        <div class="card border-top border-0 border-3 border-primary">
            <div class="card-body">

                <form action="/disposisiOp/{{ $buka_surma->no_agenda }}/tambah" method="POST" id="frmarsip" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-xl-5">
                        <div class="border p-4 rounded">

                            <div class="row mb-1">
                                <label class="col-sm-3 col-form-label"><b>No. Agenda</b></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" name="no_agenda" id="no_agenda" value="{{ $buka_surma->no_agenda }}" readonly>
                                </div>
                                <div class="col-sm-5">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm" name="tgl_diterima" id="tgl_diterima" value="<?php echo date('d-m-Y'); ?>" readonly>
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label class="col-sm-3 col-form-label"><b>No. Surat</b></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="no_surat" id="no_surat" value="{{ $buka_surma->no_surat }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label class="col-sm-3 col-form-label"><b>Asal Surat</b></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="pengirim" id="pengirim" value="{{ $buka_surma->pengirim }}" readonly>
                                </div>
                            </div>
                        
                            <div class="row mb-1">
                                <label class="col-sm-3 col-form-label"><b>Sifat</b></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control form-control-sm" name="tgl_disposisi" id="tgl_disposisi" value="{{ $buka_surma->sifat }}" readonly>
                                </div>
                                <div class="col-sm-5">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control form-control-sm date-picker" name="tgl_disposisi" id="tgl_disposisi" value="<?php echo date('d-m-Y'); ?>" readonly>
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label class="col-sm-3 col-form-label"><b>Disp. Direktur</b></label>
                                <div class="col-sm-9">
                                    <textarea id="isi_disposisi1" name="isi_disposisi1" class="form-control form-control-sm" rows="3" readonly>{{ $buka_surma->isi_disposisi1 }} {{ $buka_surma->catatan1 }}</textarea>
                                </div>
                            </div>                            

                            <div class="row mb-1">
                                <label class="col-sm-3 col-form-label"><b>Diteruskan Ke</b></label>
                                <div class="col-sm-9">
                                    <select id="tujuan_disposisi2" name="tujuan_disposisi2" class="form-select form-select-sm">
                                        <option value="">- Pilih -</option>
                                        @foreach ($pejabat as $baris)
                                        <option value="{{ $baris->kode_pejabat }}">{{ $baris->jabatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label class="col-sm-3 col-form-label"><b>Isi Disposisi</b></label>
                                <div class="col-sm-9">
                                    <textarea id="isi_disposisi2" name="isi_disposisi2" class="form-control form-control-sm" rows="2">{{ $buka_surma->isi_disposisi2 }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <label class="col-sm-3 col-form-label"><b>Catatan</b></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control form-control-sm" name="catatan2" id="catatan2" value="{{ $buka_surma->catatan2 }}">
                                </div>
                            </div>

                            <hr>

                            <div class="row mb-1">
                                <label class="col-sm-3 col-form-label"><b></b></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save mr-1"></i> Selesaikan Disposisi</button>

                                    <button type="reset" class="btn btn-sm btn-yellow"><i class="fa fa-undo mr-1"></i> Batal Kirim</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Kolom Kanan -->
                    <div class="col-xl-7">
                        <iframe src=" {{ asset('uploads') }}/document/{{ $buka_surma->file }}"
                        style="border:1px solid black;" height="800px" width="100%"></iframe>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection


