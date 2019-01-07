<?php require './module/session_required.php'; ?>
<?php

//storing the passed values in variables        
if (isset($_POST["change_password_form_submit"])) {

    $user_username = $_POST["user_username"];
    $user_password_old = md5($_POST["user_password_old"]);
    $user_password = md5($_POST["user_password"]);
    $user_ar_count = count($user_object->get_row_using_double_attribute($user_username, $user_password_old));

    $error = 1;
    if ($user_ar_count == 1) {
        $ret_val = $user_object->update_password($user_username, $user_password);
        if ($ret_val == 1) {
            $error = 0;
        }
    }

    header('Location: change_password.php?error=' . $error);
} else {
    header('Location: welcome.php');
}
?>
