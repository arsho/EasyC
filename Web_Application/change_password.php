<?php require './module/session_required.php'; ?>
<?php require './module/general_information.php'; ?>
<?php require './module/header.php'; ?>
<?php require './module/sidebar.php'; ?>
<?php require './module/topmenu.php'; ?>
<?php $page_title = 'Change Password'; ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a class="collapse-link" data-toggle="tooltip" data-placement="top" title="Click to toggle the window">
                            <h2>Change Current Password</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="pull-right"><i class="fa fa-chevron-up"></i>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                    <div class="x_content">
                        <div id="message">
                            <?php
                            if (isset($_GET["error"]) && $_GET["error"] == "1") {
                                echo '<div class="alert alert-danger"><strong>Error! </strong>Old password is incorrect. Please try again.</div>';
                            } else if (isset($_GET["error"]) && $_GET["error"] == "0") {
                                echo '<div class="alert alert-success"><strong>Congratulation! </strong>Old password is changed successfully.</div>';                                
                            }
                            ?>
                        </div>
                        <form name="change_password_form" class="form-horizontal form-label-left" method="post" action="change_password_check.php">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Password<span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="user_password_old" id="user_password_old" type="password" class="form-control" placeholder="Enter current password" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">New Password<span class="required">*</span> </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input name="user_password" id="user_password" type="password" class="form-control" placeholder="Enter new password" required="required" pattern=".{6,}" title="Password must be at least 6 characters long" >
                                </div>
                            </div>
                            <div id="messages" style="margin-bottom: 10px;font-weight:bold;"></div>

                            <input name="user_username" id="user_username" type="hidden" class="form-control" value="<?php echo $current_user_details["user_username"]; ?>" required="required">


                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">                                    
                                    <button type="reset" class="btn btn-primary">Clear</button>
                                    <button name="change_password_form_submit" type="submit" class="btn btn-success">Change password</button>
                                </div>
                            </div>

                        </form>
                    </div><!--./x-content-->
                </div><!--./x-panel-->
            </div><!--./col-md-12-->
        </div><!--./row-->
    </div><!--./--> 
    <?php require './module/footer.php'; ?>
    <!--submission_view ends-->

    <script>
        jQuery(document).ready(function () {
            var options = {
                onLoad: function () {
                    // $('#messages').text('Password Strength');
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
                usernameField: "#username",
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