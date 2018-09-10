<?php 
session_start();
if(!$_SESSION['logged in']) {
	header("location:../ofc_welcome.php");
	exit();
}

require_once('../ofc_dbconnect.php');
//include_once('/includes/event_logs_update.php');



/* Process profile update -CONTACT INFO: Called from ofc_profile.php */
if(isset($_POST['submitcontact']))
	{   
	$his_first = filter_input(INPUT_POST, 'hisfirstname');
	$her_first = filter_input(INPUT_POST, 'herfirstname');
	$last_name = filter_input(INPUT_POST, 'mylastname');
	$street_address1 = filter_input(INPUT_POST, 'myaddr1');
	$street_address2 = filter_input(INPUT_POST, 'myaddr2');
	$my_city = filter_input(INPUT_POST, 'mycity');
	$my_state = substr(filter_input(INPUT_POST, 'mystate'),0,2);
	$my_zip = filter_input(INPUT_POST, 'myzip');
	$my_homephone = filter_input(INPUT_POST, 'myhomephone');
	$his_cell = filter_input(INPUT_POST, 'hiscell');
	$her_cell = filter_input(INPUT_POST, 'hercell');
//	$his_email = $_POST['hisemail']; // email addresses cannot be changed until username:password algorithms confirmed to function as required
//	$her_email = $_POST['heremail']; // email addresses cannot be changed until username:password algorithms confirmed to function as required
//	echo $contactupdatequery;
	$contactupdatequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Name_1 = '" . $his_first . "', Name_2 = '" . $her_first . "', Surname = '" . $last_name . "', Address = '" . $street_address1 . "', Address2 = '" . $street_address2 . "', City = '" . $my_city . "', State = '" . $my_state . "', Zip = '" . $my_zip . "', Phone_Home = '" . $my_homephone . "', Phone_Cell1 = '" . $his_cell . "', Phone_Cell2 = '" . $her_cell . "' WHERE idDirectory = '". $_SESSION['idDirectory'] . "'"; 
	$contactupdate = $mysql->query($contactupdatequery) or die("A database error occurred when trying to update contact info. See tec_profile_contact_update.php. Error : " . mysql_errno() . mysql_error());		
//	eventLogUpdate('profile_update', $last_name, 'Profile Update : Contact : DirectoryID = ', $_SESSION['idDirectory']);

}
else {
	echo "isset didn't work";
	}

header("location:../ofc_profile.php?id=" . $_SESSION['idDirectory']);
?>