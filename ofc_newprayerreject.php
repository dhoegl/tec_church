<?php 
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	header("location:ofc_welcome.php");
	exit();
}

require_once('ofc_dbconnect.php');

$prayer_id = $_GET['prayerid'];

$newprayerquery = "SELECT * FROM $prayer_tbl_name p INNER JOIN $dir_tbl_name d on p.owner_id = d.idDirectory WHERE p.prayer_id = '$prayer_id' AND d.Status=1";
$newprayerresult = $mysql->query($newprayerquery) or die(" Prayer query error. Error:" . mysql_errno() . " " . mysql_error());

$row = $newprayerresult->fetch_assoc();
	if($row['approved']==0)
	{

		$recordID = $row['owner_id'];
		$prayerfrom = $row['name'];
		$prayertitle = $row['title'];
		$prayerdate = $row['create_date'];
		$prayertext = $row['prayer_text'];
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<link href="css/ofc_style.css" rel="stylesheet" type="text/css" />
<title>Reject Prayer Request</title>
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
<?php
	require_once('ofc_menu.php');

?>

		</ul>
	</div>
	<div id="content">

	<div id="left">
			<h2>Reject Prayer Request</h2>
			<p>
			<h3>REJECT this prayer?</h3>

<?php
		
	$submit = $_POST['submit'];
	$clear = $_POST['clear'];

	
if($clear)
	{
		header("location:ofc_prayeradmin.php");
//		echo "Clear was clicked";
	}
if ($submit)
	{
			$acceptquerydir = "DELETE from " . $_SESSION['prayertable'] . " WHERE prayer_id = '$prayer_id'";			
			$acceptresultdir = $mysql->query($acceptquerydir)or die("A prayer request database error has occurred - DELETE. Please notify your administrator with the following. Error : " . mysql_errno() . mysql_error());

			$verifyacceptquerydir = "SELECT * FROM " . $_SESSION['prayertable'] . " WHERE prayer_id = '$prayer_id'";

			$verifyacceptresultdir = $mysql->query($verifyacceptquerydir);
			$verifyacceptcountdir = $verifyacceptresultdir->num_rows;

			if($verifyacceptcountdir == 0)
				{
					echo "<script language='javascript'>";
					echo "alert('Reject completed')";
					echo "</script>";
					header("location:ofc_prayeradmin.php");
				}
				else 
				{
					echo "<strong><font color='Red'>Reject failed</font></strong>";
				}
	}
?>

<form action="" method="POST">
	<table>
		<tr>
			<td class="key">From:</td>
			<td colspan="2" class="strong">
				<?php echo $prayerfrom ?>
			</td>
		</tr>
		<tr>
			<td class="key">Title:</td>
			<td colspan="2" class="strong"><?php echo $prayertitle ?></td>
		</tr>
		<tr>
			<td class="key">Date:</td>
			<td colspan="2" class="strong"><?php echo $prayerdate ?></td>
		</tr>
		<tr>
			<td>&nbsp</td>
		</tr>
		<tr>
			<td>
			<input type='submit' class="button_flat_blue" name='submit' value="YES - Reject">
			</td>
			<td>&nbsp &nbsp</td>
			<td>
			<input type='submit' class="button_flat_blue" name='clear' value="NO - Cancel">
			</td>
		</tr>
	</table>
	<p>
	<br />
	

</form>
</div>

	<div id="right">
		<h2>Instructions</h2>
		<p>Click YES to reject this prayer request from Our Family Connections.</p> 
			<p style="color:red"><strong>Request will be removed from our database.</strong></p>
		<p>Press NO to leave this request for later processing. <strong>NOTE: </strong> Request will remain in our database, but not publicly visible.</p>
		</div>
		<div id="footerline"></div>
	</div>
	

</div>
</body>
</html>