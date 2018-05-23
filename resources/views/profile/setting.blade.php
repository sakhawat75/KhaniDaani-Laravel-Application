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
	                    <ul>
	                        <li>
	                            <a href="{{ URL::to('/') }}">Home</a>
	                        </li>
	                        <li>
	                            <a href="dashboard.html">Dashboard</a>
	                        </li>
	                        <li class="active">
	                            <a href="#">Settings</a>
	                        </li>
	                    </ul>
	                </div>
	                <h1 class="page-title">Author's Settings</h1>
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


	    <!-- end /.dashboard_menu_area -->
	    @include( 'includes.menu-dashboard' )

	    <div class="dashboard_contents">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-12">
	                    <div class="dashboard_title_area">
	                        <div class="dashboard__title">
	                            <h3>Account Settings</h3>
	                        </div>
	                    </div>
	                </div>
	                <!-- end /.col-md-12 -->
	            </div>
	            <!-- end /.row -->

	            <form action="{{ URL::to('/') }}/profile/create" class="setting_form" method="post" enctype="multipart/form-data">
	            	{{ csrf_field() }}
	            	
	            	
	                <div class="row">
	                    <div class="col-lg-6">
	                        <div class="information_module">
	                            <a class="toggle_title" href="#collapse2" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
	                                <h4>Personal Information
	                                    <span class="lnr lnr-chevron-down"></span>
	                                </h4>
	                            </a>

	                            <div class="information__set toggle_module collapse show" id="collapse2">
	                                <div class="information_wrapper form--fields">
	                                    <div class="form-group">
	                                        <label for="acname">Full Name
	                                            <sup>*</sup>
	                                        </label>
	                                        <input type="text" id="acname" class="text_field" value="{{ $profile->fullname }}" name="fullname">
	                                    </div>

	                                    {{-- <div class="form-group">
	                                        <label for="usrname">Username
	                                            <sup>*</sup>
	                                        </label>
	                                        <input type="text" id="usrname" class="text_field" placeholder="Account name" value="">
	                                        <p>Your MartPlace URL: https://khanidaani.com/
	                                            <span>user</span>
	                                        </p>
	                                    </div> --}}

	                                    <div class="form-group">
	                                        <label for="mobile">Date of bith</label>
	                                        <input type="date" id="mobile" class="text_field" value="{{ $profile->dob }}" name="dob">
	                                    </div>

	                                    <div class="form-group">
	                                        <label for="mobile2">Phone No</label>
	                                        <input type="text" id="mobile2" class="text_field" value="{{ $profile->mobile_no }}" name="mobile_no">
	                                    </div>

	                                    {{-- <div class="form-group">
	                                        <label for="emailad">Email Address
	                                            <sup>*</sup>
	                                        </label>
	                                        <input type="text" id="emailad" class="text_field" placeholder="Email address" value="">
	                                    </div> --}}


	                                    {{-- <div class="form-group">
	                                        <label for="password">Old Password
	                                            <sup>*</sup>
	                                        </label>
	                                        <input type="password" id="password" class="text_field" placeholder="Old Password">
	                                    </div> --}}

	                                    {{-- <div class="row">
	                                        <div class="col-md-6">
	                                            <div class="form-group">
	                                                <label for="password">Password
	                                                    <sup>*</sup>
	                                                </label>
	                                                <input type="password" id="password" class="text_field" placeholder="Enter password">
	                                            </div>
	                                        </div>

	                                        <div class="col-md-6">
	                                            <div class="form-group">
	                                                <label for="conpassword">Confirm Password
	                                                    <sup>*</sup>
	                                                </label>
	                                                <input type="password" id="conpassword" class="text_field" placeholder="re-enter password">
	                                            </div>
	                                        </div>
	                                    </div> --}}

	                                    {{-- <div class="form-group">
	                                        <label for="country">Country
	                                            <sup>*</sup>
	                                        </label>
	                                        <div class="select-wrap select-wrap2">
	                                            <select name="country" id="country" class="text_field">
	                                                <option value="">Select one</option>
	                                                <option value="bangladesh">Bangladesh</option>
	                                                <option value="india">India</option>
	                                                <option value="uruguye">Uruguye</option>
	                                                <option value="australia">Australia</option>
	                                                <option value="neverland">Neverland</option>
	                                                <option value="atlantis">Atlantis</option>
	                                            </select>
	                                            <span class="lnr lnr-chevron-down"></span>
	                                        </div>
	                                    </div> --}}


	                                    {{-- <div class="form-group">
	                                        <label for="prohead">Profile Heading</label>
	                                        <input type="text" id="prohead" class="text_field" placeholder="Ex: Webdesign & Development Service">
	                                    </div>
 --}}
	                                    <div class="form-group">
	                                        <label for="authbio">User Description</label>
	                                        <textarea name="description" id="authbio" class="text_field"
													  @if(empty($profile->description))
														  {!! "placeholder='Short brief about yourself or your account...'" !!}
													  @endif
											>{{ $profile->description }}</textarea>
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
	                            <a class="toggle_title" href="#collapse3" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
	                                <h4>Profile Image & Cover
	                                    <span class="lnr lnr-chevron-down"></span>
	                                </h4>
	                            </a>

	                            <div class="information__set profile_images toggle_module collapse" id="collapse3">
	                                <div class="information_wrapper">
	                                    <div class="profile_image_area">
	                                        <img src="images/authplc.png" alt="Author profile area" id="preview_profile_image" style="height: 100px;width: 100px;">
	                                        <div class="img_info">
	                                            <p class="bold">Profile Image</p>
	                                            <p class="subtitle">JPG, GIF or PNG 100x100 px</p>
	                                        </div>

	                                        <label for="profile_photo" class="upload_btn">
	                                            <input type="file" id="profile_photo" name="profile_image">
	                                            <span class="btn btn--sm btn--round" aria-hidden="true">Choose Image</span>
	                                        </label>
	                                    </div>

	                                    <div class="prof_img_upload">
	                                        <p class="bold">Cover Image</p>
	                                        <img src="images/cvrplc.jpg" alt="The great warrior of China" id="preview_cover">

	                                        <div class="upload_title">
	                                            <p>JPG, GIF or PNG 750x370 px</p>
	                                            <label for="dp" class="upload_btn">
	                                                <input type="file" id="dp" name="cover_image">
	                                                <span class="btn btn--sm btn--round" aria-hidden="true">Choose Image</span>
	                                            </label>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <!-- end /.information_module -->

	                        {{-- <div class="information_module">
	                            <a class="toggle_title" href="#collapse4" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapse1">
	                                <h4>Email Notification setting
	                                    <span class="lnr lnr-chevron-down"></span>
	                                </h4>
	                            </a>

	                            <div class="information__set mail_setting toggle_module collapse" id="collapse4">
	                                <div class="information_wrapper">
	                                    <div class="custom_checkbox">
	                                        <input type="checkbox" id="opt1" class="" name="mail_rating_reminder" checked>
	                                        <label for="opt1">
	                                            <span class="shadow_checkbox"></span>
	                                            <span class="radio_title">Rating Reminders</span>
	                                            <span class="desc">Send an email reminding me to rate an item after purchase</span>
	                                        </label>
	                                    </div>
	                                    <!-- end /.custom-radio -->

	                                    <div class="custom_checkbox">
	                                        <input type="checkbox" id="opt2" class="" name="mail_update_noti" checked>
	                                        <label for="opt2">
	                                            <span class="shadow_checkbox"></span>
	                                            <span class="radio_title">Item Update Notifications</span>
	                                            <span class="desc">Send an email when an item I've purchased is updated</span>
	                                        </label>
	                                    </div>
	                                    <!-- end /.custom_checkbox -->

	                                    <div class="custom_checkbox">
	                                        <input type="checkbox" id="opt3" class="" name="mail_comment_noti" checked>
	                                        <label for="opt3">
	                                            <span class="shadow_checkbox"></span>
	                                            <span class="radio_title">Item Comment Notifications</span>
	                                            <span class="desc">Send me an email when someone comments on one of my items</span>
	                                        </label>
	                                    </div>
	                                    <!-- end /.custom_checkbox -->

	                                    <div class="custom_checkbox">
	                                        <input type="checkbox" id="opt4" class="" name="mail_item_review_noti" checked>
	                                        <label for="opt4">
	                                            <span class="shadow_checkbox"></span>
	                                            <span class="radio_title">Item Review Notifications</span>
	                                            <span class="desc">Send me an email when my items are approved or rejected</span>
	                                        </label>
	                                    </div>
	                                    <!-- end /.custom_checkbox -->

	                                    <div class="custom_checkbox">
	                                        <input type="checkbox" id="opt5" class="" name="mail_review_noti" checked>
	                                        <label for="opt5">
	                                            <span class="shadow_checkbox"></span>
	                                            <span class="radio_title">Buyer Review Notifications</span>
	                                            <span class="desc">Send me an email when someone leaves a review with their rating</span>
	                                        </label>
	                                    </div>
	                                    <!-- end /.custom_checkbox -->

	                                    <div class="custom_checkbox">
	                                        <input type="checkbox" id="opt6" class="" name="mail_support_noti" checked>
	                                        <label for="opt6">
	                                            <span class="shadow_checkbox"></span>
	                                            <span class="radio_title">Support Notifications</span>
	                                            <span class="desc">Send me emails showing my soon to expire support entitlements</span>
	                                        </label>
	                                    </div>
	                                    <!-- end /.custom_checkbox -->

	                                    <div class="custom_checkbox">
	                                        <input type="checkbox" id="opt7" class="" name="mail_weekly">
	                                        <label for="opt7">
	                                            <span class="shadow_checkbox"></span>
	                                            <span class="radio_title">Weekly Summary Emails</span>
	                                            <span class="desc">Send me emails showing my soon to expire support entitlements</span>
	                                        </label>
	                                    </div>
	                                    <!-- end /.custom_checkbox -->

	                                    <div class="custom_checkbox">
	                                        <input type="checkbox" id="opt8" class="" name="mail_newsletter">
	                                        <label for="opt8">
	                                            <span class="shadow_checkbox"></span>
	                                            <span class="radio_title">MartPlace Newsletter</span>
	                                            <span class="desc">Get update about latest news, update and more.</span>
	                                        </label>
	                                    </div>
	                                    <!-- end /.custom_checkbox -->
	                                </div>
	                                <!-- end /.information_wrapper -->
	                            </div>
	                            <!-- end /.information_module -->
	                        </div>
	                        <!-- end /.information_module --> --}}
	                    </div>
	                    <!-- end /.col-md-6 -->

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
	<!--================================
	        END DASHBOARD AREA
	=================================-->

@endsection