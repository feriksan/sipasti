@extends('layout/template')

@section('isi')
    <!-- BEGIN #content -->
    <div id="content" class="app-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-1">
            <div class="breadcrumb mb-0">
                <h4><?= $judul_halaman ?> - Direktur | Tanggal : <?php echo date('d-m-Y') ?></h4>
            </div>
            <div class="ms-auto">
                <a href="disposisiDir/data" class="btn btn-primary btn-sm"><i class="fa fa-search mr-1"></i> Data Disposisi</a>

                <a href="/home/direktur" class="btn btn-danger btn-sm"><i class="fa fa-minus mr-1"></i> Tutup Halaman</a>
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
                            <th class="text-center" width="80px">No. Agenda</th>
                            <th class="text-center" width="80px">Tgl Masuk</th>
                            <th>Nama Surat</th>
                            <th>Pengirim</th>
                            <th class="text-center">Direktur</th>
                            <th class="text-center">Penerima</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Buka</th>
                            <th class="text-center">Cetak</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($disposisi as $baris)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td class="text-center">{{ $baris->no_agenda }}</td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($baris->tgl_diterima)) }}</td>
                            <td>{{ $baris->nama_surat }}</td>
                            <td>{{ $baris->pengirim }}</td>
                            <td class="text-center">
                                @if ($baris->status_direktur == "Belum")
                                    <span class="badge rounded-pill bg-purple">Belum</span>
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
                                <a href="/surma/buka2/{{ $baris->no_agenda}}" target="_blank" class="btn btn-xs btn-primary"><i class="fa fa-folder-open mr-1"></i></a>
                            </td>
                            <td class="text-center">
                                <a href="/disposisi/cetak/{{$baris->no_agenda}}" target="_blank" class="btn btn-yellow btn-xs"><i class="fa fa-print mg-r-10"></i></a>
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

@endsection
