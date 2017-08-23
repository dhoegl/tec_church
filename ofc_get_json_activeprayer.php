<?php
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	exit();
}
   require_once('ofc_dbconnect.php');

// 	if (isset($_GET['action']) ) 
//	{
/*Query active prayer listing: visible = 3 (all) and status = 1 */
		$activeprayerquery = $mysql->query("SELECT p.create_date AS prayerupdatedate, p.name AS fullname, m.Name_1 AS firsthim, m.Name_2 AS firsther, m.Surname AS last, p.prayer_id AS prayerid, p.title AS prayertitle, p.prayer_text AS prayertext, p.pray_praise AS praypraise, p.updated AS updatereq, p.answer AS prayanswer FROM " . $_SESSION['prayertable'] . " p INNER JOIN " . $_SESSION['dirtablename'] . " m on m.idDirectory = p.owner_id WHERE p.visible = '3' and p.status = '1' and p.approved='1' ORDER BY p.create_date DESC") or die(" SQL query error at select active prayers. Error:" . mysql_errno() . " " . mysql_error());
		$activeprayercount = $activeprayerquery->num_rows;

		$listarray = array();

		if ($activeprayercount == 0)
		{
			echo "no prayer data";
		}
		while($activerow = $activeprayerquery->fetch_assoc()) {
				$prayerupdate = date("M-d-Y", strtotime($activerow['prayerupdatedate']));
				$prayerid = $activerow['prayerid'];
				$prayer_title = $activerow['prayertitle'];
				$prayer_text = $activerow['prayertext'];
// Append Prayer Update text to initial active prayer text
				$updateprayerquery = $mysql->query("SELECT * FROM " . $_SESSION['prayerupdate'] . " WHERE prayer_id = '" . $prayerid . "' order by update_id") or die(" SQL query error at select from prayerupdate. Error:" . mysql_errno() . " " . mysql_error());
				$updateprayercount = $updateprayerquery->num_rows;
				if(!$updateprayercount == 0) {
					while($updateprayerrow = $updateprayerquery->fetch_assoc()) {
						$updateprayerdate = date("M-d-Y", strtotime($updateprayerrow['update_date']));
						$updateprayertext = $updateprayerrow['update_text'];
						$prayer_text .= "\r\n\r\n";
						$prayer_text .= "<STRONG>" . $updateprayerdate . "</STRONG>";
						$prayer_text .= "\r\n";
						$prayer_text .= $updateprayertext;
					}
				}
				$prayer_text .= "\r\n\r\n";
				$fullname = $activerow['fullname'];				
				$glance = $prayer_title . " :: " . substr($activerow['prayertext'],0,50) . "...";
				$praypraise = $activerow['praypraise'];
				if($activerow['prayanswer'] == '1') {
					$prayanswer = "YES";
				}
				else {
					$prayanswer = "NO";
				}

				$detail_button = "Details";

				// Stores each database record to an array 
//					$buildjson = array('prayerdate' => $prayerupdate, 'id' => $prayerid, 'title' => $prayer_title, 'prayertext' => $prayer_text, 'fullname' => $fullname, 'glance' => $glance); 
					$buildjson = array('id' => $prayerid, 'prayerdate' => $prayerupdate, 'fullname' => $fullname, 'prayertitle' => $prayer_title, 'glance' => $glance, 'praypraise' => $praypraise, 'prayanswer' => $prayanswer, 'detailbutton' => $detail_button, 'prayertext' => $prayer_text); 
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

