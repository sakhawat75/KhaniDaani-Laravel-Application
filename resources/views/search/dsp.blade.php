@extends ('layouts.master')

@section ('title', 'Search Delivery Services')

@section ('content') {{-- ready for initial development --}}

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
                                <label for="city">Select A City</label>
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
                                <label for="areas">Select an Area</label>
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
        <div class="row dsp_result delivery-service">
            <div class="col-md-12">
                <h3 class="text-center">Please Select A City From Dropdown Menu or Type in The Search Box to Start Searching</h3>
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
@include('includes.self_ads')
<!--================================
    END CALL TO ACTION AREA
=================================-->
@endsection

@push('scripts-footer-bottom')
    @include ('delivery.dsp_preview_template')

    <script type="text/javascript">
        _.templateSettings.variable = 'dsp';
        var timer;
        var keyword;
        var city;
        var area;

        var template = _.template(
            $('#dsp_template').html()
        );

        function callSearchDspApi() {
            keyword = $('#onpage_search').val();
            city = $('#city').val();
            area = $('#areas').val();

            // console.log('Keyword: ' + keyword);

            callDspSearch();
        }

        function callDspSearch() {
            $.ajax({
                url: "{{ route('api.search.dsp') }}",
                data: {
                    keyword: keyword,
                    city: city,
                    area: area,
                },
                type: "GET",
                dataType: "json",
            }).done( function (dsp) {
                $('.dsp_result').html('');
                $('ul.pagination').hide();

                renderDsp(dsp);
            });
        }

        function renderDsp(dsp) {
            // console.log('dish data: ' + dishes.data);
            if($.isEmptyObject(dsp.data)) {
                // console.log('if dishes: ' + dishes);
                $('.dsp_result').append('<h1>Sorry! no result found</h1>');
            }

            _.each(dsp.data, function(dsp) {
                $('.dsp_result').append(template(dsp));
            });
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

            $('#onpage_search').on('input change', function (event) {
                clearTimeout(timer);
                timer = setTimeout(function () {
                    callSearchDspApi();
                    // console.log('Min Price: ' + min_price);
                    // console.log('Max Price: ' + max_price);
                }, 500);
            });

            $("#search_scroll").click(function(e) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: $(".dsp_result").offset().top
                }, 700);
            });
        });
    </script>
@endpush