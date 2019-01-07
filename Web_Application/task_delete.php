<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php

$task_id=$_GET["task_id"];
if(isset($task_id)){
    $task_object->delete_row($task_id);
}
    header('Location: task_view.php');

?>
