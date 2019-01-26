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
        <nav class="navbar navbar-expand-sm fixed-top navbar-dark scrolling-navbar">
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
                            //echo '<ul class="navbar-nav">';
                            //echo '<li class="nav-item">';
                            //echo '<a class="nav-link btn btn-primary" href="ofc_register.php" role="button">Register</a>';
                            //echo '</li>';
                            //echo '<li class="nav-item">';
                            //echo '<a class="nav-link btn btn-danger" href="ofc_recover2.php" role="button">Forgot Password</a>';
                            //echo '</li>';
                            //echo '<li class="nav-item">';
                            //echo '<a class="nav-link btn btn-light" href="#" role="button">About Us</a>';
                            //echo '</li>';
                            //echo '</ul>';
                            //echo '<ul class="navbar-nav">';
                            //echo '<li class="nav-item">';
                            //echo '<a class="nav-link btn btn-primary" href="ofc_register.php" role="button">Register</a>';
                            //echo '</li>';
                            //echo '<li class="nav-item">';
                            //echo '<a class="nav-link btn btn-danger" href="ofc_recover2.php" role="button">Forgot Password</a>';
                            //echo '</li>';
                            //echo '<span class="nav-item">';
                            //echo '<span class="nav-link btn btn-light"><a href="#" role="button">About Us</a>';
                            //echo '</span>';
                            ////echo '</ul>';
                            //echo '<div class="navbar-nav">';
                            //echo '<div class="navbar-item">';
                            //echo '<div class="d-flex justify-content-end">';
                            //echo '<div class="p-2 white-text float-right">Flex item1</div>';
                            //echo '</div>';
                            //echo '</div>';
                            //echo '</div>';
                            echo '<ul class="navbar-nav mr-auto">';
                            //echo '<li class="nav-item active">';
                            //echo '<a class="nav-link" href="#">';
                            //echo '<span class="sr-only">(current)</span>';
                            //echo '</a>';
                            //echo '</li>';
                            echo '</ul>';
                            //echo '<span class="navbar-text white-text">';
                            echo '<span class="nav-link">';
                            //echo 'Navbar text with an inline element';
                            echo '<a class="btn btn-light" href="#" role="button">About Us</a>';
                            echo '</span>';

                        }
                        else
                        {
                            $homeurl = "location:ofc_home.php";
                            header($homeurl);
                        }
                    ?>
                </div><!--/.navbar-collapse -->
            </div><!--container-->
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
                        <!--Grid column-->
                        <div class="col-lg-6 mb-5 mt-lg-5 mt-5 white-text">
                            <!--Form-->
                            <div class="card wow fadeInLeft" data-wow-delay="0.3s">
                            <img src="images/ourfamilyconnections4.png" class="card-img-top max-width: 100%" alt="..." />
                                <div class="card-body text-center">
                                    <!--Header-->
                                    <!--<form class="form-inline" name="form1" method="post" action="ofc_checklogin2.php">-->
                                    <form name="form1" method="post" action="ofc_checklogin2.php">
                                        <div class="text-center">
                                            <h2 class="white-text">
                                                <i class="white-text"></i> Please sign in to access our site
                                            </h2>
                                        </div><!--text-center-->
                                        <div class="md-form">
                                            <i class="fas white-text active"></i>
                                            <input type="text" id="form_user" name="myusername" class="white-text form-control" />
                                            <label for="form_user" class="active">username</label>
                                        </div><!--md-form-->
                                        <div class="md-form">
                                            <i class="fas white-text active"></i>
                                            <input type="password" id="form_pass" name="mypassword" class="white-text form-control" />
                                            <label for="form_pass" class="active">password</label>
                                        </div><!--md-form-->
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-success">Sign-in</button>
                                        </div><!--text-center-->
                                        <!--btn-->
                                        <div>
                                            <span>
                                                <a class="btn btn-primary" href="ofc_register.php" role="button">Register</a>
                                                <a class="btn btn-danger" href="ofc_recover2.php" role="button">Forgot Password</a>
                                            </span>
                                            <h6 class="text-center white-text">
                                                If you have not yet registered, click on the REGISTER button above, and fill out your information on the form
                                            </h6>
                                            <h6 class="text-center white-text">
                                                If you forgot your password, click on the FORGOT PASSWORD button above to be sent a temporary password to your email address on file
                                            </h6>
                                        </div><!--btn-->
                                    </form>
                                </div><!--card-body-->
                            </div><!--card-->
                            <!--/.Form-->
                            <!--<div class="col-md-6 mb-5 mt-md-5 mt-5 white-text text-center text-sm-left">-->
                            <!--<h2 class="h1-responsive wow fadeInLeft" data-wow-delay="0.3s">Tap or click the menu selector above to sign-in with your username and password above!</h2>-->
                            <!--<hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s" />
                                <h6 class="mb-3 wow fadeInLeft text-left" data-wow-delay="0.3s">
                                    If you haven't yet registered, use the <span><button type="button" class="btn btn-primary">REGISTER</button></span> button above and submit your information to our administrators.'
                                </h6>
                                <h6 class="mb-3 wow fadeInLeft" data-wow-delay="0.3s">
                                    Don't remember your password? Click the <span><button type="button" class="btn btn-danger">FORGOT PASSWORD</button></span> button above to reset it.'
                                </h6>-->
                        </div><!--Grid column-->
                        <div class="col-lg-6 mb-4 mt-5">
                            <!--Form-->
                            <div class="card wow fadeInRight" data-wow-delay="0.3s">
                                <div class="card-body">
                                    <!--Header-->
                                    <div class="text-center">
                                        <h3 class="white-text">
                                            <i class="white-text"></i> Welcome to the new Our Family Connections!
                                        </h3>
                                    </div><!--text-center-->
                                    <div class="text-left">
                                        <h4 class="white-text">
                                            <i class="white-text"></i> Now enabled for your mobile device, new features include
                                            <ul>
                                                <li>
                                                    Easy-to-navigate dropdown menus (when in mobile view, tap the 3-bars at the top of the screen)
                                                </li>
                                                <li>
                                                    Works for all major mobile devices, large or small
                                                </li>
                                                <li>
                                                    Rotating your device will expose more information - especially on small (narrow) devices
                                                </li>
                                                <li>
                                                    Same rich experience regardless of whether using your computer or mobile device
                                                </li>
                                            </ul>
                                        </h4>
                                    </div><!--text-center-->
                                    <!--Body-->
                                </div><!--card-body-->
                            </div><!--card-->
                            <!--/.Form-->
                        </div><!--Grid column-->
                    </div><!--row-->
                </div><!--container-->
            </div><!-- Mask & flexbox options-->
        </div><!--view-->
            
    </header>

    <!-- Main navigation -->
    <!--Main Layout-->
    <main>
        <!--<div class="container">
            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body bg-light center-block">
                            <h3 class="card-title">Connecting Family and Friends</h3>
                            <p class="card-text">"...You shall love the Lord your God with all your heart and with all your soul and with all your mind. And... you shall love your neighbor as yourself." Matt 22:36-40 (ESV)</p>
                            <p class="card-text">"...Love one another: just as I have loved you." John 13:34-35 (ESV)</p>
                            <p class="card-text">"Rejoice always, pray without ceasing, give thanks in all circumstances." 1 Thess 5:16-18 (ESV)</p>-->
                        <!--</div>
                    </div>
                </div>
            </div>
        </div>-->

        <!-- Footer -->
        <footer class="page-footer font-small blue fixed-bottom">
            <div class="row d-flex align-items-center">
                <div class="col-md-12">
                    <!-- Copyright -->
                    <div class="text-center py-2">
                        © 2019 Copyright:
                        <a href="http://ourfamilyconnections.org"> OurFamilyConnections.org</a>
                         .  All rights reserved.
                    </div>
                    <!-- Copyright -->
                </div>
            </div>
        </footer>
        <!-- Footer -->
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