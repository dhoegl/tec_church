<?php
session_start();
    require_once('ofc_dbconnect.php');

// Load the jquery libraries
echo "<script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>";

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

$mysql_cstat = @mysql_connect($host, $username, $password)or die("cannot connect. Error #" . mysql_errno() . " " . mysql_error()); 
$mysql_sstat = @mysql_select_db($db_name)or die("cannot select DB. Error:" . mysql_errno() . " " . mysql_error());


// To protect MySQL injection
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = @mysql_real_escape_string($myusername);
$mypassword = @mysql_real_escape_string(md5($mypassword));

// Get user details
$sqlquery = "SELECT * FROM $login_tbl_name WHERE username = '$myusername' AND password = '$mypassword'";
$result = @mysql_query($sqlquery) or die(" SQL query error. Error:" . mysql_errno() . " " . mysql_error());
$count = mysql_num_rows($result);
if(mysql_num_rows($result) == 1)
{
// Login $myusername, $mypassword and redirect to file "login_success.php"
	$row = @mysql_fetch_assoc($result);
	if($row['active']==1)
	{
		$fullname = $row['firstname'] . " " . $row['lastname'];
		$_SESSION['user_id'] = $row['login_ID'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['fullname'] = $fullname;		
		$_SESSION['gender'] = $row['gender'];
		$_SESSION['idDirectory'] = $row['idDirectory'];
		$_SESSION['reg_admin'] = $row['admin_regnotify']; // Registration Administrator
		$_SESSION['pray_admin'] = $row['admin_praynotify']; // Prayer Administrator
		$_SESSION['super_admin'] = $row['admin_superuser']; // System SuperUser
		$_SESSION['accesslevel'] = $row['access_level'];
		$_SESSION['logged in'] = TRUE;
		
/*		Access Log entry  */
	$client_ip = stripslashes($_SERVER['REMOTE_ADDR']);
	$client_browser = stripslashes($_SERVER['HTTP_USER_AGENT']);
	$accessquery = "INSERT INTO " . $_SESSION['accesslogtable'] . "(type, member_id, user_id, client_ip, client_browser) VALUES ('Login', '" . $_SESSION['idDirectory'] . "', '" . $_SESSION['username'] . "', '" . $client_ip . "', '" . $client_browser . "')";		
	$logresult = @mysql_query($accessquery) or die(" SQL query access log error. Error:" . mysql_errno() . " " . mysql_error());

/* Get user first name */
	$namequery = "SELECT * FROM " . $_SESSION['dirtablename'] . " WHERE idDirectory = " . $_SESSION['idDirectory'];
	$nameresult = @mysql_query($namequery) or die(" Name query error. Error:" . mysql_errno() . " " . mysql_error());
	$namerow = @mysql_fetch_assoc($nameresult);
	if($_SESSION['idDirectory'] <= 19999) //Shared Directory entries for generic users
	{
		if($_SESSION['gender'] == "M")
			{
				$_SESSION['firstname'] = $namerow['Name_1'];
			}
			elseif($_SESSION['gender'] == "F") 
			{
	 			$_SESSION['firstname'] = $namerow['Name_2'];
 			}
	 		else 
	 	{
			session_destroy();
			header("location:ofc_welcome.php");
			/* Enter Error Handler */
		}
	}
	else 
	{
		$_SESSION['firstname'] = $_SESSION['username'];
	}

	header("location:teclogin_success.php");
	}
	else 
	{
		// Throw alert if user has not yet been activated 
		include('/includes/tec_credalert2.php');
//		echo "Your membership has not yet been activated. Thank you for your patience!";
//		echo "<br><a href='tecwelcome.php'>Return to Login Page</a>";
	}
}
else 
{
	// Throw alert if improper login credentials attempted 
	include('/includes/tec_credalerts.php');
}
?>

