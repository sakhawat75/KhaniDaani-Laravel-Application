<!-- Pikers Point Start -->


    <div class="row">
        <div class="col-sm-12">
            <a class="strip_list grid" href="#">
                <div class="desc">
                    <div class="thumb_strip">
                        <img src="{{ route('home') }}/storage/images/profile_image/{{ $pp->user->profile->profile_image }}" alt="User Image">
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
                        <h4 class="float-left mg-bt">Pick-up Point id: <b class="scolor">{{ $pp->id }}</b></h4>
                        <div class="price_love"><span data-toggle="tooltip" data-placement="button" title="Service charge">৳{{ $pp->charge }}</span>
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
            </a>
        </div>
    </div><!-- End strip_list-->
<!-- Pikers Point End -->

