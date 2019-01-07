<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>
<?php $page_title = 'Online Compiler' ?>
<?php
$task_username = $current_user_details["user_username"];
?>
<!-- right_col starts -->
<div class="right_col" role="main">
    <ol class = "breadcrumb">
        <li><a href = "index.php">Home</a></li>
        <li class = "active"><?php echo $page_title; ?></li>
    </ol>
    <div class="page-title">
        <div class="title_left">
            <h3><?php echo $page_title; ?></h3>
        </div>
    </div>
    <div class="clearfix"></div>



    <!-- row starts -->
    <div class="row">
        <!-- col-md-8 starts -->
        <div class="col-md-7 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-file-code-o"></i> Code Editor</h2>       
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>                    
                    <div class="clearfix"></div>
                </div>
                <!--Panel body starts-->
                <div class="x_content">
                    <textarea id="user_code" class="form-control" style="min-height: 350px;">#include &lt;stdio.h&gt;

int main() {
    int i;
    int prime_number[]={2,3,5,7};
    for(i=0;i<4;i++)
    {
        printf(&quot;%d\n&quot;,prime_number[i]);
    }
	return 0;
}</textarea>                    

                    <input type="hidden" id="task_username" value="<?php echo $task_username; ?>"/>                    
                    <button id="run_btn" class="btn btn-dark btn-block"><i class="fa fa-gear"></i> Run</button>                    
                </div>
                <!--Panel body ends-->
            </div>
        </div>
        <!-- col-md-8 ends -->

        <!-- col-md-4 starts -->
        <div class="col-md-5 col-sm-6 col-xs-12">
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
                var areas = document.getElementById("user_code");

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
                var t = document.querySelector("textarea");
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
                $task_username = $("#task_username").val();
                $.ajax({
                    type: "POST",
                    url: "compiler_check.php",
                    timeout: 10000,
                    data: {data: $user_code, user_input: $user_input, btn_val: $btn_val, task_username: $task_username},
                    success: function (data) {
                        $("#output_div").slideDown("slow");
                        $("#output_div").html(data);

                    },
                    error: function (error) {
                        $("#output_div").slideDown("slow");
                        $("#output_div").html(data);
                    }
                });
            });

        });

    </script>


    <?php require './module/footer.php'; ?>


