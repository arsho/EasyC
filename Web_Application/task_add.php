<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>
<?php
$all_lesson_category = $lesson_category_object->get_all_row();
?>
<?php $page_title = 'Add Task'; ?>
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
                        <h2>Enter the following data to add a task</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form name="task_add_form" enctype="multipart/form-data" class="form-horizontal form-label-left" method="post" action="task_add_check.php">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Title<span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="task_title" id="task_title" type="text" class="form-control" placeholder="Enter task title here" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Category<span class="required">*</span>  </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="task_category" id="task_category" class="form-control" required="required">
                                        <?php
                                        $cnt = 0;
                                        foreach ($all_lesson_category as $key => $value) {
                                            if ($cnt == 0){
                                                $selected_val = 'selected';
                                                $cnt=56;
                                            }
                                                
                                            else
                                                $selected_val = '';
                                            echo '<option ' . $selected_val . ' value="' . $all_lesson_category[$key]["lesson_category_title"] . '">' . $all_lesson_category[$key]["lesson_category_title"] . '</option>';
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Details<span class="required">*</span>  </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea id="task_details" required="required" class="form-control" name="task_details"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Input File<span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="task_input_file" id="task_input_file" type="file" class="form-control" placeholder="Upload task input file here" required="required">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Output File<span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="task_output_file" id="task_output_file" type="file" class="form-control" placeholder="Upload task input file here" required="required">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Hints (# Separated)<span class="required">*</span>  </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="task_hints" id="task_hints" type="text" class="form-control" placeholder="Enter task hints here" required="required">
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
                                    <input name="task_point" id="task_point" type="text" class="form-control" placeholder="Enter task point here" required="required">
                                </div>
                            </div>

                            <input name="task_uploader" id="task_uploader" type="hidden" class="form-control"  value="<?php echo $current_user_details["user_username"]; ?>" required="required">


                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">                                    
                                    <button type="reset" class="btn btn-primary">Clear</button>
                                    <button name="task_add_form_submit" type="submit" class="btn btn-success">Add Task</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require './module/footer.php'; ?>
    <!--add_employee ends-->

