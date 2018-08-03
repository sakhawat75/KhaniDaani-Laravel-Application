@extends ('layouts.master')


@section ('title', 'Order Status')

@section ('content')

  <script src="{{ asset('/js/materialize.min.js') }}"></script>
  <section class="dashboard-area">
    <div class="dashboard_contents">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="dashboard_title_area">
              <div class="pull-left">
                <div class="dashboard__title">
                  <h3>Your Order Status</h3> </div>
              </div>
            </div>
          </div>
          <!-- end /.col-md-12 -->
        </div>
        <div class="row">
          <div class="col-lg-8 col-md-7">
            <div class="dashboard_title_area">
              <ul class="stepper">
                <li class="step active">
                  <div data-step-label="Now chef is preparing the food please wait..." class="step-title waves-effect waves-dark">Order Started</div>
                  <div class="step-content">
                    <h1><span class="timer">{{ $order->delivery_time }}</span></h1>
                    -or-
                    <h6>Dish is Ready Please Check delivery option</h6>

                    <br>
                    <p>Chef Option</p>
                    <button class="btn btn--icon btn-md btn--round btn-success">
                      <span class="lnr lnr-bullhorn"></span>Ready</button>
                    <button class="btn btn--icon btn-md btn--round btn-danger">
                      <span class="lnr  lnr-thumbs-up"></span>Delivered</button>
                  </div>
                </li>

                <li class="step">
                  <div data-step-label="Status of the delivery ..." class="step-title waves-effect waves-dark">Delivery Service</div>
                  <div class="step-content">
                    <button class="btn btn--icon btn-md btn--round btn-success"> <span class="lnr  lnr-thumbs-up"></span>Received By DSPID</button>
                    <h5>Count Down started...</h5>
                    <h1>4 Hours: 35 Min </h1>
                    <button class="btn btn--icon btn-md btn--round btn-danger"> <span class="lnr  lnr-thumbs-up"></span>Delivered By DSPID</button>
                  </div>
                </li>

                <li class="step">
                  <div class="step-title waves-effect waves-dark">Order Completed</div>
                  <div class="step-content">
                    <div class="product__price_download">

                      <button class="btn btn--icon btn-md btn--round btn-success"> <span class="lnr  lnr-thumbs-up"></span>Received By DSPID</button>

                      <div class="product__price_download">
                        <div class="item_action v_middle">
                          <a href="#" class="btn btn--md btn--round btn--white rating--btn not--rated" data-toggle="modal" data-target="#myModal">
                            <P class="rate_it">Rate Now</P>
                            <div class="rating product--rating">
                              <ul>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                              </ul>
                            </div>
                          </a>
                          <!-- end /.rating--btn -->
                        </div>
                        <!-- end /.item_action -->
                      </div>
                      <!-- end /.product__price_download -->




                    </div>






                  </div>
                </li>
              </ul>

            </div>
          </div>
          <!-- end /.col-md-12 -->


          <div class="col-lg-4 col-md-5">
            <aside class="sidebar upload_sidebar">

              <div class="sidebar-card">
                <div class="card-title">
                  <h3>Help Order Staus</h3>
                </div>

                <div class="card_content">
                  <p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut sceler isque the mattis, leo quam aliquet congue.</p>
                  <ul>
                    <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                    <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                    <li>Consectetur elit, sed do eiusmod the labore et dolore magna.</li>
                    <li>Consectetur elit, sed do eiusmod the</li>
                  </ul>
                </div>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Modals -->
  <div class="modal fade rating_modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="rating_modal">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h3 class="modal-title" id="rating_modal">Rating this Dish</h3>
          <h4>Title</h4>
          <p>by
            <a href="">Chef ID</a>
          </p>
        </div>
        <!-- end /.modal-header -->

        <div class="modal-body">
          <form action="#">
            <ul>
              <li>
                <p>Your Rating</p>
                <div class="right_content btn btn--round btn--white btn--md">
                  <select name="rating" class="give_rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </div>
              </li>

              <li>
                <p>Rating Causes</p>
                <div class="right_content">
                  <div class="select-wrap">
                    <select name="review_reason">
                      <option value="design">Food Presentation</option>
                      <option value="customization">Food Quality</option>
                    </select>

                    <span class="lnr lnr-chevron-down"></span>
                  </div>
                </div>
              </li>
            </ul>

            <div class="rating_field">
              <label for="rating_field">Comments</label>
              <textarea name="rating_field" id="rating_field" class="text_field" placeholder="Please enter your rating reason...."></textarea>
              <p class="notice">Your review will be ​publicly visible​ and the chef may reply to your review. </p>
            </div>
            <button type="submit" class="btn btn--round btn--default">Submit Rating</button>
            <button class="btn btn--round modal_close" data-dismiss="modal">Close</button>
          </form>
          <!-- end /.form -->
        </div>
        <!-- end /.modal-body -->
      </div>
    </div>
  </div>


  @push('scripts-footer-top')
    <script type="text/javascript" src="{{ asset('js/vendor/jquery.countdown.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.stepper').activateStepper();

            var finalDate = new Date("{{ $order->created_at }}");
            console.log("Date initial: " + finalDate.toString());
            finalDate = finalDate.getTime() + (({{ $order->preparation_time }} + 6) * 60 * 60 * 1000);
            finalDate = new Date(finalDate);
            console.log("Date After: " + finalDate.toString());

            $('.timer').countdown(finalDate)
                .on('update.countdown', function(event) {
                    var format = '%H:%M:%S';
                    if(event.offset.totalDays > 0) {
                        format = '%-d day%!d ' + format;
                    }

                    $(this).html(event.strftime(format));
                })
                .on('finish.countdown', function(event) {
                    $(this).html('Delivery Time has expired!');
                        // .parent().addClass('disabled');

                });

        //    Asia/Dhaka
        });
    </script>
  @endpush

  <script src="{{ asset('/js/materialize-stepper.js') }}"></script>




@endsection