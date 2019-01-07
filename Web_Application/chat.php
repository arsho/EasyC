<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>
<?php $page_title = 'Online Chat Room'; ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <a class="collapse-link" data-toggle="tooltip" data-placement="top" title="Toggle Chat Window">
                        <div class="x_title">
                            <h2><?php echo $page_title; ?></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="pull-right"><i class="fa fa-chevron-up"></i>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <div class="x_content">

                        <div class="row">

                            <div class="panel panel-info chat_sho">
                                <div class="panel-heading">
                                    RECENT CHAT HISTORY
                                </div>
                                <div class="panel-body">
                                    <ul class="media-list" id="show_chat">
                                        <!--                                         Single chat starts 
                                                                                <li class="media">
                                        
                                                                                    <div class="media-body">
                                                                                        class="media-object img-circle profile_thumb"
                                                                                        <div class="media">
                                                                                            <a class="pull-left" href="#">
                                                                                                <img class="img-thumbnail" src="images/user.png" />
                                                                                            </a>
                                                                                            <div class="media-body" >
                                                                                                <div class="header">
                                                                                                    <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                                                                                        <span class="glyphicon glyphicon-time"></span> 14 mins ago</small>
                                                                                                </div>
                                                                                                Donec sit amet ligula enim. Duis vel condimentum massa.
                                        
                                                                                                Donec sit amet ligula enim. Duis vel condimentum massa.Donec sit amet ligula enim.
                                                                                                Duis vel condimentum massa.
                                                                                                Donec sit amet ligula enim. Duis vel condimentum massa.
                                                                                            </div>
                                                                                        </div>
                                        
                                                                                    </div>
                                                                                </li>
                                                                                 Single chat ends -->

                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <div class="input-group">
                                        <textarea placeholder="Press CTRL+Enter to send the message" id="chat_message" class="form-control"></textarea>
                                        <div id="error_message"></div>
                                        <span class="input-group-btn">
                                            <button id="send_message_btn" class="btn btn-info" type="button">SEND</button>
                                        </span>
                                    </div>
                                </div>
                            </div>


                        </div>



                    </div> <!-- ./x-content -->
                </div> <!-- ./x-panel -->
            </div> <!-- ./col-md12 --> 
        </div> <!-- ./row -->
    </div> <!-- ./div -->

    <script>
        $(document).ready(function () {

            function goToBottom(view) {
                var div = document.getElementById(view);
                div.scrollTop = div.scrollHeight - div.clientHeight;
            }

            function init() {
                $.ajax({
                    type: "POST",
                    url: "chat_get_view.php",
                    timeout: 1000,
                    success: function (data) {
                        $("#show_chat").html(data);
                        goToBottom("show_chat");
                    },
                    error: function (error) {
                        $("#show_chat").html(data);
                    }
                });
                setTimeout(init, 2000);
            }
            init();
            $("#chat_message").on("keyup", function () {
                $abusive_words = ["4r5e", "5h1t", "5hit", "a55", "anal", "anus", "ar5e", "arrse", "arse", "ass", "ass-fucker", "asses", "assfucker", "assfukka", "asshole", "assholes", "asswhole", "a_s_s", "b!tch", "b00bs", "b17ch", "b1tch", "ballbag", "ballsack", "bastard", "beastial", "beastiality", "bellend", "bestial", "bestiality", "bi+ch", "biatch", "bitch", "bitcher", "bitchers", "bitches", "bitchin", "bitching", "bloody", "blow job", "blowjob", "blowjobs", "boiolas", "bollock", "bollok", "boner", "boob", "boobs", "booobs", "boooobs", "booooobs", "booooooobs", "breasts", "buceta", "bugger", "bum", "bunny fucker", "butt", "butthole", "buttmuch", "buttplug", "c0ck", "c0cksucker", "carpet muncher", "cawk", "chink", "cipa", "cl1t", "clit", "clitoris", "clits", "cnut", "cock", "cock-sucker", "cockface", "cockhead", "cockmunch", "cockmuncher", "cocks", "cocksuck", "cocksucked", "cocksucker", "cocksucking", "cocksucks", "cocksuka", "cocksukka", "cok", "cokmuncher", "coksucka", "coon", "cox", "crap", "cum", "cummer", "cumming", "cums", "cumshot", "cunilingus", "cunillingus", "cunnilingus", "cunt", "cuntlick", "cuntlicker", "cuntlicking", "cunts", "cyalis", "cyberfuc", "cyberfuck", "cyberfucked", "cyberfucker", "cyberfuckers", "cyberfucking", "d1ck", "damn", "dick", "dickhead", "dildo", "dildos", "dink", "dinks", "dirsa", "dlck", "dog-fucker", "doggin", "dogging", "donkeyribber", "doosh", "duche", "dyke", "ejaculate", "ejaculated", "ejaculates", "ejaculating", "ejaculatings", "ejaculation", "ejakulate", "f u c k", "f u c k e r", "f4nny", "fag", "fagging", "faggitt", "faggot", "faggs", "fagot", "fagots", "fags", "fanny", "fannyflaps", "fannyfucker", "fanyy", "fatass", "fcuk", "fcuker", "fcuking", "feck", "fecker", "felching", "fellate", "fellatio", "fingerfuck", "fingerfucked", "fingerfucker", "fingerfuckers", "fingerfucking", "fingerfucks", "fistfuck", "fistfucked", "fistfucker", "fistfuckers", "fistfucking", "fistfuckings", "fistfucks", "flange", "fook", "fooker", "fuck", "fucka", "fucked", "fucker", "fuckers", "fuckhead", "fuckheads", "fuckin", "fucking", "fuckings", "fuckingshitmotherfucker", "fuckme", "fucks", "fuckwhit", "fuckwit", "fudge packer", "fudgepacker", "fuk", "fuker", "fukker", "fukkin", "fuks", "fukwhit", "fukwit", "fux", "fux0r", "f_u_c_k", "gangbang", "gangbanged", "gangbangs", "gaylord", "gaysex", "goatse", "god-dam", "god-damned", "goddamn", "goddamned", "hardcoresex", "heshe", "hoar", "hoare", "hoer", "homo", "hore", "horniest", "horny", "hotsex", "jack-off", "jackoff", "jap", "jerk-off", "jism", "jiz", "jizm", "jizz", "kawk", "knob", "knobead", "knobed", "knobend", "knobhead", "knobjocky", "knobjokey", "kock", "kondum", "kondums", "kum", "kummer", "kumming", "kums", "kunilingus", "l3i+ch", "l3itch", "labia", "lust", "lusting", "m0f0", "m0fo", "m45terbate", "ma5terb8", "ma5terbate", "masochist", "master-bate", "masterb8", "masterbat*", "masterbat3", "masterbate", "masterbation", "masterbations", "masturbate", "mo-fo", "mof0", "mofo", "mothafuck", "mothafucka", "mothafuckas", "mothafuckaz", "mothafucked", "mothafucker", "mothafuckers", "mothafuckin", "mothafucking", "mothafuckings", "mothafucks", "mother fucker", "motherfuck", "motherfucked", "motherfucker", "motherfuckers", "motherfuckin", "motherfucking", "motherfuckings", "motherfuckka", "motherfucks", "muff", "mutha", "muthafecker", "muthafuckker", "muther", "mutherfucker", "n1gga", "n1gger", "nazi", "nigg3r", "nigg4h", "nigga", "niggah", "niggas", "niggaz", "nigger", "niggers", "nob", "nob jokey", "nobhead", "nobjocky", "nobjokey", "numbnuts", "nutsack", "orgasim", "orgasims", "orgasm", "orgasms", "p0rn", "pawn", "pecker", "penis", "penisfucker", "phonesex", "phuck", "phuk", "phuked", "phuking", "phukked", "phukking", "phuks", "phuq", "pigfucker", "pimpis", "piss", "pissed", "pisser", "pissers", "pisses", "pissflaps", "pissin", "pissing", "pissoff", "poop", "porn", "porno", "pornography", "pornos", "prick", "pricks", "pron", "pube", "pusse", "pussi", "pussies", "pussy", "pussys", "rectum", "retard", "rimjaw", "rimming", "s hit", "s.o.b.", "sadist", "schlong", "screwing", "scroat", "scrote", "scrotum", "semen", "sex", "sh!+", "sh!t", "sh1t", "shag", "shagger", "shaggin", "shagging", "shemale", "shi+", "shit", "shitdick", "shite", "shited", "shitey", "shitfuck", "shitfull", "shithead", "shiting", "shitings", "shits", "shitted", "shitter", "shitters", "shitting", "shittings", "shitty", "skank", "slut", "sluts", "smegma", "smut", "snatch", "son-of-a-bitch", "spac", "spunk", "suck", "s_h_i_t", "t1tt1e5", "t1tties", "teets", "teez", "testical", "testicle", "tit", "titfuck", "tits", "titt", "tittie5", "tittiefucker", "titties", "tittyfuck", "tittywank", "titwank", "tosser", "turd", "tw4t", "twat", "twathead", "twatty", "twunt", "twunter", "v14gra", "v1gra", "vagina", "viagra", "vulva", "w00se", "wang", "wank", "wanker", "wanky", "whoar", "whore", "willies", "willy", "xrated", "xxx"];
                $chat_message = $("#chat_message").val();
                $abusive_words_len = $abusive_words.length;
                $check_val = 1;
                $used_abusive_words_ar = [];
                for ($i = 0; $i < $abusive_words_len; $i++) {
                    $words = $abusive_words[$i];
                    if ($chat_message.indexOf($words) !== -1) {
                        $check_val = 0;
                        $used_abusive_words_ar.push($words);
                    }
                }
                if ($check_val == 0) {
                    $error_str = '<div class="alert alert-danger fade in">';
                    $modified_chat_message = $chat_message;
                    for ($i = 0; $i < $used_abusive_words_ar.length; $i++) {
                        $current_abusive_word = $used_abusive_words_ar[$i];
                        $word_start = $modified_chat_message.indexOf($current_abusive_word);
                        $word_end = $word_start + $current_abusive_word.length;
                        if ($word_start == -1 || $word_end > $modified_chat_message.length)
                            continue;
                        $new_message = '';
                        for ($j = 0; $j < $word_start; $j++) {
                            $new_message += $modified_chat_message[$j];
                        }
                        $new_message += '<span class="label label-danger">' + $used_abusive_words_ar[$i] + '</span>';
                        for ($j = $word_end; $j < $modified_chat_message.length; $j++) {
                            $new_message += $modified_chat_message[$j];
                        }
                        $modified_chat_message = $new_message;
                    }
                    $error_str += '<strong><?php echo $site_title; ?> does not allow abusive words in chat. Remove the marked words to send the message.</strong>';
                    $error_str += '<div class="text-muted well well-sm no-shadow" style="margin-bottom: 0px;">' + $modified_chat_message + '</div>';
                    $error_str += '</div>';
                    $("#error_message").html($error_str);
                    $("#send_message_btn").attr("disabled", "disabled");
                }
                else {
                    $("#error_message").html("");
                    $("#send_message_btn").removeAttr('disabled');

                }

            });

            $('#chat_message').keydown(function (e) {

                if (e.ctrlKey && e.keyCode == 13) {
                    $chat_message = $("#chat_message").val();
                    $("#chat_message").val("");

                    $.ajax({
                        type: "POST",
                        url: "chat_get_view.php",
                        timeout: 1000,
                        data: {chat_message: $chat_message, },
                        success: function (data) {
                            $("#show_chat").html(data);
                            goToBottom("show_chat");
                        },
                        error: function (error) {
                            $("#show_chat").html(data);
                        }
                    });
                }
            });

            $("#send_message_btn").on("click", function () {

                $chat_message = $("#chat_message").val();
                $("#chat_message").val("");

                $.ajax({
                    type: "POST",
                    url: "chat_get_view.php",
                    timeout: 1000,
                    data: {chat_message: $chat_message, },
                    success: function (data) {
                        $("#show_chat").html(data);
                        goToBottom("show_chat");
                    },
                    error: function (error) {
                        $("#show_chat").html(data);
                    }
                });
            });
        });
    </script>    

    <?php require './module/footer.php'; ?>
    <!-- page content ends-->

