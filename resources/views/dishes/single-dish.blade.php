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
                      

                      @foreach($ratings as $rating)

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
                                      <h4>{{ $rating->order->buyer_fullname }}</h4>
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

                    <div class="pagination-area pagination-area2">
                      {{-- <nav class="navigation pagination " role="navigation">
                        <div class="nav-links">
                          <a class="page-numbers current" href="#">1</a>
                          <a class="page-numbers" href="#">2</a>
                          <a class="page-numbers" href="#">3</a>
                          <a class="next page-numbers" href="#">
                            <span class="lnr lnr-arrow-right"></span>
                          </a>
                        </div>
                      </nav> --}}

                      {{ $ratings->links() }}
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
                    <button type="submit" class="btn btn--lg btn--round">Order Now</button>
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
                  <li>
                    <p>
                      <span class="lnr lnr-heart scolor"></span>Favorites</p>
                    <span>0</span>
                  </li>
                  {{-- <li>
                    <p>
                      <span class="lnr lnr-bubble mcolor3"></span>Comments</p>
                    <span>0</span>
                  </li> --}}
                </ul>


                <div class="rating product--rating">
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
                  <span class="rating__count">( {{count($ratings)}} Ratings )</span>
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
                    <div class="author-btn"> <a href="#" class="btn btn--md btn--round" data-toggle="modal" data-target="#messageModal">Message Chef</a> </div>
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


    <!-- Modal for sending message -->
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="messageModalLabel">Message Chef</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form action="" method="post" id="send_msg">

              <div class="form-group">
                <label for="msgText">Type your message Below</label>
                <textarea class="form-control" id="msgText" placeholder="I want to buy your dish" name="body"></textarea>
              </div>

            </form>
          </div>

          <div class="modal-footer">
            {{-- <label for="submit-form" tabindex="0"  class="btn btn-primary px-3 py-1">Send</label> --}}
            <button type="button" class="btn btn-primary px-3 py-1" form="send_msg" id="submit-form">Send</button>

            <button type="button" class="btn btn-secondary px-3 py-1" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>

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
    //snackbar
    function snackbar($msg) {
        $('#snackbar').html($msg);
        $('#snackbar').toggleClass('show');
        setTimeout(function () {
            $('#snackbar').removeClass('show');
        }, 1600);
    }


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

    //send message
    $('#submit-form').click(function(e) {
      e.preventDefault();
      $("#messageModal").modal('hide');
      var body = $('#msgText').val();
      $('#msgText').val(' ');

      $.ajax({
        url: '{{ route('messages.store') }}',
        method: "POST",
        data: {
          '_token': '{{ csrf_token() }}',
          'sender_id': {{ auth()->id() }},
          'recipient_id': {{ $dish->profile_id }},
          'body': body,
        },
      }).done( function(data) {
          console.log("data: " + data);
          snackbar('Message Sent Successfully');
          loadMessages();

      });
    });
  });
</script>

@endpush

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