<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php

$lesson_id=$_GET["lesson_id"];
if(isset($lesson_id)){
    $lesson_object->delete_row($lesson_id);
}
    header('Location: lesson_view.php');

?>
