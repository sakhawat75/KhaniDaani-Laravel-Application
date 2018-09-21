@extends ('layouts.master')

@section ('title', 'Delivery services')

@section ('content')

    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area title-hide">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">{{ $user->name }} Dishes</h1>
                </div>
            </div>
        </div>
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
            @include( 'includes.profile_sidebar' )
                <!-- end /.sidebar -->
                <div class="col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-md-12" id="chefdish">
                                <div class="filter-bar clearfix filter-bar2">
                                    <div class="filter__option filter--text pull-left">
                                        <p>
                                            <span> {{ $profile->user->name }}</span> All Dishes</p>
                                    </div>

                                    <div class="pull-right">

                                    </div>
                                    <!-- end /.pull-right -->
                                </div>
                                <!-- end filter-bar -->
                            </div>
                            <!-- end /.col-md-12 -->

                            @foreach($dishes as $dish)
                            <div class="col-lg-6 col-md-6">
                                <!-- start .single-product -->
                                <div class="product product--card">
                                    <div class="product__thumbnail">
                                        <div class="aspect_ratio"> <img src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_thumbnail }}" alt="Product Image" class="ratio_img"> </div>
                                        <div class="prod_btn"> 
                                        <a href="{{ route('dishes.show', ['id' => $dish]) }}" class="transparent btn--sm btn--round">More Info</a> 
                                        </div>
                                        <!-- end /.prod_btn -->
                                    </div>
                                    <!-- end /.product__thumbnail -->
                                    <div class="product-desc">
                                        <a href="{{ route('dishes.show', ['id' => $dish]) }}" class="product_title">
                                            <h4> {{ $dish->dish_name }} </h4> </a>
                                        <ul class="titlebtm">
                                            <li> <img class="auth-img" src="{{ route('home') }}/storage/images/profile_image/{{ $profile->profile_image }}" alt="author image">
                                                <p> <a href="{{ route('profile.show', [ 'profile' => $profile->id]) }}">{{ $user->name }}</a> </p>
                                            </li>
                                            <li class="product_cat a-color">
                                                    <span class="lnr lnr-map-marker"> <span>{{ $profile->city }}, </span><span>{{ $profile->area }}</span>
                                                    </span></li>
                                        </ul>
                                    </div>
                                    <!-- end /.product-desc -->
                                    <div class="product-purchase">
                                        <div class="price_love"> <span>৳{{ $dish->dish_price }}</span>
                                            <div class="rating product--rating pull-right">
                                                <ul>
                                                    @for ($i=1; $i <= 5; $i++)

                                                        <li>
                                                            @if($i <= round($dish->avg_rating))
                                                                <span class="fa fa-star"></span>
                                                            @else
                                                                <span class="fa fa-star-o"></span>
                                                            @endif
                                                        </li>

                                                    @endfor
                                                </ul>
                                            </div>

                                        </div>

                                        <div class="sell">
                                            <p>
                                                <span data-toggle="tooltip" data-placement="bottom" title="Total Dish Sale">
                      <i class="fa fa-paper-plane-o" style="color:#f64646" aria-hidden="true"></i>
                      <span>{{ count($dish->completed_orders) }}</span></span>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- end /.product-purchase -->
                                </div>
                                <!-- end /.single-product -->
                            </div> 
                            @endforeach 


                        </div>
                        <!-- end /.row -->
                    <div class="">
                        {{ $dishes->links() }}
                    </div>

                </div>
                <!-- end /.col-md-8 -->

            </div>
            <!-- end /.row -->

        </div>
    </section>
    <!--================================
     START SELF-ADS AREA
 =================================-->
    @include('includes.self_ads')
    <!--================================
    END SELF-ADS AREA
=================================-->
@endsection