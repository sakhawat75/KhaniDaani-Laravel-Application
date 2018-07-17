@extends ('layouts.master')

@section ('title', 'Single Dish')

@section ('content')

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
                                <a href="index.html">Home</a>
                            </li>
                            <li class="active">
                                <a href="#">Order Page</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Order Page</h1>
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

                            <div class="information_module order_summary">
                                <div class="toggle_title">
                                    <h4>Order Summary</h4>
                                </div>

                                <ul>
                                    <li class="item">
                                        <a href="single-product.html" target="_blank">Dish title: {{ $dish->dish_name }} </a>
                                        <span>৳{{ $dish->dish_price }}</span>
                                    </li>
                                    <li class="item">
                                        <a href="single-product.html" target="_blank">Dsp username: {{ $dsp->user->name }}</a>
                                        <span>৳{{ $dsp->service_charge }}</span>
                                    </li>
                                    <li>
                                        <p>Transaction Fees:</p>
                                        <span>৳2</span>
                                    </li>
                                    <li class="total_ammount">
                                        <p>Total</p>
                                        <span>৳{{ ($dish->dish_price + $dsp->service_charge + 2) }}</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.information_module-->
                            <div class="information_module">
                                <div class="toggle_title">
                                    <h4>Delivery Adress</h4>
                                </div>

                                <div class="information__set">
                                    <div class="information_wrapper form--fields">

                                        <div class="form-group">
                                            <label for="email">Your Full Name
                                                <sup>*</sup>
                                            </label>
                                            <input type="text" id="email" class="text_field" placeholder="Full name">
                                        </div>


                                        <div class="form-group">
                                            <label for="address1">Address Line 1</label>
                                            <sup>*</sup>
                                            <input type="text" id="address1" class="text_field" placeholder="Address line one">
                                        </div>

                                        <div class="form-group">
                                            <label for="address2">Address Line 2</label>
                                            <sup>*</sup>
                                            <input type="text" id="address2" class="text_field" placeholder="Address line two">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="city">Mobile No
                                                        <sup>*</sup>
                                                    </label>
                                                    <input type="number" id="zipcode" class="text_field" placeholder="Mobile No 1">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="zipcode">Mobile no (Optional)
                                                    </label>
                                                    <input type="number" id="zipcode" class="text_field" placeholder="Mobile no 2">
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
                                        <div class="custom-radio">
                                            <input type="radio" id="opt3" class="" name="filter_opt">
                                            <label for="opt3">
                                                <span class="circle"></span>Khanidaani Balance</label>
                                        </div>
                                        <p>Balance
                                            <span class="bold">৳180</span>
                                        </p>
                                    </li>
                                    <li>
                                        <div class="custom-radio">
                                            <input type="radio" id="opt2" class="" name="filter_opt">
                                            <label for="opt2">
                                                <span class="circle"></span>Bkash</label>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input id="card_number" type="text" class="text_field" placeholder="Enter your bkash trasaction number here...">
                                        </div>
                                        <a href="{{ route('order.status') }}" class="btn btn--round btn--default">Continue & Order</a>

                                    </li>
                                    <li>
                                        <div class="custom-radio">
                                            <input type="radio" id="opt1" class="" name="filter_opt">
                                            <label for="opt1">
                                                <span class="circle"></span>Credit Card</label>
                                        </div>
                                        <img src="{{ URL::to('/') }}/images/cards.png" alt="Visa Cards">
                                    </li>
                                    <div class="payment_info modules__content">
                                        <div class="form-group">
                                            <label for="card_number">Card Number</label>
                                            <input id="card_number" type="text" class="text_field" placeholder="Enter your card number here...">
                                        </div>

                                        <!-- lebel for date selection -->
                                        <label for="name">Expire Date</label>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <div class="select-wrap select-wrap2">
                                                        <select name="months" id="name">
                                                        <option value="">Month</option>
                                                        <option value="jan">jan</option>
                                                        <option value="feb">Feb</option>
                                                        <option value="mar">Mar</option>
                                                        <option value="apr">Apr</option>
                                                        <option value="may">May</option>
                                                        <option value="jun">Jun</option>
                                                        <option value="jul">Jul</option>
                                                        <option value="aug">Aug</option>
                                                        <option value="sep">Sep</option>
                                                        <option value="oct">Oct</option>
                                                        <option value="nov">Nov</option>
                                                        <option value="dec">Dec</option>
                                                    </select>
                                                        <span class="lnr lnr-chevron-down"></span>
                                                    </div>
                                                    <!-- end /.select-wrap -->
                                                </div>
                                                <!-- end /.form-group -->
                                            </div>
                                            <!-- end /.col-md-6-->

                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <div class="select-wrap select-wrap2">
                                                        <select name="years" id="years">
                                                        <option value="">Year</option>
                                                        <option value="28">2028</option>
                                                        <option value="27">2027</option>
                                                        <option value="26">2026</option>
                                                        <option value="25">2025</option>
                                                        <option value="24">2024</option>
                                                        <option value="23">2023</option>
                                                        <option value="22">2022</option>
                                                        <option value="21">2021</option>
                                                        <option value="20">2020</option>
                                                        <option value="19">2019</option>
                                                        <option value="18">2018</option>
                                                        <option value="17">2017</option>
                                                    </select>
                                                        <span class="lnr lnr-chevron-down"></span>
                                                    </div>
                                                    <!-- end /.select-wrap -->
                                                </div>
                                                <!-- end /.form-group -->
                                            </div>
                                            <!-- end /.col-md-6-->
                                        </div>
                                        <!-- end /.row -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cv_code">CVV Code</label>
                                                    <input id="cv_code" type="text" class="text_field" placeholder="Enter code here...">
                                                </div>

                                                <button type="submit" class="btn btn--round btn--default">Confirm Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </ul>
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