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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>TEST - OurFamilyConnections Home</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
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
  <body class="appstyle">
   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">OurFamilyConnections</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php
            if(!$_SESSION['logged in']) {
                session_destroy();
            }
            else
            {
                echo '<ul class="nav navbar-nav navbar-right nav-pills">';
                echo '<li role="presentation" class="active"><a href="#">Home</a></li>';
                echo '<li role="presentation"><a href="#">Directory</a></li>';
                echo '<li role="presentation"><a href="#">Calendar</a></li>';
                echo '<li role="presentation"><a href="#">Prayer</a></li>';
                echo '<li role="presentation"><a href="#">Events</a></li>';
                echo '<li role="presentation"><a href="ofc_logout.php">Logout</a></li>';
                echo '</ul>';
//                echo '<ul class="nav navbar-nav navbar-right">';
//                echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
//                echo '<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
//                echo '</ul>';
            }
            ?>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

<div class="container">
<!--    <div class="by ahy">
        <div class="dq">
            <div class="fh">
                <div class="rp bqq agk">
                    <div class="rv" style="background-image: url(images/trinity_logo_web.png);"></div>
                </div>
            </div>
        </div>
    </div>-->
    <div class="row">
        <div class="col-md-offset-1 col-md-3">
            <div class="card w-100 h-100 text-center" style="background-color: #FFFFFF">
                <img class="card-img-top" height="100px" src="images/tfcbanner3.png" alt="Card image cap">
                <div class="card-block">
                    <h2 class="card-title">Card title</h2>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-offset-1 col-md-3">
            <div class="card w-100 h-100 text-center" style="background-color: #FFFFFF">
                <img class="card-img-top" height="100px" src="images/tfcbanner3.png" alt="Card image cap">
                <div class="card-block">
                    <h2 class="card-title">Card title</h2>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-offset-1 col-md-3">
            <div class="card w-100 h-100 text-center" style="background-color: #FFFFFF">
                <img class="card-img-top" height="100px" src="images/tfcbanner3.png" alt="Card image cap">
                <div class="card-block">
                    <h2 class="card-title">Card title</h2>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>

    </div>
</div> <!--container-->




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

  </body>
</html>