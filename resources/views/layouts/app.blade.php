<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Rocker - Bootstrap4 Admin Dashboard Template</title>

    <!-- favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon" />

    <!-- Vector CSS -->
    <link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />

    <!-- simplebar CSS -->
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- animate CSS -->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons CSS -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />

    <!-- Sidebar CSS -->
    <link href="{{ asset('assets/css/sidebar-menu.css') }}" rel="stylesheet" />

    <!-- Custom Style -->
    <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet" />

    <!-- Fix Footer -->
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        #wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .container-fluid {
            flex: 1;
        }

        .footer {
            margin-top: auto;
            background: #fff;
            padding: 12px 0;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }
    </style>
</head>

<body>

    <!-- Start wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Topbar -->
        @include('layouts.navigation')

        <div class="clearfix"></div>

        <!-- Content Wrapper -->
        <div class="content-wrapper">

            <!-- Main Content -->
            <div class="container-fluid">

                {{-- Breeze slot --}}
                {{ $slot ?? '' }}

                {{-- Untuk halaman custom --}}
                @yield('content')

            </div>
            <!-- End container-fluid -->

        </div>
        <!-- End content-wrapper -->

        <!-- Back To Top Button -->
        <a href="javaScript:void();" class="back-to-top">
            <i class="fa fa-angle-double-up"></i>
        </a>

        <!-- Footer -->
        @include('layouts.footer')

    </div>
    <!-- End wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- simplebar js -->
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.js') }}"></script>

    <!-- waves effect js -->
    <script src="{{ asset('assets/js/waves.js') }}"></script>

    <!-- sidebar-menu js -->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>

    <!-- Custom scripts -->
    <script src="{{ asset('assets/js/app-script.js') }}"></script>

    <!-- Vector map JavaScript -->
    <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- Chart js -->
    <script src="{{ asset('assets/plugins/Chart.js/Chart.min.js') }}"></script>

    <!-- Index js -->
    <script src="{{ asset('assets/js/index.js') }}"></script>

</body>

</html>