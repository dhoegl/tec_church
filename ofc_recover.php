<?php 
session_start();
session_destroy();

require_once('ofc_dbconnect.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<link href="css/ofc_style.css" rel="stylesheet" type="text/css" />
<title>Reset your Password to Our Family Connections</title>
</head>

<body>
<div id="container">
	<div id="header">

		<div id="header_text">
			<p>Bringing</p>
			<p>our Family</p>
			<p>Together</p>
		</div>
		<ul>
			<li> <a href='/ofc_welcome.php'>Welcome</a></li>

		</ul>
	</div>
	<div id="content">

	<div id="left">
			<h2>Please Identify Yourself</h2>
			<p>
			<p><center><strong><font color="Red">Non-Functional at this time</font></strong></center></p>
			<p>			
			<p>Before we can reset your password, you need to enter the information below to help identify your account:</p>
<?php
		
	$submit = $_POST['submit'];
	$clear = $_POST['clear'];

	$emailaddr = strip_tags($_POST['emailaddr']);
	$date = date("Y-m-d");
	
if($clear)
	{
		$emailaddr = "";
//		echo "Clear was clicked";
	}
	if ($submit)
	{
			$recoverquery = "SELECT username from " . $_SESSION['logintablename'] . " WHERE username = '" . $username . "'";			
			$recoverexist = @mysql_query($recoverquery)or die("A database error has occurred. Please notify your administrator with the following. Error : " . mysql_errno() . mysql_error());
			$recovernumrows = @mysql_num_rows($recoverexist);
			if($recovernumrows == 0)
				{
					echo "<strong><font color='Red'>No family member exists with that Username.</font> Please re-enter your Username</strong>";
				}
				else 
				{
					echo "<strong><font color='Red'><u>Non-Functional at this time</u></font><font color='Blue'>An email has been sent to the address below.</font> Please check your email for further instructions</strong>";
				}
	}
?>
<form action='' method="POST">
	<table class="ofc_content" width="350" border="0" cellpadding="1" cellspacing="1" >
		<tr>
			<td align="right">
			Your email address:
			</td>
			<td>
			<input type='text' name='emailaddr' value="<?php echo $emailaddr; ?>">
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
				<table>
				<tr>
					<td>
						<input type='submit' name='submit' value='Reset Password'>
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
</div>

	<div id="right">
		<h2>Instructions</h2>
		<p>Enter your email address at the left, and click the 'Reset Password' button.</p>
		<p>Check your mailbox for an email requesting you to reset your password at our site.</p>
		<p>Click on the hyperlink and enter a new password at the Password Reset page.</p>
		<p>If you don't receive an email notification within a few minutes <strong>(don't forget to check your Junk Mail folder)</strong>, please contact one of our church elders for assistance.</p>
		</div>
		<div id="footerline"></div>
	</div>
	
	<div id="footer">Copyright � 2012 OurFamilyConnections.org.  All rights reserved.</div>	
</div>
</body>
</html>
