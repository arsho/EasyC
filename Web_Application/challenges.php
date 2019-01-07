<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>
<?php $page_title = 'Challenges'; ?>
<?php
$category_option = $lesson_category_object->get_all_row();
$current_username = $current_user_details["user_username"];
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_title">
                        <a class="collapse-link" data-toggle="tooltip" data-placement="top" title="Click to toggle the challenges">
                            <h2><?php echo $page_title; ?></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="pull-right"><i class="fa fa-chevron-up"></i>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                    <div class="x_content">

                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <!-- required for floating -->
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tabs-left tabs-left-sho">
                                <?php
                                $cnt_li = 0;
                                foreach ($category_option as $key => $val) {
                                    $single_option = $category_option[$key]["lesson_category_title"];
                                    $single_option_first_word = explode(" ", $category_option[$key]["lesson_category_title"])[0];
                                    $single_option_first_word_hash = "#" . $single_option_first_word;
                                    if ($cnt_li == 0)
                                        $li_active = "class='active'";
                                    else
                                        $li_active = "";
                                    ?>
                                    <li <?php echo $li_active; ?>>
                                        <a href="<?php echo $single_option_first_word_hash; ?>" data-toggle="tab">
                                            <?php echo $single_option; ?>                                            
                                        </a>
                                    </li>
                                    <?php
                                    $cnt_li++;
                                }
                                ?>

                            </ul>
                        </div> <!-- ./col-xs3 -->

                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <!-- Tab panes -->
                            <div class="tab-content tab-content-sho">

                                <?php
                                $cnt_div = 0;
                                foreach ($category_option as $key => $val) {
                                    $single_option = $category_option[$key]["lesson_category_title"];
                                    $single_option_first_word = explode(" ", $category_option[$key]["lesson_category_title"])[0];
                                    $single_option_first_word_hash = "#" . $single_option_first_word;

                                    if ($cnt_div == 0)
                                        $div_active = "active";
                                    else
                                        $div_active = "";
                                    ?>
                                    <div class="tab-pane tab-pane-sho <?php echo $div_active; ?>" id="<?php echo $single_option_first_word; ?>">
                                        <?php
                                        $all_task = $task_object->get_row_using_single_attribute($single_option);
                                        $all_task_len = count($all_task);
                                        if ($all_task_len > 0) {
                                            foreach ($all_task as $key => $value) {
                                                $task_id = $all_task[$key]["task_id"];
                                                $task_title = $all_task[$key]["task_title"];
                                                $task_details = $all_task[$key]["task_details"];

                                                $task_category = $all_task[$key]["task_category"];
                                                $task_uploader = $all_task[$key]["task_uploader"];
                                                $task_media = $all_task[$key]["task_media"];

                                                $check_task_ac_ar = $user_task_object->get_number_of_accepted_solution_of_a_task_of_user($current_username, $task_id);
                                                $check_task_ac_ar_len = count($check_task_ac_ar);
                                                $css_class = 'btn-dark';
                                                $icon_str = '<span class="pull-right"><small>Unsolved <i class="fa fa-bug"></i></small></span>';
                                                if ($check_task_ac_ar_len > 0) {
                                                    $css_class = 'btn-success';
                                                    $icon_str = '<span class="pull-right"><small>Accepted <i class="fa fa-check-circle"></i></small></span>';
                                                }
                                                
                                                ?>
                                                <a data-toggle="tooltip" data-placement="top" title="Click to view <?php echo $task_title; ?>" href="compiler_task.php?id=<?php echo $task_id; ?>" class="btn <?php echo $css_class; ?> btn-lg btn-block">
                                                    <?php echo $task_title; ?>
                                                    <?php echo $icon_str; ?>

                                                </a>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            No task is added in this category
                                            <?php
                                        }
                                        ?>

                                    </div>

                                    <?php
                                    $cnt_div++;
                                }
                                ?>                                

                            </div> <!-- ./tab-content -->                            
                        </div> <!-- ./col-xs9 -->

                        <div class="clearfix"></div>



                    </div> <!-- ./x-content -->
                </div> <!-- ./x-panel -->
            </div> <!-- ./col-md12 --> 
        </div> <!-- ./row -->
    </div> <!-- ./div -->
    <script>
        $(document).ready(function () {
// Javascript to enable link to tab
            var hash = document.location.hash;
            var prefix = "tab_";
            if (hash) {
                $('.nav-tabs a[href=' + hash.replace(prefix, "") + ']').tab('show');
            }

// Change hash for page-reload
            $('.nav-tabs a').on('shown.bs.tab', function (e) {
                window.location.hash = e.target.hash.replace("#", "#" + prefix);
            });
        })
    </script>    

    <?php require './module/footer.php'; ?>
    <!-- page content ends-->

