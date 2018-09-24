<?php 
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	header("location:ofc_welcome.php");
	exit();
}

   require_once('ofc_dbconnect.php');

$profileaddr = $_GET['id'];
$sqlquery = "SELECT * FROM $dir_tbl_name WHERE idDirectory = '$profileaddr'";
$result = $mysql->query($sqlquery) or die(" SQL query error Calendar table. Error:" . mysql_errno() . " " . mysql_error());

$count = $result->num_rows;

    while($row = $result->fetch_assoc()){
	if($row['Internet_Restrict']<>1)
	{

		$recordID = $row['idDirectory'];
		$recordFirstHim = $row['Name_1'];
		$recordFirstHer = $row['Name_2'];
		$recordLast = $row['Surname'];
		$recordBDay1 = $row['BDay_1_Date'];
		$recordBDay2 = $row['BDay_2_Date'];
		$recordAnniv = $row['Anniv_Date'];
		$recordL2L = $row['L2L_ID'];
		$recordChild_1_Name = $row['Child_1_Name'];
		$recordChild_1_BDay = $row['Child_1_Bday_Date'];
		$recordChild_2_Name = $row['Child_2_Name'];
		$recordChild_2_BDay = $row['Child_2_Bday_Date'];
		$recordChild_3_Name = $row['Child_3_Name'];
		$recordChild_3_BDay = $row['Child_3_Bday_Date'];
		$recordChild_4_Name = $row['Child_4_Name'];
		$recordChild_4_BDay = $row['Child_4_Bday_Date'];
		$recordChild_5_Name = $row['Child_5_Name'];
		$recordChild_5_BDay = $row['Child_5_Bday_Date'];
		$recordChild_6_Name = $row['Child_6_Name'];
		$recordChild_6_BDay = $row['Child_6_Bday_Date'];
		$recordChild_7_Name = $row['Child_7_Name'];
		$recordChild_7_BDay = $row['Child_7_Bday_Date'];
		$recordChild_8_Name = $row['Child_8_Name'];
		$recordChild_8_BDay = $row['Child_8_Bday_Date'];

        }
}

	$LoginQuery = "SELECT l.access_level FROM " . $_SESSION['logintablename'] . " l JOIN directory d ON d.idDirectory = l.idDirectory WHERE l.idDirectory = '" . $_SESSION['idDirectory'] . "'";
        $Loginresult = $mysql->query($LoginQuery) or die(" SQL query error at SELECT Login validation. Error:" . mysql_errno() . " " . mysql_error());
	$Logincount = $Loginresult->num_rows;
	
            while($Loginrow = $Loginresult->fetch_assoc()){
		$recordLogin_Access = $Loginrow['access_level'];
		}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title></title>

<!-- Bootstrap 4 BETA CSS -->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">-->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap4.min.css">
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
<!--    <link href="css/signin.css" rel="stylesheet">-->
    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">
    <!-- Extended styles for this page -->
    <link href="css/ofc_css_style.css" rel="stylesheet">
    
<!-- Initialize jquery js script -->
<!--    <script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>-->
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>

<!-- jQuery (necessary for Bootstrap's (BOOTSTRAP 4 BETA) JavaScript plugins) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    
<!--*****************************EDIT FULLCALENDAR Script***********************************-->
<link rel='stylesheet' type='text/css' href='/js/fullcalendar-1.5.4/fullcalendar/fullcalendar.css' />
<script type='text/javascript' src='/js/fullcalendar-1.5.4/jquery/jquery-1.8.1.min.js'></script>
<script type='text/javascript' src='/js/fullcalendar-1.5.4/jquery/jquery-ui-1.8.23.custom.min.js'></script>
<script type='text/javascript' src='/js/fullcalendar-1.5.4/fullcalendar/fullcalendar.min.js'></script>

    <!-- Tenant Configuration JavaScript Call -->
    <script type="text/javascript" src="/js/ofc_config_ajax_call.js"></script>

<!--Get Calendar Data from ofc_get_calendar_data-->
<script type='text/javascript'>
    var getdataJQ = jQuery.noConflict();
    getdataJQ(document).ready(function() {

		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

        getdataJQ('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				right: 'title'
			},
			events: '/includes/ofc_get_calendar_data.php',
			
			eventClick: function(event) {
				if(event.url) {
					window.open(event.url);
					return false;
					}
				}			

		});
	
	});
</script>


<!--*****************************EDIT FULLCALENDAR Script***********************************-->


</head>

<body>

    <!--Navbar-->
    <?php
    $activeparam = '4';
    require_once('ofc_nav.php');
    ?>

    <!-- Intro Section -->
<div class="container-fluid profile_bg bottom-buffer">
    <div class="row pt-2">
        <div class="col-sm-12">
            <p>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Using this calendar
                </button>
            </p>
        </div> <!-- col sm-12 -->
    </div> <!-- row -->
    <div class="collapse" id="collapseExample">
        <div class="row">
            <div class="col-sm-6">
                    <div class="card card-body">
                        <h4 class="card-title">Navigation</h4>
                        <ul class="card-text">
                            <li>Use Banner Arrow buttons to navigate between months</li>
                            <li>Click on a <span style="background-color:red; color:white;">Birthday</span>/<span style="background-color:green; color:white;">Anniversary</span> item to view the family's Directory information</li>
                            <li>Click on an <span style="background-color:blue; color:white;">Event</span> item to view the event information</li>
                        </ul>
                    </div>
            </div> <!-- col-sm-6 -->
            <div class="col-sm-6">
                    <div class="card card-body">
                        <h4 class="card-title">Color Definition</h4>
                        <ul class="card-text">
                            <li>Anniversaries are highlighted in <span style="background-color:green; color:white;">GREEN</span></li>
                            <li>Adults' Birthdays highlighted in <span style="background-color:red; color:white;">RED</span>; Kids' Birthdays highlighted in <span style="background-color:yellow; color:black;">YELLOW</span></li>
                            <li>Events are highlighted in <span style="background-color:blue; color:white;">BLUE</span></li>
                        </ul>
                    </div>
            </div> <!-- col-sm-6 -->
        </div> <!-- row -->
        <br>
    </div> <!-- collapse --> 
<!--*****************************Calendar***********************************-->
    <div class="row justify-content-center">
        <div class="col-sm-10 bg-light">
            <div id='calendar' style='margin:3em 0;font-size:13px'></div>
        </div> <!-- col-sm-12 --> 
    </div> <!-- row -->
    <div class="row fixed-bottom">
        <div class="col-md-12">
            <div class="text-center">
                <?php
                require_once('/includes/ofc_footer.php')
                ?>
            </div><!-- text -->
        </div><!-- col-md-12 -->
    </div><!-- Row -->

</div> <!-- container -->



</body>
</html>