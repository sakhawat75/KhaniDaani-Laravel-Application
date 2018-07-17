@extends ('layouts.master') @section ('title', 'Manage Dish') @section ('content')

<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li> <a href="{{ route('home') }}">Home</a> </li>
                        <li> <a href="dashboard.html">Profile</a> </li>
                        <li class="active"> <a href="#">Purchase Dish</a> </li>
                    </ul>
                </div>
                <h1 class="page-title">Purchase Dish Status</h1> </div>
        </div>
    </div>
</section>

<section class="dashboard-edit dashboard-area"> 
   @include('includes.menu-dashboard')
   
    <div class="dashboard_contents">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="filter-bar clearfix filter-bar2">
                        <div class="">
                            <div class="filter__option filter--text">
                                <p> <span>0</span> Products Purchased</p>
                            </div>
                            <div class="pull-right">
                                <div class="filter__option filter--select">
                                    <div class="select-wrap">
                                        <select name="price">
                                            <option value="low">Price : Low to High</option>
                                            <option value="high">Price : High to low</option>
                                        </select> <span class="lnr lnr-chevron-down"></span> </div>
                                </div>
                                <div class="filter__option filter--select">
                                    <div class="select-wrap">
                                        <select name="price">
                                            <option value="12">12 Items per page</option>
                                            <option value="15">15 Items per page</option>
                                            <option value="25">25 Items per page</option>
                                        </select> <span class="lnr lnr-chevron-down"></span> </div>
                                </div>
                            </div>
                        </div>
                        <!-- end /.pull-right -->
                    </div>
                    <!-- end /.filter-bar -->
                </div>
                <!-- end /.col-md-12 -->
            </div>
            
            <div class="product_archive">
                <div class="title_area">
                    <div class="row">
                        <div class="col-md-5">
                            <h4>Product Details</h4> </div>
                        <div class="col-md-3">
                            <h4 class="add_info">Additional Info</h4> </div>
                        <div class="col-md-2">
                            <h4>Price</h4> </div>
                        <div class="col-md-2">
                            <h4>Rating</h4> </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="single_product clearfix">
                            <div class="row">
                                <div class="col-lg-5 col-md-5">
                                    <div class="product__description"> <img src="{{ asset('images/pur5.jpg') }}" alt="Purchase image">
                                        <div class="short_desc">
                                            <h4>Indian butter chicken</h4>
                                            <p>Nunc placerat mi id nisi inter dum mollis. Praesent phare...</p>
                                        </div>
                                    </div>
                                    <!-- end /.product__description -->
                                </div>
                                <!-- end /.col-md-5 -->
                                <div class="col-lg-3 col-md-3 col-6 xs-fullwidth">
                                    <div class="product__additional_info">
                                        <ul>
                                            <li>
                                                <p> <span>Date: </span> 5 Jul 2018</p>
                                            </li>
                                            <li class="license">
                                                <p> <span>Delivery id:</span>450</p>
                                            </li>
                                            <li>
                                                <p> <span>Chef:</span> KhaniDaani</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end /.product__additional_info -->
                                </div>
                                <!-- end /.col-md-3 -->
                                <div class="col-lg-4 col-md-4 col-6 xs-fullwidth">
                                    <div class="product__price_download">
                                        <div class="item_price v_middle"> <span>৳590</span> </div>
                                        <div class="item_action v_middle">
                                            <a href="#" class="btn btn--md btn--round btn--white rating--btn not--rated" data-toggle="modal" data-target="#myModal">
                                                <P class="rate_it">Rate Chef</P>
                                                <div class="rating product--rating">
                                                    <ul>
                                                        <li> <span class="fa fa-star"></span> </li>
                                                        <li> <span class="fa fa-star"></span> </li>
                                                        <li> <span class="fa fa-star"></span> </li>
                                                        <li> <span class="fa fa-star"></span> </li>
                                                        <li> <span class="fa fa-star-o"></span> </li>
                                                    </ul>
                                                </div>
                                            </a>
                                            <a href="#" class="btn btn--md btn--round btn--white rating--btn not--rated" data-toggle="modal" data-target="#myModal">
                                                <P class="rate_it">Rate Delivery</P>
                                                <div class="rating product--rating">
                                                    <ul>
                                                        <li> <span class="fa fa-star-o"></span> </li>
                                                        <li> <span class="fa fa-star-o"></span> </li>
                                                        <li> <span class="fa fa-star-o"></span> </li>
                                                        <li> <span class="fa fa-star-o"></span> </li>
                                                        <li> <span class="fa fa-star-o"></span> </li>
                                                    </ul>
                                                </div>
                                            </a>
                                            <!-- end /.rating--btn -->
                                        </div>
                                        <!-- end /.item_action -->
                                    </div>
                                    <!-- end /.product__price_download -->
                                </div>
                                <!-- end /.col-md-4 -->
                            </div>
                        </div>
                        <!-- end /.single_product -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modals -->
    <div class="modal fade rating_modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="rating_modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    <h3 class="modal-title" id="rating_modal">Rating this Dish</h3>
                    <h4>Title</h4>
                    <p>by <a href="">Chef ID</a> </p>
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
                                            <option value="customization">Fast Delivery</option>
                                        </select> <span class="lnr lnr-chevron-down"></span> </div>
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
</section> 

@endsection