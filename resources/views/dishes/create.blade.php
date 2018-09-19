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
                    <div class="container">
                        @include('includes.success_message')
                        @include('includes.error_messeages')
                    </div>
                    <div class="col-lg-8">
                        <form action="{{ route('dishes.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h3>Dish Name & Description</h3>
                                </div>
                                <!-- end /.module_title -->
                                <div class="modules__content">

                                    <div class="form-group">
                                        <label for="dish_category">Select Category</label>
                                        <div class="select-wrap select-wrap2">
                                            <select name="dish_category" id="dish_category" class="text_field">
                                                {{--<option value="" selected>Select Category</option>--}}
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="lnr lnr-chevron-down"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dish_subcategory">Select Sub Category</label>
                                        <div class="select-wrap select-wrap2">
                                            <select name="dish_subcategory" id="dish_subcategory" class="text_field">

                                            </select>
                                            <span class="lnr lnr-chevron-down"></span>
                                        </div>
                                    </div>

                                    <div class="form-group max-length">
                                        <label for="product_name">Dish Name
                                            <span>(Max 50 characters)</span>
                                        </label>
                                        <input name="dish_name" type="text" id="product_name" class="text_field"
                                               placeholder="Enter your product name here..." required maxlength="50"  value="{{ old('dish_name') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="preperation_time">Preperation Time</label>
                                        <div class="select-wrap select-wrap2">
                                            <label for="preparation_time"></label>
                                            <select name="preparation_time" id="preparation_time" class="text_field">
                                                <option value="1" selected>1 Hour</option>
                                                <option value="2">2 Hour</option>
                                                <option value="3">3 Hour</option>
                                                <option value="4">4 Hour</option>
                                            </select>
                                            <span class="lnr lnr-chevron-down"></span>
                                        </div>
                                    </div>


                                    <div class="form-group no-margin max-length">
                                        <p class="label">Product Description</p>
                                        <textarea name="dish_description" rows="10" class="form-control"
                                                  placeholder="min 20 and max 1000 character" id="article-ckeditor"
                                                  maxlength="5000" minlength="2" required  value="{!! old('dish_description') !!}"></textarea>
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
                                                    <input name="dish_price" type="number" id="rlicense"
                                                           class="text_field" placeholder="00.00" required min="10"
                                                           max="9999" value="{!! old('dish_price') !!}">
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
                                    <p class="text-danger">Image Uploading Roles:</p>
                                    <ul class="list-group mb-5">
                                        <li class="list-group-item">Thumbnail and Dish 1 image is required <sup class="text-danger">*</sup> </li>
                                        <li class="list-group-item">Image extension must be .jpg, .jpeg, .png, .svg, .gif or .bmp</li>
                                        {{--<li class="list-group-item">Image minimum dimention: 400x225</li>--}}
                                    </ul>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <div class="upload_wrapper">
                                                    <p>Upload Thumbnail *Required</p>

                                                    <div class="custom_upload">
                                                        <label for="dish_thumbnail1">
                                                            {{-- TODO Resize Image bofore saving on server --}}
                                                            <input type="file" id="dish_thumbnail1" class="files"
                                                                   name="dish_thumbnail" accept=".jpg,.jpeg,.png,.bmp,.svg,.gif" required>
                                                            <span class="btn btn--round btn--sm upload_btn">Choose File</span>
                                                        </label>
                                                    </div>
                                                    <!-- end /.custom_upload -->

                                                    <div class="prof_img_upload aspect_ratio mt-3">
                                                        <img src="{{ route('home') }}/images/cvrplc.jpg"
                                                             alt="Author profile area"
                                                             id="preview_dish_thumbnail" class="ratio_img">
                                                    </div>
                                                </div>
                                                <!-- end /.upload_wrapper -->
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <div class="upload_wrapper">
                                                    <p>Upload 1st Dish Image *Required
                                                    </p>

                                                    <div class="custom_upload">
                                                        <label for="screenshot1">
                                                            <input type="file" id="screenshot1" class="files"
                                                                   name="dish_image_1" accept=".jpg,.jpeg,.png,.bmp,.svg,.gif" required>
                                                            <span class="btn btn--round btn--sm upload_btn">Choose File</span>
                                                        </label>
                                                    </div>
                                                    <!-- end /.custom_upload -->

                                                    <!-- end /.progress_wrapper -->

                                                    {{--<span class="lnr upload_cross lnr-cross"></span>--}}
                                                    <div class="prof_img_upload aspect_ratio mt-3">
                                                        <img src="{{ route('home') }}/images/cvrplc.jpg"
                                                             alt="Author profile area"
                                                             id="preview_screenshot1" class="ratio_img">
                                                    </div>
                                                </div>
                                                <!-- end /.upload_wrapper -->
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <div class="upload_wrapper">
                                                    <p>Upload 2nd Dish Image</p>

                                                    <div class="custom_upload">
                                                        <label for="screenshot2">
                                                            <input type="file" id="screenshot2" class="files"
                                                                   name="dish_image_2" accept=".jpg,.jpeg,.png,.bmp,.svg,.gif">
                                                            <span class="btn btn--round btn--sm upload_btn">Choose File</span>
                                                        </label>
                                                    </div>
                                                    <!-- end /.custom_upload -->


                                                    {{--<!-- end /.progress_wrapper -->--}}

                                                    {{--<span class="lnr upload_cross lnr-cross"></span>--}}
                                                    <div class="prof_img_upload aspect_ratio mt-3">
                                                        <img src="{{ route('home') }}/images/cvrplc.jpg"
                                                             alt="Author profile area"
                                                             id="preview_screenshot2" class="ratio_img">
                                                    </div>
                                                </div>
                                                <!-- end /.upload_wrapper -->
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="form-group">
                                                <div class="upload_wrapper">
                                                    <p>Upload 3rd Dish Image</p>

                                                    <div class="custom_upload">
                                                        <label for="screenshot3">
                                                            <input type="file" id="screenshot3" class="files"
                                                                   name="dish_image_3" accept=".jpg,.jpeg,.png,.bmp,.svg,.gif">
                                                            <span class="btn btn--round btn--sm upload_btn">Choose File</span>
                                                        </label>
                                                    </div>
                                                    <!-- end /.custom_upload -->


                                                    {{--<span class="lnr upload_cross lnr-cross"></span>--}}
                                                    <div class="prof_img_upload aspect_ratio mt-3">
                                                        <img src="{{ route('home') }}/images/cvrplc.jpg"
                                                             alt="Author profile area"
                                                             id="preview_screenshot3" class="ratio_img">
                                                    </div>
                                                </div>
                                                <!-- end /.upload_wrapper -->
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <!-- end /.upload_modules -->
                            <div class="upload_modules with--addons">
                                <div class="modules__title">
                                    <h3>Delivery Service Provider</h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">First Delivery Service</label>
                                                <div class="input-group">
                                                    {{--<input type="number" id="dsp_1" class="text_field"
                                                           placeholder="id of dsp_1" name="dsp_1" min="1">--}}
                                                    <select name="dsp_1" id="" class="form-control">
                                                        <option value="" selected>Select DSP 1</option>
                                                    @foreach($dsp_ids as $id)
                                                            <option value="{{ $id->id }}">Id: {{$id->id }}: {{ $id->service_title }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.col-md-6 -->

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Second Delivery Service</label>
                                                <div class="input-group">
                                                    <select name="dsp_2" id="" class="form-control">
                                                        <option value="" selected>Select DSP 2</option>
                                                        @foreach($dsp_ids as $id)
                                                            <option value="{{ $id->id }}">Id: {{$id->id }}: {{ $id->service_title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.col-md-6 -->

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Third Delivery Service</label>
                                                <div class="input-group">
                                                    <select name="dsp_3" id="" class="form-control">
                                                        <option value="" selected>Select DSP 3</option>
                                                    @foreach($dsp_ids as $id)
                                                            <option value="{{ $id->id }}">Id: {{$id->id }}: {{ $id->service_title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.col-md-6 -->

                                    </div>
                                    <!-- end /.row -->
                                </div>
                                <!-- end /.modules__content -->
                            </div>

                            <div class="upload_modules with--addons">
                                <div class="modules__title">
                                    <h3>Pickers Point</h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">

                                    <!-- end /.row -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pp1">Pickers Point 1</label>
                                                <div class="input-group">
                                                    {{--<input type="number" id="pp1" class="text_field" placeholder="id"--}}
                                                           {{--name="pp1" min="1">--}}
                                                    <select name="pp1" id="" class="form-control">
                                                        <option value="">Select First PickersPoint</option>
                                                        @foreach($pp_ids as $id)
                                                            <option value="{{ $id->id }}">Id: {{$id->id }}: {{ $id->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pp2">Pickers Point 2</label>
                                                <div class="input-group">
                                                    <select name="pp2" id="" class="form-control">
                                                        <option value="">Select Second PickersPoint</option>
                                                        @foreach($pp_ids as $id)
                                                            <option value="{{ $id->id }}">Id: {{$id->id }}: {{ $id->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pp3">Pickers Point 3</label>
                                                <div class="input-group">
                                                    <select name="pp3" id="" class="form-control">
                                                        <option value="">Select Third PickersPoint</option>
                                                        @foreach($pp_ids as $id)
                                                            <option value="{{ $id->id }}">Id: {{$id->id }}: {{ $id->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end /.row -->
                                </div>
                                <!-- end /.modules__content -->
                            </div>

                        {{--<div class="upload_modules">
                          <div class="modules__title">
                            <h3>Searching Tags</h3>
                          </div>
                          <!-- end /.module_title -->

                          <div class="modules__content">

                            <div class="form-group">
                              <label for="tags">Dish Tags
                                <span>(Max 10 tags)</span>
                              </label>
                              <textarea name="item_tags" id="tags" class="text_field"
                                        placeholder="Enter your item tags here..."></textarea>
                            </div>
                          </div>
                          <!-- end /.upload_modules -->
                        </div>--}}
                        <!-- end /.upload_modules -->
                            <button type="submit" class="btn btn--round btn--fullwidth btn--lg" id="submit_dish">Submit Your Item for
                                Review
                            </button>
                        </form>
                    </div>
                    <!-- end /.col-md-8 -->

                    <div class="col-lg-4">
                        <aside class="sidebar upload_sidebar">
                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>Quick Upload Rules</h3>
                                </div>

                                <div class="card_content">
                                    <div class="card_info">
                                        <h4>Image Upload</h4>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut
                                            sceleris que the
                                            mattis interdum.</p>
                                    </div>

                                    <div class="card_info">
                                        <h4>File Upload</h4>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut
                                            sceleris que the
                                            mattis interdum.</p>
                                    </div>

                                    <div class="card_info">
                                        <h4>Vector Upload</h4>
                                        <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut
                                            sceleris que the
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
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceler
                                        isque the mattis, leo
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
                                    <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceler
                                        isque the mattis, leo
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

<div id="snackbar"></div>

@endsection

@push('scripts-footer-bottom')
    <script type="text/javascript">
        $('#snackbar').css('z-index', '99999');

        function snackbar($msg) {
            $('#snackbar').html($msg);
            $('#snackbar').toggleClass('show');
            setTimeout(function () {
                $('#snackbar').removeClass('show');
            }, 1600);
        }

        $('#submit_dish').on('click', function (e) {
            var ti = $('#dish_thumbnail1').val();
            var di1 = $('#screenshot1').val();
            // var des = $('#dish_description').val();
            console.log("ti: " + ti);
            console.log("di1: " + di1);
            if(!ti) {
                $('html, body').animate({
                    scrollTop: $("#preview_dish_thumbnail").offset().top-150
                }, 700);
                snackbar("Thumbnail Image is required");
            }
            if(!di1) {
                $('html, body').animate({
                    scrollTop: $("#preview_screenshot1").offset().top-150
                }, 700);
                snackbar("Dish Image 1 is required");
            }
            /*if(!des) {
                $('html, body').animate({
                    scrollTop: $(".form-group.no-margin.max-length .label").offset().top-150
                }, 700);
                snackbar(" Description Field Can not be empty");
            }*/
        });

    </script>

    @endpush