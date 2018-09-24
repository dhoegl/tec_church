<?php
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	exit();
}
   require_once('ofc_dbconnect.php');

// 	if (isset($_GET['action']) )
//	{
/* Populate DataTable */
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
				$fullname = $activerow['fullname'];
				$glance = "<a data-toggle='modal' data-target='#ModalPrayerInfo' class='faux_hyperlink'>" . $prayer_title . " </a><br />" . substr($activerow['prayertext'],0,100) . "...";
				$praypraise = $activerow['praypraise'];
				$prayanswer = $activerow['answered'];
				if($activerow['prayanswer'] == '1') {
					$prayanswer = "Answered";
				}
				else {
					$prayanswer = " ";
				}
				$detail_button = "Details";

				// Stores each database record to an array
//					$buildjson = array('prayerdate' => $prayerupdate, 'id' => $prayerid, 'title' => $prayer_title, 'prayertext' => $prayer_text, 'fullname' => $fullname, 'glance' => $glance);
					$buildjson = array($prayerid, $prayerupdate, $fullname, $praypraise, $prayanswer, $glance, $detail_button, $prayer_text);
 					// Adds each array into the container array
 					array_push($listarray, $buildjson);
			}
			// Prepend array with parent element
//			$listarray = array('ActivePrayerList' => $listarray);
			$listarray = array('data' => $listarray);

//	}

	header('Content-type: application/json');
	echo json_encode($listarray);

?>


