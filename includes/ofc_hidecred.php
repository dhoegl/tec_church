<script type='text/javascript'>
 var jQ1 = jQuery.noConflict();
	jQ1(document).ready(function() {
		jQ1('.user_cred_entry').hide("slow", function(){
			alert("Welcome!\n\nYou should receive a welcome email shortly.\n\n Click on Back to Trinity Home to Login to our site with your new credentials.");
			console.log("Inside user cred entry hide script");
	});
});
</script>
