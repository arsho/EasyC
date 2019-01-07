<?php

require './module/session_required.php';

//function to strip html string
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//function to shorten string
function shorten($data) {
    $new_data = "";
    for ($i = 0; $i < 50; $i++) {
        $new_data = $new_data . "" . $data[$i];
    }
    return $new_data . "" . "<strong> ...</strong>";
}

$submission_username = $current_user_details["user_username"];

if (isset($_POST["submission_id_name"])) {
    $submission_id_name = test_input($_POST["submission_id_name"]);
    $all_submission = $user_task_object->get_row_using_id_or_name_user($submission_id_name, $submission_username);
} else {
    $all_submission = $user_task_object->get_all_row_user($submission_username);
}
foreach ($all_submission as $key => $value) {
    $submission_id = $all_submission[$key]["submission_id"];
    $submission_task_id = $all_submission[$key]["submission_task_id"];
    $submission_task_title = $all_submission[$key]["submission_task_title"];
    $submission_task_category = $all_submission[$key]["submission_task_category"];
    $submission_code = html_entity_decode($all_submission[$key]["submission_code"]);
    $submission_code_short = shorten($submission_code);
    $submission_verdict = $all_submission[$key]["submission_verdict"];
    $submission_date = $all_submission[$key]["submission_date"];
    $submission_date = date("d/m/Y h:i a", $submission_date);

    $header_file_ar = array("<aio.h>", "<libgen.h>", "<spawn.h>", "<sys/time.h>",
        "<arpa/inet.h>", "<limits.h>", "<stdarg.h>", "<sys/times.h>",
        "<assert.h>", "<locale.h>", "<stdbool.h>", "<sys/types.h>",
        "<complex.h>", "<math.h>", "<stddef.h>", "<sys/uio.h>",
        "<cpio.h>", "<monetary.h>", "<stdint.h>", "<sys/un.h>",
        "<ctype.h>", "<mqueue.h>", "<stdio.h>", "<sys/utsname.h>",
        "<dirent.h>", "<ndbm.h>", "<stdlib.h>", "<sys/wait.h>",
        "<dlfcn.h>", "<net/if.h>", "<string.h>", "<syslog.h>",
        "<errno.h>", "<netdb.h>", "<strings.h>", "<tar.h>",
        "<fcntl.h>", "<netinet/in.h>", "<stropts.h>", "<termios.h>",
        "<fenv.h>", "<netinet/tcp.h>", "<sys/ipc.h>", "<tgmath.h>",
        "<float.h>", "<nl_types.h>", "<sys/mman.h>", "<time.h>",
        "<fmtmsg.h>", "<poll.h>", "<sys/msg.h>", "<trace.h>",
        "<fnmatch.h>", "<pthread.h>", "<sys/resource.h>", "<ulimit.h>",
        "<ftw.h>", "<pwd.h>", "<sys/select.h>", "<unistd.h>",
        "<glob.h>", "<regex.h>", "<sys/sem.h>", "<utime.h>",
        "<grp.h>", "<sched.h>", "<sys/shm.h>", "<utmpx.h>",
        "<iconv.h>", "<search.h>", "<sys/socket.h>", "<wchar.h>",
        "<inttypes.h>", "<semaphore.h>", "<sys/stat.h>", "<wctype.h>",
        "<iso646.h>", "<setjmp.h>", "<sys/statvfs.h>", "<wordexp.h>",
        "<langinfo.h>", "<signal.h>");
    $header_file_html = array();
    foreach ($header_file_ar as $value) {
        $header_file_html[] = htmlspecialchars($value);
    }
    $edit_val = $submission_code;
    for ($i = 0; $i < count($header_file_ar); $i++) {
        $find_str = $header_file_ar[$i];
        $replace_str = $header_file_html[$i];

        $edit_val = str_replace($find_str, $replace_str, $edit_val);
    }


    $view_link = "submission_view.php?submission_id=" . $submission_id;
    $view_div_id = "view_submission_id" . $submission_id;
    $tr_class = '';

    if ($submission_verdict == 'Accepted')
        $tr_class = 'success';
    else if ($submission_verdict == 'Wrong answer')
        $tr_class = 'danger';
    else if ($submission_verdict == 'Compilation error')
        $tr_class = 'warning';


    $ret_str = '<tr class=' . $tr_class . '>';
    $ret_str = $ret_str . "<td>" . $submission_id . "</td>";
    $ret_str = $ret_str . "<td>" . $submission_task_title . ' (ID: ' . $submission_task_id . ")</td>";
    $ret_str = $ret_str . "<td>" . $submission_task_category . "</td>";
    $ret_str = $ret_str . "<td>" . $submission_verdict . "</td>";
    $ret_str = $ret_str . "<td>" . $submission_date . "</td>";

    $ret_str = $ret_str . "<td>";
    //$ret_str = $ret_str . "<pre><code>" . $edit_val . "</code></pre>";
    $ret_str = $ret_str . "<a href = \"#\" class = \"btn btn-primary btn-xs\" data-toggle = \"modal\" data-target = \"#" . $view_div_id . "\"><i class = \"fa fa-folder\"></i> View </a>";
//    $ret_str = $ret_str . '<a href = "' . $view_link . '" class = "btn btn-primary btn-xs"><i class = "fa fa-folder"></i> View </a>';



    $view_div_str = '';
    $view_div_str = $view_div_str . "<div id=\"" . $view_div_id . "\" class = \"modal fade bs-example-modal-lg\" tabindex = \"-1\" role = \"dialog\" aria-hidden = \"true\">";
    $view_div_str = $view_div_str . "<div class = \"modal-dialog modal-lg\">";
    $view_div_str = $view_div_str . "<div class = \"modal-content\">";

    $view_div_str = $view_div_str . "<div class = \"modal-header\">";
    $view_div_str = $view_div_str . "<button type = \"button\" class = \"close\" data-dismiss = \"modal\"><span aria-hidden = \"true\">×</span>";
    $view_div_str = $view_div_str . "</button>";

    $view_div_str = $view_div_str . "<h4 class = \"modal-title\"><strong>Submission ID: " . $submission_id . "<span class=\"pull-right\"><a href=\"compiler_task.php?id=". $submission_task_id ."\">Task: " . $submission_task_title . " (ID: " . $submission_task_id . ") </a></span></strong></h4>";
    $view_div_str = $view_div_str . "</div>";

    $view_div_str = $view_div_str . "<div class = \"modal-body\">";
    $view_div_str = $view_div_str . "<pre><code>" . $edit_val . "</code></pre>";
    $view_div_str = $view_div_str . "</div>";

    $view_div_str = $view_div_str . "<div class = \"modal-footer\">";
    $view_div_str = $view_div_str . "<span class=\"pull-left\"><small><i class = \"fa fa-clock-o\"></i> " . $submission_date . "</small></span>";    
    $view_div_str = $view_div_str . "<button type = \"button\" class = \"btn btn-primary\" data-dismiss = \"modal\">Close</button>";

    $view_div_str = $view_div_str . "</div>";

    $view_div_str = $view_div_str . "</div>";
    $view_div_str = $view_div_str . "</div>";
    $view_div_str = $view_div_str . "</div >";

    $ret_str = $ret_str . " " . $view_div_str;

    $ret_str = $ret_str . "</td>";
    $ret_str = $ret_str . "</tr>";
    echo $ret_str;
}
?>