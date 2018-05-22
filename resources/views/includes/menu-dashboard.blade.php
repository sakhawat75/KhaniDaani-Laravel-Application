<div class="dashboard_menu_area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="dashboard_menu">
                    <li class="{{ request()->is('profile') ? 'active' : '' }}">
                        <a href="profile">
                                    <span class="lnr lnr-home"></span>Profile</a>
                    </li>
                    <li class="{{ request()->is('profile_setting') ? 'active' : '' }}">
                        <a href="profile_setting">
                                    <span class="lnr lnr-cog"></span>Profile Setting</a>
                    </li>
                    <li>
                        <a href="dashboard-purchase.html">
                                    <span class="lnr lnr-cart"></span>Purchase</a>
                    </li>
                    <li>
                        <a href="create_dish">
                                    <span class="lnr lnr-upload"></span>Upload Items</a>
                    </li>
                    <li>
                        <a href="dashboard-manage-item.html">
                                    <span class="lnr lnr-briefcase"></span>Manage Items</a>
                    </li>
                    <li>
                        <a href="dashboard-withdrawal.html">
                                    <span class="lnr lnr-briefcase"></span>Withdrawals</a>
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