<script type="text/template" class="template" id="dsp_template">

    <div class="col-md-6 single-dsp">

        <div class="dsp-wrap">
            <div class="row">
                <div class="col-xs-12 col-sm-3 col-md-3">
                    <a class="dsp-images" href="{{ route('home') }}/profile/<%- dsp.profile.id %>"><img src="{{ route('home') }}/storage/images/profile_image/<%- dsp.profile.profile_image %>"
                                                                                                                alt="dsp profile" >  </a>
                    <div class="dsp-username">
                        <h5>
                            <a href="{{ route('home') }}/profile/<%- dsp.profile.id %>"><%- dsp.profile.user_name %></a>
                        </h5>
                    </div>

                </div>
                <!--end:col -->
                <div class="col-xs-12 col-sm-9 col-md-9">
                <h5 class="dsp-title"><%- dsp.service_title %></h5>
                    <p>Service Hours: <b><%- moment(dsp.service_hours_start, 'HH:mm:ss').format('h:mm a') %></b> to <b><%- moment(dsp.service_hours_end, 'HH:mm:ss').format('h:mm a') %></b> </p>
                    <div class="sell">
                        <p>
                            <span class="bold">DSP-ID:</span>
                            <span class="bold text-primary"><%- dsp.id %></span>
                            <small class="ml-3">(Please Use This ID When Adding dsp in New Dish Upload)</small>
                        </p>
                    </div>
                </div>
                <div class="col-md-12">
                    <p class="dsp-description"><%- dsp.service_description %></p>
                    <p class="dsp-area">Service Area: <span><%- dsp.service_area %></span></p>
                </div>
                <div class="col-md-12">
                    <div class="bottom-part">
                        <div class="btm-part-2">
                            <div class="cost"><i class="fa fa-check"></i> Service charge:
                                ৳<%- dsp.service_charge %>
                            </div>
                            <div class="mins"><i class="fa fa-motorcycle"></i> <%- dsp.min_delivery_time %> hrs - <%- dsp.max_delivery_time %> hrs
                            </div>

                            {{--<div class="rating product--rating">
                                <ul>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                    <li>
                                        <span class="fa fa-star-o"></span>
                                    </li>
                                </ul>
                                <span class="rating__count">(0)</span>
                            </div>--}}

                        </div>
                    </div>
                </div>
                <!-- end:col -->
            </div>
            <!-- end:row -->
        </div>
        <!--end:Restaurant wrap -->

    </div>


</script>