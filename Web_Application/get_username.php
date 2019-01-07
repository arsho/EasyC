<?php require './module/session_required.php'; ?>
<?php

//function to strip html string
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//if checking the username availability
if (isset($_POST["user_username"])) {
    $user_username = test_input($_POST["user_username"]);
    $user_ar = $user_object->get_row_using_id($user_username);
    $user_ar_len = count($user_ar);
    if ($user_ar_len == 0) {
        echo '0';
    } else {
        echo '1';
    }
}
// the form is not submitted
else {
    echo 'access not allowed';
}


