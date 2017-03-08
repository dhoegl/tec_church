<?php 
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	header("location:ofc_welcome.php");
	exit();
}
    require_once('ofc_dbconnect.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<link href="css/ofc_style.css" rel="stylesheet" type="text/css" />
<title>Prayer Request Admin - Our Family Connections</title>

<!-- Load the jquery libraries you want -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<!-- Popup script from http://dev.vast.com/jquery-popup-overlay/ -->
	<script src="https://cdn.rawgit.com/vast-engineering/jquery-popup-overlay/1.7.13/jquery.popupoverlay.js"></script>


<!--*******************************DataTables stylesheet data**************************************-->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

<!-- jQuery functions & scripts -->
<!-- jQuery functions & scripts -->
<!-- jQuery functions & scripts -->

<?php
// Get Unapproved Prayer List
   include('/includes/ofc_view_unapprovedprayerlist.php');
   
// Get Unapproved Prayer jQuery
   include('/includes/ofc_get_unapprovedprayer_jquery.php');

// Get All Prayer List
   include('/includes/ofc_view_allprayerlist.php');
   
// Get All Prayer jQuery
   include('/includes/ofc_get_allprayer_jquery.php');
   
?>

<!--***************************** New Prayer Scripts ***********************************-->
<!--***************************** New Prayer Scripts ***********************************-->

<!-- Detect 'New Prayer' button click -->
<script type="text/javascript">
 var $firstname = + <?php echo "'" . $_SESSION['firstname'] . "'"; ?>;
 var jQ4 = jQuery.noConflict();
	jQ4(document).ready(function() {
//		jQ4("#prayer_new_button").on("click", "button", function () {
		jQ4("#prayer_new_button").click(function () {
			console.log("New Prayer Button clicked");
			console.log("Session First Name = " + $firstname);
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


<!-- Get Which Prayer Item's 'View' button was clicked -->
 <script type="text/javascript">
var $clickbuttonid = "NA";
var jQ9 = jQuery.noConflict();
jQ9(document).ready(function () {
	jQ9("#unapprovedprayertable tbody").on("click", 'tr', function () {
		jQ9("tr.praytable_even").show();
		jQ9("tr.praytable_odd").show();
		jQ9("tr.praytable_text").show();
		jQ9("#updatePrayer").show();
		var prayerID = jQ9(this).closest('tr').find(".indexcol").text();
		$clickbuttonid = prayerID;
		console.log("$prayerid clicked = " + $clickbuttonid);
		var prayerDate = jQ9(this).closest('tr').find(".prayer_update").text();
		var prayerWho = jQ9(this).closest('tr').find(".prayer_who").text();
		var prayerTitle = jQ9(this).closest('tr').find(".prayer_title").text();
		var prayerType = jQ9(this).closest('tr').find(".prayer_type").text();
		var prayerText = jQ9(this).closest('tr').find(".full_text").text();
// Launch Unapproved Prayer Popup
	jQ9("#my_popup2").popup({
		background: true, outline: true, keepfocus: true, blur: false, color: "#D1E0B2",
		});
	});
});

</script>

<!-- Get Which Prayer Item's 'Approve' button was clicked -->
 <script type="text/javascript">
var $approveclickbuttonid = "NA";
var $approveURL = "NA";
var jQ10 = jQuery.noConflict();
jQ10(document).ready(function () {
	jQ10("#unapprovedprayertable tbody").on("click", '.prayer_approve_button', function () {
		var prayerID = jQ10(this).closest('tr').find(".indexcol").text();
		$approveclickbuttonid = prayerID;
		console.log("$approve prayerid clicked = " + $approveclickbuttonid);
		var prayerWho = jQ10(this).closest('tr').find(".prayer_who").text();
		var prayerTitle = jQ10(this).closest('tr').find(".prayer_title").text();
		$approveURL = "ofc_newprayeraccept.php?prayerid=" + $approveclickbuttonid;
		console.log("approveURL = " + $approveURL);
//		window.open($approveURL);
		window.location.href = $approveURL;
	});
});

</script>

<!-- Get Which Prayer Item's 'Reject' button was clicked -->
 <script type="text/javascript">
var $rejectclickbuttonid = "NA";
var $rejectURL = "NA";
var jQ11 = jQuery.noConflict();
jQ11(document).ready(function () {
	jQ11("#unapprovedprayertable tbody").on("click", '.prayer_reject_button', function () {
		var prayerID = jQ11(this).closest('tr').find(".indexcol").text();
		$rejectclickbuttonid = prayerID;
		console.log("$reject prayerid clicked = " + $rejectclickbuttonid);
		var prayerWho = jQ11(this).closest('tr').find(".prayer_who").text();
		var prayerTitle = jQ11(this).closest('tr').find(".prayer_title").text();
		$rejectURL = "ofc_newprayerreject.php?prayerid=" + $rejectclickbuttonid;
		console.log("rejectURL = " + $rejectURL);
//		window.open($rejectURL);
		window.location.href = $rejectURL;
	});
});

</script>

<!-- Process the Send Email buttons click action -->
<!-- Process the Send Email buttons click action -->
 <script type="text/javascript">
	var jQ30 = jQuery.noConflict();
	jQ30(document).ready(function() {

// Send Email using client email application
	jQ30("#sendMail").click(function () {
		console.log("Send Email button clicked");
		var sendaddress = 'ofc_get_prayer_email_address.php';
		jQ30.getJSON(sendaddress, {prayerID: $clickbuttonid
		}, function (data) {
			console.log(data);
			jQ30.each(data.prayerdata, function (i, rep) {
			console.log("Prayer ID: " + rep.prayerid);
			console.log("Prayer owner email: " + rep.prayeremail);
			window.location.href = "mailto:" + rep.prayeremail + "?subject=About your prayer request...";
			});
		});
    });
});

</script>

<!--***************************** Update Prayer Requests ***********************************-->
<!--***************************** Update Prayer Requests ***********************************-->
<!--***************************** Update Prayer Requests ***********************************-->

<!-- Detect 'Update Prayer' button click -->
<script type="text/javascript">
 var jQ50 = jQuery.noConflict();
	jQ50(document).ready(function() {
				jQ50("#church_prayer_button").click(function () {
				console.log("Update Church Prayer Button clicked");
				jQ50("tr.praytable_even").hide();
				jQ50("tr.praytable_odd").hide();
				jQ50("tr.praytable_text").hide();
				jQ50("#updatePrayer").hide();
// Launch Church Prayer Popup
// http://dev.vast.com/jquery-popup-overlay/
		jQ50("#my_popup4").popup({
		background: true, focusdelay: 400, transition: 'all 0.3s', vertical: 'top', autozindex: true, outline: true, keepfocus: true, blur: false, color: "#D1E0B2",
		onopen: function () {
			console.log("Popup4 Opened for Update Church Prayer");
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
var jQ109 = jQuery.noConflict();
jQ109(document).ready(function () {
	jQ109("#allprayertable tbody").on("click", 'tr', function () {
		var prayerID = jQ9(this).closest('tr').find(".indexcol").text();
		$clickbuttonid = prayerID;
		console.log("$clickbuttonid (jQ9) = " + $clickbuttonid);
		var prayerDate = jQ109(this).closest('tr').find(".prayer_update").text();
		prayerWho = jQ109(this).closest('tr').find(".prayer_who").text();
		prayerTitle = jQ109(this).closest('tr').find(".prayer_title").text();
		var prayerType = jQ109(this).closest('tr').find(".type").text();
		var prayerText = jQ109(this).closest('tr').find(".full_text").text();
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
var jQ152 = jQuery.noConflict();
	jQ152(document).ready(function() {
		jQ152("#submitUpdate").click(function () {
			var $idDirectory = "<?php echo $_SESSION['idDirectory'] ?>";
			var $fullname = "<?php echo $_SESSION['fullname'] ?>";
			$answered = jQ152('input[name=answered]:checked', '#updateprayerform').val();
			var $updatetext = jQ152('#updatetext').val();
			console.log("title = " + prayerTitle);
			console.log("answered = " + $answered);
			console.log("updatetext = " + $updatetext);
			console.log("prayerID = " + $clickbuttonid);
			console.log("idDirectory = " + $idDirectory);
			console.log("fullname = " + $fullname);
			var submitUpdate = jQ152.ajax({
			url: 'ofc_updateprayer_admin.php',
			type: 'POST',
			dataType: 'json',
			data: { requestorID : $idDirectory, fullname : $fullname, prayerID : $clickbuttonid, answered : $answered, requesttitle : prayerTitle, updatetext : $updatetext}
		});
		jQ152("input[name=answered]").prop('checked', function () {
			return this.getAttribute('checked') == 'checked';
		});
		jQ152("#updatetext").val('');
		jQ152("tr.praytable_even").hide();
		jQ152("tr.praytable_odd").hide();
		jQ152("tr.praytable_text").hide();
		jQ152("#updatePrayer").hide();

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

?>
		</ul>
	</div>
	<div id="content">

			<h2>Prayer Request Administration</h2>
<table id="detailheading" border="0">

<tr>
<td colspan="2" align="center">
<h3>Approve or Reject Prayer Requests</h3>
</td>
<td colspan="2" class="popbox" align="center">
<h3>All Church Prayer Mgmt.</h3>
</td>
</tr>

<tr>
<td class="header">
To Approve prayer request
</td>
<td class="header">
To Reject prayer request
</td>
<td class="popbox">
<button class='my_popup_open button_flat_green_small' id='prayer_new_button'>New request</button>
</td>
<td class="popbox">
<button class='my_popup4_open button_flat_green_small' id='church_prayer_button'>Update prayer</button>
</td>
</tr>
<tr>
<td class="content">
Click on '<u>approve</u>' to publicly post prayer request. Request will be immediately available on trinityevangel.ourfamilyconnections.org website.
</td>
<td class="content">
Click on '<u>reject</u>' to reject the prayer request. Request will remain in our database, but not publicly visible.
</td>
</tr>

<tr>
<br />
</tr>

</table>

<table id="unapprovedprayertable" class="display" cellpadding="0" cellspacing="0" border="0">

<!--	<table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">-->

	<thead>
		<tr>
			<th>ID</th>
			<th>Approve</th>
			<th>Reject</th>
			<th>Date</th>
			<th>Type</th>
			<th>From</th>
			<th>Title</th>
			<th>View</th>
		</tr>
	
	</thead>
	<tfoot>
		<tr>
			<th>ID</th>
			<th>Approve</th>
			<th>Reject</th>
			<th>Date</th>
			<th>Type</th>
			<th>From</th>
			<th>Title</th>
			<th>View</th>
		</tr>
	</tfoot>

	</table>




		<div id="footerline"></div>
	</div>
	
<?php
	require_once('/ofc_footer.php');
?>
</div>

<!--***************************** Create new Prayer Request POPUP ***********************************-->
<!--***************************** Create new Prayer Request POPUP ***********************************-->
<!--***************************** Create new Prayer Request POPUP ***********************************-->
<div id="my_popup">
	<h2>New Prayer Request</h2>
        <br />
        <br />
        <h3>Enter details about this prayer request and click Send</h3>
        <br />
        <br />
		<form name='newprayerform' method='post' action='tecnewprayer.php'> 		
        <table id="praytable" style="border: 3px solid powderblue;" width="100%" align="left" cellpadding="0" cellspacing="1" border="0">
 		 		 <tr>
 		 		 	<td><input type="hidden" name='visible' value='3'></input></td>
 		 		 </tr>
				<tr>
					<td>&nbsp</td>
					<td>&nbsp</td>
				</tr>
	 			<tr>
	 		 		<td width='25%' align='right'><strong>On Behalf of:</strong></td>
	 		 		<td width='75%'><input name='onbehalfof' type='text' id='onbehalfof' size="40"></td>
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
<!-- 	 		 		<td>&nbsp</td>
 -->
<?php	 		
 					
 					echo "<td><input type='hidden' name='requestorID' value= '" . $_SESSION['idDirectory'] . "' /></td>";
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
	 				<td colspan="3" align="center">New prayer requests from this page require Elder approval.<br />Once sent, click on Prayer Admin tab to approve.<br />Church family will be notified as soon as it's approved.</td>
	 			</tr>   
 		 	</table>
		</form>
<br />
</div>

<!-- ************************************* -->
<!-- View Prayer Details POPUP dialog            -->
<!-- ************************************* -->
 <div id="my_popup2">
	<h2>Prayer Request Details</h2>
        <br />
        <br />
        <h3>View the details of this prayer request.</h3>
        <br />
        <hr>
			<form name='form1' method='post' action=''> 		
			<table id="praytable" style="border: 3px solid powderblue;" width="100%" align='left' cellpadding='0' cellspacing='1' border="0">
							<tr class="praytable_even">
								<td colspan="1"><strong>Type: </strong></td>
								<td colspan="2" class="praypraise"> </td>
							</tr>
							<tr class="praytable_odd">
								<td colspan="1"><strong>Date: </strong></td>
								<td colspan="2" class="praydate"> </td>
							</tr>
							<tr class="praytable_even">
								<td colspan="1"><strong>From: </strong></td>
								<td colspan="2" class="praywho"> </td>
							</tr>
							<tr class="praytable_odd">
								<td colspan="1"><strong>Title: </strong></td>
								<td colspan="2" class="praytitle"> </td>
							</tr>
							<tr>
								<td colspan="3">
									<hr />
								</td>
							</tr>
			</table>
			<table style="border: 3px solid powderblue;" width="100%" align='left' cellpadding='0' cellspacing='1' border="0">
							<tr class="praytable_text">
								<td colspan="5">
									<div class="praytext" style="height: 200px; overflow: auto; white-space: pre-wrap;"></div>
								</td>
							</tr>
							<tr>
								<td>
 								</td>
 							</tr>
			</table>
	      <table width="100%" align="left" cellpadding="0" cellspacing="1" border="0">
 		 		 			<tr class="praytable_buttons" style="border: 1px;">
<!-- 		 		 		 		<td width="100"></td>
  		 		 		 		<td width="100"></td>
 -->
   		 		 		 		<td colspan="2" align="left"><input type="button" class="button_flat_blue_small" id="sendMail" name="sendMail" value="Send Email" /></td>
   		 		 		 		<td colspan="2" align="right"><input type="button" class="my_popup2_close button_flat_blue_small" name="cancel" value="Close" /></td>
  		 		 			</tr>
 		 		 			<tr>
 		 		 			</tr>
 		 		 		<p>
 		 		 		<p>
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
<!--      		<tr>
      			<td align="right"><strong>Title : </strong></td>
      			<td width="5%"></td>
      			<td style="font-size: 14px" colspan="2" class="my_popup3title"></td>
				</tr>
-->      		<tr>
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
<!--        </table>
			<table width="100%" align="left" cellpadding="0" cellspacing="1" border="0" >
-->
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
//					if($_SESSION['gender'] == 'M') 
//					{
//	 					echo "<td><input type='hidden' name='email' value= '" . $recordEmail1 . "' /></td>";
//	 				}
//	 				else //SESSION = F 
//	 				{
// 						echo "<td><input type='hidden' name='email' value= '" . $recordEmail2 . "' /></td>";
// 					}
?>
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

<!--***************************** Update Church Prayer Requests POPUP ***********************************-->
<!--***************************** Update Church Prayer Requests POPUP ***********************************-->
<!--***************************** Update Church Prayer Requests POPUP ***********************************-->
<div id="my_popup4">
	<h2>All Church Prayer Requests</h2>
        <br />
        <br />
        <h3>Select a prayer request to update</h3>
        <br />
        <br />
		<table id="allprayertable" class="display" cellspacing="0" width="100%">
      	  <thead>
         	   <tr>
						<th>id</th>
						<th>Opened</th>
						<th>Name</th>
						<th>Title</th>
						<th>Update</th>
            	</tr>
        		</thead>
        		<tfoot>
            	<tr>
						<th>id</th>
						<th>Opened</th>
						<th>Name</th>
						<th>Title</th>
						<th>Update</th>
            	</tr>
        		</tfoot>
    	</table>

		<form name='myprayerform' method='post' action='ofc_churchprayer.php'> 		
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
	 		 		<td width='25%' align="right"><input type="submit" class="my_popup4_close button_flat_blue_small" name="cancel" value="Cancel" /></td>
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



</body>
</html>