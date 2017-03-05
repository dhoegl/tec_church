<?php 
session_start();


require_once('ofc_dbconnect.php');

/* Query Login table for existing email address - called from tec_registerlogin.php */


 	$profile_email = $_GET['m'];
	$profile_email_query = "SELECT * FROM " . $_SESSION['logintablename'] . " WHERE email_addr = '$profile_email'";
	$profile_email_result = @mysql_query($profile_email_query) or die(" SQL query error at login query. Error:" . mysql_errno() . " " . mysql_error());
	$profile_email_count = @mysql_num_rows($profile_email_result);
	if($profile_email_count >= 1)
	{
		echo "Another person with the same email address has already registered. <a href='tecwelcome.php'>Return to Login Page</a>";
	}

/*Query directory listing for existing user profile */
   $profileaddr = $_GET['id'];
	$myprofilequery = "SELECT * FROM " . $_SESSION['dirtablename'] . " WHERE idDirectory = '$profileaddr'";
	$myprofileresult = @mysql_query($myprofilequery) or die(" SQL query error at profile query. Error:" . mysql_errno() . " " . mysql_error());
	$myprofilecount = @mysql_num_rows($myprofileresult);
	if($myprofilecount >= 1) 
	{
		$row = @mysql_fetch_assoc($myprofileresult);
		$recordID = $row['idDirectory'];
		$recordFirstHim = $row['Name_1'];
		$recordFirstHer = $row['Name_2'];
		$recordLast = $row['Surname'];
		$emailaddr2 = $_SESSION['profile_email'];

	}
	
	else 
	{
		echo " No user exists by that Email address. Please retry. <a href='tecwelcome.php'>Return to Login Page</a>";
		echo "<p></p>";
		echo "idDirectory = " . $_SESSION['idDirectory'];
		echo "<p></p>";
		echo "email address = " . $myemailaddress;

	}
		/* Get current page URL - used to refresh page if credential re-entry necessary */
		function curPageURL(){
			$pageURL = 'http';
			if($_SERVER['HTTPS'] == 'on') 
			{
				$pageURL .= 's';
			}
			$pageURL .= '://';
			if($_SERVER['SERVER_PORT'] != '80') 
			{
				$pageURL .= $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
			}
			else 
			{
				$pageURL .= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			}
			return $pageURL;
		}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<link href="css/ofcstyle.css" rel="stylesheet" type="text/css" />
<title>Please Register to access Trinity Family Connections</title>

<!--Set Focus on User Name Entry textbox-->
<script type="text/javascript">
function focus_on_start()
 {
 document.form1.username.focus();
 }
</script>
<!-- Load the jquery libraries -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

</head>

<body onLoad="focus_on_start()";>
<div id="container">
	<div id="header">

		<div id="header_text">
			<p>Bringing</p>
			<p>our Family</p>
			<p>Together</p>
		</div>
		<ul>
<!-- 			<li><a href=<?php echo curPageURL(); ?>>Refresh Page</a></li>
 -->
 			<li><a href="/ofc_totrinity.php">Back to Trinity Home</a></li>

		</ul>
	</div>
	<div id="content">

	<div id="left">
			<h2>Let's verify your name</h2>

<table class="registerexistname" width="100%" border="0" cellpadding="1" cellspacing="1" >
	<tr>
		<td style="text-align:center;"><h1>We have you listed as:</h1></td>
	</tr>
	<tr>
		<td style="text-align:center;">
			<strong>
				<?php
					if($recordFirstHim) 
					{
						echo $recordFirstHim;
					}
					if($recordFirstHim && $recordFirstHer) {
						echo " or ";
					}					
					if($recordFirstHer) 
					{
						echo $recordFirstHer;
					}
					echo " " . $recordLast;
				?>
			</strong>
		</td>
	</tr>
	<tr>
		<td>
			<p></p>
		</td>
	</tr>
	<tr>
		<td colspan="2">If this is correct, please identify yourself and select a NEW username and password below</td>
	</tr>
	<tr>
		<td>
			<p></p>
		</td>
	</tr>
</table>

<?php
	$username = "";
	$password = "";
	$himher = "";
?>

<form name='form1' action='' method="POST">
	<table class="user_cred_entry" width="350" border="0" cellpadding="1" cellspacing="1" >
		<tr>
			<td>
				<p></p>
			</td>
		</tr>
		<tr>
			<td align="right">
			Who are you:
			</td>
<?php
			if($recordFirstHim) {
			echo "<td><input type='radio' name='himher' value=" . $recordFirstHim . ">" . $recordFirstHim . "</td>";
			}
?>
		</tr>
		<tr>
			<td width='50%'></td>
<?php
			if($recordFirstHer) {
			echo "<td><input type='radio' name='himher' value=" . $recordFirstHer . ">" . $recordFirstHer . "</td>";
			}
?>
		</tr>
		<tr>
			<td align="right">
			Select a User Name:
			</td>
			<td>
			<input type='text' name='username' value="<?php echo $username; ?>">
			</td>
		</tr>
		<tr>
			<td align="right">
			Choose a Password:
			</td>
			<td>
			<input type='password' name='password'>
			</td>
		</tr>
		<tr>
			<td align="right">
			Re-enter your Password:
			</td>
			<td>
			<input type='password' name='repeatpassword'>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<table>
				<tr>
					<td>
						<input type='submit' name='submit' value='Register'>
					</td>
					<td>
						<input type='submit' name='clear' value='Clear'>
					</td>
				</tr>
				</table>
			</td>
		</tr>
	</table>
	<p>
	<br />
	

</form>
<?php
		
	$submit = $_POST['submit'];
	$clear = $_POST['clear'];

if($clear)
	{
		$firstname = "";
		$lastname = "";
		$himher = "";
		$emailaddr = "";
		$repeatemailaddr = "";
		$username = "";
		$password = "";
		$repeatpassword = "";
//		echo "Clear was clicked";
	}
elseif ($submit)
	{
	$username = strip_tags($_POST['username']);
	$himher = strip_tags($_POST['himher']);
	if($himher == $recordFirstHim) {
		$gender = "M";
	}
	else {
		$gender = "F";
	}
	$password = strip_tags($_POST['password']);
	$repeatpassword = strip_tags($_POST['repeatpassword']);
	$date = date("Y-m-d");
	if($username&&$password&&$himher)
		{
				if($password==$repeatpassword)
				{
					if(strlen($password)<7||strlen($password)>19)
					{
					echo "<strong><font color='Red'>Password must be at least 7 characters and less than 20 characters in length.</font> Please retry</strong>";
					
					}
					else 
					{
						//Register the User
						$password = md5($password);
						$repeatpassword = md5($repeatpassword);
						
						// Verify unique username
						$regentryquery = "SELECT username from " . $_SESSION['logintablename'] . " WHERE username = '" . $username . "'";
						$regentryexist = @mysql_query($regentryquery) or die("A database error has occurred. Please notify your administrator with the following. Error : " . mysql_errno() . mysql_error());
						$regentrynumrows = @mysql_num_rows($regentryexist);
						if($regentrynumrows == 0)
						{
						$reglogliquery = @mysql_query("INSERT INTO " . $_SESSION['logintablename'] . " (username, gender, password, idDirectory, firstname, lastname, email_addr, active, access_level, new_prayer_notify) VALUES ('$username','$gender','$password','$recordID','$himher','$recordLast','$emailaddr2', '1', '3', '1')") or die("Unable to create new login record in directory. Error : " . mysql_errno() . mysql_error());
						if(!$reglogliquery)
							{

								if (@mysql_errno()==1062) //unable to add Login table entry due to duplicate username record in logintable
								{
									echo "<strong><font color='Red'>Someone else with that Username is already a member.</font> Please retry</strong>";
								}
								else 
								{
									die("A database error has occurred. Please notify your administrator with the following. Error : ".mysql_errno().mysql_error());
								}
							}
							else 
							{

							$recordfullname = $himher . " " . $recordLast;

							$loginlink = "http://ofctest.ourfamilyconnections.org";								
							$acceptmailto = $emailaddr2;			
							$acceptmailsubject = "Registration complete" . "\n..";
							$acceptmailmessage = "(this is an unmonitored mailbox)<br /><br />Hello <strong> " . $recordfullname . "</strong><br />Thank you for registering on Trinity Evangel Church's family directory!<br /><br />Your new user name has been added to our Directory database.<br />To access our site, please use the new Username you selected: <br /><br /><strong>" . $username . "</strong><br /><br /> and your password to login to <br /><br />" . $loginlink . "<br /><br />Once you get into the site, try out some of these great features<br /><ul><li>Check out the My Profile page where you can update your contact info and create new prayer requests</li><li>Check out the Prayer page (Prayer tab) and try viewing and following others' prayer requests</li><li>View the entire church directory by clicking on the Directory tab</li></ul><br /><br />These are just a few things you can do on our new site.<br /><br />Let us know what you think.<br /><br />Sincerely,<br />the Our Family Connections team ";
							$acceptmailfrom = "no-reply@ourfamilyconnections.org";
							$acceptmailheaders = "From:" . $acceptmailfrom . "\r\n";
							$acceptmailheaders .= "MIME-Version: 1.0\r\n";
							$acceptmailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
							mail($acceptmailto, $acceptmailsubject, $acceptmailmessage, $acceptmailheaders);
//							echo "<center><table id='profiletable'><tr><td class='strong'>Hi " . $recordfullname;
//							echo "!  <br><br>You should receive a welcome email shortly.<br><br><a href='tecwelcome.php'>Return to Login Page</a></td></tr></table></center>";

							// Hide credential entry
							// Upon User Registration, hide the table and replace with in-line text instructions 
							include('/includes/ofc_hidecred.php');							
							}
						}
						else 
						{
							echo "<strong><font color='Red'>Someone else with that Username is already a member.</font> Please retry</strong>";
						}
				}
				}
				else
				{
					echo "<strong><font color='Red'>Your passwords do not match.</font> Please retry</strong>";
				} 
		}
		else 
		{
		echo "<strong><font color='Red'>Please fill in all fields.</font> Please retry</strong>";
		}
	}
?>
</div>

	<div id="right">
		<h2>What happens next</h2>
		<p>After completing the entry form at the left, you will be notified via email that you have been granted access with your new username and password.<strong>You will want to save this email for future use.</strong></p>
		<p></p>
		<p>Next, you will be re-directed to the Welcome Page where you will need to enter your username and password to access our site.</p>
		<p></p>
		<p>If you don't receive an email notification within 48 hours <strong>(don't forget to check your Junk Mail folder)</strong>, please contact one of our church elders for assistance.</p>
		</div>
		<div id="footerline"></div>
	</div>
	
<?php
	require_once('/ofc_footer.php');
?>
</div>
</body>
</html>