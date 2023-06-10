<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $settings->description }}">
    <meta name="keywords" content="{{ $settings->keywords }}">
    <meta name="author" content="Seyyar Developer">

    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.png') }}">

    <!-- Custom CSS -->
    <link href="{{ asset('frontend/assets/css/styles.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    {{-- <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div> --}}

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <!-- Start Navigation -->
        @include('frontend.body.header')
        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->


        @yield('content')

        <!-- ============================ Footer Start ================================== -->
        @include('frontend.body.footer')
        <!-- ============================ Footer End ================================== -->



        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/rangeslider.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/imagesloaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/dropzone.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/datedropper-javascript.js') }}"></script>


    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->

</body>

</html>
