<?php 
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	header("location:ofc_welcome.php");
	exit();
}
$profileID = $_SESSION['idDirectory'];
require_once('ofc_dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- BOOTSTRAP 4 - Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

<!--CSS Scripts for Datatables Bootstrap 4 Responsive functions    -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap4.min.css">

<!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Extended styles for this page -->
    <link href="css/ofc_css_style.css" rel="stylesheet">
    <!-- Tenant-specific stylesheet -->
    <link href="_tenant/css/tenant.css" rel="stylesheet" />


<!--JS Scripts for Datatables Bootstrap 4 Responsive functions    -->
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>        
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>        
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>        


<!-- jQuery functions & scripts -->
<!-- jQuery functions & scripts -->
<!-- jQuery functions & scripts -->

<?php
// Get User Login details
    include('/includes/ofc_get_loggedinuser.php');

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


<!-- ********************* Get Which Prayer Item's 'View/Approve/Reject' button was clicked ******************* -->
<!-- ********************* Get Which Prayer Item's 'View/Approve/Reject' button was clicked ******************* -->
<!-- ********************* Get Which Prayer Item's 'View/Approve/Reject' button was clicked ******************* -->
 <script type="text/javascript">
var $clickbuttonid = "NA";
var jQ9 = jQuery.noConflict();
jQ9(document).ready(function () {
	jQ9("#unapprovedprayertable tbody").on("click", 'tr', function () {
	<!--//jQ9("#unapprovedprayertable tbody").on("click", '.view_button', function () {
		//jq9("tr.praytable_even").show();
		//jq9("tr.praytable_odd").show();
		//jq9("tr.praytable_text").show();
		//jq9("#updateprayer").show();
		var prayerID = jQ9(this).closest('tr').find(".indexcol").text();
		$clickbuttonid = prayerID;
		console.log("View/Approve/Reject button - $prayerid clicked = " + $clickbuttonid);
		var prayerDate = jQ9(this).closest('tr').find(".prayer_update").text();
		var prayerWho = jQ9(this).closest('tr').find(".prayer_who").text();
		var prayerTitle = jQ9(this).closest('tr').find(".prayer_title").text();
		var prayerType = jQ9(this).closest('tr').find(".prayer_type").text();
		var prayerText = jQ9(this).closest('tr').find(".full_text").text();
	});
});

</script>

<!-- Detect 'Details' button click -->
<script type="text/javascript">
 var jQ4 = jQuery.noConflict();
    jQ4(document).ready(function () {
        jQ4("#unapprovedprayertable").on("click", "button", function () {
            var prayerDate = jQ4(this).closest('tr').find(".prayer_update").html();
            var prayerWho = jQ4(this).closest('tr').find(".prayer_who").html();
            console.log("Inside JQ4");
        });
    });



// Launch Unapproved Prayer Popup
//	jQ9("#my_popup2").popup({
//		background: true, outline: true, keepfocus: true, blur: false, color: "#D1E0B2",
//		});
//	});
//});

</script>

<!-- **************************** Get Which Prayer Item's 'Approve' button was clicked ******************** -->
<!-- **************************** Get Which Prayer Item's 'Approve' button was clicked ******************** -->
<!-- **************************** Get Which Prayer Item's 'Approve' button was clicked ******************** -->
 <script type="text/javascript">
var $approveclickbuttonid = "NA";
var $approveURL = "NA";
var jQ10 = jQuery.noConflict();
jQ10(document).ready(function () {
	jQ10("#unapprovedprayertable tbody").on("click", '.prayer_approve', function () {
		var prayerID = jQ10(this).closest('tr').find(".indexcol").text();
		$approveclickbuttonid = prayerID;
		console.log("$approve prayerid clicked = " + $approveclickbuttonid);
		var prayerWho = jQ10(this).closest('tr').find(".prayer_who").text();
		var prayerTitle = jQ10(this).closest('tr').find(".prayer_title").text();
		$approveURL = "ofc_newprayeraccept.php?prayerid=" + $approveclickbuttonid;
		console.log("Approve Button clicked");
        console.log("approveURL = " + $approveURL);

//		window.open($approveURL);
		//window.location.href = $approveURL;
	});
});

</script>

<!-- **************************** Get Which Prayer Item's 'Reject' button was clicked ******************** -->
<!-- **************************** Get Which Prayer Item's 'Reject' button was clicked ******************** -->
<!-- **************************** Get Which Prayer Item's 'Reject' button was clicked ******************** -->
 <script type="text/javascript">
var $rejectclickbuttonid = "NA";
var $rejectURL = "NA";
var jQ10 = jQuery.noConflict();
jQ10(document).ready(function () {
	jQ10("#unapprovedprayertable tbody").on("click", '.prayer_reject', function () {
		var prayerID = jQ10(this).closest('tr').find(".indexcol").text();
		$rejectclickbuttonid = prayerID;
		console.log("$reject prayerid clicked = " + $rejectclickbuttonid);
		var prayerWho = jQ10(this).closest('tr').find(".prayer_who").text();
		var prayerTitle = jQ10(this).closest('tr').find(".prayer_title").text();
		$approveURL = "ofc_newprayerreject.php?prayerid=" + $rejectclickbuttonid;
		console.log("Reject Button clicked");
        console.log("rejectURL = " + $rejectURL);

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
    <!--Navbar-->
    <?php
    $activeparam = '8'; // sets nav element highlight
    require_once('ofc_nav.php');
    ?>
    <!-- Intro Section -->
<div class="container-fluid profile_bg bottom-buffer">

    <div class="row pt-2">
        <div class="col-sm-12">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Using the Prayer Admin page
            </button>
            <div class="btn-group mr-2" role="group" aria-label="Button group with nested dropdown">
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administer Prayer Requests</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <button class="dropdown-item" data-toggle="modal" data-target="#ModalPrayerNew" type="button">Prayer On Behalf</button>
                        <button class="dropdown-item" data-toggle="modal" data-target="#ModalPrayerUpdate" type="button">Update Prayer Request</button>
                    </div> <!--dropdown-menu-->
                </div> <!--dropdown-->
            </div> <!--btn-group-->
            <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#testalert" aria-expanded="false" aria-controls="testalert">
                Test Alert
            </button>
            </div> <!-- col sm-12 -->
    </div> <!-- row -->
    <div class="collapse" id="collapseExample">
        <div class="row">
            <div class="col-sm-6">
                <div class="card card-body">
                    <h4 class="card-title">Click on the <span class="btn btn-primary">View</span> button to review the prayer request</h4>
                    <ul class="card-text">
                        <li>You can send an email to the prayer request originator directly from the View popup</li>
                    </ul>
                </div> <!-- card -->
            </div> <!-- col-sm-6 -->
            <div class="col-sm-6">
                    <div class="card card-body">
                        <h4 class="card-title">Administering Prayer Requests</h4>
                        <ul class="card-text">
                            <li>As Prayer Administrator, you have the ability to submit new family prayer requests, as well as updating existing prayer requests.</li>
                            <ul>
                                <li>Click on the <span class="btn btn-success">Administer Prayer Requests</span> dropdown button.</li>
                            </ul>
                            <ul>
                                <li>For new prayer requests, you will be submitting prayer requests on behalf of others. The 'Pray for' field <strong>must</strong> be filled in.</li>
                                <li><strong>Note:</strong> Navigate to your own 'My Profile' page to submit your own family's prayer request.</li>
                            </ul>
                            <li>Updating existing prayer requests can be performed using the same 'Administer Prayer Requests' dropdown button.</li>
                        </ul>
                    </div> <!-- card -->
            </div> <!-- col-sm-6 -->
        </div> <!-- row -->
        <div class="row">
            <div class="col-sm-6">
                <div class="card card-body">
                        <h4 class="card-title">Approving and Rejecting Prayer Requests</h4>
                        <ul class="card-text">
                            <li>Click on <span class="btn btn-success">Approve</span> to post the prayer request for family to see. Request will be immediately available on the website.</li>
                            <li>Click on <span class="btn btn-danger">Reject</span> to reject the prayer request. Request will remain in our database, but not publicly visible.</li>
                        </ul>
                    </div> <!-- card -->
            </div> <!-- col-sm-6 -->
        </div> <!-- row -->
    </div> <!-- collapse --> 
    <div class="row">
        <div class="col-sm-12">

            <div id="prayerlogleft">
                <br>
                <h2>Prayer Request Administration</h2>
                <hr>
            </div> <!-- prayerlogleft -->


        <table id="unapprovedprayertable" class="table table-sm table-striped dt-responsive" cellpadding="0" cellspacing="0" border="0" width="100%">
        <!--<table id="unapprovedprayertable" class="display table table-sm table-striped dt-responsive" cellspacing="0" width="100%">-->

        <!--	<table width="500" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">-->
	        <thead>
		        <tr>
			        <th>ID</th>
			        <th>Date</th>
			        <th>Type</th>
			        <th>From</th>
			        <th>Title</th>
			        <th>View</th>
			        <th>Approve</th>
			        <th>Reject</th>
                    <th>Smack</th>
		        </tr>
	
	        </thead>
	        <tfoot>
		        <tr>
			        <th>ID</th>
			        <th>Date</th>
			        <th>Type</th>
			        <th>From</th>
			        <th>Title</th>
			        <th>View</th>
			        <th>Approve</th>
			        <th>Reject</th>
                    <th>Smack</th>
		        </tr>
	        </tfoot>

	    </table>




	    </div> <!-- content -->
    </div> <!-- row -->
    <div class="row fixed-bottom">
        <div class="col-md-12">
            <div class="text-center">
                <?php
                require_once('/includes/ofc_footer.php')
                ?>
            </div><!-- text -->
        </div><!-- col-md-12 -->
    </div><!-- Row -->
</div> <!-- container -->

<!--***************************** Test Alert Popup ***********************************-->
<!--***************************** Test Alert Popup ***********************************-->
<!--***************************** Test Alert Popup ***********************************-->
<div class="modal fade" id="testalert">
    <div class="alert alert-primary alert-dismissable" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
        <hr>
        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
        <button class="btn btn-primary close" data-dismiss="alert" aria-label="close">Close</button>
    </div>
</div>

<!--***************************** View Prayer Info MODAL ***********************************-->
<!--***************************** View Prayer Info MODAL ***********************************-->
<!--***************************** View Prayer Info MODAL ***********************************-->

<div class="modal fade" id="ModalPrayerInfo" tabindex="-1" role="dialog" aria-labelledby="ModalPrayer" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="ModalPrayer">Click <strong>Send Email</strong> to send an email to requestor.<br>Click <strong>Close</strong> when done.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!-- modal-header -->
      <div class="modal-body">
	<form name='form1' method='post' action=''> 		
	<table id="praytable" style="border: 3px solid powderblue;" width="100%" align='left' cellpadding='0' cellspacing='1' border="0">
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
	</table>
    <table id="praycontent" style="border: 3px solid powderblue;" width="100%" align='left' cellpadding='0' cellspacing='1' border="0">
		<tr class="praytable_text">
                    <td colspan="4">
                        <div class="praytext" style="height: 200px; overflow: auto; white-space: pre-wrap;"></div>
                    </td>
		</tr>
		<tr>
                    <td>
                    </td>
 		</tr>
	</table>
    </div> <!-- modal-body -->
    <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="sendMail">Send Email</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div> <!-- modal-footer -->
    </form>
    </div> <!-- modal-content -->
  </div> <!-- modal-dialog -->
</div> <!-- modal-fade -->

<!--***************************** Approve Prayer MODAL ***********************************-->
<!--***************************** Approve Prayer MODAL ***********************************-->
<!--***************************** Approve Prayer MODAL ***********************************-->

<div class="modal fade" id="ModalPrayerApprove" tabindex="-1" role="dialog" aria-labelledby="ModalPrayer" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="ModalPrayer">Click <strong>Approve</strong> to approve the prayer request.<br>Click <strong>Cancel</strong> to return to the prayer requests.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!-- modal-header -->
      <div class="modal-body">
	    <form name='form1' method='post' action=''> 


        <table id="praytable" style="border: 3px solid powderblue;" width="100%" align='left' cellpadding='0' cellspacing='1' border="0">
        	<tr class="praytable_even">
                    <td colspan="1"><strong>Type: </strong></td>
                    <td colspan="4" class="praypraise"> </td>
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
	    </table>

      </div> <!-- modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="ApprovePrayerRequest">Approve</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div> <!-- modal-footer -->
       </form>
    </div> <!-- modal-content -->
  </div> <!-- modal-dialog -->
</div> <!-- modal-fade -->


<!--***************************** Reject Prayer MODAL ***********************************-->
<!--***************************** Reject Prayer MODAL ***********************************-->
<!--***************************** Reject Prayer MODAL ***********************************-->

<div class="modal fade" id="ModalPrayerReject" tabindex="-1" role="dialog" aria-labelledby="ModalPrayer" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="ModalPrayer">Click <strong>Reject</strong> to reject the prayer request.<br>Click <strong>Cancel</strong> to return to the prayer requests.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!-- modal-header -->
      <div class="modal-body">
	    <form name='form1' method='post' action=''> 


        <table id="praytable" style="border: 3px solid powderblue;" width="100%" align='left' cellpadding='0' cellspacing='1' border="0">
        	<tr class="praytable_even">
                    <td colspan="1"><strong>Type: </strong></td>
                    <td colspan="4" class="praypraise"> </td>
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
	    </table>

      </div> <!-- modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="RejectPrayerRequest">Reject</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div> <!-- modal-footer -->
       </form>
    </div> <!-- modal-content -->
  </div> <!-- modal-dialog -->
</div> <!-- modal-fade -->



<!--***************************** New Prayer Info MODAL ***********************************-->
<!--***************************** New Prayer Info MODAL ***********************************-->
<!--***************************** New Prayer Info MODAL ***********************************-->

<div class="modal fade" id="ModalPrayerNew" tabindex="-1" role="dialog" aria-labelledby="ModalPrayerNew" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalPrayerNew">
                    Enter details about your prayer request and click
                    <strong>Send.</strong>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div><!-- modal-header -->
            <div class="modal-body">
                <form name='newprayerform' method='post' action='ofc_newprayer.php'>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 px-2">Pray for:</legend>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="onbehalfof" id="onbehalfof" placeholder="Pray on behalf of whom?" />
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <legend class="col-form-label col-sm-3 px-2">Visibility:</legend>
                            <div class="col-sm-8 ml-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="visible" value="1" />
                                    <label class="form-check-label" for="visible" id="Visibility1"></label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="visible" value="3" checked />
                                    <label class="form-check-label" for="visible" id="Visibility2"></label>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <legend class="col-form-label col-sm-3 px-2">Praise:</legend>
                            <div class="col-sm-8 ml-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="prayer" value="Prayer" checked />
                                    <label class="form-check-label" for="prayer">
                                        Prayer Request
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="prayer" value="Praise" />
                                    <label class="form-check-label" for="prayer">
                                        Praise
                                    </label>
                                </div>
                            </div>
                        </div>

                        <hr />
                        <div class="row">
                            <legend class="col-form-label col-sm-3 px-2">Title:</legend>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="requesttitle" id="requesttitle" placeholder="Title" />
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <legend class="col-form-label col-sm-3 px-2">Details:</legend>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" rows="6" name="requesttext" id="requesttext" placeholder="Details"></textarea>
                            </div>
                        </div>
                    </fieldset>
                    <!--</form>-->




            </div><!-- modal-body -->
            <div class="modal-footer">
                <p id="newprayernotice"></p>
                <?php
                //Hidden POST tags for ofc_newprayer
                ////// Identifies source page for correct RETURN
                echo "<input type='hidden' name='page' value= 'prayer_admin' />";
                ////// Captured fullname for email notification
                $fullname = $_SESSION['fullname'];
                echo "<input type='hidden' name='fullname' value= '" . $fullname . "' />";
                ////// Captures email address of prayer request submitter
                $email = $_SESSION['email'];
                echo "<input type='hidden' name='email_address' value= '" . $email . "' />";
                ////// Captures profile ID of prayer request submitter
                $profileID = $_SESSION['idDirectory'];
                echo "<input type='hidden' name='requestorID' value= '" . $profileID . "' />";
                ?>

                <input type="hidden" name="Domain_Name" id="domainname" />
                <input type="submit" class="btn btn-primary" name='submitrequest' value='Send' />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div><!-- modal-footer -->
            </form>
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal-fade -->




<!--***************************** Create new Prayer Request POPUP ***********************************-->
<!--***************************** Create new Prayer Request POPUP ***********************************-->
<!--***************************** Create new Prayer Request POPUP ***********************************-->
<!--<div id="my_popup">
	<h2>New Prayer Request</h2>
        <br />
        <br />
        <h3>Enter details about this prayer request and click Send</h3>
        <br />
        <br />
		<form name='newprayerform' method='post' action='ofc_newprayer.php'> 		
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
	 				else
	 				{
 						echo "<td><input type='hidden' name='email' value= '" . $recordEmail2 . "' /></td>";
 					}
?>
	 			</tr>
	 			<tr>
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
</div>-->


<!--***************************** Update Prayer Request POPUP ***********************************-->
<!--***************************** Update Prayer Request POPUP ***********************************-->
<!--***************************** Update Prayer Request POPUP ***********************************-->
<!--<div id="my_popup3">
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
      		<tr>
      			<td width="25%">&nbsp</td>
	</tr>
      		<tr>
      			<td></td>
      		</tr>-->
      		<!--<tr>
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
	 			<tr>-->
	 				<!--<td>&nbsp</td>-->
<?php				
					$fullname = $_SESSION['firstname'] . " " . $recordLast; 
 					echo "<td><input type='hidden' name='fullname' value= '" . $fullname . "' /></td>";
?>
	 			</tr>
	 			<tr>
 <?php	 		
 					
 					echo "<td><input type='hidden' name='requestorID' value= '" . $profileaddr . "' /></td>";
 ?>
				<!--</tr>
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
</div>-->

<!--***************************** Update Church Prayer Requests POPUP ***********************************-->
<!--***************************** Update Church Prayer Requests POPUP ***********************************-->
<!--***************************** Update Church Prayer Requests POPUP ***********************************-->
<!--<div id="my_popup4">
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
    	</table>-->

		<!--<form name='myprayerform' method='post' action='ofc_churchprayer.php'> 		
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
	 			<tr>-->
<!-- 	 		 		<td>&nbsp</td>
 -->
 <?php	 		
 					
 					echo "<td><input type='hidden' name='requestorID' value= '" . $profileaddr . "' /></td>";
 ?>
				</tr>
			<!--</table>
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
<br />-->

    <!-- Tenant Configuration JavaScript Call -->
    <script type="text/javascript" src="/js/ofc_config_ajax_call.js"></script>


</body>
</html>