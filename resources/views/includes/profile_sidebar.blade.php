<div class="col-lg-4 col-md-12">
    <aside class="sidebar sidebar_author" >
        @include( 'includes.author_info' )
        <div class="sidebar-card author-menu">
            <ul>
                <li> <a href="{{ route('profile.show', ['profile' => $profile->id]) }} #profile">User Profile</a> </li>
                <li> <a href="{{ route('profile.chefdishes', [ 'profile' => $profile->id]) }} #chefdish">Chef Dish</a> </li>
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