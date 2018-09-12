@extends ('layouts.master') @section ('title', 'Add Pickers Point') @section ('content')

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
                            <li>
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <a href="#">Add Delivery Service</a>
                            </li>
                        </ul>
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
        @include('includes.messeages')

        <div class="dashboard_contents">
            <div class="container">
                @include('includes.success_message')
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <form action="{{ route('delivery.AddService') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h3>Add Pickers Point Detail</h3>
                                </div>
                                <!-- end /.module_title -->
                                <div class="modules__content">

                                    <div class="form-group">
                                        <label for="product_name">Shop Name
                                            <span>(Max 50 characters)</span>
                                        </label>
                                        <input name="service_title" type="text" id="product_name" class="text_field"
                                               placeholder="Enter your product name here...">
                                    </div>
                                    <div class="form-group">
                                        <label for="product_name">Shop Type
                                            <span>(eg. Departmental Store )</span>
                                        </label>
                                        <input name="service_title" type="text" id="product_name" class="text_field"
                                               placeholder="Enter your product name here...">
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
                                                    <input type="time" name="service_hours_start" id="rlicense" class="text_field"
                                                           placeholder="Start Time">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.col-md-6 -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="time" id="exlicense" class="text_field"
                                                           placeholder="End Time" name="service_hours_end">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.col-md-6 -->

                                    </div>
                                    <!-- end /.row -->

                                    <div class="form-group">
                                        <label for="product_name">Servcie Charge <span>(In taka)</span>
                                        </label>
                                        <input name="service_title" type="text" id="product_name" class="text_field"
                                               placeholder="10-50">
                                    </div>
                                </div>
                                <!-- end /.modules__content -->
                            </div>

                            Note: Fetch below information from profile setting also allow them edit if it's needed.

                            <div class="upload_modules">
                                <a class="toggle_title" href="#collapse2" role="button" data-toggle="collapse"
                                   aria-expanded="false" aria-controls="collapse2">
                                    <h4>Contacts
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set toggle_module collapse show" id="collapse2">
                                    <div class="modules__content">

                                        <div class="form-group">
                                            <label for="">Full Address One*</label>
                                            <div class="input-group">
                                                <input name="service_charge" type="number" id="rlicense"
                                                       class="text_field" placeholder="77128 Amber FlatsCormierfurt, NV 26057-0467">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Adress Hint</label>
                                            <div class="input-group">
                                                <input name="service_charge" type="number" id="rlicense"
                                                       class="text_field" placeholder="Amelia Station">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Phone No</label>
                                            <div class="input-group">
                                                <input name="service_charge" type="number" id="rlicense"
                                                       class="text_field" placeholder="01711966966">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end /.modules__content -->
                                </div>
                            </div>
                            <!-- end /.upload_modules -->




                            <button type="submit" class="btn btn--round btn--fullwidth btn--lg">Submit Your Item for
                                Review
                            </button>
                        </form>
                    </div>
                    <!-- end /.col-md-8 -->

                    <div class="col-lg-4 col-md-5">
                        <aside class="sidebar upload_sidebar">
                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>Quick Upload Rules</h3>
                                </div>

                                <div class="card_content">
                                    <div class="card_info">
                                        <h4>Image Upload</h4>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut sceleris que the
                                            mattis interdum.</p>
                                    </div>

                                    <div class="card_info">
                                        <h4>File Upload</h4>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut sceleris que the
                                            mattis interdum.</p>
                                    </div>

                                    <div class="card_info">
                                        <h4>Vector Upload</h4>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut sceleris que the
                                            mattis interdum.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.sidebar-card -->

                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>Trouble Uploading?</h3>
                                </div>

                                <div class="card_content">
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceler isque the mattis, leo
                                        quam aliquet congue.</p>
                                    <ul>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end /.sidebar-card -->

                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>More Upload Info</h3>
                                </div>

                                <div class="card_content">
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceler isque the mattis, leo
                                        quam aliquet congue.</p>
                                    <ul>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                                        <li>Consectetur elit, sed do eiusmod the</li>
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