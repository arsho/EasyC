<!-- top navigation -->
<div class="top_nav">

    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo $current_user_details["user_photo"]; ?>" alt="<?php echo $current_user_details["user_username"]; ?>">
                        <?php echo $current_user_details["user_username"]; ?>&nbsp;
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                        <li><a href="profile.php?user=<?php echo $current_user_details["user_username"]; ?>">
                                View Profile</a>
                        </li>
                        <li><a href="module/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
    </div>

</div>
<!--top navigation ends -->