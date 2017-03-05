<?php 
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<link href="css/ofcstyle.css" rel="stylesheet" type="text/css" />
<title>Welcome to Our Family Connections</title>

<!--Set Focus on User Name Entry textbox-->
<script type="text/javascript">
function focus_on_start()
 {
 document.form1.myemailaddress.focus();
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
			<li> <a href='/ofc_welcome.php'>Welcome</a></li>

<?php
	require_once('ofc_menu.php');
?>
		</ul>
	</div>
	<div id="content">
		<div id="left">
			<h1>Welcome to Trinity Family Connections</h1>
			

<p>Trinity Evangel Church is a community of Christians who worship a great God, who proclaim a potent gospel, and who love serving one another</p>
<p align="center">We believe in the inerrancy and sufficiency of God&#39;s Word</p>
<p align="center">We believe in the sovereignty of God&#39;s grace</p>
<p align="center">We believe in the priority of life-on-life discipleship</p>			
			
<!--			<h1>Photos of our family</h1>
			<div id="photos">
			<a href="http://trinityevangel.ourfamilyconnections.org/#"><img src="/images/photo2.png" alt="photo" /></a>
			<a href="http://trinityevangel.ourfamilyconnections.org/#"><img src="/images/photo3.png" alt="photo" /></a>
			<a href="http://trinityevangel.ourfamilyconnections.org/#"><img src="/images/photo4.png" alt="photo" /></a>
			</div>
-->
		</div>
		<div id="right">

<?php
	if(!$_SESSION['logged in']) {
			session_destroy();
			echo "<h2>Register for Access</h2>";
}
?>
<?php
	if(!$_SESSION['logged in']) {
echo "<table border='0' align='center' cellpadding='0' cellspacing='1' >";
echo "<p></p>";
echo "<tr> 		<form name='form1' method='post' action='ofc_registerlogin.php'>";
echo "<td><table width='100%' border='0' cellpadding='3' cellspacing='1' > 		<tr> 		<td colspan='3'><strong>Verify your email address below </strong></td> 		</tr>";
echo "<p></p>";
echo "<tr><td width='350' align='right'>Email Address</td> 		<td width='6'>:</td>";
echo "<td width='294'><input name='myemailaddress' type='text' id='myemailaddress'></td> 		</tr>";
echo "<tr> 		<td>&nbsp</td> 		<td>&nbsp</td> 		<td><input type='submit' name='Submit' value='Register'></td> 		</tr> 	</table>";
//echo "<p><a href='tecrecover.php'>Forgot your Password?</a><p>";
//echo "<p> 		<a href='tecregister.php'>Register as new family member?</a>";
echo "</td> 		</form> 		</tr> 	</table> ";
}
else {
	echo "<br /><br /><h2>Welcome back" . "<br />" . $_SESSION['username'] . "<br />" . "to" . "<br />" . "Our Family Connections!</h2>The links above will take you to a whole new world of exciting opportunities as a member of our Family!";
	}
?>			

		</div>
		<div id="footerline"></div>
	</div>
	

<?php
	require_once('/ofc_footer.php');
?>
	
</div>
</body>
</html>