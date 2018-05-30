@extends ('layouts.master') @section ('title', 'Manage Dish') @section ('content')

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
                            <li>
                                <a href="dashboard.html">Profile</a>
                            </li>
                            <li class="active">
                                <a href="#">Manage Dish</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Edit <span>Dish Title</span></h1>
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

    <!--================================
            START DASHBOARD AREA
    =================================-->
    <section class="dashboard-edit dashboard-area">
        @include('includes.menu-dashboard')
        <div class="dashboard_contents">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="filter-bar dashboard_title_area clearfix filter-bar2">
                            <div class="dashboard__title dashboard__title pull-left">
                                <h3>Manage Dish</h3>
                            </div>

                            <div class="pull-right">
                                <div class="filter__option filter--text">
                                    <p>
                                        <span>26</span>Dishes</p>
                                </div>

                                <div class="filter__option filter--select">
                                    <div class="select-wrap">
                                        <select name="price">
                                            <option value="low">Price : Low to High</option>
                                            <option value="high">Price : High to low</option>
                                        </select>
                                        <span class="lnr lnr-chevron-down"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.pull-right -->
                        </div>
                        <!-- end /.filter-bar -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->

                <div class="row">
                    <!-- start .col-md-4 -->
                    <div class="col-lg-4 col-md-6">
                        <!-- start .single-product -->
                        <div class="product product--card">

                            <div class="product__thumbnail">
                                <img src="{{ route('home') }}/images/dishid_mainthumb.jpg" alt="Product Image">

                                <div class="prod_option">
                                    <a href="#" id="drop2" class="dropdown-trigger" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="true">
                                        <span class="lnr lnr-cog setting-icon"></span>
                                    </a>

                                    <div class="options dropdown-menu" aria-labelledby="drop2">
                                        <ul>
                                            <li>
                                                <a href="edit-item.html">
                                                    <span class="lnr lnr-pencil"></span>Edit</a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#myModal2" class="delete">
                                                    <span class="lnr lnr-trash"></span>Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end /.product__thumbnail -->

                            <div class="product-desc">
                                <a href="{{ route('home')}}" class="product_title">
                                    <h4>Indian Butter Chicken</h4>
                                </a>
                                <ul class="titlebtm">
                                    <li>
                                        <img class="auth-img" src="{{ route('home') }}/images/auth2.jpg" alt="dish image">
                                        <p>
                                            <a href="#">User1</a>
                                        </p>
                                    </li>
                                    <li class="product_cat">
                                        <a href="#">From
                                            <span> Sylhet</span></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end /.product-desc -->

                            <div class="product-purchase">
                                <div class="price_love">
                                    <span>৳320</span>
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

                                <div class="sell">
                                    <p>
                                        <span class="lnr lnr-cart"></span>
                                        <span>50</span>
                                    </p>
                                </div>
                            </div>
                            <!-- end /.product-purchase -->
                        </div>
                        <!-- end /.single-product -->
                    </div>
                    <!-- end /.col-md-4 -->
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="pagination-area">
                            <nav class="navigation pagination" role="navigation">
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
                        <!-- end /.pagination-area -->
                    </div>
                    <!-- end /.col-md-12 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.dashboard_menu_area -->
    </section>

        <div class="modal fade rating_modal item_remove_modal" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Are you sure to delete this item?</h3>
                    <p>You will not be able to recover this file!</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- end /.modal-header -->

                <div class="modal-body">
                    <button type="submit" class="btn btn--round btn-danger btn--default">Delete</button>
                    <button class="btn btn--round modal_close" data-dismiss="modal">Cancel</button>
                </div>
                <!-- end /.modal-body -->
            </div>
        </div>
    </div>
    <!--================================
            END DASHBOARD AREA
    =================================-->

@endsection