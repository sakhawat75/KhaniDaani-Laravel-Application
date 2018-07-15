@extends ('layouts.master')


@section ('title', 'Order Status')

@section ('content')
    <body class="">

    @push('scripts')

    <script src="{{ asset('/js/vendor/jquery/jquery-1.12.3.js') }}"></script>
    <script src="{{ asset('/js/materialize.min.js') }}"></script>

    <script type="text/javascript" src="/js/vendor/jquery/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="/js/materialize.min.js"></script>

    @endpush

    <section class="dashboard-area">
        <div class="dashboard_contents">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="pull-left">
                                <div class="dashboard__title">
                                    <h3>Upload Your Dish</h3> </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <div class="dashboard_title_area">
                            <ul class="stepper">
                                <li class="step active">
                                    <div data-step-label="Now chef is preparing the food" class="step-title waves-effect waves-dark">Order Started</div>
                                    <div class="step-content">
                                        <h1>gdsfg</h1>

                                    </div>
                                </li>
                                <li class="step">
                                    <div class="step-title waves-effect waves-dark">Delivery Sevice</div>
                                    <div class="step-content">

                                    </div>
                                </li>
                                <li class="step">
                                    <div class="step-title waves-effect waves-dark">Order Completed</div>
                                    <div class="step-content">

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
            </div>
        </div>
    </section>

    @push('script')
    <script>
        $(document).ready(function () {
            $('.stepper').activateStepper();
        });</script>

    <script type="text/javascript" src="/js/materialize-stepper.js"></script>

    <script src="{{ asset('/js/materialize-stepper.js') }}"></script>

        @endpush


    </body>



@endsection