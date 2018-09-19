<head>
    <meta charset="UTF-8">
    <!-- meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="KhaniDaani - Freelance based cooking services">
    <meta name="keywords" content="KhaniDaani, khanidaani, foods, freelancing, chef, women in freelance">

    <title>KhaniDaani - @yield ('title') </title>

    <link rel="stylesheet" href="{{ URL::to('/') }}/css/materialize-stepper.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/animate.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/fontello.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/lnr-icon.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/slick.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/trumbowyg.min.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/app.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/new.css">

    <script src="{{ URL::to('/') }}/js/vendor/jquery/jquery-1.12.3.js"></script>

    @stack('head-css')
    @stack('head-scripts')
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::to('/') }}/images/logo/logo_icon.png">
</head>