<?php

session_start();
require './module/Task_table_class.php';
require './module/Lesson_table_class.php';
require './module/User_table_class.php';
require './module/User_ranklist_table_class.php';

$task_object = new Task_table_class();
$lesson_object = new Lesson_table_class();
$user_object = new User_table_class();
$user_ranklist_object=new User_ranklist_table_class();
?>

<?php

//function to strip html string
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// if form is submitted
if (isset($_POST["registration_form_submit"])) {

    $user_username = test_input($_POST["user_username"]);
    $user_password = md5(test_input($_POST["user_password"]));
    $user_email = test_input($_POST["user_email"]);
    $user_role = 'User';
    $user_photo = 'user_image_dir/user.png';

    $user_institute = '';
    $user_fullname = '';
    $user_city = '';
    $user_country = '';
    $user_bio = '';

    $user_github = '';
    $user_website = '';
    $user_occupation = '';
    $user_phone = '';

    $data = array();
    $data['user_username'] = $user_username;
    $data['user_password'] = $user_password;
    $data['user_email'] = $user_email;
    $data['user_role'] = $user_role;
    $data['user_photo'] = $user_photo;

    $data['user_institute'] = $user_institute;
    $data['user_fullname'] = $user_fullname;
    $data['user_city'] = $user_city;
    $data['user_country'] = $user_country;
    $data['user_bio'] = $user_bio;

    $data['user_github'] = $user_github;
    $data['user_website'] = $user_website;
    $data['user_occupation'] = $user_occupation;
    $data['user_phone'] = $user_phone;

    
    $data_ranklist = array();
    $data_ranklist['ranklist_username'] = $user_username;
    $data_ranklist['number_of_ac'] = 0;
    $data_ranklist['number_of_submissions'] = 0;
    $data_ranklist['date_of_last_submission'] = 0;    
    
    $ret_val = $user_object->add_row($data);
    $ret_val_ranklist = $user_ranklist_object->add_row($data_ranklist);

    // successfully added in the user table
    if ($ret_val == 1) {
        //checking the user email and password
        $user_details = $user_object->get_row_using_id($user_username);
        //counting row numbers in $emp_details
        $user_details_length = count($user_details);

        if ($user_details_length == 1) {
            //used to check already logged in user
            $_SESSION["logged_in"] = 1;
            //setting the first employee id using 0th index
            $_SESSION["user_username"] = $user_details[0]["user_username"];
            header('Location: index.php');
        } else {
            // generate error message
            header('Location: login.php#toregister.php');
        }
    }
    // error while adding in the user table
    else {
        header('Location: login.php#toregister');
    }
}
// the form is not submitted
else {
    header('Location: login.php#toregister');
}


