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
                <button onclick="self.close()" class="btn btn-sm btn-danger"><i class="fa fa-minus mr-1" hidden></i> Tutup Halaman</button>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr class="mt-1">

        <div class="card">
            <div class="card-body">
                <div class="table-responsive mt-1">
                    <table id="TabelKlasifikasi" class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr>
                                <th width="50px">No</th>
                                <th width="80px">Kode</th>
                                <th>Klasifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Json --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!--end page wrapper -->

@endsection
