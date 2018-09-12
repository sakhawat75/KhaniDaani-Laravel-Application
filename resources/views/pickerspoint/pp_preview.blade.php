<!-- Pikers Point Start -->

<div class="col-md-6 col-sm-6" data-wow-delay="0.5s">
    <a class="strip_list grid" href="#">
        <div class="desc">
            <div class="thumb_strip">
                <img src="" alt="">
            </div>


            <h3 class="pp_title">{{ $pp->name }}</h3>
            <div class="type">
                {{ $pp->type }}
            </div>
            <div class="location">
                {{ $pp->address }} <br>
            </div>
            <div class="hours">
                {{--<span class="opening">Opens @ {{ date('h:i A', strtotime($pp->open_at) ) }}.</span><span class="closing"> Close @ {{ \Carbon\Carbon::parse($pp->close_at)->format('h:m A') }}</span>--}}
                <span class="opening">Opens @ {{ date('h:i A', strtotime($pp->open_at) ) }}.</span><span class="closing"> Close @ {{ date('h:i A', strtotime($pp->close_at) ) }}</span>
            </div>
            <br>

            <div class="product-purchase">
                <div class="price_love"> <span>৳{{ $pp->charge }}</span>
                    {{--<p> <span class="lnr lnr-heart"></span> 0</p>--}}
                </div>
                {{--<div class="rating product--rating pull-right">
                    <ul>
                        <li><span class="fa fa-star-o"></span></li>
                        <li><span class="fa fa-star-o"></span></li>
                        <li><span class="fa fa-star-o"></span></li>
                        <li><span class="fa fa-star-o"></span></li>
                        <li><span class="fa fa-star-o"></span></li>
                    </ul>
                </div>--}}
            </div>

        </div>
    </a><!-- End strip_list-->
</div><!-- End col-md-6-->
<!-- Pikers Point End -->

