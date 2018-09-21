@extends ('layouts.master')
@section ('title', 'Select a deliverer or delivery services for your foods')
@section ('content')

    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Select Deliverer or Pick-up Point</h1>
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
                {{--<form action="#" class="setting_form">--}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="shortcode_modules">
                            <div class="modules__title">
                                <h3>Select Delivery Services</h3>
                            </div>
                            <div class="modules__content">
                                <div class="panel-group accordion delivery-service" role="tablist" id="accordion">


                                    @foreach($dsps as $dsp)
                                        <div class="panel accordion__single" id="panel-one">
                                            <div class="single_acco_title">
                                                <h4>
                                                    <a data-toggle="collapse" href="#collapse{{ $dsp->id }}"
                                                       class="collapsed" aria-expanded="false"
                                                       data-target="#collapse{{ $dsp->id }}"
                                                       aria-controls="collapse{{ $dsp->id }}">
                                                        <span> <span class="lnr lnr-bicycle"> </span>{{ $dsp->user->name }} </span>
                                                        <span>Fee: ৳{{ $dsp->service_charge }}</span>
                                                    </a>
                                                </h4>
                                            </div>

                                            <div id="collapse{{ $dsp->id }}" class="panel-collapse collapse"
                                                 aria-labelledby="panel-one"
                                                 data-parent="#accordion">
                                                <div class="panel-body">
                                                    {{--<div class="product-meta">
                                                        <div class="author">
                                                            <img class="auth-img"
                                                                 src="{{ route('home') }}/storage/images/profile_image/{{ $dsp->user->profile->profile_image }}"
                                                                 alt="author image">
                                                            <p>
                                                                <a href="#">{{ $dsp->user->name }}</a>
                                                            </p>

                                                            <p>Service Id: <span>{{ $dsp->id }}</span></p>
                                                        </div>
                                                    </div>

                                                    <h6 class="pcolor">Title: {{ $dsp->service_title }}</h6>
                                                    <ul>
                                                        <li>
                                                            <span>Area of service: {{ $dsp->service_area }}</span>
                                                        </li>
                                                        <li>
                                                            <span>Delivery time: <span>{{ $dsp->min_delivery_time }} hrs - {{ $dsp->max_delivery_time }}
                                                                    hrs</span></span>
                                                        </li>
                                                        <li>
                                                            Availavlity
                                                            time: {{ date("g:i a", strtotime($dsp->service_hours_start)) }}
                                                            to {{ date("g:i a", strtotime($dsp->service_hours_end)) }}
                                                        </li>
                                                    </ul>


                                                    <p>{!! $dsp->service_description !!}</p>--}}

                                                    @include ('profile.dsp_preview')


                                                    <form action="{{ route( 'order.confirm', ['dsp' => $dsp, 'dish' => $dish] ) }}"
                                                          method="get" class="clearfix">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn--lg btn--round pull-left"
                                                            @if(!$dsp->isBetweenTime())
                                                                disabled="disabled"
                                                        @endif
                                                        >
                                                            @if($dsp->isBetweenTime())
                                                                Continue & Order
                                                                @else
                                                            out of service hours
                                                                @endif
                                                        </button>
                                                        <span class="pull-right mr-3 my-3">Current Time: {{ \Carbon\Carbon::now()->format('h:i a') }}</span>
                                                    </form>

                                                    {{--<a href="{{ route( 'order.confirm', ['dsp' => $dsp, 'dish' => $dish] ) }}" class="btn btn--lg btn--round">Continue & Order</a>--}}



                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.accordion__single -->
                                    @endforeach

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
                                <div class="panel-group accordion" role="tablist" id="accordion2">

                                @foreach($pps as $pp)
                                    <div class="panel accordion__single" id="panel-two">

                                        <div class="single_acco_title">
                                            <h4>
                                                <a data-toggle="collapse" href="#collapse_pp_{{ $pp->id }}"
                                                   class="collapsed" aria-expanded="false"
                                                   data-target="#collapse_pp_{{ $pp->id }}"
                                                   aria-controls="collapse_pp_{{ $pp->id }}">
                                                    <span>{{ $pp->user->name }} </span>
                                                    <span>Charge: ৳{{ $pp->charge }}</span>
                                                    <i class="lnr lnr-chevron-down indicator"></i>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse_pp_{{$pp->id}}" class="panel-collapse collapse"
                                             aria-labelledby="panel-three"
                                             data-parent="#accordion2">
                                            <div class="panel-body">
                                                {{--<ul>
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
                                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                    sceleris que the
                                                    mattis, leo quam aliquet congue placerat mi id nisi interdum mollis.
                                                    Aliquip placeat
                                                    salvia cillum iphone. Seitan aliquip quis cardigan american apparel,
                                                    butcher.</p>
                                                <a href="{{ route( 'order.confirm', ['dsp' => $dsp, 'dish' => $dish] ) }}"
                                                   class="btn btn--lg btn--round">Continue & Order</a>--}}

                                                @include('pickerspoint.pp_preview')

                                                <form action="{{ route( 'order.confirm_pp', ['pp' => $pp, 'dish' => $dish] ) }}"
                                                      method="get" class="text-center">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="pp" value="{{ $pp->id }}">
                                                    <button type="submit" class="btn btn--lg btn--round"
                                                            @if(!$pp->isBetweenTime())
                                                                disabled="disabled"
                                                            @endif
                                                    >
                                                        @if($pp->isBetweenTime())
                                                            Continue & Order
                                                            @else
                                                            shop is closed
                                                            @endif

                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- end /.accordion__single -->
                                @endforeach

                                    {{--<div class="panel accordion__single" id="panel-four">
                                        <div class="single_acco_title">
                                            <h4>
                                                <a data-toggle="collapse" href="#collapse4" class="collapsed"
                                                   aria-expanded="false"
                                                   data-target="#collapse4" aria-controls="collapse4">
                                                    <span>username</span> <span>charge:৳10</span>
                                                    <i class="lnr lnr-chevron-down indicator"></i>
                                                </a>
                                            </h4>
                                        </div>

                                        <div id="collapse4" class="panel-collapse collapse" aria-labelledby="panel-four"
                                             data-parent="#accordion">
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
                                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut
                                                    sceleris que the
                                                    mattis, leo quam aliquet congue placerat mi id nisi interdum mollis.
                                                    Aliquip placeat
                                                    salvia cillum iphone. Seitan aliquip quis cardigan american apparel,
                                                    butcher.</p>
                                                <a href="{{ route( 'order.confirm', ['dsp' => $dsp, 'dish' => $dish] ) }}"
                                                   class="btn btn--lg btn--round">Continue & Order</a>
                                            </div>
                                        </div>
                                    </div>--}}


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-6 -->
                </div>
                <!-- end /.row -->
            {{--</form>--}}
            <!-- end /form -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>

@endsection