<?php 
session_start();
require_once 'ofc_dbconnect.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Please Register</title>

    <!-- Bootstrap 4 BETA CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
<!--    <link href="css/signin.css" rel="stylesheet">-->
    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">
    <!-- Extended styles for this page -->
    <link href="css/ofc_css_style.css" rel="stylesheet">
    
<!-- Initialize jquery js script -->
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>

<!-- jQuery (necessary for Bootstrap's (BOOTSTRAP 4 BETA) JavaScript plugins) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<!-- Form field reset script - in case of back button usage to return to this form -->
<script type="text/javascript" src="js/reset_register_form.js"></script>
      
<!-- Registration submission check script -->
<script type="text/javascript" src="js/ofc_register_submit_check.js"></script>

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
<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="navbar-header">
        <a class="navbar-brand" href="ofc_welcome_new.php">OurFamilyConnections</a>
    </div>
</nav>
<div class="container-fluid profile_bg">
    <div class="row">
        <p>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                How do I register
            </button>
        </p>
    </div> <!-- row -->
    <div class="collapse" id="collapseExample">
        <div class="row">
            <div class="col-sm-6">
                    <div class="card card-body">
                        <h4 class="card-title">Confirmation Code</h4>
                        <ul class="card-text">
                            <li>Your administrator may have provided a Code for you.</li>
                            <li>Select Yes and enter the 5-digit Confirmation Code.</li>
                        </ul>
                        <h4 class="card-title">User Name</h4>
                        <ul class="card-text">
                            <li>Select a unique User Name for your registration.</li>
                            <li>User Name must be 5 or more characters.</li>
                        </ul>
                        <h4 class="card-title">Password</h4>
                        <ul class="card-text">
                            <li>Password must be at least 7 characters, contain one uppercase letter, one lowercase letter, and one number (0-9) or one special character.</li>
                        </ul>
                    </div>
            </div> <!-- col-sm-6 -->
            <div class="col-sm-6">
                    <div class="card card-body">
                        <h4 class="card-title">First and Last Name</h4>
                        <ul class="card-text">
                            <li>First and Last Name must contain at least one character.</li>
                        </ul>
                        <h4 class="card-title">Email Address</h4>
                        <ul class="card-text">
                            <li>Email address will be used to correspond with other OFC family members.</li>
                        </ul>
                    </div>
            </div> <!-- col-sm-6 -->
        </div> <!-- row -->
        <br>
    </div> <!-- collapse --> 
    <div class="row">
        <div class="col-sm-6">
<!--            <div class="card bg-light border-primary m-3">-->
            <div class="card bg-light border-primary p-3">
                <h2 class="text-center">WELCOME</h2>
                <h3 class="text-center">Please Register</h3>
                <h4 align="center"><strong><font color="red">* All fields MUST be filled in</font></strong></h4>
<!--                <h4 align="center"><strong>Note:</strong> Password must be at least 7 characters, contain one uppercase letter, one lowercase letter, and one number (0-9) or one special character.</h4>-->
                <form name='registernew' id="register" action='/services/ofc_register_submit.php' method="POST">
                    <div class="form-group">
                        <label for="confirmcode">I received a Confirmation Code:</label>
                        <div class="form-check churchcodecheck">
                            <input class="form-check-input" type="radio" name="confirmcode" id="codeyes" value="YES">
                                <label class="form-check-label" for="codeyes">YES</label>
                        </div>
                        <div class="form-check churchcodecheck">
                            <input class="form-check-input" type="radio" name="confirmcode" id="codeno" value="NO" checked>
                                <label class="form-check-label" for="codeno">NO</label>
                        </div>
                        <label id="churchcodelabel" for="churchcode">Enter your 5-digit Confirmation Code: <strong><font color="red">*</font></strong><span id="confirm_code_len"></span></label>
                        <input type="text" class="form-control" name="churchcodename" id="churchcode" aria-describedby="churchcode" placeholder="confirmation code">
                        </input>
                        <label for="username">Select a User Name: <strong><font color="red">*</font></strong><span id="unique_user"></span></label>
                        <input type="text" class="form-control" name="usernamename" id="username" aria-describedby="emailHelp" placeholder="UserName">
                        </input>
                        <label for="password">Choose a Password: <strong><font color="red">*   </font></strong><span id="register_result"></span></label>
                        <input type="password" class="form-control" name="passwordname" id="password" aria-describedby="emailHelp" placeholder="StrongPassword">
                        </input>
                        <label for="repeatpassword">Re-enter your Password: <strong><font color="red">*   </font></strong><span id="password_match"></span></label>
                        <input type="password" class="form-control" id="repeatpassword" aria-describedby="emailHelp" placeholder="StrongPassword">
                        </input>
                        <label for="firstname">Your First Name: <strong><font color="red">*</font></strong></label>
                        <input type="text" class="form-control" name="firstnamename" id="firstname" aria-describedby="emailHelp" placeholder="First Name">
                        </input>
                        <label for="lastname">Your Last Name: <strong><font color="red">*</font></strong></label>
                        <input type="text" class="form-control" name="lastnamename" id="lastname" aria-describedby="emailHelp" placeholder="Last Name">
                        </input>
                        <label for="emailaddress">Your Email Address: <strong><font color="red">*</font></strong><span id="email_choose"></span></label>
                        <input type="email" class="form-control" name="emailaddressname" id="emailaddress" aria-describedby="emailHelp" placeholder="Email Address">
                        </input>
                        <label for="repeatemailaddress">Re-enter your Email Address: <strong><font color="red">*</font></strong><span id="email_match"></span></label>
                        <input type="email" class="form-control" id="repeatemailaddress" aria-describedby="emailHelp" placeholder="Email Address">
                        </input>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-secondary" name="clear" value="Clear" />
                        <input type="submit" class="btn btn-primary disabled" name="registersubmit" id="register_submit" value="Register" />
                    </div>
                </form>
            </div> <!--card-->
        </div> <!--col-sm-6-->
        <div class="col-sm-6">
            <div class="card bg-light border-primary text-center p-3">
                <!--<img class="card-img-top" src="images/trinity_logo_web.png" style="width: 75%; align-self: center" alt="Card image cap">-->
                <img class="card-img-top" src="images/ourfamilyconnections4.png" style="width: 75%; align-self: center" alt="Card image cap">
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

    $confirmcode = strip_tags($_POST['churchcodename']);
    $username = strip_tags($_POST['usernamename']);
    $password = strip_tags($_POST['passwordname']);
    $firstname = strip_tags($_POST['firstnamename']);
    $lastname = strip_tags($_POST['lastnamename']);
    $emailaddr = strip_tags($_POST['emailaddressname']);
    $date = date("Y-m-d");
	
    if($clear)
    {
        $confirmcode = "";
        $username = "";
        $password = "";
        $firstname = "";
        $lastname = "";
        $emailaddr = "";
    }
    if ($submit)
    {
        if(all_req_fields == 'Y'){
            echo '<script language="javascript">';
            echo 'alert("All Required Fields are correct")';
            echo '</script>';
        }
        else {
            echo '<script language="javascript">';
            echo 'alert("Missing Required Fields")';
            echo '</script>';
        }

    }
//        if($username&&$emailaddr&&$firstname&&$lastname&&$password&&$gender)
//        {
//            if($emailaddr==$repeatemailaddr)
//            {
//                if($password==$repeatpassword)
//                {
//                    if(strlen($password)<7||strlen($password)>19)
//                    {
//                    echo "<strong><font color='Red'>Password must be at least 7 characters and less than 20 characters in length.</font> Please retry</strong>";
//                    }
//                        else 
//                        {
//                            //Register the User
//                            $password = md5($password);
//                            $repeatpassword = md5($repeatpassword);
//                            $regentryquery = "SELECT username from " . $_SESSION['logintablename'] . " WHERE username = '" . $username . "'";
//                            $regentryexist = $mysql->query($regentryquery) or die("A database error has occurred. Please notify your administrator with the following. Error : " . mysql_errno() . mysql_error());
//                            $regentrynumrows = $regentryexist->num_rows;
//                            if($regentrynumrows == 0)
//                            {
//                                if($gender == 'M') 
//                                {
//                                        $regquery = $mysql->query("INSERT INTO " . $_SESSION['dirtablename'] . " (Name_1, Surname, Email_1, Picture_Link, Picture_Taken) VALUES ('$firstname','$lastname','$emailaddr', 'x', 'N')") or die("Unable to create new user record in directory. Error : " . mysql_errno() . mysql_error());
//                                }
//                                else //$gender = 'F'
//                                {
//                                        $regquery = $mysql->query("INSERT INTO " . $_SESSION['dirtablename'] . " (Name_2, Surname, Email_2, Picture_Link, Picture_Taken) VALUES ('$firstname','$lastname','$emailaddr', 'x', 'N')") or die("Unable to create new user record in directory. Error : " . mysql_errno() . mysql_error());
//                                }
//                                $regInsertID = $mysql->insert_id;
//                                $reglogliquery = $mysql->query("INSERT INTO " . $_SESSION['logintablename'] . " (username, password, idDirectory, firstname, lastname, gender, email_addr) VALUES ('$username','$password','$regInsertID','$firstname','$lastname','$gender','$emailaddr')") or die("Unable to create new login record in directory. Error : " . mysql_errno() . mysql_error());
//                                if(!$regquery) {
//                                    if ($mysql->errno==1062) { //unable to add Directory entry due to duplicate username record in logintable
//                                        echo "<strong><font color='Red'>Someone else with that Username is already a member.</font> Please retry</strong>";
//                                    }
//                                    else {
//                                        die("A database error has occurred. Please notify your administrator with the following. Error : ".mysql_errno().mysql_error());
//                                    }
//                                }
//                                else {
//                                    $regmailadmins = $mysql->query("SELECT email_addr FROM " . $_SESSION['logintablename'] . " WHERE admin_regnotify = '1'");
//                                    $regmaillink = "http://ofctest.ourfamilyconnections.org";								
//                                    while($regmailrow = $regmailadmins->fetch_assoc()) {
//                                        $regmailtest = $regmailrow['email_addr'];									
//                                        $regmailto = $regmailtest . " , " . $regmailto;
//                                    }									
//                                    $regmailsubject = "Membership Request to (OFC_TEST) Our Family Connections"."\n..";
//                                    $regmailmessage = "Hello (OFC_TEST)! " . "\n" . $firstname . " " . $lastname . " has requested to be added to Our Family Connections.\n\nLogin to our site using your admin credentials, select the <strong>Access Admin</strong> menu item, and accept or reject this request \n\n" . $regmaillink;
//                                    $regmailfrom = "newfamilyrequest@ourfamilyconnections.org";
//                                    $regmailheaders = "From:" . $regmailfrom . "\r\n";
//                                    $regmailheaders .= "MIME-Version: 1.0\r\n";
//                                    $regmailheaders .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//                                    mail($regmailto,$regmailsubject,$regmailmessage,$regmailheaders);
//                                    echo "<center><table id='profiletable'><tr><td class='strong'>Hi " . $firstname . "!  <br><br>(OFC_TEST) You should receive a welcome email within 48 hours<br>Thank you for your patience!<br><br><a href='tecwelcome.php'>Return to Login Page</a></td></tr></table></center>";
//                                        }
//
//                                }
//                                else 
//                                {
//                                        echo "<strong><font color='Red'>Someone else with that Username is already a member.</font> Please retry</strong>";
//                                }
//                            }
//                        }
//                        else
//                        {
//                                echo "<strong><font color='Red'>Your passwords do not match.</font> Please retry</strong>";
//                        } 
//                }
//                else  
//                {
//                echo "<strong><font color='Red'>Your email addresses do not match.</font> Please retry</strong>";	
//                $repeatemailaddr = "";				
//                }
//            }
//            else 
//            {
//            echo "<strong><font color='Red'>Please fill in all fields.</font> Please retry</strong>";
//            }
//    }
?>

</body>
</html>
