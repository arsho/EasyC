<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>
<?php
if (isset($_GET["id"])) {
    $get_lesson_id = $_GET["id"];
    $single_lesson_details_ar = $lesson_object->get_row_using_id($get_lesson_id);
    $count_value = count($single_lesson_details_ar);
    $data_found = 1;
    /* Checking if anything found */
    if ($count_value == 0) {
        $data_found = 0;
    } else {
        $single_lesson_details = $single_lesson_details_ar[0];
        $lesson_id = $single_lesson_details["lesson_id"];
        $lesson_title = $single_lesson_details["lesson_title"];
        $lesson_details = html_entity_decode($single_lesson_details["lesson_details"]);
//        $lesson_details = ($single_lesson_details["lesson_details"]);
        $lesson_media = $single_lesson_details["lesson_media"];
        $lesson_tags = $single_lesson_details["lesson_tags"];
        $lesson_category = $single_lesson_details["lesson_category"];
        $lesson_uploader = $single_lesson_details["lesson_uploader"];
        $lesson_uploader_link = '<a data-toggle="tooltip" data-placement="top" title="View profile of '.$lesson_uploader.'." class="label label-info" target="_blank" href="profile.php?user=' . $lesson_uploader . '">' . $lesson_uploader . '</a>';
        $lesson_category_link = '<a class="label label-success" target="_blank" href="lesson_category.php?id=' . $lesson_category . '">' . $lesson_category . '</a>';
        $lesson_category_only_link = '<a  data-toggle="tooltip" data-placement="top" title="View all lessons in '.$lesson_category.' category" target="_blank" href="lessons.php#tab_' . $lesson_category . '">' . $lesson_category . '</a>';
        $task_category_only_link = '<a data-toggle="tooltip" data-placement="top" title="View all challenges in '.$lesson_category.' category" class="btn btn-sm btn-dark" target="_blank" href="challenges.php#tab_' . $lesson_category . '">' . $lesson_category . '</a>';

        $header_file_ar = array("<aio.h>", "<libgen.h>", "<spawn.h>", "<sys/time.h>",
            "<arpa/inet.h>", "<limits.h>", "<stdarg.h>", "<sys/times.h>",
            "<assert.h>", "<locale.h>", "<stdbool.h>", "<sys/types.h>",
            "<complex.h>", "<math.h>", "<stddef.h>", "<sys/uio.h>",
            "<cpio.h>", "<monetary.h>", "<stdint.h>", "<sys/un.h>",
            "<ctype.h>", "<mqueue.h>", "<stdio.h>", "<sys/utsname.h>",
            "<dirent.h>", "<ndbm.h>", "<stdlib.h>", "<sys/wait.h>",
            "<dlfcn.h>", "<net/if.h>", "<string.h>", "<syslog.h>",
            "<errno.h>", "<netdb.h>", "<strings.h>", "<tar.h>",
            "<fcntl.h>", "<netinet/in.h>", "<stropts.h>", "<termios.h>",
            "<fenv.h>", "<netinet/tcp.h>", "<sys/ipc.h>", "<tgmath.h>",
            "<float.h>", "<nl_types.h>", "<sys/mman.h>", "<time.h>",
            "<fmtmsg.h>", "<poll.h>", "<sys/msg.h>", "<trace.h>",
            "<fnmatch.h>", "<pthread.h>", "<sys/resource.h>", "<ulimit.h>",
            "<ftw.h>", "<pwd.h>", "<sys/select.h>", "<unistd.h>",
            "<glob.h>", "<regex.h>", "<sys/sem.h>", "<utime.h>",
            "<grp.h>", "<sched.h>", "<sys/shm.h>", "<utmpx.h>",
            "<iconv.h>", "<search.h>", "<sys/socket.h>", "<wchar.h>",
            "<inttypes.h>", "<semaphore.h>", "<sys/stat.h>", "<wctype.h>",
            "<iso646.h>", "<setjmp.h>", "<sys/statvfs.h>", "<wordexp.h>",
            "<langinfo.h>", "<signal.h>");
        $header_file_html = array();
        foreach ($header_file_ar as $value) {
            $header_file_html[] = htmlspecialchars($value);
        }
        $edit_val = $lesson_details;
        for ($i = 0; $i < count($header_file_ar); $i++) {
            $find_str = $header_file_ar[$i];
            $replace_str = $header_file_html[$i];

            $edit_val = str_replace($find_str, $replace_str, $edit_val);
        }
    }
}
// If the get parameter is not set
else {
    header('Location: employee_view.php');
}
?>
<?php
// data is found
if ($data_found == 1) {
    ?>

    <?php $page_title = $lesson_title; ?>

    <!-- right_col starts -->
    <div class="right_col" role="main">
        <ol class = "breadcrumb">
            <li><a href = "index.php" data-toggle="tooltip" data-placement="top" title="Go to Home">Home</a></li>
            <li><a href = "lessons.php"  data-toggle="tooltip" data-placement="top" title="View all lessons">Lessons</a></li>
            <li><?php echo $lesson_category_only_link; ?></li>
            <li class = "active"><?php echo $page_title; ?></li>
        </ol>
        <div class="clearfix"></div>
        <!--Task Details row starts-->

        <!-- row starts -->
        <div class="row">
            <!-- col-md-12 starts -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <a class="collapse-link" data-toggle="tooltip" data-placement="top" title="Click to toggle the lesson">
                        <div class="x_title">
                            <h2><i class="fa fa-tasks"></i>
                                <?php echo $page_title; ?>


                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="pull-right"><i class="fa fa-chevron-up"></i>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div> 
                    </a>
                    <!--Panel body starts-->
                    <div class="x_content">
			<?php if($lesson_media!=''){?>
                        <img class="img-thumbnail img-responsive img-rounded"  style="display: block; text-align: center; margin: 5px auto;" src="<?php echo $lesson_media; ?>" />                
                        <?php }?>
                        <?php echo $edit_val; ?>
                    </div>
                    <!--Panel body ends-->
                    <div class="panel-footer">
                        Tags
                        <?php
                        $tags_ar = split("#", $lesson_tags);
                        foreach ($tags_ar as $value) {
                            ?>
                            <span class="label label-default label-tags">
                                <i class="fa fa-tags"></i> 
                                <?php echo $value; ?> 
                            </span>                   &nbsp;     
                            <?php
                        }
                        ?>                            
                        <small class="pull-right"> (Lesson by <?php echo $lesson_uploader_link; ?> )</small>
                    </div>
                </div>
                <div class="alert alert-success sho-alert-small">
                    <center><strong> Finished the lesson? Solve problems in <?php echo $task_category_only_link; ?> category. </strong></center> 
                </div>

            </div>
            <!-- col-md-12 ends -->

        </div>
        <!-- row ends -->
        <div class="clearfix"></div>
        <?php
    }
// if no data is found
    else {
        include './error_data.php';
    }
    ?>


    <?php require './module/footer.php'; ?>


