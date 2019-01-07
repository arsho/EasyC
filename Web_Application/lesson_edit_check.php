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
function upload_input_output($form_filename,$lesson_id,$file_type,$old_file_url) {
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
            $file_url = "lesson_dir/" . $lesson_id . "_" . $file_type.".".$file_ext;
            move_uploaded_file($file_tmp, $file_url);
        }
    }
    else{
        $file_url=$old_file_url;
    }
    return $file_url;
}

/* Handling add goal type page */

//storing the passed values in variables        
if (isset($_POST["lesson_edit_form_submit"])) {
    $lesson_id = test_input($_POST["lesson_id"]);    
    $lesson_title = test_input($_POST["lesson_title"]);
    $lesson_details = htmlspecialchars($_POST["lesson_details"]);
    $lesson_tags = test_input($_POST["lesson_tags"]);
    $lesson_category = test_input($_POST["lesson_category"]);
    $lesson_uploader = test_input($_POST["lesson_uploader"]);
    $lesson_media_old = test_input($_POST["lesson_media_old"]);
    $lesson_media = upload_input_output('lesson_media',$lesson_id,'media',$lesson_media_old);
        
    $data = array();
    $data["lesson_id"] = $lesson_id;    
    $data["lesson_title"] = $lesson_title;
    $data["lesson_details"] = $lesson_details;
    $data["lesson_tags"] = $lesson_tags;
    $data["lesson_category"] = $lesson_category;
    $data["lesson_uploader"] = $lesson_uploader;
    $data["lesson_media"] = $lesson_media;
    
    
    $ret_val = $lesson_object->update_row($data);
    header('Location: lesson_view.php');
} else {
    header('Location: lesson_view.php');
}
?>
