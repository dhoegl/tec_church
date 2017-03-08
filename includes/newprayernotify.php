<?php
/* Send email to members with 'new_prayer_notify = '1''; called from 'tecnewprayeraccept.php */

// $prayer_id = $_POST[prayer_id];
// $recordID = $_POST[record_id];
// $prayerdate = $_POST[prayer_date];
// $prayerfrom = $_POST[prayer_from];
// $prayertitle = $_POST[prayer_title];
// $prayertext = $_POST[prayer_text];

function newprayernotify ($prayer_id, $recordID, $prayerdate, $prayerfrom, $prayertitle, $prayertext){
	$praymailfrom = "newprayer@ourfamilyconnections.org";
	$praymailto = $praymailfrom;
	$praymailheaders = "From:" . $praymailfrom . "\r\n" . "Bcc:" . $praymailfrom;
	$praymaillink = "http://ofctest.ourfamilyconnections.org";								
	$prayernotifyquery = "SELECT email_addr FROM " . $_SESSION['logintablename'] . " WHERE new_prayer_notify = '1'";			
	$prayernotifyresult = @mysql_query($prayernotifyquery)or die("Prayer Notify function failed at db SELECT. Please notify your administrator with the following. Error : " . mysql_errno() . mysql_error());
	$prayernotifyresultcount = @mysql_num_rows($prayernotifyresult);
	while($prayernotifyrow = @mysql_fetch_assoc($prayernotifyresult)) {
		$praymailheaders .= ', ' . $prayernotifyrow['email_addr'];
		}
	$praymailsubject = "New Prayer Request from " . $prayerfrom ."\n..";
	$praymailmessage = "(this message has been sent from an unmonitored mailbox)<br /><br />";
	$praymailmessage .= "Hello! " . "<br /><strong>" . $prayerfrom . "</strong> is requesting prayer.<br />Details are below...<br /><br />" . "<table><tr><td><strong>TITLE: </strong> " . $prayertitle . "</td></tr><tr><td><strong>REQUEST: </strong> " . $prayertext . "</td></tr></table><br /><br />Login to our website for more information<br />" . $praymaillink;
	$praymailheaders .= "\r\n"; 
	$praymailheaders .= "MIME-Version: 1.0\r\n";
	$praymailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	mail($praymailto,$praymailsubject,$praymailmessage,$praymailheaders);
//		echo "$praymailto . ' ' . $praymailsubject . ' ' . $praymailmessage . ' ' . $praymailheaders";
//		echo "<script language='javascript'>";
//		echo "alert($praymailto . ' ' . $praymailsubject . ' ' . $praymailmessage . ' ' . $praymailheaders)";
//		echo "</script>";

 }
?>