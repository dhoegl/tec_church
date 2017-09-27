<?php 
session_start();
if(!$_SESSION['logged in']) {
	header("location:../ofc_welcome.php");
	exit();
}

require_once('../ofc_dbconnect.php');
//include_once('/includes/event_logs_update.php');



/* Process profile update - CALENDAR (anniversary/birthday) INFO: Called from ofc_profile.php */
if(isset($_POST['submitcalendar']))
	{   
	$my_anniv = $_POST['myanniversary'];
	$his_bday = $_POST['hisbirthday'];
	$her_bday = $_POST['herbirthday'];
	$namelast = $_POST['lastname'];
	$calendarupdatequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Anniv_Date = '" . $my_anniv . "', BDay_1_Date = '" . $his_bday . "', BDay_2_Date = '" . $her_bday . "'  WHERE idDirectory = '". $_SESSION['idDirectory'] . "'"; 
	$calendarupdate = $mysql->query($calendarupdatequery) or die("A database error occurred when trying to update calendar info. See ofc_profile_calendar_update.php. Error : " . mysql_errno() . mysql_error());		
//	eventLogUpdate('profile_update', $namelast, 'Profile Update : Calendar : DirectoryID = ', $_SESSION['idDirectory']);
}
else {
	echo "isset didn't work";
	}

header("location:../ofc_profile.php?id=" . $_SESSION['idDirectory']);
?>