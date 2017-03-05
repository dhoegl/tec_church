<?php
session_start();
//    require_once('ofc_dbconnect.php');
    require_once('ofc_dbconnect.php');

// username and password sent from form 
$myemailaddress = $_POST['myemailaddress']; 

$mysql_cstat = @mysql_connect($host, $username, $password)or die("cannot connect. Error #" . mysql_errno() . " " . mysql_error()); 
$mysql_sstat = @mysql_select_db($db_name)or die("cannot select DB. Error:" . mysql_errno() . " " . mysql_error());


// To protect MySQL injection (more detail about MySQL injection)
 $myemailaddress = stripslashes($myemailaddress);

// Verify unique email address
$emailexistquery = "SELECT * FROM $login_tbl_name WHERE email_addr = '$myemailaddress'";
$emailexistresult = @mysql_query($emailexistquery) or die(" SQL query error. Error:" . mysql_errno() . " " . mysql_error());
$emailexistcount = mysql_num_rows($emailexistresult);
if($emailexistcount >= 1)
{
	echo "Another person with the same email address has already requested to be registered.";
	echo "<br><a href='ofc_welcome.php'>Return to Login Page</a>";
}
else 
{
// Verify existing email address in Directory table
$sqlquery = "SELECT * FROM $dir_tbl_name WHERE Email_1 = '$myemailaddress' OR Email_2 = '$myemailaddress'";
$result = @mysql_query($sqlquery) or die(" SQL query error. Error:" . mysql_errno() . " " . mysql_error());
// Mysql_num_row is count of table rows returned. Expect 1 or 2
$count = mysql_num_rows($result);
if(mysql_num_rows($result) >= 1)
{
/* Verify email exists and redirect to registration page (tec_registerexist.com)" */
	$row = @mysql_fetch_assoc($result);
	if($row['Status']==1)
	{
		$_SESSION['idDirectory'] = $row['idDirectory'];
		$_SESSION['profile_email'] = $myemailaddress;
		
/*		Access Log entry  */
	$client_ip = stripslashes($_SERVER['REMOTE_ADDR']);
	$client_browser = stripslashes($_SERVER['HTTP_USER_AGENT']);
	$accessquery = "INSERT INTO " . $_SESSION['accesslogtable'] . "(type, member_id, client_ip, client_browser) VALUES ('Register', " . $_SESSION['idDirectory'] . ", '" . $client_ip . "', '" . $client_browser . "')";		
	$logresult = @mysql_query($accessquery) or die(" SQL query access log error. Error:" . mysql_errno() . " " . mysql_error());
/*		Access Log entry  */

/* Redirect to Registry page for existing congregants */ 
	$locationstring = "location:ofc_registerexist.php?id=" . $_SESSION['idDirectory'] . "&m=" . $myemailaddress;  
	header($locationstring);
	}
	else 
	{
		echo "It seems that your original membership has not yet been activated.";
		echo "<br>If you registered more than 48 hours ago, please contact one of our TEC elders for assistance.";
//		echo "<p></p>";
//		echo "idDirectory: " . $row['idDirectory'];
//		echo "<p></p>";
//		echo "email address: " . $myemailaddress;
//		echo "<p></p>";
//		echo "row status: " . $row['Status'];
//		echo "<p></p>";
//		echo "number of rows identified: " . mysql_num_rows($result);
		echo "<p></p>";
		echo "<a href='ofc_welcome.php'>Return to Login Page</a>";
	}
}
else 
{
		echo " Hmm... I can't seem to find a matching email address in our database. Please try re-entering your email address.";
		echo "<p></p>";
		echo "email address = " . $myemailaddress;
		echo "<p></p>";
		echo "<a href='ofc_welcome.php'>Return to Login Page</a>";

}
}
?>
