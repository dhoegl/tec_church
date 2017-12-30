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
<html>
<head>
    <link href="css/ofc_css_style.css" rel="stylesheet" type="text/css" />
<!--*****************************EDIT FULLCALENDAR Script***********************************-->
<link rel='stylesheet' type='text/css' href='/js/fullcalendar-1.5.4/fullcalendar/fullcalendar.css' />
<script type='text/javascript' src='/js/fullcalendar-1.5.4/jquery/jquery-1.8.1.min.js'></script>
<script type='text/javascript' src='/js/fullcalendar-1.5.4/jquery/jquery-ui-1.8.23.custom.min.js'></script>
<script type='text/javascript' src='/js/fullcalendar-1.5.4/fullcalendar/fullcalendar.min.js'></script>



<script type='text/javascript'>

	$(document).ready(function() {

		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			events: '/includes/ofc_get_calendar_data.php',
//			events: '/tec_get_calendar_event_data.php',
			
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

<title>TEC - Directory Event Calendar</title>


</head>

<body>

<div id="container">
	<div id="header">

		<div id="header_text">
			<p>Bringing</p>
			<p>our Family</p>
			<p>Together</p>
		</div>
		<ul>
			<li> <a href='/tecwelcome.php'>Home</a></li>
<?php
	require_once('tecmenu.php');

?>
		</ul>
	</div>


<div id="content">
<!--*****************************Calendar***********************************
-->
			<br>
			<h2>Events, Birthdays, Anniversaries</h2>
			<hr>
<table id="detailheading">

<tr>
<td class="header">
Click on an item for more information
</td>
<td class="header">
Click on an item for more information
</td>
</tr>
<tr>
	<td class="content">
	Adults' Birthdays are highlighted in <span style="background-color:red; font-weight: bold; color:white;">RED</span>
	</td>
	<td class="content">
	Anniversaries are highlighted in <span style="background-color:green; font-weight: bold; color:white;">GREEN</span>
	</td>
</tr>
<tr>
	<td class="content">
	Kids' Birthdays are highlighted in <span style="background-color:yellow; font-weight: bold; color:black;">YELLOW</span>
	</td>
	<td class="content">
	Events are highlighted in <span style="background-color:blue; font-weight: bold; color:white;">BLUE</span>
	</td>
</tr>
<tr>
<td class="header">
</td>
<td class="header">
Download our Family Directory</td>
</tr>
<tr>
<td class="content">
</td>
<td class="content">
includes birthday/anniversary calendar details</a>
</td>
</tr>
<tr>
<td class="content">
</td>
<td class="content">
<strong>Coming Soon</strong></a>

<!-- <a href="/Documents/TEC_Family_Directory_Sep_23_2012_Internet.pdf">Directory Download (PDF 1.8MB)</a>
-->
</td>
</tr>
</table>
	<div id='calendar' style='margin:3em 0;font-size:13px'></div>



<!--****************************Footer***********************************
-->

<div id="footerline"></div>
</div>
	
<?php
	require_once('/tecfooter.php');
?>
</div>




<!--*****************************EDIT OVERLAY to select new Profile Picture***********************************-->

<!--*****************************TEST Script***********************************-->
<!--*****************************TEST Script***********************************-->


</body>
</html>