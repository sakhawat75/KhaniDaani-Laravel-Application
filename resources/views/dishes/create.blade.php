@extends ('layouts.master') @section ('title', 'Create New Dish') @section ('content')

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
                            <a href="#">Upload Item</a>
                        </li>
                    </ul>
                </div>
                <h1 class="page-title">Upload Item</h1>
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
                <div class="col-md-12">
                    <div class="dashboard_title_area">
                        <div class="pull-left">
                            <div class="dashboard__title">
                                <h3>Upload Your Dish</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->

            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <form action="#">
                        <div class="upload_modules">
                            <div class="modules__title">
                                <h3>Dish Name & Description</h3>
                            </div>
                            <!-- end /.module_title -->
                            <div class="modules__content">

                                <div class="form-group">
                                    <label for="category">Select Category</label>
                                    <div class="select-wrap select-wrap2">
                                        <select name="country" id="category" class="text_field">
                                                <option value="">Pizza</option>
                                                <option value="">Pasta</option>
                                            </select>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category">Select Sub Category</label>
                                    <div class="select-wrap select-wrap2">
                                        <select name="country" id="category" class="text_field">
                                                <option value="">Vegitable</option>
                                                <option value="">Maxican</option>
                                            </select>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="product_name">Dish Name
                                            <span>(Max 100 characters)</span>
                                        </label>
                                    <input type="text" id="product_name" class="text_field" placeholder="Enter your product name here...">
                                </div>
                                
                                <div class="form-group">
                                    <label for="category">Preperation Time</label>
                                    <div class="select-wrap select-wrap2">
                                        <select name="country" id="category" class="text_field">
                                                <option value="">1 Houre</option>
                                                <option value="">2 Houre</option>
                                            </select>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>


                                <div class="form-group no-margin">
                                    <p class="label">Product Description</p>
                                    <div id="trumbowyg-demo"></div>
                                </div>
                            </div>
                            <!-- end /.modules__content -->
                        </div>
                        <!-- end /.upload_modules -->

                        <div class="upload_modules with--addons">
                            <div class="modules__title">
                                <h3>Dish Price</h3>
                            </div>
                            <!-- end /.module_title -->

                            <div class="modules__content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon">৳</span>
                                                <input type="text" id="rlicense" class="text_field" placeholder="00.00">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="upload_modules module--upload">
                            <div class="modules__title">
                                <h3>Upload Files</h3>
                            </div>
                            <!-- end /.module_title -->

                            <div class="modules__content">
                                <div class="form-group">
                                    <div class="upload_wrapper">
                                        <p>Upload Thumbnail
                                            <span>(JPEG or PNG 100x100px)</span>
                                        </p>

                                        <div class="custom_upload">
                                            <label for="thumbnail">
                                                    <input type="file" id="thumbnail" class="files">
                                                    <span class="btn btn--round btn--sm">Choose File</span>
                                                </label>
                                        </div>
                                        <!-- end /.custom_upload -->

                                        <div class="progress_wrapper">
                                            <div class="labels clearfix">
                                                <p>Thumbnail.jpg</p>
                                                <span data-width="89">89%</span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 89%;">
                                                    <span class="sr-only">70% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.progress_wrapper -->

                                        <span class="lnr upload_cross lnr-cross"></span>
                                    </div>
                                    <!-- end /.upload_wrapper -->
                                </div>
                                <!-- end /.form-group -->

                                <div class="form-group">
                                    <div class="upload_wrapper">
                                        <p>Upload 1st Dish Image
                                            <span>(JPG or PNG)</span>
                                        </p>

                                        <div class="custom_upload">
                                            <label for="screenshot">
                                                    <input type="file" id="screenshot" class="files">
                                                    <span class="btn btn--round btn--sm">Choose File</span>
                                                </label>
                                        </div>
                                        <!-- end /.custom_upload -->

                                        <div class="progress_wrapper">
                                            <div class="labels clearfix">
                                                <p>Thumbnail.jpg</p>
                                                <span data-width="78">78%</span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 78%;">
                                                    <span class="sr-only">78% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.progress_wrapper -->

                                        <span class="lnr upload_cross lnr-cross"></span>
                                    </div>
                                    <!-- end /.upload_wrapper -->
                                </div>

                                <div class="form-group">
                                    <div class="upload_wrapper">
                                        <p>Upload 2nd Dish Image
                                            <span>(JPG or PNG)</span>
                                        </p>

                                        <div class="custom_upload">
                                            <label for="screenshot">
                                                    <input type="file" id="screenshot" class="files">
                                                    <span class="btn btn--round btn--sm">Choose File</span>
                                                </label>
                                        </div>
                                        <!-- end /.custom_upload -->

                                        <div class="progress_wrapper">
                                            <div class="labels clearfix">
                                                <p>Thumbnail.jpg</p>
                                                <span data-width="78">78%</span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 78%;">
                                                    <span class="sr-only">78% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.progress_wrapper -->

                                        <span class="lnr upload_cross lnr-cross"></span>
                                    </div>
                                    <!-- end /.upload_wrapper -->
                                </div>

                                <div class="form-group">
                                    <div class="upload_wrapper">
                                        <p>Upload 3rd Dish Image
                                            <span>(JPG or PNG)</span>
                                        </p>

                                        <div class="custom_upload">
                                            <label for="screenshot">
                                                    <input type="file" id="screenshot" class="files">
                                                    <span class="btn btn--round btn--sm">Choose File</span>
                                                </label>
                                        </div>
                                        <!-- end /.custom_upload -->

                                        <div class="progress_wrapper">
                                            <div class="labels clearfix">
                                                <p>Thumbnail.jpg</p>
                                                <span data-width="78">78%</span>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 78%;">
                                                    <span class="sr-only">78% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.progress_wrapper -->

                                        <span class="lnr upload_cross lnr-cross"></span>
                                    </div>
                                    <!-- end /.upload_wrapper -->
                                </div>
                            </div>
                        </div>
                        
                        <!-- end /.upload_modules -->

                        <div class="upload_modules">
                            <div class="modules__title">
                                <h3>Others Information</h3>
                            </div>
                            <!-- end /.module_title -->

                            <div class="modules__content">

                                <div class="form-group">
                                    <label for="tags">Item Tags
                                            <span>(Max 10 tags)</span>
                                        </label>
                                    <textarea name="tags" id="tags" class="text_field" placeholder="Enter your item tags here..."></textarea>
                                </div>
                            </div>
                            <!-- end /.upload_modules -->
                        </div>
                        <!-- end /.upload_modules -->
                        <button type="submit" class="btn btn--round btn--fullwidth btn--lg">Submit Your Item for Review</button>
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
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut sceleris que the mattis interdum.</p>
                                </div>

                                <div class="card_info">
                                    <h4>File Upload</h4>
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut sceleris que the mattis interdum.</p>
                                </div>

                                <div class="card_info">
                                    <h4>Vector Upload</h4>
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut sceleris que the mattis interdum.</p>
                                </div>
                            </div>
                        </div>
                        <!-- end /.sidebar-card -->

                        <div class="sidebar-card">
                            <div class="card-title">
                                <h3>Trouble Uploading?</h3>
                            </div>

                            <div class="card_content">
                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceler isque the mattis, leo quam aliquet congue.</p>
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
                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceler isque the mattis, leo quam aliquet congue.</p>
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