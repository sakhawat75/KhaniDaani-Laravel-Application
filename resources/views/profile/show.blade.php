@extends ('layouts.master')

@section ('title', 'Profile')

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
                {{-- @include( 'includes.profile_sidebar' )--}}
                <div class="col-lg-4 col-md-12">
                    <aside class="sidebar sidebar_author">
                        <div class="author-card sidebar-card">
                            <div class="author-infos">
                                <div class="author_avatar"><img
                                            src="{{ route('home') }}/storage/images/profile_image/{{ $profile->profile_image }}"
                                            alt="Presenting the broken author avatar :D"></div>
                                <div class="author">
                                    <a href="{{ route('profile.show', ['profile' => $profile->id]) }} #profile"><h4>
                                            {{ $profile->user->name }}
                                        </h4></a>
                                    <p>Joined {{ $profile->created_at->toFormattedDateString() }}</p>
                                </div>
                                <div class="author-badges">
                                    <ul class="list-unstyled">
                                        @if($profile->user->isChef())
                                            <li> <span data-toggle="tooltip" data-placement="bottom"
                                                       title="Have up to 10 dish for sale">
                        <img src="{{ URL::to('/') }}/images/svg/have_dish.png" alt="" class="svg">
                    </span></li>
                                        @endif
                                        @if($profile->user->isDsp())
                                            <li> <span data-toggle="tooltip" data-placement="bottom"
                                                       title="Have delivery option">
                        <img src="{{ URL::to('/') }}/images/svg/delivery.png" alt="" class="svg">
                    </span></li>
                                        @endif
                                        @if($profile->user->isPP())
                                            <li> <span data-toggle="tooltip" data-placement="bottom"
                                                       title="Hosting his place for dish collection">
                        <img src="{{ URL::to('/') }}/images/svg/pcikerpoint.png" alt="" class="svg">
                    </span></li>
                                        @endif
                                    </ul>
                                </div>
                                <!-- end /.author -->
                            </div>
                            <!-- end /.author-infos -->
                            <div class="freelance-status">
                                <div class="author-badges">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5 mg-bt text-center">@if(auth()->id() == $profile->user_id)
                                                @if ($profile->user->isChef() or $profile->user->isDsp() or $profile->user->isPP())
                                                    <h4 class="float-left scolor">Available:</h4></div>
                                        <div class="col-md-7">
                                            <form action="{{ route('profile.isAvailable', ['profile' => $profile->id]) }}" method="post">
                                                @csrf
                                                <label class="switch float-left"> {{--New css, last part, no js(w3school)--}}
                                                    <input type="checkbox" name="is_available" onChange='this.form.submit();' value="1"
                                                    @if($profile->is_available === 1)
                                                    checked
                                                            @endif
                                                    >
                                                    <span class="slider round"></span>
                                                </label><h4 class="scolor"><b>
                                                        @if($profile->is_available === 1)
                                                            Yes
                                                            @else
                                                            No
                                                        @endif
                                                    </b></h4>
                                            </form>
                                        </div>
                                        @endif
                                        @endif
                                    </div>

                                    <div class="author-btn">
                                        <button class="btn btn--md btn--round" data-toggle="modal"
                                                data-target="#messageModal"
                                                @if(auth()->id() == $profile->user_id)
                                                aria-disabled="true" disabled="disabled"

                                                @endif
                                        >Message Chef
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for sending message -->
                        <div class="modal fade" id="messageModal" tabindex="-1" role="dialog"
                             aria-labelledby="messageModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="messageModalLabel">
                                            Message {{ $profile->user->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="{{ route('messages.store_with_auth') }}" method="post"
                                              id="send_msg">
                                            @csrf
                                            <input type="hidden" name="sender_id" value="{{ auth()->id() }}">
                                            <input type="hidden" name="recipient_id" value="{{ $profile->user->id }}">

                                            <div class="form-group">
                                                <label for="msgText">Type your message Below</label>
                                                <textarea class="form-control" id="msgText"
                                                          placeholder="I want to buy your dish" name="body"></textarea>
                                            </div>

                                            {{-- <button type="submit" id="submit-form" class="d-none">send</button> --}}

                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        {{-- <label for="submit-form" tabindex="0"  class="btn btn-primary px-3 py-1">Send</label> --}}
                                        <button type="button" class="btn btn-primary px-3 py-1" form="send_msg"
                                                id="submit-form">Send
                                        </button>

                                        <button type="button" class="btn btn-secondary px-3 py-1" data-dismiss="modal">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="snackbar">Snackbar</div>

                        @push('scripts-footer-bottom')
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
                                    $('#submit-form').click(function (e) {
                                        e.preventDefault();
                                        $("#messageModal").modal('hide');
                                        var body = $('#msgText').val();
                                        $('#msgText').val(' ');

                                        @auth
                                        $.ajax({
                                            url: '{{ route('messages.store') }}',
                                            method: "POST",
                                            data: {
                                                '_token': '{{ csrf_token() }}',
                                                'sender_id': {{ auth()->id() }},
                                                'recipient_id': {{ $profile->user->id }},
                                                'body': body,
                                            },
                                        }).done(function (data) {
                                            console.log("data: " + data);
                                            snackbar('Message Sent Successfully');
                                            loadMessages();

                                        });
                                        @else
                                        snackbar('Please log in first to send message');
                                        @endauth
                                    });
                                });
                            </script>
                        @endpush
                        <div class="sidebar-card author-menu">
                            <ul>
                                <li><a href="{{ route('profile.show', ['profile' => $profile->id]) }} #profile">User
                                        Profile</a></li>
                                <li><a href="{{ route('profile.chefdishes', [ 'profile' => $profile->id]) }} #chefdish">Chef
                                        Dish</a></li>
                                <li><a href="{{ route('profile.chefdelivery', ['profile' => $profile->id]) }}">Delivery
                                        Services</a></li>
                                <li><a href="{{ route('profile.pickerspoint', ['user' => $profile->user]) }} #chefpp">Pickers
                                        Point</a></li>
                            </ul>
                        </div>
                    </aside>
                    <aside class="sidebar sidebar_author">
                        <div class="sidebar-card message-card">
                            <div class="card-title">
                                <h4>Contact Chef</h4></div>
                            <div class="message-form">
                                <form action="#">
                                    <div class="form-group">
                                        <textarea name="message" class="text_field" id="author-message"
                                                  placeholder="Your message..."></textarea>
                                    </div>
                                    <div class="msg_submit">
                                        <button type="submit" class="btn btn--md btn--round" id="send_msg">send
                                            message
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- end /.message-form -->
                        </div>
                    </aside>
                </div>
                <!-- end /.sidebar -->
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <!-- SALE STATUS -->
                        <div class="col-md-12">
                            <div class="author_module aspect_ratio mg-bt">
                                <img src="{{ route('home') }}/storage/images/cover_image/{{ $profile->cover_image }}"
                                     alt="author image" class="ratio_img">
                            </div>
                        </div>
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
                        <!-- SALE STATUS -->
                        <div class="col-md-12 col-sm-12">
                            <div class="author_module about_author mg-bt">
                                <h4> About {{ $user->name }}</h4>
                                <div class="brdr_btm"></div>
                                <p> {!! $profile->description !!} </p>
                            </div>
                        </div>
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
                                        <!-- end /.module_title -->

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
                                                            <!-- end /.info_wrap -->
                                                        </div>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end /.upload_modules -->
                            </div>
                        </div>
                        <!-- end /.row -->

                    {{--<div class="row">
                        <div class="col-md-12">
                            <div class="product-title-area">
                                <div class="product__title">
                                    <h2>{{ $user->name }} --}}{{--{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}--}}{{-- Dishes</h2>
                                </div>
                            </div>
                        </div>

                        @foreach($dishes as $dish)
                        <div class="col-lg-6 col-md-6">
                            <!-- start .single-product -->
                            <div class="product product--card">
                                <div class="product__thumbnail">
                                    <div class="aspect_ratio"> <img src="{{ route('home') }}/storage/images/dish_images/{{ $dish->dish_thumbnail }}" alt="Product Image" class="ratio_img"> </div>
                                    <div class="prod_btn"> 
                                    <a href="{{ route('dishes.show', ['id' => $dish]) }}" class="transparent btn--sm btn--round">More Info</a> 
                                    </div>
                                    <!-- end /.prod_btn -->
                                </div>
                                <!-- end /.product__thumbnail -->
                                <div class="product-desc">
                                    <a href="{{ route('dishes.show', ['id' => $dish]) }}" class="product_title">
                                        <h4> {{ $dish->dish_name }} </h4> </a>
                                    <ul class="titlebtm">
                                        <li> <img class="auth-img" src="{{ route('home') }}/storage/images/profile_image/{{ $profile->profile_image }}" alt="author image">
                                            <p> <a href="{{ route('profile.show', [ 'profile' => $profile->id]) }}">{{ $user->name }}</a> </p>
                                        </li>
                                        <li class="product_cat"> <a href="#">
                          From <span>{{ $profile->city }}, </span><span>{{ $profile->area }}</span></a> </li>
                                    </ul>
                                </div>
                                <!-- end /.product-desc -->
                                <div class="product-purchase">
                                    <div class="price_love"> <span>৳{{ $dish->dish_price }}</span>
                                        <p> <span class="lnr lnr-heart"></span> 0</p>
                                    </div>
                                    <div class="rating product--rating pull-right">
                                        <ul>
                                            @for ($i=1; $i <= 5; $i++)
                                                                                            
                                              <li>
                                                @if($i <= round($dish->avg_rating))
                                                  <span class="fa fa-star"></span>
                                                @else
                                                  <span class="fa fa-star-o"></span>
                                                @endif
                                              </li>

                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                                <!-- end /.product-purchase -->
                            </div>
                            <!-- end /.single-product -->
                        </div>
                        @endforeach
                    </div>--}}
                    <!-- end /.row -->
                    </div>
                </div>
            </div>
        </div>
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