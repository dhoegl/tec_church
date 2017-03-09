//Detect new Prayer Accept click
//Called from ofc_newprayeraccept.php
var $approveclickbuttonid = "NA";
var $approveURL = "NA";
var jQ150 = jQuery.noConflict();
jQ150(document).ready(function () {
//	jQ150("#acceptprayer #approvePrayer").on("click", '.prayer_approve', function () {
	jQ150("#acceptprayer").click("#approvePrayer", function () {
//		$approveclickbuttonid = prayerID;
		console.log("Approve Prayer button clicked");
		console.log("$approve prayerid clicked = " + $approveclickbuttonid);
//		$approveURL = "ofc_newprayeraccept.php?prayerid=" + $approveclickbuttonid;
//		$approveURL = "bing.com";
		console.log("approveURL = " + $approveURL);
//		window.open($approveURL);
//		window.location.href = $approveURL;

	});
});


