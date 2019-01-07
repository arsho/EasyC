<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>
<!--Putting previous value into the new edit form-->
<?php
if (isset($_GET["lesson_id"])) {
    $lesson_id = $_GET["lesson_id"];
    $all_lesson = $lesson_object->get_row_using_id($lesson_id);
    foreach ($all_lesson as $key => $value) {
        $lesson_id = $all_lesson[$key]["lesson_id"];
        $lesson_title = $all_lesson[$key]["lesson_title"];
        $lesson_details = $all_lesson[$key]["lesson_details"];
        //$lesson_details_short = shorten($lesson_details);
        $lesson_tags = $all_lesson[$key]["lesson_tags"];
        $lesson_category = $all_lesson[$key]["lesson_category"];
        $lesson_uploader = $all_lesson[$key]["lesson_uploader"];
        $lesson_media = $all_lesson[$key]["lesson_media"];
        $lesson_category_option = array('Introduction', 'Data Types', 'Variables', 'Operators', 'Conditions', 'Loops', 'Functions', 'Arrays', 'String', 'Scope', 'Mathematics', 'Input Output', 'File I/O', 'Structures', 'Pointers', 'Header File', 'Pre Processors');
    }
} else {
    header('Location: lesson_view.php');
}
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Lesson</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit the details of <?php echo $lesson_title; ?>(<?php echo $lesson_id; ?>)</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form enctype="multipart/form-data" name="lesson_edit_form" class="form-horizontal form-label-left" method="post" action="lesson_edit_check.php">

                            <input value="<?php echo $lesson_id; ?>" name="lesson_id" id="lesson_id" type="hidden" class="form-control" required="required">                            

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Title<span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input value="<?php echo $lesson_title; ?>" name="lesson_title" id="lesson_title" type="text" class="form-control" placeholder="Enter lesson title here" required="required">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Details<span class="required">*</span>  </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea id="lesson_details" required="required" class="form-control" name="lesson_details"><?php echo $lesson_details; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tags (# Separated)<span class="required">*</span>  </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input value="<?php echo $lesson_tags; ?>" name="lesson_tags" id="lesson_tags" type="text" class="form-control" placeholder="Enter lesson tags here" required="required">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Category<span class="required">*</span>  </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="lesson_category" id="lesson_category" class="form-control" required="required">
                                        <?php
                                        foreach ($lesson_category_option as $single_option) {
                                            if ($lesson_category == $single_option) {
                                                echo '<option selected="selected" value="' . $single_option . '">' . $single_option . '</option>';
                                            } else {
                                                echo '<option value="' . $single_option . '">' . $single_option . '</option>';
                                            }
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Old Media File<span class="required">(To change upload new media file)</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <img src="<?php echo $lesson_media; ?>" class="img-thumbnail"/> 
                                    <input name="lesson_media_old" id="lesson_media_old" type="hidden" value="<?php echo $lesson_media; ?>">

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Media File </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="lesson_media" id="lesson_media" type="file" class="form-control" placeholder="Upload task media file here">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Uploader </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input value="<?php echo $lesson_uploader; ?>" name="lesson_uploader" id="lesson_uploader" type="text" class="form-control" placeholder="Enter task uploader here" required="required">
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <a href="lesson_view.php" class="btn btn-primary">Cancel</a>
                                    <button name="lesson_edit_form_submit" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- ./x-content -->
                </div>
                <!-- ./x-panel -->
            </div>
            <!-- ./col-md -->
        </div>
        <!-- ./row -->
    </div>
    <!--"" ends-->
<?php require './module/footer.php'; ?>
    <!--edit task ends-->

