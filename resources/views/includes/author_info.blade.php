<div class="author-card sidebar-card">
    <div class="author-infos">
        <div class="author_avatar"> <img src="{{ route('home') }}/storage/images/profile_image/{{ $profile->profile_image }}" alt="Presenting the broken author avatar :D"> </div>
        <div class="author">
            <h4>
                {{--{{ $user->name }}--}} {{-- TODO problem with single dish page.--}}
            </h4>
            <p>Joined {{ $profile->created_at->toFormattedDateString() }}</p>
        </div>
        <div class="author-badges">
            <ul class="list-unstyled">
                <li> <span data-toggle="tooltip" data-placement="bottom" title="Have up to 10 dish for sale">
                        <img src="{{ URL::to('/') }}/images/svg/have_dish.png" alt="" class="svg">
                    </span> </li>
                <li> <span data-toggle="tooltip" data-placement="bottom" title="Have delivery option">
                        <img src="{{ URL::to('/') }}/images/svg/delivery.png" alt="" class="svg">
                    </span> </li>
                <li> <span data-toggle="tooltip" data-placement="bottom" title="Hosting his place for dish collection">
                        <img src="{{ URL::to('/') }}/images/svg/pcikerpoint.png" alt="" class="svg">
                    </span> </li>
            </ul>
        </div>
        <!-- end /.author -->
    </div>
    <!-- end /.author-infos -->
    <div class="freelance-status">
        <div class="author-badges">
            <div class="author-btn"> <a href="#" class="btn btn--md btn--round">Send Massage</a> </div>
        </div>
    </div>
</div>