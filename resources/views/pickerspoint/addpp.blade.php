@extends ('layouts.master') @section ('title', 'Add Pickers Point') @section ('content')

    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                    </div>
                    <h1 class="page-title">Add pick up point</h1>
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
                @include('includes.error_messeages')
                @include('includes.success_message')
                <div class="row">
                    <div class="col-lg-8 col-md-7">
                        <form action="{{ route('pickerspoint.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="upload_modules">
                                <div class="modules__title">
                                    <h3>Add Pick Up Point Detail</h3>
                                </div>
                                <!-- end /.module_title -->
                                <div class="modules__content">

                                    <div class="form-group max-length">
                                        <label for="shop_name">Shop Name
                                            <span> (Max 50 characters) </span>
                                        </label>
                                        <input name="name" type="text" id="shop_name" class="text_field"
                                               placeholder="Enter your Shop name here..." maxlength = "50" required>

                                    </div>
                                    <div class="form-group max-length">
                                        <label for="shop_type">Shop Type
                                            <span> (eg. Departmental Store )</span>
                                        </label>
                                        <input name="type" type="text" id="shop_type" class="text_field"
                                               placeholder="Enter your Shop Type here..."  maxlength = "20" required>
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
                                                    <label for="sh_start">Open Time</label>
                                                    <input type="time" name="open_at" id="sh_start"
                                                           class="text_field"
                                                           placeholder="Start Time" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.col-md-6 -->

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <label for="sh_close">Close Time</label>
                                                    <input type="time" id="sh_close" class="text_field"
                                                           placeholder="End Time" name="close_at" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end /.col-md-6 -->

                                    </div>
                                    <!-- end /.row -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="service_charge">Service Charge <span>(Within 10-50 taka)</span>
                                                </label>
                                                {{--<input name="charge" type="number" id="service_charge" class="text_field"
                                                       placeholder="10-50" min="10" max="50" required>--}}
                                                <select name="charge" id="service_charge" class="form-control">
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="25">25</option>
                                                    <option value="30">30</option>
                                                    <option value="35">35</option>
                                                    <option value="40">40</option>
                                                    <option value="45">45</option>
                                                    <option value="50">50</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end /.modules__content -->
                            </div>

                            {{--Note: Fetch below information from profile setting also allow them edit if it's needed.--}}
                            {{-- TODO Fetch below information from profile --}}
                            <div class="upload_modules">
                                <a class="toggle_title" href="#collapse2" role="button" data-toggle="collapse"
                                   aria-expanded="false" aria-controls="collapse2">
                                    <h4>Contacts
                                        <span class="lnr lnr-chevron-down"></span>
                                    </h4>
                                </a>

                                <div class="information__set toggle_module collapse show" id="collapse2">
                                    <div class="modules__content">

                                        <div class="form-group max-length">
                                            <label for="full_address">Full Address</label>
                                            <div class="input-group">
                                                <textarea name="address" id="full_address"
                                                       class="text_field"
                                                          placeholder="Holding NO:1098,Main Road-1, Block-E, Shahjalal Uposhohor, Sylhet."  maxlength = "100" required>{{ $profile->address }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group max-length">
                                            <label for="address_hint">Adress Hint</label>
                                            <div class="input-group">
                                                <input name="address_hint" type="text" id="address_hint"
                                                       class="text_field" placeholder="Near Brack Bank"  maxlength = "50" required value="{{ $profile->address_hint }}">
                                            </div>
                                        </div>

                                        <div class="form-group max-length">
                                            <label for="phone_number">Phone No</label>
                                            <div class="input-group">
                                                <input name="phone" type="tel" id="phone_number"
                                                       class="text_field" placeholder="01711966966"  maxlength = "11" required value="{{ $profile->mobile_no }}">
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

@endsection