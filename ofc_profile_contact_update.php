<?php 
session_start();
if(!$_SESSION['logged in']) {
	header("location:tecwelcome.php");
	exit();
}

require_once('tec_dbconnect.php');



/* Process profile update -CONTACT INFO: Called from tecfamview.php */
if(isset($_POST['submitcontact']))
	{   
	$his_first = $_POST['hisfirstname'];
	$her_first = $_POST['herfirstname'];
	$last_name = $_POST['mylastname'];
	$street_address1 = $_POST['myaddr1'];
	$street_address2 = $_POST['myaddr2'];
	$my_city = $_POST['mycity'];
	$my_state = substr($_POST['mystate'],0,2);
	$my_zip = $_POST['myzip'];
	$my_homephone = $_POST['myhomephone'];
	$his_cell = $_POST['hiscell'];
	$her_cell = $_POST['hercell'];
//	$his_email = $_POST['hisemail']; // email addresses cannot be changed until username:password algorithms confirmed to function as required
//	$her_email = $_POST['heremail']; // email addresses cannot be changed until username:password algorithms confirmed to function as required
//	echo $contactupdatequery;
	$contactupdatequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Name_1 = '" . $his_first . "', Name_2 = '" . $her_first . "', Surname = '" . $last_name . "', Address = '" . $street_address1 . "', Address2 = '" . $street_address2 . "', City = '" . $my_city . "', State = '" . $my_state . "', Zip = '" . $my_zip . "', Phone_Home = '" . $my_homephone . "', Phone_Cell1 = '" . $his_cell . "', Phone_Cell2 = '" . $her_cell . "' WHERE idDirectory = '". $_SESSION['idDirectory'] . "'"; 
	$contactupdate = @mysql_query($contactupdatequery) or die("A database error occurred when trying to update contact info. See tec_profile_contact_update.php. Error : " . mysql_errno() . mysql_error());		
}
else {
	echo "isset didn't work";
	}

header("location:tecfamview.php?id=" . $_SESSION['idDirectory']);
?>