<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>TEST - Welcome to OurFamilyConnections</title>

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
  <body>
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
                echo '<form class="navbar-form navbar-right" name="form1" method="post" action="ofc_checklogin.php">';
                echo '<div class="form-group">';
                echo '<input type="text" placeholder="username" name="myusername" class="form-control" required="TRUE" autofocus="TRUE">';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<input type="password" placeholder="password" name="mypassword" class="form-control" required="TRUE">';
                echo '</div>';
                echo '<button type="submit" class="btn btn-success">Sign in</button>';
                echo '<div class="btn-group pad-left">';
                    echo '<button type="button" class="btn btn-primary">Register</button>';
                echo '</div>';
                echo '</form>';

            }
            else
            {
                $homeurl = "location:ofc_home.php?id=" . $_SESSION['idDirectory'];
                header($homeurl);

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
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body bg-info">
                <h1 class="text-center">TEST SITE</h1>
            </div>
        </div>
            <div class="col-sm-12">
                <img src="images/tfcbanner3.png" class="img-responsive center-block" alt=""/>
            </div>
            <div class="panel panel-default">
                <div class="panel-body bg-success center-block">
                    <h3 class="text-center">Trinity Evangel Church is a community of Christians who worship a great God, who proclaim a potent gospel, and who love serving one another</h3>
                    <h4 align="center">We believe in the inerrancy and sufficiency of God&#39;s Word</h4>
                    <h4 align="center">We believe in the sovereignty of God&#39;s grace</h4>
                    <h4 align="center">We believe in the priority of life-on-life discipleship</h4>
                </div>
            </div>
        </div> <!--row-->
    </div> <!--container-->




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

  </body>
</html>