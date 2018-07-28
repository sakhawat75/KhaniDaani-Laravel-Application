<script type="text/template" class="template" id="dish_template">

  <div class="col-lg-4 col-md-6">
    <!-- start .single-product -->
    <div class="product product--card">
      <div class="product__thumbnail">
        <div class="aspect_ratio">
          <img src="{{ route('home') }}/storage/images/dish_images/<%= dish.dish_thumbnail %>" alt="Product Image"
               class="ratio_img">
        </div>
        <div class="prod_btn">
          <a href="{{ route('home') }}/dishes/<%= dish.id %>" class="transparent btn--sm btn--round">MoreInfo</a>
        </div>
        <!-- end /.prod_btn -->
      </div>
      <!-- end /.product__thumbnail -->
      <div class="product-desc">
        <a href="{{ route('home') }}/dishes/<%= dish.id %>" class="product_title">
          <h4> <%= dish.dish_name %> </h4></a>
        <ul class="titlebtm">
          <li>
            <img class="auth-img"
                 src="{{ route('home') }}/storage/images/profile_image/<%= dish.profile.profile_image %>"
                 alt="author image">
            <p>
              <a href="#"> <%= dish.profile.user_name %></a>
            </p>
          </li>
          <li class="product_cat">
            <a href="#">
              From <span> <%= dish.profile.city %>, </span>
              <span> <%= dish.profile.area %> </span></a>
          </li>
        </ul>
      </div>
      <!-- end /.product-desc -->
      <div class="product-purchase">
        <div class="price_love"><span>৳<%= dish.dish_price %></span>
          <p><span class="lnr lnr-heart"></span> 48</p>
        </div>
        <div class="rating product--rating pull-right">
          <ul>
            <li><span class="fa fa-star"></span></li>
            <li><span class="fa fa-star"></span></li>
            <li><span class="fa fa-star"></span></li>
            <li><span class="fa fa-star"></span></li>
            <li><span class="fa fa-star-half-o"></span></li>
          </ul>
        </div>
      </div>
      <!-- end /.product-purchase -->
    </div>
    <!-- end /.single-product -->
  </div>

</script>