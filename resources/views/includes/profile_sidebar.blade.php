<div class="col-lg-4 col-md-12">
    <aside class="sidebar sidebar_author" >
        @include( 'includes.author_info' )

        @if(auth()->id() == $profile->user_id)
            @if ($profile->user->isChef() or $profile->user->isDsp() or $profile->user->isPP())
        <div class="sidebar-card author-menu">
            <div class="row">
                <div class="col-sm-12 col-md-5 text-center">
                            <h4 class="float-left scolor">Available:</h4></div>
                <div class="col-md-7">
                    <form action="{{ route('profile.isAvailable', ['profile' => $profile->id]) }}" method="post">
                        @csrf
                        <label class="switch float-left mg-right"> {{--New css, last part, no js(w3school)--}}
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
                @endif

            </div>
        </div>@endif


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