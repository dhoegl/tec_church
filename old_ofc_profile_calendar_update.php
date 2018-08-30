<?php 
session_start();
if(!$_SESSION['logged in']) {
	header("location:tecwelcome.php");
	exit();
}

require_once('tec_dbconnect.php');



/* Process profile update - CALENDAR (anniversary/birthday) INFO: Called from tecfamview.php */
if(isset($_POST['submitcalendar']))
	{   
	$my_anniv = $_POST['myanniversary'];
	$his_bday = $_POST['hisbirthday'];
	$her_bday = $_POST['herbirthday'];
	$calendarupdatequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Anniv_Date = '" . $my_anniv . "', BDay_1_Date = '" . $his_bday . "', BDay_2_Date = '" . $her_bday . "'  WHERE idDirectory = '". $_SESSION['idDirectory'] . "'"; 
	$calendarupdate = @mysql_query($calendarupdatequery) or die("A database error occurred when trying to update contact info. See tec_profile_contact_update.php. Error : " . mysql_errno() . mysql_error());		
}
else {
	echo "isset didn't work";
	}

header("location:tecfamview.php?id=" . $_SESSION['idDirectory']);
?>