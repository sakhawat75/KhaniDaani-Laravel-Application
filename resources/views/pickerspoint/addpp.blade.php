@extends ('layouts.master') @section ('title', 'Add Pickers Point') @section ('content')

    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Add pick up point</h1>
                    <p class="text-white">Note: All of the field are mandatory</p>
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
        @include( 'includes.menu-dashboard' )


        <div class="dashboard_contents">
            <div class="container">
                @include('includes.error_messeages')
                @include('includes.success_message')
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <form action="{{ route('pickerspoint.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h3>Add Pick Up Point Detail</h3>
                                </div>
                                <!-- end /.module_title -->
                                <div class="modules__content">

                                    <div class="form-group max-length">
                                        <label for="shop_name">Shop Name
                                            <span> (Max 50 characters) </span>
                                        </label>
                                        <input name="name" type="text" id="shop_name" class="text_field"
                                               placeholder="Enter your Shop name here..." maxlength = "50" required>

                                    </div>
                                    <div class="form-group max-length">
                                        <label for="shop_type">Shop Type
                                            <span> (eg. Departmental Store )</span>
                                        </label>
                                        <input name="type" type="text" id="shop_type" class="text_field"
                                               placeholder="Enter your Shop Type here..."  maxlength = "20" required>
                                    </div>

                                    {{-- <div class="form-group no-margin">
                                         <label for="product_name">Service Description
                                             <span>(Describe Everything in detail)</span>
                                         </label>
                                         <textarea name="service_description" rows="10" class="form-control"
                                                   placeholder="max 1000 character" id="article-ckeditor"></textarea>
                                     </div>--}}
                                </div>

                            </div>

                            <div class="upload_modules with--addons">
                                <div class="modules__title">
                                    <h3>Open Hours & Charge</h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label for="sh_start">Open Time</label>
                                                    <input type="time" name="open_at" id="sh_start"
                                                           class="text_field"
                                                           placeholder="Start Time" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.col-md-6 -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label for="sh_close">Close Time</label>
                                                    <input type="time" id="sh_close" class="text_field"
                                                           placeholder="End Time" name="close_at" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.col-md-6 -->

                                    </div>
                                    <!-- end /.row -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="service_charge">Service Charge <span>(Within 10-50 taka)</span>
                                                </label>
                                                {{--<input name="charge" type="number" id="service_charge" class="text_field"
                                                       placeholder="10-50" min="10" max="50" required>--}}
                                                <select name="charge" id="service_charge" class="form-control">
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="25">25</option>
                                                    <option value="30">30</option>
                                                    <option value="35">35</option>
                                                    <option value="40">40</option>
                                                    <option value="45">45</option>
                                                    <option value="50">50</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end /.modules__content -->
                            </div>

                            <div class="upload_modules">
                                <a class="toggle_title" href="#collapse2" role="button" data-toggle="collapse"
                                   aria-expanded="false" aria-controls="collapse2">
                                    <h4>Contacts
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set toggle_module collapse show" id="collapse2">
                                    <div class="modules__content">

                                        <div class="form-group max-length">
                                            <label for="full_address">Full Address</label>
                                            <div class="input-group">
                                                <textarea name="address" id="full_address"
                                                       class="text_field"
                                                          placeholder="Holding NO:1098,Main Road-1, Block-E, Shahjalal Uposhohor, Sylhet."  maxlength = "100" required>{{ $profile->address }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group max-length">
                                            <label for="address_hint">Address Hint (Optional)</label>
                                            <div class="input-group">
                                                <input name="address_hint" type="text" id="address_hint"
                                                       class="text_field" placeholder="Near Brack Bank"  maxlength = "50" required value="{{ $profile->address_hint }}">
                                            </div>
                                        </div>

                                        <div class="form-group max-length">
                                            <label for="phone_number">Phone No</label>
                                            <div class="input-group">
                                                <input name="phone" type="tel" id="phone_number"
                                                       class="text_field" placeholder="01711966966"  maxlength = "11" required value="{{ $profile->mobile_no }}">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end /.modules__content -->
                                </div>
                            </div>
                            <!-- end /.upload_modules -->


                            <button type="submit" class="btn btn--round btn--fullwidth btn--lg">Submit
                            </button>
                        </form>
                    </div>
                    <!-- end /.col-md-8 -->

                    <div class="col-lg-4 col-md-5">
                        <aside class="sidebar upload_sidebar s-hide">
                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>Detail Help</h3>
                                </div>

                                <div class="card_content">
                                    <div class="card_info">
                                        <h4>Name & Description</h4>
                                        <p>Add your service name, also use common name so it's can found easily from search. Also, add detail info about the services</p>
                                    </div>

                                    <div class="card_info">
                                        <h4>Service Area</h4>
                                        <p>Define your area of services so chef can know that if your good for his/her dishes.</p>
                                    </div>

                                    <div class="card_info">
                                        <h4>Service Hours</h4>
                                        <p>When you can work for the deliver? If your professional deliverer select your office time</p>
                                        <p>If your a freelance deliverer add your available time.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.sidebar-card -->

                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>Price & Delivery time</h3>
                                </div>

                                <div class="card_content">
                                    <p>Note: You will have to deliver the dish before it's maximum time.</p>
                                    <ul>
                                        <li>Servcie Charge: For how much you will deliver the dish to your defined service area</li>
                                        <li>Min Delivery Time: Minimum time of the deliver</li>
                                        <li>Max Delivery Time: Maximum time of the delivery</li>
                                    </ul>

                                </div>
                            </div>
                            <!-- end /.sidebar-card -->
                        </aside>

                    </div>
                    <!-- end /.col-md-4 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>
    <!--================================
                    END DASHBOARD AREA
            =================================-->

@endsection