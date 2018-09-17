@extends ('layouts.master') @section ('title', 'All Orders') @section ('content')

<section class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title">All order</h1> </div>
        </div>
    </div>
</section>

<section class="dashboard-edit dashboard-area"> 
   @include('includes.menu-dashboard')
   
    <div class="dashboard_contents">
        <div class="container">
            {{--<div class="row">
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
            </div>--}}
            
            <div class="product_archive">
                <div class="title_area">
                    <div class="row">
                        <div class="col-md-5">
                            <h4>Product Details</h4> </div>
                        <div class="col-md-3">
                            <h4 class="add_info">Status</h4> </div>
                        <div class="col-md-2">
                            <h4>Price</h4> </div>
                        <div class="col-md-2 text-right">
                            <h4>Action</h4> </div>
                    </div>
                </div>



                @foreach ($orders as $order)

                    <div class="row">
                        <div class="col-md-12">
                            <div class="single_product clearfix">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5">

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="aspect_ratio">
                                                        <img src="{{ route('home') }}/storage/images/dish_images/{{ $order->dish->dish_image_1 }}"
                                                             alt="the preview is just missing." class="ratio_img">
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="short_desc">
                                                        <h4><a href="{{ route('dishes.show', ['id' => $order->dish->id]) }}">{{ $order->dish->dish_name }}</a></h4>
                                                        <p class="mb-0">Category: {{ $order->dish->dish_category }}</p>
                                                        {{--<p>Subcategory: {{ $order->dish->dish_subcategory }}</p>--}}
                                                    </div>
                                                </div>
                                            </div>



                                        <!-- end /.product__description -->
                                    </div>
                                    <!-- end /.col-md-5 -->
                                    <div class="col-lg-3 col-md-3 col-6 xs-fullwidth">
                                        <div class="product__additional_info">
                                            <ul>
                                                <li>
                                                    <p> <span>Order Date: </span>{{ $order->created_at->format('d M Y') }}</p>
                                                </li>
                                                {{--<li class="license">
                                                    <p> <span>Delivery id:</span>450</p>
                                                </li>--}}
                                                <li>
                                                    <p> <span>Status:</span><span class="text-danger"> {{ $order->status }}</span> </p>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- end /.product__additional_info -->
                                    </div>
                                    <!-- end /.col-md-3 -->
                                    <div class="col-lg-2 col-md-2 col-6 xs-fullwidth">
                                        <div class="product__price_download">
                                            <div class="item_price v_middle"> <span>৳{{ $order->dish->dish_price }}</span> </div>

                                            <!-- end /.item_action -->
                                        </div>
                                        <!-- end /.product__price_download -->
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-6 xs-fullwidth">
                                        <div class="product__price_download">
                                            <div class="item_action v_middle text-center">
                                                <a href="{{ route('order.status', ['order' => $order->id]) }}" class="btn btn--sm btn--round">View Order</a>
                                            {{--<a href="#" class="btn btn--md btn--round btn--white rating--btn not--rated" data-toggle="modal" data-target="#myModal">
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
                                            </a>--}}
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

                @endforeach

                {{ $orders->links() }}


            </div>
        </div>
    </div>
</section> 

@endsection