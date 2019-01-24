<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>TEST - Welcome to OurFamilyConnections</title>

        <!-- Font Awesome -->
        <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" />

        <!-- Bootstrap -->
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous" />-->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    -->

        <!-- MDBootstrap -->
        <link href="css/mdb.min.css" rel="stylesheet" />

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <!--<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet" />-->

        <!-- Custom styles for this template -->
        <!--    <link href="css/signin.css" rel="stylesheet">-->
        <!-- Custom styles for this template -->
        <!--<link href="css/jumbotron.css" rel="stylesheet" />-->
        <!-- Extended styles for this page -->
        <link href="css/ofc_css_style.css" rel="stylesheet" />
        <link href="css/ofc_welcome_style.css" rel="stylesheet" />

        <style type="text/css">/* Chart.js */
            @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
        </style>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>

<body>

    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark scrolling-navbar">
            <div class="container">

                <a class="navbar-brand" href="ofc_welcome_new.php">
                    <strong>OurFamilyConnections</strong>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                    <!--                <div class="collapse navbar-collapse" id="navbar">-->
                    <?php
                        if(!$_SESSION['logged in']) {
                            session_destroy();
                            //echo '<form class="navbar-form navbar-right" name="form1" method="post" action="ofc_checklogin2.php"';
                            echo '<form class="form-inline" name="form1" method="post" action="ofc_checklogin2.php">';
                            echo '<ul class="navbar-nav">';
                            //echo '<ul class="nav">';
                            echo '<li class="nav-item px-2 mt-2 active">';
                           //echo '<div class="form-group">';
                            echo '<input type="text" placeholder="username" name="myusername" class="form-control" required="TRUE" autofocus="TRUE" />';
                            echo '</li>';
                            echo '<li class="nav-item px-2 mt-2">';
                            echo '<input type="password" placeholder="password" name="mypassword" class="form-control" required="TRUE" />';
                            echo '</li>';
            //                echo '<div class="btn-group mr-4" role="group" aria-label="First group">';
                            echo '<li class="nav-item">';
                            echo '<button type="submit" class="btn btn-success">Sign-in</button>';
                            echo '</li>';
            //                echo '</div>';
            //                echo '<div class="btn-group pad-left">';
            //                echo '<div class="btn-group mr-4" role="group" aria-label="Second group">';
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link btn btn-primary" href="ofc_register.php" role="button">Register</a>';
                            echo '</li>';
            //                echo '</div>';
            //                echo '<button type="button" class="btn btn-danger margin-left">Forgot Password</button>';
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link btn btn-danger" href="ofc_recover2.php" role="button">Forgot Password</a>';
            //                echo '</div>';
                            echo '</li>';
                            echo '</ul>';
                            echo '</form>';
                        }
                        else
                        {
                            $homeurl = "location:ofc_home.php";
                            header($homeurl);

                        }
                    ?>
                </div><!--/.navbar-collapse -->



            </div>
        </nav>
        <!-- Navbar -->
        <!-- Full Page Intro -->
        <!--<div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/91.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">-->
        <div class="view" style="background-image: url('../images/master_welcome.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <!-- Mask & flexbox options-->
            <div class="mask rgba-gradient align-items-center">
                <!-- Content -->
                <div class="container">
                    <!--Grid row-->
                    <div class="row mt-5">
                        <!--Grid column-->
                        <div class="col-lg-6 mb-4 mt-5">
                            <!--Form-->
                            <div class="card wow fadeInRight" data-wow-delay="0.3s">
                                <div class="card-body">
                                    <!--Header-->
                                    <img src="images/ourfamilyconnections4.png" class="img-fluid max-width: 100%" height="auto" alt="" />
                                    <div class="text-center">
                                        <h3 class="white-text">
                                            <i class="white-text"></i> connecting friends and family
                                        </h3>
                                        <hr class="hr-bold" />
                                        <h6 class="white-text">
                                            WELCOME!
                                        </h6>

                                    </div>
                                    <!--Body-->
                                </div>
                            </div>
                            <!--/.Form-->
                        </div>
                        <!--Grid column-->
                        <!--Grid column-->
                        <div class="col-lg-6 mb-5 mt-lg-5 mt-5 white-text text-center">
                            <!--<div class="col-md-6 mb-5 mt-md-5 mt-5 white-text text-center text-sm-left">-->
                                <h2 class="h1-responsive wow fadeInLeft" data-wow-delay="0.3s">Tap or click the menu selector above to sign-in with your username and password above!</h2>
                                <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s" />
                                <h6 class="mb-3 wow fadeInLeft" data-wow-delay="0.3s">
                                    If you haven't yet registered, use the <span><button type="button" class="btn btn-primary">REGISTER</button></span> button above and submit your information to our administrators.'
                                </h6>
                                <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s" />
                                <h6 class="mb-3 wow fadeInLeft" data-wow-delay="0.3s">
                                    Don't remember your password? Click the <span><button type="button" class="btn btn-danger">FORGOT PASSWORD</button></span> button above to reset it.'
                                </h6>
                                <a class="btn btn-outline-white wow fadeInLeft mt-5" data-wow-delay="0.3s">Contact Us</a>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </div>
                <!-- Content -->
            </div>
            <!-- Mask & flexbox options-->
        </div>
        <!-- Full Page Intro -->
    </header>

    <!-- Main navigation -->
    <!--Main Layout-->
    <main>
        <div class="container">
            <!--Grid row-->
            <div class="row py-5">
                <!--Grid column-->
                <div class="col-md-12 text-center">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
    </main>
    <!--Main Layout-->
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script>
        new WOW().init();
    </script>

</body>
</html>