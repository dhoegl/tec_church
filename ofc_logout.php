<?php  
session_start();
    require_once('tec_dbconnect.php');

/*		Access Log entry  */
	$client_ip = stripslashes($_SERVER['REMOTE_ADDR']);
	$client_browser = stripslashes($_SERVER['HTTP_USER_AGENT']);
	$accessquery = "INSERT INTO " . $_SESSION['accesslogtable'] . "(type, member_id, user_id, client_ip, client_browser) VALUES ('Logout', '" . $_SESSION['idDirectory'] . "', '" . $_SESSION['username'] . "', '" . $client_ip . "', '" . $client_browser . "')";		
	$logresult = @mysql_query($accessquery) or die(" SQL query access log error. Error:" . mysql_errno() . " " . mysql_error());
/*		Access Log entry  */

session_destroy();
header("location:tecwelcome.php");
?>
