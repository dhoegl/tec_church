// Listen for, and open Update Prayer Request when button clicked
// Called from ofc_famview.php
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

