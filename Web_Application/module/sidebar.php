<!--sidebar starts-->
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><i class="glyphicon glyphicon-blackboard"></i> <span><?php echo $site_title; ?></span></a>
        </div>
        <div class="clearfix"></div>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li><a><i class="fa fa-book"></i> Learn Programming <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="lessons.php"> All lessons</a>
                            </li>
                            <?php
                            $all_lesson = $lesson_object->get_all_row();
                            foreach ($all_lesson as $key => $value) {
                                echo '<li><a href="lesson.php?id=' . $all_lesson[$key]["lesson_id"] . '">' . $all_lesson[$key]["lesson_title"] . '</a></li>';
                            }
                            ?>

                        </ul>
                    </li>
                    <li><a><i class="fa fa-desktop"></i> Challenges <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="challenges.php"> All challenges</a>
                            </li>
                            <?php
                            $all_task = $task_object->get_all_row();
                            foreach ($all_task as $key => $value) {
                                echo '<li><a href="compiler_task.php?id=' . $all_task[$key]["task_id"] . '">' . $all_task[$key]["task_title"] . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
<!--                    <li><a href="live_practice.php"><i class="fa fa-code"></i> Old Compiler</a>
                    </li>-->
                    <li><a href="compiler.php"><i class="fa fa-code"></i> Online Compiler</a>
                    </li>

                    <li><a href="submission.php"><i class="fa fa-send-o"></i> My Submissions</a>
                    </li>

                    <li><a href="ranklist.php"><i class="fa fa-trophy"></i> Ranklist</a>
                    </li>

                    <li>
                        <a href="chat.php">
                            <i class="fa fa-comments"></i> Chat <span class="label label-success pull-right">Online Now</span>
                        </a>
                    </li>

                    <li>
                        <a href="profile.php?user=<?php echo $current_user_details["user_username"]; ?>">
                            <i class="fa fa-user"></i> My Profile
                        </a>
                    </li>
                    <li><a href="developers.php"><i class="fa fa-users"></i> <?php echo $site_title;?> Team</a>
                    </li>
                    <?php
                    if ($current_user_details["user_role"] == 'Admin' || $current_user_details["user_role"] == 'Super Admin') {
                        ?>
                        <li><a><i class="fa fa-book"></i> Lesson Management <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: none">
                                <li><a href="lesson_add.php">Add Lesson</a>
                                </li>                            
                                <li><a href="lesson_view.php">View Lesson</a>
                                </li>
                            </ul>
                        </li>

                        <li><a><i class="fa fa-briefcase"></i> Task Management <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: none">
                                <li><a href="task_add.php">Add Task</a>
                                </li>                            
                                <li><a href="task_view.php">View Task</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                    }
                    ?>
                    <?php
                    if ($current_user_details["user_role"] == 'Super Admin') {
                        ?>                    
                        <li>
                            <a href="admin_assign.php">
                                <i class="fa fa-cogs"></i> Assign Admin
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a  href="lessons.php" data-toggle="tooltip" data-placement="top" title="View Lessons">
                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
            </a>
            <a  href="ranklist.php" data-toggle="tooltip" data-placement="top" title="View Ranklist">
                <span class="glyphicon glyphicon-king" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen" onclick="toggleFullScreen()">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a  href="module/logout.php" data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo $logout_page; ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
<!--sidebar ends-->
