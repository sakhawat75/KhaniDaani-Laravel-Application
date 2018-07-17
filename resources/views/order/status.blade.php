@extends ('layouts.master')


@section ('title', 'Order Status')

@section ('content')

    <script src="{{ asset('/js/materialize.min.js') }}"></script>
    <section class="dashboard-area">
        <div class="dashboard_contents">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_title_area">
                            <div class="pull-left">
                                <div class="dashboard__title">
                                    <h3>Your Order Status</h3> </div>
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


                    <div class="col-lg-4 col-md-5">
                        <aside class="sidebar upload_sidebar">

                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>Help Order Staus</h3>
                                </div>

                                <div class="card_content">
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceler isque the mattis, leo quam aliquet congue.</p>
                                    <ul>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the</li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
            </div>
        </div>
        </div>
    </section>

        <script>
            $(document).ready(function () {
                $('.stepper').activateStepper();
            });</script>

        <script src="{{ asset('/js/materialize-stepper.js') }}"></script>




@endsection