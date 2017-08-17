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
<!-- Initialize jquery js script -->
    <script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>

    <!-- Bootstrap 4 ALPHA 6 CSS -->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">-->


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
            
            // The ajax call succeeded. 
            request.done(function(data) {
                console.log('Profile Info Zip = ' + data[0].zip);
            });
            
            // The ajax call failed
            request.fail(function(xhr, status, errorThrown) {
                console.log('Profile Info Failed');
                console.log( "Error: " + errorThrown );
                console.log( "Status: " + status );
                alert('Failed to obtain profile data. Please re-load page.');

            });

 	});
        
    </script>

  </head>
  <body>

<!--    <div class="nav-header">-->
        <nav class="navbar navbar-inverse bg-inverse">
            <a class="navbar-brand" href="#">OurFamilyConnections</a>
            <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <?php
                if(!$_SESSION['logged in']) {
                    session_destroy();
                }
                else
                {
                    echo '<ul class="navbar-nav navbar-right mr-auto">';
                    include '/includes/ofc_menu.php';
                    echo '</ul>';
                }
                ?>
            </div>
        </nav>
<!--    </div>-->
      
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card m-3">
                <img class="card-img-top" src="images/img_400_300_blue.png" style="height: 300px; width: 100%" alt="Card image cap">
                <div class="card-block">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card m-3">
                <img class="card-img-top" src="images/img_400_300_blue.png" style="height: 300px; width: 100%" alt="Card image cap">
                <div class="card-block">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card m-3">
                <img class="card-img-top" src="images/img_400_300_blue.png" style="height: 300px; width: 100%" alt="Card image cap">
                <div class="card-block">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>      

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
<!--            <div class="card card-outline-primary mt-3" style="width: 20rem;">-->
            <div class="card card-outline-primary mt-3">
                <img class="card-img-top" src="images/trinity_logo_web.png" width="auto" alt="Card image cap">
                <div class="card-block">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center mt-3" style="background-color: #FFFFFF">
                <img class="card-img-top" height="100%" src="images/tfcbanner3.png" alt="Card image cap">
                <div class="card-block">
                    <h2 class="card-title">Card title</h2>
                    <p class="card-text">This is a card with text center div.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card w-100 h-100 text-center mt-3" style="background-color: #FFFFFF">
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


<!-- jQuery (necessary for Bootstrap's (BOOTSTRAP 4 BETA) JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


    
    
  </body>
</html>