<!doctype html>
<html lang="en">

@include ('includes.head')

<body class="">
<!--================================
        START MENU AREA
    =================================-->
    @include ('includes.menu')
    <!--================================
        END MENU AREA
    =================================-->

<!--================================
        START CONTENT AREA
    =================================-->
    @yield ('content')
<!--================================
        END CONTENT AREA
    =================================-->

    <!--================================
        START FOOTER AREA
    =================================-->
    @include ('includes.footer')
    <!--================================
        END FOOTER AREA
    =================================-->

    <!--//////////////////// JS GOES HERE ////////////////-->

    <!-- inject:js -->
    @include ('includes.injectjs')
    <!-- end inject -->
</body>

</html>