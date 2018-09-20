@extends ('layouts.master') @section ('title', 'Add Delivery Service') @section ('content')

    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                    </div>
                    <h1 class="page-title">Add Delivery Service</h1>
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
        @include('includes.error_messeages')

        <div class="dashboard_contents">
            <div class="container">
                @include('includes.success_message')
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <form action="{{ route('delivery.AddService') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h3>Service Detail</h3>
                                </div>
                                <!-- end /.module_title -->
                                <div class="modules__content">

                                    <div class="form-group">
                                        <label for="product_name">Service Title
                                            <span>(Max 100 characters)</span>
                                        </label>
                                        <input name="service_title" type="text" id="product_name" class="text_field"
                                               placeholder="Enter your service name title">
                                    </div>

                                    <div class="form-group no-margin">
                                        <label for="product_name">Service Description
                                            <span>(Describe Everything in detail)</span>
                                        </label>
                                        <textarea name="service_description" rows="10" class="form-control"
                                                  placeholder="max 1000 character" id="article-ckeditor"></textarea>
                                    </div>
                                </div>

                                <div class="modules__content">
                                    <div class="form-group">
                                        <label for="tags">Service Area
                                            <span>(Max 10 Area)</span>
                                        </label>
                                        <textarea name="service_area" id="tags" class="text_field" placeholder="eg. Shibgonj, Uposohor etc."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="upload_modules with--addons">
                                <div class="modules__title">
                                    <h3>Service Hours</h3><span>(available time)</span>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Starting time</label>
                                                <div class="input-group">
                                                    <input type="time" name="service_hours_start" id="rlicense" class="text_field"
                                                           placeholder="Start Time">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.col-md-6 -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">End time</label>
                                                <div class="input-group">
                                                    <input type="time" id="exlicense" class="text_field"
                                                           placeholder="End Time" name="service_hours_end">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.col-md-6 -->

                                    </div>
                                    <!-- end /.row -->
                                </div>
                                <!-- end /.modules__content -->
                            </div>

                            <div class="upload_modules">
                                <a class="toggle_title" href="#collapse2" role="button" data-toggle="collapse"
                                   aria-expanded="false" aria-controls="collapse2">
                                    <h4>Price & Delivery time
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set toggle_module collapse show" id="collapse2">
                                    <div class="modules__content">

                                        <div class="form-group">
                                            <label for="">Servcie Charge <span>(In taka)</span></label>
                                            <div class="input-group">
                                                <input name="service_charge" type="number" id="rlicense"
                                                       class="text_field" value="৳500">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="preperation_time">Min Delivery Time<span> (In Hour)</span></label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="min_delivery_time" id="preperation_time"
                                                        class="text_field">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="5">5</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="preperation_time">Max Delivery Time <span> (In Hour)</span></label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="max_delivery_time" id="preperation_time"
                                                        class="text_field">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
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
                        <!-- end /.sidebar -->
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