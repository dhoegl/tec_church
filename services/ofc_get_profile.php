<?php
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	exit();
}
   require_once('ofc_dbconnect.php');

 	if (isset($_POST['profile_id']) ) 
	{
            $profileID = $_POST['profile_id'];
        }
/*Query Directory for profile info */
		$profilequery = $mysql->query("SELECT * FROM $dir_tbl_name WHERE idDirectory = '" . $profileID . "'");
		$profilequeryresult = @mysql_query($unapprovedprayerquery) or die(" SQL query error at select active prayers. Error:" . mysql_errno() . " " . mysql_error());
		$unapprovedprayercount = @mysql_num_rows($unapprovedprayerresult);

		$listarray = array();

		if ($unapprovedprayercount == 0)
		{
			echo "no prayer data";
		}
		while($unapprovedrow = @mysql_fetch_assoc($unapprovedprayerresult)) {
				$prayerupdate = date("M-d-Y", strtotime($unapprovedrow['prayerupdatedate']));
				$prayerid = $unapprovedrow['prayerid'];
				$prayer_title = $unapprovedrow['prayertitle'];
				$prayer_text = $unapprovedrow['prayertext'];
				$fullname = $unapprovedrow['fullname'];				
				$glance = $prayer_title . " :: " . substr($unapprovedrow['prayertext'],0,50) . "...";
				$praypraise = $unapprovedrow['praypraise'];
				$detail_button = "Details";

				// Stores each database record to an array 
//					$buildjson = array('prayerdate' => $prayerupdate, 'id' => $prayerid, 'title' => $prayer_title, 'prayertext' => $prayer_text, 'fullname' => $fullname, 'glance' => $glance); 
					$buildjson = array('id' => $prayerid, 'prayerdate' => $prayerupdate, 'fullname' => $fullname, 'prayertitle' => $prayer_title, 'glance' => $glance, 'praypraise' => $praypraise, 'detailbutton' => $detail_button, 'prayertext' => $prayer_text); 
 					// Adds each array into the container array 
 					array_push($listarray, $buildjson); 
			}
			// Prepend array with parent element
//			$listarray = array('ActivePrayerList' => $listarray);
			$listarray = array('prayerdata' => $listarray);

//	}

	header('Content-type: application/json');
	echo json_encode($listarray); 

?>

