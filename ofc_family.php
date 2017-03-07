<?php 
session_start();
if(!$_SESSION['logged in']) {
	header("location:ofc_welcome.php");
	exit();
}
    require_once('ofc_dbconnect.php');

//Query for member names
$sqlquery = "SELECT * FROM $dir_tbl_name WHERE Status = 1"; //Status=1 identifies user is an active participant at TEC 
$result = @mysql_query($sqlquery) or die(" SQL query error on table directory. Error:" . mysql_errno() . " " . mysql_error());
$count = mysql_num_rows($result); // Mysql_num_row is count of table rows returned - number of active participants at TEC
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<link href="css/ofc_style.css" rel="stylesheet" type="text/css" />
<title>Our Family - Trinity Family Connections</title>

<!--*******************************DataTables stylesheet data**************************************-->
  	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> 

	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#table_id').DataTable({
							"order": [[ 1, 'asc' ], [ 2, 'asc' ]],	"scrollY": "600px", "scrollCollapse": true, "paging": false

							});
			});
			
//			$(document).ready(function() {    $('#table_id').DataTable( {
//				 "bJQueryUI": true, "sScrollY": "600px", "bPaginate": true, "aaSorting": [[ 1, "asc" ]], "iDisplayLength": 100, "bLengthChange": false, "bFilter": true, "bSort": true, "bInfo": false, "bAutoWidth": true, "sWrapper": "25px"} );} );
		</script>
<!--*******************************DataTables stylesheet data**************************************-->

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
			<br>
			<h2>Our Family Directory</h2>
			<hr>
<table id="detailheading">

<tr>
<td colspan="2" align="center">
<h3>Your view into our Family</h3>
</td>
</tr>

<tr>
<td class="header">
We'd love to hear from you!
</td>
<td class="header">
Want to learn more?
</td>
</tr>
<tr>
<td class="content">
Click on an email address to launch your own email service and send a word of encouragement!
</td>
<td class="content">
Click on '<u>view</u>' to see more information about a Family member.
</td>
</tr>
<tr>
<td class="header">
Legend</td>
<td class="header">
Download our Family Directory</td>
</tr>
<tr>
<td class="content">
** Phone Numbers: H)Home Phone;   M)His Cell;   W)Her Cell
</td>
<td class="content">
<!-- <li><a href="/Documents/TECDirectory-address.pdf">Address Directory Download (PDF 250KB)</a></li>
<li><a href="/Documents/TECDirectory-contact.pdf">Contact Info Download (PDF 250KB)</a></li>
 -->
<strong>Coming Soon</strong></a>

</td>
</tr>

<tr>
<br />
<td></td>
<td align="right">
<!--	<a href="ofcdirectoryprint.php">Print PDF</a>-->
</td>
</tr>

</table>

<table id="table_id" class="display" cellpadding="0" cellspacing="0" border="1">

<!--	<table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">-->

	<thead>
		<tr>
			<th>Profile</th>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Address</th>
			<th>Phone Numbers **</th>
			<th>Email Address</th>
		</tr>
	
	</thead>

	<tbody>

<?php
	if ($count == 0)
	{
		echo "no data";
		exit();
	}
	while($row = @mysql_fetch_assoc($result)) {
//		echo "<tr><td><img src=imageview.php width='25' height='25'>"."</td>";
		if(!$row['Internet_Restrict']){
			echo "<tr><td>" . "<a href='/ofc_famview.php?id=" . $row['idDirectory'] . "'>view</a>"."</td>";
			}
			else {
				echo "<tr><td>" . "view" . "</td>";
				}
//		echo "<tr><td>" . "<a href='ofcwelcome.php" . "'>back</a>"."</td>";
		echo "<td>" . $row['Surname']."</td>";
		echo "<td>" . $row['Name_1'] . "<br>" . $row['Name_2'] . "</td>";
		if(!$row['Internet_Restrict']){
			if($row['City'] && $row['State']){
				$address = $row['Address'] . $row['Address2'] . "<br>" . $row['City'] . ", " . substr($row['State'],0,2) . " " . $row['Zip'];
				}
				else {
					$address = $row['Address'] . $row['Address2'] . "<br>" . $row['City'] . substr($row['State'],0,2) . " " . $row['Zip'];
					}
					$phone_detail = "H " . $row['Phone_Home'] . "<br>" . "M " . $row['Phone_Cell1'] . "<br>" . "W " . $row['Phone_Cell2'];
					$email_detail = "<br><a href='mailto:" . $row['Email_1'] . "'>" . $row['Email_1'] . "</a><br>" . "<a href='mailto:" . $row['Email_2'] . "'>" . $row['Email_2'] . "</a>";
					}
					else {
						$address = "";
						$phone_detail = "H<br>M<br>W";
						$email_detail = "<br><br>";
						}
		echo "<td>" . $address."</td>";
		echo "<td>" . $phone_detail."</td>";
		echo "<td>" . $email_detail."</td></tr>";

		}
?>	

	</tbody>
	<tfoot>
		<tr>
			<th>Profile</th>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Address</th>
			<th>Phone Numbers **</th>
			<th>Email Address</th>
		</tr>
	</tfoot>

	</table>




		<div id="footerline"></div>
	</div>
	
<?php
	require_once('/ofc_footer.php');
?>
</div>
</body>
</html>
