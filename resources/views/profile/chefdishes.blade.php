@extends ('layouts.master')


@section ('title', 'Chef Dish')

@section ('content')

<body class="cehfdish">

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
                            <li class="active">
                                <a href="#">Profile</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title"> Profile</h1>
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
    @include( 'includes.menu-dashboard' )

    <!--================================
        START PROFILE AREA
    =================================-->
    <section class="author-profile-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <aside class="sidebar sidebar_author">
                        <div class="author-card sidebar-card">
                            <div class="author-infos">
                                <div class="author_avatar"> <img src="{{ route('home') }}/storage/images/profile_image/{{ $profile->profile_image }}" alt="Presenting the broken author avatar :D"> </div>
                                <div class="author">
                                    <h4>
                                        s
                                    </h4>
                                    <p>Joined {{ $profile->created_at->toFormattedDateString() }}</p>
                                </div>
                                <div class="author-badges">
                                    <div class="author-btn"> <a href="#" class="btn btn--md btn--round">Follow</a> </div>
                                </div>
                                <!-- end /.author -->
                            </div>
                            <!-- end /.author-infos -->

                            <div class="freelance-status">
                                <div class="custom-radio">
                                    <input type="radio" id="opt1" class="" name="filter_opt" checked>
                                    <label for="opt1">
                                        <span class="circle"></span>Khanidaani Chef</label>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-card author-menu">
                            <ul>
                                <li> <a href="{{ route('profile.show', ['profile' => auth()->id()]) }}">User Profile</a> </li>
                                <li> <a href= "{{ route('profile.chefdishes') }}" >Chef Dish</a> </li>
                                <li> <a href="{{ route('profile.chefdelivery') }}">Chef Delivery Option</a> </li>
                            </ul>
                        </div>
                    </aside>

                    <aside class="sidebar sidebar_author">
                        <div class="sidebar-card message-card">
                            <div class="card-title">
                                <h4>Contact Chef</h4>
                            </div>
                            <div class="message-form">
                                <form action="#">
                                    <div class="form-group">
                                        <textarea name="message" class="text_field" id="author-message" placeholder="Your message..."></textarea>
                                    </div>
                                    <div class="msg_submit">
                                        <button type="submit" class="btn btn--md btn--round">send message</button>
                                    </div>
                                </form>
                            </div>
                            <!-- end /.message-form -->
                        </div>
                    </aside>

                </div>
                <!-- end /.sidebar -->

                <div class="col-lg-8 col-md-12">
                    <div class="row">

                        <!-- SALE STATUS -->
                        <div class="col-md-4 col-sm-4">
                            <div class="author-info mcolorbg4">
                                <p>Total Dish</p>
                                <h3></h3>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="author-info pcolorbg">
                                <p>Total sales</p>
                                <h3>****</h3>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="author-info scolorbg">
                                <p>Total Ratings</p>
                                <div class="rating product--rating">
                                    <ul>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star"></span>
                                        </li>
                                        <li>
                                            <span class="fa fa-star-half-o"></span>
                                        </li>
                                    </ul>
                                    <span class="rating__count">(***)</span>
                                </div>
                            </div>
                        </div>
                        <!-- SALE STATUS -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="filter-bar clearfix filter-bar2">
                                    <div class="filter__option filter--text pull-left">
                                        <p>
                                            <span>All dishes</p>
                                    </div>

                                    <div class="pull-right">
                                        <div class="filter__option filter--dropdown">
                                            <a href="#" class="dropdown-trigger dropdown-toggle" id="drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories
                                                <span class="lnr lnr-chevron-down"></span>
                                            </a>
                                            <ul class="custom_dropdown custom_drop2 dropdown-menu" aria-labelledby="drop1">
                                                <li>
                                                    <a href="#">Pizza
                                                        <span>35</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="filter__option filter--dropdown">
                                            <a href="#" id="drop2" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter By
                                                <span class="lnr lnr-chevron-down"></span>
                                            </a>
                                            <ul class="custom_dropdown dropdown-menu" aria-labelledby="drop2">
                                                <li>
                                                    <a href="#">Popular items</a>
                                                </li>
                                                <li>
                                                    <a href="#">New items </a>
                                                </li>
                                                <li>
                                                    <a href="#">Best seller </a>
                                                </li>
                                                <li>
                                                    <a href="#">Best rating </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end /.pull-right -->
                                </div>
                                <!-- end filter-bar -->
                            </div>
                            <!-- end /.col-md-12 -->

                            <!-- start .col-md-6 -->
                            <div class="col-lg-6 col-md-6">
                                <!-- start .single-product -->
                                <div class="product product--card">

                                    <div class="product__thumbnail">
                                        <div class="aspect_ratio">
                                            <img src="{{ asset('images/d.jpg') }}" alt="Product Image" class="ratio_img">
                                        </div>

                                        <div class="prod_btn">
                                            <a href="#" class="transparent btn--sm btn--round">More
                                                Info
                                            </a>
                                        </div>
                                        <!-- end /.prod_btn -->
                                    </div>
                                    <!-- end /.product__thumbnail -->

                                    <div class="product-desc">
                                        <a href="" class="product_title">
                                            <h4>Special Veg nonveg Pizza </h4>
                                        </a>
                                        <ul class="titlebtm">
                                            <li>
                                                <img class="auth-img" src="{{ asset('images/1.jpg') }}" alt="author image">
                                                <p>
                                                    <a href="#">name</a>
                                                </p>
                                            </li>
                                            <li class="product_cat">
                                                <a href="#">
                                                    From <span>Sylhet</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end /.product-desc -->

                                    <div class="product-purchase">
                                        <div class="price_love">
                                            <span>৳500</span>
                                            <p>
                                                <span class="lnr lnr-heart"></span> 48</p>
                                        </div>

                                        <div class="rating product--rating">
                                            <ul>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star-half-o"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end /.product-purchase -->
                                </div>
                                <!-- end /.single-product -->
                            </div>
                            <!-- end /.col-md-6 -->
                            <div class="col-lg-6 col-md-6">
                                <!-- start .single-product -->
                                <div class="product product--card">

                                    <div class="product__thumbnail">
                                        <div class="aspect_ratio">
                                            <img src="{{ asset('images/d.jpg') }}" alt="Product Image" class="ratio_img">
                                        </div>

                                        <div class="prod_btn">
                                            <a href="#" class="transparent btn--sm btn--round">More
                                                Info
                                            </a>
                                        </div>
                                        <!-- end /.prod_btn -->
                                    </div>
                                    <!-- end /.product__thumbnail -->

                                    <div class="product-desc">
                                        <a href="" class="product_title">
                                            <h4>Special Veg nonveg Pizza </h4>
                                        </a>
                                        <ul class="titlebtm">
                                            <li>
                                                <img class="auth-img" src="{{ asset('images/1.jpg') }}" alt="author image">
                                                <p>
                                                    <a href="#">name</a>
                                                </p>
                                            </li>
                                            <li class="product_cat">
                                                <a href="#">
                                                    From <span>Sylhet</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end /.product-desc -->

                                    <div class="product-purchase">
                                        <div class="price_love">
                                            <span>৳500</span>
                                            <p>
                                                <span class="lnr lnr-heart"></span> 48</p>
                                        </div>

                                        <div class="rating product--rating">
                                            <ul>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star"></span>
                                                </li>
                                                <li>
                                                    <span class="fa fa-star-half-o"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end /.product-purchase -->
                                </div>
                                <!-- end /.single-product -->
                            </div>
                            <!-- end /.col-md-6 -->


                        </div>
                        <!-- end /.row -->

                    </div>
                    <!-- end /.row -->
                    <div class="pagination-area pagination--right">
                        <nav class="navigation pagination" role="navigation">
                            <div class="nav-links">
                                <a class="prev page-numbers" href="#">
                                    <span class="lnr lnr-arrow-left"></span>
                                </a>
                                <a class="page-numbers current" href="#/">1</a>
                                <a class="page-numbers" href="#">2</a>
                                <a class="page-numbers" href="#">3</a>
                                <a class="next page-numbers" href="#">
                                    <span class="lnr lnr-arrow-right"></span>
                                </a>
                            </div>
                        </nav>
                    </div>

                </div>
                <!-- end /.col-md-8 -->

            </div>
            <!-- end /.row -->

        </div>
    </section>
    </body>
@endsection