<!--add_eemployee starts-->
<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>
<?php
    $submit_val=$_POST["live_practice_submit"];
    $user_output_int=5;
    if($submit_val!==NULL){
        $user_code_text=$_POST["live_practice_text"];
        $user_code_filename="live_practice.c";
        $user_code_file_obj=fopen($user_code_filename,"w");
        fwrite($user_code_file_obj,$user_code_text);
        fclose($user_code_file_obj);
        $cmd = "gcc -o hello $user_code_filename";
        $user_output = exec($cmd);
        $cmd = "./hello";
        exec($cmd,$output);
        $user_output_int=1;
    }
?>
<script language="javascript" type="text/javascript" src="edit_area/edit_area_full.js"></script>
<script language="javascript" type="text/javascript">
    editAreaLoader.init({
        id: "live_practice_text"		// textarea id
        , syntax: "c"			// syntax to be uses for highgliting
        , start_highlight: true		// to display with highlight mode on start-up
    });
</script>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Live Practice</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Live Practice Session</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <?php if($user_output_int==5){?>
                        
                        <form method="post" name="live_practice_form" class="form-horizontal form-label-left" action="live_practice.php">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Code: </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea rows="10" name="live_practice_text" id="live_practice_text" class="form-control" placeholder="Enter your code here">
#include <stdio.h>
main(){
    int i=0;
    for(i=0;i<5;i++){
        printf("Hello World\n");
    }
}                                    
                                    </textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                    <button name="live_practice_submit" type="submit" class="btn btn-success">Run</button>
                                </div>
                            </div>

                        </form>
                        <?php } 
                        else {
                            foreach($output as $line)
                            {
                            	echo $line."<br><br>";
                            }                           
                            
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- page content -->
    <?php require './module/footer.php'; ?>
<!--add_employee ends-->

