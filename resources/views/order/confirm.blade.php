@extends ('layouts.master')

@section ('title', 'Payment')

@section ('content')

<!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Payment</h1>
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
                @include('includes.error_messeages')
                @include('includes.success_message')
                <form action="{{ route('order.store') }}" class="setting_form" method="get">
                    {{ csrf_field() }}

                    <input type="hidden" name="buyer_user_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="dish_id" value="{{ $dish->id }}">
                    <input type="hidden" name="dsp_id" value="{{ $dsp->id }}">


                    <div class="row">
                        <div class="col-lg-6">

                            <div class="information_module order_summary">
                                <div class="toggle_title">
                                    <h4>Order Summary</h4>
                                </div>

                                <ul>
                                    <li class="item">
                                        <a href="{{ route('dishes.show', ['id' => $dish->id]) }}" target="_blank"><b>Dish Price:</b> {{ $dish->dish_name }} </a>
                                        <span>৳{{ $dish->dish_price }}</span>
                                    </li>
                                    <li class="item">
                                        <a href="{{ route('profile.show', ['profile' => $dsp->user->profile->id]) }}" target="_blank"><b>Deliverer Fee: </b>{{ $dsp->user->name }}</a>
                                        <span>৳{{ $dsp->service_charge }}</span>
                                    </li>
                                    <li>
                                        <p> <b>Maintenance Fee: ({{$system->service_percentage}}%)</b> </p>
                                        <span>৳{{ $khanidaani_charge }} </span>
                                    </li>
                                    <li class="total_ammount">
                                        <p>Total</p>
                                        <span>৳{{ $total }}</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.information_module-->
                            <div class="information_module">
                                <div class="toggle_title">
                                    <h4>Delivery Address</h4> <span class="a-color">
                                        @auth

                                            @if(auth()->user()->profile->address)
                                                Update only if you want the delivery in different address
                                            @else
                                                You Must Provide Your Address Information
                                            @endif
                                        @else
                                            You Must Provide Your Address Information
                                            @endauth
                                    </span>
                                </div>

                                <div class="information__set">
                                    <div class="information_wrapper form--fields">


                                        <div class="form-group">
                                            <label for="delivery_address">Address Line 1</label>
                                            <sup>*</sup>

                                            @auth
                                                <input type="text" id="delivery_address" name="delivery_address" class="text_field" value="{{ auth()->user()->profile->address }}" required>
                                            @else
                                                <input type="text" id="delivery_address" name="delivery_address" class="text_field" placeholder="Address line one" required>

                                            @endauth
                                        </div>

                                        <div class="form-group">
                                            <label for="delivery_address_hint">Address Hint</label>
                                            @auth
                                                <input type="text" id="delivery_address_hint" name="delivery_address_hint" class="text_field" value="{{ auth()->user()->profile->address_hint }}">
                                            @else
                                                <input type="text" id="delivery_address_hint" name="delivery_address_hint" class="text_field" placeholder="Address Hint">

                                            @endauth
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="buyer_contact_n">Mobile No
                                                        <sup>*</sup>
                                                    </label>
                                                    @auth
                                                        <input type="text" id="buyer_contact_n" name="buyer_contact_n" class="text_field" value="{{ auth()->user()->profile->mobile_no }}" required>
                                                    @else
                                                        <input type="text" id="buyer_contact_n" name="buyer_contact_n" class="text_field" placeholder="Mobile No 1" required>

                                                    @endauth
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="buyer_cn_opt" name="buyer_cn_opt">Mobile no (Optional)
                                                    </label>
                                                    <input type="number" id="buyer_cn_opt" name="buyer_cn_opt" class="text_field" placeholder="Mobile no 2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end /.information__set -->
                            </div>
                            <!-- end /.information_module -->
                        </div>
                        <!-- end /.col-md-6 -->

                        <div class="col-lg-6">
                            <div class="information_module payment_options">
                                <div class="toggle_title">
                                    <h4>Select Payment Method</h4>
                                </div>
                                <ul>
                                    <li>
                                        <h5 class="mg-bt">Existing KhaniDaani Balance</h5>
                                        <div class="custom-radio">
                                            @if (auth()->user()->profile->balance > $total)
                                                <input type="radio" id="opt3" class="" name="payment_type" VALUE="1">
                                                <label for="opt3">
                                                    <span class="circle"></span>Khanidaani Balance</label>
                                                <p>Current Balance:
                                                    <span class="bold">৳{{ auth()->user()->profile->balance }}</span>
                                                </p>
                                                <div id="opt3_msg" class="d-none">
                                                    <div class="alert alert-default text-center" id="opt3_msg">
                                                        After Buying your balance will become <br>
                                                        ({{ auth()->user()->profile->balance }} - {{ $total }}) = <span class="bold">৳{{ auth()->user()->profile->balance - $total}}</span>
                                                    </div>
                                                </div>
                                            @else
                                                <input type="radio" id="opt3" class="" name="payment_type" VALUE="1" disabled>
                                                <label for="opt3">
                                                    <span class="circle"></span>Khanidaani Balance</label>
                                                <p>Balance
                                                    <span class="bold">৳{{ auth()->user()->profile->balance }}</span>
                                                </p>
                                                <div class="alert alert-danger" id="opt3_msg">
                                                    You Do Not Have Enough KhaniDhaani Balance to Buy this Item. Please Use Other Payment System Instead
                                                </div>
                                            @endif
                                        </div>

                                    </li>
                                    <li>
                                        <h5 class="mg-bt">bKash Payment</h5>
                                        <div class="custom-radio mg-bt">

                                            <input type="radio" id="opt2" class="" name="payment_type" value="2" checked>
                                            <label for="opt2">
                                                <span class="circle"></span>Bkash</label><label for="">Amount: ৳{{ $total }}</label>
                                            <br>
                                            <div class="alert alert-success">
                                                Pay ৳{{ $total }} through bKash and enter transaction Id below (Our merchant bKash wallet number: 01711012666)
                                            </div>
                                        </div>

                                        <label for="delivery_address">bKash trasaction id:</label>
                                        <div class="form-group">
                                            <input type="number" value="{{ $total }}" name="b_amount" hidden>
                                            <input id="card_number" type="text" class="text_field" placeholder="Enter your bkash trasaction number here..." name="b_t_id">
                                        </div>
                                        {{--<a href="{{ route('order.status') }}" class="btn btn--round btn--default">Continue & Order</a>--}}


                                    </li>
                                </ul>


                                    <div class="payment_info modules__content">

                                        <div class="row">
                                            <div class="col-md-12">

                                                <button type="submit" class="btn btn--round btn--default">Continue & Order</button>

                                                {{--<button type="submit" class="btn btn--round btn--default">Confirm Order</button>--}}
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!-- end /.information_module-->
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
    <!--================================
            END DASHBOARD AREA
    =================================-->


@endsection

@push('scripts-footer-bottom')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#opt3').on('click', function (e) {
                // e.preventDefault();
                $('#opt3_msg').removeClass('d-none');
                $('#opt3_msg').show();
            });
        });
    </script>
@endpush