@extends ('layouts.master')


@section ('title', 'Welcome')

@section ('content')

  <!--================================
    START HERO AREA
=================================-->
  <section class="hero-area hero--2 bgimage">
    <div class="bg_image_holder">
      <img src="{{ route('home') }}/images/hero_area_bg3.jpg" alt="kd">
    </div>

    <!-- start hero-content -->
    <div class="hero-content">
      <!-- start .contact_wrapper -->
      <div class="content-wrapper">
        <!-- start .container -->
        <div class="container">
          <!-- start row -->
          <div class="row">
            <!-- start col-md-12 -->
            <div class="col-md-6">
              <div class="hero__content__title">
                <h1>
                  Sell Your Special Dishes Near You or Buy Variety of Dishes.
                </h1>
                <p class="tagline">Subtitle</p>
              </div>

              <!-- start .hero__btn-area-->
              <div class="hero__btn-area">
                <a href="#" class="btn btn--round btn--lg">View All Dishes</a>
                <a href="#" class="btn btn--round btn--lg">Popular Dishes</a>
              </div>
              <!-- end .hero__btn-area-->
            </div>
            <!-- end /.col-md-12 -->
          </div>
          <!-- end /.row -->
        </div>
        <!-- end /.container -->
      </div>
      <!-- end .contact_wrapper -->
    </div>
    <!-- end hero-content -->

    <!--start search-area -->
    <div class="search-area">
      <!-- start .container -->
      <div class="container">
        <!-- start .container -->
        <div class="row">
          <!-- start .col-sm-12 -->
          <div class="col-sm-12">
            <!-- start .search_box -->
            <div class="search_box">
              <form action="#">
                <input type="text" class="text_field" placeholder="Search your Dishes">
                <div class="search__select">
                  <select name="category" class="select--field" id="cat">
                    <option value="">All Categories</option>
                    <option value="">Tandori</option>
                    <option value="">Pizza</option>
                    <option value="">Pasta</option>
                  </select>
                </div>
                <div class="search__select">
                  <select name="category" class="select--field" id="cat">
                    <option value="">Area</option>
                    <option value="">Sylhet</option>
                    <option value="">Dhaka</option>

                  </select>
                </div>

                <button type="submit" class="search-btn btn--lg">Search Now</button>
              </form>
            </div>
            <!-- end ./search_box -->
          </div>
          <!-- end /.col-sm-12 -->
        </div>
        <!-- end /.row -->
      </div>
      <!-- end /.container -->
    </div>
    <!--start /.search-area -->
  </section>
  <!--================================
      END HERO AREA
  =================================-->

  <!--================================
      START FEATURED PRODUCT AREA
  =================================-->
  <section class="featured-products bgcolor2 section--padding">
    <div class="container">
      <div class="row">
        <!-- start col-md-12 -->
        <div class="col-md-12">
          <div class="section-title">
            <h1>Our Featured
              <span class="highlighted">Dish</span>
            </h1>
            <p>Subtitle</p>
          </div>
        </div>
        <!-- end /.col-md-12 -->
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="featured-product-slider prod-slider2">
            <div class="featured__single-slider">
              <div class="featured__preview-img">
                <img src="{{ route('home') }}/images/f1.jpg" alt="Featured products" class="img-fluid">
              </div>
              <!-- end /.featured__preview-img -->

              <div class="featured__product-description">
                <div class="product-desc desc--featured">
                  <a href="{{ route('home')}}" class="product_title">
                    <h4>Indina Butter Chicken</h4>
                  </a>
                  <ul class="titlebtm">
                    <li>
                      <img class="auth-img" src="{{ route('home') }}/images/auth.jpg" alt="author image">
                      <p>
                        <a href="#">KhaniDaani</a>
                      </p>
                    </li>
                  </ul>
                  <!-- end /.titlebtm -->

                  <p>Chicken Makhani is one of my favorite Indian dishes. It is a full flavored dish that complements
                    the chicken well. It can be made as mild or spicy as you wish by adjusting the cayenne. Serve with
                    basmati rice and naan bread.</p>
                </div>
                <!-- end /.product-desc -->

                <div class="product_data">
                  <div class="tags tags--round">
                    <ul>
                      <li>
                        <a href="#">pizza</a>
                      </li>
                      <li>
                        <a href="#">pasta</a>
                      </li>
                      <li>
                        <a href="#">roast</a>
                      </li>
                    </ul>
                  </div>
                  <!-- end /.tags -->
                  <div class="product-purchase featured--product-purchase">
                    <div class="price_love">
                      <span>৳320</span>
                      <p>
                        <span class="lnr lnr-heart"></span> 90</p>
                    </div>
                    <div class="sell">
                      <p>
                        <span class="lnr lnr-cart"></span>
                        <span>16</span>
                      </p>
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
                          <span class="fa fa-star"></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- end /.product-purchase -->
                </div>
              </div>
              <!-- end /.featured__product-description -->
            </div>
            <!--end /.featured__single-slider-->
            <div class="featured__single-slider">
              <div class="featured__preview-img">
                <img src="{{ route('home') }}/images/f1.jpg" alt="Featured products" class="img-fluid">
              </div>
              <!-- end /.featured__preview-img -->

              <div class="featured__product-description">
                <div class="product-desc desc--featured">
                  <a href="{{ route('home')}}" class="product_title">
                    <h4>Indina Butter Chicken</h4>
                  </a>
                  <ul class="titlebtm">
                    <li>
                      <img class="auth-img" src="{{ route('home') }}/images/auth.jpg" alt="author image">
                      <p>
                        <a href="#">KhaniDaani</a>
                      </p>
                    </li>
                  </ul>
                  <!-- end /.titlebtm -->

                  <p>Chicken Makhani is one of my favorite Indian dishes. It is a full flavored dish that complements
                    the chicken well. It can be made as mild or spicy as you wish by adjusting the cayenne. Serve with
                    basmati rice and naan bread.</p>
                </div>
                <!-- end /.product-desc -->

                <div class="product_data">
                  <div class="tags tags--round">
                    <ul>
                      <li>
                        <a href="#">pizza</a>
                      </li>
                      <li>
                        <a href="#">pasta</a>
                      </li>
                      <li>
                        <a href="#">roast</a>
                      </li>
                    </ul>
                  </div>
                  <!-- end /.tags -->
                  <div class="product-purchase featured--product-purchase">
                    <div class="price_love">
                      <span>৳320</span>
                      <p>
                        <span class="lnr lnr-heart"></span> 90</p>
                    </div>
                    <div class="sell">
                      <p>
                        <span class="lnr lnr-cart"></span>
                        <span>16</span>
                      </p>
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
                          <span class="fa fa-star"></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- end /.product-purchase -->
                </div>
              </div>
              <!-- end /.featured__product-description -->
            </div>
            <!--end /.featured__single-slider-->


            <div class="featured__single-slider">
              <div class="featured__preview-img">
                <img src="images/f1.jpg" alt="Featured products" class="img-fluid">
              </div>
              <!-- end /.featured__preview-img -->

              <div class="featured__product-description">
                <div class="product-desc desc--featured">
                  <a href="{{ route('home')}}" class="product_title">
                    <h4>Indina Butter Chicken</h4>
                  </a>
                  <ul class="titlebtm">
                    <li>
                      <img class="auth-img" src="images/auth.jpg" alt="author image">
                      <p>
                        <a href="#">KhaniDaani</a>
                      </p>
                    </li>
                  </ul>
                  <!-- end /.titlebtm -->

                  <p>Chicken Makhani is one of my favorite Indian dishes. It is a full flavored dish that complements
                    the chicken well. It can be made as mild or spicy as you wish by adjusting the cayenne. Serve with
                    basmati rice and naan bread.</p>
                </div>
                <!-- end /.product-desc -->

                <div class="product_data">
                  <div class="tags tags--round">
                    <ul>
                      <li>
                        <a href="#">pizza</a>
                      </li>
                      <li>
                        <a href="#">pasta</a>
                      </li>
                      <li>
                        <a href="#">roast</a>
                      </li>
                    </ul>
                  </div>
                  <!-- end /.tags -->
                  <div class="product-purchase featured--product-purchase">
                    <div class="price_love">
                      <span>৳320</span>
                      <p>
                        <span class="lnr lnr-heart"></span> 90</p>
                    </div>
                    <div class="sell">
                      <p>
                        <span class="lnr lnr-cart"></span>
                        <span>16</span>
                      </p>
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
                          <span class="fa fa-star"></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- end /.product-purchase -->
                </div>
              </div>
              <!-- end /.featured__product-description -->
            </div>
            <!--end /.featured__single-slider-->
          </div>
          <span class="lnr lnr-chevron-left prod_slide_prev"></span>
          <span class="lnr lnr-chevron-right prod_slide_next"></span>
        </div>
      </div>
      <!-- end /.featured__preview-img -->
    </div>
    <!-- end /.featured-product-slider -->
  </section>
  <!--================================
      END FEATURED PRODUCT AREA
  =================================-->


  <!--================================
      START PRODUCTS AREA
  =================================-->
  <section class="products section--padding">
    <!-- start container -->
    <div class="container">
      <!-- start row -->
      <div class="row">
        <!-- start col-md-12 -->
        <div class="col-md-12">
          <div class="product-title-area">
            <div class="product__title">
              <h2>Newest Release Products</h2>
            </div>

            <div class="filter__menu">
              <p>Filter by:</p>
              <div class="filter__menu_icon">
                <a href="#" id="drop1" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                  <img class="svg" src="images/svg/menu.svg" alt="menu icon">
                </a>

                <ul class="filter_dropdown dropdown-menu" aria-labelledby="drop1">
                  <li>
                    <a href="#">Trending items</a>
                  </li>
                  <li>
                    <a href="#">Best seller</a>
                  </li>
                  <li>
                    <a href="#">Best rating</a>
                  </li>
                  <li>
                    <a href="#">Low price</a>
                  </li>
                  <li>
                    <a href="#">High price</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- end /.col-md-12 -->
      </div>
      <!-- end /.row -->

      <!-- start .row -->
      <div class="row">
        @if(isset($dishes))
          @foreach($dishes as $dish)
            <div class="col-lg-4 col-md-4">
              <!-- start .single-product -->
              <div class="product product--card">

                <div class="product__thumbnail">
                  <div class="aspect_ratio">
                    <img src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_thumbnail }}"
                         alt="Product Image" class="ratio_img">
                  </div>

                  <div class="prod_btn">
                    <a href="{{ route('dishes.show', ['id' => $dish]) }}" class="transparent btn--sm btn--round">More
                      Info
                    </a>
                  </div>
                  <!-- end /.prod_btn -->
                </div>
                <!-- end /.product__thumbnail -->

                <div class="product-desc">
                  <a href="{{ route('dishes.show', ['id' => $dish]) }}" class="product_title">
                    <h4> {{ $dish->dish_name }} </h4>
                  </a>
                  <ul class="titlebtm">
                    <li>
                      <img class="auth-img"
                           src="{{ route('home') }}/storage/images/profile_image/{{  $dish->profile->profile_image }}"
                           alt="author image">
                      <p>
                        <a href="#">{{  $dish->profile->user_name }}</a>
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
                    <span>৳{{ $dish->dish_price }}</span>
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
          @endforeach
        @endif

      </div>

      <!-- start .row -->
      <div class="row">
        <div class="col-md-12">
          <div class="more-product">
            <a href="all-products.html" class="btn btn--lg btn--round">All New Products</a>
          </div>
        </div>
        <!-- end ./col-md-12 -->
      </div>
      <!-- end /.row -->
    </div>
    <!-- end /.container -->
  </section>
  <!--================================
      END PRODUCTS AREA
  =================================-->

  <!--================================
      START CALL TO ACTION AREA
  =================================-->
  <section class="call-to-action bgimage">
    <div class="bg_image_holder">
      <img src="images/calltobg.jpg" alt="">
    </div>
    <div class="container content_above">
      <div class="row">
        <div class="col-md-12">
          <div class="call-to-wrap">
            <h1 class="text--white">Ready to Join Our KhaniDaani Community!</h1>
            <h4 class="text--white">Subtitle</h4>
            <a href="{{ route('register') }}" class="btn btn--lg btn--round btn--white callto-action-btn">Join Us
              Today
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================================
      END CALL TO ACTION AREA
  =================================-->

@endsection