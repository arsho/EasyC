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

$current_chat_username = $current_user_details["user_username"];
$current_chat_user_photo = $current_user_details["user_photo"];


if (isset($_POST["chat_message"])) {
//    $current_chat_date = '' . date("d/m/Y G.I:", time()) . '';
    $current_chat_date = '' . time() . '';

    $current_chat_message = test_input($_POST["chat_message"]);

    $chat_data = array();
    $chat_data["chat_username"] = $current_chat_username;
    $chat_data["chat_user_photo"] = $current_chat_user_photo;
    $chat_data["chat_date"] = $current_chat_date;
    $chat_data["chat_message"] = $current_chat_message;
    if ($current_chat_message != "" || $current_chat_message != NULL) {
        $ret_val_chat = $chat_object->add_row($chat_data);
    }
}
$all_chat = $chat_object->get_all_row_limit_50();

foreach ($all_chat as $key => $value) {
    $chat_id = $all_chat[$key]["chat_id"];
    $chat_username = $all_chat[$key]["chat_username"];
    $chat_user_link = '<a href="profile.php?user=' . $chat_username . '">' . $chat_username . '</a>';

    $chat_user_photo = $all_chat[$key]["chat_user_photo"];
    $chat_message = html_entity_decode($all_chat[$key]["chat_message"]);

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
    $edit_val = $chat_message;
    for ($i = 0; $i < count($header_file_ar); $i++) {
        $find_str = $header_file_ar[$i];
        $replace_str = $header_file_html[$i];

        $edit_val = str_replace($find_str, $replace_str, $edit_val);
    }

    $chat_message = $edit_val;
    $chat_date = $all_chat[$key]["chat_date"];
    $chat_date = date("d/m/Y h:i:s a", $chat_date);

    $ret_str = '';
    $ret_str = $ret_str . '';
    $ret_str = $ret_str . '';

    //                                        <!-- Single chat starts -->
    $ret_str = $ret_str . '<li class = "media">';

    $ret_str = $ret_str . '<div class = "media-body">';
    $ret_str = $ret_str . '<div class = "media">';
    $ret_str = $ret_str . '<a class = "pull-left" href = "#">';
    $ret_str = $ret_str . '<img class = "img-thumbnail" src = "' . $chat_user_photo . '" />';
    $ret_str = $ret_str . '</a>';
    $ret_str = $ret_str . '<div class = "media-body" >';
    $ret_str = $ret_str . '<div class = "header">';
    $ret_str = $ret_str . '<strong class = "primary-font">' . $chat_user_link . '</strong> <small class = "pull-right text-muted">';
    $ret_str = $ret_str . '<i class = "fa fa-clock-o"></i> ' . $chat_date . '</small>';
    $ret_str = $ret_str . '</div>';
    $ret_str = $ret_str . '' . $chat_message;

    $ret_str = $ret_str . '</div>';
    $ret_str = $ret_str . '</div>';

    $ret_str = $ret_str . '</div>';
    $ret_str = $ret_str . '</li>';
//    <!--Single chat ends -->


    echo $ret_str;
}
?>