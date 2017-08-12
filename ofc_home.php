<?php 
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	header("location:ofc_welcome.php");
	exit();
}
else {
        if(isset($_GET['id']) ) {
            $profileID = $_GET['id'];
    }
        
    else {
        session_destroy();
        header("location:ofc_welcome.php");
        exit();
    }
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

    <!-- Bootstrap 3 CSS 
    <link href="css/bootstrap.min.css" rel="stylesheet">
-->

    <!-- Bootstrap 4 ALPHA 6 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">


    
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
    <!-- Initialize jquery js script -->
    <script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>

    
    <script type="text/javascript">
        var $profile_id = <?php echo "'" . $profileID . "'"; ?>;
        var $fullname = <?php echo "'" . $_SESSION['fullname'] . "'"; ?>;
        var $idDirectory = <?php echo "'" . $_SESSION['idDirectory'] . "'"; ?>;
        var jQ05 = jQuery.noConflict();
        jQ05(document).ready(function(){

            // Call script to pull profile data....
            var request = jQ05.ajax({
		url: 'services/ofc_get_profile.php',
		type: 'POST',
		dataType: 'json',
		data: { profile_id: $profile_id}
            });
            
            // The ajax call succeeded.  Do something useful. 
            request.done(function(data) {
                console.log('Profile Info Zip = ' + data.zip)
            });
            
            // The ajax call failed
            request.fail(function(xhr, status, errorThrown) {
                console.log('Profile Info Failed');
                console.log( "Error: " + errorThrown );
                console.log( "Status: " + status );


            });

 	});
        
    </script>

  </head>
  <body>

    <div class="nav-header">
        <nav class="navbar navbar-sticky-top navbar-toggleable-md navbar-inverse bg-inverse">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="#">OurFamilyConnections</a>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <?php
                if(!$_SESSION['logged in']) {
                    session_destroy();
                }
                else
                {
                    echo '<ul class="navbar-nav navbar-right mr-auto">';
                    echo '<li class="nav-item active"><a class="nav-link" href="#">Home</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="#">Directory</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="#">Calendar</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="#">Prayer</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="#">Events</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="ofc_logout.php">Logout</a></li>';
                    echo '</ul>';
                }
                ?>
            </div>
        </nav>
    </div>
      
      

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card text-center" style="background-color: #FFFFFF">
                <img class="card-img-top" height="100px" src="images/tfcbanner3.png" alt="Card image cap">
                <div class="card-block">
                    <h2 class="card-title">Card title</h2>
                    <p class="card-text">This is a card with text center div.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card w-100 h-100 text-center card-outline-danger" style="background-color: #FFFFFF">
                <img class="card-img-top" height="100px" src="images/tfcbanner3.png" alt="Card image cap">
                <div class="card-block">
                    <h2 class="card-title">Card title</h2>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card w-100 h-100 text-center" style="background-color: #FFFFFF">
                <div class="card-block">
                    <h2 class="card-title">Card title</h2>
                </div>
                <div class="card-block">
                    <img class="card-img-top" height="100px" src="images/tfcbanner3.png" alt="Card image cap">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-block">
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>

    </div>
</div> <!--container-->




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    -->
<!--Include all compiled plugins (below), or include individual files as needed
    <script src="js/bootstrap.min.js"></script>-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

<!-- jQuery (necessary for Bootstrap's (BOOTSTRAP 4 ALPHA 6) JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>   
    
    
  </body>
</html>