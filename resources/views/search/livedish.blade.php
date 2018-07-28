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
                Total <span>5</span> live dishes for our KhaniDaani community</h3></div>
            <div class="search__field">
              <form action="#">
                <div class="field-wrapper">
                  <input class="relative-field rounded" type="text" placeholder="Search your Dishes" id="onpage_search">
                  <button class="btn btn--round" type="submit">Search</button>
                </div>
              </form>
            </div>
            <div class="breadcrumb">
              <ul>
                <li>
                  <a href="#">Home</a>
                </li>
                <li class="active">
                  <a href="#">All Dishes</a>
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
<div class="filter-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="filter-bar">
          <div class="filter__option filter--dropdown">
            <a href="#" id="drop1" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false">Dish Type
              <span class="lnr lnr-chevron-down"></span>
            </a>
            <ul class="custom_dropdown custom_drop2 dropdown-menu" aria-labelledby="drop1">
              <li>
                <a href="#">Live Foods
                  <span>35</span>
                </a>
                <a href="#">Exportable Foods
                  <span>35</span>
                </a>
              </li>
            </ul>
          </div>
          <!-- end /.filter__option -->
          <div class="filter__option filter--dropdown">
            <a href="#" id="drop2" class="dropdown-trigger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false">Filter By
              <span class="lnr lnr-chevron-down"></span>
            </a>
            <ul class="custom_dropdown dropdown-menu" aria-labelledby="drop2">
              <li>
                <a href="#">Trending items</a>
              </li>
              <li>
                <a href="#">Popular items</a>
              </li>
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
          <!-- end /.filter__option -->
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
          <!-- end /.filter__option -->
          <form action="{{ route('search.livedish') }}" method="post">
            @csrf


            <div class="filter__option filter--select">
              <div class="select-wrap">
                <select name="dish_category" id="dish_category" class="text_field">
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

            <button class="btn btn--round py-2 px-3">Search</button>
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
<section class="products section--padding2">
  <div class="container scroll" >
    <!-- start .row -->
    <div class="row" id="dish_result">
      @include('includes.dish_preview')
    </div>
    <div class="container">
      {{ $dishes->links() }}
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

  @push('scripts-footer-bottom')
    @include('underscore_templates.dish_preview_template')
    <script>
      $(document).ready(function () {
          _.templateSettings.variable = 'dish';
          var min_price = 0;
          var max_price = 0;
          var timer;


          var template = _.template(
              $('script.template').html()
          );

          var renderDishes = function(dishes) {
              _.each(dishes.data, function(dish) {
                  $('#dish_result').prepend(template(dish));
              });
          };

          $('#dish_category').prepend('<option value="" selected>All Category</option>');

          $("#dish_category").off('change');
          $('#dish_subcategory').empty();
          $('#dish_subcategory').append('<option value="" selected>All Sub Category</option>');

          $("#dish_category").on('change', function (e) {
              console.log(e);
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

          $('#onpage_search').on('input', function (event) {
              clearTimeout(timer);
              timer = setTimeout(function () {
                  callAjax();
                  console.log('Min Price: ' + min_price);
                  console.log('Max Price: ' + max_price);
              }, 500);
          });

          function callAjax() {
              let keyword = $('#onpage_search').val();
              let cat_name = $('#dish_category').val();
              let subcat_name = $('#dish_subcategory').val();

              // console.log('Keyword: ' + keyword);

              $.ajax({
                  url: "{{ route('api.search.dish') }}",
                  data: {
                      dish_category: cat_name,
                      dish_subcategory: subcat_name,
                      keyword: keyword,
                      min_price: min_price,
                      max_price: max_price,
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
                      console.log('Min Price: ' + min_price);
                      console.log('Max Price: ' + max_price);
                  }, 1000);

              }

          });


      });


    </script>
  @endpush
@endsection