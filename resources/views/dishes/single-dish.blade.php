@extends ('layouts.master')

@section ('title', 'Single Dish')

@section ('content')

    <body class="single-dish">

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
                                <a href="#">Dish</a>
                            </li>
                            <li>
                                <a href="#">Chicken</a>
                            </li>
                            <li class="active">
                                <a href="#">Roast</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">{{ $dish->dish_name }}</h1>
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


    <!--============================================
        START SINGLE PRODUCT DESCRIPTION AREA
    ==============================================-->
    <section class="single-product-desc">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="item-preview">
                        <div class="item__preview-slider">
                            <div class="prev-slide">
                                <img src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_image_1 }}"
                                     alt="Keep calm this isn't the end of the world, the preview is just missing.">
                            </div>
                            <div class="prev-slide">
                                <img src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_image_2 }}"
                                     alt="Keep calm this isn't the end of the world, the preview is just missing.">
                            </div>
                            <div class="prev-slide">
                                <img src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_image_3 }}"
                                     alt="Keep calm this isn't the end of the world, the preview is just missing.">
                            </div>
                        </div>
                        <!-- end /.item--preview-slider -->

                        <div class="item__preview-thumb">
                            <div class="prev-thumb">
                                <div class="thumb-slider">
                                    <div class="item-thumb">
                                        <img src="{{ route('home') }}/images/dthumb1.jpg" alt="This is the thumbnail of the item">
                                    </div>
                                    <div class="item-thumb">
                                        <img src="{{ route('home') }}/images/dthumb2.jpg" alt="This is the thumbnail of the item">
                                    </div>
                                    <div class="item-thumb">
                                        <img src="{{ route('home') }}/images/dthumb1.jpg" alt="This is the thumbnail of the item">
                                    </div>
                                </div>
                                <!-- end /.thumb-slider -->

                                <div class="prev-nav thumb-nav">
                                    <span class="lnr nav-left lnr-arrow-left"></span>
                                    <span class="lnr nav-right lnr-arrow-right"></span>
                                </div>
                                <!-- end /.prev-nav -->
                            </div>

                            <div class=" item-action item_social_share">
                                <p>
                                    <img src="{{ route('home') }}/images/svg/share.svg" alt="This is share svg">
                                    <span>Share this item</span>
                                </p>

                                <div class="social social--color--filled">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <span class="fa fa-facebook"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="fa fa-twitter"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="fa fa-google-plus"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="fa fa-pinterest"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="fa fa-linkedin"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="fa fa-dribbble"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end /.social-->

                            </div>
                        </div>
                        <!-- end /.item__action -->
                    </div>
                    <!-- end /.item__preview-thumb-->
                    <!-- end /.item-preview-->

                    <div class="item-info">
                        <div class="tab tab2">
                            <div class="item-navigation">
                                <ul class="nav nav-tabs nav--tabs2">
                                    <li>
                                        <a href="#product-details" class="active" aria-controls="product-details"
                                           role="tab" data-toggle="tab">Item Details</a>
                                    </li>
                                    <li>
                                        <a href="#product-review" aria-controls="product-review" role="tab"
                                           data-toggle="tab">Reviews
                                            <span>(35)</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- end /.item-navigation -->

                        <div class="tab-content">
                            <div class="fade show tab-pane product-tab active" id="product-details">
                                <div class="tab-content-wrapper">
                                    <h1>Dish Description</h1>
                                    <p> {{ $dish->dish_description }} </p>

                                    <h2>Dish Ingredients</h2>
                                    <ul>
                                        <li>Peanut oil</li>
                                        <li>Natural yogurt</li>
                                        <li>Black pepper</li>
                                        <li>Cornflour</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="fade tab-pane product-tab" id="product-review">
                                <div class="thread thread_review">
                                    <ul class="media-list thread-list">

                                        <li class="single-thread">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{ route('home') }}/images/m8.png"
                                                             alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <div class="pull-left">
                                                            <div class="media-heading">
                                                                <a href="author.html">
                                                                    <h4>Mr.Mango</h4>
                                                                </a>
                                                                <span>1 month day</span>
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
                                                                        <span class="fa fa-star-o"
                                                                              aria-hidden="true"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star-o"
                                                                              aria-hidden="true"></span>
                                                                    </li>
                                                                    <li>
                                                                        <span class="fa fa-star-o"
                                                                              aria-hidden="true"></span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="reply-link">Reply</a>
                                                    </div>
                                                    <p>Amazing</p>
                                                </div>
                                            </div>

                                            <!-- nested comment markup -->
                                            <ul class="children">
                                                <li class="single-thread depth-2">
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="{{ route('home') }}/images/m2.png"
                                                                     alt="Commentator Avatar">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="media-heading">
                                                                <h4>Foddies</h4>
                                                            </div>
                                                            <p>Thank you for taking the time to leave a review! </p>
                                                        </div>
                                                    </div>

                                                </li>
                                            </ul>

                                            <!-- comment reply -->
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{ route('home') }}/images/m2.png"
                                                             alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="#" class="comment-reply-form">
                                                        <textarea class="bla" name="reply-comment"
                                                                  placeholder="Write your comment..."></textarea>
                                                        <button class="btn btn--md btn--round">Post Comment</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                        </li>
                                        <!-- end single comment thread /.comment-->
                                        <li class="single-thread">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{ route('home') }}/images/m6.png"
                                                             alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <div class="clearfix">
                                                        <div class="pull-left">
                                                            <div class="media-heading">
                                                                <a href="author.html">
                                                                    <h4>Mrs. Mango</h4>
                                                                </a>
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
                                                            <span class="review_tag">support</span>
                                                        </div>
                                                        <a href="#" class="reply-link">Reply</a>
                                                    </div>
                                                    <p>Everything excellent!</p>
                                                </div>
                                            </div>

                                            <!-- comment reply -->
                                            <div class="media depth-2 reply-comment">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="{{ route('home') }}/images/m2.png"
                                                             alt="Commentator Avatar">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <form action="#" class="comment-reply-form">
                                                        <textarea class="bla" name="reply-comment"
                                                                  placeholder="Write your comment..."></textarea>
                                                        <button class="btn btn--md btn--round">Post Comment</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- comment reply -->
                                        </li>
                                        <!-- end single comment thread /.comment-->
                                    </ul>
                                    <!-- end /.media-list -->

                                    <div class="pagination-area pagination-area2">
                                        <nav class="navigation pagination " role="navigation">
                                            <div class="nav-links">
                                                <a class="page-numbers current" href="#">1</a>
                                                <a class="page-numbers" href="#">2</a>
                                                <a class="page-numbers" href="#">3</a>
                                                <a class="next page-numbers" href="#">
                                                    <span class="lnr lnr-arrow-right"></span>
                                                </a>
                                            </div>
                                        </nav>
                                    </div>
                                    <!-- end /.comment pagination area -->
                                </div>
                                <!-- end /.comments -->
                            </div>

                        </div>
                        <!-- end /.tab-content -->
                    </div>
                    <!-- end /.item-info -->
                </div>
                <!-- end /.col-md-8 -->

                <div class="col-lg-4">
                    <aside class="sidebar sidebar--single-product">
                        <div class="sidebar-card card-pricing card--pricing2">
                            <div class="price">
                                <h1>
                                    <sup>৳</sup>
                                    <span>{{ $dish->dish_price }}</span>
                                </h1>
                            </div>
                            <div class="sidebar-card card--metadata">
                                <ul class="data">
                                    <li>
                                        <p>
                                            <span class="lnr lnr-cart pcolor"></span>Prepeartion Time</p>
                                        <span>{{ $dish->preparation_time }}</span>
                                    </li>
                                </ul>
                            </div>
                            <ul class="pricing-options">
                                <li>
                                    <div class="form-group">
                                        <label for="category">Select Pickers Point</label>
                                        <div class="select-wrap select-wrap2">
                                            <select name="country" id="category" class="text_field">
                                                <option value="">Shibgong</option>
                                                <option value="wordpress">Upasahar</option>
                                                <option value="html">Zindabazar</option>
                                            </select>
                                            <span class="lnr lnr-chevron-down"></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group">
                                        <label for="category">Select Deliverer</label>
                                        <div class="select-wrap select-wrap2">
                                            <select name="country" id="category" class="text_field">
                                                <option value="">sakhawat</option>
                                                <option value="wordpress">juned</option>
                                                <option value="html">nurain</option>
                                            </select>
                                            <span class="lnr lnr-chevron-down"></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <!-- end /.pricing-options -->

                            <div class="purchase-button">
                                <a href="#" class="btn btn--lg btn--round">Order Now</a>
                                <a href="#" class="btn btn--lg btn--round cart-btn">
                                    <span class="lnr lnr-cart"></span> Add To Cart</a>
                                <a href="#" class="btn btn--round btn--lg btn--icon">
                                    <span class="lnr lnr-heart"></span>Add To Favorites</a>
                            </div>
                            <!-- end /.purchase-button -->
                        </div>
                        <!-- end /.sidebar--card -->

                        <div class="sidebar-card card--metadata">
                            <ul class="data">
                                <li>
                                    <p>
                                        <span class="lnr lnr-cart pcolor"></span>Total Sales</p>
                                    <span>426</span>
                                </li>
                                <li>
                                    <p>
                                        <span class="lnr lnr-heart scolor"></span>Favorites</p>
                                    <span>240</span>
                                </li>
                                <li>
                                    <p>
                                        <span class="lnr lnr-bubble mcolor3"></span>Comments</p>
                                    <span>35</span>
                                </li>
                            </ul>


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
                                <span class="rating__count">( 26 Ratings )</span>
                            </div>
                            <!-- end /.rating -->
                        </div>
                        <!-- end /.sidebar-card -->

                        <div class="author-card sidebar-card ">
                            <div class="card-title">
                                <h4>Product Information</h4>
                            </div>

                            <div class="author-infos">
                                <div class="author_avatar">
                                    <img src="{{ URL::to('/') }}/storage/images/profile_image/{{ $profile->profile_image }}"
                                         alt="user avatar">
                                </div>

                                <div class="author">
                                    <h4>{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</h4>
                                    <p>Signed Up: {{ $profile->created_at }}</p>
                                </div>
                                <!-- end /.author -->

                                <div class="author-btn">
                                    <a href="{{ route('profile.show', ['profile' => $profile])}}"
                                       class="btn btn--sm btn--round">View Profile</a>
                                </div>
                                <!-- end /.author-btn -->
                            </div>
                            <!-- end /.author-infos -->


                        </div>
                        <!-- end /.author-card -->
                    </aside>
                    <!-- end /.aside -->
                </div>
                <!-- end /.col-md-4 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    <!--===========================================
        END SINGLE PRODUCT DESCRIPTION AREA
    ===============================================-->

@endsection