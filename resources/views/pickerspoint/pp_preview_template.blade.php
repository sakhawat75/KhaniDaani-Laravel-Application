<script type="text/template" class="template" id="pp_template">

    <div class="col-md-6 single-dsp">

        <a class="strip_list grid" href="#">
            <div class="desc">
                <div class="thumb_strip">
                    <img src="{{ route('home') }}/storage/images/profile_image/<%- pp.profile.profile_image %>"
                         alt="pp profile">
                </div>

                <h3 class="pp_title"><%- pp.name %></h3>
                <div class="type">
                    <%- pp.type %>
                </div>
                <div class="location">
                    <%- pp.address %> <br>
                </div>
                <div class="hours mg-bt">
                    {{--<span class="opening">Opens @ {{ date('h:i A', strtotime($pp->open_at) ) }}.</span><span class="closing"> Close @ {{ \Carbon\Carbon::parse($pp->close_at)->format('h:m A') }}</span>--}}
                    <span class="opening">Opens @ <%- moment(pp.open_at, "HH:mm:ss").format("hh:mm A") %></span>
                    <span class="closing"> Close @ <%- moment(pp.close_at, "HH:mm:ss").format("hh:mm A") %></span>
                </div>
                <div>


                </div>
                <div class="product-purchase">
                    <h4 class="float-left">Pick-up Point id:<b class="scolor"> <%- pp.id %></b></h4>
                    <div class="price_love"><span data-toggle="tooltip" data-placement="button" title="Service charge">৳<%- pp.charge %></span>
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
        <!--end:Restaurant wrap -->

    </div>


</script>