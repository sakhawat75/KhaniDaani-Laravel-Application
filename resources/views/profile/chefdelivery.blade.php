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
                                <li> <a href="#">User Profile</a> </li>
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
                                            <span>Chef Delivery Services</p>
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
                            <div class="col-lg-12 col-md-12">
                                <!-- start .single-product -->
                                <div class="product product--list product--list-small">

                                    <div class="product__thumbnail">
                                        <img src="{{ asset('images/1.jpg') }}" alt="Product Image">
                                        <div class="prod_btn">
                                            <a href="single-product.html" class="transparent btn--sm btn--round">More Info</a>
                                        </div>
                                        <!-- end /.prod_btn -->
                                    </div>
                                    <!-- end /.product__thumbnail -->

                                    <div class="product__details">
                                        <div class="product-desc">
                                            <a href="#" class="product_title">
                                                <h4>Delivering Uposahar to all over sylhet </h4>
                                            </a>
                                            <p>Nunc placerat mi id nisi inter dum mollis. Praesent phare...</p>

                                            <ul class="titlebtm">
                                                <li class="product_cat">
                                                    <a href="#">
                                                        <span class="lnr lnr-book"></span>Plugin</a>
                                                </li>
                                            </ul>
                                            <!-- end /.titlebtm -->
                                        </div>
                                        <!-- end /.product-desc -->

                                        <div class="product-meta">
                                            <div class="author">
                                                <img class="auth-img" src="{{ asset('images/1.jpg') }}" alt="author image">
                                                <p>
                                                    <a href="#">KhaniDaani</a>
                                                </p>
                                            </div>
                                            <!-- end /.author -->

                                            <div class="love-comments">
                                                <p>
                                                    <span class="lnr lnr-heart"></span> From Areas</p>
                                                <p>
                                                    <span class="lnr lnr-bubble"></span> Delivering</p>
                                            </div>
                                            <!-- end /.love-comments -->

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
                                                <span class="rating__count">(34)</span>
                                            </div>
                                            <!-- end /.rating -->
                                        </div>
                                        <!-- end /.product-meta -->

                                        <div class="product-purchase">
                                            <div class="price_love">
                                                <span>$10 - $50</span>
                                            </div>
                                        </div>
                                        <!-- end /.product-purchase -->
                                    </div>
                                </div>
                                <!-- end /.single-product -->
                            </div>

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