<?php 
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	header("location:ofc_welcome.php");
	exit();
}

   require_once('ofc_dbconnect.php');

$profileaddr = $_GET['id'];
$_SESSION["Famview_Profile"] = $profileaddr;
$sqlquery = "SELECT * FROM $dir_tbl_name WHERE idDirectory = '$profileaddr'";
$result = @mysql_query($sqlquery) or die(" SQL query error Directory table. Error:" . mysql_errno() . " " . mysql_error());

$count = @mysql_num_rows($result);

$row = @mysql_fetch_assoc($result);
	if($row['Internet_Restrict']<>1)
	{

		$recordID = $row['idDirectory'];
		$recordFirstHim = $row['Name_1'];
		$recordFirstHer = $row['Name_2'];
		$recordLast = $row['Surname'];
		$recordAddr1 = $row['Address'];
		$recordAddr2 = $row['Address2'];
		$recordCity = $row['City'];
		$recordState = $row['State'];
		$recordZip = $row['Zip'];
		$recordEmail1 = $row['Email_1'];
		$recordEmail2 = $row['Email_2'];
		$recordPhoneH = $row['Phone_Home'];
		$recordPhoneC1 = $row['Phone_Cell1'];
		$recordPhoneC2 = $row['Phone_Cell2'];
		$recordBDay1 = $row['BDay_1_Date'];
		$recordBDay2 = $row['BDay_2_Date'];
		$recordAnniv = $row['Anniv_Date'];
		$recordpiclink = $row['Picture_Link'];
		$recordpiclink2 = $row['ProfilePhoto_New'];
		$recordL2L = $row['L2L_ID'];
		$recordChild_1_Name = $row['Child_1_Name'];
		$recordChild_1_BDay = $row['Child_1_Bday_Date'];
		$recordChild_1_Email = $row['Child_1_Email'];
		$recordChild_1_Gender = $row['Child_1_Gender'];
		$recordChild_2_Name = $row['Child_2_Name'];
		$recordChild_2_BDay = $row['Child_2_Bday_Date'];
		$recordChild_2_Email = $row['Child_2_Email'];
		$recordChild_2_Gender = $row['Child_2_Gender'];
		$recordChild_3_Name = $row['Child_3_Name'];
		$recordChild_3_BDay = $row['Child_3_Bday_Date'];
		$recordChild_3_Email = $row['Child_3_Email'];
		$recordChild_3_Gender = $row['Child_3_Gender'];
		$recordChild_4_Name = $row['Child_4_Name'];
		$recordChild_4_BDay = $row['Child_4_Bday_Date'];
		$recordChild_4_Email = $row['Child_4_Email'];
		$recordChild_4_Gender = $row['Child_4_Gender'];
		$recordChild_5_Name = $row['Child_5_Name'];
		$recordChild_5_BDay = $row['Child_5_Bday_Date'];
		$recordChild_5_Email = $row['Child_5_Email'];
		$recordChild_5_Gender = $row['Child_5_Gender'];
		$recordChild_6_Name = $row['Child_6_Name'];
		$recordChild_6_BDay = $row['Child_6_Bday_Date'];
		$recordChild_6_Email = $row['Child_6_Email'];
		$recordChild_6_Gender = $row['Child_6_Gender'];
		$recordChild_7_Name = $row['Child_7_Name'];
		$recordChild_7_BDay = $row['Child_7_Bday_Date'];
		$recordChild_7_Email = $row['Child_7_Email'];
		$recordChild_7_Gender = $row['Child_7_Gender'];
		$recordChild_8_Name = $row['Child_8_Name'];
		$recordChild_8_BDay = $row['Child_8_Bday_Date'];
		$recordChild_8_Email = $row['Child_8_Email'];
		$recordChild_8_Gender = $row['Child_8_Gender'];


}

	/*Query Life 2 Life Group participation */
	
	
	$L2Lquery = "SELECT * FROM " . $_SESSION['l2ltablename'] . " l JOIN directory d ON d.L2L_ID = l.L2L_ID WHERE d.idDirectory = '" . $profileaddr . "'";
	$L2Lresult = @mysql_query($L2Lquery) or die(" SQL query error at select L2L Table Select. Error:" . mysql_errno() . " " . mysql_error());
	$L2Lcount = @mysql_num_rows($L2Lresult);

	if($L2Lcount==0){
		$recordL2L_Part = "N";
		}
		else {
				while($L2Lrow = @mysql_fetch_assoc($L2Lresult)) {
					$recordL2L_Part = $L2Lrow['L2L_Name'];
					}
				}

	/*Query access level to page: Validate user can edit page - admin_profilemaint = 1 & Session[idDirectory]=$RecordID */

//	$LoginQuery = "SELECT l.admin_profilemaint FROM " . $_SESSION['logintablename'] . " l JOIN directory d ON d.idDirectory = l.idDirectory WHERE l.idDirectory = '" . $_SESSION['idDirectory'] . "'";
	$LoginQuery = "SELECT * FROM " . $_SESSION['logintablename'] . " WHERE login_ID = " . $_SESSION['user_id'];
	$Loginresult = @mysql_query($LoginQuery) or die(" SQL query error at SELECT Login validation. Error:" . mysql_errno() . " " . mysql_error());
	$Logincount = @mysql_num_rows($Loginresult);
	
				if($_SESSION['idDirectory'] == $recordID) {
					$MyView = 'Y';
					}
					else {
						$MyView = 'N';
					}
				while($Loginrow = @mysql_fetch_assoc($Loginresult)) {
					$admin_profilemaint = $Loginrow['admin_profilemaint'];
					}
				if($admin_profilemaint == 1) {
					$AdminView = 'Y';
					}
					else {
						$AdminView = 'N';
					}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<link href="css/ofc_style.css" rel="stylesheet" type="text/css" />
<title>TEC - Member Info</title>

<!--*****************************EDIT OVERLAY Script***********************************-->

<script src="http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js"></script>
<script src="http://cdn.jquerytools.org/1.2.6/form/jquery.tools.min.js"></script>

<!--*****************************EDIT OVERLAY Script***********************************-->	

<!--*******************************DataTables stylesheet data**************************************-->
<!--*******************************DataTables stylesheet data**************************************-->
<!--*******************************DataTables stylesheet data**************************************-->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<!-- Popup script from http://dev.vast.com/jquery-popup-overlay/ -->
	<script src="https://cdn.rawgit.com/vast-engineering/jquery-popup-overlay/1.7.13/jquery.popupoverlay.js"></script>


<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

<!-- jQuery functions & scripts -->
<!-- jQuery functions & scripts -->
<!-- jQuery functions & scripts -->

<!-- Call Image Verify jQuery script -->
<script src="/js/image_verify.js"></script>
<script type="text/javascript" src="/js/ofc_tshoot.js"></script>

<?php
if($_SESSION['accesslevel'] == 2 || $_SESSION['accesslevel'] == 3) {
// Get My Prayer List
  	include('/includes/ofc_view_myprayerlist.php');

// Get My Prayer jQuery
   include('/includes/ofc_get_myprayer_jquery.php');

// Call Image Verify jQuery script
//   include('/includes/image_verify.php');
   
};
?>
<!--***************************** Execute troubleshooting scripts ***********************************-->
<!--***************************** Execute troubleshooting scripts ***********************************-->

<!--<script type="text/javascript">
	var $loggedin = + <?php echo "'" . $_SESSION['user_id'] . "'"; ?>;
	var $sessioniddir = + <?php echo "'" . $_SESSION['idDirectory'] . "'"; ?>;
	var $recordID = + <?php echo "'" . $recordID . "'"; ?>;
	var $profileaddr = + <?php echo "'" . $profileaddr . "'"; ?>;
	var $admin_profilemaint = + <?php echo "'" . $admin_profilemaint . "'"; ?>;
	var jQ100 = jQuery.noConflict();
	jQ100(document).ready(function() {
		console.log("Session User ID = " + $loggedin);
		console.log("Session ID Directory = " + $sessioniddir);
		console.log("RecordID = " + $recordID);
		console.log("Profileaddr = " + $profileaddr);
		console.log("Admin_profilemaint = " + $admin_profilemaint);
	});
</script>-->

<!--***************************** New Prayer Scripts ***********************************-->
<!--***************************** New Prayer Scripts ***********************************-->

<!-- Detect 'New Prayer' button click -->
<script type="text/javascript">
 var jQ4 = jQuery.noConflict();
	jQ4(document).ready(function() {
//		jQ4("#prayer_new_button").on("click", "button", function () {
		jQ4("#prayer_new_button").click(function () {
			console.log("New Prayer Button clicked");
// Launch New Prayer Popup
// http://dev.vast.com/jquery-popup-overlay/
		jQ4("#my_popup").popup({
		background: true, focusdelay: 400, transition: 'all 0.3s', vertical: 'top', outline: true, keepfocus: true, blur: false, color: "#D1E0B2",
		onopen: function () {
			console.log("Popup Opened for New Prayer");
		}
		});
	});
 });
</script>


<!--***************************** Update My Prayer Scripts ***********************************-->
<!--***************************** Update My Prayer Scripts ***********************************-->

<!-- Detect 'Update My Prayer' button click -->
<script type="text/javascript">
 var jQ50 = jQuery.noConflict();
	jQ50(document).ready(function() {
				jQ50("#my_prayer_button").click(function () {
				console.log("Update My Prayer Button clicked");
				jQ50("tr.praytable_even").hide();
				jQ50("tr.praytable_odd").hide();
				jQ50("tr.praytable_text").hide();
				jQ50("#updatePrayer").hide();
// Launch My Prayer Popup
// http://dev.vast.com/jquery-popup-overlay/
		jQ50("#my_popup2").popup({
		background: true, focusdelay: 400, transition: 'all 0.3s', vertical: 'top', autozindex: true, outline: true, keepfocus: true, blur: false, color: "#D1E0B2",
		onopen: function () {
			console.log("Popup Opened for Update My Prayer");
		}
		});
	});
});
</script>
<!-- Get Which Prayer Items 'Update' button was clicked -->
 <script type="text/javascript">
var $clickbuttonid = "NA";
var prayerWho = "NA";
var prayerTitle = "NA";
var jQ9 = jQuery.noConflict();
jQ9(document).ready(function () {
	jQ9("#myprayertable tbody").on("click", 'tr', function () {
		var prayerID = jQ9(this).closest('tr').find(".indexcol").text();
		$clickbuttonid = prayerID;
		console.log("$clickbuttonid (jQ9) = " + $clickbuttonid);
		var prayerDate = jQ9(this).closest('tr').find(".prayer_update").text();
		prayerWho = jQ9(this).closest('tr').find(".prayer_who").text();
		prayerTitle = jQ9(this).closest('tr').find(".prayer_title").text();
		var prayerType = jQ9(this).closest('tr').find(".type").text();
		var prayerText = jQ9(this).closest('tr').find(".full_text").text();
	});
});

</script>

<!-- Detect 'Update' button click to open my_popup3 -->
<script type="text/javascript">
 var jQ51 = jQuery.noConflict();
	jQ51(document).ready(function() {
		jQ51("#updatePrayer").click(function () {
	console.log("Update button clicked to open my_popup3 - $clickbuttonID (jQ51) = " + $clickbuttonid);
	jQ51(".my_popup3title").text(" " + prayerTitle);
	jQ51("#updatetext").val('');
// Launch Update Prayer Popup
// http://dev.vast.com/jquery-popup-overlay/
		jQ51('#my_popup3').popup({
		background: true, focusdelay: 400, transition: 'all 0.3s', vertical: 'top', autozindex: true, outline: true, keepfocus: true, blur: false, color: "#D1E0B2",
		onopen: function () {
			console.log("Popup3 Opened for Update");
		}
		});
	});
 });
</script>

<!-- Detect 'Send' update button click -->
<script type="text/javascript" >
var jQ52 = jQuery.noConflict();
	jQ52(document).ready(function() {
		jQ52("#submitUpdate").click(function () {
			var $idDirectory = "<?php echo $_SESSION['idDirectory'] ?>";
			var $fullname = "<?php echo $_SESSION['fullname'] ?>";
			$answered = jQ52('input[name=answered]:checked', '#updateprayerform').val();
			var $updatetext = jQ52('#updatetext').val();
			console.log("title = " + prayerTitle);
			console.log("answered = " + $answered);
			console.log("updatetext = " + $updatetext);
			console.log("prayerID = " + $clickbuttonid);
			console.log("idDirectory = " + $idDirectory);
			console.log("fullname = " + $fullname);
			var submitUpdate = jQ52.ajax({
			url: 'ofc_updateprayer.php',
			type: 'POST',
			dataType: 'json',
			data: { requestorID : $idDirectory, fullname : $fullname, prayerID : $clickbuttonid, answered : $answered, requesttitle : prayerTitle, updatetext : $updatetext}
		});
		jQ52("input[name=answered]").prop('checked', function () {
			return this.getAttribute('checked') == 'checked';
		});
		jQ52("#updatetext").val('');
		jQ52("tr.praytable_even").hide();
		jQ52("tr.praytable_odd").hide();
		jQ52("tr.praytable_text").hide();
		jQ52("#updatePrayer").hide();

	});
});

</script>

<!-- Detect profile 'Edit' button click -->
<script type="text/javascript" >
var jQ53 = jQuery.noConflict();
	jQ53(document).ready(function() {
		jQ53("#contactEdit").click(function () {
			jQ53("#my_popup4").popup({
				background: true, focusdelay: 400, transition: 'all 0.3s', vertical: 'top', autozindex: true, outline: true, keepfocus: true, blur: false, color: "#D1E0B2",
			});		
		});
		jQ53("#calendarEdit").click(function () {
			jQ53("#my_popup5").popup({
				background: true, focusdelay: 400, transition: 'all 0.3s', vertical: 'top', autozindex: true, outline: true, keepfocus: true, blur: false, color: "#D1E0B2",
			});		
		});
		jQ53("#childrenEdit").click(function () {
			jQ53("#my_popup6").popup({
				background: true, focusdelay: 400, transition: 'all 0.3s', vertical: 'top', autozindex: true, outline: true, keepfocus: true, blur: false, color: "#D1E0B2",
			});
				jQ53('#child1select').css('background-color', '#8FBC8F');
				jQ53('#child1edit').css('display', 'inline-block');
				jQ53('#child2edit').css('display', 'none');
				jQ53('#child3edit').css('display', 'none');
				jQ53('#child4edit').css('display', 'none');
				jQ53('#child5edit').css('display', 'none');
				jQ53('#child6edit').css('display', 'none');
				jQ53('#child7edit').css('display', 'none');
				jQ53('#child8edit').css('display', 'none');
		});
		jQ53("#picEdit").click(function () {
			jQ53("#my_popup7").popup({
			background: true, focusdelay: 400, transition: 'all 0.3s', vertical: 'top', autozindex: true, outline: true, keepfocus: true, blur: false, color: "#D1E0B2",
		});
	});
});
</script>

<!-- Child Edit Tabs - embedded in my_popup6 -->
<script type="text/javascript" >
var jQ54 = jQuery.noConflict();
	jQ54(document).ready(function() {
		jQ54('.childselectbutton').on('click', function(){
			var childselected = jQ54(this).attr('name');
			console.log('childselectbutton ' + childselected + ' has been clicked');
			switch(childselected) {
				case 'child1select':
					jQ54('#child1select').css('background-color', '#8FBC8F');
					jQ54('#child1edit').css('display', 'inline-block');
					jQ54('#child2select').css('background-color', '#0800ff');
					jQ54('#child2edit').css('display', 'none');
					jQ54('#child3select').css('background-color', '#0800ff');
					jQ54('#child3edit').css('display', 'none');
					jQ54('#child4select').css('background-color', '#0800ff');
					jQ54('#child4edit').css('display', 'none');
					jQ54('#child5select').css('background-color', '#0800ff');
					jQ54('#child5edit').css('display', 'none');
					jQ54('#child6select').css('background-color', '#0800ff');
					jQ54('#child6edit').css('display', 'none');
					jQ54('#child7select').css('background-color', '#0800ff');
					jQ54('#child7edit').css('display', 'none');
					jQ54('#child8select').css('background-color', '#0800ff');
					jQ54('#child8edit').css('display', 'none');
					break;
				case 'child2select':
					jQ54('#child1select').css('background-color', '#0800ff');
					jQ54('#child1edit').css('display', 'none');
					jQ54('#child2select').css('background-color', '#8FBC8F');
					jQ54('#child2edit').css('display', 'inline-block');
					jQ54('#child3select').css('background-color', '#0800ff');
					jQ54('#child3edit').css('display', 'none');
					jQ54('#child4select').css('background-color', '#0800ff');
					jQ54('#child4edit').css('display', 'none');
					jQ54('#child5select').css('background-color', '#0800ff');
					jQ54('#child5edit').css('display', 'none');
					jQ54('#child6select').css('background-color', '#0800ff');
					jQ54('#child6edit').css('display', 'none');
					jQ54('#child7select').css('background-color', '#0800ff');
					jQ54('#child7edit').css('display', 'none');
					jQ54('#child8select').css('background-color', '#0800ff');
					jQ54('#child8edit').css('display', 'none');
					break;
				case 'child3select':
					jQ54('#child1select').css('background-color', '#0800ff');
					jQ54('#child1edit').css('display', 'none');
					jQ54('#child2select').css('background-color', '#0800ff');
					jQ54('#child2edit').css('display', 'none');
					jQ54('#child3select').css('background-color', '#8FBC8F');
					jQ54('#child3edit').css('display', 'inline-block');
					jQ54('#child4select').css('background-color', '#0800ff');
					jQ54('#child4edit').css('display', 'none');
					jQ54('#child5select').css('background-color', '#0800ff');
					jQ54('#child5edit').css('display', 'none');
					jQ54('#child6select').css('background-color', '#0800ff');
					jQ54('#child6edit').css('display', 'none');
					jQ54('#child7select').css('background-color', '#0800ff');
					jQ54('#child7edit').css('display', 'none');
					jQ54('#child8select').css('background-color', '#0800ff');
					jQ54('#child8edit').css('display', 'none');
					break;
				case 'child4select':
					jQ54('#child1select').css('background-color', '#0800ff');
					jQ54('#child1edit').css('display', 'none');
					jQ54('#child2select').css('background-color', '#0800ff');
					jQ54('#child2edit').css('display', 'none');
					jQ54('#child3select').css('background-color', '#0800ff');
					jQ54('#child3edit').css('display', 'none');
					jQ54('#child4select').css('background-color', '#8FBC8F');
					jQ54('#child4edit').css('display', 'inline-block');
					jQ54('#child5select').css('background-color', '#0800ff');
					jQ54('#child5edit').css('display', 'none');
					jQ54('#child6select').css('background-color', '#0800ff');
					jQ54('#child6edit').css('display', 'none');
					jQ54('#child7select').css('background-color', '#0800ff');
					jQ54('#child7edit').css('display', 'none');
					jQ54('#child8select').css('background-color', '#0800ff');
					jQ54('#child8edit').css('display', 'none');
					break;
				case 'child5select':
					jQ54('#child1select').css('background-color', '#0800ff');
					jQ54('#child1edit').css('display', 'none');
					jQ54('#child2select').css('background-color', '#0800ff');
					jQ54('#child2edit').css('display', 'none');
					jQ54('#child3select').css('background-color', '#0800ff');
					jQ54('#child3edit').css('display', 'none');
					jQ54('#child4select').css('background-color', '#0800ff');
					jQ54('#child4edit').css('display', 'none');
					jQ54('#child5select').css('background-color', '#8FBC8F');
					jQ54('#child5edit').css('display', 'inline-block');
					jQ54('#child6select').css('background-color', '#0800ff');
					jQ54('#child6edit').css('display', 'none');
					jQ54('#child7select').css('background-color', '#0800ff');
					jQ54('#child7edit').css('display', 'none');
					jQ54('#child8select').css('background-color', '#0800ff');
					jQ54('#child8edit').css('display', 'none');
					break;
				case 'child6select':
					jQ54('#child1select').css('background-color', '#0800ff');
					jQ54('#child1edit').css('display', 'none');
					jQ54('#child2select').css('background-color', '#0800ff');
					jQ54('#child2edit').css('display', 'none');
					jQ54('#child3select').css('background-color', '#0800ff');
					jQ54('#child3edit').css('display', 'none');
					jQ54('#child4select').css('background-color', '#0800ff');
					jQ54('#child4edit').css('display', 'none');
					jQ54('#child5select').css('background-color', '#0800ff');
					jQ54('#child5edit').css('display', 'none');
					jQ54('#child6select').css('background-color', '#8FBC8F');
					jQ54('#child6edit').css('display', 'inline-block');
					jQ54('#child7select').css('background-color', '#0800ff');
					jQ54('#child7edit').css('display', 'none');
					jQ54('#child8select').css('background-color', '#0800ff');
					jQ54('#child8edit').css('display', 'none');
					break;
				case 'child7select':
					jQ54('#child1select').css('background-color', '#0800ff');
					jQ54('#child1edit').css('display', 'none');
					jQ54('#child2select').css('background-color', '#0800ff');
					jQ54('#child2edit').css('display', 'none');
					jQ54('#child3select').css('background-color', '#0800ff');
					jQ54('#child3edit').css('display', 'none');
					jQ54('#child4select').css('background-color', '#0800ff');
					jQ54('#child4edit').css('display', 'none');
					jQ54('#child5select').css('background-color', '#0800ff');
					jQ54('#child5edit').css('display', 'none');
					jQ54('#child6select').css('background-color', '#0800ff');
					jQ54('#child6edit').css('display', 'none');
					jQ54('#child7select').css('background-color', '#8FBC8F');
					jQ54('#child7edit').css('display', 'inline-block');
					jQ54('#child8select').css('background-color', '#0800ff');
					jQ54('#child8edit').css('display', 'none');
					break;
				case 'child8select':
					jQ54('#child1select').css('background-color', '#0800ff');
					jQ54('#child1edit').css('display', 'none');
					jQ54('#child2select').css('background-color', '#0800ff');
					jQ54('#child2edit').css('display', 'none');
					jQ54('#child3select').css('background-color', '#0800ff');
					jQ54('#child3edit').css('display', 'none');
					jQ54('#child4select').css('background-color', '#0800ff');
					jQ54('#child4edit').css('display', 'none');
					jQ54('#child5select').css('background-color', '#0800ff');
					jQ54('#child5edit').css('display', 'none');
					jQ54('#child6select').css('background-color', '#0800ff');
					jQ54('#child6edit').css('display', 'none');
					jQ54('#child7select').css('background-color', '#0800ff');
					jQ54('#child7edit').css('display', 'none');
					jQ54('#child8select').css('background-color', '#8FBC8F');
					jQ54('#child8edit').css('display', 'inline-block');
					break;
			}
			jQ54(this).css('background-color', '#8FBC8F');
		});
	});
</script>

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






/******************************Update L2L info from EDIT OVERLAY***********************************
*/
$submitLife = $_POST['submitL2L'];

if($submitLife)
{
	$postLife = strip_tags($_POST['L2LMember']);
	

}

/******************************Update Name and Address from EDIT OVERLAY***********************************
*/





?>
		</ul>
	</div>


<div id="content">
<!--*****************************Left Sidebar***********************************
-->
	<div id="left">
			<br>
			<?php
			echo "<h2>";
			echo $recordFirstHim;
			if($recordFirstHim and $recordFirstHer){
				echo " & ";
				}
				echo $recordFirstHer . "'s Information</h2>";
			?>
	<hr>
<?php
	//$_SESSION['imageviewID'] = $recordpiclink;
	//$imagesource = "/profile_img/" . $_SESSION['imageviewID'] . ".jpg";
	$_SESSION['imageviewID'] = $recordpiclink2 . "'";
	$imagesource = "'" . "/profile_img/" . $_SESSION['imageviewID'];
?>


	<table id="profiletable">
	<tr>
<!--	<td rowspan="5" class="image"><img src=imageview.php alt="Profile Picture" width="125" height="125"></td>-->
	<td rowspan="5" class="image"><?php echo "<img src=" . $imagesource . " alt='Profile Picture' width='200' height='auto'></td><td><br /></td>";
	?>
	</tr>

	<tr>
	<td class="strong" colspan="2"><?php
	echo $recordFirstHim;
			if($recordFirstHim and $recordFirstHer){
				echo " & ";
				}
	echo $recordFirstHer . " " . $recordLast; ?></td>
	<?php
	if($MyView == "Y" || $AdminView == "Y"){
		echo "<td align='right'><input type='button' class='my_popup4_open button_flat_blue_small' id='contactEdit' name='editContact' value='Edit Contact' /></td>";
	}

	?>
	</tr>

	<tr>
	<td class="strong"><?php echo $recordAddr1 . " " . $recordAddr2; ?></td>
	<td><br /></td>
	</tr>

	<tr>
	<td class="strong"><?php if(isset($recordCity)) echo $recordCity . ", " . substr($recordState,0,2) . " " . $recordZip; ?></td>
	<td><br /></td>
	</tr>

	<tr>
	<td><br /></td>
	</tr>



	<tr>
	<td align="left">
		<?php
		if($MyView == "Y" || $AdminView == "Y"){
			echo "<input type='button' class='my_popup7_open button_flat_blue_small' id='picEdit' name='editPic' value='New Photo' />";
		}
		?>
	</td>
	</tr>
	<tr>
	<td class="key">His (or both) Email:</td>
	<td class="strong"><?php echo "<a href='mailto:" . $recordEmail1  . "'>" . $recordEmail1 . "</a>"; ?></td>
	</tr>
	<tr>
	<td class="key">Her Email:</td>
	<td class="strong"><?php echo "<a href='mailto:" . $recordEmail2  . "'>" . $recordEmail2 . "</a>"; ?></td>
	</tr>
	<tr>
	<td><br /></td>
	</tr>
	<tr>
	<td class="key">Home Phone:</td>
	<td class="strong"><?php echo $recordPhoneH; ?></td>
	</tr>

	<tr>
	<td class="key">His Cell:</td>
	<td class="strong"><?php echo $recordPhoneC1; ?></td>
	</tr>

	<tr>
	<td class="key">Her Cell:</td>
	<td class="strong"><?php echo $recordPhoneC2; ?></td>
	</tr>

	</table>

			<?php
			echo "<h2>";
			echo $recordFirstHim;
			if($recordFirstHim and $recordFirstHer){
				echo " & ";
				}
				echo $recordFirstHer . "'s Children</h2>";

			?>
<hr>

<table id="profiletablechildren" border="0">

<tr valign="top">
<td class="strong">Name</td>
<td class="strong">Birthdate</td>
<td class="strong">Gender</td>
<td class="strong">Age</td>
	<?php
	if($MyView == "Y" || $AdminView == "Y"){
		echo "<td align='right'><input type='button' class='my_popup6_open button_flat_blue_small' id='childrenEdit' name='editChildren' value='Edit Children' /></td>";
	}
	?>
</tr>
<tr valign="top">
<td><?php echo $recordChild_1_Name ?></td>
<td>
<?php	if($recordChild_1_BDay) {
			$Tformat = 'Y-m-d';
			$DateWhole = DateTime::createFromFormat($Tformat, $recordChild_1_BDay);
			$DateSQLFormat = $DateWhole->format('M d, Y');
			echo $DateSQLFormat;
	}
	?>
</td>
<td><?php echo $recordChild_1_Gender ?></td>
<td>
	<?php
		if($recordChild_1_BDay) {
			$childage = date_diff(date_create($recordChild_1_BDay), date_create('now'))->y;
			echo $childage;
			}
	?>
</td>
</tr>
<tr valign="top">
<td><?php echo $recordChild_2_Name ?></td>
<td>
<?php	if($recordChild_2_BDay) {
			$Tformat = 'Y-m-d';
			$DateWhole = DateTime::createFromFormat($Tformat, $recordChild_2_BDay);
			$DateSQLFormat = $DateWhole->format('M d, Y');
			echo $DateSQLFormat;
	}
	?>
</td>
<td><?php echo $recordChild_2_Gender ?></td>
<td>
	<?php
		if($recordChild_2_BDay) {
			$childage = date_diff(date_create($recordChild_2_BDay), date_create('now'))->y;
			echo $childage;
			}
	?>
</td>
</tr>
<tr valign="top">
<td><?php echo $recordChild_3_Name ?></td>
<td>
<?php	if($recordChild_3_BDay) {
			$Tformat = 'Y-m-d';
			$DateWhole = DateTime::createFromFormat($Tformat, $recordChild_3_BDay);
			$DateSQLFormat = $DateWhole->format('M d, Y');
			echo $DateSQLFormat;
	}
	?>
</td>
<td><?php echo $recordChild_3_Gender ?></td>
<td>
	<?php
	if($recordChild_3_BDay) {
		$childage = date_diff(date_create($recordChild_3_BDay), date_create('now'))->y;
		echo $childage;
		}
	?>
</td>
</tr>
<tr valign="top">
<td><?php echo $recordChild_4_Name ?></td>
<td>
<?php	if($recordChild_4_BDay) {
			$Tformat = 'Y-m-d';
			$DateWhole = DateTime::createFromFormat($Tformat, $recordChild_4_BDay);
			$DateSQLFormat = $DateWhole->format('M d, Y');
			echo $DateSQLFormat;
	}
	?>
</td>
<td><?php echo $recordChild_4_Gender ?></td>
<td>
	<?php
		if($recordChild_4_BDay) {
			$childage = date_diff(date_create($recordChild_4_BDay), date_create('now'))->y;
			echo $childage;
			}
	?>
</td>
</tr>
<tr valign="top">
<td><?php echo $recordChild_5_Name ?></td>
<td>
<?php	if($recordChild_5_BDay) {
			$Tformat = 'Y-m-d';
			$DateWhole = DateTime::createFromFormat($Tformat, $recordChild_5_BDay);
			$DateSQLFormat = $DateWhole->format('M d, Y');
			echo $DateSQLFormat;
	}
	?>
</td>
<td><?php echo $recordChild_5_Gender ?></td>
<td>
	<?php
		if($recordChild_5_BDay) {
			$childage = date_diff(date_create($recordChild_5_BDay), date_create('now'))->y;
			echo $childage;
			}
	?>
</td>
</tr>
<tr valign="top">
<td><?php echo $recordChild_6_Name ?></td>
<td>
<?php	if($recordChild_6_BDay) {
			$Tformat = 'Y-m-d';
			$DateWhole = DateTime::createFromFormat($Tformat, $recordChild_6_BDay);
			$DateSQLFormat = $DateWhole->format('M d, Y');
			echo $DateSQLFormat;
	}
	?>
</td>
<td><?php echo $recordChild_6_Gender ?></td>
<td>
	<?php
		if($recordChild_6_BDay) {
			$childage = date_diff(date_create($recordChild_6_BDay), date_create('now'))->y;
			echo $childage;
			}
	?>
</td>
</tr>
<tr valign="top">
<td><?php echo $recordChild_7_Name ?></td>
<td>
<?php	if($recordChild_7_BDay) {
			$Tformat = 'Y-m-d';
			$DateWhole = DateTime::createFromFormat($Tformat, $recordChild_7_BDay);
			$DateSQLFormat = $DateWhole->format('M d, Y');
			echo $DateSQLFormat;
	}
	?>
</td>
<td><?php echo $recordChild_7_Gender ?></td>
<td>
	<?php
		if($recordChild_7_BDay) {
			$childage = date_diff(date_create($recordChild_7_BDay), date_create('now'))->y;
			echo $childage;
			}
	?>
</td>
</tr>
<tr valign="top">
<td><?php echo $recordChild_8_Name ?></td>
<td>
<?php	if($recordChild_8_BDay) {
			$Tformat = 'Y-m-d';
			$DateWhole = DateTime::createFromFormat($Tformat, $recordChild_8_BDay);
			$DateSQLFormat = $DateWhole->format('M d, Y');
			echo $DateSQLFormat;
	}
	?>
</td>
<td><?php echo $recordChild_8_Gender ?></td>
<td>
	<?php
		if($recordChild_8_BDay) {
			$childage = date_diff(date_create($recordChild_8_BDay), date_create('now'))->y;
			echo $childage;
			}
	?>
</td>
</tr>
</table>

<!--*****************************Administrator Access***********************************
-->

<?php	 
	/*Query Life 2 Life Group participation */
	
	
/*	$L2Lquery = "SELECT * FROM " . $_SESSION['l2ltablename'] . " l JOIN directory d ON d.L2L_ID = l.L2L_ID WHERE d.idDirectory = '" . $profileaddr . "'";
	$L2Lresult = @mysql_query($L2Lquery) or die(" SQL query error at select L2L Table Select. Error:" . mysql_errno() . " " . mysql_error());
	$L2Lcount = @mysql_num_rows($L2Lresult);
*/
?>


	</div>
	
<!--*****************************Right Sidebar***********************************
-->

	<div id="right">
			<?php 
			echo "<h2>CELEBRATE WITH<br>" . $recordFirstHim;
			if($recordFirstHim and $recordFirstHer){
				echo " & ";
				}
			echo $recordFirstHer . "</h2>";
			?>
	<hr>
	<br />
	<table id="profiletableright" border="0">
	<?php
	if($MyView == "Y" || $AdminView == "Y"){
		echo "<tr><td align='right'><input type='button' class='my_popup5_open button_flat_blue_small' id='calendarEdit' name='editCalendar' value='Edit Calendar' /></td></tr>";
	}
	?>
	<tr>
	<td colspan="2" class="strong">Anniversary:</td>
	</tr>
	<tr>
	<td colspan="2" class="keyright">
	<?php
	if($recordAnniv) {
//	$Anniv_Date = $recordAnniv->format('M d, Y');
			$Tformat = 'Y-m-d';
			$DateWhole = DateTime::createFromFormat($Tformat, $recordAnniv);
			$DateSQLFormat = $DateWhole->format('M d, Y');
			echo $DateSQLFormat;
	}
	?>
	</td>
	</tr>
	<tr>
	<td class="strong">Birthdays:</td>
	</tr>
	<tr>
	<td colspan="2" class="keyright">
	<?php
	if($recordFirstHim) {
		echo $recordFirstHim . " : ";
			$Tformat = 'Y-m-d';
			if($recordBDay1) {
				$DateWhole = DateTime::createFromFormat($Tformat, $recordBDay1);
				$DateSQLFormat = $DateWhole->format('M d');
				echo $DateSQLFormat;
			}
// . $recordBDay1;
		}; 
	?>
	</td>
	</tr>
	<tr>
	<td colspan="2" class="keyright">
	<?php
	if($recordFirstHer) {
		echo $recordFirstHer . " : ";
			$Tformat = 'Y-m-d';
			if($recordBDay2) {
				$DateWhole = DateTime::createFromFormat($Tformat, $recordBDay2);
				$DateSQLFormat = $DateWhole->format('M d');
				echo $DateSQLFormat;
			}
// . $recordBDay2;
		};
		?> 
	</td>
	</tr>
	<tr>
		<td>
			<br />
		</td>
	</tr>
		<tr>
			<td colspan="3">
			<hr>
			</td>
		</tr>
	<tr>
	<td colspan="3"><h2>SEND A MESSAGE</h2></td>
	</tr>	
	<tr>
	<td colspan="3" class="strong"><?php echo "<a href='mailto:" . $recordEmail1  . "'>" . $recordEmail1 . "</a>"; ?></td>
	</tr>

	<tr>
	<td colspan="3" class="strong"><?php echo "<a href='mailto:" . $recordEmail2  . "'>" . $recordEmail2 . "</a>"; ?></td>
	</tr>
	<tr>
		<td>
			<br />
		</td>
	</tr>

	</table>
<!--*****************************Prayer Table***********************************
-->
<?php

if($MyView == "Y"){
	echo "<table id='profiletableright' border='0' width='100%'>";
	echo "<tr><td><hr></td></tr>";
	echo "<tr><td><h2>PRAYER ACTIVITY</hr></td></tr>";
	echo "<tr><td></td></tr>";
	echo "<tr><td class='newprayer'><button class='my_popup_open button_flat_green' id='prayer_new_button'>New prayer request</button></td></tr>";
	echo "<tr><td class='ourprayer'><button class='my_popup2_open button_flat_green' id='my_prayer_button'>Update my prayer requests</button></td></tr>";
	echo "</table>";

	$myprayerquery = "SELECT * FROM " . $_SESSION['prayertable'] . " WHERE owner_id = '$profileaddr' ORDER BY create_date";
	$myprayerresult = @mysql_query($myprayerquery) or die(" SQL query error at select my prayers. Error:" . mysql_errno() . " " . mysql_error());
	$myprayercount = @mysql_num_rows($myprayerresult);
	}
?>
<table id='profile_edit' border='0' width='100%'>
<?php
	if($MyView == "Y"){
		echo "<tr><td><hr></td></tr>";
		echo "<tr><td><h2>EDIT PROFILE</hr></td></tr>";
		echo "<tr><td></td></tr>";
//		echo "<tr><td align='right'><input type='button' class='my_popup4_open button_flat_blue_small' id='contactEdit' name='editContact' value='Edit Contact' /></td></tr>";
//		echo "<tr><td align='right'><input type='button' class='my_popup5_open button_flat_blue_small' id='calendarEdit' name='editCalendar' value='Edit Calendar' /></td></tr>";
//		echo "<tr><td align='right'><input type='button' class='my_popup6_open button_flat_blue_small' id='childrenEdit' name='editChildren' value='Edit Children' /></td></tr>";
	}
?>
</table>
<div id="prayerlogright">

</div>

<!--*****************************EDIT OVERLAY to Admin Update L2L Group***********************************
-->

<?php
if($_SESSION['accesslevel'] == 2){
	echo "<table id='profiletablerightadmin' border='0' width='100%'>";
	echo "<tr><td><br></td></tr>";
	echo "<tr><td><hr></td></tr>";
	echo "<tr><td class='head'>ADMINISTRATION</td></tr>";
	echo "<tr><td class='strong'>Life 2 Life:</td></tr>";
				if($recordL2L_Part == "N"){
				echo "<tr><td>No Participation</td></tr>";
				}
				else {
						echo "<tr><td>" . $recordL2L_Part . "</td></tr>";
						}
	echo "<tr><td class='centerselect'><a class='modalInput' rel='#L2LUpdate'>Update</a></td></tr>";
	echo "<tr><td class='keyright'></td></tr>";
	echo "</table>";		
	}

?>

	</div>

<!--****************************Footer***********************************
-->

<div id="footerline"></div>
</div>
	
<?php
	require_once('/ofc_footer.php');
?>
</div>

<!--*****************************EDIT OVERLAY Input Forms***********************************-->

<!-- Update Life 2 Life participation -->
<div class="modal" id="L2LUpdate">
	<h2>Life 2 Life Participation</h2>
        <br />
        <br />
        <h3>Select which Life 2 Life group this member is attending and click Save when done</h3>
        <br />
        <br />
			<table border='0' align='center' cellpadding='0' cellspacing='1' >
 				<tr> 		
 					<form name='L2Lform' method='post' action=''> 		
 					<td>
 		 				<table width='100%' border='0' cellpadding='3' cellspacing='1' >
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td >L2L Participation:</td>
							</tr>
							<tr>
								<td>
<!--		 		 		 		<?php 
												 		 		 		
			 		 		 		echo "<td width='294'><input name='L2LMember' type='text' id='L2LMember' value= " . $recordL2L_Part . "></td>"; 
		 		 		 		?>
-->
 		 		 		 		<select name="L2LMember" id="L2LMember">
<?php

									$L2LList_query = "SELECT * from " . $_SESSION['l2ltablename'];
									$L2LListresult = @mysql_query($L2LList_query) or die(" L2L List SQL query error. Error:" . mysql_errno() . " " . mysql_error());
									while($L2LList_row = @mysql_fetch_assoc($L2LListresult))
									{
										$L2LList_optionID = $L2LList_row['L2L_ID'];										
										$L2LList_optionvalue = $L2LList_row['L2L_Name'];										
										echo "<option value='" . $L2LList_optionvalue . "'";
										if($L2LList_optionvalue == $recordL2L_Part)
										{
										echo " selected='selected'";
										}
									echo ">" . $L2LList_optionvalue . "</option>";
									}
?>
 		 		 		 		</select>


	 		 		 			</td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td><input type='submit' name='submitL2L' value='Save'></td>
								<td><input type="submit" class="my_popup_close" name="cancel" value="Cancel" /></td>
							</tr>
 		 		 		</table>
 		 		 		<p>
 		 		 		<p>
 		 			</td>
 		 			</form>
 		 		</tr>
			</table>

			<br />

</div>


<!--*****************************EDIT OVERLAY to select new Profile Picture***********************************-->

<!--***************************** Create new Prayer Request POPUP ***********************************-->
<!--***************************** Create new Prayer Request POPUP ***********************************-->
<!--***************************** Create new Prayer Request POPUP ***********************************-->
<div id="my_popup">
	<h2>New Prayer Request</h2>
        <br />
        <br />
        <h3>Enter details about your prayer request and click Send</h3>
        <br />
        <br />
		<form name='newprayerform' method='post' action='ofc_newprayer.php'> 		
        <table id="praytable" style="border: 3px solid powderblue;" width="100%" align="left" cellpadding="0" cellspacing="1" border="0">
 		 		 <tr>
 		 		 	<td align="right"><strong>Visibility :</strong></td>
 		 		 	<td><input type="radio" name='visible' value='1'>Elders only</input></td>
 		 		 </tr>
 		 		 <tr>
 		 		 	<td width="25%">&nbsp</td>
 		 		 	<td><input type="radio" name='visible' value='3' checked="checked">Your Church Family (elder approval required)</input></td>
 		 		 </tr>
				<tr>
					<td>&nbsp</td>
					<td>&nbsp</td>
				</tr>
				<tr>
					<td align="right"><strong>Praise :</strong></td> 		 		 
					<td><input type="radio" name="prayer" value="Prayer" checked="checked">Prayer</input></td> 		 		 
 		 		</tr>
 		 		 <tr>
 		 		 	<td width="25%">&nbsp</td>
 		 		 	<td><input type="radio" name="prayer" value="Praise">Praise</input></td>
 		 		 </tr>
        </table>
			<table id="praytable" style="border: 3px solid powderblue;" width="100%" align="left" cellpadding="0" cellspacing="1" border="0" >
	 			<tr>
	 		 		<td><br /></td>
	 			</tr>
	 			<tr>
	 		 		<td width='25%' align='right'><strong>Title:</strong></td>
	 		 		<td width='75%'><input name='requesttitle' type='text' id='requesttitle' size="40"></td>
	 			</tr>
	 			<tr>
	 				<td>&nbsp</td>
	 			</tr>
	 			<tr>
	 		 		<td width='25%' align='right'><strong>Details:</strong></td>
	 		 		<td><textarea name="requesttext" rows="6" cols="40" ></textarea>
	 			</tr>
	 			<tr>
	 				<td>&nbsp</td>
<?php				
					$fullname = $_SESSION['firstname'] . " " . $recordLast; 
 					echo "<td><input type='hidden' name='fullname' value= '" . $fullname . "' /></td>";
					if($_SESSION['gender'] == 'M') 
					{
	 					echo "<td><input type='hidden' name='email' value= '" . $recordEmail1 . "' /></td>";
	 				}
	 				else //SESSION = F 
	 				{
 						echo "<td><input type='hidden' name='email' value= '" . $recordEmail2 . "' /></td>";
 					}
?>
	 			</tr>
	 			<tr>
<?php	 		
 					
 					echo "<td><input type='hidden' name='requestorID' value= '" . $profileaddr . "' /></td>";
?>
				</tr>
			</table>
			<table>
				<tr>
					<td align="right"><input type="submit" class="button_flat_blue_small" name='submitrequest' value='Send' /></td>
	 		 		<td width='25%' align="right"><input type="reset" class="my_popup_close button_flat_blue_small" name="cancel" value="Cancel" /></td>
	 			</tr>
	 			<tr>
	 				<td>&nbsp</td>
	 			</tr>
	 			<tr>
	 				<td colspan="3" align="center">New prayer requests to our church family require Elder approval.<br>Church family will be notified as soon as it's approved.</td>
	 			</tr>   
 		 	</table>
		</form>
<br />
</div>

<!--***************************** Update My Prayer Requests POPUP ***********************************-->
<!--***************************** Update My Prayer Requests POPUP ***********************************-->
<!--***************************** Update My Prayer Requests POPUP ***********************************-->
<div id="my_popup2">
	<h2>My Prayer Requests</h2>
        <br />
        <br />
        <h3>Select a prayer request to update</h3>
        <br />
        <br />
		<table id="myprayertable" class="display" cellspacing="0" width="100%">
      	  <thead>
         	   <tr>
						<th>id</th>
						<th>Opened</th>
						<th>Title</th>
						<th>Update</th>
            	</tr>
        		</thead>
        		<tfoot>
            	<tr>
						<th>id</th>
						<th>Opened</th>
						<th>Title</th>
						<th>Update</th>
            	</tr>
        		</tfoot>
    	</table>

		<form name='myprayerform' method='post' action='ofc_myprayer.php'> 		
			<table id="praytable" style="border: 3px solid powderblue;" width="100%" align="left" cellpadding="0" cellspacing="1" border="0" >
							<tr class="praytable_even">
								<td colspan="1"><strong>Type: </strong></td>
								<td colspan="2" class="praypraise"> </td>
								<td align="right" colspan="1"><strong>Answered: </strong></td>
								<td align="center" colspan="1" class="prayanswer"> </td>
							</tr>
							<tr class="praytable_odd">
								<td colspan="1"><strong>Date: </strong></td>
								<td colspan="4" class="praydate"> </td>
							</tr>
							<tr class="praytable_even">
								<td colspan="1"><strong>From: </strong></td>
								<td colspan="4" class="praywho"> </td>
							</tr>
							<tr class="praytable_odd">
								<td colspan="1"><strong>Title: </strong></td>
								<td colspan="4" class="praytitle"> </td>
							</tr>
							<tr>
								<td colspan="5">
									<hr />
								</td>
							</tr>
			</table>
			<table style="border: 3px solid powderblue;" width="100%" align="left" cellpadding="0" cellspacing="1" border="0" >
							<tr class="praytable_text">
								<td colspan="5">
									<div class="praytext" style="height: 200px; overflow: auto; white-space: pre-wrap;">
									</div>								
								 </td>
							</tr>
							<tr>
								<td>
 								</td>
 							</tr>
	 			<tr>
<!-- 	 		 		<td>&nbsp</td>
 -->
 <?php	 		
 					
 					echo "<td><input type='hidden' name='requestorID' value= '" . $profileaddr . "' /></td>";
?>
				</tr>        
			</table>
			<table width="100%" align="left" cellpadding="0" cellspacing="1" border="0" >
				<tr>
	 		 		<td align="right"><input type="button" class="my_popup3_open button_flat_blue_small" id="updatePrayer" name="update" value="Update" /></td>
	 		 		<td align="left"> </td>
	 		 		<td width='25%' align="right"><input type="submit" class="my_popup2_close button_flat_blue_small" name="cancel" value="Cancel" /></td>
	 			</tr>
	 			<tr>
	 				<td><strong>NOTE: </strong>Answered prayers are closed and cannot be updated. Submit a new prayer request to re-open.</td>
	 			</tr>
	 			<tr>
	 				<td>&nbsp</td>
	 			</tr>
 		 	</table>
		</form>
<br />
</div>


<!--***************************** Update Prayer Request POPUP ***********************************-->
<!--***************************** Update Prayer Request POPUP ***********************************-->
<!--***************************** Update Prayer Request POPUP ***********************************-->
<div id="my_popup3">
	<h2>Update Prayer Request</h2>
        <br />
        <br />
        <h3>Update your prayer request and click <strong>Send</strong> when done.</h3>
        <p><strong>Update Only</strong> keeps the prayer request open, allowing further updates as desired.</p> 
        <p><strong>Answer</strong> your prayer request will close the request - future updates will require a new prayer request.</p>
        <hr>
        <p id="updateTitle" class="my_popup3title"> </p>
		<form id="updateprayerform" name='updateprayerform' method='post' action=' '> 		
      	<table id="praytable" style="border: 3px solid powderblue;" width="100%" align="left" cellpadding="0" cellspacing="1" border="0">
      			<td width="25%">&nbsp</td>
<!--      			<td colspan="2" class="my_popup3title"> </td>
-->      		</tr>
      		<tr>
      			<td></td>
      		</tr>
      		<tr>
					<td align="right"><strong>Update : </strong></td>
				</tr>
 		 		<tr>
 		 			<td width="25%">&nbsp</td>
 		 		 	<td><input type="radio" name='answered' value='0' checked="checked">Update Only</input></td>
 		 		</tr>
 		 		<tr>
 		 			<td width="25%">&nbsp</td>
 		 		 	<td><input type="radio" name='answered' value='1'>Answer/Close</input></td>
 		 		</tr>
				<tr>
					<td>&nbsp</td>
					<td>&nbsp</td>
				</tr>
	 			<tr>
	 		 		<td><br /></td>
	 			</tr>
	 			<tr>
	 		 		<td width='25%' align='right'><strong>Update Details:</strong></td>
	 		 		<td colspan="2"><textarea id="updatetext" name="requesttext" rows="6" cols="40" ></textarea></td>
	 			</tr>
	 			<tr>
	 				<td>&nbsp</td>
<?php				
					$fullname = $_SESSION['firstname'] . " " . $recordLast; 
 					echo "<td><input type='hidden' name='fullname' value= '" . $fullname . "' /></td>";
?>
	 			</tr>
	 			<tr>
 <?php	 		
 					
 					echo "<td><input type='hidden' name='requestorID' value= '" . $profileaddr . "' /></td>";
?>
				</tr>
			</table>
			<table width="100%" align="left" cellpadding="0" cellspacing="1" border="0" >
	 		 	<tr>
	 		 		<td align="right"><input type="button" id="submitUpdate" class="my_popup3_close button_flat_blue_small" name='submitrequest' value='Send' /></td>
	 		 		<td width='25%' align="right"><input type="reset" class="my_popup3_close button_flat_blue_small" name="cancel" value="Cancel" /></td>
	 			</tr>
	 			<tr>
	 				<td>&nbsp</td>
	 			</tr>
 		 	</table>
		</form>
<br />
</div>

<!--***************************** Edit Profile POPUP - Contact ***********************************-->
<!--***************************** Edit Profile POPUP - Contact ***********************************-->
<!--***************************** Edit Profile POPUP - Contact ***********************************-->
<div id="my_popup4">
	<h2>Edit Contact Information</h2>
        <br />
        <br />
        <h3>Modify contact details and click <strong>Save</strong> when done.</h3>
        <hr>
        <p id="editProfile" class="my_popup4title"> </p>
			<form name='editcontact' method='post' action='ofc_profile_contact_update.php'> 		
				<table id="editprofiletable" border='0' align='center' cellpadding='0' cellspacing='1' >
 				<tr> 		
 					<td>
 					
 		 				<table width='100%' border='0' cellpadding='3' cellspacing='1' >
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>His First Name</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='hisfirstname' type='text' id='hisfirstname' value="<?php echo $recordFirstHim; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Her First Name</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='herfirstname' type='text' id='herfirstname' value="<?php echo $recordFirstHer; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Last Name</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='mylastname' type='text' id='mylastname' value="<?php echo $recordLast; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Street Address</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='myaddr1' type='text' id='myaddr1' value="<?php echo $recordAddr1; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Apartment # or PO Box</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='myaddr2' type='text' id='myaddr2' value="<?php echo $recordAddr2; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>City</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='mycity' type='text' id='mycity' value="<?php echo $recordCity; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>State/Province</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td>
 		 		 		 		<select name="mystate" id="mystate">
<?php

									$states_query = "SELECT * from " . $_SESSION['statestablename'];
									$statesresult = @mysql_query($states_query) or die(" SQL query error. Error:" . mysql_errno() . " " . mysql_error());
									while($states_row = @mysql_fetch_assoc($statesresult))
									{
										$states_optionvalue = $states_row['state_abbrev'] . " - " . $states_row['state_name'];
										$selectedstate = $states_row['state_abbrev'];		
										echo "<option value='" . $states_optionvalue . "'";
										if($selectedstate == $recordState)
										{
										echo " selected='selected'";
										}
									echo ">" . $states_optionvalue . "</option>";
									}

?>

 		 		 		 		</select>
 		 		 		 		</td>

 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Zip Code</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='myzip' type='text' id='myzip' placeholder="98270" pattern="^\d{5}$" value="<?php echo $recordZip; ?>"></td>
 		 		 			</tr>
 							<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td align="center" colspan="3"><strong><i>Phone number format (###-###-####)</i></strong></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Home Phone Number</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='myhomephone' type='text' id='myhomephone' placeholder="555-555-5555" pattern="^\d{3}-\d{3}-\d{4}$" value="<?php echo $recordPhoneH; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td align='right'>His Cell Number</td>
 		 		 		 		<td>:</td>
 		 		 		 		<td><input name='hiscell' type='text' id='hiscell' placeholder="555-555-5555" pattern="^\d{3}-\d{3}-\d{4}$" value="<?php echo $recordPhoneC1; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td align='right'>Her Cell Number</td>
 		 		 		 		<td>:</td>
  		 		 		 		<td><input name='hercell' type='text' id='hercell' placeholder="555-555-5555" pattern="^\d{3}-\d{3}-\d{4}$" value="<?php echo $recordPhoneC2; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
  		 		 		 		<td width='350' align='right'>His Email address</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><?php echo "<strong>" . $recordEmail1 . "</strong>" ?></td>
  		 		 			</tr>
 		 		 			<tr>
  		 		 		 		<td width='350' align='right'>Her Email address</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><?php echo "<strong>" . $recordEmail2 . "</strong>" ?></td>
  		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td><input type="submit" class="button_flat_blue_small" name='submitcontact' value='Save'></td>
								<td><input type="reset" class="my_popup4_close button_flat_blue_small" name="cancel" value="Cancel" /></td>
 		 		 			</tr>
 		 		 			</table>
 		 		 			<p>
 		 		 			<p>
 		 				</td>
 		 			</tr>
				</table>
			</form>

</div>


<!--***************************** Edit Profile POPUP - Calendar ***********************************-->
<!--***************************** Edit Profile POPUP - Calendar ***********************************-->
<!--***************************** Edit Profile POPUP - Calendar ***********************************-->
<div id="my_popup5">
	<h2>Edit Calendar Information</h2>
        <br />
        <br />
        <h3>Modify anniversary and birthday details - click <strong>Save</strong> when done.</h3>
        <hr>
        <p id="editCalendar" class="my_popup5title"> </p>
			<form name='editcalendar' method='post' action='ofc_profile_calendar_update.php'> 		
				<table id="editcalendartable" border='0' align='center' cellpadding='0' cellspacing='1' >
 				<tr> 		
 					<td>
 					
 		 				<table width='100%' border='0' cellpadding='3' cellspacing='1' >
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Your Anniversary</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='myanniversary' type='date' id='myanniversary' value="<?php echo $recordAnniv; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>His Birthday</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='hisbirthday' type='date' id='hisbirthday' value="<?php echo $recordBDay1; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Her Birthday</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='herbirthday' type='date' id='herbirthday' value="<?php echo $recordBDay2; ?>"></td>
 		 		 			</tr>
 							<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td><input type="submit" class="button_flat_blue_small" name='submitcalendar' value='Save'></td>
								<td><input type="reset" class="my_popup5_close button_flat_blue_small" name="cancel" value="Cancel" /></td>
 		 		 			</tr>
 		 		 			</table>
 		 		 			<p>
 		 		 			<p>
 		 				</td>
 		 			</tr>
				</table>
			</form>

</div>

<!--***************************** Edit Profile POPUP - Children ***********************************-->
<!--***************************** Edit Profile POPUP - Children ***********************************-->
<!--***************************** Edit Profile POPUP - Children ***********************************-->
<div id="my_popup6">
	<h2>Edit Children Information</h2>
        <br />
        <br />
        <h3>Modify your children's information. click <strong>Exit</strong> when done.</h3>
        <hr>
        <p id="editChildren" class="my_popup6title"> </p>
		<p><strong>NOTE: </strong> Click Save after changing each child's information</p>
 

 			<form name='editchildren' method='post' action='ofc_profile_children_update.php'>
<!-- CHILD TABS -->
 				<table width='100%' id='childselection' border='0' align='center' cellpadding='0' cellspacing='1' >
 					<tr>
 						<td><input type="button" class="childselectbutton button_flat_blue_tiny" name='child1select' id='child1select' value='Child 1'></td>
 						<td><input type="button" class="childselectbutton button_flat_blue_tiny" name='child2select' id='child2select' value='Child 2'></td>
 						<td><input type="button" class="childselectbutton button_flat_blue_tiny" name='child3select' id='child3select' value='Child 3'></td>
 						<td><input type="button" class="childselectbutton button_flat_blue_tiny" name='child4select' id='child4select' value='Child 4'></td>
 						<td><input type="button" class="childselectbutton button_flat_blue_tiny" name='child5select' id='child5select' value='Child 5'></td>
 						<td><input type="button" class="childselectbutton button_flat_blue_tiny" name='child6select' id='child6select' value='Child 6'></td>
 						<td><input type="button" class="childselectbutton button_flat_blue_tiny" name='child7select' id='child7select' value='Child 7'></td>
 						<td><input type="button" class="childselectbutton button_flat_blue_tiny" name='child8select' id='child8select' value='Child 8'></td>
 					</tr>
 				</table> 		
				<table id="editchildrentable" border='0' align='center' cellpadding='0' cellspacing='1' >
 				<tr> 		
 					<td>
 					
<!-- CHILD 1 EDIT -->
 		 				<table id="child1edit" width='100%' border='0' cellpadding='3' cellspacing='1' >
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 1 Name</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child1_name' type='text' id='child1_name' value="<?php echo $recordChild_1_Name; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 1 Birthday</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child1_bday' type='date' id='child1_bday' value="<?php echo $recordChild_1_BDay; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 1 Gender</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td>
  		 		 		 			<select name="child1_gender" id="child1_gender">
  		 		 		 				<option value="M" <?php if ($recordChild_1_Gender == 'M') echo 'selected'; ?>>Male</option>
  		 		 		 				<option value="F"<?php if ($recordChild_1_Gender == 'F') echo 'selected'; ?>>Female</option>
  		 		 		 			</select>
  		 		 		 		</td>

 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 1 Email</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child1_email' type='email' id='child1_email' value="<?php echo $recordChild_1_Email; ?>"></td>
 		 		 			</tr>
 							<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td><input type="submit" class="button_flat_red_small" name='remove1child' value='Delete'></td>
 		 		 		 		<td><input type="submit" class="button_flat_green_small" name='submit1children' value='Save'></td>
								<td><input type="reset" class="my_popup6_close button_flat_blue_small" name="cancel" value="  Exit   " /></td>
 		 		 			</tr>
 		 		 			</table>
<!-- CHILD 2 EDIT -->
 		 				<table id="child2edit" width='100%' border='0' cellpadding='3' cellspacing='1' >
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 2 Name</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child2_name' type='text' id='child1_name' value="<?php echo $recordChild_2_Name; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 2 Birthday</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child2_bday' type='date' id='child2_bday' value="<?php echo $recordChild_2_BDay; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 2 Gender</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td>
  		 		 		 			<select name="child2_gender" id="child2_gender">
  		 		 		 				<option value="M" <?php if ($recordChild_2_Gender == 'M') echo 'selected'; ?>>Male</option>
  		 		 		 				<option value="F"<?php if ($recordChild_2_Gender == 'F') echo 'selected'; ?>>Female</option>
  		 		 		 			</select>
  		 		 		 		</td>

 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 2 Email</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child2_email' type='email' id='child2_email' value="<?php echo $recordChild_2_Email; ?>"></td>
 		 		 			</tr>
 							<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td><input type="submit" class="button_flat_red_small" name='remove2child' value='Delete'></td>
 		 		 		 		<td><input type="submit" class="button_flat_green_small" name='submit2children' value='Save'></td>
								<td><input type="reset" class="my_popup6_close button_flat_blue_small" name="cancel" value="  Exit   " /></td>
 		 		 			</tr>
 		 		 			</table>
<!-- CHILD 3 EDIT -->
 		 				<table id="child3edit" width='100%' border='0' cellpadding='3' cellspacing='1' >
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 3 Name</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child3_name' type='text' id='child3_name' value="<?php echo $recordChild_3_Name; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 3 Birthday</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child3_bday' type='date' id='child3_bday' value="<?php echo $recordChild_3_BDay; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 3 Gender</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td>
  		 		 		 			<select name="child3_gender" id="child3_gender">
  		 		 		 				<option value="M" <?php if ($recordChild_3_Gender == 'M') echo 'selected'; ?>>Male</option>
  		 		 		 				<option value="F"<?php if ($recordChild_3_Gender == 'F') echo 'selected'; ?>>Female</option>
  		 		 		 			</select>
  		 		 		 		</td>

 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 3 Email</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child3_email' type='email' id='child3_email' value="<?php echo $recordChild_3_Email; ?>"></td>
 		 		 			</tr>
 							<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td><input type="submit" class="button_flat_red_small" name='remove3child' value='Delete'></td>
 		 		 		 		<td><input type="submit" class="button_flat_green_small" name='submit3children' value='Save'></td>
								<td><input type="reset" class="my_popup6_close button_flat_blue_small" name="cancel" value="  Exit   " /></td>
 		 		 			</tr>
 		 		 			</table>
<!-- CHILD 4 EDIT -->
 		 				<table id="child4edit" width='100%' border='0' cellpadding='3' cellspacing='1' >
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 4 Name</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child4_name' type='text' id='child4_name' value="<?php echo $recordChild_4_Name; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 4 Birthday</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child4_bday' type='date' id='child4_bday' value="<?php echo $recordChild_4_BDay; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 4 Gender</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td>
  		 		 		 			<select name="child4_gender" id="child4_gender">
  		 		 		 				<option value="M" <?php if ($recordChild_4_Gender == 'M') echo 'selected'; ?>>Male</option>
  		 		 		 				<option value="F"<?php if ($recordChild_4_Gender == 'F') echo 'selected'; ?>>Female</option>
  		 		 		 			</select>
  		 		 		 		</td>

 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 4 Email</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child4_email' type='email' id='child4_email' value="<?php echo $recordChild_4_Email; ?>"></td>
 		 		 			</tr>
 							<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td><input type="submit" class="button_flat_red_small" name='remove4child' value='Delete'></td>
 		 		 		 		<td><input type="submit" class="button_flat_green_small" name='submit4children' value='Save'></td>
								<td><input type="reset" class="my_popup6_close button_flat_blue_small" name="cancel" value="  Exit   " /></td>
 		 		 			</tr>
 		 		 			</table>
<!-- CHILD 5 EDIT -->
 		 				<table id="child5edit" width='100%' border='0' cellpadding='3' cellspacing='1' >
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 5 Name</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child5_name' type='text' id='child5_name' value="<?php echo $recordChild_5_Name; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 5 Birthday</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child5_bday' type='date' id='child5_bday' value="<?php echo $recordChild_5_BDay; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 5 Gender</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td>
  		 		 		 			<select name="child5_gender" id="child5_gender">
  		 		 		 				<option value="M" <?php if ($recordChild_5_Gender == 'M') echo 'selected'; ?>>Male</option>
  		 		 		 				<option value="F"<?php if ($recordChild_5_Gender == 'F') echo 'selected'; ?>>Female</option>
  		 		 		 			</select>
  		 		 		 		</td>

 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 5 Email</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child5_email' type='email' id='child5_email' value="<?php echo $recordChild_5_Email; ?>"></td>
 		 		 			</tr>
 							<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td><input type="submit" class="button_flat_red_small" name='remove5child' value='Delete'></td>
 		 		 		 		<td><input type="submit" class="button_flat_green_small" name='submit5children' value='Save'></td>
								<td><input type="reset" class="my_popup6_close button_flat_blue_small" name="cancel" value="  Exit   " /></td>
 		 		 			</tr>
 		 		 			</table>
<!-- CHILD 6 EDIT -->
 		 				<table id="child6edit" width='100%' border='0' cellpadding='3' cellspacing='1' >
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 6 Name</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child6_name' type='text' id='child6_name' value="<?php echo $recordChild_6_Name; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 6 Birthday</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child6_bday' type='date' id='child6_bday' value="<?php echo $recordChild_6_BDay; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 6 Gender</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td>
  		 		 		 			<select name="child6_gender" id="child6_gender">
  		 		 		 				<option value="M" <?php if ($recordChild_6_Gender == 'M') echo 'selected'; ?>>Male</option>
  		 		 		 				<option value="F"<?php if ($recordChild_6_Gender == 'F') echo 'selected'; ?>>Female</option>
  		 		 		 			</select>
  		 		 		 		</td>

 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 6 Email</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child6_email' type='email' id='child6_email' value="<?php echo $recordChild_6_Email; ?>"></td>
 		 		 			</tr>
 							<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td><input type="submit" class="button_flat_red_small" name='remove6child' value='Delete'></td>
 		 		 		 		<td><input type="submit" class="button_flat_green_small" name='submit6children' value='Save'></td>
								<td><input type="reset" class="my_popup6_close button_flat_blue_small" name="cancel" value="  Exit   " /></td>
 		 		 			</tr>
 		 		 			</table>
<!-- CHILD 7 EDIT -->
 		 				<table id="child7edit" width='100%' border='0' cellpadding='3' cellspacing='1' >
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 7 Name</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child7_name' type='text' id='child7_name' value="<?php echo $recordChild_7_Name; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 7 Birthday</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child7_bday' type='date' id='child7_bday' value="<?php echo $recordChild_7_BDay; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 7 Gender</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td>
  		 		 		 			<select name="child7_gender" id="child7_gender">
  		 		 		 				<option value="M" <?php if ($recordChild_7_Gender == 'M') echo 'selected'; ?>>Male</option>
  		 		 		 				<option value="F"<?php if ($recordChild_7_Gender == 'F') echo 'selected'; ?>>Female</option>
  		 		 		 			</select>
  		 		 		 		</td>

 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 7 Email</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child7_email' type='email' id='child7_email' value="<?php echo $recordChild_7_Email; ?>"></td>
 		 		 			</tr>
 							<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td><input type="submit" class="button_flat_red_small" name='remove7child' value='Delete'></td>
 		 		 		 		<td><input type="submit" class="button_flat_green_small" name='submit7children' value='Save'></td>
								<td><input type="reset" class="my_popup6_close button_flat_blue_small" name="cancel" value="  Exit   " /></td>
 		 		 			</tr>
 		 		 			</table>
<!-- CHILD 8 EDIT -->
 		 				<table id="child8edit" width='100%' border='0' cellpadding='3' cellspacing='1' >
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 8 Name</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child8_name' type='text' id='child8_name' value="<?php echo $recordChild_8_Name; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 8 Birthday</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child8_bday' type='date' id='child8_bday' value="<?php echo $recordChild_8_BDay; ?>"></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 8 Gender</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td>
  		 		 		 			<select name="child8_gender" id="child8_gender">
  		 		 		 				<option value="M" <?php if ($recordChild_8_Gender == 'M') echo 'selected'; ?>>Male</option>
  		 		 		 				<option value="F"<?php if ($recordChild_8_Gender == 'F') echo 'selected'; ?>>Female</option>
  		 		 		 			</select>
  		 		 		 		</td>

 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td width='350' align='right'>Child 8 Email</td>
 		 		 		 		<td width='6'>:</td>
 		 		 		 		<td width='294'><input name='child8_email' type='email' id='child8_email' value="<?php echo $recordChild_8_Email; ?>"></td>
 		 		 			</tr>
 							<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td><br /></td>
 		 		 			</tr>
 		 		 			<tr>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td>&nbsp</td>
 		 		 		 		<td><input type="submit" class="button_flat_red_small" name='remove8child' value='Delete'></td>
 		 		 		 		<td><input type="submit" class="button_flat_green_small" name='submit8children' value='Save'></td>
								<td><input type="reset" class="my_popup6_close button_flat_blue_small" name="cancel" value="  Exit   " /></td>
 		 		 			</tr>
 		 		 			</table>
 		 		 			<p>
 		 		 			<p>
 		 				</td>
 		 			</tr>
				</table>
			</form>

</div>

<!--***************************** Edit Picture POPUP ***********************************-->
<!--***************************** Edit Picture POPUP ***********************************-->
<!--***************************** Edit Picture POPUP ***********************************-->
<div id="my_popup7">
	<h2>Upload New Family Photo</h2>
	<br />
	<br />
	<h3>Upload new photo - click <strong>Save</strong> when done.</h3>
	<hr>
	<p><strong>NOTE:</strong> Photo must be less than 2MB, and in one of the following formats:</p> 
	<table>
		<tr>
			<td width='40px'></td>
			<td align='left'>
				<ul>
					<li>
						.bmp; .jpg; .png
					</li>
				</ul>
			</td>
		</tr>
	</table>
	<br />
	<hr>
<!--		<form enctype="multipart/form-data" action="imageverify.php" method="post">
 		<form enctype="multipart/form-data" action="/includes/tec_featurenotavail.php" method="post">
 -->
		<form id="uploadImage" enctype="multipart/form-data" action="" method="post">
			<div id="image_preview"><img id="previewing" width="200" height="auto" <?php echo "src=$imagesource"; ?> /></div>
			<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
            <input name="file" type="file" id="file" required />
            <input type="submit" class="button_flat_blue_small" value="Upload Image" />
				<input type="reset" class="my_popup7_close button_flat_blue_small" name="cancel" value="Cancel" />
        </form>
		<div id="message">
			
		</div>
</div>


</body>
</html>
