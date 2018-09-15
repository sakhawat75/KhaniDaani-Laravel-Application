@extends ('layouts.master')


@section ('title', 'Chef Dish')

@section ('content')

    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area title-hide">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">{{ $user->name }} Delivery Services</h1>
                </div>
            </div>
        </div>
    </section>
    <!--================================
          END BREADCRUMB AREA
      =================================-->

    @include( 'includes.menu-dashboard' )

    <!--================================
        START PROFILE AREA
    =================================-->

    <div class="container">
        @include('includes.success_message')
        @include('includes.error_messeages')
    </div>

    <section class="author-profile-area">
        <div class="container">
            <div class="row">
            @include( 'includes.profile_sidebar' )
                <!-- end /.sidebar -->
                <div class="col-lg-8 col-md-12">
                     <div class="row">
                         <div class="col-md-12" id="chefdsp">
                             <div class="filter-bar clearfix filter-bar2">
                                 <div class="filter__option filter--text pull-left">
                                     <p>
                                         <span> {{ $profile->user->name }}</span> Delivery Services</p>
                                 </div>
                                 <div class="pull-right"></div>
                             </div>
                         </div>
                    </div>
                    <!-- end /.row -->
                    <section class="delivery-service">
                        <div class="">
                            <div class="row">
                                @foreach($dsps as $dsp)
                                <div class="col-md-12 single-dsp">
                                    @include ('profile.dsp_preview')
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>

                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.col-md-8 -->
        </div>
        <!-- end /.row -->
    </section>

    <!--================================
  START SELF-ADS AREA
=================================-->
    @include('includes.self_ads')
    <!--================================
    END SELF-ADS AREA
=================================-->

@endsection