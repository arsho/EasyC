<?php require './module/session_required.php'; ?>
<?php 
//function to strip html string
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//function to upload input output file
function upload_input_output($form_filename,$task_id,$file_type,$old_file_url) {
    $checkfile=0;
    $file_url="";
    if (isset($_FILES[$form_filename])) {
        $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES[$form_filename]['name'];
        $file_ext = strtolower(end(explode('.', $file_name)));
        $file_size = $_FILES[$form_filename]['size'];
        $file_tmp = $_FILES[$form_filename]['tmp_name'];
        if (!empty($file_name)) {
            $checkfile = 1;
        }

//        if ($checkpic == 1 and ( in_array($file_ext, $allowed_ext) === false)) {
//            $errors[] = "File extension not allowed. Only jpg/png/gif format allowed.";
//        }
//        if ($file_size > 2097152) {
//            $file_url = "File size must be under 2 MB.";
//        }
        if ($checkfile == 1) {
            $file_url = "task_dir/" . $task_id . "_" . $file_type.".".$file_ext;
            move_uploaded_file($file_tmp, $file_url);
        }
    }
    else{
        $file_url=$old_file_url;
    }
    //echo $file_type.'-->check file-->'.$checkfile.'<br>';
    return $file_url;
}

/* Handling add goal type page */

//storing the passed values in variables        
if (isset($_POST["task_edit_form_submit"])) {
    $task_id = test_input($_POST["task_id"]);    
    $task_title = test_input($_POST["task_title"]);
    $task_category = test_input($_POST["task_category"]);    
    $task_details = htmlspecialchars($_POST["task_details"]);
    $task_hints = test_input($_POST["task_hints"]);
    $task_uploader = test_input($_POST["task_uploader"]);
    $task_point = test_input($_POST["task_point"]);
    $task_input_file_old = test_input($_POST["task_input_file_old"]);
    $task_output_file_old = test_input($_POST["task_output_file_old"]);
    $task_media_old = test_input($_POST["task_media_old"]);
    $task_input_file = upload_input_output('task_input_file',$task_id,'input',$task_input_file_old);
    $task_output_file = upload_input_output('task_output_file',$task_id,'output',$task_output_file_old);
    $task_media = upload_input_output('task_media',$task_id,'media',$task_media_old);
        
    $data = array();
    $data["task_id"] = $task_id;    
    $data["task_title"] = $task_title;
    $data["task_details"] = $task_details;
    $data["task_hints"] = $task_hints;
    $data["task_uploader"] = $task_uploader;
    $data["task_point"] = $task_point;
    $data["task_input_file"] = $task_input_file;
    $data["task_output_file"] = $task_output_file;
    $data["task_media"] = $task_media;
    $data["task_category"] = $task_category;
    
    $ret_val = $task_object->update_row($data);
    //echo 'ret val'.$ret_val;
    header('Location: task_view.php');
} else {
    header('Location: task_view.php');
}
?>
