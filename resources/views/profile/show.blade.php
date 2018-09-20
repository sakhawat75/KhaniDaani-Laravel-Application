@extends ('layouts.master')

@section ('title', 'Chef Profile')

@section ('content')

    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area title-hide">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">{{ $user->name }} Profile</h1>
                </div>
            </div>
        </div>
    </section>
    <!--================================
          END BREADCRUMB AREA
      =================================-->


    @if (auth()->id() == $profile->user->id)
        @include( 'includes.menu-dashboard')
    @endif

    <!--================================
        START PROFILE AREA
    =================================-->
    <section class="author-profile-area">
        <div class="container" id="profile">
            @include('includes.success_message')
            @include('includes.error_messeages')

            <div class="row">
                 @include( 'includes.profile_sidebar' )
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <!-- SALE STATUS -->
                        <div class="col-md-12">
                            <div class="author_module aspect_ratio mg-bt">
                                <img src="{{ route('home') }}/storage/images/cover_image/{{ $profile->cover_image }}"
                                     alt="author image" class="ratio_img">
                            </div>
                        </div></div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="author-info mcolorbg4">
                                <p>Total Dish</p>
                                <h3>{{ count($dishes) }}</h3>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="author-info pcolorbg">
                                <p>Total sales</p>
                                <h3>{{ $total_sales }}</h3>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="author-info scolorbg">
                                <p>Total Ratings</p>
                                <div class="rating product--rating">
                                    <ul>
                                        @for ($i=1; $i <= 5; $i++)
                                            <li>
                                                @if($i <= $total_ratings) <span class="fa fa-star"></span>
                                                @else
                                                    <span class="fa fa-star-o"></span>
                                                @endif
                                            </li>

                                        @endfor
                                    </ul>
                                    <span class="rating__count">({{ $total_ratings_count }})</span>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="author_module about_author mg-bt">
                                <h4> About {{ $user->name }}</h4>
                                <div class="brdr_btm"></div>
                                <p> {!! $profile->description !!} </p>
                            </div>
                        </div>
                        </div>
                            <div class="row">
                            <div class="col-md-12">
                                <div class="upload_modules">
                                    <a class="toggle_title" href="#collapse5" role="button" data-toggle="collapse"
                                       aria-expanded="false" aria-controls="collapse5">
                                        <h4>Add Dish or Services
                                            <span class="lnr lnr-chevron-down"></span>
                                        </h4>
                                    </a>

                                    <div class="information__set toggle_module collapse" id="collapse5">
                                        <div class="upload_modules with--addons">
                                            <div class="modules__content">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4">
                                                        <a href="{{route('dishes.create')}}">
                                                            <div class="statement_info_card">
                                                                <div class="info_wrap">
                                                                    <span class="lnr lnr-tag icon bg-white"></span>
                                                                    <div class="info">
                                                                        <a href="{{route('dishes.create')}}"><span> <b>Add Dish Become A Chef</b> </span></a>
                                                                    </div>
                                                                </div>
                                                                <!-- end /.info_wrap -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4">
                                                        <a href="{{route('delivery.AddService')}}">
                                                            <div class="statement_info_card">
                                                                <div class="info_wrap">
                                                                    <span class="lnr lnr-tag icon bg-white"></span>
                                                                    <div class="info">
                                                                        <span> <b>Add Delivery Services</b> </span>
                                                                    </div>
                                                                </div>
                                                                <!-- end /.info_wrap -->
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4">
                                                        <a href="{{route('pickerspoint.addpp')}}">
                                                            <div class="statement_info_card">
                                                                <div class="info_wrap">
                                                                    <span class="lnr lnr-tag icon bg-white"></span>
                                                                    <div class="info">
                                                                        <span> <b>Add Pickup Point</b> </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> {{--col md 12--}}
                            </div>
                        <!-- end /.row -->
                    </div>
                </div>
            </div>
        </div>
    </aside>
    </section>


@endsection


@push ('head-css')
    <style type="text/css">
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.3s, fadeout 0.3s 1.3s;
            animation: fadein 0.3s, fadeout 0.3s 1.3s;
        }

        @-webkit-keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }
            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }
            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }
            to {
                bottom: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }
            to {
                bottom: 0;
                opacity: 0;
            }
        }
    </style>
@endpush


@push('scripts-footer-bottom-2')
    <style type="text/css">

    </style>

    <script type="text/javascript">
        $(document).ready(function () {
            //snackbar
            function snackbar($msg) {
                $('#snackbar').html($msg);
                $('#snackbar').toggleClass('show');
                setTimeout(function () {
                    $('#snackbar').removeClass('show');
                }, 1600);
            }


            //send message
            $('#send_msg').click(function (e) {
                e.preventDefault();
                var body = $('#author-message').val();
                $('#author-message').val(' ');

                $.ajax({
                    url: '{{ route('messages.store') }}',
                    method: "POST",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'sender_id': {{ auth()->id() }},
                        'recipient_id': {{ $profile->id }},
                        'body': body,
                    },
                }).done(function (data) {
                    console.log("data: " + data);
                    snackbar('Message Sent Successfully');

                });
            });
        });
    </script>

@endpush