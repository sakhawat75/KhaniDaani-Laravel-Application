@extends ('layouts.master')

@section ('title', 'A Freelance based cooking service!')

@section ('content')

  <section class="hero-area  bgimage">
    <div class="bg_image_holder">
      <img src="/images/hero_area_bg3.jpg" alt="area bd missing">
    </div>
    <!-- start hero-content -->
    <div class="hero-content content_above">
      <!-- start .contact_wrapper -->
      <div class="content-wrapper">
        <!-- start .container -->
        <div class="container">
          <!-- start row -->
          <div class="row">
            <!-- start col-md-12 -->
            <div class="col-md-12">
              <div class="hero__content__title">
                <h1>
                  About
                </h1>
                <p class="tagline">KhaniDaani is a freelance marketplace for chef & foodies. Here all housewives and potential cooks can earn bucks by selling their own food item(s) from anywhere. </p>
                  <p class="tagline s-hide mg-about">
                      The delivery system for any ordered food item will be in different methods such as - pick-up point delivery, an individual serving as a deliverer or any authorized food delivery system (for example -Food Panda, i-serve etc.).
                  </p>
              </div>
              <!-- start .hero__btn-area-->
              <div class="hero__btn-area">
                <a href="{{ route('register') }}" class="btn btn--round btn--lg">Join</a>
                <a href="{{ route('search.livedish') }}" class="btn btn--round btn--lg">View All Dishes</a>
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
{{--    <div class="search-area">
      <!-- start .container -->
      <div class="container">
        <!-- start .container -->
        <div class="row">
          <!-- start .col-sm-12 -->
          <div class="col-sm-12">
            <!-- start .search_box -->
            <div class="search_box">
              <form action="{{ route('search.livedish') }}" method="get">
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
    </div>--}}
    <!--start /.search-area -->
  </section>
  <!--================================
      START FEATURED DISHES AREA
  =================================-->
  <section class="featured-products bgcolor2 section--padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title">
            <h1>
              <span class="highlighted">Featured</span>Dish
            </h1>
            <p>Best trusted & hand-picked dishes by KhaniDaani</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="featured-product-slider prod-slider2">
            @foreach($featured_dishes as $fd)
              <div class="featured__single-slider">
                <div class="featured__preview-img">
                  <img src="{{ route('home') }}/storage/images/dish_images/{{ $fd->dish->dish_image_1 }}"
                       alt="Featured products" class="img-fluid">
                </div>
                <!-- end /.featured__preview-img -->
                <div class="featured__product-description">
                  <div class="product-desc desc--featured">
                    <a href="{{ route('dishes.show', ['id' => $fd->dish->id])}}" class="product_title">
                      <h4>{{ $fd->dish->dish_name }}</h4>
                    </a>

                    <ul class="titlebtm">
                      <li>
                        <img class="auth-img"
                             src="{{ route('home') }}/storage/images/profile_image/{{ $fd->dish->profile->profile_image }}"
                             alt="author image">
                        <p>
                          <a href="{{ route('profile.show', ['profile' => $fd->dish->profile->id]) }}">{{ $fd->dish->profile->user_name }}</a>
                        </p>
                      </li>
                      <li class="product_cat a-color">
                        <span class="lnr lnr-map-marker"></span><span>{{ $fd->dish->profile->city }},</span><span>{{ $fd->dish->profile->area }}</span></li>
                    </ul>
                    <p class="s-hide">{!! $fd->dish->dish_description !!}</p>
                  </div>

                  <div class="product_data">
                    <div class="tags tags--round">
                      <ul>
                        <li>
                          <a href="#">{{ $fd->dish->dish_category }}</a>
                        </li>
                        <li>
                          <a href="#">{{ $fd->dish->dish_subcategory }}</a>
                        </li>
                      </ul>
                    </div>
                    <!-- end /.tags -->
                    <div class="product-purchase featured--product-purchase">
                      <div class="price_love">
                        <span>৳{{ $fd->dish->dish_price }}</span>

                      </div>
                      <div class="sell">
                        <p>
                          <span data-toggle="tooltip" data-placement="bottom" title="Total Dish Sale">
                      <i class="fa fa-paper-plane-o" style="color:#f64646" aria-hidden="true"></i>
                      <span>{{ count($fd->dish->completed_orders) }}</span></span>
                        </p>
                      </div>
                      {{--Start Rating Area--}}
                      <div class="rating product--rating">
                        <ul>
                          @for ($i=1; $i <= 5; $i++)
                            @if($i <= round($fd->dish->avg_rating))
                              <li>
                                <span class="fa fa-star"></span>
                              </li>
                            @else
                              <li>
                                <span class="fa fa-star-o"></span>
                              </li>
                            @endif
                          @endfor
                        </ul>
                      </div>
                      {{--End Rating Area--}}
                    </div>
                    <!-- end /.product-purchase -->
                  </div>
                </div>
                <!-- end /.featured__product-description -->
              </div>
              <!--end /.featured__single-slider-->
            @endforeach
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
      END FEATURED DISH AREA
  =================================-->

  <!--================================
      START New Dish AREA
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
              <h2>New Dishes</h2>
            </div>
            <div class="filter__menu s-hide">
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
                        <a href="{{ route('profile.show', ['profile' => $dish->profile->id]) }} #profile">{{  $dish->profile->user_name }}</a>
                      </p>
                    </li>
                    <li class="product_cat a-color">
                      <span data-toggle="tooltip" data-placement="bottom" title="Chef Location">
                                                    <span class="lnr lnr-map-marker"> <span>{{ $dish->profile->city }}, </span><span>{{ $dish->profile->area }}</span>
                                                    </span></span></li>
                  </ul>
                </div>
                <!-- end /.product-desc -->

                <div class="product-purchase">
                  <div class="price_love">
                    <span>৳{{ $dish->dish_price }}</span>
                  </div>


                  <div class="sell">
                    <p>
                      <span data-toggle="tooltip" data-placement="bottom" title="Total Dish Sale">
                      <i class="fa fa-paper-plane-o" style="color:#f64646" aria-hidden="true"></i>
                      <span>{{ count($dish->completed_orders) }}</span></span>
                    </p>
                  </div>

                  {{--Start Rating Area--}}
                  <div class="rating product--rating">
                    <ul>
                      @for ($i=1; $i <= 5; $i++)
                        @if($i <= round($dish->avg_rating))
                          <li>
                            <span class="fa fa-star"></span>
                          </li>
                        @else
                          <li>
                            <span class="fa fa-star-o"></span>
                          </li>
                        @endif
                      @endfor
                    </ul>
                  </div>
                  {{--End Rating Area--}}
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
            <a href="{{route('search.livedish')}}" class="btn btn--lg btn--round">All New Dishes</a>
          </div>
        </div>
        <!-- end ./col-md-12 -->
      </div>
      <!-- end /.row -->
    </div>
    <!-- end /.container -->
  </section>
  <!--================================
      END New Dish AREA
  =================================-->

  <!--================================
      START SELF-ADS AREA
  =================================-->
@include('includes.self_ads')
  <!--================================
      END SELF-ADS AREA
  =================================-->
@endsection