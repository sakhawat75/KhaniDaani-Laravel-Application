<div class="dashboard_menu_area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="dashboard_menu">
                    <li class="{{ request()->is(route('profile.show', ['profile' => auth()->id()])) ? 'active' : '' }}">
                        <a href="{{ route('profile.show', ['profile' => auth()->id()]) }}">
                                    <span class="lnr lnr-home"></span>Profile</a>
                    </li>
                    <li class="{{ request()->is(route('profile.edit', ['profile' => auth()->id()])) ? 'active' : '' }}">
                        <a href="{{ route('profile.edit', ['profile' => auth()->id()]) }}">
                                    <span class="lnr lnr-cog"></span>Profile Setting</a>
                    </li>
                    <li>
                        <a href="{{ route('dishes.editdish') }}">
                                    <span class="lnr lnr-cart"></span>Purchase</a>
                    </li>
                    <li>
                        <a href="{{ route('dishes.create') }}">
                                    <span class="lnr lnr-upload"></span>Upload Dish</a>
                    </li>
                    <li class="{{ request()->is('profile_setting') ? 'active' : '' }}">
                        <a href="{{ route('dishes.manage') }}">
                                    <span class="lnr lnr-briefcase"></span>Manage Dish</a>
                    </li>
                    <li>
                        <a href="dashboard-withdrawal.html">
                                    <span class="lnr lnr-briefcase"></span>Withdrawals</a>
                    </li>
                    <li>
                        <a href="{{ route('delivery.AddService') }}">
                            <span class="lnr lnr-upload"></span>Add Service</a>
                    </li>
                </ul>
                <!-- end /.dashboard_menu -->
            </div>
            <!-- end /.col-md-12 -->
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</div>