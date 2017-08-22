<?php
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	header("location:ofc_welcome.php");
	exit();
}

    require_once('ofc_dbconnect.php');

// Check Follow/Unfollow status - called from ofc_prayer.php    
	if ( !isset($_GET['followprayerID']) || !isset($_GET['followprayerWho']) || !isset($_GET['followprayerDir'] )) {
		 echo 'Required data is missing';
		 return;
	}
	else {
		$follow_prayerID = $_GET['followprayerID'];
		$follow_prayerWho = $_GET['followprayerWho'];
		$follow_prayerDir = $_GET['followprayerDir'];
		$followprayerquery = "SELECT * FROM " . $_SESSION['prayerfollow'] . " WHERE prayer_id = '" . $follow_prayerID . "' and idDirectory = '" . $follow_prayerDir . "' and username = '" . $follow_prayerWho . "'";
		$followresult = @mysql_query($followprayerquery) or die(" SQL query prayer follow table check error. Error:" . mysql_errno() . " " . mysql_error());
		$followcount = @mysql_num_rows($followresult);

		$followarray = array();
//		$messageYES = "YES - Prayer is being followed by user";
//		$messageNO = "NO - Prayer is NOT being followed by user";
		$messageYES = "YES";
		$messageNO = "NO";
		if ($followcount == 0)
		{
			$message = array('Message' => $messageNO);
			array_push($followarray, $message);
			$followarray = array('followmessage' => $followarray); 
			header('Content-type: application/json');
			echo json_encode($followarray); 
		}
		else {
			$message = array('Message' => $messageYES);
			array_push($followarray, $message); 
			$followarray = array('followmessage' => $followarray); 
			header('Content-type: application/json');
			echo json_encode($followarray); 
 
		}
	}


?>

