<?php

$user_code_dir = "user_code_dir";

// Function to write contents in file
function write_to_file($write_filename, $file_text) {
    $new_file_obj = fopen($write_filename, "w");
    fwrite($new_file_obj, $file_text);
    fclose($new_file_obj);
}

// Function to read contents from file
function read_from_file($read_filename) {
    $new_file_obj = fopen($read_filename, "r");
    $output = "";
    while (!feof($new_file_obj)) {
        $output = $output . fgets($new_file_obj) . "<br>";
    }
    //$output = substr($output, 0, strlen($output) - 8);
    fclose($new_file_obj);
    return $output;
}

// Getting user code and input from compiler
$user_code_text = $_POST["data"];
$user_input_text = $_POST["user_input"];
$btn_val = $_POST["btn_val"];
$task_input_file = $_POST["task_input_file"];
$task_output_file = $_POST["task_output_file"];
$task_id = $_POST["task_id"];
$task_username = $_POST["task_username"];
$task_category = $_POST["task_category"];
$task_title = $_POST["task_title"];


$submission_task_id = $task_id;
$submission_task_title = $task_title;
$submission_task_category = $task_category;
$submission_username = $task_username;
$submission_verdict = '';
$submission_code = htmlspecialchars($_POST["data"]);
$submission_date = date();

// Writing user code in a file
$user_code_filename = $user_code_dir . "/" . $task_username . "_" . $task_id . ".c";
write_to_file($user_code_filename, $user_code_text);


// Writing user input in a file
//$user_input_filename = "a.in";
$user_input_filename = $user_code_dir . "/" . $task_username . "_" . $task_id . ".in";
write_to_file($user_input_filename, $user_input_text);

// Setting user output filename
//$user_output_filename = "a.out";
$user_output_filename = $user_code_dir . "/" . $task_username . "_" . $task_id . ".out";

// Setting user exec filename
$user_exec_name = $user_code_dir . "/" . $task_username . "_" . $task_id;

// Setting judge input output filename
$judge_output_filename = $task_output_file;
$judge_input_filename = $task_input_file;

// Setting user input filename as judge input if no custom data is given

if ($user_input_text == "") {
    $user_input_filename = $judge_input_filename;
}


// Run button press action starts
if ($btn_val == "run_btn") {
    $cmd = "gcc -o $user_exec_name $user_code_filename 2>&1";
    exec($cmd, $compile_message, $error_message);
    // If there is no compilation error in the program
    if ($error_message == 0) {
        $cmd = "./$user_exec_name < $user_input_filename > $user_output_filename";
        exec($cmd, $output);

        $output_success_message = "";
        $user_input = read_from_file($user_input_filename);
        $output_success_message = $output_success_message . '<h2 class="title">Input</h2>';
        $output_success_message = $output_success_message . '<div class="alert well">';
        $output_success_message = $output_success_message . $user_input;
        $output_success_message = $output_success_message . "</div>";

        $user_output = read_from_file($user_output_filename);
        $output_success_message = $output_success_message . '<h2 class="title">Your output</h2>';
        $output_success_message = $output_success_message . '<div class="alert well">';
        $output_success_message = $output_success_message . $user_output;
        $output_success_message = $output_success_message . "</div>";


        echo $output_success_message;
    }
    // If compilation error is found
    else {
        $output_error_message = "";
        $output_error_message = $output_error_message . '<div class="alert alert-danger">';
        $output_error_message = $output_error_message . '<h4 class="compilation_error_header">Compilation Error!</h4>';
        $output_error_message = $output_error_message . "</div>";
        $output_error_message = $output_error_message . '<h2 class="title">Errors</h2>';
        $output_error_message = $output_error_message . '<div class="well">';
        foreach ($compile_message as $line) {
            if ($line == "")
                continue;
            $find_str = $user_code_filename . ":";
            $find_str_len = strlen($find_str);
            $file_name_start = strpos($line, $find_str);
            if ($file_name_start != FALSE) {
                $str_pos = $file_name_start + $find_str_len;
                $line = substr($line, $str_pos);
            }
            $line='<i class="glyphicon glyphicon-exclamation-sign"></i> '.$line;
            $output_error_message = $output_error_message . $line . "<br>";
        }
        $output_error_message = $output_error_message . "</div>";
        echo $output_error_message;
    }
}
// Run button press action ends
// Submit button press action starts
else if ($btn_val == "submit_btn") {
    $cmd = "gcc -o $user_exec_name $user_code_filename 2>&1";
    exec($cmd, $compile_message, $error_message);

    // If there is no compilation error is found
    if ($error_message == 0) {
        $cmd = "./$user_exec_name < $judge_input_filename > $user_output_filename";
        exec($cmd, $output);

        $diff_cmd = "diff $user_output_filename $judge_output_filename";
        exec($diff_cmd, $output);
        // If judge output and user output are same
        if (count($output) == 0) {
            $output_success_message = "";

            $output_success_message = $output_success_message . '<div class="alert alert-success">';
            $output_success_message = $output_success_message . '<h4 class="accepted_header">Accepted</h4>';
            $output_success_message = $output_success_message . "</div>";

            $judge_input = read_from_file($judge_input_filename);
            $output_success_message = $output_success_message . '<h2 class="title">Input</h2>';
            $output_success_message = $output_success_message . '<div class="alert well">';
            $output_success_message = $output_success_message . $judge_input;
            $output_success_message = $output_success_message . "</div>";

            $user_output = read_from_file($user_output_filename);
            $output_success_message = $output_success_message . '<h2 class="title">Your output</h2>';
            $output_success_message = $output_success_message . '<div class="alert well">';
            $output_success_message = $output_success_message . $user_output;
            $output_success_message = $output_success_message . "</div>";

            echo $output_success_message;
        }
        // If judge solution and user solution are different
        else {
            $output_error_message = "";

            $output_error_message = $output_error_message . '<div class="alert alert-danger">';
            $output_error_message = $output_error_message . '<h4 class="wrong_answer_header">Wrong answer</h4>';
            $output_error_message = $output_error_message . "</div>";


            $judge_input = read_from_file($judge_input_filename);
            $output_error_message = $output_error_message . '<h2 class="title">Input</h2>';
            $output_error_message = $output_error_message . '<div class="alert well">';
            $output_error_message = $output_error_message . $judge_input;
            $output_error_message = $output_error_message . "</div>";

            $user_output = read_from_file($user_output_filename);
            $output_error_message = $output_error_message . '<h2 class="title">Your output</h2>';
            $output_error_message = $output_error_message . '<div class="alert well">';
            $output_error_message = $output_error_message . $user_output;
            $output_error_message = $output_error_message . "</div>";

            $judge_output = read_from_file($judge_output_filename);
            $output_error_message = $output_error_message . '<h2 class="title">Expected output</h2>';
            $output_error_message = $output_error_message . '<div class="alert well">';
            $output_error_message = $output_error_message . $judge_output;
            $output_error_message = $output_error_message . "</div>";
            echo $output_error_message;
        }
    }
    // If compilation error is found
    else {
        $output_error_message = "";
        $output_error_message = $output_error_message . '<div class="alert alert-danger">';
        $output_error_message = $output_error_message . '<h4 class="compilation_error_header">Compilation Error!</h4>';
        $output_error_message = $output_error_message . "</div>";
        $output_error_message = $output_error_message . '<h2 class="title">Errors</h2>';
        $output_error_message = $output_error_message . '<div class="well">';
        foreach ($compile_message as $line) {
            if ($line == "")
                continue;
            $find_str = $user_code_filename . ":";
            $find_str_len = strlen($find_str);
            $file_name_start = strpos($line, $find_str);
            if ($file_name_start != FALSE) {
                $str_pos = $file_name_start + $find_str_len;
                $line = substr($line, $str_pos);
            }
            $line='<i class="glyphicon glyphicon-exclamation-sign"></i> '.$line;
            $output_error_message = $output_error_message . $line . "<br>";
        }
        $output_error_message = $output_error_message . "</div>";
        echo $output_error_message;
    }
}
// Submit button press action ends
?>