@extends ('layouts.master') @section ('title', 'Profile Settings') @section ('content')


<body class="select_delivery">
    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="index.html">KhaniDaani</a>
                            </li>
                            <li class="active">
                                <a href="#">Delivery service</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Select delivery service</h1>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    <!--================================
        END BREADCRUMB AREA
    =================================-->

    <!--================================
            START DASHBOARD AREA
    =================================-->
    <section class="dashboard-area">
        <div class="dashboard_contents">
            <div class="container">
                <form action="#" class="setting_form">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="shortcode_modules">
                                <div class="modules__title">
                                    <h3>Select Delivery Services</h3>
                                </div>
                                <div class="modules__content">
                                    <div class="panel-group accordion" role="tablist" id="accordion">
                                        <div class="panel accordion__single" id="panel-one">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" href="#collapse1" class="collapsed" aria-expanded="false" data-target="#collapse1" aria-controls="collapse1">
                                                <span>username</span> <span>charge:৳10</span>
                                                <i class="lnr lnr-chevron-down indicator"></i>
                                                </a>
                                                </h4>
                                            </div>

                                            <div id="collapse1" class="panel-collapse collapse" aria-labelledby="panel-one" data-parent="#accordion">
                                                <div class="panel-body">
                                                    <ul>
                                                        <li>
                                                            <span>area of service:</span>
                                                        </li>
                                                        <li>
                                                            <span>max delivery time:</span>
                                                        </li>
                                                        <li>
                                                            Availavlity time:
                                                        </li>
                                                    </ul>
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceleris que the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher.</p>
                                                    <a href="{{ route('order.confirm') }}" class="btn btn--lg btn--round">Continue & Order</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.accordion__single -->
                                        <div class="panel accordion__single" id="panel-two">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" href="#collapse2" class="collapsed" aria-expanded="false" data-target="#collapse2" aria-controls="collapse2">
                                                <span>username</span> <span>charge:৳10</span>
                                                <i class="lnr lnr-chevron-down indicator"></i>
                                            </a>
                                                </h4>
                                            </div>

                                            <div id="collapse2" class="panel-collapse collapse" aria-labelledby="panel-two" data-parent="#accordion">
                                                <div class="panel-body">
                                                    <ul>
                                                        <li>
                                                            <span>area of service:</span>
                                                        </li>
                                                        <li>
                                                            <span>max delivery time:</span>
                                                        </li>
                                                        <li>
                                                            Availavlity time:
                                                        </li>
                                                    </ul>
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceleris que the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher.</p>
                                                    <a href="{{ route('order.confirm') }}" class="btn btn--lg btn--round">Continue & Order</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end /.col-md-6 -->

                        <div class="col-lg-6">
                            <div class="shortcode_modules">
                                <div class="modules__title">
                                    <h3>Select Pickers Point</h3>
                                </div>
                                <div class="modules__content">
                                    <div class="panel-group accordion" role="tablist" id="accordion">
                                        <div class="panel accordion__single" id="">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" href="#collapse3" class="collapsed" aria-expanded="false" data-target="#collapse3" aria-controls="collapse3">
                                                <span>username</span> <span>charge:৳10</span>
                                                <i class="lnr lnr-chevron-down indicator"></i>
                                                </a>
                                                </h4>
                                            </div>

                                            <div id="collapse3" class="panel-collapse collapse" aria-labelledby="panel-three" data-parent="#accordion">
                                                <div class="panel-body">
                                                    <ul>
                                                        <li>
                                                            <span>area of service:</span>
                                                        </li>
                                                        <li>
                                                            <span>max delivery time:</span>
                                                        </li>
                                                        <li>
                                                            Availavlity time:
                                                        </li>
                                                    </ul>
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceleris que the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher.</p>
                                                    <a href="{{ route('order.confirm') }}" class="btn btn--lg btn--round">Continue & Order</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.accordion__single -->
                                        <div class="panel accordion__single" id="panel-four">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" href="#collapse4" class="collapsed" aria-expanded="false" data-target="#collapse4" aria-controls="collapse4">
                                                <span>username</span> <span>charge:৳10</span>
                                                <i class="lnr lnr-chevron-down indicator"></i>
                                            </a>
                                                </h4>
                                            </div>

                                            <div id="collapse4" class="panel-collapse collapse" aria-labelledby="panel-four" data-parent="#accordion">
                                                <div class="panel-body">
                                                    <ul>
                                                        <li>
                                                            <span>area of service:</span>
                                                        </li>
                                                        <li>
                                                            <span>max delivery time:</span>
                                                        </li>
                                                        <li>
                                                            Availavlity time:
                                                        </li>
                                                    </ul>
                                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceleris que the mattis, leo quam aliquet congue placerat mi id nisi interdum mollis. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher.</p>
                                                    <a href="{{ route('order.confirm') }}" class="btn btn--lg btn--round">Continue & Order</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end /.col-md-6 -->
                    </div>
                    <!-- end /.row -->
                </form>
                <!-- end /form -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>

</body>

@endsection