<?php
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	exit();
}
   require_once('ofc_dbconnect.php');

/* Populate DataTable */
/* Query unapproved prayer listing: visible = 3 (all) and approved = 0 */
		$unapprovedprayerquery = "SELECT p.create_date AS prayerupdatedate, p.name AS fullname, m.Name_1 AS firsthim, m.Name_2 AS firsther, m.Surname AS last, p.prayer_id AS prayerid, p.title AS prayertitle, p.prayer_text AS prayertext, p.pray_praise AS praypraise, p.updated AS updatereq FROM " . $_SESSION['prayertable'] . " p INNER JOIN " . $_SESSION['dirtablename'] . " m on m.idDirectory = p.owner_id WHERE p.visible = '3' and p.status = '1' and p.approved='0' ORDER BY p.create_date DESC";
		$unapprovedprayerresult = $mysql->query($unapprovedprayerquery) or die(" Unapproved Prayer Request table query error. Error:" . mysql_errno() . " " . mysql_error());
		$unapprovedprayercount = $unapprovedprayerresult->num_rows;

		$listarray = array();

		if ($unapprovedprayercount == 0)
		{
			$prayerid = 'no unapproved prayer requests';
			$listarray = array('data' => $prayerid);
		}
		else {
		while($unapprovedrow = $unapprovedprayerresult->fetch_assoc()) {
				$prayerupdate = date("M-d-Y", strtotime($unapprovedrow['prayerupdatedate']));
				$prayerid = $unapprovedrow['prayerid'];
				$prayer_title = "<strong>" . $unapprovedrow['prayertitle'] . " </strong>";
				$prayer_text = $unapprovedrow['prayertext'];
				$fullname = $unapprovedrow['fullname'];
				$glance = "<strong>" . $prayer_title . " </strong><br />" . substr($unapprovedrow['prayertext'],0,50) . "...";
				$praypraise = $unapprovedrow['praypraise'];
				$approve_button = "Approve";
				$reject_button = "Reject";
				$view_button = "View";
				

				// Stores each database record to an array 
//					$buildjson = array($prayerid, $approve_button, $reject_button, $prayerupdate, $praypraise, $fullname, $prayer_title, $prayer_text); 
					$buildjson = array($prayerid, $approve_button, $reject_button, $prayerupdate, $praypraise, $fullname, $prayer_title, $view_button, $prayer_text); 
 					// Adds each array into the container array 
 					array_push($listarray, $buildjson); 
			}
		}
			// Prepend array with parent element
			$listarray = array('data' => $listarray);


	header('Content-type: application/json');
	echo json_encode($listarray); 
?>


