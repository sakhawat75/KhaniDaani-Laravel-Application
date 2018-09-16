@extends ('layouts.master')


@section ('title', 'Order Status')

@push ('head-css')
    <style type="text/css">
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.3s, fadeout 0.3s 1.3s;
            animation: fadein 0.3s, fadeout 0.3s 1.3s;
        }

        @-webkit-keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }
            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }
            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }
            to {
                bottom: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }
            to {
                bottom: 0;
                opacity: 0;
            }
        }
    </style>
@endpush

@section ('content')

    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Order id: {{ $order->id }}</h1>
                </div>
            </div>
        </div>
    </section>


    <div id="snackbar">Snackbar</div>

    <script src="{{ asset('/js/materialize.min.js') }}"></script>
    <section class="dashboard-area">
        <div class="dashboard_contents">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <div class="dashboard_title_area">
                            <ul class="stepper">
                                <li class="step active">
                                    <div data-step-label="Now chef is preparing the food please wait..."
                                         class="step-title waves-effect waves-dark">Order Started
                                    </div>
                                    <div class="step-content">
                                        <div class="">

                                            <div class="">

                                                <div class="">
                                                    @include( 'dishes.box_dish_preview')
                                                    {{-- TODO dont work for the new notification--}}
                                                    {{-- TODO dish preview here for every one--}}
                                                </div>

                                                @if(auth()->id() == $order->dsp_id)
                                                <div class="order-address">
                                                    {{-- TODO address only for dsp--}}
                                                    <div class="">
                                                        <h6><u>Chef info: </u></h6>
                                                        <p>Adress: {{ $order->chef->profile->address }}</p>
                                                        <p>Adress Hint: {{ $order->chef->profile->address_hint }}</p>
                                                        <p>Mobile: {{ $order->chef->profile->mobile_no }}</p>
                                                    </div>
                                                    <div class="">
                                                        <h6><u>Foodies info: </u></h6>
                                                        <p>Adress: {{ $order->buyer->profile->address }}</p>
                                                        <p>Adress Hint: {{ $order->buyer->profile->address_hint }}</p>
                                                        <p>Mobile: {{ $order->buyer->profile->mobile_no }}</p>
                                                    </div>
                                                </div>
                                                @endif



                                                @if(auth()->id() == $order->buyer_user_id)
                                                    <div class="">
                                                        <button class="btn btn--icon btn-md btn--round btn-danger" id=""
                                                                type="button">
                                                            <span class="lnr"></span>Cancel
                                                        </button>
                                                         {{-- TODO cancel if chef did not accept it within 30 minutes, if chef accept it make the butto disable--}}

                                                    </div>
                                                @endif


                                                <div class="mt-5">
                                                    <h4><span id="chef_timer">Dish is Ready</span></h4>
                                                </div>
                                            </div>
                                        </div>

                                        <br>

                                        @if(auth()->id() == $order->dish_user_id)
                                            <div class="chef_opt">
                                                <p>Only chefusername can use this</p>
                                                {{--<button class="btn btn--icon btn-md btn--round btn-success" type="button">--}}
                                                    {{--<span class="lnr  lnr-thumbs-up"></span>Accept--}}
                                                    {{-- TODO if chef did not accept it within 30 minutes buyer can reject it--}}
                                                {{--</button>--}}
                                                <button class="btn btn--icon btn-md btn--round btn-danger" id="dish_ready"
                                                        type="button">
                                                    <span class="lnr lnr-bullhorn"></span>Ready
                                                </button>

                                            </div>
                                        @endif
                                    </div>
                                </li>

                                <li class="step">
                                    <div data-step-label="Status of the delivery ..."
                                         class="step-title waves-effect waves-dark">Delivery
                                        Service
                                    </div>
                                    <div class="step-content">
                                        <div class="">
                                            {{-- TODO dsp preview here for every one if posible--}}
                                        </div>

                                        <div class="order-address">
                                            {{-- TODO dsp address for everyone--}}
                                            <div class="">
                                                <h6><u>DSP info:</u></h6>
                                                <p>Adress: {{ $order->dsp->profile->address }}</p>
                                                <p>Adress Hint: {{ $order->dsp->profile->address_hint }}</p>
                                                <p>Mobile: {{ $order->dsp->profile->mobile_no }}</p>
                                            </div>

                                            <h5 {{--class="d-none"--}} id="dsp_str">{{--Count down will start after clicking Recieved--}}</h5>
                                            <h1><span id="dsp_timer">{{--{{ $order->delivery_time }}--}}</span></h1>


                                            @if(auth()->id() == $order->dsp_id)
                                                <div class="dsp_opt">
                                                    <button class="btn btn--icon btn-md btn--round btn-success"
                                                            type="button" id="dsp_ready"><span
                                                                class="lnr  lnr-thumbs-up"></span>Received {{-- TODO means he recived from chef--}}
                                                    </button>
                                                    <button class="btn btn--icon btn-md btn--round btn-danger" type="button"
                                                            id="dsp_delivered"><span
                                                                class="lnr  lnr-thumbs-up"></span>Delivered {{-- TODO means he delivered to the buyer--}}
                                                        By DSPID
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </li>

                                <li class="step">
                                    <div class="step-title waves-effect waves-dark">Order Completed</div>
                                    <div class="step-content">
                                        <div class="product__price_download">

                                            @if(auth()->id() == $order->buyer_user_id)
                                            <div class="buyer_opt">
                                                <button class="btn btn--icon btn-md btn--round btn-success"
                                                        id="order_completed"
                                                        type="button"><span
                                                            class="lnr  lnr-thumbs-up"></span>Received By User
                                                </button>

                                                <div class="product__price_download">
                                                    <div class="item_action v_middle">
                                                        <a href="#"
                                                           class="btn btn--md btn--round btn--white rating--btn not--rated"
                                                           data-toggle="modal" data-target="#myModal">
                                                            <P class="rate_it">Rate Now</P>
                                                            <div class="rating product--rating">
                                                                <ul>
                                                                    <li>
                                                                        <span class="fa fa-star-o"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star-o"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star-o"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star-o"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star-o"></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </a>
                                                        <!-- end /.rating--btn -->
                                                    </div>
                                                    <!-- end /.item_action -->
                                                </div>
                                                <!-- end /.product__price_download -->
                                            </div>
                                                @endif


                                        </div>


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
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceler
                                        isque the mattis, leo
                                        quam aliquet congue.</p>
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


    <!-- Modals -->
    <div class="modal fade rating_modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="rating_modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title" id="rating_modal">Rate experince </h3>
                    <h4>Dish Title</h4>
                    <p>by
                        <a href="">Chef username</a>
                    </p>
                </div>
                <!-- end /.modal-header -->

                <div class="modal-body">
                    <form action="{{ route('rating.store', ['order' => $order]) }}" method="get">
                        @csrf
                        <ul>
                            <li>
                                <p>Your Rating</p>
                                <div class="right_content btn btn--round btn--white btn--md">
                                    <select name="rating" class="give_rating" id="select_rating">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </li>

                            <!-- <li>
                              <p>Rating Causes</p>
                              <div class="right_content">
                                <div class="select-wrap">
                                  <select name="review_reason">
                                    <option value="design">Food Presentation</option>
                                    <option value="customization">Food Quality</option>
                                  </select>

                                  <span class="lnr lnr-chevron-down"></span>
                                </div>
                              </div>
                            </li> -->
                        </ul>

                        <div class="rating_field">
              <textarea name="rating_comment" id="rating_field" class="text_field"
                        placeholder="Please enter your rating reason...."></textarea>
                            <p class="notice">Your review will be ​publicly visible​, Thank you!</p>
                        </div>
                        <button type="submit" class="btn btn--round btn--default">Submit Rating</button>
                        <button class="btn btn--round modal_close" data-dismiss="modal">Close</button>
                    </form>
                    <!-- end /.form -->
                </div>
                <!-- end /.modal-body -->
            </div>
        </div>
    </div>


    @push('scripts-footer-bottom')
        <script type="text/javascript" src="{{ asset('js/vendor/jquery.countdown.min.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.stepper').activateStepper();

                //snackbar
                function snackbar($msg) {
                    $('#snackbar').html($msg);
                    $('#snackbar').toggleClass('show');
                    setTimeout(function () {
                        $('#snackbar').removeClass('show');
                    }, 1600);
                }

                @auth
                //logged in as chef
                @if($order->dish->profile_id == auth()->id())

                $('.chef_opt').removeClass('d-none');

                @if($order->chef_is_dish_ready == 1)
                $('#dish_ready').attr('disabled', 'disabled');
                @endif


                @endif

                //logged in as dsp
                @if(auth()->user()->delivery_services->contains('id', $order->dsp_id))

                @if($order->chef_is_dish_ready == 1)
                $('.dsp_opt').removeClass('d-none');
                @endif

                @if($order->dsp_is_dish_delivered == 1)
                $('#dsp_delivered').attr('disabled', 'disabled');
                @endif

                @endif

                // logged in as buyer
                @if(auth()->id() == $order->buyer_user_id)

                @if($order->chef_is_dish_ready == 1 and $order->dsp_is_dish_delivered == 1)
                $('.buyer_opt').removeClass('d-none');
                @endif

                @if($order->is_order_completed == 1)
                $('#order_completed').attr('disabled', 'disabled');
                $('.item_action').removeClass('d-none');
                @endif

                @endif
                @endauth


                @if($order->chef_is_dish_ready != 1)
                addTimer({{ $order->preparation_time }}, '#chef_timer');
                @else
                addTimer({{ $order->delivery_time }}, '#dsp_timer');
                @endif

                @if($order->dsp_is_dish_delivered == 1)
                addTimer({{ $order->delivery_time }}, '#dsp_timer');
                $('#dsp_timer').countdown('pause');
                @endif

                @if($order->is_order_completed == 1)
                $('#dsp_timer').html('Order is Completed');
                $('#order_completed').html('Order is Completed');
                @endif

                $('#dish_ready').on('click', function (e) {
                    e.preventDefault();
                    $('#dish_ready').attr('disabled', 'disabled');
                    console.log('Clicked: #dish_ready');
                    @if($order->dish->profile_id == auth()->id())

                    $.ajax({
                        url: "/api/order/update",
                        data: {
                            order_id: {{ $order->id }},
                            chef_is_dish_ready: 1
                        },
                        type: "GET",

                    }).done(function () {
                        snackbar('Dish is ready');
                    });

                    $('#chef_timer').countdown('stop');
                    $('#chef_timer').text('Dish is ready');
                    addTimer({{ $order->delivery_time }}, '#dsp_timer');
                    $('#dsp_str').text('Count Down started...');
                    @endif

                });

                $('#dsp_delivered').on('click', function (e) {
                    e.preventDefault();
                    $(this).attr('disabled', 'disabled');
                    console.log('auth id: {{ auth()->id() }}');
                    console.log('dsp id: {{ $order->dsp_id }}');
                    @if(auth()->user()->delivery_services->contains('id', $order->dsp_id))
                    console.log('Clicked: #dsp_delivered');
                    $.ajax({
                        url: "/api/order/update",
                        data: {
                            order_id: {{ $order->id }},
                            dsp_is_dish_delivered: 1
                        },
                        type: "GET",

                    }).done(function () {
                        $('#dsp_timer').countdown('pause');
                        snackbar('Dish is Delivered');
                    });



                    @endif

                });

                // order_completed
                $('#order_completed').on('click', function (e) {
                    e.preventDefault();
                    $('#order_completed').attr('disabled', 'disabled');
                    $('.item_action').removeClass('d-none');

                    $(this).attr('disabled', 'disabled');

                    console.log('auth id: {{ auth()->id() }}');
                    console.log('dsp id: {{ $order->dsp_id }}');
                    @if(auth()->id() == $order->buyer_user_id)
                    console.log('Clicked: #dsp_delivered');
                    $.ajax({
                        url: "/api/order/update",
                        data: {
                            order_id: {{ $order->id }},
                            is_order_completed: 1
                        },
                        type: "GET",

                    }).done(function () {
                        $('#dsp_timer').countdown('stop');
                        $('#dsp_timer').html('Order is Completed');
                        $('#order_completed').html('Order is Completed');
                        snackbar('The order is completed');
                    });



                    @endif

                });


                /* bar rating plugin installation */
                $('#select_rating').barrating({
                    theme: 'fontawesome-stars',
                    onSelect: function (value, text, event) {
                        if (typeof(event) !== 'undefined') {
                            // rating was selected by a user
                            console.log(event.target);
                        } else {
                            // rating was selected programmatically
                            // by calling `set` method
                        }
                    }
                });


                $('#dsp_ready').on('click', function (e) {
                    e.preventDefault();
                    console.log('Clicked: #dsp_ready');
                    // $('#chef_timer').countdown('stop');
                    // $('#chef_timer').text('Dish is ready');
                    {{--addTimer({{ $order->delivery_time }}, '#dsp_timer');--}}
                    // $('#dsp_str').text('Count Down started...');
                });

                //    Asia/Dhaka
                function addTimer(date, selector) {
                    var finalDate = new Date("{{ $order->created_at }}");

                    finalDate = finalDate.getTime() + ((date + 6) * 60 * 60 * 1000);
                    finalDate = new Date(finalDate);


                    $(selector).countdown(finalDate)
                        .on('update.countdown', function (event) {
                            var format = '%H:%M:%S';
                            if (event.offset.totalDays > 0) {
                                format = '%-d day%!d ' + format;
                            }

                            $(this).html(event.strftime(format));
                        })
                        .on('finish.countdown', function (event) {
                            $(this).html('Delivery Time has expired!');
                            // .parent().addClass('disabled');

                        });
                }
            });
        </script>
    @endpush

    <script src="{{ asset('/js/materialize-stepper.js') }}"></script>




@endsection