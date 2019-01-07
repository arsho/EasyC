<?php require './module/session_required.php'; ?>
<?php

//function to strip html string
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// if form is submitted
if(isset($_POST["registration_form_submit"])){
    echo 'registration form submitted';
}
// else if checking the username availability
else if(isset($_POST["user_username"])){
    echo 'checking username';
    $user_username=  test_input($_POST["user_username"]);
    $user_ar=$user_object->get_row_using_id($user_username);
    var_dump($user_ar);
}
// the form is not submitted or the username field is not checked
else{
    echo 'access not allowed';    
}

/* Handling add goal type page */

