<?php require './module/session_required.php';   ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>
<?php $page_title = 'Online Compiler' ?>

<!-- right_col starts -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><?php echo $page_title; ?></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <!--Task Details row starts-->

    <!-- row starts -->
    <div class="row">
        <!-- col-md-7 starts -->
        <div class="col-md-7 col-sm-7 col-xs-7">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-tasks"></i> Task Details<small>(Click to minimize)</small></h2>                        
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div> 
                <!--Panel body starts-->
                <div class="x_content">
                    <img class="img-thumbnail img-responsive img-rounded"  style="display: block; text-align: center; margin: 5px auto;" src="https://s-media-cache-ak0.pinimg.com/736x/5b/3b/dc/5b3bdccbba3ae4d2f58f7a2605e7347d.jpg" />                

                    "For" loops are used to iterate over a given sequence. On each iteration, the variable defined in the "for" loop will
                    be assigned to the next value in the list.

                    <br><br>
                    Print each prime number from the "prime_number" array using the "for" loop. Print a new line after each prime number.
                    <br>
                    A prime number is a natural number greater than 1 that has no positive divisors other than 1 and itself.
                    <br>
                </div>
                <!--Panel body ends-->
            </div>
        </div>
        <!-- col-md-7 ends -->

        <!-- col-md-5 starts -->
        <div class="col-md-5 col-sm-5 col-xs-5">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-tasks"></i> Completeness</h2>                        
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>            

                <!--Panel body starts-->
                <div class="x_content">
                    <div>
                        <p>76% Complete</p>
                        <div class="">
                            <div class="progress progress-striped">
                                <div class="progress-bar progress-bar-success" role="progressbar" data-transitiongoal="80" aria-valuenow="79" style="width: 80%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Panel body ends-->
            </div>
        </div>
        <!-- col-md-5 ends -->        
    </div>
    <!-- row ends -->

    <!--Task Details row ends-->


    <!-- row starts -->
    <div class="row">
        <!-- col-md-8 starts -->
        <div class="col-md-7 col-sm-7 col-xs-7">
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
                    <button id="run_btn" class="btn btn-dark"><i class="fa fa-gear"></i> Run</button>
                    <button id="submit_btn" class="btn btn-primary"><i class="fa fa-play-circle-o"></i> Submit</button>
                </div>
                <!--Panel body ends-->
            </div>
        </div>
        <!-- col-md-8 ends -->

        <!-- col-md-4 starts -->
        <div class="col-md-5 col-sm-5 col-xs-5">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-tasks"></i> Input<small>(Click to minimize)</small></h2>                        
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>            

                <!--Panel body starts-->
                <div class="x_content">
                    <textarea id="user_input" class="form-control" name="user_input"></textarea>                      
                </div>
                <!--Panel body ends-->
            </div>
            <div class="x_panel" id="output_div_wrapper">
                <div class="x_title">
                    <h2><i class="fa fa-terminal"></i> Output Window</h2> 
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>                    
                    <div class="clearfix"></div>
                </div>
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
                var areas = document.getElementsByTagName("textarea");
                for (var i = 0; i < areas.length; i++) {
                    Event.addListener(areas[i], "click", function (e) {
                        if (e.detail == 3) {
                            ace.transformTextarea(e.target, load);
                        }
                    });
                }
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
                $btn_val="run_btn";
                $user_input = $("#user_input").val();
                $user_code = $('#user_code').val(textAce.getSession().getValue());
                $user_code = $user_code[0]["value"];
                $.ajax({
                    type: "POST",
                    url: "compiler_check.php",
                    timeout: 60000,
                    data: {data: $user_code, user_input: $user_input, btn_val: $btn_val},
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
            

            /*
             * Submit button click event
             */
            $("#submit_btn").on("click", function () {
                $("#output_div_wrapper").slideDown();
                $("#output_div").slideUp("fast");
                $btn_val="submit_btn";
                $user_input = $("#user_input").val();
                $user_code = $('#user_code').val(textAce.getSession().getValue());
                $user_code = $user_code[0]["value"];
                $.ajax({
                    type: "POST",
                    url: "compiler_check.php",
                    timeout: 60000,
                    data: {data: $user_code, user_input: $user_input, btn_val: $btn_val},
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



            $('#myCode').submit(function (event) {
                event.preventDefault();
                $('.loading').slideDown('slow');
                $('#result').html('');
                $('#time').html('');
                $('#user_code').val(textAce.getSession().getValue());
                localStorage.mycode = textAce.getSession().getValue();
                var datastring = $("#myCode").serialize();
                console.log(datastring);
                $("#myCode :input").attr("disabled", true);
                $.ajax({
                    type: "POST",
                    url: "/compile",
                    timeout: 60000,
                    data: datastring,
                    dataType: "json",
                    success: function (data) {
                        if (data.success) {
                            $('#result').html(data.result);
                            $('#time').html(data.timeExec + ' ms');
                        } else {
                            $('#result').html(data.error);
                        }
                        $("#myCode :input").attr("disabled", false);
                        $('.loading').slideUp('slow');
                    },
                    error: function (error) {
                        console.log(error);
                        $('.result').html(error);
                        $("#myCode :input").attr("disabled", false);
                        $('.loading').slideUp('slow');
                    }
                });
                // return false;
            });
        });

    </script>


    <?php require './module/footer.php'; ?>


