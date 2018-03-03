<?php 
//session_start();
//if(!$_SESSION['logged in']) {
//	header("location:../ofc_welcome.php");
//	exit();
//}

require_once('../ofc_dbconnect.php');
//include_once('/includes/event_logs_update.php');

if(isset($_POST['registersubmit']))
	{   
	$church_code = filter_input(INPUT_POST, 'churchcode');
	$user_name = filter_input(INPUT_POST, 'username');
	$pass_word = filter_input(INPUT_POST, 'password');
	$first_name = filter_input(INPUT_POST, 'firstname');
	$last_name = filter_input(INPUT_POST, 'lastname');
	$email_address = filter_input(INPUT_POST, 'emailaddress');
//	$contactupdatequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Name_1 = '" . $his_first . "', Name_2 = '" . $her_first . "', Surname = '" . $last_name . "', Address = '" . $street_address1 . "', Address2 = '" . $street_address2 . "', City = '" . $my_city . "', State = '" . $my_state . "', Zip = '" . $my_zip . "', Phone_Home = '" . $my_homephone . "', Phone_Cell1 = '" . $his_cell . "', Phone_Cell2 = '" . $her_cell . "' WHERE idDirectory = '". $_SESSION['idDirectory'] . "'"; 
//	$contactupdate = $mysql->query($contactupdatequery) or die("A database error occurred when trying to update contact info. See tec_profile_contact_update.php. Error : " . mysql_errno() . mysql_error());		
//	eventLogUpdate('profile_update', $last_name, 'Profile Update : Contact : DirectoryID = ', $_SESSION['idDirectory']);
        echo "Got to RegisterSubmit";
        echo "<p id='test1'>Arrived</p>";
        echo "<script language='javascript'>";
        echo "console.log('arrived at registersubmit - isset worked');";
        echo "alert('Arrived at RegisterSubmit - isset worked');";
        echo "</script>";

}
else {
	echo "isset didn't work";
        echo "<p id='test1'>Arrived</p>";
        echo "<script language='javascript'>";
        echo "console.log('arrived at registersubmit - isset DID NOT work');";
        echo "alert('Arrived at RegisterSubmit - isset DID NOT work');";
        echo "</script>";
	}

//header("location:../ofc_profile.php?id=" . $_SESSION['idDirectory']);
?>