    <!--//////////////////// JS GOES HERE ////////////////-->

    <!-- inject:js -->
    @stack('scripts-footer-top')

    <script src="{{ URL::to('/') }}/js/vendor/jquery/popper.min.js"></script>
    <script src="{{ URL::to('/') }}/js/vendor/jquery/uikit.min.js"></script>
    <script src="{{ URL::to('/') }}/js/vendor/bootstrap.min.js"></script>
    <script src="{{ URL::to('/') }}/js/vendor/chart.bundle.min.js"></script>
    <script src="{{ URL::to('/') }}/js/vendor/grid.min.js"></script>
    <script src="{{ URL::to('/') }}/js/vendor/jquery-ui.min.js"></script>
    <script src="{{ URL::to('/') }}/js/vendor/jquery.barrating.min.js"></script>
    <script src="{{ URL::to('/') }}/js/vendor/jquery.countdown.min.js"></script>
    <script src="{{ URL::to('/') }}/js/vendor/jquery.counterup.min.js"></script>
    <script src="{{ URL::to('/') }}/js/vendor/jquery.easing1.3.js"></script>
    <script src="{{ URL::to('/') }}/js/vendor/owl.carousel.min.js"></script>
    <script src="{{ URL::to('/') }}/js/vendor/slick.min.js"></script>
    <script src="{{ URL::to('/') }}/js/vendor/tether.min.js"></script>
    <script src="{{ URL::to('/') }}/js/vendor/trumbowyg.min.js"></script>
    <script src="{{ URL::to('/') }}/js/vendor/waypoints.min.js"></script>
    <script src="{{ URL::to('/') }}/js/dashboard.js"></script>
    <script src="{{ asset('js/vendor/jquery.jscroll.js') }}"></script>
    <script src="{{ asset('js/vendor/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('js/vendor/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('js/vendor/underscore-min.js') }}"></script>
    <script src="{{ URL::to('/') }}/js/main.js"></script>
    {{--<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBeySPFGz7DIUTrReCRQT6HYaMM0ia0knA"></script>--}}
    {{--<script src="{{ URL::to('/') }}/js/map.js"></script>--}}
    <script src="{{ route('home') }}/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="{{ URL::to('/') }}/js/app.js"></script>

    @stack('scripts-footer-bottom')

    <!-- endinject -->
