/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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


