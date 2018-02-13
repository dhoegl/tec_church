<?php 
session_start();
require_once 'ofc_dbconnect.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Please Register</title>
<!-- Initialize jQuery scripts -->
<script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>


<!-- Password Strength Check script -->
<script type="text/javascript" src="js/ofc_password_check.js"></script>

<!-- Password Match Check script -->
<script type="text/javascript" src="js/ofc_password_match.js"></script>

<!-- Registration church code confirmation script -->
<script type="text/javascript" src="js/ofc_register_confirmcode.js"></script>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous"></link>-->
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
<!--    <link href="css/signin.css" rel="stylesheet">-->
    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">
    <!-- Extended styles for this page -->
    <link href="css/ofc_css_style.css" rel="stylesheet">


</head>

  <body>
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
  <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
<!--              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>-->
                <a class="navbar-brand" href="ofc_welcome.php">OurFamilyConnections</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <p>This is a test</p>
            </div> <!-- Collapse Navbar -->
        </div> <!-- container -->
  </nav>
<div class="container">
    <div class="row">
        <div class="col-sm-6 bg-warning">
            <h2 class="text-center">WELCOME</h2>
                <h3 class="text-center">Please Register</h3>
                <h4 align="center"><strong><font color="red">* All fields MUST be filled in</font></strong></h4>
                <h4 align="center"><strong>Note:</strong> Password must be at least 7 characters, contain one uppercase letter, one lowercase letter, and one number (0-9) or one special character.</h4>
                <form id="register">
                    <div class="form-group">
                        <label for="confirmhcode">I received a church Confirmation Code:</label>
                        <div class="form-check form-check-inline churchcodecheck">
                            <input class="form-check-input" type="radio" name="confirmcode" id="codeyes" value="YES" checked>
                                <label class="form-check-label" for="codeyes">YES</label>
                        </div>
                        <div class="form-check form-check-inline churchcodecheck">
                            <input class="form-check-input" type="radio" name="confirmcode" id="codeno" value="NO">
                                <label class="form-check-label" for="codeno">NO</label>
                        </div>
                        <label id="churchcodelabel" for="churchcode">Enter the Confirmation Code received from your church's administrator: <strong><font color="red">*</font></strong></label>
                        <input type="text" class="form-control" id="churchcode" aria-describedby="churchcode" placeholder="confirmation code">
                        </input>
                        <label for="username">Select a User Name: <strong><font color="red">*</font></strong></label>
                        <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="UserName">
                        </input>
                        <label for="password">Choose a Password: <strong><font color="red">*   </font></strong><span id="register_result"></span></label>
                        <input type="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="StrongPassword">
                        </input>
                        <label for="repeatpassword">Re-enter your Password: <strong><font color="red">*   </font></strong><span id="password_match"></span></label>
                        <input type="password" class="form-control" id="repeatpassword" aria-describedby="emailHelp" placeholder="StrongPassword">
                        </input>
                        <label for="firstname">Your First Name: <strong><font color="red">*</font></strong></label>
                        <input type="text" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="First Name">
                        </input>
                        <label for="lastname">Your Last Name: <strong><font color="red">*</font></strong></label>
                        <input type="text" class="form-control" id="lastname" aria-describedby="emailHelp" placeholder="Last Name">
                        </input>
                    </div>
                </form>
                <form name='form1' id="register" action='' method="POST">
                    <table class="ofc_content" width="550" border="0" cellpadding="1" cellspacing="1" >
                        <tr>
                            <td>
                                <p></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p></p>
                            </td>
                        </tr>
<!--                        <tr>
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
                                <input name="password" id="password" type="password"/>
                                <span id="register_result"></span>
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
                                <td><input type='radio' name='gender' value="M"> M</td>
                        </tr>
                        <tr>
                                <td width="50%">&nbsp</td>
                                <td ><input type='radio' name='gender' value="F"> F</td>
                        </tr>
                        <tr>
                                <td align="right">
                                Your email address:
                                </td>
                                <td>
                                <input type='email' name='emailaddr' value="<?php echo $emailaddr; ?>">
                                </td>
                        </tr>
                        <tr>
                                <td align="right">
                                Re-enter your email address:
                                </td>
                                <td>
                                <input type='email' name='repeatemailaddr' value="<?php echo $repeatemailaddr; ?>">
                                </td>
                        </tr>-->
                        <tr>
                            <td>
                            </td>
                            <td>
                            <table>
                            <tr>
                                    <td>
                                            <input type='submit' id="register_submit" name='submit' value='Register'>
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
            </div> <!--col-sm-6-->
<!--        </div> row

        <div class="row"> -->
            <div class="col-sm-6">
                <div class="card bg-light border-primary text-center m-3">
                    <img class="card-img-top" src="images/trinity_logo_web.png" style="width: 75%; align-self: center" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title">What happens next</h3>
                        <p>After completing this entry form, our administrators will verify and approve your request to access our site.</p>
                        <p>You will be notified via email (using the address at left) that your access has been granted.</p>
                        <p>If you don't receive an email notification within 48 hours <strong>(don't forget to check your Junk Mail folder)</strong>, please contact one of our church elders for assistance.</p>
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col-sm-6 -->
        </div> <!-- row -->
</div> <!-- container -->

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
						$regentryexist = $mysql->query($regentryquery) or die("A database error has occurred. Please notify your administrator with the following. Error : " . mysql_errno() . mysql_error());

						$regentrynumrows = $regentryexist->num_rows;
						if($regentrynumrows == 0)
						{
							if($gender == 'M') 
							{
								$regquery = $mysql->query("INSERT INTO " . $_SESSION['dirtablename'] . " (Name_1, Surname, Email_1, Picture_Link, Picture_Taken) VALUES ('$firstname','$lastname','$emailaddr', 'x', 'N')") or die("Unable to create new user record in directory. Error : " . mysql_errno() . mysql_error());
							}
							else //$gender = 'F'
							{
								$regquery = $mysql->query("INSERT INTO " . $_SESSION['dirtablename'] . " (Name_2, Surname, Email_2, Picture_Link, Picture_Taken) VALUES ('$firstname','$lastname','$emailaddr', 'x', 'N')") or die("Unable to create new user record in directory. Error : " . mysql_errno() . mysql_error());
							}
							$regInsertID = $mysql->insert_id;
							$reglogliquery = $mysql->query("INSERT INTO " . $_SESSION['logintablename'] . " (username, password, idDirectory, firstname, lastname, gender, email_addr) VALUES ('$username','$password','$regInsertID','$firstname','$lastname','$gender','$emailaddr')") or die("Unable to create new login record in directory. Error : " . mysql_errno() . mysql_error());
							if(!$regquery)
								{

									if ($mysql->errno==1062) //unable to add Directory entry due to duplicate username record in logintable
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
									$regmailadmins = $mysql->query("SELECT email_addr FROM " . $_SESSION['logintablename'] . " WHERE admin_regnotify = '1'");
									$regmaillink = "http://ofctest.ourfamilyconnections.org";								
									while($regmailrow = $regmailadmins->fetch_assoc())
									{
										$regmailtest = $regmailrow['email_addr'];									
										$regmailto = $regmailtest . " , " . $regmailto;
									}									
									$regmailsubject = "Membership Request to (OFC_TEST) Our Family Connections"."\n..";
									$regmailmessage = "Hello (OFC_TEST)! " . "\n" . $firstname . " " . $lastname . " has requested to be added to Our Family Connections.\n\nLogin to our site using your admin credentials, select the <strong>Access Admin</strong> menu item, and accept or reject this request \n\n" . $regmaillink;
									$regmailfrom = "newfamilyrequest@ourfamilyconnections.org";
									$regmailheaders = "From:" . $regmailfrom . "\r\n";
									$regmailheaders .= "MIME-Version: 1.0\r\n";
									$regmailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
									mail($regmailto,$regmailsubject,$regmailmessage,$regmailheaders);
									echo "<center><table id='profiletable'><tr><td class='strong'>Hi " . $firstname . "!  <br><br>(OFC_TEST) You should receive a welcome email within 48 hours<br>Thank you for your patience!<br><br><a href='tecwelcome.php'>Return to Login Page</a></td></tr></table></center>";
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
-->	
</body>
</html>
