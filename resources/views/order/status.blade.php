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

                            @include('includes.success_message')
                            @include('includes.error_messeages')

                            <div class="dynamic_part text-center">
                                <h3 class="my-3">Your Role: <b>{{ $order->role() }}</b></h3>
                                <h6 class="mb-5">Order Status: <b class="o_satus"></b></h6>

                                {{--<div class="my-5">
                                    {{ \Carbon\Carbon::now()->diffInMinutes($order->created_at) }}
                                    <form action="{{ route('command.reset_order', ['id' => $order->id]) }}" method="get">
                                    <button type="submit" class="btn btn--sm btn-primary">Reset Order steps for testing</button></form>
                                </div>--}}

                                <div class="order_dynamic">
                                    <div class="ajax-loader">
                                        <img src="{{ asset('images/gif/ajax-loader.gif') }}" class="img-responsive"/>
                                    </div>
                                    <h6 class="os_box">
                                        <span class="os_span bold">Order Updates: </span>
                                        <span class="os_update"></span>
                                    </h6>
                                    <p class="os_note mt-3 d-none">
                                        <small>
                                            <b>Note: </b>
                                            <span class="note_text">

                                            </span>
                                        </small>
                                    </p>

                                    <div class="buyers_review rating product--rating my-5 d-none"><p>Buyer's Review:</p>
                                        <ul class="dynamic_review mt-0">
                                            <li><span class="fa fa-star"></span></li>
                                            <li><span class="fa fa-star"></span></li>
                                            <li><span class="fa fa-star"></span></li>
                                            <li><span class="fa fa-star"></span></li>
                                            <li><span class="fa fa-star-o"></span></li>
                                        </ul>
                                    </div>

                                    <div class="all_timers_template my-5">
                                        <div class="">
                                            <h5 class="timer_text"></h5>
                                            <h1><span id="chef_approval_timer"
                                                      class="d-none">Chef Approval Timer </span></h1>
                                            <h1><span id="chef_timer" class="d-none">Chef Timer</span></h1>
                                            @if(!$order->pp)
                                                <h1><span id="dsp_timer" class="d-none">Dsp Timer</span></h1>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="action_template my-5">
                                        <h4 class="mb-3 your_action">Your Actions</h4>
                                        @if(auth()->id() == $order->buyer_user_id)

                                            <div class="buyer_opt">
                                                <button class="buyer_cancel_btn btn btn--icon btn-md btn--round btn-danger"
                                                        id=""
                                                        type="button"
                                                        @if($order->chef_order_approved == 1)
                                                        disabled="disabled"
                                                        @endif
                                                >

                                                    <span class="lnr"></span>Cancel Order
                                                </button>
                                                {{-- TODO cancel if chef did not accept it within 30 minutes, if chef accept it make the butto disable--}}

                                            </div>

                                        @endif

                                        @if(auth()->id() == $order->dish_user_id)
                                            <div class="chef_opt">
                                                {{--<p>Only chefusername can use this</p>--}}
                                                <button class="btn btn--icon btn-md btn--round btn-success chef_accept d-none"
                                                        type="button">
                                                    <span class="lnr  lnr-thumbs-up"></span>Accept
                                                    {{-- TODO if chef did not accept it within 30 minutes buyer can reject it--}}
                                                </button>
                                                <button class="btn btn--icon btn-md btn--round btn-danger d-none chef_reject"
                                                        type="button">
                                                    <span class="lnr  lnr-thumbs-down"></span>Reject
                                                    {{-- TODO if chef did not accept it within 30 minutes buyer can reject it--}}
                                                </button>

                                                <button class="btn btn--icon btn-md btn--round btn-danger d-none"
                                                        id="dish_ready"
                                                        type="button">
                                                    <span class="lnr lnr-bullhorn"></span>Dish is Ready
                                                </button>

                                            </div>
                                        @endif

                                        @if(auth()->id() == $order->dsp_user_id || auth()->id() == $order->pp_user_id)
                                            <div class="dsp_opt">
                                                <button class="btn btn--icon btn-md btn--round btn-success"
                                                        type="button" id="dsp_ready" disabled="disabled"><span
                                                            class="lnr  lnr-thumbs-up"></span>Dish is
                                                    Received {{-- TODO means he recived from chef--}}
                                                </button>
                                                <button class="btn btn--icon btn-md btn--round btn-danger d-none"
                                                        type="button"
                                                        id="dsp_delivered"><span
                                                            class="lnr  lnr-thumbs-up"></span>Dish is
                                                    Delivered {{-- TODO means he delivered to the buyer--}}
                                                </button>
                                            </div>
                                        @endif

                                        @if(auth()->id() == $order->buyer_user_id)
                                            <div class="buyer_opt d-none buyer_review">
                                                <button class="btn btn--icon btn-md btn--round btn-success"
                                                        id="order_completed"
                                                        type="button"><span
                                                            class="lnr  lnr-thumbs-up"></span>Received By Me
                                                </button>

                                                <div class="product__price_download my-5">
                                                    <div class="item_action v_middle d-none rating_btn">
                                                        <a href="#"
                                                           class="btn btn--md btn--round rating--btn not--rated rate_it"
                                                           data-toggle="modal" data-target="#myModal">
                                                            Give Rating
                                                            {{--<P class="">Give Rating</P>--}}
                                                            {{--<div class="rating product--rating">
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
                                                            </div>--}}
                                                        </a>
                                                        <!-- end /.rating--btn -->
                                                    </div>
                                                    <!-- end /.item_action -->
                                                </div>
                                                <!-- end /.product__price_download -->
                                            </div>
                                        @endif
                                    </div>

                                    <div class="total_steps my-5 text-left">
                                        <h4>Steps: </h4>
                                        <ul class="list-group mt-3">
                                            <li class="list-group-item step_1">Chef's Order Acceptation</li>
                                            <li class="list-group-item step_2">Chef's Dish Preparation Completion</li>
                                            <li class="list-group-item step_3">Dsp/PP Dish Received</li>
                                            <li class="list-group-item step_4">Dsp/PP Dish Delivered</li>
                                            <li class="list-group-item step_5">Buyer's Confirmation</li>
                                        </ul>
                                    </div>

                                </div>


                            </div>


                        </div>


                    </div>
                    <!-- end /.col-md-12 -->


                    <div class="col-lg-4 col-md-5">
                        <aside class="sidebar upload_sidebar">

                            <ul class="stepper">

                                <li class="step active">
                                    <div data-step-label=""
                                         class="step-title waves-effect waves-dark">Detail Info
                                    </div>
                                    <div class="step-content">
                                        <h6 class="mb-3 scolor"><b>Dish Info:</b></h6>
                                        @include( 'dishes.box_dish_preview')
                                        {{-- TODO dont work for the new notification--}}
                                        {{-- done TODO  dish preview here for every one --}}

                                        <div class="order-address">
                                            {{-- done TODO address only for dsp--}}
                                            @if(! (auth()->id() === $order->dish_user_id))

                                                <h6><u>Chef info:</u></h6>
                                                <p><b>Address:</b> {{ $order->chef->profile->address }}</p>
                                                <p><b>Address
                                                        Hint:</b> {{ $order->chef->profile->address_hint }}</p>
                                                <p><b>Mobile:</b> {{ $order->chef->profile->mobile_no }}</p>

                                            @endif
                                            @if(! (auth()->id() === $order->buyer_user_id))

                                                <h6><u>Foodies info:</u></h6>
                                                <p><b>Address:</b>{{ $order->buyer->profile->address }}</p>
                                                <p><b>Address Hint: </b>{{ $order->buyer->profile->address_hint }}</p>
                                                <p><b>Mobile:</b> {{ $order->buyer->profile->mobile_no }}</p>

                                            @endif
                                        </div>
                                    </div>

                                <li class="step">
                                    <div data-step-label=""
                                         class="step-title waves-effect waves-dark">Facing any problem?
                                    </div>
                                    <div class="step-content">
                                        <p>We are here to solve if there is any problem, just send us a massage.</p>
                                        <div class="freelance-status">
                                            <div class="author-badges">
                                                <div class="author-btn">
                                                    <button class="btn btn--md btn--round" data-toggle="modal"
                                                            data-target="#messageModal" type="button"
                                                    >Complain to us
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @if(!is_null($order->dsp))
                                    <li class="step ">
                                        <div data-step-label=""
                                             class="step-title waves-effect waves-dark">Delivery
                                            Service Info
                                        </div>
                                        <div class="step-content">
                                            <div class="delivery-service dsp_status">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {{-- TODO dsp preview here for every one if posible--}}
                                                        @include('includes.dsp_order_status', ['dsp' => $order->dsp])
                                                    </div>
                                                </div>

                                                <div class="order-address">
                                                    {{-- TODO dsp address for everyone--}}

                                                    <div class="">
                                                        <h6><u>Contact info:</u></h6>
                                                        @if($order->dsp->profile)
                                                            <p><b>Address:</b> {{ $order->dsp->profile->address }}</p>
                                                        @endif
                                                        <p><b>Address Hint:</b> {{ $order->dsp->profile->address_hint }}
                                                        </p>
                                                        <p><b>Mobile:</b> {{ $order->dsp->profile->mobile_no }}</p>
                                                    </div>

                                                    {{-- <h5 id="dsp_str">Count down will start after clicking Recieved</h5> --}}


                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endif

                                @if(!is_null($order->pp))
                                    <li class="step">
                                        <div data-step-label=""
                                             class="step-title waves-effect waves-dark">Pickers Point Info
                                        </div>
                                        <div class="step-content">
                                            <div class="">
                                                {{-- TODO pp preview here for every one if posible--}}
                                                @include ('pickerspoint.pp_preview', ['pp' => $order->pp])
                                            </div>

                                            <div class="order-address">
                                                {{-- TODO pp address for everyone--}}

                                                <div class="">
                                                    <h6><u>Pick-up point info:</u></h6>
                                                    <p><b>Address: </b>{{ $order->pp->profile->address }}</p>
                                                    <p><b>Address Hint:</b> {{ $order->pp->profile->address_hint }}</p>
                                                    <p><b>Mobile:</b> {{ $order->pp->profile->mobile_no }}</p>
                                                </div>

                                                {{-- <h5 id="pp_str">Count down will start after clicking Recieved</h5> --}}


                                            </div>
                                        </div>
                                    </li>
                                @endif


                            </ul>


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
                    <h4>{{ $order->dish->dish_name }}</h4>
                    <p>by
                        <a href="">{{ $order->dish->profile->user->name }}</a>
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

                        <div class="rating_field max-length">
                        <textarea name="rating_comment" id="rating_field" class="text_field"
                                  placeholder="Please enter your rating reason...." required maxlength="100">
                            @if($order->ratings)
                                {{ $order->ratings->comment }}
                            @endif
                        </textarea>
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

    <!-- Modal for sending message -->
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Message KhaniDaani</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('order.complain') }}" method="post" id="send_msg">
                        @csrf
                        <div class="form-group">
                            <label for="msgText">Type your Complain Below</label>
                            <textarea class="form-control" id="msgText" placeholder="I did not receive the dish"
                                      name="complain_text"></textarea>
                        </div>

                        {{-- <button type="submit" id="submit-form" class="d-none">send</button> --}}

                    </form>
                </div>

                <div class="modal-footer">
                    {{-- <label for="submit-form" tabindex="0"  class="btn btn-primary px-3 py-1">Send</label> --}}
                    <button type="submit" class="btn btn-primary px-3 py-1" form="send_msg" id="submit-form">Send
                    </button>

                    <button type="button" class="btn btn-secondary px-3 py-1" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>


    @push('scripts-footer-bottom')
        <script type="text/javascript" src="{{ asset('js/vendor/jquery.countdown.min.js') }}"></script>
        {{--@include ('order.buyer_status_template')--}}
        <script type="text/javascript">
            $(document).ready(function () {
                $('.stepper').activateStepper();

                // _.templateSettings.variable = 'order';

                /*var template = _.template(
                    $('#buyer_status_template').html()
                );*/
                $('.ajax-loader').css("visibility", "visible");

                var refresh_time = 5000;
                var previous = null;
                var current = null;

                callOrderAjax();


                //snackbar
                $('#snackbar').css('z-index', '99999');

                function snackbar($msg) {
                    $('#snackbar').html($msg);
                    $('#snackbar').toggleClass('show');
                    setTimeout(function () {
                        $('#snackbar').removeClass('show');
                    }, 1600);
                }

                var renderOrder = function (order) {
                    // console.log('dish data: ' + dishes.data);
                    $('.ajax-loader').css("visibility", "visible");

                    // change order status dynamically
                    var sstr;

                    //Notes Text
                    var notes;

                    //Timer Text
                    var timerstr;

                    // Order Updates
                    var opstr;

                    if (order.status === 1) {
                        sstr = "<span class ='text-primary' >In Progress...</span>";
                    }
                    if (order.status === 2) {
                        sstr = "<span class ='text-success' >Completed</span>";
                    }
                    //order cancelled
                    if (order.status === 3) {
                        sstr = "<span class ='text-danger' >Cancelled</span>";
                        opstr = 'The Order is Cancelled';
                        $('.all_timers_template').hide();
                        $('.action_template').hide();
                        $('.os_note').hide();
                    }

                    // order pending for chef response
                    if (order.chef_order_approved === 0 && order.status === 1 && order.chef_is_dish_ready === 0) {

                        $('.step_1').addClass('list-group-item-warning');
                        $('.os_note').removeClass('d-none');


                        opstr = "Waiting for the Chef to accept the order";
                        notes = "If the chef do not accept the order within 30 min" + " after order is placed, the order will be cancelled automatically." + " After chef accepting the order the buyer can not cancel the order" + " unless chef fails to prepare dish within time";
                        timerstr = "Chef's remaining time to accept the order:";

                        $('.chef_accept').removeClass('d-none');
                        $('.chef_reject').removeClass('d-none');

                        start_chef_approval_timer();
                    } else if (order.chef_order_approved === 1 && order.status === 1 && order.chef_is_dish_ready === 0) {
                        console.log('condition 2');
                        opstr = "Chef Accepted the order. Now the Chef is preparing the dish";
                        timerstr = "Chef's remaining time to prepare the dish:";
                        notes = "";
                        // $('#chef_approval_timer').countdown('stop');
                        $('#chef_approval_timer').hide();
                        $('.chef_accept').hide();
                        $('.chef_reject').hide();
                        $('#dish_ready').removeClass('d-none');
                        $('#chef_timer').removeClass('d-none');

                        $('.buyer_cancel_btn').prop("disabled", true);
                        $('.os_note').addClass('d-none');
                        start_chef_timer(order);

                        $('.step_1').removeClass('list-group-item-warning');
                        $('.step_1').addClass('list-group-item-success');
                        $('.step_2').addClass('list-group-item-warning');

                    } else if (order.chef_order_approved === 1 && order.status === 1 && order.chef_is_dish_ready === 1 && order.dsp_is_dish_recieved === 0) {
                        console.log('condition 3');
                        opstr = "Chef Prepared the order. Now DSP is on the way to receive.";
                        @if($order->pp)
                            opstr = "Chef Delivered the order to PP. Now Waiting for PP's Confirmation.";
                        timerstr = "";
                        @endif
                            timerstr = "Dsp's remaining time to delivered the dish:";

                        // $('#chef_timer').countdown('stop');
                        $('#dsp_timer').removeClass('d-none');
                        $('#chef_timer').hide();
                        start_dsp_timer(order);
                        $('#dish_ready').removeClass('d-none');
                        $('#dish_ready').attr('disabled', 'disabled');
                        $('#dsp_ready').prop("disabled", false);

                        $('.step_1').removeClass('list-group-item-warning');
                        $('.step_2').removeClass('list-group-item-warning');
                        $('.step_1').addClass('list-group-item-success');
                        $('.step_2').addClass('list-group-item-success');
                        $('.step_3').addClass('list-group-item-warning');
                        $('.buyer_cancel_btn').prop("disabled", true);


                    } else if (order.status === 1 && order.chef_is_dish_ready === 1 && order.dsp_is_dish_recieved === 1 && order.dsp_is_dish_delivered === 0) {
                        $('#dsp_ready').prop("disabled", true);
                        $('#dsp_delivered').removeClass('d-none');
                        $('#dish_ready').removeClass('d-none');
                        $('#dish_ready').prop('disabled', true);
                        $('.buyer_cancel_btn').prop("disabled", true);

                        opstr = "Dsp recieved the order. Now DSP is on the way to deliver to the buyer.";

                        @if($order->pp)
                            opstr = "PP Received the dish. Now Buyer has to collect the dish from PP";
                        timerstr = "";
                        @endif

                        $('.step_1').removeClass('list-group-item-warning');
                        $('.step_2').removeClass('list-group-item-warning');
                        $('.step_3').removeClass('list-group-item-warning');
                        $('.step_1').addClass('list-group-item-success');
                        $('.step_2').addClass('list-group-item-success');
                        $('.step_3').addClass('list-group-item-success');
                        $('.step_4').addClass('list-group-item-warning');

                    } else if (order.status === 1 && order.chef_is_dish_ready === 1 && order.dsp_is_dish_recieved === 1 && order.dsp_is_dish_delivered === 1 && order.is_order_completed == 0) {
                        $('#dsp_ready').prop("disabled", true);
                        $('#dsp_delivered').prop("disabled", true);
                        $('#dsp_delivered').removeClass('d-none');
                        $('.buyer_review').removeClass('d-none');
                        $('.buyer_cancel_btn').addClass('d-none');
                        $('#dish_ready').removeClass('d-none');
                        $('#dsp_timer').countdown('stop');
                        $('#dsp_timer').addClass('d-none');
                        $('#dish_ready').prop('disabled', true);
                        $('.buyer_cancel_btn').prop("disabled", true);

                        opstr = "Dsp Delivered the order. Waiting for the Buyers Comfirmation";
                        @if($order->pp)
                            opstr = "PP Delivered the order. Waiting for the Buyers Comfirmation";
                        timerstr = "";
                        @endif
                            timerstr = "Dish is Delivered to Buyer.";


                        $('.step_1').removeClass('list-group-item-warning');
                        $('.step_2').removeClass('list-group-item-warning');
                        $('.step_3').removeClass('list-group-item-warning');
                        $('.step_4').removeClass('list-group-item-warning');
                        $('.step_1').addClass('list-group-item-success');
                        $('.step_2').addClass('list-group-item-success');
                        $('.step_3').addClass('list-group-item-success');
                        $('.step_4').addClass('list-group-item-success');
                        $('.step_5').addClass('list-group-item-warning');
                    }
                    else if (order.status === 2 && order.chef_is_dish_ready === 1 && order.dsp_is_dish_recieved === 1 && order.dsp_is_dish_delivered === 1 && order.is_order_completed == 1) {
                        $('#dsp_ready').addClass("d-none");
                        $('#dsp_delivered').addClass("d-none");
                        $('.buyer_review').removeClass('d-none');
                        $('.buyer_cancel_btn').addClass('d-none');
                        $('.your_action').addClass('d-none');
                        $('.chef_opt').addClass('d-none');
                        $('.chef_opt').addClass('d-none');
                        $('.dsp_opt').addClass('d-none');
                        $('.os_note').addClass('d-none');
                        $('.os_box').addClass('d-none');
                        $('#dish_ready').addClass('d-none');
                        $('.rating_btn').removeClass('d-none');
                        // $('#dsp_timer').countdown('stop');
                        $('#dsp_timer').addClass('d-none');

                        $('#order_completed').addClass('d-none');
                        $('.buyer_cancel_btn').prop("disabled", true);

                        opstr = "The order is complete";
                        timerstr = "";


                        $('.step_1').removeClass('list-group-item-warning');
                        $('.step_2').removeClass('list-group-item-warning');
                        $('.step_3').removeClass('list-group-item-warning');
                        $('.step_4').removeClass('list-group-item-warning');
                        $('.step_5').removeClass('list-group-item-warning');

                        $('.step_1').addClass('list-group-item-success');
                        $('.step_2').addClass('list-group-item-success');
                        $('.step_3').addClass('list-group-item-success');
                        $('.step_4').addClass('list-group-item-success');
                        $('.step_5').addClass('list-group-item-success');

                        if (order.rating) {
                            $('.buyers_review').removeClass('d-none');
                            $('.dynamic_review').html(' ');
                            for (let i = 1; i <= 5; i++) {
                                if (i <= order.rating) {
                                    $('.dynamic_review').append('<li><span class="fa fa-star"></span></li>');
                                } else {
                                    $('.dynamic_review').append('<li><span class="fa fa-star-o"></span></li>');
                                }
                            }
                            $('.rate_it').text('Edit Rating');
                        }
                    }


                    $('.o_satus').html(sstr);
                    $('.os_update').html(opstr);
                    $('.note_text').html(notes);
                    $('.timer_text').html(timerstr);
                    $('.ajax-loader').css("visibility", "hidden");
                };

                function callOrderAjax() {
                    $.ajax({
                        url: "{{ route('api.order.load') }}",
                        beforeSend: function () {
                            // $('.ajax-loader').css("visibility", "visible");
                        },
                        data: {
                            order_id: {{ $order->id }},
                        },
                        type: "GET",
                        dataType: "json",
                    }).done(function (order) {
                        // $('.order_dynamic').html('');
                        $('.ajax-loader').css("visibility", "hidden");
                        current = JSON.stringify(order);
                        if (previous !== current) {
                            console.log('refresh');
                            renderOrder(order);
                        }
                        previous = current;

                        // $('.ajax-loader').css("visibility", "hidden");

                    });
                }

                function addTimer(date, selector, expired) {
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
                            $(this).html('Time has expired!');
                            // .parent().addClass('disabled');
                            expired();
                        });
                }


                var start_chef_approval_timer = function () {
                    $('#chef_approval_timer').removeClass('d-none');
                    addTimer(0.5, '#chef_approval_timer', function () {
                        console.log('chef_approval_timer is expired');
                        $.ajax({
                            url: "/api/order/update",
                            beforeSend: function () {
                                $('.ajax-loader').css("visibility", "visible");
                            },
                            data: {
                                order_id: {{ $order->id }},
                                status: 3
                            },
                            type: "GET",

                        }).done(function (order) {
                            $('.ajax-loader').css("visibility", "hidden");
                            snackbar('Order Is Cancelled automatically');
                            callOrderAjax();
                        });

                    });
                };

                var start_chef_timer = function (order) {
                    $('#chef_timer').removeClass('d-none');
                    console.log('d: ' + order.preparation_time);
                    addTimer(order.preparation_time, '#chef_timer', function () {
                        console.log('chef_timer is expired');
                        $.ajax({
                            url: "/api/order/update",
                            data: {
                                order_id: {{ $order->id }},
                                status: 3
                            },
                            type: "GET",

                        }).done(function (order) {
                            snackbar('Order Is Cancelled automatically');
                            callOrderAjax();
                        });

                    });
                };


                var start_dsp_timer = function (order) {
                    $('#chef_timer').removeClass('d-none');

                    addTimer(order.delivery_time, '#dsp_timer', function () {
                        console.log('chef_timer is expired');
                        /*$.ajax({
                            url: "/api/order/update",
                            data: {
                                order_id: {{ $order->id }},
                                status : 3
                            },
                            type: "GET",

                        }).done(function (order) {
                            snackbar('Order Is Cancelled automatically');
                            renderOrder();
                        });*/

                    });
                };


                myInterval = setInterval(function () {
                    callOrderAjax();
                }, refresh_time);


                $('.buyer_cancel_btn').on('click', function (e) {
                    e.preventDefault();
                    $('#chef_approval_timer').countdown('stop');
                    $.ajax({
                        url: "/api/order/update",
                        beforeSend: function () {
                            $('.ajax-loader').css("visibility", "visible");
                        },
                        data: {
                            order_id: {{ $order->id }},
                            status: 3,
                        },
                        type: "GET",

                    }).done(function (order) {
                        $('.buyer_cancel_btn').prop("disabled", true);
                        $('.ajax-loader').css("visibility", "hidden");
                        snackbar('Order Is Cancelled');
                        callOrderAjax();
                    });
                });

                $('.chef_accept').on('click', function (e) {
                    e.preventDefault();
                    $('#chef_approval_timer').countdown('stop');
                    $.ajax({
                        url: "/api/order/update",
                        beforeSend: function () {
                            $('.ajax-loader').css("visibility", "visible");
                        },
                        data: {
                            order_id: {{ $order->id }},
                            chef_order_approved: 1,
                        },
                        type: "GET",

                    }).done(function (order) {
                        $('.ajax-loader').css("visibility", "hidden");
                        $(this).attr('disabled', 'disabled');
                        snackbar('Order Is Accepted');
                        callOrderAjax();
                    });
                });

                $('.chef_reject').on('click', function (e) {
                    e.preventDefault();
                    $('#chef_approval_timer').countdown('stop');
                    $.ajax({
                        url: "/api/order/update",
                        beforeSend: function () {
                            $('.ajax-loader').css("visibility", "visible");
                        },
                        data: {
                            order_id: {{ $order->id }},
                            chef_order_approved: 2,
                        },
                        type: "GET",

                    }).done(function (order) {
                        $('.ajax-loader').css("visibility", "hidden");
                        snackbar('Order Is Rejected');
                        callOrderAjax();
                    });
                });

                $('#dish_ready').on('click', function (e) {
                    e.preventDefault();
                    $('#dish_ready').attr('disabled', 'disabled');
                    console.log('Clicked: #dish_ready');
                    @if($order->dish->profile_id == auth()->id())

                    $.ajax({
                        url: "/api/order/update",
                        beforeSend: function () {
                            $('.ajax-loader').css("visibility", "visible");
                        },
                        data: {
                            order_id: {{ $order->id }},
                            chef_is_dish_ready: 1
                        },
                        type: "GET",

                    }).done(function (order) {
                        $('.ajax-loader').css("visibility", "hidden");
                        snackbar('Dish is ready');
                        callOrderAjax();
                    });

                    $('#chef_timer').countdown('stop');
                    // $('#chef_timer').text('Dish is ready');
                    {{--addTimer({{ $order->delivery_time }}, '#dsp_timer');--}}
                    // $('.timer_text').text('Dsp Count Down will  start after loading data...');
                    @endif

                });

                $('#dsp_ready').on('click', function (e) {
                    e.preventDefault();
                    $(this).attr('disabled', 'disabled');
                    // $('#dsp_delivered').removeClass('d-none');
                    @if(auth()->user()->delivery_services->contains('id', $order->dsp_id) ||
                    auth()->user()->pickerspoints->contains('id', $order->pp_id))
                    console.log('Clicked: #dsp_ready');
                    $.ajax({
                        url: "/api/order/update",
                        beforeSend: function () {
                            $('.ajax-loader').css("visibility", "visible");
                        },
                        data: {
                            order_id: {{ $order->id }},
                            dsp_is_dish_recieved: 1
                        },
                        type: "GET",

                    }).done(function (order) {
                        // $('#dsp_timer').countdown('pause');
                        $('.ajax-loader').css("visibility", "hidden");
                        @if($order->pp)
                        snackbar('PP Recieved the dish');
                        @else
                        snackbar('Dsp Recieved the dish');

                        @endif
                        callOrderAjax();
                    });



                    @endif

                });

                $('#dsp_delivered').on('click', function (e) {
                    e.preventDefault();
                    $(this).attr('disabled', 'disabled');

                    @if(auth()->user()->delivery_services->contains('id', $order->dsp_id) ||
                    auth()->user()->pickerspoints->contains('id', $order->pp_id))
                    console.log('Clicked: #dsp_delivered');
                    $.ajax({
                        url: "/api/order/update",
                        data: {
                            order_id: {{ $order->id }},
                            dsp_is_dish_delivered: 1
                        },
                        beforeSend: function () {
                            $('.ajax-loader').css("visibility", "visible");
                        },
                        type: "GET",

                    }).done(function () {
                        $('.ajax-loader').css("visibility", "hidden");
                        $('#dsp_timer').countdown('pause');
                        snackbar('Dish is Delivered to Buyer');
                    });



                    @endif

                });

                // order_completed
                $('#order_completed').on('click', function (e) {
                    e.preventDefault();
                    $('#order_completed').attr('disabled', 'disabled');
                    $('.item_action').removeClass('d-none');


                    @if(auth()->id() == $order->buyer_user_id)
                    console.log('Clicked: #dsp_delivered');
                    $.ajax({
                        url: "/api/order/update",
                        data: {
                            order_id: {{ $order->id }},
                            is_order_completed: 1
                        },
                        beforeSend: function () {
                            $('.ajax-loader').css("visibility", "visible");
                        },
                        type: "GET",

                    }).done(function () {
                        $('.ajax-loader').css("visibility", "hidden");
                        $('#dsp_timer').countdown('stop');
                        $('#dsp_timer').html('Order is Completed');
                        snackbar('The order is completed');
                    });
                    @endif
                });

            });
        </script>

        <script type="text/javascript">
            $(function () {
                $('#select_rating').barrating({
                    theme: 'fontawesome-stars'
                });
            });

            //send message
            $('#submit-form').click(function(e) {
                e.preventDefault();
                $("#messageModal").modal('hide');
                // var body = $('#msgText').val();
                // $('#msgText').val(' ');
                $('#send_msg').submit();


            });
        </script>

    @endpush

    <script src="{{ asset('/js/materialize-stepper.js') }}"></script>




@endsection