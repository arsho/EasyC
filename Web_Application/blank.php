<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>
<?php $page_title = 'Page Title'; ?>
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
                    <a class="collapse-link">
                        <div class="x_title">
                            <h2>Secondary Title</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="pull-right"><i class="fa fa-chevron-up"></i>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <div class="x_content">

                    </div> <!-- ./x-content -->
                </div> <!-- ./x-panel -->
            </div> <!-- ./col-md12 --> 
        </div> <!-- ./row -->
    </div> <!-- ./div -->
    <?php require './module/footer.php'; ?>
    <!-- page content ends-->

