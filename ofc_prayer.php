<?php 
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	header("location:ofc_welcome.php");
	exit();
}
$profileID = $_SESSION['idDirectory'];
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
    
<?php
// Get User Login details
   include('/includes/ofc_get_loggedinuser.php');

// Get Active Prayer List
   include('/includes/ofc_view_activeprayerlist.php');
   
// Get Active Prayer jQuery
   include('/includes/ofc_get_activeprayer_jquery.php');
   
?>


<!-- Process the Prayer 'Follow' and 'Unfollow' buttons click action -->
 <script type="text/javascript">
	var jQ20 = jQuery.noConflict();
	jQ20(document).ready(function() {

// Follow button
	jQ20("#follow_button").click(function () {
		console.log("prayerFollow button was pressed for " + $clickbuttonid + ": I am this user " + $loggedusername + " with ID = " + $loggedidDirectory);
		var $followselect = 'follow';
		var request = jQ20.ajax({
		url: 'ofc_update_follow_table.php',
		type: 'POST',
		dataType: 'json',
		data: { followselect: $followselect, followprayerID: $clickbuttonid, followprayerWho : $loggedusername, followprayerDir : $loggedidDirectory}
		});

// Check if prayer is being followed by user - Show/Hide the Follow/Unfollow buttons
		var checkfollow = 'ofc_check_follow_table.php';
			jQ20.getJSON(checkfollow, {followprayerID: $clickbuttonid, followprayerWho : $loggedusername, followprayerDir : $loggedidDirectory
			}, function (data) {
				console.log(data);
				console.log("Data Message = " + data.followmessage);
			jQ20.each(data.followmessage, function (i, rep) {
				if ('yes' === rep.Message.toLowerCase()) {
					console.log("YES is the response");
					jQ20("#follow_button").hide();
					jQ20("#unfollow_button").show();
				};
				if ('no' === rep.Message.toLowerCase()) {
					console.log("NO is the response");
					jQ20("#follow_button").show();
					jQ20("#unfollow_button").hide();
				}
			});
		});

	});

// Unfollow button
	jQ20("#unfollow_button").click(function () {
		console.log("prayerFollow button was pressed for " + $clickbuttonid + ": I am this user " + $loggedusername + " with ID = " + $loggedidDirectory);
		var $followselect = 'unfollow';
		var request = jQ20.ajax({
		url: 'ofc_update_follow_table.php',
		type: 'POST',
		dataType: 'json',
		data: { followselect: $followselect, followprayerID: $clickbuttonid, followprayerWho : $loggedusername, followprayerDir : $loggedidDirectory}
		});

// Check if prayer is being followed by user - Show/Hide the Follow/Unfollow buttons
		var checkfollow = 'ofc_check_follow_table.php';
			jQ20.getJSON(checkfollow, {followprayerID: $clickbuttonid, followprayerWho : $loggedusername, followprayerDir : $loggedidDirectory
			}, function (data) {
				console.log(data);
				console.log("Data Message = " + data.followmessage);
			jQ20.each(data.followmessage, function (i, rep) {
				if ('yes' === rep.Message.toLowerCase()) {
					console.log("YES is the response");
					jQ20("#follow_button").hide();
					jQ20("#unfollow_button").show();
				};
				if ('no' === rep.Message.toLowerCase()) {
					console.log("NO is the response");
					jQ20("#follow_button").show();
					jQ20("#unfollow_button").hide();
				}
			});
		});
	});
});
</script>

<!-- Process the Send Email buttons click action -->
 <script type="text/javascript">
	var jQ30 = jQuery.noConflict();
	jQ30(document).ready(function() {

// Send Email using client email application
// NOTE: If nothing is returned from ofc_get_prayer_email_address, script will fail - temporarily 'by design' until conditions are established to disable or hide Send Mail button
	jQ30("#sendMail").click(function () {
		console.log("Send Email button clicked");
		var sendaddress = '/includes/ofc_get_prayer_email_address.php';
		jQ30.getJSON(sendaddress, {prayerID: $clickbuttonid
		}, function (data) {
			console.log(data);
			jQ30.each(data.prayerdata, function (i, rep) {
			console.log("Prayer ID: " + rep.prayerid);
			console.log("Prayer owner email: " + rep.prayeremail);
			window.location.href = "mailto:" + rep.prayeremail + "?subject=Praying for you!";
			});
		});
    });
});

</script>


<!-- Get Which Prayer Item's 'Details' button was clicked -->
 <script type="text/javascript">
var $clickbuttonid = "NA";
var jQ9 = jQuery.noConflict();
jQ9(document).ready(function () {
	jQ9("#activeprayertable tbody").on("click", 'tr', function () {
		var prayerID = jQ9(this).closest('tr').find(".indexcol").text();
		$clickbuttonid = prayerID;
		console.log("$clickbuttonid (this jQ9 entry) = " + $clickbuttonid);
		var prayerDate = jQ9(this).closest('tr').find(".prayer_update").text();
		var prayerAnswer = jQ9(this).closest('tr').find(".prayer_answer").text();
		var prayerWho = jQ9(this).closest('tr').find(".prayer_who").text();
		var prayerTitle = jQ9(this).closest('tr').find(".prayer_title").text();
		var prayerType = jQ9(this).closest('tr').find(".type").text();
		var prayerText = jQ9(this).closest('tr').find(".full_text").text();
// Check if prayer has been answered - disable follow/unfollow buttons if true
		jQ9("#follow_button").hide();
		jQ9("#unfollow_button").hide();
		console.log("prayerAnswer = " + prayerAnswer);
		console.log("loggedidDirectory = " + $loggedidDirectory);
		if (prayerAnswer != 'Answered' && $loggedidDirectory < 20000) {
// Check if prayer is being followed by user - Show/Hide the Follow/Unfollow buttons
			console.log("Inside prayerAnswer check routing");
			console.log("followprayerID = " + $clickbuttonid);
			console.log("followprayerWho = " + $loggedusername);
			console.log("followprayerDir = " + $loggedidDirectory);
			var checkfollow = 'ofc_check_follow_table.php';
				jQ9.getJSON(checkfollow, {followprayerID: $clickbuttonid, followprayerWho : $loggedusername, followprayerDir : $loggedidDirectory
				}, function (data) {
					console.log(data);
					console.log("Data Message = " + data.followmessage);
				jQ9.each(data.followmessage, function (i, rep) {
					if ('yes' === rep.Message.toLowerCase()) {
						console.log("YES is the response");
						jQ9("#follow_button").hide();
						jQ9("#unfollow_button").show();
					};
					if ('no' === rep.Message.toLowerCase()) {
						console.log("NO is the response");
						jQ9("#follow_button").show();
						jQ9("#unfollow_button").hide();
					};
				});
			});
		};
	});
});

</script>

<!-- Detect 'Details' button click -->
<script type="text/javascript">
 var jQ4 = jQuery.noConflict();
	jQ4(document).ready(function() {
		jQ4("#activeprayertable").on("click", "button", function () {
	var prayerDate = jQ4(this).closest('tr').find(".prayer_update").html();
	var prayerWho = jQ4(this).closest('tr').find(".prayer_who").html();
	});
// Launch Active Prayer Popup
// http://dev.vast.com/jquery-popup-overlay/
//	jQ4("#my_popup").popup({
//		background: true, focusdelay: 400, transition: 'all 0.3s', vertical: 'top', outline: true, keepfocus: true, blur: false, color: "#D1E0B2",
//		onopen: function () {
//			var prayerDate = jQ4(this).closest('tr').find(".prayer_update").html();
//		}
//		});

 });
</script>


</head>
<body>
    <!--Navbar-->
    <?php
        $activeparam = '5'; // sets nav element highlight
        require_once('ofc_nav.php');
    ?>


    <!-- Intro Section -->
<div class="container-fluid profile_bg">

    <div class="row pt-2">
        <div class="col-sm-12">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Using this prayer list
            </button>
            <div class="btn-group mr-2" role="group" aria-label="Button group with nested dropdown">
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Prayer Requests</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <button class="dropdown-item" data-toggle="modal" data-target="#ModalPrayerNew" type="button">New Prayer Request</button>
                        <button class="dropdown-item" data-toggle="modal" data-target="#ModalPrayerUpdate" type="button">Update Prayer Request</button>
                    </div> <!--dropdown-menu-->
                </div> <!--dropdown-->
            </div> <!--btn-group-->
        </div> <!-- col sm-12 -->
    </div> <!-- row -->
    <div class="collapse" id="collapseExample">
        <div class="row">
            <div class="col-sm-6">
                    <div class="card card-body">
                        <h4 class="card-title">Sorting, Searching, and Paging</h4>
                        <ul class="card-text">
                            <li>Click on a header arrow to sort columns ascending or descending</li>
                            <li>Use the Search box to find someone or a specific prayer request</li>
                            <li>Navigate pages using the Page Selector at the bottom of the page</li>
                        </ul>
                    </div>
            </div> <!-- col-sm-6 -->
            <div class="col-sm-6">
                <div class="card card-body">
                    <h4 class="card-title">Click on the Quick Glance <span class="faux_hyperlink">Title</span> or the <span class="button_flat_green_small">Details</span> button to</h4>
                    <ul class="card-text">
                        <li>View more details about this prayer request</li>
                        <li>Follow this prayer request to receive updates and/or answers to it in email</li>
                        <li>Let the person know you care by sending an email</li>
                        <li><strong>NOTE: </strong>On smaller mobile devices, the Quick Glance <span class="faux_hyperlink">Title</span> will be necessary for viewing prayer request details</li>
                    </ul>
                </div>
            </div> <!-- col-sm-6 -->
        </div> <!-- row -->
    </div> <!-- collapse --> 
    <div class="row">
        <div class="col-sm-12">

            <div id="prayerlogleft">
                <br>
                <h2>Active Prayer Requests</h2>
                <hr>
            </div>

            <!--<table id="activeprayertable" class="display table table-sm table-responsive" cellspacing="0" width="100%">-->
    <table id="activeprayertable" class="table table-sm table-striped dt-responsive" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Opened</th>
                            <th>Family Member</th>
                            <th>Type</th>
                            <th>Answered</th>
                            <th>Quick Glance</th>
                            <th>Details</th>
                            <th>Smack</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Opened</th>
                            <th>Family Member</th>
                            <th>Type</th>
                            <th>Answered</th>
                            <th>Quick Glance</th>
                            <th>Details</th>
                            <th>Smack</th>
                        </tr>
                    </tfoot>
                </table>
            <p></p>
            <p></p>
            <p></p>
        </div>
    </div>
    <div id="footerline"></div>
            
</div>
	
<?php
//	require_once('/tecfooter.php');
?>



<!-- ************************************* -->
<!-- View Prayer Details OVERLAY dialog            -->
<!-- ************************************* -->
 <div id="my_popup">
	<h2>View Prayer Request Details</h2>
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
				<table style="border: 3px solid powderblue;" width="100%" align='left' cellpadding='0' cellspacing='1' border="0">
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
				<table width="100%" align='left' cellpadding='0' cellspacing='1' border="0">
					<tr class="praytable_buttons" style="border: 1px;">
<!--   		 			<td align="left"><input type="button" class="button_flat_blue_small" id="sendMail" name="sendMail" value="Send Email" /></td>
   		 			<td align="left"><input type="button" class="button_flat_blue_small" id="unfollow_button" name="unfollow" value="Unfollow" /></td>
   		 			<td align="left"><input type="button" class="button_flat_blue_small" id="follow_button" name="follow" value="Follow" /></td>
   		 			<td align="right"><input type="button" class="my_popup_close button_flat_blue_small" name="cancel" value="Close" /></td>-->
  		 		 	</tr>
 		 		 	<tr>
 		 		 	</tr>
	 		 		 	<p>
 			 		 	<p>
				</table>
 			</form>
			
			<br />

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
		<tr>
                    <td colspan="5">
                        <hr />
                    </td>
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
                    echo "<input type='hidden' name='page' value= 'prayer' />";
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




    
    <script src="https://cdn.rawgit.com/vast-engineering/jquery-popup-overlay/1.7.13/jquery.popupoverlay.js"></script>

    <!-- Tenant Configuration JavaScript Call -->
    <script type="text/javascript" src="/js/ofc_config_ajax_call.js"></script>


</body>
</html>



