<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>

<?php
$get_task_id = $_GET["id"];
$single_task_details_ar = $task_object->get_row_using_id($get_task_id);
$single_task_details = $single_task_details_ar[0];
$task_id = $single_task_details["task_id"];
$task_title = $single_task_details["task_title"];
$task_category = $single_task_details["task_category"];
$task_details = html_entity_decode($single_task_details["task_details"]);
$task_media = $single_task_details["task_media"];
$task_input_file = $single_task_details["task_input_file"];
$task_output_file = $single_task_details["task_output_file"];
$task_point = $single_task_details["task_point"];
$task_uploader = $single_task_details["task_uploader"];
$task_hints = $single_task_details["task_hints"];
$task_uploader_link = '<a data-toggle="tooltip" data-placement="top" title="View profile of '.$task_uploader.'." class="label label-info" target="_blank" href="profile.php?user=' . $task_uploader . '">' . $task_uploader . '</a>';
$task_category_link = '<a class="label label-success" target="_blank" href="task_category.php?id=' . $task_category . '">' . $task_category . '</a>';
$task_category_only_link = '<a data-toggle="tooltip" data-placement="top" title="View all challenges in ' . $task_category . ' category" target="_blank" href="challenges.php#tab_' . $task_category . '">' . $task_category . '</a>';
$lesson_category_only_link = '<a  data-toggle="tooltip" data-placement="top" title="View all lessons in ' . $task_category . ' category" target="_blank" href="lessons.php#tab_' . $task_category . '">' . $task_category . '</a>';


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
$edit_val = $task_details;
for ($i = 0; $i < count($header_file_ar); $i++) {
    $find_str = $header_file_ar[$i];
    $replace_str = $header_file_html[$i];

    $edit_val = str_replace($find_str, $replace_str, $edit_val);
}


$task_username = $current_user_details["user_username"];

$check_task_ac_ar = $user_task_object->get_number_of_accepted_solution_of_a_task_of_user($task_username, $task_id);
$check_task_ac_ar_len = count($check_task_ac_ar);
$css_class = 'btn-dark';
$icon_str = '<span class="pull-right">Unsolved <i class="fa fa-bug"></i></span>';
if ($check_task_ac_ar_len > 0) {
    $css_class = 'btn-success';
    $icon_str = '<span class="pull-right">Accepted <i class="fa fa-check-circle"></i></span>';
}
?>


<?php $page_title = $task_title; ?>

<!-- right_col starts -->
<div class="right_col" role="main">
    <ol class = "breadcrumb">
        <li><a data-toggle="tooltip" data-placement="top" title="Go to Home" href = "index.php">Home</a></li>
        <li><a data-toggle="tooltip" data-placement="top" title="View all challenges" href = "challenges.php">Challenges</a></li>        
        <li><?php echo $task_category_only_link; ?></li>
        <li class = "active"><?php echo $page_title; ?></li>
    </ol>
    <div class="page-title">
        <div class="title_left">
            <h3><?php echo $page_title; ?>
                <span class="btn-sm btn <?php echo $css_class; ?>">
                    <?php echo $icon_str; ?>                    
                </span>
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <!--Task Details row starts-->

    <!-- row starts -->
    <div class="row">
        <!-- col-md-7 starts -->
        <div class="col-md-7 col-sm-12 col-xs-12">
            <div class="x_panel">
                <a class="collapse-link">
                    <div class="x_title">
                        <h2><i class="fa fa-tasks"></i> Problem Statement</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="pull-right"><i class="fa fa-chevron-up"></i>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div> 
                </a>
                <!--Panel body starts-->
                <div class="x_content">
		    <?php if($task_media!=''){?>
                    <img class="img-thumbnail img-responsive img-rounded"  style="display: block; text-align: center; margin: 5px auto;" src="<?php echo $task_media; ?>" />   
                    <?php }?>             
                    <?php echo $edit_val; ?>
                </div>
                <!--Panel body ends-->
            </div>
        </div>
        <!-- col-md-7 ends -->

        <!-- col-md-5 starts -->
        <div class="col-md-5 col-sm-12 col-xs-12">
            <div class="x_panel">
                <a class="collapse-link">
                    <div class="x_title">
                        <h2><i class="fa fa-tasks"></i> Hints<small>(Click to show)</small></h2>                        
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="pull-right"><i class="fa fa-chevron-up"></i>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div> 
                </a>           

                <!--Panel body starts-->
                <div class="x_content" style="display: none;">
                    <div>
                        <ul class="to_do">
                            <?php
                            $hints_ar = split("#", $task_hints);
                            foreach ($hints_ar as $value) {
                                ?>
                                <li>
                                    <h4 class="title">
                                        <i class="glyphicon glyphicon-hand-right"></i>  
                                        <?php echo $value; ?>
                                    </h4>
                                </li>                        
                                <?php
                            }
                            ?>

                        </ul>     
                    </div>
                </div>
                <!--Panel body ends-->
            </div>
            <!-- Custom input starts -->
            <div class="x_panel">
                <a class="collapse-link">
                    <div class="x_title">
                        <h2><i class="glyphicon glyphicon-edit"></i> Custom Input<small>(Click to show)</small></h2>                        
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="pull-right"><i class="fa fa-chevron-up"></i>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>            
                </a>
                <!--Panel body starts-->
                <div class="x_content" style="display: none;">


                    <textarea id="user_input" class="form-control" name="user_input"></textarea>                      
                </div>
                <!--Panel body ends-->
            </div>

            <!-- Custom input ends -->
        </div>
        <!-- col-md-5 ends -->        
    </div>
    <!-- row ends -->

    <!--Task Details row ends-->


    <!-- row starts -->
    <div class="row">
        <!-- col-md-8 starts -->
        <div class="col-md-7 col-sm-12 col-xs-12">
            <div class="x_panel">
                <a class="collapse-link">
                    <div class="x_title">
                        <h2><i class="fa fa-file-code-o"></i> Code Editor</h2>       
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="pull-right"><i class="fa fa-chevron-up"></i>
                            </li>
                        </ul>                    
                        <div class="clearfix"></div>
                    </div>
                </a>
                <!--Panel body starts-->
                <div class="x_content">
                    <input type="hidden" id="task_input_file" value="<?php echo $task_input_file; ?>"/>
                    <input type="hidden" id="task_output_file" value="<?php echo $task_output_file; ?>"/>
                    <input type="hidden" id="task_id" value="<?php echo $task_id; ?>"/>
                    <input type="hidden" id="task_username" value="<?php echo $task_username; ?>"/>
                    <input type="hidden" name="task_category" id="task_category" value="<?php echo $task_category; ?>" />
                    <input type="hidden" name="task_title" id="task_title" value="<?php echo $task_title; ?>" />

                    <textarea id="user_code" class="form-control" style="min-height: 350px;">#include &lt;stdio.h&gt;

int main() {    
    return 0;
}</textarea>                    
                    <button id="run_btn" class="btn btn-dark"><i class="fa fa-gear"></i> Run</button>
                    <button id="submit_btn" class="btn btn-primary"><i class="fa fa-play-circle-o"></i> Submit</button>
                </div>
                <!--Panel body ends-->
            </div>
        </div>
        <!-- col-md-8 ends -->

        <!-- col-md-4 starts -->
        <div class="col-md-5 col-sm-12 col-xs-12">
            <div class="x_panel" id="output_div_wrapper">
                <a class="collapse-link">
                    <div class="x_title">
                        <h2><i class="fa fa-terminal"></i> Output Window</h2> 
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="pull-right"><i class="fa fa-chevron-up"></i>
                            </li>
                        </ul>                    
                        <div class="clearfix"></div>
                    </div>
                </a>
                <!--Panel body starts-->
                <div class="x_content" id="loader_div">
                    <i class="fa fa-spin fa-gear fa-5x" style="text-align:center;margin: auto; width:100%;"></i>
                </div>
                <div class="x_content" id="output_div">
                </div>
                <!--Panel body ends-->
            </div>            
        </div>
        <!-- col-md-5 ends -->     
    </div>
    <!-- row ends -->
<div class="alert alert-dark">
                        Point: <?php echo $task_point;?>
                                                         
                                                        
                        <small class="pull-right"> (Challenge by <?php echo $task_uploader_link;?> )</small>
                    </div>

    <div class="alert alert-success sho-alert-small">
        <center><strong> Stuck to solve the challenge? The lessons in <?php echo $lesson_category_only_link; ?> category may help. </strong></center> 
    </div>        

    <script>
        function inject(callback) {
            var baseUrl = "/lnc/js/src/src/";

            var load = window.__ace_loader__ = function (path, module, callback) {
                var head = document.getElementsByTagName('head')[0];
                var s = document.createElement('script');

                s.src = baseUrl + path;
                head.appendChild(s);

                s.onload = function () {
                    window.__ace_shadowed__.require([module], callback);
                };
            };

            load('ace-compiler.js', "ace/ext/textarea", function () {
                var ace = window.__ace_shadowed__;

                ace.options.mode = "c_cpp";

                var Event = ace.require("ace/lib/event");
//                var areas = document.getElementsByTagName("textarea");
                var areas = document.getElementById("user_code");
                //user_code
//                for (var i = 0; i < areas.length; i++) {
//                    Event.addListener(areas[i], "click", function (e) {
//                        if (e.detail == 3) {
//                            ace.transformTextarea(e.target, load);
//                        }
//                    });
//                }
//                editor = ace.edit("user_code");
//                editor.setOptions({
//                    // mode: "ace/mode/javascript",
//                    enableBasicAutocompletion: true
//                });

                Event.addListener(areas, "click", function (e) {
                    if (e.detail == 3) {
                        ace.transformTextarea(e.target, load);
                    }
                });


                callback && callback();
            });
        }

        // Call the inject function to load the ace files.
        var textAce;
        $(document).ready(function () {
//            if (!localStorage.mycode) {
//                localStorage.mycode = $('#textarea').val();
//            }
//            $('#textarea').val(localStorage.mycode);

            $("#loader_div").hide();
            $("#output_div_wrapper").hide();
            $(document).on({
                ajaxStart: function () {
                    $("#loader_div").slideDown();
                },
                ajaxStop: function () {
                    $("#loader_div").slideUp();
                }
            });


            inject(function () {
                // Transform the textarea on the page into an ace editor.
                var ace = window.__ace_shadowed__;
//                var t = document.querySelector("textarea");
//                textAce = ace.transformTextarea(t, window.__ace_loader__);
                var t = document.getElementById("user_code");
                textAce = ace.transformTextarea(t, window.__ace_loader__);
                setTimeout(function () {
                    textAce.setDisplaySettings(false)
                });
                // console.log(textAce);
            });

            /*
             * Run button click event
             */
            $("#run_btn").on("click", function () {
                $("#output_div_wrapper").slideDown();
                $("#output_div").slideUp("fast");
                $btn_val = "run_btn";
                $user_input = $("#user_input").val();
                $user_code = $('#user_code').val(textAce.getSession().getValue());
                $user_code = $user_code[0]["value"];
                $task_input_file = $("#task_input_file").val();
                $task_output_file = $("#task_output_file").val();
                $task_id = $("#task_id").val();
                $task_username = $("#task_username").val();
                $task_title = $("#task_title").val();
                $task_category = $("#task_category").val();

                $.ajax({
                    type: "POST",
                    url: "compiler_task_check.php",
                    timeout: 5000,
                    data: {data: $user_code, user_input: $user_input, btn_val: $btn_val, task_input_file: $task_input_file, task_output_file: $task_output_file, task_id: $task_id, task_username: $task_username, task_title: $task_title, task_category: $task_category},
                    success: function (data) {
                        $("#output_div").slideDown("slow");
                        $("#output_div").html(data);

                    },
                    error: function (error) {
                        $("#output_div").slideDown("slow");
                        $("#output_div").html(error);
                    }
                });
            });


            /*
             * Submit button click event
             */
            $("#submit_btn").on("click", function () {
                $("#output_div_wrapper").slideDown();
                $("#output_div").slideUp("fast");
                $btn_val = "submit_btn";
                $user_input = $("#user_input").val();
                $user_code = $('#user_code').val(textAce.getSession().getValue());
                $user_code = $user_code[0]["value"];
                $task_input_file = $("#task_input_file").val();
                $task_output_file = $("#task_output_file").val();
                $task_id = $("#task_id").val();
                $task_username = $("#task_username").val();
                $task_title = $("#task_title").val();
                $task_category = $("#task_category").val();

                $.ajax({
                    type: "POST",
                    url: "compiler_task_check.php",
                    timeout: 5000,
                    data: {data: $user_code, user_input: $user_input, btn_val: $btn_val, task_input_file: $task_input_file, task_output_file: $task_output_file, task_id: $task_id, task_username: $task_username, task_title: $task_title, task_category: $task_category},
                    success: function (data) {
                        $("#output_div").slideDown("slow");
                        $("#output_div").html(data);

                    },
                    error: function (error) {
                        $("#output_div").slideDown("slow");
                        $("#output_div").html(error);
                    }
                });
            });



//            $('#myCode').submit(function (event) {
//                event.preventDefault();
//                $('.loading').slideDown('slow');
//                $('#result').html('');
//                $('#time').html('');
//                $('#user_code').val(textAce.getSession().getValue());
//                localStorage.mycode = textAce.getSession().getValue();
//                var datastring = $("#myCode").serialize();
//                console.log(datastring);
//                $("#myCode :input").attr("disabled", true);
//                $.ajax({
//                    type: "POST",
//                    url: "/compile",
//                    timeout: 60000,
//                    data: datastring,
//                    dataType: "json",
//                    success: function (data) {
//                        if (data.success) {
//                            $('#result').html(data.result);
//                            $('#time').html(data.timeExec + ' ms');
//                        } else {
//                            $('#result').html(data.error);
//                        }
//                        $("#myCode :input").attr("disabled", false);
//                        $('.loading').slideUp('slow');
//                    },
//                    error: function (error) {
//                        console.log(error);
//                        $('.result').html(error);
//                        $("#myCode :input").attr("disabled", false);
//                        $('.loading').slideUp('slow');
//                    }
//                });
//                // return false;
//            });
        });

    </script>


    <?php require './module/footer.php'; ?>


