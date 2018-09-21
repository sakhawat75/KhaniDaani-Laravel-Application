@extends ('layouts.master') @section ('title', 'All notification are here') @section ('content')

    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">All Notifications</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="dashboard-area">

        <div class="dashboard_contents">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <div class="cardify notifications_module" id="all_noti_dynamic">

                            {{-- <a href="order-page">
                            <div class="notification">
                                <span class="line"></span> <!-- The line will show up if it's not clicked once (optional) -->
                                <div class="notification__info">
                                    <div class="info_avatar">
                                        <img src="{{asset('images/notification_head4.png')}}" alt="user-images">
                                    </div>
                                    <div class="info">
                                        <p><a href="">Sakhawat</a>
                                            <span>Order your dish</span>
                                            <a href="order-page">Indian butter chicken</a>
                                            <br>
                                            What about unique order id {eg. 182082001} it's mean 2018/8/20 order no 1.
                                        </p>
                                        <p class="time">Just now (eg. 15 min ,30min , 1hr,2hr, 1day) ago</p>
                                    </div>
                                </div>
                                <div class="notification__icons ">
                                    <span class="lnr lnr-cart loved noti_icon"></span>
                                </div>
                            </div></a>
                            <!-- end single notifications -->

                            <a href="order-page">
                                <div class="notification">
                                    <div class="notification__info">
                                        <div class="info_avatar">
                                            <img src="{{asset('images/notification_head4.png')}}" alt="user-images">
                                        </div>
                                        <div class="info">
                                            <p><a href="">Sakhawat</a>
                                                <span>Review the order</span>
                                                <a href="order-page">Indian butter chicken</a>
                                            </p>
                                            <p class="time">2 days ago</p>
                                        </div>
                                    </div>
                                    <div class="notification__icons ">
                                        <span class="lnr lnr-star loved noti_icon"></span>
                                    </div>
                                </div></a> --}}
                            <!-- end single notifications -->


                            <!-- pagination -->
                            <div class="pagination-area pagination-area2">
                                <nav class="navigation pagination " role="navigation">
                                    <div class="nav-links">
                                        <a class="prev page-numbers" href="#">
                                            <span class="lnr lnr-arrow-left"></span>
                                        </a>
                                        <a class="page-numbers current" href="#">1</a>
                                        <a class="page-numbers" href="#">2</a>
                                        <a class="page-numbers" href="#">3</a>
                                        <a class="next page-numbers" href="#">
                                            <span class="lnr lnr-arrow-right"></span>
                                        </a>
                                    </div>
                                </nav>
                            </div>
                            <!-- end /.pagination -->
                        </div>
                        <!-- end /.notifications_modules -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>

    <div class="ajax-load text-center" style="display:none">
        <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
    </div>



@endsection

@push('scripts-footer-bottom-2')
  @include ('notifications.all_notify_order_template')

  <script type="text/javascript">
    $(document).ready(function () {

        var noti_refresh_time = 15000;
        var next_page;
        moment.tz.setDefault('Europe/London');

        _.templateSettings.variable = "notify";
        var template = _.template(
            $('#all_notify_order_template').html()
 
       );

        var renderNotification = function(notifis) {

              _.each(notifis.data, function(notify) {
              if(notify.type == "App\\Notifications\\NotifyOrder") {
                  template = _.template(
                      $('#all_notify_order_template').html()
                  );
                  
                } else if(notify.type == "App\\Notifications\\NotifyDishReady") {
                  template = _.template(
                    $('#notify_dish_ready_template').html()
                  );
                  
                } else {
                  console.log("from else: type: " + notify.type);
                }

                $('#all_noti_dynamic').append(template(notify));
            });

              if(notifis.next_page_url == null) {
                $('#all_noti_dynamic').append('<p class="text-center px-5 py-3">No more Notification</p>');
              } 
              
          };

    @auth

        $('.footer-area').remove();
        function loadNotifications() {
            
                $.ajax({
                    url: "{{ route('api.all_notifications') }}",
                    /*async: false,*/
                    /*cached: false*/
                }).done( function (res) {
                    $('#all_noti_dynamic').html(' ');
                    renderNotification(res);
                    next_page = res.next_page_url;
                    console.log("npu: " + next_page);
                });
        }

        loadNotifications();

       /* var myInterval;

        myInterval = setInterval(function(){
            loadNotifications();
        }, noti_refresh_time);*/


        
        //infinity scroll
        
        $(window).scroll(function() {
            
            if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                if(next_page) {
                    loadMoreData(next_page);
                }
                
            }

        });


        function loadMoreData(last_id){
        console.log("lmd npu: " + next_page);
          $.ajax(
                {
                    url: last_id,
                    type: "get",
                    /*async: false,*/
                    beforeSend: function()
                    {
                        $('.ajax-load').show();
                    }
                })
                .done(function(res)
                {
                    
                    console.log("lmd done npu: " + next_page);
                    console.log("lmd done res: " + res.prev_page_url);
                    $('.ajax-load').hide();
                    
                    next_page = res.next_page_url;
                    renderNotification(res);
                    
                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                {
                    alert('server not responding...');
                });
          }


      @endauth
    });
  </script>

  <style type="text/css">
    .ajax-load{

            background: #e1e1e1;

            padding: 10px 0px;

            width: 100%;

        }
  </style>
@endpush