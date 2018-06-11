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
                <a href="{{ route('home') }}">Home</a>
              </li>
              <li class="active">
                <a href="#">Profile</a>
              </li>
            </ul>
          </div>
          <h1 class="page-title">{{ $user->name }}
                    {{--{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}--}} Profile</h1>
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
                  <img src="{{ route('home') }}/storage/images/profile_image/{{ $profile->profile_image }}"
                       alt="Presenting the broken author avatar :D">
                </div>

                <div class="author">
                  <h4>
                    {{ $user->name }}
                    {{--{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}--}}
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
    <!-- end /.author-card -->
            <!-- end /.author-menu -->
            <div class="author_module about_author">
              <h4> Chef Massage For You </h4>
              <div class="brdr_btm"></div>
              <p> {!! $profile->description !!} </p>
            </div>
            <!-- end /.freelance-status -->
          </aside>
        </div>
        <!-- end /.sidebar -->

        <div class="col-lg-8 col-md-12">
          <div class="row">
         <!--    <div class="col-md-12 col-sm-12">
              <div class="author_module aspect_ratio">
                <img src="{{ route('home') }}/storage/images/cover_image/{{ $profile->cover_image }}"
                     alt="author image" class="ratio_img">
              </div>
            </div> -->

            <div class="col-md-4 col-sm-4">
              <div class="author-info mcolorbg4">
                <p>Total Dish</p>
                <h3>{{ count($dishes) }}</h3>
              </div>
            </div>
            <!-- end /.col-md-4 -->
            <div class="col-md-4 col-sm-4">
              <div class="author-info pcolorbg">
                <p>Total sales</p>
                <h3>****</h3>
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
                  <span class="rating__count">(***)</span>
                </div>
              </div>
            </div>
            <!-- end /.col-md-4 -->
          </div>
          <!-- end /.row -->

          <div class="row">

            @foreach($dishes as $dish)
              <div class="col-lg-6 col-md-6">
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
                             src="{{ route('home') }}/storage/images/profile_image/{{ $profile->profile_image }}"
                             alt="author image">
                        <p>
                          <a href="#">{{ $user->name }}</a>
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
                  </div>
                  <!-- end /.product-purchase -->
                </div>
                <!-- end /.single-product -->
              </div>
            @endforeach
          </div>
          <!-- end /.row -->
        </div>
        <!-- end /.col-md-8 -->
  <div class="container">
       <aside class="sidebar sidebar_author">
        <div class="row">
            <div class="col-lg-4 col-md-12">
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
            </div>
         </div>
      </aside>
          </div>
      </div>
      <!-- end /.row -->
    </div>
    <!-- end /.container -->
  </section>
  <!--================================
      END AUTHOR AREA
  =================================-->

@endsection