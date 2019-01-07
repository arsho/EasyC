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
function upload_input_output($form_filename, $lesson_id, $pass_user_photo_old, $file_type) {
    $checkfile = 0;
    $file_url = "";
    if (isset($_FILES[$form_filename])) {
        $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES[$form_filename]['name'];
        if ($file_name == '')
            $file_url = $pass_user_photo_old;
        else {
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
                $file_url = "user_image_dir/" . $lesson_id . "_" . $file_type . "." . $file_ext;
                move_uploaded_file($file_tmp, $file_url);
            }
        }
    } else {
        $file_url = $pass_user_photo_old;
    }
    return $file_url;
}

/* Handling add goal type page */

//storing the passed values in variables        
if (isset($_POST["edit_profile_form_submit"])) {
    $user_username = test_input($_POST["user_username"]);
    $user_fullname = test_input($_POST["user_fullname"]);
    $user_city = test_input($_POST["user_city"]);
    $user_country = test_input($_POST["user_country"]);
    $user_occupation = test_input($_POST["user_occupation"]);
    $user_institute = test_input($_POST["user_institute"]);
    $user_phone = test_input($_POST["user_phone"]);
    $user_website = test_input($_POST["user_website"]);
    $user_github = test_input($_POST["user_github"]);
    $user_bio = test_input($_POST["user_bio"]);
    $user_photo_old = test_input($_POST["user_photo_old"]);
    $user_photo = "";

    $user_photo = upload_input_output('user_photo', $user_username, $user_photo_old, 'image');

    $data = array();
    $data["user_username"] = $user_username;
    $data["user_fullname"] = $user_fullname;
    $data["user_city"] = $user_city;
    $data["user_country"] = $user_country;
    $data["user_occupation"] = $user_occupation;
    $data["user_institute"] = $user_institute;
    $data["user_phone"] = $user_phone;
    $data["user_website"] = $user_website;
    $data["user_github"] = $user_github;
    $data["user_bio"] = $user_bio;
    $data["user_photo"] = $user_photo;

    $ret_val = $user_object->update_row($data);
    header('Location: profile.php?user=' . $user_username);
} else {
    header('Location: edit_profile.php');
}
?>
