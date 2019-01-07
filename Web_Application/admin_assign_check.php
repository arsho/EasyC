<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php

$user_username = $_POST["user_username"];
$user_role = $_POST["user_role"];

if (isset($user_username)) {
    $ret_val=$user_object->update_user_role($user_username,$user_role);
}
header('Location: admin_assign.php');
?>
