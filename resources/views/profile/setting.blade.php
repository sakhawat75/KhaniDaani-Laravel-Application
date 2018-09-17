@extends ('layouts.master')


@section ('title', 'Profile Settings')

@section ('content')

  <!--================================
	    START BREADCRUMB AREA
	=================================-->
  <section class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb">
          </div>
          <h1 class="page-title">Update Your Profile Info</h1>
        </div>
      </div>
    </div>
  </section>
  <!--================================
      END BREADCRUMB AREA
  =================================-->

  <section class="dashboard-area">
    @include( 'includes.menu-dashboard' )
    <div class="dashboard_contents">
      <div class="container">
          @include('includes.error_messeages')
        <form action="{{ route('profile.update', ['profile' => $profile->id])  }}" class="setting_form" method="post"
              enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="row">
            <div class="col-lg-6">
              <div class="information_module">
                <a class="toggle_title" href="#collapse" role="button" data-toggle="collapse" aria-expanded="false"
                   aria-controls="collapse">
                  <h4> Basic Information
                    <span class="lnr lnr-chevron-down"></span>
                  </h4>
                </a>

                <div class="information__set toggle_module collapse show" id="collapse">
                  <div class="information_wrapper form--fields">
                    <div class="form-group">
                      <label for="acname">Name
                        <sup>*</sup>
                      </label>
                      <input type="text" id="acname" class="text_field" value="{{ $profile->fullname }}" placeholder="Full Name or Nick name"
                             name="fullname">
                    </div>

                    <div class="form-group">
                      <label for="mobile">Date of birth<sup>*</sup></label>
                      <input type="date" id="mobile" class="text_field" value="{{ $profile->dob }}" name="dob">
                    </div>

                    <div class="form-group">
                      <label for="mobile2">Phone No<sup>*</sup></label>
                      <input type="text" id="mobile2" class="text_field" value="{{ $profile->mobile_no }}"
                             name="mobile_no">
                    </div>
                    <!-- city selection -->
                    <div class="form-group">
                      <label for="city">Select City<sup>*</sup></label>
                      <div class="select-wrap select-wrap2">
                        <select name="city" id="city" class="text_field">
                          @foreach($cities as $city)
                            <option value="{{ $city->name }}">{{ $city->name }}</option>
                          @endforeach
                        </select>
                        <span class="lnr lnr-chevron-down"></span>
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="areas">Area
                        <sup>*</sup>
                      </label>
                      <div class="select-wrap select-wrap2">
                        <select name="areas" id="areas" class="text_field">

                        </select>
                        <span class="lnr lnr-chevron-down"></span>
                      </div>
                    </div>

                     <div class="form-group">
                        <label for="prohead">Full Address one<sup>*</sup></label>

                        <input type="text" id="prohead" class="text_field" placeholder="Ex: House No, Road no, Block" name="address" value="{{ $profile->address }}">
                    </div>

                    <div class="form-group max-length">
                      <label for="prohead">Adress Hint</label>


                      <input type="text" class="text_field" placeholder="min 20 and max 1000 character" maxlength="1000" minlength="20" name="address_hint" value="{{ $profile->address_hint }}">
                    </div>

                  </div>
                  <!-- end /.information_wrapper -->
                </div>
                <!-- end /.information__set -->
              </div>
              <!-- end /.information_module -->
            </div>
            <!-- end /.col-md-6 -->

            <div class="col-lg-6">
              <div class="information_module">
                <a class="toggle_title" href="#collapse2" role="button" data-toggle="collapse" aria-expanded="false"
                   aria-controls="collapse2">
                  <h4>Profile Image & Cover
                    <span class="lnr lnr-chevron-down"></span>
                  </h4>
                </a>

                <div class="information__set profile_images toggle_module collapse show" id="collapse2">
                  <div class="information_wrapper">
                    <div class="profile_image_area">
                      <h5 class="bold">Profile Image</h5> <br>
                      <img src="{{ route('home') }}/storage/images/profile_image/{{ $profile->profile_image }}"
                           alt="Author profile area"
                           id="preview_profile_image" style="height: 100px;width: 100px;">
                      <label for="profile_photo" class="upload_btn profile_image_update">
                        <input type="file" id="profile_photo" name="profile_image">
                        <span class="btn btn--sm btn--round" aria-hidden="true">Choose Image</span>
                      </label>
                    </div>
                    <br>

                    <div class="form-group max-length">
                      <h5 class="bold">Profile Description</h5> <br>
                      <textarea name="description" id="article-ckeditor" class="text_field" maxlength="2000" minlength="10"
                      @if(empty($profile->description))
                        {!! "placeholder='Short brief about yourself or your account...'" !!}
                              @endif
                      >{!! $profile->description !!}</textarea>
                    </div>

                      <div class="prof_img_upload">

                        <h5 class="bold">Cover Image</h5> <br>

                       <div class="aspect_ratio">
                         <img src="{{ route('home') }}/storage/images/cover_image/{{ $profile->cover_image }}"
                              alt="The great warrior of China"
                              id="preview_cover" class="ratio_img">
                       </div>

                       <div class="upload_title">
                         <label for="dp" class="upload_btn">
                           <input type="file" id="dp" name="cover_image">
                           <span class="btn btn--sm btn--round" aria-hidden="true">Choose Image</span>
                         </label>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
            </div>

            <div class="col-md-12">
              <div class="dashboard_setting_btn">
                <button type="submit" class="btn btn--round btn--md">Save Change</button>
              </div>
            </div>
            <!-- end /.col-md-12 -->
          </div>
          <!-- end /.row -->
        </form>
        <!-- end /form -->
      </div>
      <!-- end /.container -->
    </div>
    <!-- end /.dashboard_menu_area -->
  </section>

@endsection