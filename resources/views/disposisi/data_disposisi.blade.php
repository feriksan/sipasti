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

        <form action="/disposisi/data" method="GET">
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
                        <label class="form-label"><b>Data Dipsoisi</b></label>
                        <div class="input-group input-group-sm">
                            <button type="submit" name="BtnTampil" id="BtnTampil" class="btn btn-primary btn-sm"><i class="fa fa-folder-open mr-1"></i> Buka Data Dipsoisi</button> &nbsp;

                            <a href="/monitoring-disposisi" class="btn btn-sm btn-danger"><i class="fa fa-minus mr-1"></i> Tutup Halaman</a>
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
                                    <th class="text-center" width="80px">No. Agenda</th>
                                    <th class="text-center" width="80px">Tgl Masuk</th>
                                    <th>Nama Surat</th>
                                    <th>Pengirim</th>
                                    <th class="text-center">Direktur</th>
                                    <th class="text-center">Penerima</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Buka</th>
                                    <th class="text-center" width="60px">Cetak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($data_disposisi as $baris)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td class="text-center">{{ $baris->no_agenda }}</td>
                                    <td class="text-center">{{ date('d-m-Y', strtotime($baris->tgl_diterima)) }}</td>
                                    <td>{{ $baris->nama_surat }}</td>
                                    <td>{{ $baris->pengirim }}</td>
                                    <td class="text-center">
                                        @if ($baris->status_direktur == "Belum")
                                            <span class="badge rounded-pill bg-primary">Belum</span>
                                        @elseif ($baris->status_direktur == "Dikirim")
                                            <span class="badge rounded-pill bg-danger">Dikirim</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($baris->status_pejabat == "Belum")
                                            <span class="badge rounded-pill bg-primary">Belum</span>
                                        @elseif ($baris->status_pejabat == "Selesai")
                                            <span class="badge rounded-pill bg-danger">Selesai</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($baris->status_admin == "Diproses")
                                            <span class="badge rounded-pill bg-primary">Diproses</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger">Selesai</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="/surma/buka1/{{ $baris->no_agenda}}" target="_blank" class="btn btn-xs btn-primary"><i class="fa fa-folder-open mr-1"></i></a>
                                    </td>
                                    <td class="text-center">
                                        @if ($baris->status_direktur == "Belum")
                                            <a href="/disposisi/cetak/{{$baris->no_agenda}}" target="_blank" class="btn btn-yellow btn-xs disabled"><i class="fa fa-print mg-r-10"></i> Cetak</a>
                                        @elseif ($baris->status_direktur == "Dikirim")
                                            <a href="/disposisi/cetak/{{$baris->no_agenda}}" target="_blank" class="btn btn-yellow btn-xs"><i class="fa fa-print mg-r-10"></i></a>
                                        @endif
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


@endsection