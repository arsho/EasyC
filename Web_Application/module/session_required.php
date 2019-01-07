<?php session_start(); ?>

<?php

require './module/Task_table_class.php';
require './module/Lesson_table_class.php';
require './module/Lesson_category_table_class.php';
require './module/User_table_class.php';
require './module/User_task_table_class.php';
require './module/User_ranklist_table_class.php';
require './module/Chat_table_class.php';

$task_object = new Task_table_class();
$lesson_object = new Lesson_table_class();
$lesson_category_object = new Lesson_category_table_class();
$user_object = new User_table_class();
$user_task_object=new User_task_table_class();
$user_ranklist_object=new User_ranklist_table_class();
$chat_object=new Chat_table_class();


if (!isset($_SESSION["logged_in"])) {
    header('Location: login.php');
} else {
    $session_user_username = $_SESSION["user_username"];
    $current_user_details_ar = $user_object->get_row_using_id($session_user_username);
    $current_user_details = $current_user_details_ar[0];
    $current_user_role = $current_user_details["user_role"];
}
?>