<?php 
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	header("location:ofc_welcome.php");
	exit();
}
   require_once('ofc_dbconnect.php');

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
    <title>Family Directory</title>

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

<!-- Popup script from http://dev.vast.com/jquery-popup-overlay/ -->
<script src="https://cdn.rawgit.com/vast-engineering/jquery-popup-overlay/1.7.13/jquery.popupoverlay.js"></script>

<!--*******************************DataTables stylesheet data**************************************-->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>




<script type="text/javascript" charset="utf-8">
    var jQ06 = jQuery.noConflict();
        jQ06(document).ready(function() {
                jQ06('#table_id').DataTable({
                                        "order": [[ 1, 'asc' ], [ 2, 'asc' ]]

                                        });
        });

// , "columnDefs": [    { "width": "5%", "targets": 0 }, { "width": "5%", "targets": 1 }, { "width": "5%", "targets": 2 }, { "width": "20%", "targets": 3 }, { "width": "15%", "targets": 4 }]
//			$(document).ready(function() {    $('#table_id').DataTable( {
//				 "bJQueryUI": true, "sScrollY": "600px", "bPaginate": true, "aaSorting": [[ 1, "asc" ]], "iDisplayLength": 100, "bLengthChange": false, "bFilter": true, "bSort": true, "bInfo": false, "bAutoWidth": true, "sWrapper": "25px"} );} );
</script>
<!--*******************************DataTables stylesheet data**************************************-->

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
                $activeparam = '3';
                include '/includes/ofc_menu.php';
                echo '</ul>';
            }
            ?>
        </div>
    </nav>
    
    <div class="container-fluid profile_bg">
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-light border-primary m-3">
                    <div class="card-body">
                        <h4 class="card-title">Your view into our Family</h4>
                        <p class="card-text text-info"><strong>On a mobile device? Best viewed in Landscape mode.</strong></p>
                        <p class="card-text">Click on an email address to launch your own email service and send a word of encouragement!</p>
                        <p class="card-text">Click on '<u>view</u>' to see more information about a Family member.</p>
                        <p class="card-text">Click HERE to download a copy of our Family Directory</p>
                    </div>
                </div>
            </div> <!-- col-sm-12 -->
        </div> <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div id="prayerlogleft">
                    <br>
                    <h2>Our Church Family</h2>
                    <hr>
                </div>

<table id="table_id" class="table table-sm table-striped dt-responsive" width="100%">
	<thead>
		<tr>
			<th>Profile</th>
<!--			<th>Last Name</th>-->
			<th>Name</th>
			<th>Address</th>
			<th>Phone Numbers **</th>
			<th>Email Address</th>
		</tr>
	</thead>
	<tbody>
<?php
// Get Active Family List
   include('/includes/ofc_getfamilylist.php');

?>	
	</tbody>
	<tfoot>
		<tr>
			<th>Profile</th>
<!--			<th>Last Name</th>-->
			<th>Name</th>
			<th>Address</th>
			<th>Phone Numbers **</th>
			<th>Email Address</th>
		</tr>
	</tfoot>
    </table>
            </div>


    </div> <!-- row -->
	
</div> <!-- Container -->
    
    <!-- jQuery (necessary for Bootstrap's (BOOTSTRAP 4 BETA) JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>
