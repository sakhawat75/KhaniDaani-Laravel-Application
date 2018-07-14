@extends ('layouts.master') @section ('title', 'Add Delivery Service') @section ('content')

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

        <div class="dashboard_contents">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h3>Add Delivery Service Detail</h3>
                                </div>
                                <!-- end /.module_title -->
                                <div class="modules__content">

                                    <div class="form-group">
                                        <label for="product_name">Service Title
                                            <span>(Max 100 characters)</span>
                                        </label>
                                        <input name="dish_name" type="text" id="product_name" class="text_field"
                                               placeholder="Enter your product name here...">
                                    </div>

                                    <div class="form-group no-margin">
                                        <label for="product_name">Service Description
                                            <span>(Describe Everything in detail)</span>
                                        </label>
                                        <textarea name="dish_description" rows="10" class="form-control"
                                                  placeholder="max 1000 character" id="article-ckeditor"></textarea>
                                    </div>
                                </div>

                                <div class="modules__content">
                                    <div class="form-group">
                                        <label for="tags">Service Area
                                            <span>(Max 10 Area)</span>
                                        </label>
                                        <textarea name="item_tags" id="tags" class="text_field" placeholder="Now input just one area as string"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="upload_modules with--addons">
                                <div class="modules__title">
                                    <h3>Service Houre</h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" id="rlicense" class="text_field"
                                                           placeholder="Start Time">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.col-md-6 -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" id="exlicense" class="text_field"
                                                           placeholder="End Time">
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
                                    <h4>Service Pricing & Timing
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set toggle_module collapse show" id="collapse2">
                                    <div class="modules__content">

                                        <div class="form-group">
                                            <label for="">Servcie Charge <span>(In taka)</span></label>
                                            <div class="input-group">
                                                <input name="dish_price" type="text" id="rlicense"
                                                       class="text_field" value="৳500">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="preperation_time">Min Delivery Time<span> (In Hour)</span></label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="preparation_time" id="preperation_time"
                                                        class="text_field">
                                                    <option value="">1</option>
                                                    <option value="1 Hour">2</option>
                                                    <option value="2 Hour">3</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="preperation_time">Max Delivery Time <span> (In Hour)</span></label>
                                            <div class="select-wrap select-wrap2">
                                                <select name="preparation_time" id="preperation_time"
                                                        class="text_field">
                                                    <option value="">1</option>
                                                    <option value="1 Hour">2</option>
                                                    <option value="2 Hour">3</option>
                                                </select>
                                                <span class="lnr lnr-chevron-down"></span>
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