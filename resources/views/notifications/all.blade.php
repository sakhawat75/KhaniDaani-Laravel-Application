@extends ('layouts.master') @section ('title', '404') @section ('content')

    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li class="active">
                                <a href="#">Notifications</a>
                            </li>
                        </ul>
                    </div>
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
                        <div class="dashboard_title_area">
                            <div class="dashboard__title">
                                <h3>Your Notifications</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="cardify notifications_module">

                            <a href="order-page">
                            <div class="notification">
                                <span class="line"></span> <! The line will show up if it's not clicked once (optional) -->
                                <div class="notification__info">
                                    <div class="info_avatar">
                                        <img src="images/notification_head4.png" alt="user-images">
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
                                            <img src="images/notification_head4.png" alt="user-images">
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
                                </div></a>
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



@endsection