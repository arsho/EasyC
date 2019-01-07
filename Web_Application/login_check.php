<?php

session_start();
require './module/Task_table_class.php';
require './module/Lesson_table_class.php';
require './module/User_table_class.php';

$task_object = new Task_table_class();
$lesson_object = new Lesson_table_class();
$user_object = new User_table_class();
?>


<?php

//function to strip html string
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

var_dump($_POST);
/* Handling add goal type page */

//storing the passed values in variables        
if (isset($_POST["login_form_submit"])) {
    $user_username = test_input($_POST["login_user_username"]);
    $user_password = md5(test_input($_POST["login_user_password"]));
    $login_form_submit = test_input($_POST["login_form_submit"]);

    if ($login_form_submit != NULL) {
        //checking the user email and password
        $user_details = $user_object->get_row_using_double_attribute($user_username, $user_password);
        $user_details_length = count($user_details);

        if ($user_details_length == 1) {
            //used to check already logged in user
            $_SESSION["logged_in"] = 1;
            $_SESSION["user_username"] = $user_details[0]["user_username"];
            header('Location: index.php');
        } else {
            // generate error message
            header('Location: login.php?invalid=true');
        }
    } else {
        header('Location: login.php?improper=true');
    }
} else {
    header('Location: login.php?improper=true');
}
?>
