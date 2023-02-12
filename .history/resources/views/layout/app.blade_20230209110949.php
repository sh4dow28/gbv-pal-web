<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>
        @yield('pagetitle')
    </title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/data-tables/datatables.min.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">

    <script src="{{ URL::asset('js/jquery-3.5.1.js') }}"></script>
</head>

<body>

    @include('partials._header')

    @include('partials._sidebar')

    @yield('content')

    @include('partials._footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="{{ URL::asset('js/script.js') }}"></script>
    <!-- Vendor JS Files -->
    <script src="{{ URL::asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/quill/quill.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/data-tables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ URL::asset('vendor/php-email-form/validate.js') }}"></script>


    <!-- Template Main JS File -->
    <script src="{{ URL::asset('js/main.js') }}"></script>

</body>

</html>
