@extends ('layouts.master')


@section ('title', 'Pick-up Point for delivery')

@section ('content')

    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area title-hide">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">{{ $user->name }} Pickers Point</h1>
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
    <section class="author-profile-area">
        <div class="container">
            <div class="row">
            @include( 'includes.profile_sidebar' )
                <!-- end /.sidebar -->

                <div class="col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-md-12 id="chefpp">
                                <div class="filter-bar clearfix filter-bar2">
                                    <div class="filter__option filter--text pull-left">
                                        <p>
                                            <span> {{ $profile->user->name }}</span> Pickers point</p>
                                    </div>
                                    <div class="pull-right"></div>
                                    <!-- end /.pull-right -->
                                </div>
                                <!-- end filter-bar -->
                            </div>
                            <!-- end /.col-md-12 -->
                            @foreach($pickerspoints as $pp)
                                <div class="col-md-6" data-wow-delay="0.5s">
                                    @include('pickerspoint.pp_preview')
                                </div>
                            @endforeach
                        </div>
                        <!-- end /.row -->

                    <div class="pagination-area pagination--right">
                        {{--<nav class="navigation pagination" role="navigation">
                            <div class="nav-links">
                                <a class="prev page-numbers" href="#">
                                    <span class="lnr lnr-arrow-left"></span>
                                </a>
                                <a class="page-numbers current" href="#/">1</a>
                                <a class="page-numbers" href="#">2</a>
                                <a class="page-numbers" href="#">3</a>
                                <a class="next page-numbers" href="#">
                                    <span class="lnr lnr-arrow-right"></span>
                                </a>
                            </div>
                        </nav>--}}
                        {{ $pickerspoints->links() }}
                    </div>

                </div>
                <!-- end /.col-md-8 -->

            </div>
            <!-- end /.row -->

        </div>
    </section>
    <!--================================
 START SELF-ADS AREA
=================================-->
    @include('includes.self_ads')
    <!--================================
    END SELF-ADS AREA
=================================-->
@endsection