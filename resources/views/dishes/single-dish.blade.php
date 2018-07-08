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
                  <a href="#">{{ $dish->dish_category }}</a>
                </li>
                <li>
                  <a href="#">{{ $dish->dish_subcategory }}</a>
                </li>
                <li class="active">
                  <a href="#">{{ $dish->dish_name }}</a>
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

    @if($flash = session('success'))
     <div class="alert alert-success" role="alert">{{ $flash }}</div>
    @endif
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
                  <div class="aspect_ratio">
                    <img src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_image_1 }}"
                         alt="the preview is just missing." class="ratio_img">
                  </div>
                </div>
                <div class="prev-slide">
                  <div class="aspect_ratio">
                    <img src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_image_2 }}"
                         alt="the preview is just missing." class="ratio_img">
                  </div>
                </div>
                <div class="prev-slide">
                  <div class="aspect_ratio">
                    <img src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_image_3 }}"
                         alt="the preview is just missing." class="ratio_img">
                  </div>
                </div>
              </div>
              <!-- end /.item--preview-slider -->

              <div class="item__preview-thumb">
                <div class="prev-thumb">
                  <div class="thumb-slider">
                    <div class="item-thumb">
                      <div class="aspect_ratio">
                        <img src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_image_1 }}"
                             alt="This is the thumbnail of the item" class="ratio_img">
                      </div>
                    </div>
                    <div class="item-thumb">
                      <div class="aspect_ratio">
                        <img src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_image_2 }}"
                             alt="This is the thumbnail of the item" class="ratio_img">
                      </div>
                    </div>
                    <div class="item-thumb">
                      <div class="aspect_ratio">
                        <img src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_image_3 }}"
                             alt="This is the thumbnail of the item" class="ratio_img">
                      </div>
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
                  <a href="#" class="btn btn--round btn--lg btn--icon">
                    <span class="lnr lnr-heart"></span>Add To Favorites
                  </a>
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
              <div class="tab">
                <div class="item-navigation">
                  <ul class="nav nav-tabs nav--tabs2">
                    <li>
                      <a href="#product-details" class="active" aria-controls="product-details" role="tab"
                         data-toggle="tab">Item Details
                      </a>
                    </li>
                    <li>
                      <a href="#product-review" aria-controls="product-review" role="tab" data-toggle="tab">Reviews
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
                    <p> {!! $dish->dish_description !!} </p>

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
                                      <span class="fa fa-star-o" aria-hidden="true"></span>
                                    </li>
                                    <li>
                                      <span class="fa fa-star-o" aria-hidden="true"></span>
                                    </li>
                                    <li>
                                      <span class="fa fa-star-o" aria-hidden="true"></span>
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
                              <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
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
                              <textarea class="bla" name="reply-comment" placeholder="Write your comment..."></textarea>
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
                  <br>
                </div>
                <div class="sidebar-card card--metadata">
                  <ul class="data">
                    <li>
                      <p>
                        <span class="lnr lnr-cart pcolor"></span>Preparation Time</p>
                      <span>{{ $dish->preparation_time }}</span>
                    </li>
                    <li>
                      <p>
                        <span class="lnr lnr-heart scolor"></span>Total Delivery Option</p>
                      <span>7</span>
                    </li>
                    <li>
                      <p>
                        <span class="lnr lnr-cart scolor"></span>Delivery Charge</p>
                      <span>5-6</span>
                    </li>
                  </ul>

                </div>
                <!-- end /.sidebar-card -->

                <div class="purchase-button">
                  <a href="{{ route('order.selectdsp') }}" class="btn btn--lg btn--round">Order Now</a>
                </div>
                <!-- end /.purchase-button -->
              </div>
              <!-- end /.sidebar--card -->

              <div class="sidebar-card card--metadata">
                <ul class="data">
                  <li>
                    <p>
                      <span class="lnr lnr-cart pcolor"></span>Total Sales</p>
                    <span>0</span>
                  </li>
                  <li>
                    <p>
                      <span class="lnr lnr-heart scolor"></span>Favorites</p>
                    <span>0</span>
                  </li>
                  <li>
                    <p>
                      <span class="lnr lnr-bubble mcolor3"></span>Comments</p>
                    <span>0</span>
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
                  <span class="rating__count">( 1 Ratings )</span>
                </div>
                <!-- end /.rating -->
              </div>
              <!-- end /.sidebar-card -->
              
              <div class="author-card sidebar-card">
              <div class="author-infos">
                <div class="author_avatar">
                  <img src="{{ route('home') }}/storage/images/profile_image/{{ $dish->profile->profile_image }}"
                       alt="Presenting the broken author avatar :D">
                </div>

                <div class="author">
                  <h4>
                    {{{ $dish->profile->user_name }}}
                  </h4>
                  <p>Joined {{ $dish->profile->created_at->toFormattedDateString() }}</p>
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