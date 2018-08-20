<head>
    <meta charset="UTF-8">

    <!-- viewport meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MartPlace - Complete Online Multipurpose Marketplace HTML Template">
    <meta name="keywords" content="app, app landing, product landing, digital, material, html5">


    <title>KhaniDaani - @yield ('title') </title>

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/materialize-stepper.css">

    <link rel="stylesheet" href="{{ URL::to('/') }}/css/animate.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/fontello.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/lnr-icon.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/slick.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/trumbowyg.min.css">
    {{-- <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/app.css">

    <script src="{{ URL::to('/') }}/js/vendor/jquery/jquery-1.12.3.js"></script>

    @stack('head-css')

    @stack('head-scripts')

    <!-- endinject -->

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::to('/') }}/images/logo/logo_icon.png">
</head>