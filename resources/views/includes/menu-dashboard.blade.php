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
                                    <span class="lnr lnr-cog"></span>Setting</a>
                    </li>
                    <li>
                        <a href="{{ route('order.purchase') }}">
                                    <span class="lnr lnr-cart"></span>All Orders</a>
                    </li>
                    <li>
                        <a href="{{ route('dishes.create') }}">
                            <span class="lnr lnr-file-add"></span>Add Dish</a>
                    </li>
                    <li class="{{ request()->is('profile_setting') ? 'active' : '' }}">
                        <a href="{{ route('dishes.manage') }}">
                                    <span class="lnr lnr-briefcase"></span>Manage Dish</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.cashout') }}">
                                    <span class="lnr lnr-briefcase"></span>Payment</a>
                    </li>

                    <li>
                        <a href="{{ route('delivery.AddService') }}">
                            <span class="lnr lnr-file-add"></span>Add Delivery</a>
                    </li>

                    <li>
                        <a href="{{ route('pickerspoint.addpp') }}">
                            <span class="lnr lnr-file-add"> </span> Host Pickers Point</a>
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