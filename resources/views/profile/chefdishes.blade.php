@extends ('layouts.master')

@section ('title', 'Delivery services')

@section ('content')

    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area title-hide">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">{{ $user->name }} Dishes</h1>
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
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <aside class="sidebar sidebar_author" >

                        <div class="author-card sidebar-card">
                            <div class="author-infos">
                                <div class="author_avatar"> <img src="{{ route('home') }}/storage/images/profile_image/{{ $profile->profile_image }}" alt="Presenting the broken author avatar :D"> </div>
                                <div class="author">
                                    <a href="{{ route('profile.show', ['profile' => $profile->id]) }} #profile"><h4>
                                            {{ $profile->user->name }}
                                        </h4></a>
                                    <p>Joined {{ $profile->created_at->toFormattedDateString() }}</p>
                                </div>
                                <div class="author-badges">
                                    <ul class="list-unstyled">
                                        @if($profile->user->isChef())
                                            <li> <span data-toggle="tooltip" data-placement="bottom" title="Have up to 10 dish for sale">
                        <img src="{{ URL::to('/') }}/images/svg/have_dish.png" alt="" class="svg">
                    </span> </li>
                                        @endif
                                        @if($profile->user->isDsp())
                                            <li> <span data-toggle="tooltip" data-placement="bottom" title="Have delivery option">
                        <img src="{{ URL::to('/') }}/images/svg/delivery.png" alt="" class="svg">
                    </span> </li>
                                        @endif
                                        @if($profile->user->isPP())
                                            <li> <span data-toggle="tooltip" data-placement="bottom" title="Hosting his place for dish collection">
                        <img src="{{ URL::to('/') }}/images/svg/pcikerpoint.png" alt="" class="svg">
                    </span> </li>
                                        @endif
                                    </ul>
                                </div>
                                <!-- end /.author -->
                            </div>
                            <!-- end /.author-infos -->
                            <div class="freelance-status">
                                <div class="author-badges">
                                    <div class="author-btn"> <button class="btn btn--md btn--round" data-toggle="modal" data-target="#messageModal"
                                                                     @if(auth()->id() == $profile->user_id)
                                                                     aria-disabled="true" disabled="disabled"

                                                @endif
                                        >Message Chef</button> </div>
                                </div>
                            </div>
                        </div>

                        @if(auth()->id() == $profile->user_id)
                            @if ($profile->user->isChef() or $profile->user->isDsp() or $profile->user->isPP())
                                <div class="author-card sidebar-card">
                                    <div class="freelance-status">
                                        <div class="author-badges">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5 text-center">
                                                    <h4 class="float-left scolor">Available:</h4></div>
                                                <div class="col-md-7">
                                                    <form action="{{ route('profile.isAvailable', ['profile' => $profile->id]) }}" method="post">
                                                        @csrf
                                                        <label class="switch float-left mg-right">
                                                            <input type="checkbox" name="is_available" onChange='this.form.submit();' value="1"
                                                                   @if($profile->is_available === 1)
                                                                   checked
                                                                    @endif
                                                            >
                                                            <span class="slider round"></span>
                                                        </label>
                                                        <h4 class="scolor"><b>
                                                                @if($profile->is_available === 1)
                                                                    Yes
                                                                @else
                                                                    No
                                                                @endif
                                                            </b></h4>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div></div>@endif
                        @endif







                    <!-- Modal for sending message -->
                        <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="messageModalLabel">Message {{ $profile->user->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="{{ route('messages.store_with_auth') }}" method="post" id="send_msg">
                                            @csrf
                                            <input type="hidden" name="sender_id" value="{{ auth()->id() }}">
                                            <input type="hidden" name="recipient_id" value="{{ $profile->user->id }}">

                                            <div class="form-group">
                                                <label for="msgText">Type your message Below</label>
                                                <textarea class="form-control" id="msgText" placeholder="I want to buy your dish" name="body"></textarea>
                                            </div>

                                            {{-- <button type="submit" id="submit-form" class="d-none">send</button> --}}

                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        {{-- <label for="submit-form" tabindex="0"  class="btn btn-primary px-3 py-1">Send</label> --}}
                                        <button type="button" class="btn btn-primary px-3 py-1" form="send_msg" id="submit-form">Send</button>

                                        <button type="button" class="btn btn-secondary px-3 py-1" data-dismiss="modal">Cancel</button>
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
                                    $('#submit-form').click(function(e) {
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
                                        }).done( function(data) {
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
                                <li> <a href="{{ route('profile.show', ['profile' => $profile->id]) }} #profile">User Profile</a> </li>
                                <li> <a href="{{ route('profile.chefdishes', [ 'profile' => $profile->id]) }} #chefdish">Chef Dishes</a> </li>
                                <li> <a href="{{ route('profile.chefdelivery', ['profile' => $profile->id]) }}">Delivery Services</a> </li>
                                <li> <a href="{{ route('profile.pickerspoint', ['user' => $profile->user]) }} #chefpp">Pickers Point</a> </li>
                            </ul>
                        </div>
                    </aside>

                    <aside class="sidebar sidebar_author">
                        <div class="sidebar-card message-card">
                            <div class="card-title">
                                <h4>Contact Chef</h4> </div>
                            <div class="message-form">
                                <form action="#">
                                    <div class="form-group">
                                        <textarea name="message" class="text_field" id="author-message" placeholder="Your message..."></textarea>
                                    </div>
                                    <div class="msg_submit">
                                        <button type="submit" class="btn btn--md btn--round"  id="send_msg">send message</button>
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
                            <div class="col-md-12" id="chefdish">
                                <div class="filter-bar clearfix filter-bar2">
                                    <div class="filter__option filter--text pull-left">
                                        <p>
                                            <span> {{ $profile->user->name }}</span> All Dishes</p>
                                    </div>

                                    <div class="pull-right">

                                    </div>
                                    <!-- end /.pull-right -->
                                </div>
                                <!-- end filter-bar -->
                            </div>
                            <!-- end /.col-md-12 -->

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
                                            <li class="product_cat a-color">
                                                    <span class="lnr lnr-map-marker"> <span>{{ $profile->city }}, </span><span>{{ $profile->area }}</span>
                                                    </span></li>
                                        </ul>
                                    </div>
                                    <!-- end /.product-desc -->
                                    <div class="product-purchase">
                                        <div class="price_love"> <span>৳{{ $dish->dish_price }}</span>
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

                                        <div class="sell">
                                            <p>
                                                <span data-toggle="tooltip" data-placement="bottom" title="Total Dish Sale">
                      <i class="fa fa-paper-plane-o" style="color:#f64646" aria-hidden="true"></i>
                      <span>{{ count($dish->completed_orders) }}</span></span>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- end /.product-purchase -->
                                </div>
                                <!-- end /.single-product -->
                            </div> 
                            @endforeach 


                        </div>
                        <!-- end /.row -->
                    <div class="">
                        {{ $dishes->links() }}
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