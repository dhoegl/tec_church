//Test Troubleshoot script
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


