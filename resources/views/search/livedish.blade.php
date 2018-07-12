@extends ('layouts.master') @section ('title', 'Search Dishes') @section ('content')

{{-- ready for initial development --}}

<body class="search">

    <!--================================
        START SEARCH AREA
    =================================-->
    <section class="search-wrapper">
        <div class="search-area2 bgimage">
            <div class="bg_image_holder"> <img src="images/search.jpg" alt=""> </div>
            <div class="container content_above">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="search">
                            <div class="search__title">
                                <h3>
                                        Total <span>5</span> live dishes for our KhaniDaani community</h3> </div>
                            <div class="search__field">
                                <form action="#">
                                    <div class="field-wrapper">
                                        <input class="relative-field rounded" type="text" placeholder="Search your Dishes">
                                        <button class="btn btn--round" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                            <div class="breadcrumb">
                                <ul>
                                    <li> <a href="#">Home</a> </li>
                                    <li class="active"> <a href="#">All Dishes</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.search-area2 -->
    </section>
    <!--================================
        END SEARCH AREA
    =================================-->

    <!--================================
        START FILTER AREA
    =================================-->
    <div class="filter-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="filter-bar">
                        <div class="filter__option filter--dropdown"> <a href="#" id="drop1" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dish Type
                                    <span class="lnr lnr-chevron-down"></span>
                                </a>
                            <ul class="custom_dropdown custom_drop2 dropdown-menu" aria-labelledby="drop1">
                                <li> <a href="#">Live Foods
                                            <span>35</span>
                                        </a> <a href="#">Exportable Foods
                                            <span>35</span>
                                        </a> </li>
                            </ul>
                        </div>
                        <!-- end /.filter__option -->
                        <div class="filter__option filter--dropdown"> <a href="#" id="drop2" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter By
                                    <span class="lnr lnr-chevron-down"></span>
                                </a>
                            <ul class="custom_dropdown dropdown-menu" aria-labelledby="drop2">
                                <li> <a href="#">Trending items</a> </li>
                                <li> <a href="#">Popular items</a> </li>
                                <li> <a href="#">New items </a> </li>
                                <li> <a href="#">Best seller </a> </li>
                                <li> <a href="#">Best rating </a> </li>
                            </ul>
                        </div>
                        <!-- end /.filter__option -->
                        <div class="filter__option filter--dropdown filter--range"> <a href="#" id="drop3" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Price Range
                                    <span class="lnr lnr-chevron-down"></span>
                                </a>
                            <div class="custom_dropdown dropdown-menu" aria-labelledby="drop3">
                                <div class="range-slider price-range"></div>
                                <div class="price-ranges"> <span class="from rounded">৳200</span> <span class="to rounded">৳500</span> </div>
                            </div>
                        </div>
                        <!-- end /.filter__option -->
                        <div class="filter__option filter--select">
                            <div class="select-wrap">
                                <select name="price">
                                    <option value="">Categories</option>
                                    <option value=""></option>
                                </select> <span class="lnr lnr-chevron-down"></span> </div>
                        </div>
                        <!-- end /.filter__option -->
                        <div class="filter__option filter--select">
                            <div class="select-wrap">
                                <select name="price">
                                    <option value="">Sub-Categories</option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select> <span class="lnr lnr-chevron-down"></span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end filter-bar -->
    <!--================================
        END FILTER AREA
    =================================-->

    <!--================================
        FOUND DISH
    =================================-->
<section class="products section--padding2">
    <div class="container">
        <!-- start .row -->
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <!-- start .single-product -->
                <div class="product product--card">

                    <div class="product__thumbnail">
                        <div class="aspect_ratio">
                            <img src="{{ asset('images/d.jpg') }}" alt="Product Image" class="ratio_img">
                        </div>

                        <div class="prod_btn">
                            <a href="#" class="transparent btn--sm btn--round">More
                                        Info
                                    </a>
                        </div>
                        <!-- end /.prod_btn -->
                    </div>
                    <!-- end /.product__thumbnail -->

                    <div class="product-desc">
                        <a href="" class="product_title">
                            <h4>Special Veg nonveg Pizza </h4>
                        </a>
                        <ul class="titlebtm">
                            <li>
                                <img class="auth-img" src="{{ asset('images/1.jpg') }}" alt="author image">
                                <p>
                                    <a href="#">name</a>
                                </p>
                            </li>
                            <li class="product_cat">
                                <a href="#">
                                            From <span>Sylhet</span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- end /.product-desc -->

                    <div class="product-purchase">
                        <div class="price_love">
                            <span>৳500</span>
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
                    </div>
                    <!-- end /.product-purchase -->
                </div>
                <!-- end /.single-product -->
            </div>
            <!-- end /.col-md-4 -->
        </div>
    </div>
                
    <div class="row">
        <div class="col-md-12">
            <div class="pagination-area categorised_item_pagination">
                <nav class="navigation pagination" role="navigation">
                    <div class="nav-links">
                        <a class="prev page-numbers" href="#"> <span class="lnr lnr-arrow-left"></span> </a> <a class="page-numbers current" href="#">1</a> <a class="page-numbers" href="#">2</a> <a class="page-numbers" href="#">3</a>
                        <a class="next page-numbers" href="#"> <span class="lnr lnr-arrow-right"></span> </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    </section>
    <!--================================
        END PRODUCTS AREA
    =================================-->


    <!--================================
        START CALL TO ACTION AREA
    =================================-->
    <section class="call-to-action bgimage">
        <div class="bg_image_holder">
            <img src="images/calltobg.jpg" alt="">
        </div>
        <div class="container content_above">
            <div class="row">
                <div class="col-md-12">
                    <div class="call-to-wrap">
                        <h1 class="text--white">Ready to Sell Your Special Dishes!</h1>
                        <h4 class="text--white">Over 1K chef and resturent trust this community.</h4>
                        <a href="#" class="btn btn--lg btn--round btn--white callto-action-btn">Join Us Today</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================================
        END CALL TO ACTION AREA
    =================================-->
</body>

@endsection