@extends ('layouts.master') @section ('title', 'Add Balance') @section ('content')

    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Add Balance in advance</h1> </div>
            </div>
        </div>
    </section>

    <section class="dashboard-area">
        @include('includes.menu-dashboard')


        <div class="dashboard_contents">
            <div class="container">
                <form action="{{ route('payment.add_balance') }}" name="add_credit_form" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            @include('includes.error_messeages')
                            @include('includes.success_message')
                            <div class="credit_modules">
                                <div class="modules__title">
                                    <h3>Add Balance From bKash to KhaniDaani Balance</h3>
                                </div>

                                <div class="modules__content">
                                    {{--<p class="subtitle">Select Card amount:</p>
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
--}}


                                    <div class="row">
                                        <div class="col-md-4 mg-bt">
                                            <p class="subtitle">bKash amount:</p>
                                            <div class="custom_amount">
                                                <div class="input-group">
                                                    <span class="input-group-addon">৳</span>
                                                    <input type="number" id="rlicense" class="text_field" placeholder="eg. 500" name="amount" min="100" max="2000" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="subtitle no-margin">bKash Transaction Id:</p>
                                            <div class="form-group max-length">
                                                <div class="input-group">
                                                    <input type="text" id="cardnmbr" class="text_field" placeholder="e.g TX25019687" name="t_id" maxlength="10" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn--round btn--default">Recharge</button>
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