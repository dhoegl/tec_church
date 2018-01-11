<?php 
session_start();
if(!$_SESSION['logged in']) {
	header("location:ofc_welcome.php");
	exit();
}

require_once('ofc_dbconnect.php');



/* Process new Prayer Request: Called from tecfamview.php and tecprayeradmin.php */
   
	$prayer_owner = $_POST['requestorID'];
	$prayer_name = $_POST['fullname'];
	$prayer_onbehalfof = addslashes($_POST['onbehalfof']);
	$prayer_onbehalfof = mb_convert_encoding($prayer_onbehalfof, "UTF-8"); // convert to ensure copy/paste doesn't expose special characters
	$prayer_email_from = $_POST['email'];
	$prayer_visible = $_POST['visible'];
	$prayer_praise = $_POST['prayer'];
	$prayer_title = addslashes($_POST['requesttitle']);
	$prayer_text = addslashes($_POST['requesttext']);
	$prayer_title = mb_convert_encoding($prayer_title, "UTF-8"); // convert to ensure copy/paste doesn't expose special characters
	$prayer_text = mb_convert_encoding($prayer_text, "UTF-8"); // convert to ensure copy/paste doesn't expose special characters

// If PrayerAdmin sends out a prayer request, use On Behalf Of as the name of the prayer requestor 
if($prayer_onbehalfof) {
	$prayer_name = $prayer_onbehalfof;
}
	
$newprayerquery = $mysql->query("INSERT INTO " . $_SESSION['prayertable'] . "(owner_id, name, title, pray_praise, visible, prayer_text) VALUES ('$prayer_owner','$prayer_name','$prayer_title','$prayer_praise','$prayer_visible','$prayer_text')") or die(" New Prayer Insert query error. Error:" . mysql_errno() . " " . mysql_error());		
$newprayerID = $mysql->insert_id();


if(!$newprayerquery)
	{
		die("A database error has occurred when attempting to insert new Prayer Request. Please notify your administrator with the following. Error : ".mysql_errno().mysql_error());
	}
	else 
		{
			if($prayer_visible == '3') //All Church
			{
			/* send prayer request email to administrators for approval */
//			$praymailadmins = @mysql_query("SELECT admin_email FROM " . $_SESSION['admintablename'] . " WHERE prayernotify = '1'");
			$praymailadmins = $mysql->query("SELECT email_addr FROM " . $_SESSION['logintablename'] . " WHERE admin_praynotify = '1'");
			$praymaillink = "http://trinityevangel.ourfamilyconnections.org";								
			while($praymailrow = $praymailadmins->fetch_assoc())
				{
					$praymailtest = $praymailrow['email_addr'];									
					$praymailto = $praymailtest . " , " . $praymailto;
				}									
			$praymailsubject = "Prayer Request submitted to Our Family Connections"."\n..";
			$praymailmessage = "Hello! " . "<br /><strong>" . $prayer_name . "</strong> has requested approval to post a prayer request.<br /><br />Login to our site using your admin credentials, select the " . "<strong>Prayer Admin</strong>" . " menu item, and accept or reject their prayer request. <br />Details are below...<br />" . $praymaillink . "<br /><br /><strong>TITLE: </strong> " . $prayer_title . "<br /><br /><strong>REQUEST: </strong>" . $prayer_text . "." . "<br /><br />To send an email directly, use the following address:<br /><br />" . $prayer_email_from;
			$praymailfrom = "prayerrequest@ourfamilyconnections.org";
			$praymailheaders = "From:" . $praymailfrom . "\r\n";
			$praymailheaders .= "MIME-Version: 1.0\r\n";
			$praymailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($praymailto,$praymailsubject,$praymailmessage,$praymailheaders);

			/* send prayer request email to requester */
			if($prayer_email_from) { // If new prayer request is created by Admin, do not send an email to requester
				$praymaillink = "http://trinityevangel.ourfamilyconnections.org";								
				$praymailto = $prayer_email_from;		
				$praymailsubject = "Your Request has been submitted for approval"."\n..";
				$praymailmessage = "(this message has been sent from an unmonitored mailbox)<br /><br />";
				$praymailmessage .= "Hello " . "<br /><strong>" . $prayer_name . "</strong>!";
				$praymailmessage .= "<br /><br />Your request has been submitted to our administrators for approval before it is available for viewing.<br />Please allow time for approval before it shows up on our site.";
				$praymailmessage .= "<br /><br />You will receive an email when your prayer request has been approved. Login to our site to view it.<br /><br /><strong>TITLE: </strong> " . $prayer_title . "<br /><br /><strong>REQUEST: </strong>" . $prayer_text . ".";
				$praymailfrom = "no-reply@ourfamilyconnections.org";
				$praymailheaders = "From:" . $praymailfrom . "\r\n";
				$praymailheaders .= "MIME-Version: 1.0\r\n";
				$praymailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				mail($praymailto,$praymailsubject,$praymailmessage,$praymailheaders);
			}
		
			}
			else 
			{
				if($prayer_visible == '1') //Elders Only
				{
			/* send prayer request to all Elders */
			/* ************************** CHANGE 'MEMBER' to 'ELDER' before go-live ************************************ */
			$elderpraymail = $mysql->query("SELECT * FROM " . $_SESSION['dirtablename'] . " WHERE Member = '1'");
			$elderpraylink = "http://trinityevangel.ourfamilyconnections.org";								
			while($elderprayrow = $elderpraymail->fetch_assoc())
				{
					$elderpraytest = $elderprayrow['Email_1'];									
					$elderprayto = $elderpraytest . " , " . $elderprayto;
				}									
			$elderpraysubject = "Prayer Request to Elders"."\n..";
			$elderpraymessage = "Hello Elders! " . "<br /><strong>" . $prayer_name . "</strong> has sent you a prayer request with the following details.<br /><br /><strong>TITLE:</strong> " . $prayer_title . "<br />" . $prayer_text . "." . "<br /><br />To send an email response, use the following email address:<br /><br />" . $prayer_email_from;
			$elderprayfrom = "elderprayer@ourfamilyconnections.org";
			$elderprayheaders = "From:" . $elderprayfrom;
			$elderprayheaders .= "MIME-Version: 1.0\r\n";
			$elderprayheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($elderprayto,$elderpraysubject,$elderpraymessage,$elderprayheaders);

				}
			}
		}



header("location:ofc_profile.php?id=" . $prayer_owner);
?>


