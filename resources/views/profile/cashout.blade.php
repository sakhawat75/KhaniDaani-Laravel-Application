@extends ('layouts.master') @section ('title', 'Cash out your earning to bKash or withdrawal to Bank account.') @section ('content')

<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                </div>
                <h1 class="page-title">Payment and Withdrawls</h1> </div>
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
                        <div class="row">
                        <div class="col-md-6">
                        <div class="dashboard__title">
                            <h3>Don't you have sufficient balance?</h3>
                        </div>
                            <br>
                    </div>
<div class="col-md-6">
                        <div class="pull-right">
                            <a href="{{route('profile.add_balance')}}" class="btn btn--round btn--md">Add Balance</a>
                        </div>
                    </div></div></div>
                    <!-- end /.dashboard_title_area -->
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="withdraw_module cardify">

                        <form action="{{ route('payment.withdraw') }}" method="post">
                            @csrf

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="modules__title">
                                    <h3>Withdrawal Method</h3>
                                </div>

                                <div class="modules__content">
                                    <p class="subtitle">Select your Payment Method for
                                        <a href="#">Cash out Earnings</a>
                                    </p>
                                    <div class="options">
                                        <div class="custom-radio">
                                            <input type="radio" id="opt2" class="" name="filter_opt" checked>
                                            <label for="opt2">
                                                <span class="circle"></span>bKash</label>
                                        </div>

                                        <div class="custom-radio">
                                            <input type="radio" id="opt3" class="" name="filter_opt">
                                            <label for="opt3">
                                                <span class="circle"></span>Direct to Local Bank (BD) - (Minimum ৳5000)</label>
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
                                            <input type="radio" id="opt4" class="" name="withdrawal_option" value="{{ auth()->user()->profile->balance }}" disabled="disabled">
                                            <label for="opt4">
                                                <span class="circle"></span>Available balance:
                                                <span class="bold">৳{{ auth()->user()->profile->balance }}</span>
                                            </label>
                                        </div>

                                        <div class="custom-radio">
                                            <input type="radio" id="opt5" class="" name="withdrawal_option" value="" disabled>
                                            <label for="opt5">
                                                <span class="circle"></span>Please Enter the withdrawal amount</label>
                                        </div>

                                        <div class="withdraw_amount">
                                            <div class="input-group">
                                                <span class="input-group-addon">৳</span>
                                                <input type="number" id="partial_amount" class="text_field" placeholder="00.00" name="withdrawal_amount" required="required" min="500" max="{{ auth()->user()->profile->balance }}" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="button_wrapper">
                                        <button type="submit" class="btn btn--round btn--md">Submit Cash out</button>
                                        {{--<a href="#" class="btn btn--round btn-sm cancel_btn">Cancel</a>--}}
                                    </div>
                                </div>
                            </div>
                            <!-- end /.col-md-6 -->
                        </div>
                        <!-- end /.row -->
                        </form>

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