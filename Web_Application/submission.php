<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>
<?php $page_title = 'My Submissions'; ?>
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
                        <h2>Search submission using Task ID or Title</h2>
                        <div class="clearfix"></div>
                        <div id="" class=""> 
                            <form name="submission_search_form" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Task ID or Title: </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input name="submission_id" id="submission_id" type="text" class="form-control" placeholder="Search using Task ID or title.">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button id="submission_search_form_submit" name="submission_search_form_submit" type="button" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
                                    </div>
                                </div>                                
                            </form>
                        </div>
                    </div>

                    <div class="x_content">


                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Verdict</th>
                                    <th>Date</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody id="submission_tbody">

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        $(document).ready(function () {

            // Load all employee info in page load
            function init_load() {
                $.ajax({
                    url: 'submission_get_view.php',
                    type: 'POST',
                    success: function (returndata) {
                        $("#submission_tbody").html(returndata);
                    }
                });
            }

            init_load();

            $("#submission_id").on("keyup", function () {
                $submission_id_name = $("#submission_id").val();
                formData = {submission_id_name: $submission_id_name, }; //Array 
                $.ajax({
                    data: formData,
                    url: 'submission_get_view.php',
                    type: 'POST',
                    success: function (returndata) {
                        $("#submission_tbody").html(returndata);
                    }
                });
            })

            $("#submission_search_form_submit").on("click", function () {
                $submission_id_name = $("#submission_id").val();
                formData = {submission_id_name: $submission_id_name, }; //Array 
                $.ajax({
                    data: formData,
                    url: 'submission_get_view.php',
                    type: 'POST',
                    success: function (returndata) {
                        $("#submission_tbody").html(returndata);
                    }
                });
            })

        });
    </script>
    <?php require './module/footer.php'; ?>
    <!--submission_view ends-->

