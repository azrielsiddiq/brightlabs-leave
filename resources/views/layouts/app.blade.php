<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Brightlabs Leave</title>

    <!-- favicon -->
   <!-- Ganti link icon lama Anda dengan ini -->
<link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg%20xmlns%3D%27http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%27%20viewBox%3D%270%200%20448%20512%27%20fill%3D%27%23007bff%27%3E%3Cpath%20d%3D%27M152%2024c0-13.3-10.7-24-24-24s-24%2010.7-24%2024V64H64C28.7%2064%200%2092.7%200%20128v16%2048V448c0%2035.3%2028.7%2064%2064%2064H384c35.3%200%2064-28.7%2064-64V192%20144%20128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24%2010.7-24%2024V64H152V24zM48%20192H400V448c0%208.8-7.2%2016-16%2016H64c-8.8%200-16-7.2-16-16V192zm305%2079c-9.4-9.4-24.6-9.4-33.9%200l-111%20111-47-47c-9.4-9.4-24.6-9.4-33.9%200s-9.4%2024.6%200%2033.9l64%2064c9.4%209.4%2024.6%209.4%2033.9%200L353%20305c9.4-9.4%209.4-24.6%200-33.9z%27%2F%3E%3C%2Fsvg%3E" />

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
