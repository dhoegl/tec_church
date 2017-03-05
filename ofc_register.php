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
<title>Please Register to access Trinity Family Connections</title>

<!--Set Focus on User Name Entry textbox-->
<script type="text/javascript">
function focus_on_start()
 {
 document.form1.username.focus();
 }
</script>
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
			<li><a href="/ofc_totrinity.php">Back to Trinity Home</a></li>

		</ul>
	</div>
	<div id="content">

	<div id="left">
			<h2>Please Register to access</h2>
<?php
		$firstname = "";
		$lastname = "";
		$gender = "";
		$emailaddr = "";
		$repeatemailaddr = "";
		$username = "";
		$password = "";
		$repeatpassword = "";
?>

<form name='form1' action='' method="POST">
	<table class="ofc_content" width="350" border="0" cellpadding="1" cellspacing="1" >
		<tr>
			<td>
				<p></p>
			</td>
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
			<td align="right">
			Your First Name:
			</td>
			<td>
			<input type='text' name='firstname' value="<?php echo $firstname; ?>">
			</td>
		</tr>
		<tr>
			<td align="right">
			Your Last Name:
			</td>
			<td>
			<input type='text' name='lastname' value="<?php echo $lastname; ?>">
			</td>
		</tr>
		<tr>
			<td align="right">Gender:</td>
			<td><input type='radio' name='gender' value="M">M</td>
		</tr>
		<tr>
			<td width="50%">&nbsp</td>
			<td ><input type='radio' name='gender' value="F">F</td>
		</tr>
		<tr>
			<td align="right">
			Your email address:
			</td>
			<td>
			<input type='text' name='emailaddr' value="<?php echo $emailaddr; ?>">
			</td>
		</tr>
		<tr>
			<td align="right">
			Re-enter your email address:
			</td>
			<td>
			<input type='text' name='repeatemailaddr' value="<?php echo $repeatemailaddr; ?>">
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

	$username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);
	$repeatpassword = strip_tags($_POST['repeatpassword']);
	$firstname = strip_tags($_POST['firstname']);
	$lastname = strip_tags($_POST['lastname']);
	$gender = strip_tags($_POST['gender']);
	$emailaddr = strip_tags($_POST['emailaddr']);
	$repeatemailaddr = strip_tags($_POST['repeatemailaddr']);
	$date = date("Y-m-d");
	
if($clear)
	{
		$firstname = "";
		$lastname = "";
		$emailaddr = "";
		$gender = "";
		$repeatemailaddr = "";
		$username = "";
		$password = "";
		$repeatpassword = "";
//		echo "Clear was clicked";
	}
	if ($submit)
	{
		if($username&&$emailaddr&&$firstname&&$lastname&&$password&&$gender)
		{
			if($emailaddr==$repeatemailaddr)
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
						

						$regentryquery = "SELECT username from " . $_SESSION['logintablename'] . " WHERE username = '" . $username . "'";
						$regentryexist = @mysql_query($regentryquery) or die("A database error has occurred. Please notify your administrator with the following. Error : " . mysql_errno() . mysql_error());

						$regentrynumrows = @mysql_num_rows($regentryexist);
						if($regentrynumrows == 0)
						{
							if($gender == 'M') 
							{
								$regquery = @mysql_query("INSERT INTO " . $_SESSION['dirtablename'] . " (Name_1, Surname, Email_1, Picture_Link, Picture_Taken) VALUES ('$firstname','$lastname','$emailaddr', 'x', 'N')") or die("Unable to create new user record in directory. Error : " . mysql_errno() . mysql_error());
							}
							else //$gender = 'F'
							{
								$regquery = @mysql_query("INSERT INTO " . $_SESSION['dirtablename'] . " (Name_2, Surname, Email_2, Picture_Link, Picture_Taken) VALUES ('$firstname','$lastname','$emailaddr', 'x', 'N')") or die("Unable to create new user record in directory. Error : " . mysql_errno() . mysql_error());
							}
							$regInsertID = @mysql_insert_id();
							$reglogliquery = @mysql_query("INSERT INTO " . $_SESSION['logintablename'] . " (username, password, idDirectory, firstname, lastname, gender, email_addr) VALUES ('$username','$password','$regInsertID','$firstname','$lastname','$gender','$emailaddr')") or die("Unable to create new login record in directory. Error : " . mysql_errno() . mysql_error());
							if(!$regquery)
								{

									if (@mysql_errno()==1062) //unable to add Directory entry due to duplicate username record in logintable
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
									$regmailadmins = @mysql_query("SELECT email_addr FROM " . $_SESSION['logintablename'] . " WHERE admin_regnotify = '1'");
									$regmaillink = "http://ofctest.ourfamilyconnections.org";								
									while($regmailrow = @mysql_fetch_assoc($regmailadmins))
									{
										$regmailtest = $regmailrow['email_addr'];									
										$regmailto = $regmailtest . " , " . $regmailto;
									}									
									$regmailsubject = "Membership Request to Our Family Connections"."\n..";
									$regmailmessage = "Hello! " . "\n" . $firstname . " " . $lastname . " has requested to be added to Our Family Connections.\n\nLogin to our site using your admin credentials, select the <strong>Access Admin</strong> menu item, and accept or reject this request \n\n" . $regmaillink;
									$regmailfrom = "newfamilyrequest@ourfamilyconnections.org";
									$regmailheaders = "From:" . $regmailfrom . "\r\n";
									$regmailheaders .= "MIME-Version: 1.0\r\n";
									$regmailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
									mail($regmailto,$regmailsubject,$regmailmessage,$regmailheaders);
									echo "<center><table id='profiletable'><tr><td class='strong'>Hi " . $firstname . "!  <br><br>You should receive a welcome email within 48 hours<br>Thank you for your patience!<br><br><a href='tecwelcome.php'>Return to Login Page</a></td></tr></table></center>";
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
			echo "<strong><font color='Red'>Your email addresses do not match.</font> Please retry</strong>";	
			$repeatemailaddr = "";				
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
		<p>After completing the entry form at the left, our administrators will verify and approve your request to access our site.</p>
		<p>You will be notified via email (using the address at left) that your access has been granted.</p>
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
