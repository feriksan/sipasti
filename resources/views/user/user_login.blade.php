<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $judul_web ?> | e-SIPASTI</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!--favicon-->
    <link rel="icon" href="{{ asset('assets') }}/img/favicon.ico" type="image/png" />

    <!-- ================== BEGIN core-css ================== -->
    <link href="{{ asset('assets') }}/css/vendor.min.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/css/apple/app.min.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/plugins/notifications/css/lobibox.min.css" rel="stylesheet" />
    <script src="{{ asset('assets') }}/plugins/ionicons/dist/ionicons/ionicons.js"></script>
    <!-- ================== END core-css ================== -->
</head>

<body class='pace-top'>
    <!-- BEGIN #loader -->
    <div id="loader" class="app-loader">
        <span class="spinner"></span>
    </div>
    <!-- END #loader -->

    <!-- BEGIN #app -->
    <div id="app" class="app">
        <!-- BEGIN login -->
        <div class="login login-with-news-feed">
            <!-- BEGIN news-feed -->
            <div class="news-feed">
                <img src="{{ asset('assets') }}/img/srikandi/bg_rsba1.jpg" class="img border-0" height="800px" width="1100px">
            </div>
            <!-- END news-feed -->

            <!-- BEGIN login-container -->
            <div class="login-container">
                <!-- BEGIN login-header -->
                <div class="login-header mb-30px">
                    <div class="brand">
                        <div class="d-flex align-items-center">
                            <span class="logo"><ion-icon name="cloud"></ion-icon></span>
                            <b>e-SIPASTI</b>
                        </div>
                        <small class=" text-black">Sistem Pemantauan Aset Terintegrasi</small>
                        <small class=" text-primary">RSUD Bayu Asih Purwakarta</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-in-alt"></i>
                    </div>
                </div>
                <!-- END login-header -->

                <!-- BEGIN login-content -->
                <div class="login-content">

                    <form class="fs-13px" method="POST" action="/login">
                                    @csrf

                        <div class="form-floating mb-15px">
                            <input type="text" class="form-control h-45px fs-13px" placeholder="email"
                                id="email" name="email" />
                            <label for="email"
                                class="d-flex align-items-center fs-13px text-gray-600">E-mail</label>
                        </div>

                        <div class="form-floating mb-15px">
                            <input type="password" class="form-control h-45px fs-13px" placeholder="Password"
                                id="password" name="password" />
                            <label for="password"
                                class="d-flex align-items-center fs-13px text-gray-600">Password</label>
                        </div>

                        <br>

                        <div class="mb-15px">
                            <button type="submit"
                                class="btn btn-theme d-block h-45px w-100 btn-lg fs-14px">Masuk</button>
                        </div>

                        <hr class="bg-gray-600 opacity-2" />
                        <div class="text text-center mb-0">
                            Hak Cipta &copy; 2023 - 2045
                        </div>
                        <div class="text text-center mb-0">
                            Unit SIRS Dan IT RSUD Bayu Asih Purwakarta
                        </div>
                    </form>

                </div>
                <!-- END login-content -->
            </div>
            <!-- END login-container -->
        </div>
        <!-- END login -->

    </div>
    <!-- END #app -->
</body>

<!-- ================== BEGIN core-js ================== -->
<script src="{{ asset('assets') }}/js/vendor.min.js"></script>
<script src="{{ asset('assets') }}/js/app.min.js"></script>

<!--notification js -->
<script src="{{ asset('assets') }}/plugins/notifications/js/lobibox.min.js"></script>
<script src="{{ asset('assets') }}/plugins/notifications/js/notifications.min.js"></script>
<script src="{{ asset('assets') }}/plugins/notifications/js/notification-custom-script.js"></script>
<!-- ================== END core-js ================== -->

<script>
    $(function() {
        <?php if (session()->has("pesan")) { ?>
        Lobibox.notify('info', {
            pauseDelayOnHover: true,
            size: 'mini',
            rounded: true,
            icon: 'bx bx-check-circle',
            delayIndicator: false,
            continueDelayOnInactiveTab: false,
            position: 'center top',
            msg: '<?= session('pesan') ?>'
        });
        <?php } ?>

        <?php if (session()->has("error")) { ?>
        Lobibox.notify('error', {
            pauseDelayOnHover: true,
            size: 'mini',
            rounded: true,
            icon: 'bx bx-check-circle',
            delayIndicator: false,
            continueDelayOnInactiveTab: false,
            position: 'center top',
            msg: '<?= session('error') ?>'
        });
        <?php } ?>
    });
</script>

</html>
