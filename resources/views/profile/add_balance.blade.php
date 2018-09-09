@extends ('layouts.master') @section ('title', 'Add Balance') @section ('content')

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
                        <div class="dashboard_title_area">
                            <div class="dashboard__title">
                                <h3>Add Balance</h3>
                            </div>
                        </div>
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <form action="#" name="add_credit_form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="credit_modules">
                                <div class="modules__title">
                                    <h3>Add Balance From KhaniDaani Card</h3>
                                </div>

                                <div class="modules__content">
                                    <p class="subtitle">Select Card amount:</p>
                                    <div class="amounts">
                                        <ul>
                                            <li data-price="10">
                                                <p>৳200</p>
                                            </li>
                                            <li data-price="20">
                                                <p>৳300</p>
                                            </li>
                                            <li data-price="50">
                                                <p>৳500</p>
                                            </li>
                                            <li data-price="100">
                                                <p>৳1000</p>
                                            </li>
                                            <li data-price="500">
                                                <p>৳2000</p>
                                            </li>
                                        </ul>
                                        <input type="hidden" class="selected_price">
                                    </div>
                                    <p class="subtitle">Enter Card Number:</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="number" id="cardnmbr" class="text_field" placeholder="910606109895" name="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn--round btn--default">Submit Card Number</button>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="or"></div>


                                    <p class="subtitle">bKash:</p>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="custom_amount">
                                                <div class="input-group">
                                                    <span class="input-group-addon">৳</span>
                                                    <input type="text" id="rlicense" class="text_field" placeholder="eg: 250">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="number" id="cardnmbr" class="text_field" placeholder="TX25019687" name="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn--round btn--default">Submit</button>
                                    </div>



                                </div>
                                <!-- end /.modules__content -->
                            </div>
                            <!-- end /.credit_modules -->
                        </div>
                        <!-- end /.col-md-12 -->
                    </div>
                    <!-- end /.row -->
                </form>
        </div>
        </div>

    </section>




@endsection