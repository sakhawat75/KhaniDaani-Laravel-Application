@extends ('layouts.master') @section ('title', 'Search Dishes') @section ('content') {{-- ready for initial development --}}

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
                Total <span>5</span> Dishes only for you.</h3></div>
            <div class="search__field">
              <form action="{{ route('search.livedish') }}" method="get">
                <div class="field-wrapper">
                  <input class="relative-field rounded" type="text" placeholder="Search your Dishes" id="onpage_search" name="keyword">
                  <button class="btn btn--round" type="submit" id="search_scroll">Search</button>
                </div>
              </form>
            </div>
            <div class="breadcrumb">
              <ul>
                <li>
                  <a href="{{route('home')}}">Home</a>
                </li>
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

          <form action="{{ route('search.livedish') }}" method="post">
            @csrf

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


            <div class="filter__option filter--select">
              <div class="select-wrap">
                <select name="dish_category" id="dish_category" class="text_field">
                    <option value="" selected>Select Category</option>
                  @foreach($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                  @endforeach
                </select>
                <span class="lnr lnr-chevron-down"></span></div>
            </div>
            <!-- end /.filter__option -->
            <div class="filter__option filter--select">
              <div class="select-wrap">
                <select name="dish_subcategory" id="dish_subcategory" class="text_field">

                </select>
                <span class="lnr lnr-chevron-down"></span></div>
            </div>
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
<!--================================
    FOUND DISH
=================================-->
<section class="products">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <aside class="sidebar product--sidebar">

                    <div class="sidebar-card card--slider">
                        <a class="card-title" href="#collapse3" role="button" data-toggle="" aria-expanded="false" aria-controls="collapse3">
                            <h4>Range Price
                                <span class="lnr lnr-chevron-down"></span>
                            </h4>
                        </a>
                        <div class="collapse show collapsible-content" id="collapse3">
                            <div class="card-content">
                                <div class="range-slider price-range"></div>

                                <div class="price-ranges">
                                    <span class="from rounded" id="min_price">৳200</span>
                                    <span class="to rounded" id="max_price">৳500</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-card card--filter">
                        <a class="card-title" href="#collapse1" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapse1">
                            <h4>Filter Price
                                <span class="lnr lnr-chevron-down"></span>
                            </h4>
                        </a>
                        <div class="collapse show collapsible-content" id="collapse1">
                            <ul class="card-content">

                                <li>
                                    <div class="custom-checkbox2">
                                        <input type="checkbox" id="opt3" class="" name="filter_opt">
                                        <label for="opt3">
                                            <span class="circle"></span>Low to high</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-checkbox2">
                                        <input type="checkbox" id="opt4" class="" name="filter_opt">
                                        <label for="opt4">
                                            <span class="circle"></span>High to low</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-card card--filter">
                        <a class="card-title" href="#collapse2" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapse2">
                            <h4>Filter Dishes
                                <span class="lnr lnr-chevron-down"></span>
                            </h4>
                        </a>
                        <div class="collapse show collapsible-content" id="collapse2">
                            <ul class="card-content">

                                <li>
                                    <div class="custom-checkbox2">
                                        <input type="checkbox" id="opt3" class="" name="filter_opt">
                                        <label for="opt3">
                                            <span class="circle"></span>New Dish</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-checkbox2">
                                        <input type="checkbox" id="opt4" class="" name="filter_opt">
                                        <label for="opt4">
                                            <span class="circle"></span>Best Chef</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-checkbox2">
                                        <input type="checkbox" id="opt5" class="" name="filter_opt">
                                        <label for="opt5">
                                            <span class="circle"></span>Best Dish</label>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </aside>


            </div>

            <div class="col-md-8">

                <div class="container scroll" >
                    <!-- start .row -->
                    <div class="row" id="dish_result">
                        @include('includes.dish_preview')
                    </div>
                    <div class="container">
                        {{ $dishes->links() }}
                    </div>
                </div>

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
@include('includes.self_ads')
<!--================================
    END CALL TO ACTION AREA
=================================-->

  @push('scripts-footer-bottom')
    @include('underscore_templates.dish_preview_template')
    <script>
      $(document).ready(function () {
          _.templateSettings.variable = 'dish';
          var min_price = 0;
          var max_price = 0;
          var timer;
          var keyword;
          var cat_name;
          var subcat_name;
          var city ;
          var area;


          var template = _.template(
              $('script.template').html()
          );

          var renderDishes = function(dishes) {
                     // console.log('dish data: ' + dishes.data);
                      if($.isEmptyObject(dishes.data)) {
                          // console.log('if dishes: ' + dishes);
                        $('#dish_result').append('<h1>Sorry! no result found</h1>');
                      }

              _.each(dishes.data, function(dish) {
                  $('#dish_result').prepend(template(dish));
              });
          };


          @if($request->has('keyword'))
                var kw = '{{ $request->input('keyword')  }}';
                kw.trim();
                $("#onpage_search").val(kw);
                callAjax();
                  $('html, body').animate({
                      scrollTop: $("#filter-area").offset().top
                  }, 700);
          @endif


          $('#dish_category').prepend('<option value="" selected>All Category</option>');

          $("#dish_category").off('change');
          $('#dish_subcategory').empty();
          $('#dish_subcategory').append('<option value="" selected>All Sub Category</option>');

          $('#areas').append('<option value="" selected>All Areas</option>');

          $("#dish_category").on('change', function (e) {
              // console.log(e);
              $('#dish_subcategory').empty();
              $('#dish_subcategory').prepend('<option value="" selected>All Sub Category</option>');
              let cat_name = e.target.value;

              $.get('/ajax-subcat?cat_name=' + cat_name, function (data) {

                  $.each(data, function (index, subCatObj) {
                      $('#dish_subcategory').append('<option value="' + subCatObj.name + '">' + subCatObj.name + '</option>');
                  });
              });

              callAjax();
          });

          // $("#dish_category").trigger('change');
          $('#dish_subcategory').on('change', function (e) {
              callAjax();
          });

          $('#onpage_search').on('input change', function (event) {
              clearTimeout(timer);
              timer = setTimeout(function () {
                  callAjax();
                  // console.log('Min Price: ' + min_price);
                  // console.log('Max Price: ' + max_price);
              }, 500);
          });


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

              callAjax();
          });

          //areas
           $("#areas").off('change');
          $("#areas").on('change', function (e) {

              callAjax();
          });



          function callAjax() {
              keyword = $('#onpage_search').val();
              cat_name = $('#dish_category').val();
              subcat_name = $('#dish_subcategory').val();
              city = $('#city').val();
              area = $('#areas').val();

              // console.log('Keyword: ' + keyword);

              callSearch();
          }

          function callSearch() {
              $.ajax({
                  url: "{{ route('api.search.dish') }}",
                  data: {
                      dish_category: cat_name,
                      dish_subcategory: subcat_name,
                      keyword: keyword,
                      min_price: min_price,
                      max_price: max_price,
                      city: city,
                      area: area,
                  },
                  type: "GET",
                  dataType: "json",
              }).done( function (dishes) {
                  $('#dish_result').html('');
                  $('ul.pagination').hide();

                  renderDishes(dishes);
              });
          }

          $("body").on('DOMSubtreeModified', ".price-ranges", function() {
              max_price = $("#max_price").text();
              min_price = $("#min_price").text();

              min_price = + min_price.replace(/([^0-9\\.])/g,"");
              max_price = + max_price.replace(/([^0-9\\.])/g,"");

              if(max_price > 0 && min_price > 0) {
                  clearTimeout(timer);
                  timer = setTimeout(function () {
                      callAjax();
                      // console.log('Min Price: ' + min_price);
                      // console.log('Max Price: ' + max_price);
                  }, 1000);

              }

          });

          $("#search_scroll").click(function(e) {
              e.preventDefault();
              $('html, body').animate({
                  scrollTop: $("#dish_result").offset().top
              }, 700);
          });

      });


    </script>
  @endpush
@endsection