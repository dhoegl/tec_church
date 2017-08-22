<?php 
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	header("location:ofc_welcome.php");
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
<!--
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
-->
<!-- BOOTSTRAP 4 ALPHA - Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>TEST - OurFamilyConnections Home</title>

<!-- Initialize jquery js script -->
    <script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>

<!-- Bootstrap 4 BETA CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
<!--    <link href="css/signin.css" rel="stylesheet">-->
    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">
    <!-- Extended styles for this page -->
    <link href="css/ofc_css_style.css" rel="stylesheet">

     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>
  <body>

        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <a class="navbar-brand" href="#">OurFamilyConnections</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <?php
                if(!$_SESSION['logged in']) {
                    session_destroy();
                }
                else
                {

                    echo '<ul class="navbar-nav mr-auto mt-md-0">';
                    $activeparam = '1';
                    include '/includes/ofc_menu.php';
                    echo '</ul>';
                }
                ?>
            </div>
        </nav>
      
<div class="container-fluid profile_bg">
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-light border-primary text-center m-3">
                <img class="card-img-top" src="images/trinity_logo_web.png" style="width: 75%; align-self: center" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">What's Happening</h4>
                    <p class="card-text">Check out the latest things going on at Trinity Evangel Church.</p>
                    <div class="list-group">
                        <a href="http://www.trinityevangel.org" class="list-group-item list-group-item-action bg-light border-primary" target="_blank">Trinity Evangel Church website</a>
                        <a href="http://evangelcs.org" class="list-group-item list-group-item-action bg-light border-primary" target="_blank">Evangel Classical School</a>
                        <a href="http://www.trinityevangel.org/livestream" class="list-group-item list-group-item-action bg-light border-primary" target="_blank">Watch the live stream of our service or search the archive</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light border-primary text-center m-3" style="background-color: #FFFFFF">
                <img class="card-img-top" height="100%" src="images/tfcbanner3.png" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">Latest prayer requests</h2>
                    <p class="card-text">Prayer Requests placeholder.</p>
                    <a href="#" class="btn btn-primary">View More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light border-primary text-center m-3" style="background-color: #FFFFFF">
                <div class="card-body">
                    <h2 class="card-title">Upcoming Events</h2>
                </div>
                <div class="card-block">
                    <p class="card-text">Upcoming Events placeholder.</p>
                </div>
                <div class="card-block">
                    <a href="#" class="btn btn-primary">View More</a>
                </div>
            </div>
        </div>
    </div>
</div> <!--container-->




<!--Include all compiled plugins (below), or include individual files as needed
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>


<!-- jQuery (necessary for Bootstrap's (BOOTSTRAP 4 BETA) JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


    
    
  </body>
</html>