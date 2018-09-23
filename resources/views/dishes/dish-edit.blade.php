@extends ('layouts.master')

@section ('title', 'Update Your Dishes or  Recipies! Attract Foodies') @section ('content')
  <!--================================
        START BREADCRUMB AREA
    =================================-->
  <section class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="page-title">Update Dish content</h1>
          <div class="breadcrumb">
            <ul>

              <li class="active">
               <p class="text-white"> <b>Note:</b> Just make changes, you can skip all without current changes</p>
              </li>
            </ul>
          </div>

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
        @include('includes.success_message')
        @include('includes.error_messeages')
        <div class="row">
          <div class="col-lg-8">
            <form action="{{ route('dishes.update', ['id' => $dish]) }}" method="post"
                  enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="upload_modules">
                <a class="toggle_title" href="#collapse2" role="button" data-toggle="collapse"
                   aria-expanded="false" aria-controls="collapse2">
                  <h4>Edit Dish Name & Description
                    <span class="lnr lnr-chevron-down"></span>
                  </h4>
                </a>

                <div class="information__set toggle_module collapse show" id="collapse2">
                  <div class="modules__content">
                    <div class="form-group">
                      <label for="category">Edit Category</label>
                      <div class="select-wrap select-wrap2">
                        <select name="dish_category" id="dish_category" class="text_field">
                          <option value="{{ $dish->dish_category }}">{{ $dish->dish_category }}</option>
                          @foreach($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                        <span class="lnr lnr-chevron-down"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="category">Edit Sub Category</label>
                      <div class="select-wrap select-wrap2">
                        <select name="dish_subcategory" id="dish_subcategory" class="text_field">
                          <option value="{{ $dish->dish_subcategory }}">{{ $dish->dish_subcategory }}</option>
                        </select>

                        <span class="lnr lnr-chevron-down"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="product_name">Edit Dish Name
                        <span>(Max 100 characters)</span>
                      </label>
                      <input name="dish_name" type="text" id="product_name" class="text_field"
                             value="{{ $dish->dish_name }}">
                    </div>

                    <div class="form-group">
                      <label for="preperation_time">Edit Preperation Time</label>
                      <div class="select-wrap select-wrap2">
                        <select name="preparation_time" id="preperation_time"
                                class="text_field">
                          <option value="{{ $dish->preparation_time }}">{{ $dish->preparation_time }} Hour</option>
                          <option value="1">1 Hour</option>
                          <option value="2">2 Hour</option>
                          <option value="3">3 Hour</option>
                          <option value="4">4 Hour</option>
                        </select>
                        <span class="lnr lnr-chevron-down"></span>
                      </div>
                    </div>

                    <div class="form-group no-margin">
                      <p class="label">Edit Product Description</p>
                      <textarea name="dish_description" rows="10"
                                class="form-control" id="article-ckeditor">{!! $dish->dish_description !!}</textarea>
                    </div>
                  </div>
                  <!-- end /.modules__content -->
                </div>
              </div>
              <!-- end /.upload_modules -->


              <div class="upload_modules">
                <a class="toggle_title" href="#collapse5" role="button" data-toggle="collapse"
                   aria-expanded="false" aria-controls="collapse5">
                  <h4>Edit Dish Price
                    <span class="lnr lnr-chevron-down"></span>
                  </h4>
                </a>

                <div class="information__set toggle_module collapse" id="collapse5">

                  <div class="upload_modules with--addons">
                    <!-- end /.module_title -->

                    <div class="modules__content">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon">৳</span>
                              <input name="dish_price" type="text" id="rlicense"
                                     class="text_field" value="{{ $dish->dish_price }}">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end /.upload_modules -->
              </div>

              <div class="modules__content">
                <p class="text-danger">Image Uploading Roles:</p>
                <ul class="list-group mb-5">
                  {{--<li class="list-group-item">Thumbnail and Dish 1 image is required <sup class="text-danger">*</sup> </li>--}}
                  <li class="list-group-item">Image extension must be .jpg, .jpeg, .png, .svg, .gif or .bmp</li>
                  {{--<li class="list-group-item">Image minimum dimention: 400x225</li>--}}
                </ul>

                <div class="row">
                  <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                      <div class="upload_wrapper">
                        <p>Change Thumbnail Image</p>

                        <div class="custom_upload">
                          <label for="dish_thumbnail1">
                            <input type="file" id="dish_thumbnail1" class="files"
                                   name="dish_thumbnail" accept=".jpg,.jpeg,.png,.bmp,.svg,.gif">
                            <span class="btn btn--round btn--sm upload_btn">Choose File</span>
                          </label>
                        </div>
                        <!-- end /.custom_upload -->

                        <div class="prof_img_upload aspect_ratio mt-3">
                          <img
                                  @if ($dish->dish_thumbnail)
                                  src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_thumbnail }}"
                                  @else
                                  src="{{ route('home') }}/images/cvrplc.jpg"
                                  @endif
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
                        <p>Change 1st Dish Image
                        </p>

                        <div class="custom_upload">
                          <label for="screenshot1">
                            <input type="file" id="screenshot1" class="files"
                                   name="dish_image_1" accept=".jpg,.jpeg,.png,.bmp,.svg,.gif">
                            <span class="btn btn--round btn--sm upload_btn">Choose File</span>
                          </label>
                        </div>
                        <!-- end /.custom_upload -->

                        <!-- end /.progress_wrapper -->

                        {{--<span class="lnr upload_cross lnr-cross"></span>--}}
                        <div class="prof_img_upload aspect_ratio mt-3">
                          <img
                                  @if ($dish->dish_image_1)
                                        src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_image_1 }}"
                                  @else
                                    src="{{ route('home') }}/images/cvrplc.jpg"
                                  @endif
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
                        <p>change 2nd Dish Image</p>

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
                          <img
                                  @if ($dish->dish_image_2)
                                  src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_image_2 }}"
                                  @else
                                  src="{{ route('home') }}/images/cvrplc.jpg"
                                  @endif
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
                        <p>Change 3rd Dish Image</p>

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
                          <img
                                  @if ($dish->dish_image_3)
                                    src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_image_3 }}"
                                  @else
                                    src="{{ route('home') }}/images/cvrplc.jpg"
                                  @endif
                               alt="Author profile area"
                               id="preview_screenshot3" class="ratio_img">
                        </div>
                      </div>
                      <!-- end /.upload_wrapper -->
                    </div>
                  </div>
                </div>


              </div>
              <!-- end /.upload_modules -->

              {{--<div class="upload_modules">
                <a class="toggle_title" href="#collapse4" role="button" data-toggle="collapse"
                   aria-expanded="false" aria-controls="collapse4">
                  <h4>Edit Other Information
                    <span class="lnr lnr-chevron-down"></span>
                  </h4>
                </a>

                <div class="information__set toggle_module collapse" id="collapse4">
                  <div class="modules__content">

                    <div class="form-group">
                      <label for="tags">Edit Item Tags
                        <span>(Max 10 tags)</span>
                      </label>
                      <textarea name="item_tags" id="tags"
                                class="text_field">{{ $dish->item_tags }}</textarea>
                    </div>
                  </div>
                </div>
                <!-- end /.upload_modules -->
              </div>--}}

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
                            <option value="{{ $dish->dsp_1 }}">Id: {{$dish->dsp_1 }}: {{--{{ \App\DeliveryService::find($dish->dsp_1)->service_title }}--}}</option>
                            @foreach($dsp_ids as $id)
                              <option value="{{ $id->id }}">Id: {{$id->id }}: {{ $id->service_title }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Second Delivery Service</label>
                        <div class="input-group">
                          {{--<input type="number" id="dsp_1" class="text_field"
                                 placeholder="id of dsp_1" name="dsp_1" min="1">--}}
                          <select name="dsp_2" id="" class="form-control">
                            <option value="{{ $dish->dsp_2 }}">Id: {{$dish->dsp_2 }}: {{--{{ \App\DeliveryService::find($dish->dsp_2)->service_title }}--}}</option>
                          @foreach($dsp_ids as $id)
                              <option value="{{ $id->id }}">Id: {{$id->id }}: {{ $id->service_title }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>


                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Third Delivery Service</label>
                        <div class="input-group">
                          {{--<input type="number" id="dsp_1" class="text_field"
                                 placeholder="id of dsp_1" name="dsp_1" min="1">--}}
                          <select name="dsp_3" id="" class="form-control">
                            <option value="{{ $dish->dsp_3 }}">Id: {{$dish->dsp_3 }}: {{--{{ \App\DeliveryService::find($dish->dsp_3)->service_title }}--}}</option>
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
                        <label for="">Fist Pickers Point</label>
                        <div class="input-group">
                          {{--<input type="number" id="dsp_1" class="text_field"
                                 placeholder="id of dsp_1" name="dsp_1" min="1">--}}
                          <select name="pp1" id="" class="form-control">
                            <option value="{{ $dish->pp1 }}">Id: {{$dish->pp1 }}</option>
                            @foreach($pp_ids as $id)
                              <option value="{{ $id->id }}">Id: {{$id->id }}: {{ $id->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Second Pickers Point</label>
                        <div class="input-group">
                          {{--<input type="number" id="dsp_1" class="text_field"
                                 placeholder="id of dsp_1" name="dsp_1" min="1">--}}
                          <select name="pp2" id="" class="form-control">
                            <option value="{{ $dish->pp2 }}">Id: {{$dish->pp2 }}</option>
                            @foreach($pp_ids as $id)
                              <option value="{{ $id->id }}">Id: {{$id->id }}: {{ $id->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Third Pickers Point</label>
                        <div class="input-group">
                          {{--<input type="number" id="dsp_1" class="text_field"
                                 placeholder="id of dsp_1" name="dsp_1" min="1">--}}
                          <select name="pp3" id="" class="form-control">
                            <option value="{{ $dish->pp3 }}">Id: {{$dish->pp3 }}</option>
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


              <!-- submit button -->
              <button type="submit" class="btn btn--round btn--fullwidth btn--lg">Click to update the
                dish
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
            <!--
<!-- end /.sidebar -->
          </div>
          <!-- end /.col-md-4 -->
        </div>
      </div>
      <!-- end /.row -->
    </div>
    <!-- end /.container -->
    <!-- end /.dashboard_menu_area -->
  </section>
  <!--================================
          END DASHBOARD AREA
  =================================-->

@endsection