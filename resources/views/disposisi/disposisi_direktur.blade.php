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
                <a href="/surma-direktur" onclick="window.close();" class="btn btn-danger btn-sm">
                    <i class="fa fa-minus mr-1"></i> Tutup Halaman
                </a>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr class="mt-1">

        <div class="card border-top border-0 border-3 border-primary">
            <div class="card-body">

                <form action="/disposisi/{{ $buka_surma->no_agenda }}/tambah" method="POST" id="frmarsip" enctype="multipart/form-data"> @csrf
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-xl-5">
                            <div class="border p-4 rounded">

                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label"><b>No. Agenda</b></label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control form-control-sm" name="no_agenda" id="no_agenda" value="{{ $buka_surma->no_agenda }}/SM/{{ date('Y')}}/RSBA" readonly>
                                        <input type="hidden" class="form-control form-control-sm" name="no_agenda" id="no_agenda" value="{{ $buka_surma->no_agenda }}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label"><b>Tgl. Diterima</b></label>
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
                                        <select id="sifat" name="sifat" class="form-select form-select-sm">
                                            @if ($buka_surma && $buka_surma->sifat)
                                                <option value="{{ $buka_surma->sifat }}">{{ $buka_surma->sifat }}</option>
                                                <option value="Segera">Segera</option>
                                                <option value="Sangat Segera">Sangat Segera</option>
                                                <option value="Rahasia">Rahasia</option>
                                            @else
                                                <option value="">- Pilih -</option>
                                                <option value="Segera">Segera</option>
                                                <option value="Sangat Segera">Sangat Segera</option>
                                                <option value="Rahasia">Rahasia</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control form-control-sm date-picker" name="tgl_disposisi" id="tgl_disposisi" value="<?php echo date('d-m-Y'); ?>" readonly>
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label"><b>Disposisi Ke</b></label>
                                    <div class="col-sm-9">
                                        <select id="tujuan_disposisi1" name="tujuan_disposisi1" class="form-select form-select-sm">
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
                                        <textarea id="isi_disposisi1" name="isi_disposisi1" class="form-control form-control-sm" rows="3">{{ $buka_surma->isi_disposisi1 }}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label"><b>Catatan</b></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" name="catatan1" id="catatan1" value="{{ $buka_surma->catatan1 }}">
                                    </div>
                                </div>

                                <hr>

                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label"><b></b></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-save mr-1"></i> Kirim Disposisi</button>

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


