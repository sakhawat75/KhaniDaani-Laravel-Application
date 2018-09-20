<div class="dsp-wrap">
    <div class="row">

            <div class="col-xs-12 col-sm-3 col-md-3 text-xs-center">
                <a class="dsp-images" href="{{ route('profile.show', [ 'profile' => $dsp->user->profile->id]) }}"><img src="{{ route('home') }}/storage/images/profile_image/{{ $dsp->user->profile->profile_image }}"
                                                     alt="dsp profile"> </a>
                <div class="dsp-username">
                    <h5>
                        <a href="{{ route('profile.show', [ 'profile' => $dsp->user->profile->id]) }}">{{ $dsp->user->name }}</a>
                    </h5>

                </div>
            </div>
        <!--end:col -->
            <div class="col-xs-12 col-sm-9 col-md-9">
                <h5 class="dsp-title">{{ $dsp->service_title }}</h5>
                <p>Service Hours: {{$dsp->service_hours_start}} to {{$dsp->service_hours_end}} </p>
                    <p>
                        <span class="bold">DSP-ID:</span>
                        <span class="bold text-primary">{{ $dsp->id }}</span>
                    </p>
            </div>
        <div class="col-md-12"><p class="dsp-description">{!! $dsp->service_description !!}</p>
            <p class="dsp-area">Service Area: <span>{{ $dsp->service_area }}</span></p>

        </div>


        <div class="col-md-12">
            <div class="bottom-part">
                <div class="btm-part-2">
                    <div class="cost"><i class="fa fa-check"></i> Service charge:
                        ৳{{ $dsp->service_charge }}
                    </div>
                    <div class="mins"><i class="fa fa-motorcycle"></i> {{ $dsp->min_delivery_time }} hrs - {{ $dsp->max_delivery_time }} hrs
                    </div>

                </div>
            </div>
        </div>
        <!-- end:col -->
    </div>
    <!-- end:row -->
</div>
<!--end:Restaurant wrap -->