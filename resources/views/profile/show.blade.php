@extends ('layouts.master')


@section ('title', 'Profile')

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
                                <a href="index.html">Home</a>
                            </li>
                            <li class="active">
                                <a href="#">Author Profile</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Author's Profile</h1>
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
                                <div class="author_avatar">
                                    <img src="images/author-avatar.jpg" alt="Presenting the broken author avatar :D">
                                </div>

                                <div class="author">
                                    <h4>Username</h4>
                                    <p>Signed Up: 08 April 2016</p>
                                </div>
                                <!-- end /.author -->
                            </div>
                            <!-- end /.author-infos -->


                        </div>
                        <!-- end /.author-card -->

                        <div class="sidebar-card freelance-status">
                            <div class="custom-radio">
                                <input type="radio" id="opt1" class="" name="filter_opt" checked>
                                <label for="opt1">
                                    <span class="circle"></span>Available</label>
                            </div>
                        </div>

                        <div class="sidebar-card author-menu">
                            <ul>
                                <li>
                                    <a href="#" class="active">Profile</a>
                                </li>
                                <li>
                                    <a href="author-items.html">User Dishes</a>
                                </li>
                                <li>
                                    <a href="author-reviews.html">Customer Reviews</a>
                                </li>
                            </ul>
                        </div>
                        <!-- end /.author-menu -->
                            <div class="author_module about_author">
                                <h2>About
                                    <span>User</span>
                                </h2>
                                <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the mattisleo quam aliquet congue. Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque the mattisleo quam aliquet congue. Nunc placerat mi id nisi interdum mollis. Prae sent pharetra, justo ut scelerisque the mattisleo quam aliquet congue.</p>
                            </div>
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
                                <p> Please
                                    <a href="#">sign in</a> to contact this author.</p>
                            </div>
                            <!-- end /.message-form -->
                        </div>
                        <!-- end /.freelance-status -->
                    </aside>
                </div>
                <!-- end /.sidebar -->

                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="author_module">
                                <img src="images/authcvr.jpg" alt="author image">
                            </div>
                        </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="author-info mcolorbg4">
                                    <p>Total Items</p>
                                    <h3>4,369</h3>
                                </div>
                            </div>
                            <!-- end /.col-md-4 -->
                            <div class="col-md-4 col-sm-4">
                                <div class="author-info pcolorbg">
                                    <p>Total sales</p>
                                    <h3>36,957</h3>
                                </div>
                            </div>
                            <!-- end /.col-md-4 -->
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
                                        <span class="rating__count">(26)</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.col-md-4 -->
                    </div>
                    <!-- end /.row -->

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <!-- start .single-product -->
                            <div class="product product--card">

                                <div class="product__thumbnail">
                                    <img src="images/dishid_mainthumb.jpg" alt="Product Image">
                                    <div class="prod_btn">
                                        <a href="single-product.html" class="transparent btn--sm btn--round">More Info</a>
                                    </div>
                                    <!-- end /.prod_btn -->
                                </div>
                                <!-- end /.product__thumbnail -->

                                <div class="product-desc">
                                    <a href="{{ route('single_dish')}}" class="product_title">
                                        <h4>Special Veg nonveg Pizza</h4>
                                        <h4>Indian butter chicken</h4>
                                    </a>
                                    <ul class="titlebtm">
                                        <li>
                                            <img class="auth-img" src="images/dishid_mainthumb.jpg" alt="author image">
                                            <p>
                                                <a href="#">User1</a>
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
                                        <span>$10</span>
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

                                    <div class="sell">
                                        <p>
                                            <span class="lnr lnr-cart"></span>
                                            <span>50</span>
                                        </p>
                                    </div>
                                </div>
                                <!-- end /.product-purchase -->
                            </div>
                            <!-- end /.single-product -->
                        </div>
                    </div>
                    <!-- end /.row -->
                </div>
                <!-- end /.col-md-8 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    <!--================================
        END AUTHOR AREA
    =================================-->

@endsection