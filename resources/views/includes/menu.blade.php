@push ('head-css')
<style type="text/css">
    .notification {
        background: #faffd7;
    }
</style>
@endpush

<div class="menu-area">
    <!-- start .top-menu-area -->
    <div class="top-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-5 v_middle">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ URL::to('/') }}/images/logo/full_logo.png" alt="logo image" class="img-fluid">
                        </a>
                    </div>
                </div>

                <!-- mobile notification area -->

                <div class="col-lg-4 col-md-2 col-4 mbl_noti">
                    @auth
                    <div class="author__notification_area mr-0">

                        <ul style="margin-top: 24px;">
                            <li class="has_dropdown py-0 pl-0 pr-2 ">
                                <div class="icon_wrap">
                                    <span class="lnr lnr-alarm"></span>
                                    <span class="notification_count noti count_notification" id="count_notification">0</span>
                                </div>

                                <div class="dropdown notification--dropdown">
                                    <div class="dropdown_module_header">
                                        <h4>Notifications</h4>
                                        <a href="{{ route('notifications.all') }}">View All</a>
                                    </div>
                                    <div id="noti_dynamic" class="noti_dynamic">

                                        {{--<a href="order-page">
                                            <div class="notifications_module">
                                                <div class="notification">
                                                    <div class="notification__info">
                                                        <div class="info_avatar">
                                                            <img src="images/notification_head4.png" alt="">
                                                        </div>
                                                        <div class="info">
                                                            <p><a href="">Sakhawat</a>
                                                                <Span>Ordered your dish</Span>
                                                                <a href="dish">Indian Butter chiken</a>
                                                            </p>
                                                            <p class="time">Just now</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end /.notificationsController -->
                                            </div>
                                        </a>--}}

                                    </div>
                                    <!-- end /.dropdown -->
                                </div>
                            </li>

                            <li class="has_dropdown py-0 pr-0 pl-2">
                                <div class="icon_wrap"> <span class="lnr lnr-envelope"></span> <span class="notification_count count_msg msg" id="count_msg">0</span> </div>
                                <div class="dropdown messaging--dropdown">
                                    <div class="dropdown_module_header">
                                        <h4>Messages</h4> <a href="{{ route('messages.all') }}">View All</a>
                                    </div>

                                    <div class="msg_dynamic">
                                        {{--<div class="messages " data-message_id="1" data-sender_id="2" data-recipient_id="2" id="all_msg_prev_1">
                                            <a href="#" class="message recent">
                                                <div class="message__actions_avatar">
                                                    <div class="avatar"> <img src="http://127.0.0.1:8000/storage/images/profile_image/PP_1536649201.jpg" alt="sender image" id="msg_pi_1">

                                                    </div>
                                                </div>

                                                <div class="message_data">
                                                    <div class="name_time">
                                                        <div class="name">
                                                            <p>Royal_Chef</p> <span class="lnr lnr-envelope"></span>
                                                            <span class="msg_unread_count">
                                                            </span>
                                                        </div> <span class="time">7 minutes ago</span>
                                                        <p>46346</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>--}}
                                    </div>
                                    <!-- add upto 5 massages in the dropdown menue -->
                                </div>
                            </li>
                        </ul>
                    </div>
                    @endauth
                </div>


                <div class="col-lg-4 col-md-6 col-3 v_middle">
                    <!-- start .author-area -->
                    <div class="author-area author-area-lg">
                        @guest
                        <a href="{{ route('register') }}" class="author-area__seller-btn inline my-4 a-mem">Become a Member</a>
                        <a href="{{ route('login') }}" class="author-area__seller-btn inline">Login</a>
                        @endguest

                        @auth

                        <div class="author__notification_area">
                            <ul>
                                <li class="has_dropdown">
                                    <div class="icon_wrap">
                                        <span class="lnr lnr-alarm"></span>
                                        <span class="notification_count noti count_notification" id="count_notification">0</span>
                                    </div>

                                    <div class="dropdown notification--dropdown">
                                        <div class="dropdown_module_header">
                                            <h4>Notifications</h4>
                                            <a href="{{ route('notifications.all') }}">View All</a>
                                        </div>

                                        <div id="noti_dynamic" class="noti_dynamic">

                                        </div>
                                        <!-- end /.dropdown -->
                                    </div>
                                </li>
                                <li class="has_dropdown">
                                    <div class="icon_wrap"> <span class="lnr lnr-envelope"></span> <span class="notification_count msg count_msg" id="count_msg">0</span> </div>
                                    <div class="dropdown messaging--dropdown">
                                        <div class="dropdown_module_header">
                                            <h4>Messages</h4> <a href="{{route('messages.all')}}">View All</a>
                                        </div>

                                        <div class="msg_dynamic">

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!--start .author-author__info-->
                        <div class="author-author__info inline has_dropdown">
                            <div class="author__avatar ">
                                <img src="{{ URL::to('/') }}/storage/images/profile_image/{{ auth()->user()->profile->profile_image }}" alt="user avatar" style="height: 60px;width: 60px;border-radius: 50%;" id="auth_prfl_img">
                            </div>

                            <div class="autor__info">
                                <p class="name">
                                    <a href="{{ route('profile.show', ['profile' => auth()->id()]) }}" class="">
                                        {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}
                                    </a></p>
                                <p class="ammount">৳ {{ auth()->user()->profile->balance }}</p>
                            </div>

                            <div class="dropdown dropdown--author">
                                <ul>
                                    <li>
                                        <a href="{{ route('profile.show', ['profile' => auth()->id()]) }}">
                                            <span class="lnr lnr-user"></span>Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile.edit', ['profile' => auth()->id()]) }}">
                                            <span class="lnr lnr-cog"></span>Setting
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('order.purchase') }}">
                                            <span class="lnr lnr-cart"></span>All Orders
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('dishes.create') }}">
                                            <span class="lnr lnr-upload"></span>Upload Dish
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('dishes.manage') }}">
                                            <span class="lnr lnr-book"></span>Manage Dish
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile.cashout') }}">
                                            <span class="lnr lnr-briefcase"></span>Payment
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('delivery.AddService') }}">
                                            <span class="lnr lnr-upload"></span>Add Delivery
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('pickerspoint.addpp') }}">
                                            <span class="lnr lnr-upload"></span>Host Pickers Point</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                            <span class="lnr lnr-exit"></span>Logout
                                        </a>
                                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--start .author__notification_area -->
                        <!--end /.author-author__info-->
                    </div>
                    <!-- end .author-area -->

                    <!-- author area restructured for mobile -->
                    <div class="mobile_content ">
                        <span class="lnr lnr-user menu_icon"></span>
                        <!-- offcanvas menu -->
                        <div class="offcanvas-menu closed">
                            <span class="lnr lnr-cross close_menu"></span>

                            <div class="author-author__info">
                                <div class="author__avatar v_middle">
                                    <img src="{{ URL::to('/') }}/storage/images/profile_image/{{ auth()->user()->profile->profile_image }}" alt="user avatar" style="height: 60px;width: 60px;border-radius: 50%;">
                                </div>
                                <div class="autor__info v_middle">
                                    <p class="name">
                                        <a href="{{ route('profile.show', ['profile' => auth()->id()]) }}">
                                            {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}
                                        </a>
                                    </p>
                                    <p class="ammount">৳00.00</p>
                                </div>
                            </div>
                            <!--end /.author-author__info-->

                            {{-- <div class="author__notification_area">
                                <ul>
                                    <li>
                                        <a href="notification.html">
                                            <div class="icon_wrap">
                                                <span class="lnr lnr-alarm"></span>
                                                <span class="notification_count noti">1</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="message.html">
                                            <div class="icon_wrap">
                                                <span class="lnr lnr-envelope"></span>
                                                <span class="notification_count msg">1</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>--}}

                            <div class="dropdown dropdown--author">
                                <ul>
                                    <li>
                                        <a href="{{ route('profile.show', ['profile' => auth()->id()]) }}">
                                            <span class="lnr lnr-user"></span>Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile.edit', ['profile' => auth()->id()]) }}">
                                            <span class="lnr lnr-cog"></span>Profile Setting
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('order.purchase') }}">
                                            <span class="lnr lnr-cart"></span>All Orders
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('dishes.create') }}">
                                            <span class="lnr lnr-upload"></span>Upload Dish
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('dishes.manage') }}">
                                            <span class="lnr lnr-book"></span>Manage Dish
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile.cashout') }}">
                                            <span class="lnr lnr-briefcase"></span>Payment
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('delivery.AddService') }}">
                                            <span class="lnr lnr-upload"></span>Add Delivery
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                            <span class="lnr lnr-exit"></span>Logout
                                        </a>
                                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- mobile_content -->

                    @endauth
                </div>
                <!-- col-md-5 -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- end  -->

    <div class="mainmenu">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-header">
                        <!--mainmenu__search -->
                        <div class="mainmenu__search">
                            <form action="{{ route('search.livedish') }}" method="get">
                                <div class="searc-wrap">
                                    <input type="text" placeholder="Search Dishes" name="keyword">
                                    <button type="submit" class="search-wrap__btn">
                                        <span class="lnr lnr-magnifier"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <nav class="navbar navbar-expand-md navbar-light mainmenu__menu">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="">
                                    <a href="{{route('home')}}">HOME</a>
                                </li>
                                <li class="">
                                    <a href="{{ route('search.livedish') }}">Search Dishes</a>
                                </li>
                                <li>
                                    <a href="{{route('search.dsp')}}">Delivery Services list</a>
                                </li>
                                <li>
                                    <a href="{{route('search.pp')}}">Pickers Point list</a>
                                </li>
                                <li>
                                    <a href="">Help</a>
                                </li>
                                {{--<li class="has_dropdown">
                                    <a href="#">Dish categories</a>
                                    <div class="dropdown dropdown--menu">
                                        <ul id="cat_ul">
                                            <li>
                                                <a href="category-grid.html">Tandori / Grill</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.html">Kebab</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.html">Karai</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.html">Pizza</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.html">Pasta</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.html">Rice</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.html">Salad</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.html">Drinks</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.html">Vegatable</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>--}}
                            </ul>
                        </div>
                        <!-- navbar-collapse -->
                    </nav>
                </div>
                <!-- col-md-12 -->
            </div>
            <!-- row-->
        </div>
        <!-- container -->
    </div>
    <!-- mainmenu-->
</div>

<!--================================
        END MENU AREA
    =================================-->

@push('scripts-footer-bottom')
@include ('notifications.notify_order_template')
@include ('notifications.notify_dish_ready_template')
@include ('messages.message_preview_template')
<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: "{{ route('home')}}/api/categories",
            /*data: {
                id: 5,
            },*/
            type: "GET",
            dataType: "json",
        }).done(function(json) {
            $('#cat_ul').html('');
            /*json.forEach(function (category) {
                console.log(category.name);
            });*/
            $.each(json, function(index, category) {
                //console.log(category.name);
                $('#cat_ul').append("<li><a href='#'>" + category.name + "</a></li>")
            });
        });

        $.ajax({
            url: "{{ route('home') }}/ajax-areas",
            data: {
                city_name: "Sylhet",
            },
            dataType: "json",
        }).done(function(json) {
            $.each(json, function(index, area) {
                $("#area_ul").append(
                    $('<li/>').append($('<a/>').attr('href', '#').text(area.name))

                    // <li><a href="all-products-list.html">Upashahr</a></li>
                );
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        var noti_refresh_time = 15000;
        moment.tz.setDefault('Europe/London');

        _.templateSettings.variable = "notify";
        var template = _.template(
            $('#notify_order_template').html()
        );

        var renderNotification = function(notifis) {
            var unread_count = 0;
            _.each(notifis.data, function(notify) {

                if (notify.type == "App\\Notifications\\NotifyOrder") {
                    template = _.template(
                        $('#notify_order_template').html()
                    );

                } else if (notify.type == "App\\Notifications\\NotifyDishReady") {
                    template = _.template(
                        $('#notify_dish_ready_template').html()
                    );

                } else {
                    console.log("from else: type: " + notify.type);
                }


                $('.noti_dynamic').append(template(notify));
                if (notify.read_at == null) {
                    unread_count++;
                }

            });
            $(".count_notification").text(unread_count);
        };

        @auth

        function loadNotifications() {

            $.ajax({
                url: "{{ route('api.all_notifications') }}",
                cached: false
            }).done(function(res) {
                $('.noti_dynamic').html(' ');

                renderNotification(res);
            });
        }

        loadNotifications();

        var myInterval;

        myInterval = setInterval(function() {
            loadNotifications();
        }, noti_refresh_time);

        $(document).on('click', '.notification', function(e) {
            // clearInterval(myInterval);
            var noti = $(this).data('notification');

            $.ajax({
                url: "{{ route('home') }}/notifications/mark_as_read",
                data: {
                    'notification': noti
                }
            }).done(function(res) {
                console.log(res);
            });
        });

        /*$(document).on('mouseleave','.notification', function (e) {
            setInterval(function(){
                loadNotifications();
            }, 30000);
        });*/


        //messaging
        var msg_template = _.template(
            $('#message_preview_template').html()
        );

        var renderMessages = function(notifis) {
            var unread_count_msg = 0;
            _.each(notifis.data, function(notify) {

                $('.msg_dynamic').append(msg_template(notify));

                _.each(notify.mb, function(m_body) {
                    if ( {{ auth() -> id() }} != m_body.sender_id) {
                        if (m_body.read_at == null) {
                            unread_count_msg++;
                        }
                    }


                });

            });
            $(".count_msg").text(unread_count_msg);
        };


        var loadMessages = function() {

            $.ajax({
                url: "{{ route('messages.getMessages') }}",
                cached: false
            }).done(function(res) {
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

        loadMessages();

        @endauth
    });
</script>
<style type="text/css">
    .unread_notification {
        background: #faffd7;
    }

    .dropdown.messaging--dropdown .message .message_data .name_time .name span.msg_unread_count {
        font-size: 13px;
        margin: 0;
        font-weight: bold;
    }

    .dropdown.messaging--dropdown .message .message__actions_avatar .avatar img {
        border-radius: 50%;
    }

    .dropdown.messaging--dropdown .message .message_data {
        width: 86%;
    }
</style>
@endpush