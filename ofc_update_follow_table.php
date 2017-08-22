<?php
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	exit();
}

    require_once('ofc_dbconnect.php');

	if ( !isset($_POST['followselect']) || !isset($_POST['followprayerID']) || !isset($_POST['followprayerWho']) || !isset($_POST['followprayerDir'] )) {
		 echo 'Required data is missing';
		 return;
	}
	else {
		$followselect =  $_POST['followselect'];
		$follow_prayerID = $_POST['followprayerID'];
		$follow_prayerWho = $_POST['followprayerWho'];
		$follow_prayerDir = $_POST['followprayerDir'];
		if($followselect == 'follow') {
		$accessquery = "INSERT INTO " . $_SESSION['prayerfollow'] . "(prayer_id, login_id, username, idDirectory) VALUES ('" . $follow_prayerID . "', '" . $_SESSION['user_id'] . "', '" . $follow_prayerWho . "', '" . $follow_prayerDir . "')";		
		$logresult = @mysql_query($accessquery) or die(" SQL query prayer follow table insert error. Error:" . mysql_errno() . " " . mysql_error());
		}
		else { // unfollow - delete follow entry
 			$deletefollow = "DELETE from " . $_SESSION['prayerfollow'] . " WHERE prayer_id = '$follow_prayerID' and username = '$follow_prayerWho' and idDirectory = '$follow_prayerDir'";			
			$deletefollowexe = @mysql_query($deletefollow)or die("A database error has occurred when deleting prayer_follow entry. Please notify your administrator with the following. Error : " . mysql_errno() . mysql_error());
			}
		}

?>

