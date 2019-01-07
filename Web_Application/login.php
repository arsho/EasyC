<?php require './module/general_information.php'; ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login Page</title>
        <!-- Favicon -->
        <link rel="shorcut icon" href="images/lnc_favicon.ico" />

        <!-- Bootstrap core CSS -->

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/custom_sho.css" rel="stylesheet">
        <link href="css/icheck/flat/green.css" rel="stylesheet">


        <script src="js/jquery.min.js"></script>

        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>

    <body class="login_body">

        <div class="">
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>

            <div id="wrapper">
                <div id="login" class="animate form">
                    <section class="login_content">
                        <form name="login_form" id="login_form" method="post" action="login_check.php">
                            <h1>Login Form</h1>

                            <div id="login_info">
                                <?php if (isset($_GET["invalid"])) { ?>
                                    <div class="alert alert-danger">
                                        <strong>Error!</strong> Username or password is invalid.
                                    </div>
                                <?php } ?>
                                <?php if (isset($_GET["improper"])) { ?>
                                    <div class="alert alert-danger">
                                        <strong>Error!</strong> Login form is not submitted properly.
                                    </div>
                                <?php } ?>
                            </div>                            
                            <div>
                                <input name="login_user_username" id="login_user_username" type="text" class="form-control" placeholder="Username" required="" />
                            </div>
                            <div>
                                <input name="login_user_password" id="login_user_password" type="password" class="form-control" placeholder="Password" required="" />
                            </div>
                            <div>
                                <input name="login_form_submit" id="login_form_submit" type="submit" class="btn btn-dark btn-block submit" value="Login" />
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">

                                <p class="change_link">New to site?
                                    <a href="#toregister" class="to_register"> Create Account </a>
                                </p>
                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <h1><i class="fa fa-code" style="font-size: 26px;"></i> <?php echo $site_title; ?></h1>

                                    <p>©2016 All Rights Reserved. <?php echo $developer_org; ?></p>
                                </div>

                            </div>
                        </form>
                        <!-- form -->
                    </section>
                    <!-- content -->
                </div>
                <div id="register" class="animate form">
                    <section class="login_content">
                        <form id="registration_form" name="registration_form" action="registration_check.php" method="post">
                            <h1>Create Account</h1>
                            <div id="registration_info">
                                <!--                                <div class="alert alert-danger">
                                                                    <strong>Error!</strong> Username already exists.
                                                                </div>
                                                                <div class="alert alert-success">
                                                                    <strong>Success!</strong> Registration successful.
                                                                </div>-->
                            </div>

                            <div>
                                <input pattern="[A-z0-9]+" title="Only alphabets and numbers are allowed" name="user_username" id="user_username" type="text" class="form-control" placeholder="Username" required="required" />
                            </div>
                            <div>
                                <input name="user_email" id="user_email" type="email" class="form-control" placeholder="Email" required="" />
                            </div>
                            <div>
                                <input pattern=".{6,}" title="Password must be at least 6 characters long" name="user_password" id="user_password" type="password" class="form-control" placeholder="Password" required="" />
                            </div>
                            <div id="messages" style="margin-bottom: 10px;font-weight:bold;"></div>
                            <div>
                                <input name="registration_form_submit" id="registration_form_submit" type="submit" class="btn btn-dark btn-block submit" value="Sign Up" />
                            </div>

                            <div class="clearfix"></div>
                            <div class="separator">

                                <p class="change_link">Already a member?
                                    <a href="#tologin" class="to_register"> Log in </a>
                                </p>
                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <h1><i class="fa fa-code" style="font-size: 26px;"></i> <?php echo $site_title; ?></h1>

                                    <p>©2016 All Rights Reserved. <?php echo $developer_org; ?></p>
                                </div>
                            </div>
                        </form>
                        <!-- form -->
                    </section>
                    <!-- content -->
                </div>
            </div>
        </div>
        <script type="text/javascript">

            $(document).ready(function () {

                //Check username availability
                $("#user_username").on("keyup", function () {


                    $user_username = $("#user_username").val();
                    formData = {user_username: $user_username, }; //Array 
                    $.ajax({
                        data: formData,
                        url: 'get_username.php',
                        type: 'POST',
                        success: function (returndata) {
                            $("#registration_info").hide();
                            var res = '';
                            var patt1 = new RegExp("[A-z0-9]*");
                            $check_pattern = patt1.test($user_username);
                            if ($check_pattern == false) {
                                res += '<div class=\"alert alert-danger\">';
                                res += '        <strong> ' + $user_username + ' </strong> is not a valid username. Only alphabets and numbers are allowed.';
                                res += '        </div>';
                                $("#registration_info").show();
                                $("#registration_info").html(res);
                                $("#registration_form_submit").attr("disabled", "disabled");
                            }
                            else if (returndata == "1" && $user_username != "") {
                                res += '<div class=\"alert alert-danger\">';
                                res += '        <strong> ' + $user_username + ' </strong> already exists. Try another username.';
                                res += '        </div>';
                                $("#registration_info").show();
                                $("#registration_info").html(res);
                                $("#registration_form_submit").attr("disabled", "disabled");
                            } else if (returndata == "0" && $user_username != "") {
                                res += '<div class=\"alert alert-success\">';
                                res += '        <strong> ' + $user_username + ' </strong> is available.';
                                res += '        </div>';
                                $("#registration_info").show();
                                $("#registration_info").html(res);
                                $("#registration_form_submit").removeAttr("disabled");
                            }
                        }
                    });
                });
                //                //Program a custom submit function for the form
                //                $("form#registration_form").submit(function (event) {
//
//                    //disable the default form submission
//                    event.preventDefault();
//                    //grab all form data  
//                    var formData = new FormData($(this)[0]);
//                    $.ajax({
//                        url: 'registration_check.php',
//                        type: 'POST',
//                        data: formData,
//                        async: false,
//                        cache: false,
//                        contentType: false,
//                        processData: false,
//                        success: function (returndata) {
//                            $("#registration_info").html(returndata);
//                        }
//                    });
//                    return false;
//                });
            });





        </script>
        <script>
            jQuery(document).ready(function () {
                var options = {
                    onLoad: function () {
                        $('#messages').text('Password Strength');
                    },
                    onKeyUp: function (evt) {
                        $(evt.target).pwstrength("outputErrorList");
                    }
                };
                $('#user_password').pwstrength(options);
            });
        </script>
        <script>
            /*jslint vars: false, browser: true, nomen: true, regexp: true */
            /*global jQuery */

            /*
             * jQuery Password Strength plugin for Twitter Bootstrap
             *
             * Copyright (c) 2008-2013 Tane Piper
             * Copyright (c) 2013 Alejandro Blanco
             * Dual licensed under the MIT and GPL licenses.
             *
             */

            (function ($) {
                "use strict";

                var options = {
                    errors: [],
                    // Options
                    minChar: 6,
                    errorMessages: {
                        password_to_short: "The Password is too short",
                        same_as_username: "Your password cannot be the same as your username"
                    },
                    scores: [17, 26, 40, 50],
                    verdicts: ["Weak", "Normal", "Medium", "Strong", "Very Strong"],
                    showVerdicts: true,
                    raisePower: 1.4,
                    usernameField: "#user_username",
                    onLoad: undefined,
                    onKeyUp: undefined,
                    viewports: {
                        progress: undefined,
                        verdict: undefined,
                        errors: undefined
                    },
                    // Rules stuff
                    ruleScores: {
                        wordNotEmail: -100,
                        wordLength: -100,
                        wordSimilarToUsername: -100,
                        wordLowercase: 1,
                        wordUppercase: 3,
                        wordOneNumber: 3,
                        wordThreeNumbers: 5,
                        wordOneSpecialChar: 3,
                        wordTwoSpecialChar: 5, wordUpperLowerCombo: 2,
                        wordLetterNumberCombo: 2,
                        wordLetterNumberCharCombo: 2
                    },
                    rules: {
                        wordNotEmail: true,
                        wordLength: true,
                        wordSimilarToUsername: true,
                        wordLowercase: true,
                        wordUppercase: true,
                        wordOneNumber: true,
                        wordThreeNumbers: true,
                        wordOneSpecialChar: true,
                        wordTwoSpecialChar: true,
                        wordUpperLowerCombo: true,
                        wordLetterNumberCombo: true,
                        wordLetterNumberCharCombo: true
                    },
                    validationRules: {
                        wordNotEmail: function (options, word, score) {
                            return word.match(/^([\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+\.)*[\w\!\#$\%\&\'\*\+\-\/\=\?\^\`{\|\}\~]+@((((([a-z0-9]{1}[a-z0-9\-]{0,62}[a-z0-9]{1})|[a-z])\.)+[a-z]{2,6})|(\d{1,3}\.){3}\d{1,3}(\:\d{1,5})?)$/i) && score;
                        },
                        wordLength: function (options, word, score) {
                            var wordlen = word.length,
                                    lenScore = Math.pow(wordlen, options.raisePower);
                            if (wordlen < options.minChar) {
                                lenScore = (lenScore + score);
                                options.errors.push(options.errorMessages.password_to_short);
                            }
                            return lenScore;
                        },
                        wordSimilarToUsername: function (options, word, score) {
                            var username = $(options.usernameField).val();
                            if (username && word.toLowerCase().match(username.toLowerCase())) {
                                options.errors.push(options.errorMessages.same_as_username);
                                return score;
                            }
                            return true;
                        },
                        wordLowercase: function (options, word, score) {
                            return word.match(/[a-z]/) && score;
                        },
                        wordUppercase: function (options, word, score) {
                            return word.match(/[A-Z]/) && score;
                        },
                        wordOneNumber: function (options, word, score) {
                            return word.match(/\d+/) && score;
                        },
                        wordThreeNumbers: function (options, word, score) {
                            return word.match(/(.*[0-9].*[0-9].*[0-9])/) && score;
                        },
                        wordOneSpecialChar: function (options, word, score) {
                            return word.match(/.[!,@,#,$,%,\^,&,*,?,_,~]/) && score;
                        },
                        wordTwoSpecialChar: function (options, word, score) {
                            return word.match(/(.*[!,@,#,$,%,\^,&,*,?,_,~].*[!,@,#,$,%,\^,&,*,?,_,~])/) && score;
                        },
                        wordUpperLowerCombo: function (options, word, score) {
                            return word.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/) && score;
                        },
                        wordLetterNumberCombo: function (options, word, score) {
                            return word.match(/([a-zA-Z])/) && word.match(/([0-9])/) && score;
                        },
                        wordLetterNumberCharCombo: function (options, word, score) {
                            return word.match(/([a-zA-Z0-9].*[!,@,#,$,%,\^,&,*,?,_,~])|([!,@,#,$,%,\^,&,*,?,_,~].*[a-zA-Z0-9])/) && score;
                        }
                    }
                },
                setProgressBar = function ($el, score) {
                    var options = $el.data("pwstrength"),
                            progressbar = options.progressbar,
                            $verdict;

                    if (options.showVerdicts) {
                        if (options.viewports.verdict) {
                            $verdict = $(options.viewports.verdict).find(".password-verdict");
                        } else {
                            $verdict = $el.parent().find(".password-verdict");
                            if ($verdict.length === 0) {
                                $verdict = $('<span class="password-verdict"></span>');
                                $verdict.insertAfter($el);
                            }
                        }
                    }
                    if (score == -99) {
                        $(".bar").addClass("progress-bar-danger").removeClass("progress-bar-warning").removeClass("progress-bar-success").removeClass("progress-bar-info");
                        $(".bar").attr("style", "width: 0%;");
                        if (options.showVerdicts) {
                            $verdict.text(options.verdicts[0]);
                        }
                    }
                    else if (score < options.scores[0]) {
                        $(".bar").addClass("progress-bar-danger").removeClass("progress-bar-warning").removeClass("progress-bar-success").removeClass("progress-bar-info");
                        $(".bar").attr("style", "width: 5%;");
                        if (options.showVerdicts) {
                            $verdict.text(options.verdicts[0]);
                        }
                    } else if (score >= options.scores[0] && score < options.scores[1]) {
                        $(".bar").addClass("progress-bar-info").removeClass("progress-bar-danger").removeClass("progress-bar-warning").removeClass("progress-bar-success");
                        //progressbar.find(".bar").css("width", "25%");
                        $(".bar").attr("style", "width: 55%;");
                        if (options.showVerdicts) {
                            $verdict.text(options.verdicts[1]);
                        }
                    } else if (score >= options.scores[1] && score < options.scores[2]) {
                        $(".bar").addClass("progress-bar-warning").removeClass("progress-bar-danger").removeClass("progress-bar-success").removeClass("progress-bar-info");
                        //progressbar.find(".bar").attr("style", "50%");
                        $(".bar").attr("style", "width: 75%;");
                        if (options.showVerdicts) {
                            $verdict.text(options.verdicts[2]);
                        }
                    } 
//                    else if (score >= options.scores[2] && score < options.scores[3]) {
//                        $(".bar").addClass("progress-bar-warning").removeClass("progress-bar-danger").removeClass("progress-bar-success");
//                        //progressbar.find(".bar").css("width", "75%");
//                        $(".bar").attr("style", "width: 75%;");
//                        if (options.showVerdicts) {
//                            $verdict.text(options.verdicts[3]);
//                        }
//                    } 
                    else if (score >= options.scores[2]) {
                        $(".bar").addClass("progress-bar-success").removeClass("progress-bar-warning").removeClass("progress-bar-danger");
                        //progressbar.find(".bar").css("width", "100%");
                        $(".bar").attr("style", "width: 100%;");
                        if (options.showVerdicts) {
                            $verdict.text(options.verdicts[3]);
                        }
                    }
                },
                        calculateScore = function ($el) {
                            var self = this,
                                    word = $el.val(),
                                    totalScore = 0,
                                    options = $el.data("pwstrength");
                            $.each(options.rules, function (rule, active) {
                                if (active === true) {
                                    var score = options.ruleScores[rule],
                                            result = options.validationRules[rule](options, word, score);
                                    if (result) {
                                        totalScore += result;
                                    }
                                }
                            });
                            setProgressBar($el, totalScore);
                            return totalScore;
                        },
                        progressWidget = function () {
                            return '<div class="progress" style="margin-bottom: 0px;"><div class="bar progress-bar"></div></div>';
                        },
                        methods = {init: function (settings) {
                                var self = this,
                                        allOptions = $.extend(options, settings);

                                return this.each(function (idx, el) {
                                    var $el = $(el),
                                            progressbar,
                                            verdict;

                                    $el.data("pwstrength", allOptions);

                                    $el.on("keyup", function (event) {
                                        var options = $el.data("pwstrength");
                                        options.errors = [];
                                        calculateScore.call(self, $el);
                                        if ($.isFunction(options.onKeyUp)) {
                                            options.onKeyUp(event);
                                        }
                                    });

                                    progressbar = $(progressWidget());
                                    if (allOptions.viewports.progress) {
                                        $(allOptions.viewports.progress).append(progressbar);
                                    } else {
                                        progressbar.insertAfter($el);
                                    }
                                    progressbar.find(".bar").css("width", "0%");
                                    $el.data("pwstrength").progressbar = progressbar;

                                    if (allOptions.showVerdicts) {
                                        verdict = $('<span class="password-verdict">' + allOptions.verdicts[0] + '</span>');
                                        if (allOptions.viewports.verdict) {
                                            $(allOptions.viewports.verdict).append(verdict);
                                        } else {
                                            verdict.insertAfter($el);
                                        }
                                    }

                                    if ($.isFunction(allOptions.onLoad)) {
                                        allOptions.onLoad();
                                    }
                                });
                            },
                            destroy: function () {
                                this.each(function (idx, el) {
                                    var $el = $(el);
                                    $el.parent().find("span.password-verdict").remove();
                                    $el.parent().find("div.progress").remove();
                                    $el.parent().find("ul.error-list").remove();
                                    $el.removeData("pwstrength");
                                });
                            },
                            forceUpdate: function () {
                                var self = this;
                                this.each(function (idx, el) {
                                    var $el = $(el),
                                            options = $el.data("pwstrength");
                                    options.errors = [];
                                    calculateScore.call(self, $el);
                                });
                            },
                            outputErrorList: function () {
                                this.each(function (idx, el) {
                                    var output = '<ul class="error-list">',
                                            $el = $(el),
                                            errors = $el.data("pwstrength").errors,
                                            viewports = $el.data("pwstrength").viewports,
                                            verdict;
                                    $el.parent().find("ul.error-list").remove();

                                    if (errors.length > 0) {
                                        $.each(errors, function (i, item) {
                                            output += '<li>' + item + '</li>';
                                        });
                                        output += '</ul>';
                                        if (viewports.errors) {
                                            $(viewports.errors).html(output);
                                        } else {
                                            output = $(output);
                                            verdict = $el.parent().find("span.password-verdict");
                                            if (verdict.length > 0) {
                                                el = verdict;
                                            }
                                            output.insertAfter(el);
                                        }
                                    }
                                });
                            },
                            addRule: function (name, method, score, active) {
                                this.each(function (idx, el) {
                                    var options = $(el).data("pwstrength");
                                    options.rules[name] = active;
                                    options.ruleScores[name] = score;
                                    options.validationRules[name] = method;
                                });
                            },
                            changeScore: function (rule, score) {
                                this.each(function (idx, el) {
                                    $(el).data("pwstrength").ruleScores[rule] = score;
                                });
                            },
                            ruleActive: function (rule, active) {
                                this.each(function (idx, el) {
                                    $(el).data("pwstrength").rules[rule] = active;
                                });
                            }};
                $.fn.pwstrength = function (method) {
                    var result;
                    if (methods[method]) {
                        result = methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
                    } else if (typeof method === "object" || !method) {
                        result = methods.init.apply(this, arguments);
                    } else {
                        $.error("Method " + method + " does not exist on jQuery.pwstrength");
                    }
                    return result;
                };
            }(jQuery));
        </script>
    </body>
</html>