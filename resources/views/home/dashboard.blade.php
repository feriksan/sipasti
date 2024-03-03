@extends('layout/template')

@section('isi')
    <!-- BEGIN #content -->
    <div id="content" class="app-content">

        <!-- BEGIN row -->
        <div class="row">
            <div class="col-xl-12 mb-3">
                <!--Isi Halaman -->
                <div class="page-wrapper">
                    <div class="page-content">
                        <h4>{{ $judul_halaman }}</h4>
                        <br>
                        <br>
                        <h2 class="text-primary">Selamat Datang</h2>
                        <h1 class="text-red">Aplikasi e-SIPASTI</h1>
                        <h5 class="text-dark">Sistem Pemantauan Aset Terintegrasi Online</h5>
                        <h5 class="text-dark mb-3">Rumah Sakit : <span class="text-primary">RSUD Bayu Asih Purwakarta</span></h5>

                        <br><br><br>
                        <h5 class="text-dark">Untuk Pemakaian Internal - Tidak Diperjualbelikan</h5>
                        <h5 class="text-dark">Dibangun Dan Dikembangkan Oleh : <span class=" text-primary">Unit SIRS Dan IT RSUD Bayu Asih Purwakarta</span></h5>
                    </div>
                </div>
                <!--end Isi Halaman -->
            </div>
        </div>
        <!-- END row -->
    </div>
    <!-- END col-12 -->
@endsection
