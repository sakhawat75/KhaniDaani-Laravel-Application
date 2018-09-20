@extends ('layouts.master')

@section ('title', 'Dish Details')

@section ('content')

    <section class="breadcrumb-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="breadcrumb">
              <ul class="text-white">
                <li>
                  {{ $dish->dish_category }}
                </li>
                <li>
                  {{ $dish->dish_subcategory }}
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

    {{--@if($flash = session('success'))
     <div class="alert alert-success" role="alert">{{ $flash }}</div>
    @endif--}}
    <!--============================================
        START SINGLE PRODUCT DESCRIPTION AREA
    ==============================================-->
    <section class="single-product-desc">
      <div class="container">
        @include ('includes.success_message')
        @include ('includes.error_messeages')
        <div class="row">
          <div class="col-lg-8">
            <div class="item-preview">
              <div class="item__preview-slider">
                <div class="prev-slide">
                  <div class="aspect_ratio">
                    <img
                            @if ($dish->dish_image_1)
                            src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_image_1 }}"
                            @else
                            src="{{ route('home') }}/images/cvrplc.jpg"
                            @endif
                         alt="the preview is just missing." class="ratio_img">
                  </div>
                </div>
                <div class="prev-slide">
                  <div class="aspect_ratio">
                    <img
                            @if ($dish->dish_image_2)
                            src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_image_2 }}"
                            @else
                            src="{{ route('home') }}/images/cvrplc.jpg"
                            @endif
                         alt="the preview is just missing." class="ratio_img">
                  </div>
                </div>
                <div class="prev-slide">
                  <div class="aspect_ratio">
                    <img
                            @if ($dish->dish_image_3)
                            src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_image_3 }}"
                            @else
                            src="{{ route('home') }}/images/cvrplc.jpg"
                            @endif
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
                        <img
                                @if ($dish->dish_image_1)
                                src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_image_1 }}"
                                @else
                                src="{{ route('home') }}/images/cvrplc.jpg"
                                @endif
                             alt="This is the thumbnail of the item" class="ratio_img">
                      </div>
                    </div>
                    <div class="item-thumb">
                      <div class="aspect_ratio">
                        <img @if ($dish->dish_image_2)
                             src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_image_2 }}"
                             @else
                             src="{{ route('home') }}/images/cvrplc.jpg"
                             @endif
                             alt="This is the thumbnail of the item" class="ratio_img">
                      </div>
                    </div>
                    <div class="item-thumb">
                      <div class="aspect_ratio">
                        <img
                                @if ($dish->dish_image_3)
                                src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_image_3 }}"
                                @else
                                src="{{ route('home') }}/images/cvrplc.jpg"
                                @endif
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


                {{--<div class=" item-action item_social_share">
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

                </div>--}}
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
                         data-toggle="tab">Details Info
                      </a>
                    </li>
                    <li>
                      <a href="#product-review" aria-controls="product-review" role="tab" data-toggle="tab">Reviews
                        <span>({{ count($ratings) }})</span>
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

                    {{--<h2>Dish Ingredients</h2>
                    <ul>
                      <li>Peanut oil</li>
                      <li>Natural yogurt</li>
                      <li>Black pepper</li>
                      <li>Cornflour</li>
                    </ul>--}}
                  </div>
                </div>

                <div class="fade tab-pane product-tab" id="product-review">
                  <div class="thread thread_review">
                    <ul class="media-list thread-list">
                      

                      @foreach($ratings as $rating)

                        <li class="single-thread">
                          <div class="media">
                            <div class="media-left">

                                <img class="media-object" src="{{ route('home') }}/storage/images/profile_image/{{ $rating->order->buyer->profile->profile_image }}"
                                     alt="Commentator Avatar">

                            </div>
                            <div class="media-body">
                              <div class="clearfix">
                                <div class="pull-left">
                                  <div class="media-heading">
                                    <a href="{{ route('profile.show', ['id' => $rating->order->buyer->id])}}">
                                      <h4>{{ $rating->order->buyer->name }}</h4>
                                    </a>
                                    <span>{{ $rating->created_at->diffForHumans() }}</span>
                                  </div>
                                  <div class="rating product--rating">
                                    <ul>
                                      @for ($i=1; $i <= 5; $i++)
                        
                                      <li>
                                        @if($i <= $rating->rating)
                                          <span class="fa fa-star"></span>
                                        @else
                                          <span class="fa fa-star-o"></span>
                                        @endif
                                      </li>

                                      @endfor
                                    </ul>
                                  </div>
                                </div>
                                {{-- <a href="#" class="reply-link">Reply</a> --}}
                              </div>
                              <p>{{ $rating->comment }}</p>
                            </div>
                          </div>

                          {{-- <!-- nested comment markup -->
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
                          </ul> --}}

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
                      @endforeach

                      {{-- <li class="single-thread">
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
                      <!-- end single comment thread /.comment--> --}}
                    </ul>
                    <!-- end /.media-list -->

                    {{--<div class="pagination-area pagination-area2">
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

                      {{ $ratings->links() }}
                    </div>--}}
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
                    ৳<span>{{ $dish->dish_price }}</span>
                  </h1>
                </div>
                <div class="sidebar-card card--metadata">
                  <ul class="data">
                    <li>
                      <p>
                        <span class="lnr lnr-cart pcolor"></span>Preparation Time</p>
                      <span>{{ $dish->preparation_time }} Hours</span>
                    </li>
                    <li>
                      <p>
                        <span class="lnr lnr-heart scolor"></span>Total Delivery Option</p>
                      <span>6</span>
                    </li>
                    {{-- <li>
                      <p>
                        <span class="lnr lnr-cart scolor"></span>Delivery Charge</p>
                      <span>{{  }}</span>
                    </li> --}}
                  </ul>

                </div>
                <!-- end /.sidebar-card -->

                <div class="purchase-button">
                  <form action="{{ route('order.selectdsp', ['dish' => $dish]) }}" method="get">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn--lg btn--round"
                    @if(auth()->id() == $dish->profile->user_id)
                      disabled="disabled"
                    @endif
                    >Order Now</button>
                  </form>
                  {{--<a href="{{ route('order.selectdsp') }}" class="btn btn--lg btn--round">Order Now</a>--}}
                </div>
                <!-- end /.purchase-button -->
              </div>
              <!-- end /.sidebar--card -->

              <div class="sidebar-card card--metadata">
                <ul class="data">
                  <li>
                    <p>
                      <span class="lnr lnr-cart pcolor"></span>Total Sales</p>
                    <span>{{ count($dish->completed_orders) }}</span>
                  </li>
                 {{-- <li>
                    <p>
                      <span class="lnr lnr-heart scolor"></span>Favorites</p>
                    <span>0</span>
                  </li>--}}
                   <li>
                    <p>
                      <span class="lnr lnr-bubble mcolor3"></span>Rating</p>
                    <span><div class="rating product--rating s-dish-rating">
                  <ul>
                    @for ($i=1; $i <= $avg_rating; $i++)
                      <li>
                        <span class="fa fa-star"></span>
                      </li>
                    @endfor

                    @if($half_star)
                      <li>
                        <span class="fa fa-star-half-o"></span>
                      </li>
                      @for ($j=1; $j <= 4 - $avg_rating; $j++)
                        <li>
                          <span class="fa fa-star-o"></span>
                        </li>
                      @endfor

                    @else
                      @for ($k=1; $k <= 5 - $avg_rating; $k++)
                        <li>
                          <span class="fa fa-star-o"></span>
                        </li>
                      @endfor
                    @endif

                  </ul>
                  <span class="rating__count">( {{count($ratings)}})</span>
                </div> </span>
                  </li>
                </ul>
              </div>
              <!-- end /.sidebar-card -->
              <aside class="sidebar sidebar_author" >
                @include( 'includes.author_info' )
              </aside>
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



    <div id="snackbar">Snackbar</div>
@endsection

@push('scripts-footer-bottom-2')
<style type="text/css">
  #messageModalLabel {
    margin-bottom: 0;
  }
  #messageModal .modal-header {
    display: inherit;
  }
</style>

<script type="text/javascript">
  $(document).ready( function () {

    //messaging
    var msg_template = _.template(
        $('#message_preview_template').html()
    );

    var renderMessages = function(notifis) {
      var unread_count_msg = 0;
        _.each(notifis.data, function(notify) {

          $('.msg_dynamic').append(msg_template(notify));

          _.each(notify.mb, function (m_body) {
            if({{ auth()->id() }} != m_body.sender_id) {
              if(m_body.read_at == null) {
                unread_count_msg++;
              }
            }
            

          });
            
        });
        $("#count_msg").text(unread_count_msg);
    };
    //load messages
    var loadMessages = function () {
        
            $.ajax({
                url: "{{ route('messages.getMessages') }}",
                cached: false
            }).done( function (res) {
                $('.msg_dynamic').html(' ');
                // console.log('msg: ' + res.data[0].mb[0].body);
                 renderMessages(res);
                /*$.each( res.data, function( key, value ) {
                  console.log('msg_id: ' + value.id);
                  //console.log('msg_body: ' + value.mb[0].body);
                  $.each(value.mb, function(index, m_body) {
                      console.log('msg_body: ' + m_body.body);
                  });
                });*/
            });
    }

  });
</script>
@endpush