@extends ('layouts.master') @section ('title', 'Search Delivery Services') @section ('content') {{-- ready for initial development --}}

<!--================================
        START SEARCH AREA
    =================================-->
<section class="search-wrapper">
    <div class="search-area2 bgimage">
        <div class="bg_image_holder">
            <img src="images/search.jpg" alt="">
        </div>
        <div class="container content_above">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="search">
                        <div class="search__title">
                            <h3>
                                Total <span>5</span> Delivery Services for our chef and foodies.</h3></div>
                        <div class="search__field pb-3">
                            <form action="{{ route('search.dsp') }}" method="get">
                                <div class="field-wrapper">
                                    <input class="relative-field rounded" type="text" placeholder="Search Available Delivery Services By Name" id="onpage_search" name="keyword">
                                    <button class="btn btn--round" type="submit" id="search_scroll">Search</button>
                                </div>
                            </form>
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
<div class="filter-area" id="filter-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="filter-bar">

                    <!-- end /.filter__option
                    <div class="filter__option filter--dropdown">
                      <a href="#" id="drop2" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false">Filter By
                        <span class="lnr lnr-chevron-down"></span>
                      </a>
                      <ul class="custom_dropdown dropdown-menu" aria-labelledby="drop2">
                        <li>
                          <a href="#">New items</a>
                        </li>
                        <li>
                          <a href="#">Best seller</a>
                        </li>
                        <li>
                          <a href="#">Best rating</a>
                        </li>
                      </ul>
                    </div>
                    <!-- end /.filter__option
                    <div class="filter__option filter--dropdown filter--range">
                      <a href="#" id="drop3" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false">Price Range
                        <span class="lnr lnr-chevron-down"></span>
                      </a>
                      <div class="custom_dropdown dropdown-menu" aria-labelledby="drop3">
                        <div class="range-slider price-range"></div>
                        <div class="price-ranges"><span class="from rounded" id="min_price">৳200</span> <span class="to rounded" id="max_price">৳500</span>
                        </div>
                      </div>
                    </div>
                     end /.filter__option -->

                    <form action="{{ route('search.dsp') }}" method="post">


                        <div class="filter__option filter--select">
                            <div class="select-wrap">
                                <select name="city" id="city" class="text_field">
                                    <option value="" selected="selected">All Cities</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->name }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                <span class="lnr lnr-chevron-down"></span>
                            </div>
                        </div>

                        <div class="filter__option filter--select">
                            <div class="select-wrap">
                                <select name="areas" id="areas" class="text_field">

                                </select>
                                <span class="lnr lnr-chevron-down"></span>
                            </div>
                        </div>


                        {{--<div class="filter__option filter--select">
                            <div class="select-wrap">
                                <select name="dish_category" id="dish_category" class="text_field">

                                </select>
                                <span class="lnr lnr-chevron-down"></span></div>
                        </div>
                        <!-- end /.filter__option -->
                        <div class="filter__option filter--select">
                            <div class="select-wrap">
                                <select name="dish_subcategory" id="dish_subcategory" class="text_field">

                                </select>
                                <span class="lnr lnr-chevron-down"></span></div>
                        </div>--}}
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end filter-bar -->
<!--================================
    END FILTER AREA
=================================-->

<section class="products section--padding2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">



            </div>
        </div>
    </div>


    {{--<div class="row">
        <div class="col-md-12">
            --}}{{--<div class="pagination-area categorised_item_pagination">
                <nav class="navigation pagination" role="navigation">
                    <div class="nav-links">
                        <a class="prev page-numbers" href="#"> <span class="lnr lnr-arrow-left"></span> </a> <a class="page-numbers current" href="#">1</a> <a class="page-numbers" href="#">2</a> <a class="page-numbers" href="#">3</a>
                        <a class="next page-numbers" href="#"> <span class="lnr lnr-arrow-right"></span> </a>
                    </div>
                </nav>
            </div>--}}{{--
            <div class="container">
                {{ $dishes->links() }}
            </div>

        </div>
    </div>--}}
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
                    <h1 class="text--white">Are you looking for freelancing?</h1>
                    <h4 class="text--white">Earn without any experince.</h4>
                    <a href="" class="btn btn--lg btn--round btn--white callto-action-btn">Join Us Today</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================================
    END CALL TO ACTION AREA
=================================-->
@endsection

@push('scripts-footer-bottom')
    <script type="text/javascript">

        function callSearchDspApi() {

        }

        $(document).ready( function () {
            //Cities
            $("#city").off('change');

            $("#city").on('change', function (e) {
                // console.log(e);
                $('#areas').empty();
                $('#areas').prepend('<option value="" selected>All Areas</option>');
                let city_name = e.target.value;

                $.get('/ajax-areas?city_name=' + city_name, function (data) {

                    $.each(data, function (index, subCatObj) {
                        $('#areas').append('<option value="' + subCatObj.name + '">' + subCatObj.name + '</option>');
                    });
                });

                callSearchDspApi();
            });

            //areas
            $("#areas").off('change');
            $("#areas").on('change', function (e) {

                callSearchDspApi();
            });
        });
    </script>
@endpush