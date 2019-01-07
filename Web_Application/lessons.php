<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>
<?php $page_title = 'Lessons'; ?>
<?php $category_option = $lesson_category_object->get_all_row(); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_title">
                        <a class="collapse-link"  data-toggle="tooltip" data-placement="top" title="Click to toggle the lessons">    
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
                                        $all_lesson = $lesson_object->get_row_using_single_attribute($single_option);
                                        $all_lesson_len = count($all_lesson);
                                        if ($all_lesson_len > 0) {
                                            foreach ($all_lesson as $key => $value) {
                                                $lesson_id = $all_lesson[$key]["lesson_id"];
                                                $lesson_title = $all_lesson[$key]["lesson_title"];
                                                $lesson_details = $all_lesson[$key]["lesson_details"];
                                                $lesson_tags = $all_lesson[$key]["lesson_tags"];
                                                $lesson_category = $all_lesson[$key]["lesson_category"];
                                                $lesson_uploader = $all_lesson[$key]["lesson_uploader"];
                                                $lesson_media = $all_lesson[$key]["lesson_media"];
                                                ?>
                                                <a data-toggle="tooltip" data-placement="top" title="Click to view <?php echo $lesson_title; ?>" href="lesson.php?id=<?php echo $lesson_id; ?>" class="btn btn-info btn-lg btn-block">
                                                    <?php echo $lesson_title; ?>
                                                </a>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            No lesson is added in this lesson
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

