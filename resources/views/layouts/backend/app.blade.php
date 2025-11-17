<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Project pemesanan makanan|Backend</title>
    <!-- loader-->
    <link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
    <!--favicon-->
    <link rel="icon" href="{{ asset('backend/assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Vector CSS -->
    <link href="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- simplebar CSS-->
    <link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ asset('backend/assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="{{ asset('backend/assets/css/sidebar-menu.css') }}" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="{{ asset('backend/assets/css/app-style.css') }}" rel="stylesheet" />

    {{-- boostrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    {{-- end --}}

    {{-- alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- end alert --}}
    
    {{-- stisla --}}
    <style>
        /* 3.12 Button */
        .buttons .btn {
            margin: 0 8px 10px 0;
        }

        .btn:focus {
            box-shadow: none !important;
            outline: none;
        }

        .btn:active {
            box-shadow: none !important;
            outline: none;
        }

        .btn:active:focus {
            box-shadow: none !important;
            outline: none;
        }

        .btn.btn-icon-split i,
        .dropdown-item.has-icon i {
            text-align: center;
            width: 15px;
            font-size: 15px;
            float: left;
            margin-right: 10px;
        }

        .btn {
            font-weight: 600;
            font-size: 12px;
            line-height: 24px;
            padding: .3rem .8rem;
            letter-spacing: .5px;
        }

        .btn.btn-icon-split {
            position: relative;
        }

        .btn.btn-icon-split i {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 45px;
            border-radius: 3px 0 0 3px;
            line-height: 32px;
        }

        .btn.btn-icon-split div {
            margin-left: 40px;
        }

        .btn.btn-icon-noflo-splitat {
            display: table;
            text-align: right;
        }

        .btn.btn-icon-noflo-splitat i {
            float: none;
            margin: 0;
            display: table-cell;
            vertical-align: middle;
            width: 30%;
        }

        .btn.btn-icon-noflo-splitat div {
            display: table-cell;
            vertical-align: middle;
            width: 70%;
            text-align: left;
            padding-left: 10px;
        }

        .btn:not(.btn-social):not(.btn-social-icon):active,
        .btn:not(.btn-social):not(.btn-social-icon):focus,
        .btn:not(.btn-social):not(.btn-social-icon):hover {
            border-color: transparent !important;
            background-color: white;
        }

        .btn>i {
            margin-left: 0 !important;
        }

        .btn.btn-lg {
            padding: .55rem 1.5rem;
            font-size: 12px;
        }

        .btn.btn-lg.btn-icon-split i {
            line-height: 42px;
        }

        .btn.btn-lg.btn-icon-split div {
            margin-left: 25px;
        }

        .btn.btn-sm {
            padding: .10rem .4rem;
            font-size: 12px;
        }

        .btn.btn-icon .ion,
        .btn.btn-icon .fas,
        .btn.btn-icon .far,
        .btn.btn-icon .fab,
        .btn.btn-icon .fal {
            margin-left: 0 !important;
            font-size: 12px;
        }

        .btn.btn-icon.icon-left .ion,
        .btn.btn-icon.icon-left .fas,
        .btn.btn-icon.icon-left .far,
        .btn.btn-icon.icon-left .fab,
        .btn.btn-icon.icon-left .fal {
            margin-right: 3px;
        }

        .btn.btn-icon.icon-right .ion,
        .btn.btn-icon.icon-right .fas,
        .btn.btn-icon.icon-right .far,
        .btn.btn-icon.icon-right .fab,
        .btn.btn-icon.icon-right .fal {
            margin-left: 3px !important;
        }

        .btn-action {
            color: #fff !important;
            line-height: 25px;
            font-size: 12px;
            min-width: 35px;
            min-height: 35px;
        }

        .btn-secondary,
        .btn-secondary.disabled {
            box-shadow: 0 2px 6px #e1e5e8;
            background-color: #cdd3d8;
            border-color: #cdd3d8;
            color: #fff;
        }

        .btn-secondary:hover,
        .btn-secondary:focus,
        .btn-secondary:active,
        .btn-secondary.disabled:hover,
        .btn-secondary.disabled:focus,
        .btn-secondary.disabled:active {
            background-color: #bfc6cd !important;
            color: #fff !important;
        }

        .btn-outline-secondary:hover,
        .btn-outline-secondary:focus,
        .btn-outline-secondary:active,
        .btn-outline-secondary.disabled:hover,
        .btn-outline-secondary.disabled:focus,
        .btn-outline-secondary.disabled:active {
            background-color: #cdd3d8 !important;
            color: #fff !important;
        }

        .btn-success,
        .btn-success.disabled {
            box-shadow: 0 2px 6px #a8f5b4;
            background-color: #63ed7a;
            border-color: #63ed7a;
            color: #fff;
        }

        .btn-success:hover,
        .btn-success:focus,
        .btn-success:active,
        .btn-success.disabled:hover,
        .btn-success.disabled:focus,
        .btn-success.disabled:active {
            background-color: #4cea67 !important;
            color: #fff !important;
        }

        .btn-outline-success:hover,
        .btn-outline-success:focus,
        .btn-outline-success:active,
        .btn-outline-success.disabled:hover,
        .btn-outline-success.disabled:focus,
        .btn-outline-success.disabled:active {
            background-color: #63ed7a !important;
            color: #fff !important;
        }

        .btn-danger,
        .btn-danger.disabled {
            box-shadow: 0 2px 6px #fd9b96;
            background-color: #fc544b;
            border-color: #fc544b;
            color: #fff;
        }

        .btn-danger:hover,
        .btn-danger:focus,
        .btn-danger:active,
        .btn-danger.disabled:hover,
        .btn-danger.disabled:focus,
        .btn-danger.disabled:active {
            background-color: #fb160a !important;
        }

        .btn-outline-danger:hover,
        .btn-outline-danger:focus,
        .btn-outline-danger:active,
        .btn-outline-danger.disabled:hover,
        .btn-outline-danger.disabled:focus,
        .btn-outline-danger.disabled:active {
            background-color: #fb160a !important;
            color: #fff !important;
        }

        .btn-dark,
        .btn-dark.disabled {
            box-shadow: 0 2px 6px #728394;
            background-color: #191d21;
            border-color: #191d21;
            color: #fff;
        }

        .btn-dark:hover,
        .btn-dark:focus,
        .btn-dark:active,
        .btn-dark.disabled:hover,
        .btn-dark.disabled:focus,
        .btn-dark.disabled:active {
            background-color: black !important;
        }

        .btn-outline-dark:hover,
        .btn-outline-dark:focus,
        .btn-outline-dark:active,
        .btn-outline-dark.disabled:hover,
        .btn-outline-dark.disabled:focus,
        .btn-outline-dark.disabled:active {
            background-color: black !important;
            color: #fff !important;
        }

        .btn-light,
        .btn-light.disabled {
            box-shadow: 0 2px 6px #e6ecf1;
            background-color: #e3eaef;
            border-color: #e3eaef;
            color: #191d21;
        }

        .btn-light:hover,
        .btn-light:focus,
        .btn-light:active,
        .btn-light.disabled:hover,
        .btn-light.disabled:focus,
        .btn-light.disabled:active {
            background-color: #c3d2dc !important;
        }

        .btn-outline-light,
        .btn-outline-light.disabled {
            border-color: #e3eaef;
            color: #e3eaef;
        }

        .btn-outline-light:hover,
        .btn-outline-light:focus,
        .btn-outline-light:active,
        .btn-outline-light.disabled:hover,
        .btn-outline-light.disabled:focus,
        .btn-outline-light.disabled:active {
            background-color: #e3eaef !important;
            color: #fff !important;
        }

        .btn-warning,
        .btn-warning.disabled {
            box-shadow: 0 2px 6px #ffc473;
            background-color: #ffa426;
            border-color: #ffa426;
            color: #fff;
        }

        .btn-warning:hover,
        .btn-warning:focus,
        .btn-warning:active,
        .btn-warning.disabled:hover,
        .btn-warning.disabled:focus,
        .btn-warning.disabled:active {
            background-color: #ff990d !important;
            color: #fff !important;
        }

        .btn-outline-warning:hover,
        .btn-outline-warning:focus,
        .btn-outline-warning:active,
        .btn-outline-warning.disabled:hover,
        .btn-outline-warning.disabled:focus,
        .btn-outline-warning.disabled:active {
            background-color: #ffa426 !important;
            color: #fff !important;
        }

        .btn-info,
        .btn-info.disabled {
            box-shadow: 0 2px 6px #82d3f8;
            background-color: #3abaf4;
            border-color: #3abaf4;
            color: #fff;
        }

        .btn-info:hover,
        .btn-info:focus,
        .btn-info:active,
        .btn-info.disabled:hover,
        .btn-info.disabled:focus,
        .btn-info.disabled:active {
            background-color: #0da8ee !important;
        }

        .btn-outline-info:hover,
        .btn-outline-info:focus,
        .btn-outline-info:active,
        .btn-outline-info.disabled:hover,
        .btn-outline-info.disabled:focus,
        .btn-outline-info.disabled:active {
            background-color: #0da8ee !important;
            color: #fff !important;
        }

        .btn-primary,
        .btn-primary.disabled {
            box-shadow: 0 2px 6px #acb5f6;
            background-color: #6777ef;
            border-color: #6777ef;
        }

        .btn-primary:focus,
        .btn-primary.disabled:focus {
            background-color: #394eea !important;
        }

        .btn-primary:focus:active,
        .btn-primary.disabled:focus:active {
            background-color: #394eea !important;
        }

        .btn-primary:active,
        .btn-primary:hover,
        .btn-primary.disabled:active,
        .btn-primary.disabled:hover {
            background-color: #394eea !important;
        }

        .btn-outline-primary,
        .btn-outline-primary.disabled {
            border-color: #6777ef;
            color: #6777ef;
        }

        .btn-outline-primary:hover,
        .btn-outline-primary:focus,
        .btn-outline-primary:active,
        .btn-outline-primary.disabled:hover,
        .btn-outline-primary.disabled:focus,
        .btn-outline-primary.disabled:active {
            background-color: #6777ef !important;
            color: #fff;
        }

        .btn-outline-white,
        .btn-outline-white.disabled {
            border-color: #fff;
            color: #fff;
        }

        .btn-outline-white:hover,
        .btn-outline-white:focus,
        .btn-outline-white:active,
        .btn-outline-white.disabled:hover,
        .btn-outline-white.disabled:focus,
        .btn-outline-white.disabled:active {
            background-color: #fff;
            color: #6777ef;
        }

        .btn-round {
            border-radius: 30px;
            padding-left: 34px;
            padding-right: 34px;
        }

        .btn-social-icon,
        .btn-social {
            border: none;
            border-radius: 3px;
        }

        .btn-social-icon {
            color: #fff !important;
            padding-left: 18px;
            padding-right: 18px;
        }

        .btn-social-icon> :first-child {
            font-size: 16px;
        }

        .btn-social {
            padding: 12px 12px 12px 50px;
            color: #fff !important;
            font-weight: 500;
        }

        .btn-social> :first-child {
            width: 55px;
            line-height: 50px;
            border-right: none;
        }

        .btn-reddit {
            color: #000 !important;
        }

        .btn-group .btn.active {
            background-color: #6777ef;
            color: #fff;
        }

        .btn-progress {
            position: relative;
            background-image: url("../img/spinner-white.svg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: 30px;
            color: transparent !important;
            pointer-events: none;
        }
    </style>
    {{-- end stisla --}}
</head>

<body class="bg-theme bg-theme1">

    <!-- Start wrapper-->
    <div id="wrapper">
        @include('layouts.backend.sidebar')
        @include('layouts.backend.topbar')

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <div class="container-fluid">

                @yield('content')

                <!--start overlay-->
                <div class="overlay toggle-menu"></div>
                <!--end overlay-->

            </div>
            <!-- End container-fluid-->

        </div><!--End content-wrapper-->


        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        @include('layouts.backend.footer')

        <!--start color switcher-->
        <div class="right-sidebar">
            <div class="switcher-icon">
                <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
            </div>
            <div class="right-sidebar-content">

                <p class="mb-0">Gaussion Texture</p>
                <hr>

                <ul class="switcher">
                    <li id="theme1"></li>
                    <li id="theme2"></li>
                    <li id="theme3"></li>
                    <li id="theme4"></li>
                    <li id="theme5"></li>
                    <li id="theme6"></li>
                </ul>

                <p class="mb-0">Gradient Background</p>
                <hr>

                <ul class="switcher">
                    <li id="theme7"></li>
                    <li id="theme8"></li>
                    <li id="theme9"></li>
                    <li id="theme10"></li>
                    <li id="theme11"></li>
                    <li id="theme12"></li>
                    <li id="theme13"></li>
                    <li id="theme14"></li>
                    <li id="theme15"></li>
                </ul>

            </div>
        </div>
        <!--end color switcher-->

    </div><!--End wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>

    <!-- simplebar js -->
    <script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.js') }}"></script>
    <!-- sidebar-menu js -->
    <script src="{{ asset('backend/assets/js/sidebar-menu.js') }}"></script>
    <!-- loader scripts -->
    <script src="{{ asset('backend/assets/js/jquery.loading-indicator.js') }}"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('backend/assets/js/app-script.js') }}"></script>
    <!-- Chart js -->

    <script src="{{ asset('backend/assets/plugins/Chart.js/Chart.min.js') }}"></script>

    <!-- Index js -->
    <script src="{{ asset('backend/assets/js/index.js') }}"></script>


</body>

</html>
