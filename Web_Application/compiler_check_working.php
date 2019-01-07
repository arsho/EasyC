<?php

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
    $output = substr($output, 0, strlen($output) - 8);
    fclose($new_file_obj);
    return $output;
}


// Getting user code and input from compiler
$user_code_text = $_POST["data"];
$user_input_text = $_POST["user_input"];
$btn_val = $_POST["btn_val"];

// Writing user code in a file
$user_code_filename = "newcfile.c";
write_to_file($user_code_filename, $user_code_text);

// Writing user input in a file
$user_input_filename = "a.in";
write_to_file($user_input_filename, $user_input_text);

$judge_output_filename = "a_judge.out";
$judge_input_filename = "a_judge.in";

// Setting user output filename
$user_output_filename = "a.out";

// Run button press action starts
if ($btn_val == "run_btn") {
    $cmd = "gcc -o cc $user_code_filename 2>&1";
    exec($cmd, $compile_message, $error_message);
    // If there is no compilation error in the program
    if ($error_message == 0) {
        $cmd = "./cc < $user_input_filename > $user_output_filename";
        exec($cmd, $output);

        $output = read_from_file($user_output_filename);

        $output_success_message = '<div class="alert alert-success">';
        $output_success_message = $output_success_message . $output;
        $output_success_message = $output_success_message . "</div>";
        echo $output_success_message;
    } 
    // If compilation error is found
    else {
        $output_error_message = '<div class="alert alert-danger">';
        foreach ($compile_message as $line) {
            $output_error_message = $output_error_message . $line . "<br>";
        }
        $output_error_message = $output_error_message . "</div>";
        echo $output_error_message;
    }
}
// Run button press action ends


// Submit button press action starts
else if ($btn_val == "submit_btn") {
    $cmd = "gcc -o cc $user_code_filename 2>&1";
    exec($cmd, $compile_message, $error_message);
    
    // If there is no compilation error is found
    if ($error_message == 0) {
        $cmd = "./cc < $judge_input_filename > $user_output_filename";
        exec($cmd, $output);

        $diff_cmd = "diff $user_output_filename $judge_output_filename";
        exec($diff_cmd, $output);
        
        // If judge output and user output are same
        if (count($output) == 0){
            $user_output = read_from_file($user_output_filename);
            $output_success_message = '<div class="alert alert-success">';
            $output_success_message = $output_success_message . "Accepted<br>".$user_output;
            $output_success_message = $output_success_message . "</div>";
            echo $output_success_message;            
        }
        // If judge solution and user solution are different
        else{
            
            $judge_input = read_from_file($judge_input_filename);
            $output_error_message="";
            $output_error_message = $output_error_message .'<div class="alert alert-info">';
            $output_error_message = $output_error_message . $judge_input;
            $output_error_message = $output_error_message . "</div>";
            
            $user_output = read_from_file($user_output_filename);
            $output_error_message = $output_error_message.'<div class="alert alert-danger">';
            $output_error_message = $output_error_message . $user_output;
            $output_error_message = $output_error_message . "</div>";
            
            $judge_output = read_from_file($judge_output_filename);
            $output_error_message = $output_error_message .'<div class="alert alert-warning">';
            $output_error_message = $output_error_message . $judge_output;
            $output_error_message = $output_error_message . "</div>";            
            echo $output_error_message;                        
        }
    } 
    // If compilation error is found
    else {
        $output_error_message = '<div class="alert alert-danger">';
        foreach ($compile_message as $line) {
            $output_error_message = $output_error_message . $line . "<br>";
        }
        $output_error_message = $output_error_message . "</div>";
        echo $output_error_message;
    }
}
// Submit button press action ends

?>