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
<!-- BOOTSTRAP 4 - Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>TEST - OurFamilyConnections Home</title>

<section> <!--initialization 20180630-->
<!-- Initialize jquery js script -->
<!--<script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>-->

<!-- Datatables Bootstrap 4 CSS -->
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">-->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap4.min.css">
<!--<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">-->
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"/>-->
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.bootstrap4.min.css"/>-->

</section>    <!--initialization 20180630-->
<section> <!--initialization 20180630a-->

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="css/jumbotron.css" rel="stylesheet">
<!-- Extended styles for this page -->
<link href="css/ofc_css_style.css" rel="stylesheet">

<!--JS Scripts for Datatables Bootstrap 4 Responsive functions    -->
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>        
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>        
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>        

</section>    <!--initialization 20180630a-->

 
    <!--*******************************DataTables stylesheet data**************************************-->

<?php
// Get Recent Prayer List
   include('/includes/ofc_view_recentprayerlist.php');
   
// Get Recent Prayer jQuery
   include('/includes/ofc_get_recentprayer_jquery.php');
   
?>


  </head>
  <body>

        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <a class="navbar-brand" href="ofc_welcome.php">OurFamilyConnections</a>
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
                    <h4 class="card-title">Our Church</h4>
                    <p class="card-text">Check out the latest information about Trinity Evangel Church.</p>
                    <div class="list-group">
                        <a href="http://www.trinityevangel.org" class="list-group-item list-group-item-action bg-light border-primary" target="_blank">Trinity Evangel Church website</a>
                        <a href="http://evangelcs.org" class="list-group-item list-group-item-action bg-light border-primary" target="_blank">Evangel Classical School</a>
                        <a href="http://www.trinityevangel.org/livestream" class="list-group-item list-group-item-action bg-light border-primary" target="_blank">Watch the live stream of our service or search the archive</a>
                    </div>
                </div>
            </div>
        </div> <!--col-md-4-->
        <div class="col-md-4"> <!--was col-md-4 -->
            <div class="card bg-light border-primary text-center m-3" style="background-color: #FFFFFF">
                <img class="card-img-top" height="100%" src="images/tfcbanner3.png" style="width: 75%; align-self: center" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">Latest prayer requests</h2>
                <div class="card-block">
                    <a href="ofc_prayer.php" class="btn btn-success">View More</a>
                </div>
                    <table id="recentprayertable" class="table table-striped table-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Opened</th>
                                <th>Family Member</th>
                                <th>Quick Glance</th>
                                <th>ID</th>
                                <th>Text</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Opened</th>
                                <th>Family Member</th>
                                <th>Quick Glance</th>
                                <th>ID</th>
                                <th>Text</th>
                        </tr>
                    </tfoot>
                </table>
                    <a href="ofc_prayer.php" class="btn btn-success">View More</a>
                </div>
            </div>
        </div> <!--col-md-4-->
        <div class="col-md-4">
            <div class="card bg-light border-primary text-center m-3" style="background-color: #FFFFFF">
                <img class="card-img-top" height="100%" src="images/tfcbanner3.png" style="width: 75%; align-self: center" alt="Card image cap">
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
        </div> <!--col-md-4-->
    </div> <!-- row -->
</div> <!--container-->




<!--Include all compiled plugins (below), or include individual files as needed

   
<!-- jQuery Datatables Bootstrap 4 JS -->
<!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>-->
<!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>-->
<!--<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>-->
<!--<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script>-->

<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>-->
    
    
  </body>
</html>