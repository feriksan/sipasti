<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $judul_web ?> | e-SURADI</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!--favicon-->
    <link rel="icon" href="{{ asset('assets') }}/img/favicon.ico" type="image/png" />

    <!-- ================== BEGIN core-css ================== -->
    <link href="{{ asset('assets') }}/css/vendor.min.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/css/apple/app.min.css" rel="stylesheet" />
    <script src="{{ asset('assets') }}/plugins/ionicons/dist/ionicons/ionicons.js"></script>
    <link href="{{ asset('assets') }}/plugins/notifications/css/lobibox.min.css" rel="stylesheet" />
    <!-- ================== END core-css ================== -->

    <!-- ================== BEGIN page-css ================== -->
    <link href="{{ asset('assets') }}/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css"
        rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
    <!-- ================== END page-css ================== -->


    <!-- ================== Data Tabel ================== -->
    <link href="{{ asset('assets') }}/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
        rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css"
        rel="stylesheet" />
    <!-- ================== End Data Tabel ================== -->


    <!--Date Time Picker-->
    <link href="{{ asset('assets') }}/plugins/datetimepicker/css/classic.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/datetimepicker/css/classic.time.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/datetimepicker/css/classic.date.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="{{ asset('assets') }}/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">

    <!-- Date Picker Hani -->
    <link href="{{ asset('assets') }}/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css"
        rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="{{ asset('assets') }}/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">

    <!-- Kalender -->
    <link href="{{ asset('assets') }}/plugins/fullcalendar/main.css" rel="stylesheet" />

    <!-- Jam -->
    <link href="{{ asset('assets') }}/plugins/flatpickr/flatpickr.min.css" rel="stylesheet" />

    <!-- JQVMap -->
    <link href="{{ asset('assets') }}/plugins/jqvmap/jqvmap.min.css" rel="stylesheet" />
</head>

<div class="container mt-3">
    <div class="card-body">
        <h4 class="text-center"><b>LEMBAR DISPOSISI</b></h4>
    </div>

    <br>

    <table class="table table-bordered border-black table-panel mb-0">
        <tbody>
            <tr>
                <td class="col-6">
                    <h6>Pengirim :<b> {{ $cetak_disposisi->pengirim }}</b></h6>
                    <h6>No. Surat :<b> {{ $cetak_disposisi->no_surat }}</b></h6>
                    <h6>Tgl. Surat :<b> {{ date('d-m-Y', strtotime($cetak_disposisi->tgl_surat)) }}</b></h6>
                </td>

                <td class="col-6">
                    <h6>Tgl. Diterima :<b> {{ date('d-m-Y', strtotime($cetak_disposisi->tgl_diterima)) }}</b></h6>
                    <h6>No. Agenda :<b> {{ $cetak_disposisi->no_agenda }}/SM/{{ date('Y')}}/RSBA</b></h6>
                    <h6>Sifat Surat :<b class="text-uppercase"> {{ $cetak_disposisi->sifat }}</b></h6>
                </td>
            </tr>
        </tbody>
    </table>

    <br>

    <table class="table table-borderless table-panel mb-0">
        <tbody>
            <tr>
                <td class="col-12">
                    <h6><b>{{ $cetak_disposisi->nama_surat }}</b></h6>
                    <h6>Perihal : {{ $cetak_disposisi->perihal }}</h6>
                </td>
            </tr>
        </tbody>
    </table>


    <table class="table table-borderless table-panel mb-0">
        <tbody>
            <tr>
                <td class="col-12">
                    <h6><b>Intruksi Direktur :</b></h6>
                    <h6>{{ $cetak_disposisi->isi_disposisi1 }}</h6>
                    <h6>{{ $cetak_disposisi->catatan1 }}</h6>
                </td>
            </tr>
        </tbody>
    </table>

    <br>

    <table class="table table-bordered border-black table-panel mb-0">
        <tbody>
            <tr>
                <td class="col-6">
                    <h6><b>Diteruskan Kepada :</b></h6>
                    <h6>{{ $cetak_disposisi->jabatan2 }}</h6>
                </td>
                <td class="col-6">
                    <h6><b>Intruksi / Informasi :</b></h6>
                    <h6>{{ $cetak_disposisi->isi_disposisi2 }}</h6>
                </td>
            </tr>
        </tbody>
    </table>

    <br>

    <table class="table table-borderless table-panel mb-0">
        <tbody>
            <tr>
                <td class="col-12">
                    <h6><b>Catatan :</b></h6>
                    <h6>{{ $cetak_disposisi->catatan2 }}</h6>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table table-borderless table-panel mb-0">
        <tbody>
            <tr>
                <td class="col-6">
                </td>
                <td class="col-6">
                    <h6>{{ Auth::user()?->nama }},</h6>
                    <img src="{{ asset('uploads') }}/qrcode_tte/{{ $cetak_disposisi->qrcode_tte1 }}" class="img border-0" height="50px" width="60px">
                    <br>
                    <h6><b>{{ $cetak_disposisi->nama_pejabat1 }}</b></h6>
                    <h6><b>{{ $cetak_disposisi->nip1 }}</b></h6>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- ================== BEGIN core-js ================== -->
<script src="{{ asset('assets') }}/js/vendor.min.js"></script>
<script src="{{ asset('assets') }}/js/app.min.js"></script>
<!-- ================== END core-js ================== -->


<!-- ================== BEGIN page-js ================== -->
<script src="{{ asset('assets') }}/plugins/gritter/js/jquery.gritter.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.canvaswrapper.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.colorhelpers.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.flot.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.flot.saturated.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.flot.browser.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.flot.drawSeries.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.flot.uiConstants.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.flot.time.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.flot.resize.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.flot.pie.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.flot.crosshair.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.flot.categories.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.flot.navigate.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.flot.touchNavigate.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.flot.hover.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.flot.touch.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.flot.selection.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.flot.symbol.js"></script>
<script src="{{ asset('assets') }}/plugins/flot/source/jquery.flot.legend.js"></script>
<script src="{{ asset('assets') }}/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="{{ asset('assets') }}/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
<script src="{{ asset('assets') }}/plugins/jvectormap-content/world-mill.js"></script>
<script src="{{ asset('assets') }}/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<script src="{{ asset('assets') }}/js/demo/dashboard.js"></script>
<script src="{{ asset('assets') }}/js/demo/table-manage-default.demo.js"></script>
<script src="{{ asset('assets') }}/plugins/@highlightjs/cdn-assets/highlight.min.js"></script>
<script src="{{ asset('assets') }}/js/demo/render.highlight.js"></script>
<script src="{{ asset('assets') }}/plugins/d3/d3.min.js"></script>
<script src="{{ asset('assets') }}/plugins/nvd3/build/nv.d3.min.js"></script>
<script src="{{ asset('assets') }}/js/demo/file-manager.demo.js"></script>
<script src="{{ asset('assets') }}/js/iconify.min.js"></script>
<!-- ================== END page-js ================== -->


<!-- ================== Data Tabel ================== -->
<script src="{{ asset('assets') }}/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('assets') }}/plugins/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('assets') }}/plugins/pdfmake/build/vfs_fonts.js"></script>
<script src="{{ asset('assets') }}/plugins/jszip/dist/jszip.min.js"></script>
<!-- ================== End Data Tabel ================== -->


<!--notification js -->
<script src="{{ asset('assets') }}/plugins/notifications/js/lobibox.min.js"></script>
<script src="{{ asset('assets') }}/plugins/notifications/js/notifications.min.js"></script>
<script src="{{ asset('assets') }}/plugins/notifications/js/notification-custom-script.js"></script>

<!--Date Time Picker-->
<script src="{{ asset('assets') }}/plugins/datetimepicker/js/legacy.js"></script>
<script src="{{ asset('assets') }}/plugins/datetimepicker/js/picker.js"></script>
<script src="{{ asset('assets') }}/plugins/datetimepicker/js/picker.time.js"></script>
<script src="{{ asset('assets') }}/plugins/datetimepicker/js/picker.date.js"></script>
<script src="{{ asset('assets') }}/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
<script
    src="{{ asset('assets') }}/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js">
</script>

<!-- Date Picker Hani -->
<script src="{{ asset('assets') }}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('assets') }}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<!-- Kalender -->
<script src="{{ asset('assets') }}/plugins/fullcalendar/main.js"></script>

<!-- Jam -->
<script src="{{ asset('assets') }}/plugins/flatpickr/flatpickr.js"></script>

<!-- JQVMap -->
<script src="{{ asset('assets') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('assets') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

</html>