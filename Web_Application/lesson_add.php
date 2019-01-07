<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>
<?php $page_title = 'Add Lesson'; ?>
<?php
$all_lesson_category = $lesson_category_object->get_all_row();
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?php echo $page_title; ?></h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Enter the following data to add a lesson</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form name="lesson_add_form" enctype="multipart/form-data" class="form-horizontal form-label-left" method="post" action="lesson_add_check.php">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Title<span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="lesson_title" id="lesson_title" type="text" class="form-control" placeholder="Enter lesson title here" required="required">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Details<span class="required">*</span>  </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea id="lesson_details" required="required" class="form-control" name="lesson_details"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tags (# Separated)<span class="required">*</span>  </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="lesson_tags" id="lesson_tags" type="text" class="form-control" placeholder="Enter lesson tags here" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Category<span class="required">*</span>  </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="lesson_category" id="lesson_category" class="form-control" required="required">

                                        <?php
                                        $cnt = 0;
                                        foreach ($all_lesson_category as $key => $value) {
                                            if ($cnt == 0) {
                                                $selected_val = 'selected';
                                                $cnt = 56;
                                            } else
                                                $selected_val = '';
                                            echo '<option ' . $selected_val . ' value="' . $all_lesson_category[$key]["lesson_category_title"] . '">' . $all_lesson_category[$key]["lesson_category_title"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Media File </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="lesson_media" id="lesson_media" type="file" class="form-control" placeholder="Upload lesson media file here">
                                </div>
                            </div>

                            <input name="lesson_uploader" id="lesson_uploader" type="hidden" class="form-control" value="<?php echo $current_user_details["user_username"]; ?>" required="required">


                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">                                    
                                    <button type="reset" class="btn btn-primary">Clear</button>
                                    <button name="lesson_add_form_submit" type="submit" class="btn btn-success">Add Lesson</button>
                                </div>
                            </div>

                        </form>
                    </div> <!-- ./x-content -->
                </div> <!-- ./x-panel -->
            </div> <!-- ./col-md12 --> 
        </div> <!-- ./row -->
    </div> <!-- ./div -->
    <?php require './module/footer.php'; ?>
    <!-- page content ends-->

