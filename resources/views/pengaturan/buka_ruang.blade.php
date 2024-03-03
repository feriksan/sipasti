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
                <a href="/surma" class="btn btn-danger btn-sm" onclick="window.close();"><i class="fa fa-minus mr-1"></i> Tutup Halaman</a>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr class="mt-1">

        <div class="card border-top border-0 border-3 border-primary">
            <div class="card-body">
                <div class="row">

                    <!-- Kolom Kiri -->
                    <div class="col-xl-5">
                        <div class="border p-4 rounded">

                            <div class="row mb-0">
                                <label class="col-sm-3 col-form-label">No. Agenda</label>
                                <div class="col-sm-9">
                                    <input class="form-control border-0" type="text" id="no_agenda" name="no_agenda" value=": {{ $buka_surma->no_agenda }}/SM/{{ date('Y')}}/RSBA" readonly="True">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <label class="col-sm-3 col-form-label">Tgl. Diterima</label>
                                <div class="col-sm-9">
                                    <input type="text" id="tgl_diterima" name="tgl_diterima" class="form-control border-0" value=": {{ date('d-m-Y', strtotime($buka_surma->tgl_diterima)) }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <label class="col-sm-3 col-form-label">No. Surat</label>
                                <div class="col-sm-9">
                                    <input class="form-control border-0" type="text" id="no_surat" name="no_surat" value=": {{ $buka_surma->no_surat }}" readonly="True">
                                </div>
                            </div>
                            
                            <div class="row mb-0">
                                <label class="col-sm-3 col-form-label">Tgl. Surat</label>
                                <div class="col-sm-9">
                                    <input type="text" id="tgl_surat" name="tgl_surat" class="form-control border-0" value=": {{ date('d-m-Y', strtotime($buka_surma->tgl_surat)) }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <label class="col-sm-3 col-form-label">Jenis Surat</label>
                                <div class="col-sm-9">
                                    <input class="form-control border-0" type="text" id="jenis_surat" name="jenis_surat" value=": {{ $buka_surma->jenis_surat }}" readonly="True">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <label class="col-sm-3 col-form-label">Nama Surat</label>
                                <div class="col-sm-9">
                                    <input class="form-control border-0" type="text" id="nama_surat" name="nama_surat" value=": {{ $buka_surma->nama_surat }}" readonly="True">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <label class="col-sm-3 col-form-label">Pengirim</label>
                                <div class="col-sm-9">
                                    <input class="form-control border-0" type="text" id="pengirim" name="pengirim" value=": {{ $buka_surma->pengirim }}" readonly="True">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <label class="col-sm-3 col-form-label">Perihal</label>
                                <div class="col-sm-9">
                                    <textarea id="perihal" name="perihal" class="form-control border-0" readonly rows="2">: {{ $buka_surma->perihal }}</textarea>
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
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection
