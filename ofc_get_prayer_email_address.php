<?php
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	exit();
}
/* Get email address of selected prayer owner - called from tecprayer.php */
    require_once('ofc_dbconnect.php');
    
	if ( !isset($_GET['prayerID'])) {
		 echo 'Required data is missing';
		 return;
	}
	else {
		$prayerID = $_GET['prayerID'];
		$prayerquery = "SELECT p.prayer_id, l.email_addr FROM " . $_SESSION['logintablename'] . " l INNER JOIN " . $_SESSION['prayertable'] . " p on p.name = CONCAT(l.firstname, ' ' , l.lastname) WHERE p.prayer_id = '" . $prayerID . "'";
		$prayerresult = @mysql_query($prayerquery) or die(" SQL query prayer follow table check error. Error:" . mysql_errno() . " " . mysql_error());
		$prayercount = @mysql_num_rows($prayerresult);
		$prayerarray = array();

		while($prayerrow = @mysql_fetch_assoc($prayerresult)) {
			$prayerIDfromSelect = $prayerrow['prayer_id'];
			$prayeremail = $prayerrow['email_addr'];
			$buildjson = array('prayerid' => $prayerIDfromSelect, 'prayeremail' => $prayeremail);
			array_push($prayerarray, $buildjson);
			}
			$prayerarray = array('prayerdata' => $prayerarray);
			header('Content-type: application/json');
			echo json_encode($prayerarray); 
		}

?>

