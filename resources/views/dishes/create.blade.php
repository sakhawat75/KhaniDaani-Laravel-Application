@extends ('layouts.master') @section ('title', 'Create New Dish') @section ('content')

    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Add Dish For Sale</h1>
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
                                        <label for="dish_category">Select Category </label> <span>*</span>
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
                                        <label for="dish_subcategory">Select Sub Category <span>*</span> </label>
                                        <div class="select-wrap select-wrap2">
                                            <select name="dish_subcategory" id="dish_subcategory" class="text_field">

                                            </select>
                                            <span class="lnr lnr-chevron-down"></span>
                                        </div>
                                    </div>

                                    <div class="form-group max-length">
                                        <label for="product_name">Dish Name <span>*</span>
                                            <span>(Max 50 characters)</span>
                                        </label>
                                        <input name="dish_name" type="text" id="product_name" class="text_field"
                                               placeholder="Enter your product name here..." required maxlength="50"  value="{{ old('dish_name') }}">
                                    </div>

                                    <div class="form-group no-margin max-length">
                                        <p class="label">Dish Detail Info</p> <span>*</span>
                                        <textarea name="dish_description" rows="10" class="form-control"
                                                  placeholder="min 20 and max 1000 character" id="article-ckeditor"
                                                  maxlength="5000" minlength="2" required  value="{!! old('dish_description') !!}"></textarea>
                                    </div>
                                    <div class="form-group">
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
                                    <div class="form-group">
                                        <label for="preperation_time">Dish Price (In Taka) ৳</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"> </span>
                                            <input name="dish_price" type="number" id="rlicense"
                                                   class="text_field" placeholder="350" required min="10"
                                                   max="9999" value="{!! old('dish_price') !!}">
                                        </div>
                                    </div>
                                </div>
                                <!-- end /.modules__content -->
                            </div>
                            <!-- end /.upload_modules -->



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
                                    <h3>Pick-up Point</h3>
                                </div>
                                <!-- end /.module_title -->

                                <div class="modules__content">

                                    <!-- end /.row -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pp1">Pick-up Point 1</label>
                                                <div class="input-group">
                                                    {{--<input type="number" id="pp1" class="text_field" placeholder="id"--}}
                                                           {{--name="pp1" min="1">--}}
                                                    <select name="pp1" id="" class="form-control">
                                                        <option value="">Select First Pick-up Point</option>
                                                        @foreach($pp_ids as $id)
                                                            <option value="{{ $id->id }}">Id: {{$id->id }}: {{ $id->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pp2">Pick-up Point 2</label>
                                                <div class="input-group">
                                                    <select name="pp2" id="" class="form-control">
                                                        <option value="">Select Second Pick-up Point</option>
                                                        @foreach($pp_ids as $id)
                                                            <option value="{{ $id->id }}">Id: {{$id->id }}: {{ $id->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pp3">Pick-up Point 3</label>
                                                <div class="input-group">
                                                    <select name="pp3" id="" class="form-control">
                                                        <option value="">Select Third Pick-up Point</option>
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
                        <aside class="sidebar upload_sidebar s-hide">
                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>Detail Help</h3>
                                </div>

                                <div class="card_content">
                                    <div class="card_info">
                                        <h4>Category & Subcategory</h4>
                                        <p>Select a category and subcategory related to you dish name.Those are mendatory for adding dishes.</p>
                                    </div>


                                    <div class="card_info">
                                        <h4>Name & Price</h4>
                                        <p>Add attractive dish name, also use common name so it's can found easily from search. </p>
                                        <p>Add detail info about the dish adn it's ingrediant</p>
                                    </div>

                                    <div class="card_info">
                                        <h4>Preparation time</h4>
                                        <p>Add your desire preparation time in hour, remember once you recived the order your promise to deliver it within this time.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.sidebar-card -->

                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>Trouble Uploading?</h3>
                                </div>

                                <div class="card_content">
                                    <p>Follow the upload rules.</p>
                                    <ul>
                                        <li>Thumbnail and Dish 1 image is required *</li>
                                        <li>Image extension must be .jpg, .jpeg, .png, .svg, .gif or .bmp</li>
                                        <li>2nd and 3rd image are optional but it's better to upload</li>
                                        <li>Add clean an real images</li>
                                        <li>Copyrighted or internet dish  image will be removed</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end /.sidebar-card -->

                            <div class="sidebar-card">
                                <div class="card-title">
                                    <h3>Selecting Services</h3>
                                </div>

                                <div class="card_content">
                                    <p>You will must have to select one delivery or pick-up point.</p>
                                    <ul>
                                        <li>You can find deliverer detail From <a href="{{route('search.dsp')}}">Search page</a></li>
                                        <li>Also, for Pick-up point there is pickup point <a href="{{route('search.pp')}}">searching </a></li>
                                        <li>The list will be here from your city.</li>
                                        <li>Choose best one near to you.</li>
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