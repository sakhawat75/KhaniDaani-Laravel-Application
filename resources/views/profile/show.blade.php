@extends ('layouts.master') @section ('title', 'Profile') @section ('content')


    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li> <a href="{{ route('home') }}">Home</a> </li>
                            <li class="active"> <a href="#">Profile</a> </li>
                        </ul>
                    </div>
                    <h1 class="page-title">{{ $user->name }}
                    {{--{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}--}} Profile</h1> </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    <!--================================
      END BREADCRUMB AREA
  =================================-->
   @include( 'includes.menu-dashboard' ) @if($flash = session('success'))
    <div class="alert alert-default" role="alert">{{ $flash }}</div> @endif @if($flash = session('prf_updated'))
    <div class="alert alert-default" role="alert"><span class="alert_icon lnr lnr-checkmark-circle"></span>{{ $flash }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span class="lnr lnr-cross" aria-hidden="true"></span> </button>
    </div> @endif
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
                                {{ $user->name }} {{--{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}--}}
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
                                    <label for="opt1"> <span class="circle"></span>Khanidaani Chef</label>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-card author-menu">
                            <ul>
                                <li> <a href="{{ route('profile.show', ['profile' => $profile->id]) }}">User Profile</a> </li>
                                <li> <a href="{{ route('profile.chefdishes', [ 'profile' => $profile->id]) }}">Chef Dish</a> </li>
                                <li> <a href="{{ route('profile.chefdelivery', ['user' => $profile->user]) }}">Delivery Option</a> </li>
                                <li> <a href="{{ route('profile.pickerspoint', ['user' => $profile->user]) }}">Pickers Point</a> </li>
                            </ul>
                        </div>
                    </aside>
                    <aside class="sidebar sidebar_author">
                        <div class="sidebar-card message-card">
                            <div class="card-title">
                                <h4>Contact Chef</h4> </div>
                            <div class="message-form">
                                <form action="#">
                                    <div class="form-group">
                                        <textarea name="message" class="text_field" id="author-message" placeholder="Your message..."></textarea>
                                    </div>
                                    <div class="msg_submit">
                                        <button type="submit" class="btn btn--md btn--round"  id="send_msg">send message</button>
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
                                <h3>{{ count($dishes) }}</h3> </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="author-info pcolorbg">
                                <p>Total sales</p>
                                <h3>{{ $total_sales }}</h3> </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="author-info scolorbg">
                                <p>Total Ratings</p>
                                <div class="rating product--rating">
                                    <ul>
                                        @for ($i=1; $i <= 5; $i++)
                        
                                          <li>
                                            @if($i <= $total_ratings)
                                              <span class="fa fa-star"></span>
                                            @else
                                              <span class="fa fa-star-o"></span>
                                            @endif
                                          </li>

                                        @endfor
                                    </ul> <span class="rating__count">({{ $total_ratings_count }})</span> </div>
                            </div>
                        </div>
                        <!-- SALE STATUS -->
                        <div class="col-md-12 col-sm-12">
                            <!--<div class="author_module aspect_ratio">
                <img src="{{ route('home') }}/storage/images/cover_image/{{ $profile->cover_image }}"
                     alt="author image" class="ratio_img">
              </div>  -->
                            <div class="author_module about_author">
                                <h4> About {{ $user->name }}</h4>
                                <div class="brdr_btm"></div>
                                <p> {!! $profile->description !!} </p>
                            </div>
                        </div>
                    </div>
                    <!-- end /.row -->


                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-title-area">
                                <div class="product__title">
                                    <h2>{{ $user->name }} {{--{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}--}} Dishes</h2> </div> <a href="#" class="btn btn--sm">See all Dishes</a> </div>
                            <!-- end /.product-title-area -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <!-- start .single-product -->
                            <div class="product product--card">
                                <div class="product__thumbnail">
                                    <div class="aspect_ratio"> <img src="{{ asset('images/d.jpg') }}" alt="Product Image" class="ratio_img"> </div>
                                    <div class="prod_btn"> <a href="{{ route('dishes.create') }}" class="transparent btn--sm btn--round">Add Now
                            </a> </div>
                                    <!-- end /.prod_btn -->
                                </div>
                                <!-- end /.product__thumbnail -->
                                <div class="product-desc">
                                    <a href="{{ route('dishes.create') }}" class="product_title">
                                        <h4> Add your own dishes </h4> </a>
                                        <ul class="titlebtm">
                                <li> <img class="auth-img" src="{{ route('home') }}/storage/images/profile_image/{{ $profile->profile_image }}" alt="author image">
                                            <p> <a href="#">{{ $user->name }}</a> </p>
                                        </li>
                                <li class="product_cat"> <a href="#">
                                            From <span>Sylhet</span></a> </li>
                            </ul>
                                </div>
                                
                                <div class="product-purchase ">
                            <div class="price_love"> <span>৳00</span>
                                <p> <span class="lnr lnr-heart "></span> 0</p>
                            </div>
                            {{-- <div class="rating product--rating pull-right">
                                <ul>
                                    <li> <span class="fa fa-star-o"></span> </li>
                                    <li> <span class="fa fa-star-o"></span> </li>
                                    <li> <span class="fa fa-star-o"></span> </li>
                                    <li> <span class="fa fa-star-o"></span> </li>
                                    <li> <span class="fa fa-star-o"></span> </li>
                                </ul>
                            </div> --}}
                        </div>
                            </div>
                            
                            <!-- end /.single-product -->
                        </div> 

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
                                        <li class="product_cat"> <a href="#">
                          From <span>{{ $profile->city }}, </span><span>{{ $profile->area }}</span></a> </li>
                                    </ul>
                                </div>
                                <!-- end /.product-desc -->
                                <div class="product-purchase">
                                    <div class="price_love"> <span>৳{{ $dish->dish_price }}</span>
                                        <p> <span class="lnr lnr-heart"></span> 0</p>
                                    </div>
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
                                <!-- end /.product-purchase -->
                            </div>
                            <!-- end /.single-product -->
                        </div> 
                        @endforeach 
                    </div>
                    <!-- end /.row -->
                </div>
                <!-- end /.col-md-8 -->
            </div>
            <!-- end /.row -->
        </div>
    </section>
    <div id="snackbar">Snackbar</div>

@endsection


@push ('head-css')
  <style type="text/css">
    #snackbar {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #333;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 30px;
        font-size: 17px;
      }

      #snackbar.show {
        visibility: visible;
        -webkit-animation: fadein 0.3s, fadeout 0.3s 1.3s;
        animation: fadein 0.3s, fadeout 0.3s 1.3s;
      }

      @-webkit-keyframes fadein {
        from {
          bottom: 0;
          opacity: 0;
        }
        to {
          bottom: 30px;
          opacity: 1;
        }
      }

      @keyframes fadein {
        from {
          bottom: 0;
          opacity: 0;
        }
        to {
          bottom: 30px;
          opacity: 1;
        }
      }

      @-webkit-keyframes fadeout {
        from {
          bottom: 30px;
          opacity: 1;
        }
        to {
          bottom: 0;
          opacity: 0;
        }
      }

      @keyframes fadeout {
        from {
          bottom: 30px;
          opacity: 1;
        }
        to {
          bottom: 0;
          opacity: 0;
        }
      }
  </style>
@endpush


@push('scripts-footer-bottom-2')
<style type="text/css">
  
</style>

<script type="text/javascript">
  $(document).ready( function () {
    //snackbar
    function snackbar($msg) {
        $('#snackbar').html($msg);
        $('#snackbar').toggleClass('show');
        setTimeout(function () {
            $('#snackbar').removeClass('show');
        }, 1600);
    }


    //send message
    $('#send_msg').click(function(e) {
        e.preventDefault();
      var body = $('#author-message').val();
      $('#author-message').val(' ');

      $.ajax({
        url: '{{ route('messages.store') }}',
        method: "POST",
        data: {
          '_token': '{{ csrf_token() }}',
          'sender_id': {{ auth()->id() }},
          'recipient_id': {{ $profile->id }},
          'body': body,
        },
      }).done( function(data) {
          console.log("data: " + data);
          snackbar('Message Sent Successfully');

      });
    });
  });
</script>

@endpush