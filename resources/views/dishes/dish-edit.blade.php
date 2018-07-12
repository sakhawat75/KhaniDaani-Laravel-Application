@extends ('layouts.master')

@section ('title', 'Edit Dish') @section ('content')
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
                <a href="{{ route('home') }}">Home</a>
              </li>
              <li>
                <a href="{{ route('dishes.manage') }}">Manage Item</a>
              </li>
              <li class="active">
                <a href="#">Edit Dish</a>
              </li>
            </ul>
          </div>
          <h1 class="page-title">Edit <span> Dish Title</span></h1>
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
                  <h3>Edit <span>Dish Title</span></h3>
                </div>
              </div>
            </div>
          </div>
          <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->

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
                        <select name="dish_category" id="category" class="text_field">
                          <option value="{{ $dish->dish_category }}">{{ $dish->dish_category }}</option>
                        </select>
                        <span class="lnr lnr-chevron-down"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="category">Edit Sub Category</label>
                      <div class="select-wrap select-wrap2">
                        <select name="dish_subcategory" id="category" class="text_field">
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
                          <option value="{{ $dish->preparation_time }}">{{ $dish->preparation_time }}</option>
                          <option value="1 Hour">1 Hour</option>
                          <option value="2 Hour">2 Hour</option>
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

              <div class="upload_modules module--upload">
                <a class="toggle_title" href="#collapse3" role="button" data-toggle="collapse"
                   aria-expanded="false" aria-controls="collapse3">
                  <h4>Change Dish Image
                    <span class="lnr lnr-chevron-down"></span>
                  </h4>
                </a>

                <div class="information__set toggle_module collapse" id="collapse3">
                  <div class="modules__content">
                    <div class="form-group">
                      <div class="upload_wrapper">
                        <p>Change Thumbnail
                          <span>(JPEG or PNG 100x100px)</span>
                        </p>

                        <div class="custom_upload">
                          <label for="thumbnail">
                            <input type="file" id="thumbnail" class="files"
                                   name="dish_thumbnail">
                            <span class="btn btn--round btn--sm">Choose File</span>
                          </label>
                        </div>
                        <!-- end /.custom_upload -->

                        <div class="progress_wrapper">
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
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
                        <p>Change 1st Dish Image
                          <span>(JPG or PNG)</span>
                        </p>

                        <div class="custom_upload">
                          <label for="screenshot1">
                            <input type="file" id="screenshot1" class="files"
                                   name="dish_image_1">
                            <span class="btn btn--round btn--sm">Choose File</span>
                          </label>
                        </div>
                        <!-- end /.custom_upload -->

                        <div class="progress_wrapper">
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 78%;">
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
                        <p>Change 2nd Dish Image
                          <span>(JPG or PNG)</span>
                        </p>

                        <div class="custom_upload">
                          <label for="screenshot2">
                            <input type="file" id="screenshot2" class="files"
                                   name="dish_image_2">
                            <span class="btn btn--round btn--sm">Choose File</span>
                          </label>
                        </div>
                        <!-- end /.custom_upload -->

                        <div class="progress_wrapper">
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 78%;">
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
                        <p>Change 3rd Dish Image
                          <span>(JPG or PNG)</span>
                        </p>

                        <div class="custom_upload">
                          <label for="screenshot3">
                            <input type="file" id="screenshot3" class="files"
                                   name="dish_image_3">
                            <span class="btn btn--round btn--sm">Choose File</span>
                          </label>
                        </div>
                        <!-- end /.custom_upload -->

                        <div class="progress_wrapper">
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 78%;">
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
              </div>
              <!-- end /.upload_modules -->

              <div class="upload_modules">
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
              </div>

              <div class="upload_modules with--addons">
                <div class="modules__title">
                  <h3>Delivery Service Provider</h3>
                </div>
                <!-- end /.module_title -->

                <div class="modules__content">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <div class="input-group">
                          <input type="text" id="rlicense" class="text_field"
                                 placeholder="username">
                        </div>
                      </div>
                    </div>
                    <!-- end /.col-md-6 -->

                    <div class="col-md-6">
                      <div class="form-group">
                        <div class="input-group">
                          <input type="text" id="exlicense" class="text_field"
                                 placeholder="username2">
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
                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="input-group">
                          <input type="text" id="single_use" class="text_field"
                                 placeholder="username">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="input-group">
                          <input type="text" id="double_use" class="text_field"
                                 placeholder="username">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <div class="input-group">
                          <input type="text" id="multi_user" class="text_field"
                                 placeholder="username">
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
            <aside class="sidebar upload_sidebar">
              <div class="sidebar-card">
                <div class="card-title">
                  <h3>Quick Upload Rules</h3>
                </div>

                <div class="card_content">
                  <div class="card_info">
                    <h4>Image Upload</h4>
                    <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut
                      sceleris que the mattis interdum.</p>
                  </div>

                  <div class="card_info">
                    <h4>File Upload</h4>
                    <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut
                      sceleris que the mattis interdum.</p>
                  </div>

                  <div class="card_info">
                    <h4>Vector Upload</h4>
                    <p>Nunc placerat mi id nisi interdum mollis. Praesent there pharetra, justo ut
                      sceleris que the mattis interdum.</p>
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
                    isque the mattis, leo quam aliquet congue.</p>
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
                    isque the mattis, leo quam aliquet congue.</p>
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