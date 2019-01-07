<!--header starts--> 

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $site_title; ?> </title>

        <!-- Bootstrap core CSS -->

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">
        <link href="css/flags/flags.css" rel="stylesheet">
        <!-- Custom styling plus plugins -->
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/custom_sho.css" rel="stylesheet">

        <link href="css/icheck/flat/green.css" rel="stylesheet">

        <!-- Favicon -->
        <link rel="shorcut icon" href="images/lnc_favicon.ico" />

        <script src="js/jquery.min.js"></script>

        <link rel="stylesheet" href="css/code/default.css">
        <link rel="stylesheet" href="css/code/github.css">
        <!--        <link rel="stylesheet" href="css/code/vs.css">-->
        <!--        <link rel="stylesheet" href="css/code/magula.css">-->
<!--        <script src="js/code/highlight.pack.js"></script>
        <script>
            $(document).ready(function () {
                hljs.configure({'languages': ['c']});
                hljs.initHighlightingOnLoad();
            });
        </script>-->

<!--        <script language="javascript" type="text/javascript" src="edit_area/edit_area_full.js"></script>
        <script language="javascript" type="text/javascript">
            editAreaLoader.init({
                id: "live_practice_text"		// textarea id
                , syntax: "c"			// syntax to be uses for highgliting
                , start_highlight: true		// to display with highlight mode on start-up
            });
        </script>-->


        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        <script>

            function toggleFullScreen() {
                if ((document.fullScreenElement && document.fullScreenElement !== null) ||
                        (!document.mozFullScreen && !document.webkitIsFullScreen)) {
                    if (document.documentElement.requestFullScreen) {
                        document.documentElement.requestFullScreen();
                    } else if (document.documentElement.mozRequestFullScreen) {
                        document.documentElement.mozRequestFullScreen();
                    } else if (document.documentElement.webkitRequestFullScreen) {
                        document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
                    }
                } else {
                    if (document.cancelFullScreen) {
                        document.cancelFullScreen();
                    } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if (document.webkitCancelFullScreen) {
                        document.webkitCancelFullScreen();
                    }
                }
            }
        </script>
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <!--header ends--> 