@extends('layout/template')

@section('isi')
    <!-- BEGIN #content -->
    <div id="content" class="app-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-1">
            <div class="breadcrumb mb-0">
                <h4><?= $judul_halaman ?> - {{ Auth::user()?->nama }} | Tanggal : <?php echo date('d-m-Y') ?></h4>
            </div>
            <div class="ms-auto">
                <a href="surke-direktur/data" class="btn btn-primary btn-sm"><i class="fa fa-search mr-1"></i> Data Surat Keluar</a>

                <button onclick="window.location.href='/surke-direktur'; location.refresh();" class="btn btn-yellow btn-sm"><i class="fa fa-turn-up mr-1"></i> Refresh Halaman</button>

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
                            <th class="text-center" width="100px">Tgl Keluar</th>
                            <th>No. Surat</th>
                            <th>Nama Surat</th>
                            <th>Tujuan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" width="100px">Validasi</th>
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
                            <td class="text-center">
                                @if ($baris->status_direktur == "Belum")
                                    <span class="badge rounded-pill bg-danger">Belum</span>
                                @elseif ($baris->status_direktur == "Divalidasi")
                                    <span class="badge rounded-pill bg-purple">Divalidasi</span>
                                @endif
                            </td>                            
                            <td class="text-center">
                                <a href="/surke-direktur/validasi/{{ $baris->kode_surat}}" target="_blank" class="btn btn-xs btn-primary"><i class="fa fa-folder-open mr-1"></i></a>
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
