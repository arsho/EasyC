<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>
<!--Putting previous value into the new edit form-->
<?php
if (isset($_GET["task_id"])) {
    $task_id = $_GET["task_id"];
    $all_task = $task_object->get_row_using_id($task_id);
    foreach ($all_task as $key => $value) {
        $task_id = $all_task[$key]["task_id"];
        $task_title = $all_task[$key]["task_title"];
        $task_category = $all_task[$key]["task_category"];
        $task_details = $all_task[$key]["task_details"];
        //$task_details_short = shorten($task_details);
        $task_point = $all_task[$key]["task_point"];
        $task_hints = $all_task[$key]["task_hints"];
        $task_uploader = $all_task[$key]["task_uploader"];
        $task_input_file = $all_task[$key]["task_input_file"];
        $task_output_file = $all_task[$key]["task_output_file"];
        $task_media = $all_task[$key]["task_media"];
        $task_category_option = array('Introduction', 'Data Types', 'Variables', 'Operators', 'Conditions', 'Loops', 'Functions', 'Arrays', 'String', 'Scope', 'Mathematics', 'Input Output', 'File I/O', 'Structures', 'Pointers', 'Header File', 'Pre Processors');
    }
} else {
    header('Location: task_view.php');
}
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Task</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit the details of <?php echo $task_title; ?>(<?php echo $task_id; ?>)</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form enctype="multipart/form-data" name="task_edit_form" class="form-horizontal form-label-left" method="post" action="task_edit_check.php">

                            <input value="<?php echo $task_id; ?>" name="task_id" id="task_id" type="hidden" class="form-control" required="required">                            

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Title<span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input value="<?php echo $task_title; ?>" name="task_title" id="task_title" type="text" class="form-control" placeholder="Enter task title here" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Category<span class="required">*</span>  </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="task_category" id="task_category" class="form-control" required="required">
                                        <?php
                                        foreach ($task_category_option as $single_option) {
                                            if ($task_category == $single_option) {
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Details<span class="required">*</span>  </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea id="task_details" required="required" class="form-control" name="task_details"><?php echo $task_details; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Hints (# Separated)<span class="required">*</span>  </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input value="<?php echo $task_hints; ?>" name="task_hints" id="task_hints" type="text" class="form-control" placeholder="Enter task hints here" required="required">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Old Input File<span class="required">(To change upload new input file)</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="task_input_file_old_disabled" id="task_input_file_old_disabled" type="text" disabled="" class="form-control" value="<?php echo $task_input_file; ?>">
                                    <input name="task_input_file_old" id="task_input_file_old" type="hidden" class="form-control" value="<?php echo $task_input_file; ?>">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Input File<span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="task_input_file" id="task_input_file" type="file" class="form-control" placeholder="Upload task input file here">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Old Output File<span class="required">(To change upload new output file)</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="task_output_file_old_disabled" id="task_output_file_old_disabled" type="text" disabled="" class="form-control" value="<?php echo $task_output_file; ?>">
                                    <input name="task_output_file_old" id="task_output_file_old" type="hidden" class="form-control" value="<?php echo $task_output_file; ?>">

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Output File<span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="task_output_file" id="task_output_file" type="file" class="form-control" placeholder="Upload task input file here">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Old Media File<span class="required">(To change upload new media file)</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <img src="<?php echo $task_media; ?>" class="img-thumbnail"/> 
                                    <input name="task_media_old" id="task_media_old" type="hidden" value="<?php echo $task_media; ?>">

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Media File </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="task_media" id="task_media" type="file" class="form-control" placeholder="Upload task media file here">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Point<span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input value="<?php echo $task_point; ?>" name="task_point" id="task_point" type="text" class="form-control" placeholder="Enter task point here" required="required">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Uploader </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input value="<?php echo $task_uploader; ?>" name="task_uploader" id="task_uploader" type="text" class="form-control" placeholder="Enter task uploader here" required="required">
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <a href="task_view.php" class="btn btn-primary">Cancel</a>
                                    <button name="task_edit_form_submit" type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require './module/footer.php'; ?>
    <!--edit task ends-->

