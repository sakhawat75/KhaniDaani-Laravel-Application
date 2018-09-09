@extends ('layouts.master') @section ('title', 'Manage Dish') @section ('content')

<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li> <a href="{{ route('home') }}">Home</a> </li>
                        <li> <a href="dashboard.html">Profile</a> </li>
                        <li class="active"> <a href="#">Purchase Dish</a> </li>
                    </ul>
                </div>
                <h1 class="page-title">Purchase Dish Status</h1> </div>
        </div>
    </div>
</section>

<section class="dashboard-area">
   @include('includes.menu-dashboard')


    <div class="dashboard_contents">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard_title_area clearfix">
                        <div class="dashboard__title pull-left">
                            <h3>Withdrawals</h3>
                        </div>

                        <div class="pull-right">
                            <a href="{{route('profile.add_balance')}}" class="btn btn--round btn--md">Add Balance</a>
                        </div>
                    </div>
                    <!-- end /.dashboard_title_area -->
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="withdraw_module cardify">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="modules__title">
                                    <h3>Payment Methods</h3>
                                </div>

                                <div class="modules__content">
                                    <p class="subtitle">Select your Payment Method for
                                        <a href="#">Cash out Earnings</a>
                                    </p>
                                    <div class="options">
                                        <div class="custom-radio">
                                            <input type="radio" id="opt2" class="" name="filter_opt">
                                            <label for="opt2">
                                                <span class="circle"></span>bKash</label>
                                        </div>

                                        <div class="custom-radio">
                                            <input type="radio" id="opt3" class="" name="filter_opt">
                                            <label for="opt3">
                                                <span class="circle"></span>Direct to Local Bank (BD) - Account ending in 5790 (Minimum ৳50)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="modules__title">
                                    <h3>Withdraw Amount</h3>
                                </div>

                                <div class="modules__content">
                                    <p class="subtitle">How much amount would you like to Withdraw?</p>
                                    <div class="options">
                                        <div class="custom-radio">
                                            <input type="radio" id="opt4" class="" name="filter_opt">
                                            <label for="opt4">
                                                <span class="circle"></span>Available balance:
                                                <span class="bold">৳690.50</span>
                                            </label>
                                        </div>

                                        <div class="custom-radio">
                                            <input type="radio" id="opt5" class="" name="filter_opt">
                                            <label for="opt5">
                                                <span class="circle"></span>A partial amount...</label>
                                        </div>

                                        <div class="withdraw_amount">
                                            <div class="input-group">
                                                <span class="input-group-addon">৳</span>
                                                <input type="text" id="rlicense" class="text_field" placeholder="00.00">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="button_wrapper">
                                        <button type="submit" class="btn btn--round btn--md">Submit Cash out</button>
                                        <a href="#" class="btn btn--round btn-sm cancel_btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.col-md-6 -->
                        </div>
                        <!-- end /.row -->
                    </div>
                    <!-- end /.withdraw_module -->
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
    </div>
   
   
   
</section>




@endsection