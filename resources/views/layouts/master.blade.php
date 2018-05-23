<!doctype html>
<html lang="en">

@include ('includes.head')

<body class="home3">
<!--================================
        START MENU AREA
    =================================-->
    <!-- start menu-area -->
    @include ('includes.menu')
    <!--================================
        END MENU AREA
    =================================-->

    @yield ('content')

    <!--================================
        START FOOTER AREA
    =================================-->
    @include ('includes.footer')
    <!--================================
        END FOOTER AREA
    =================================-->

    <!--//////////////////// JS GOES HERE ////////////////-->

    <!-- inject:js -->
    @include ('includes.injects')
    <!-- endinject -->
</body>

</html>