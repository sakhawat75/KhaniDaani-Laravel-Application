<!--================================
        START MENU AREA
    =================================-->
<div class="menu-area">
    <!-- start .top-menu-area -->
    <div class="top-menu-area">
        <!-- start .container -->
        <div class="container">
            <!-- start .row -->
            <div class="row">
                <!-- start .col-md-3 -->
                <div class="col-lg-3 col-md-3 col-6 v_middle">
                    <div class="logo">
                        <a href="{{ URL::to('/') }}">
                                <img src="{{ URL::to('/') }}/images/logo/full_logo.png" alt="logo image" class="img-fluid">
                            </a>
                    </div>
                </div>
                <!-- end /.col-md-3 -->

                <!-- start .col-md-5 -->
                <div class="col-lg-8 offset-lg-1 col-md-9 col-6 v_middle">
                    <!-- start .author-area -->
                    <div class="author-area">
                        @if (Route::has('login'))
                            @auth
                                <a href="profile" class="author-area__seller-btn inline" >{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</a>
                            @else
                                <a href="{{ route('login') }}" class="author-area__seller-btn inline">Login</a>
                                <a href="{{ route('register') }}" class="author-area__seller-btn inline">Register</a>
                            @endauth
                        @endif

                        <div class="author__notification_area">
                            <ul>
                                <li class="has_dropdown">
                                    <div class="icon_wrap">
                                        <span class="lnr lnr-cart"></span>
                                        <span class="notification_count purch">2</span>
                                    </div>
<!--
                                    <div class="dropdown dropdown--cart">
                                        <div class="cart_area">
                                            <div class="cart_product">
                                                <div class="product__info">
                                                    <div class="thumbn">
                                                        <img src="{{ URL::to('/') }}/images/capro1.jpg" alt="cart product thumbnail">
                                                    </div>

                                                    <div class="info">
                                                        <a class="title" href="single-product.html">Finance and Consulting Business Theme</a>
                                                        <div class="cat">
                                                            <a href="#">
                                                                    <img src="{{ URL::to('/') }}/images/usr_avatar.png" alt="">Sakhawat</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product__action">
                                                    <a href="#">
                                                            <span class="lnr lnr-trash"></span>
                                                        </a>
                                                    <p>$60</p>
                                                </div>
                                            </div>
                                            <div class="cart_product">
                                                <div class="product__info">
                                                    <div class="thumbn">
                                                        <img src="{{ URL::to('/') }}/images/capro2.jpg" alt="cart product thumbnail">
                                                    </div>

                                                    <div class="info">
                                                        <a class="title" href="single-product.html">Flounce - Multipurpose OpenCart Theme</a>
                                                        <div class="cat">
                                                            <a href="#">
                                                                    <img src="{{ URL::to('/') }}/images/usr_avatar.png" alt="">Nurian</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="product__action">
                                                    <a href="#">
                                                            <span class="lnr lnr-trash"></span>
                                                        </a>
                                                    <p>$60</p>
                                                </div>
                                            </div>
                                            <div class="total">
                                                <p>
                                                    <span>Total :</span>$80</p>
                                            </div>
                                            <div class="cart_action">
                                                <a class="go_cart" href="cart.html">View Cart</a>
                                                <a class="go_checkout" href="checkout.html">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                    -->
                                </li>
                            </ul>
                        </div> 
                        <!--start .author__notification_area -->

                        <!--start .author-author__info-->
                        <div class="author-author__info inline has_dropdown">
                            <div class="author__avatar">
                              
                                   <img src="{{ URL::to('/') }}/images/usr_avatar.png" alt="user avatar">
                                
                            </div>
                            
                             <div class="autor__info">
                                <p class="name">
                                    Profile menu
                                </p>
                            </div>

                            <div class="dropdown dropdown--author">
                                <ul>
                                    <li>
                                        <a href="profile">
                                                <span class="lnr lnr-user"></span>Profile</a>
                                    </li>
                                    <li>
                                        <a href="profile_setting">
                                                <span class="lnr lnr-cog"></span> Profile Setting</a>
                                    </li>
                                    <li>
                                        <a href="cart.html">
                                                <span class="lnr lnr-cart"></span>Purchases</a>
                                    </li>
                                    <li>
                                        <a href="favourites.html">
                                                <span class="lnr lnr-heart"></span> Favourite</a>
                                    </li>
                                    <li>
                                        <a href="create_dish">
                                                <span class="lnr lnr-upload"></span>Upload Item</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-manage-item.html">
                                                <span class="lnr lnr-book"></span>Manage Item</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-withdrawal.html">
                                                <span class="lnr lnr-briefcase"></span>Withdrawals</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                            <span class="lnr lnr-exit"></span>Logout</a>   
                                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                        
                       
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
                                    <img src="{{ URL::to('/') }}/images/usr_avatar.png" alt="user avatar">
                                </div>
                                <div class="autor__info v_middle">
                                    <p class="name">
                                        Sign In
                                    </p>
                                </div>
                            </div>
                            <!--end /.author-author__info-->
                            
                            <div class="dropdown dropdown--author">
                                <ul>
                                    <li>
                                        <a href="author.html">
                                                <span class="lnr lnr-user"></span>Profile</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-setting.html">
                                                <span class="lnr lnr-cog"></span>Profile Setting</a>
                                    </li>
                                    <li>
                                        <a href="cart.html">
                                                <span class="lnr lnr-cart"></span>Purchases</a>
                                    </li>
                                    <li>
                                        <a href="favourites.html">
                                                <span class="lnr lnr-heart"></span> Favourite</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-upload.html">
                                                <span class="lnr lnr-upload"></span>Upload Item</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-manage-item.html">
                                                <span class="lnr lnr-book"></span>Manage Item</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-withdrawal.html">
                                                <span class="lnr lnr-briefcase"></span>Withdrawals</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                <span class="lnr lnr-exit"></span>Logout</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="author__notification_area">
                                <ul>
                                    <li>
                                        <a href="cart.html">
                                            <div class="icon_wrap">
                                                <span class="lnr lnr-cart"></span>
                                                <span class="notification_count purch">2</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!--start .author__notification_area -->

                            

                            <div class="text-center">
                                <a href="signup.html" class="author-area__seller-btn inline">Become a Chef</a>
                            </div>
                        </div>
                    </div>
                    <!-- end /.mobile_content -->
                </div>
                <!-- end /.col-md-5 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </div>
    <!-- end  -->

    <!-- start .mainmenu_area -->
    <div class="mainmenu">
        <!-- start .container -->
        <div class="container">
            <!-- start .row-->
            <div class="row">
                <!-- start .col-md-12 -->
                <div class="col-md-12">
                    <div class="navbar-header">
                        <!-- start mainmenu__search -->
                        <div class="mainmenu__search">
                            <form action="#">
                                <div class="searc-wrap">
                                    <input type="text" placeholder="Search Dishes">
                                    <button type="submit" class="search-wrap__btn">
                                            <span class="lnr lnr-magnifier"></span>
                                        </button>
                                </div>
                            </form>
                        </div>
                        <!-- start mainmenu__search -->
                    </div>

                    <nav class="navbar navbar-expand-md navbar-light mainmenu__menu">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="has_dropdown">
                                    <a href="{{route('home')}}">HOME</a>
                                </li>
                                <li class="has_dropdown">
                                    <a href="all-products-list.html">all dishes</a>
                                    <div class="dropdown dropdown--menu">
                                        <ul>
                                            <li>
                                                <a href="all-products.html">Recent dishes</a>
                                            </li>
                                            <li>
                                                <a href="all-products.html">Popular dishes</a>
                                            </li>
                                            <li>
                                                <a href="#">Sale dishes</a>
                                            </li>
                                            <li>
                                                <a href="#">Our Feature Product</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="has_dropdown">
                                    <a href="#">Dish categories</a>
                                    <div class="dropdown dropdown--menu">
                                        <ul>
                                            <li>
                                                <a href="category-grid.html">Tandori / Grill</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.html">Kebab</a>
                                            </li>
                                            <li>
                                                <a href="category-grid.html">Karai </a>
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
                                </li>

                                <li class="has_megamenu">
                                    <a href="#">Area</a>
                                    <div class="dropdown_megamenu">
                                        <div class="megamnu_module">
                                            <div class="menu_items">
                                                <div class="menu_column">
                                                    <ul>
                                                        <li class="title">Sylhet</li>
                                                        <li>
                                                            <a href="all-products.html">Zindabazar</a>
                                                        </li>
                                                        <li>
                                                            <a href="all-products-list.html">Upashahr</a>
                                                        </li>
                                                        <li>
                                                            <a href="category-grid.html">Shibgonj</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="contact.html">Help</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row-->
        </div>
        <!-- start .container -->
    </div>
    <!-- end /.mainmenu-->
</div>

<!--================================
        END MENU AREA
    =================================-->