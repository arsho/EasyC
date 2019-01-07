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
function upload_input_output($form_filename, $lesson_id, $file_type) {
    $checkfile = 0;
    $file_url = "";
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
            $file_url = "lesson_dir/" . $lesson_id . "_" . $file_type . "." . $file_ext;
            move_uploaded_file($file_tmp, $file_url);
        }
    } else {
        $file_url = "No file";
    }
    return $file_url;
}

/* Handling add goal type page */

//storing the passed values in variables        
if (isset($_POST["lesson_add_form_submit"])) {
    $lesson_title = test_input($_POST["lesson_title"]);
    $lesson_details = htmlspecialchars($_POST["lesson_details"]);
//    $lesson_details = ($_POST["lesson_details"]);
    $lesson_tags = test_input($_POST["lesson_tags"]);
    $lesson_uploader = test_input($_POST["lesson_uploader"]);
    $lesson_category = test_input($_POST["lesson_category"]);    
    $lesson_media = "";

    $data = array();
    $data["lesson_title"] = $lesson_title;
    $data["lesson_details"] = $lesson_details;
    $data["lesson_tags"] = $lesson_tags;
    $data["lesson_uploader"] = $lesson_uploader;
    $data["lesson_media"] = $lesson_media;
    $data["lesson_category"] = $lesson_category;

    $ret_val = $lesson_object->add_row($data);

    $lesson_media = upload_input_output('lesson_media', $ret_val, 'media');

    $data["lesson_media"] = $lesson_media;
    $data["lesson_id"] = $ret_val;

    $ret_val = $lesson_object->update_row($data);
    header('Location: lesson_view.php');
} else {
    header('Location: lesson_add.php');
}
?>
