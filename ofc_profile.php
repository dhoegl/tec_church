<?php 
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	header("location:ofc_welcome.php");
	exit();
}
else {
        if(isset($_GET['id']) ) {
            $profileID = $_GET['id'];
            $_SESSION["Famview_Profile"] = $profileID;
            if($_SESSION['idDirectory'] == $profileID) {
		$MyView = 'Y';
            }
            else {
		$MyView = 'N';
            }
            require_once('ofc_dbconnect.php');

    }
        
    else {
        session_destroy();
        header("location:ofc_welcome.php");
        exit();
    }
    /*Query Directory for State - unorthodox method to extract State value to determine 'selected' on Modal popup */
		$profilequery = $mysql->query("SELECT * FROM $dir_tbl_name WHERE idDirectory = '" . $profileID . "'");
                while ($staterow = $profilequery->fetch_assoc())
                {
                    $recordState = $staterow['State'];
                }

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
<!--
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
-->
<!-- BOOTSTRAP 4 ALPHA - Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>TEST - OurFamilyConnections Home</title>

<!-- Bootstrap 4 BETA CSS -->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">-->
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap4.min.css">
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
<!--    <link href="css/signin.css" rel="stylesheet">-->
    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">
    <!-- Extended styles for this page -->
    <link href="css/ofc_css_style.css" rel="stylesheet">
    
<!-- Initialize jquery js script -->
<!--    <script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>-->
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>

<!-- jQuery (necessary for Bootstrap's (BOOTSTRAP 4 BETA) JavaScript plugins) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<!-- Popup script from http://dev.vast.com/jquery-popup-overlay/ -->
<!--	<script src="https://cdn.rawgit.com/vast-engineering/jquery-popup-overlay/1.7.13/jquery.popupoverlay.js"></script>-->

<!-- Call Image Verify jQuery script -->
<script src="/js/image_verify.js"></script>


     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    
    <script type="text/javascript">
        function calculate_age(dob) 
        {
            var diff_ms = Date.now() - dob.getTime();
            var age_dt = new Date(diff_ms);
            return Math.abs(age_dt.getUTCFullYear() - 1970);
        }
    </script>
    
    <script type="text/javascript">
        function dateConvert(dateval)
        {
            var m_names = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
            var curr_date = dateval.getUTCDate();
            var curr_month = dateval.getMonth();
            var curr_year = dateval.getFullYear();
            var newdateval = m_names[curr_month] + " " + curr_date + ", " + curr_year;
            return newdateval;
        }
    </script>
    <script type="text/javascript">
        function dateConvertNoYear(dateval)
        {
            var m_names = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
            var curr_date = dateval.getUTCDate();
            var curr_month = dateval.getMonth();
            var curr_year = dateval.getFullYear();
            var newdatevalnoyear = m_names[curr_month] + " " + curr_date;
            return newdatevalnoyear;
        }
    </script>
    
    <script type="text/javascript">
        var $profile_id = <?php echo "'" . $profileID . "'"; ?>;
        var $fullname = <?php echo "'" . $_SESSION['fullname'] . "'"; ?>;
        var $idDirectory = <?php echo "'" . $_SESSION['idDirectory'] . "'"; ?>;
        var jQ05 = jQuery.noConflict();
        jQ05(document).ready(function(){

            // Call script to pull profile data....
            var request = jQ05.ajax({
		url: 'services/ofc_get_profile.php',
		type: 'POST',
		dataType: 'json',
		data: { profile_id: $profile_id}
            });
            
            // The ajax call succeeded. 
            request.done(function(data) {
                var $c1a = "";
                var years;
                var $profile_pic_img = "src=profile_img/" + data[0].piclink2;
                profileinfo = [];
                profilechildren = [];
                console.log('Profile Info Zip = ' + data[0].zip);
                console.log('Picture file = ' + data[0].piclink2);
                // Load Profile Page Contact Data
                jQ05("#profile_card").empty();
                profileinfo.push(data[0].hisname + ' & ' + data[0].hername + ' ' + data[0].lastname);
                jQ05("#profile_card").append(profileinfo.join(''));
                jQ05("#profile_pic").attr("src", "profile_img/" + data[0].piclink2);
                jQ05("#profile_pic_edit").attr("src", "profile_img/" + data[0].piclink2);
                if(data[0].hisname){
                    jQ05("#profile_email_him").html("<h6>" + data[0].hisname + " (or both): " + "<a href='mailto:" + data[0].email1 + "'>" + data[0].email1 + "</a></h6>");
                }
                if(data[0].hername){
                    jQ05("#profile_email_her").html("<h6>" + data[0].hername + ": <a href='mailto:" + data[0].email2 + "'>" + data[0].email2 + "</a></h6>");
                }
                if(data[0].phonehome){
                    jQ05("#profile_phone_home").html("<h6>Home phone: " + data[0].phonehome) + "</h6>";
                }
                if(data[0].hisname){
                    jQ05("#profile_cell_him").html("<h6>" + data[0].hisname + " cell: <a href='tel:" + data[0].hiscell + "'>" + data[0].hiscell + "</a></h6>");
                }
                if(data[0].hername){
                    jQ05("#profile_cell_her").html("<h6>" + data[0].hername + " cell: <a href='tel:" + data[0].hercell + "'>" + data[0].hercell + "</a></h6>");
                }
                if(data[0].addr1 && data[0].addr2){
                    jQ05("#profile_addr").html(data[0].addr1 + "\r\n" + data[0].addr2 + "\r\n" + data[0].city + ", " + data[0].state + " " + data[0].zip);
                }
                if(data[0].addr1 && !data[0].addr2){
                    jQ05("#profile_addr").html(data[0].addr1 + "\r\n" + data[0].city + ", " + data[0].state + " " + data[0].zip);
                }
                if(data[0].anniv) {
                    var myanniv = dateConvert(new Date(data[0].anniv));
                    jQ05("#profile_anniv").html("<h6>Anniversary: " + myanniv + "</h6>");
                }
                if(data[0].hisbday){
                    var hisbday2 = dateConvertNoYear(new Date(data[0].hisbday));
                    jQ05("#profile_hisbday").html("<h6>" + data[0].hisname + "'s Birthday: " + hisbday2 + "</h6>");
                }
                if(data[0].herbday){
                    var herbday2 = dateConvertNoYear(new Date(data[0].herbday));
                    jQ05("#profile_herbday").html("<h6>" + data[0].hername + "'s Birthday: " + herbday2 + "</h6>");
                }
                // Load Contact Edit Modal
                jQ05("#hisfirstname").attr("value",data[0].hisname);
                jQ05("#herfirstname").attr("value",data[0].hername);
                jQ05("#mylastname").attr("value",data[0].lastname);
                jQ05("#myaddr1").attr("value",data[0].addr1);
                jQ05("#myaddr2").attr("value",data[0].addr2);
                jQ05("#mycity").attr("value",data[0].city);
                jQ05("#mystate").attr("value",data[0].state);
                jQ05("#myzip").attr("value",data[0].zip);
                if(data[0].phonehome){
                    jQ05("#myhomephone").attr("value",data[0].phonehome);
                }
                jQ05("#hiscell").attr("value",data[0].hiscell);
                jQ05("#hercell").attr("value",data[0].hercell);
                jQ05("#hisemail").html("<h6>" + data[0].email1 + "</h6>");
                jQ05("#heremail").html("<h6>" + data[0].email2 + "</h6>");
                // Load Calendar Edit Modal
                jQ05("#myanniversary").val(data[0].anniv);
                jQ05("#hisbirthday").val(data[0].hisbday);
                jQ05("#herbirthday").val(data[0].herbday);
                jQ05("#lastnameforcalendar").attr("value",data[0].lastname);
                

//******************* CHILD DATA ***********
                // Load Profile Page Children Data
                    // Child 1
                    if(data[0].child_1_name)
                    {
                        jQ05("#c1n").html(data[0].child_1_name);
                        jQ05("#child1_name").attr("value",data[0].child_1_name);
                        var dob2 = dateConvert(new Date(data[0].child_1_bday));
                        jQ05("#c1b").html(dob2);
                        jQ05("#child1_bday").val(data[0].child_1_bday);
                        jQ05("#c1g").html(data[0].child_1_gender);
                        jQ05("#child1_gender").attr("value",data[0].child_1_gender);
                        if(data[0].child_1_gender == 'F'){
                            var genval = 1;
                            jQ05('#child1_gender > option').eq(genval).attr('selected','selected');
                        } 
                        else {
                            var gentest = 0;
                            jQ05('#child1_gender > option').eq(genval).attr('selected','selected');
                        }
                        var age2 = calculate_age(new Date(data[0].child_1_bday));
                        jQ05("#c1a").html(age2);
                        jQ05("#child1_email").attr("value",data[0].child_1_email);
                    }

                    // Child 2
                    if(data[0].child_2_name)
                    {
                        jQ05("#c2n").html(data[0].child_2_name);
                        jQ05("#child2_name").attr("value",data[0].child_2_name);
                        var dob2 = dateConvert(new Date(data[0].child_2_bday));
                        jQ05("#c2b").html(dob2);
                        jQ05("#child2_bday").val(data[0].child_2_bday);
                        jQ05("#c2g").html(data[0].child_2_gender);
                        jQ05("#child2_gender").attr("value",data[0].child_2_gender);
                        if(data[0].child_2_gender == 'F'){
                            var genval = 1;
                            jQ05('#child2_gender > option').eq(genval).attr('selected','selected');
                        } 
                        else {
                            var gentest = 0;
                            jQ05('#child2_gender > option').eq(genval).attr('selected','selected');
                        }
                        var age2 = calculate_age(new Date(data[0].child_2_bday));
                        jQ05("#c2a").html(age2);
                        jQ05("#child2_email").attr("value",data[0].child_2_email);
                    }

                    // Child 3
                    if(data[0].child_3_name)
                    {
                        jQ05("#c3n").html(data[0].child_3_name);
                        jQ05("#child3_name").attr("value",data[0].child_3_name);
                        var dob2 = dateConvert(new Date(data[0].child_3_bday));
                        jQ05("#c3b").html(dob2);
                        jQ05("#child3_bday").val(data[0].child_3_bday);
                        jQ05("#c3g").html(data[0].child_3_gender);
                        jQ05("#child3_gender").attr("value",data[0].child_3_gender);
                        if(data[0].child_3_gender == 'F'){
                            var genval = 1;
                            jQ05('#child3_gender > option').eq(genval).attr('selected','selected');
                        } 
                        else {
                            var gentest = 0;
                            jQ05('#child3_gender > option').eq(genval).attr('selected','selected');
                        }
                        var age2 = calculate_age(new Date(data[0].child_3_bday));
                        jQ05("#c3a").html(age2);
                        jQ05("#child3_email").attr("value",data[0].child_3_email);
                    }

                    // Child 4
                    if(data[0].child_4_name)
                    {
                        jQ05("#c4n").html(data[0].child_4_name);
                        jQ05("#child4_name").attr("value",data[0].child_4_name);
                        var dob2 = dateConvert(new Date(data[0].child_4_bday));
                        jQ05("#c4b").html(dob2);
                        jQ05("#child4_bday").val(data[0].child_4_bday);
                        jQ05("#c4g").html(data[0].child_4_gender);
                        jQ05("#child4_gender").attr("value",data[0].child_4_gender);
                        if(data[0].child_4_gender == 'F'){
                            var genval = 1;
                            jQ05('#child4_gender > option').eq(genval).attr('selected','selected');
                        } 
                        else {
                            var gentest = 0;
                            jQ05('#child4_gender > option').eq(genval).attr('selected','selected');
                        }
                        var age2 = calculate_age(new Date(data[0].child_4_bday));
                        jQ05("#c4a").html(age2);
                        jQ05("#child4_email").attr("value",data[0].child_4_email);
                    }

                    // Child 5
                    if(data[0].child_5_name)
                    {
                        jQ05("#c5n").html(data[0].child_5_name);
                        jQ05("#child5_name").attr("value",data[0].child_5_name);
                        var dob2 = dateConvert(new Date(data[0].child_5_bday));
                        jQ05("#c5b").html(dob2);
                        jQ05("#child5_bday").val(data[0].child_5_bday);
                        jQ05("#c5g").html(data[0].child_5_gender);
                        jQ05("#child5_gender").attr("value",data[0].child_5_gender);
                        if(data[0].child_5_gender == 'F'){
                            var genval = 1;
                            jQ05('#child5_gender > option').eq(genval).attr('selected','selected');
                        } 
                        else {
                            var gentest = 0;
                            jQ05('#child5_gender > option').eq(genval).attr('selected','selected');
                        }
                        var age2 = calculate_age(new Date(data[0].child_5_bday));
                        jQ05("#c5a").html(age2);
                        jQ05("#child5_email").attr("value",data[0].child_5_email);
                    }

                    // Child 6
                    if(data[0].child_6_name)
                    {
                        jQ05("#c6n").html(data[0].child_6_name);
                        jQ05("#child6_name").attr("value",data[0].child_6_name);
                        var dob2 = dateConvert(new Date(data[0].child_6_bday));
                        jQ05("#c6b").html(dob2);
                        jQ05("#child6_bday").val(data[0].child_6_bday);
                        jQ05("#c6g").html(data[0].child_6_gender);
                        jQ05("#child6_gender").attr("value",data[0].child_6_gender);
                        if(data[0].child_6_gender == 'F'){
                            var genval = 1;
                            jQ05('#child6_gender > option').eq(genval).attr('selected','selected');
                        } 
                        else {
                            var gentest = 0;
                            jQ05('#child6_gender > option').eq(genval).attr('selected','selected');
                        }
                        var age2 = calculate_age(new Date(data[0].child_6_bday));
                        jQ05("#c6a").html(age2);
                        jQ05("#child6_email").attr("value",data[0].child_6_email);
                    }

                    // Child 7
                    if(data[0].child_7_name)
                    {
                        jQ05("#c7n").html(data[0].child_7_name);
                        jQ05("#child7_name").attr("value",data[0].child_7_name);
                        var dob2 = dateConvert(new Date(data[0].child_7_bday));
                        jQ05("#c7b").html(dob2);
                        jQ05("#child7_bday").val(data[0].child_7_bday);
                        jQ05("#c7g").html(data[0].child_7_gender);
                        jQ05("#child7_gender").attr("value",data[0].child_7_gender);
                        if(data[0].child_7_gender == 'F'){
                            var genval = 1;
                            jQ05('#child7_gender > option').eq(genval).attr('selected','selected');
                        } 
                        else {
                            var gentest = 0;
                            jQ05('#child7_gender > option').eq(genval).attr('selected','selected');
                        }
                        var age2 = calculate_age(new Date(data[0].child_7_bday));
                        jQ05("#c7a").html(age2);
                        jQ05("#child7_email").attr("value",data[0].child_7_email);
                    }

                    // Child 8
                    if(data[0].child_8_name)
                    {
                        jQ05("#c8n").html(data[0].child_8_name);
                        jQ05("#child8_name").attr("value",data[0].child_8_name);
                        var dob2 = dateConvert(new Date(data[0].child_8_bday));
                        jQ05("#c8b").html(dob2);
                        jQ05("#child8_bday").val(data[0].child_8_bday);
                        jQ05("#c8g").html(data[0].child_8_gender);
                        jQ05("#child8_gender").attr("value",data[0].child_8_gender);
                        if(data[0].child_8_gender == 'F'){
                            var genval = 1;
                            jQ05('#child8_gender > option').eq(genval).attr('selected','selected');
                        } 
                        else {
                            var gentest = 0;
                            jQ05('#child8_gender > option').eq(genval).attr('selected','selected');
                        }
                        var age2 = calculate_age(new Date(data[0].child_8_bday));
                        jQ05("#c8a").html(age2);
                        jQ05("#child8_email").attr("value",data[0].child_8_email);
                    }
                
            });
            
            // The ajax call failed
            request.fail(function(xhr, status, errorThrown) {
                console.log('Profile Info Failed');
                console.log( "Error: " + errorThrown );
                console.log( "Status: " + status );
                alert('Failed to obtain profile data. Please re-load page.');

            });

 	});
        
    </script>

<!-- Detect and perform profile 'Edit' actions -->
<script type="text/javascript" >
var jQ53 = jQuery.noConflict();
	jQ53(document).ready(function() {
		jQ53("#contactEdit").click(function () {
			jQ53("#my_popup4").popup({
				background: true, focusdelay: 400, transition: 'all 0.3s', vertical: 'top', autozindex: true, outline: true, keepfocus: true, blur: false, color: "#D1E0B2"
			});		
		});
		jQ53("#calendarEdit").click(function () {
			jQ53("#my_popup5").popup({
				background: true, focusdelay: 400, transition: 'all 0.3s', vertical: 'top', autozindex: true, outline: true, keepfocus: true, blur: false, color: "#D1E0B2"
			});		
		});
});
</script>

<!-- TEST POPUP -->
<script type="text/javascript" >
var jQ55 = jQuery.noConflict();
	jQ55(document).ready(function() {
            console.log('At jQ55');
                jQ55("#Children_Info_Click").click(function (){
                        console.log('Children_Info_Click Click invoked');
                        jQ55('#child1select').css('background-color', '#8FBC8F');
			jQ55('#child2select').css('background-color', '#0800ff');
			jQ55('#child3select').css('background-color', '#0800ff');
			jQ55('#child4select').css('background-color', '#0800ff');
			jQ55('#child5select').css('background-color', '#0800ff');
			jQ55('#child6select').css('background-color', '#0800ff');
			jQ55('#child7select').css('background-color', '#0800ff');
			jQ55('#child8select').css('background-color', '#0800ff');
			jQ55('#child1edit').css('display', 'inline-block');
			jQ55('#child2edit').css('display', 'none');
			jQ55('#child3edit').css('display', 'none');
			jQ55('#child4edit').css('display', 'none');
			jQ55('#child5edit').css('display', 'none');
			jQ55('#child6edit').css('display', 'none');
			jQ55('#child7edit').css('display', 'none');
			jQ55('#child8edit').css('display', 'none');
                });
               		jQ55('.childselectbutton').on('click', function(){
                            var childselected = jQ55(this).attr('name');
                            console.log('childselectbutton ' + childselected + ' has been clicked');
                            switch(childselected) {
				case 'child1select':
					jQ55('#child1select').css('background-color', '#8FBC8F');
					jQ55('#child1edit').css('display', 'inline-block');
					jQ55('#child2select').css('background-color', '#0800ff');
					jQ55('#child2edit').css('display', 'none');
					jQ55('#child3select').css('background-color', '#0800ff');
					jQ55('#child3edit').css('display', 'none');
					jQ55('#child4select').css('background-color', '#0800ff');
					jQ55('#child4edit').css('display', 'none');
					jQ55('#child5select').css('background-color', '#0800ff');
					jQ55('#child5edit').css('display', 'none');
					jQ55('#child6select').css('background-color', '#0800ff');
					jQ55('#child6edit').css('display', 'none');
					jQ55('#child7select').css('background-color', '#0800ff');
					jQ55('#child7edit').css('display', 'none');
					jQ55('#child8select').css('background-color', '#0800ff');
					jQ55('#child8edit').css('display', 'none');
					break;
				case 'child2select':
					jQ55('#child1select').css('background-color', '#0800ff');
					jQ55('#child1edit').css('display', 'none');
					jQ55('#child2select').css('background-color', '#8FBC8F');
					jQ55('#child2edit').css('display', 'inline-block');
					jQ55('#child3select').css('background-color', '#0800ff');
					jQ55('#child3edit').css('display', 'none');
					jQ55('#child4select').css('background-color', '#0800ff');
					jQ55('#child4edit').css('display', 'none');
					jQ55('#child5select').css('background-color', '#0800ff');
					jQ55('#child5edit').css('display', 'none');
					jQ55('#child6select').css('background-color', '#0800ff');
					jQ55('#child6edit').css('display', 'none');
					jQ55('#child7select').css('background-color', '#0800ff');
					jQ55('#child7edit').css('display', 'none');
					jQ55('#child8select').css('background-color', '#0800ff');
					jQ55('#child8edit').css('display', 'none');
					break;
				case 'child3select':
					jQ55('#child1select').css('background-color', '#0800ff');
					jQ55('#child1edit').css('display', 'none');
					jQ55('#child2select').css('background-color', '#0800ff');
					jQ55('#child2edit').css('display', 'none');
					jQ55('#child3select').css('background-color', '#8FBC8F');
					jQ55('#child3edit').css('display', 'inline-block');
					jQ55('#child4select').css('background-color', '#0800ff');
					jQ55('#child4edit').css('display', 'none');
					jQ55('#child5select').css('background-color', '#0800ff');
					jQ55('#child5edit').css('display', 'none');
					jQ55('#child6select').css('background-color', '#0800ff');
					jQ55('#child6edit').css('display', 'none');
					jQ55('#child7select').css('background-color', '#0800ff');
					jQ55('#child7edit').css('display', 'none');
					jQ55('#child8select').css('background-color', '#0800ff');
					jQ55('#child8edit').css('display', 'none');
					break;
				case 'child4select':
					jQ55('#child1select').css('background-color', '#0800ff');
					jQ55('#child1edit').css('display', 'none');
					jQ55('#child2select').css('background-color', '#0800ff');
					jQ55('#child2edit').css('display', 'none');
					jQ55('#child3select').css('background-color', '#0800ff');
					jQ55('#child3edit').css('display', 'none');
					jQ55('#child4select').css('background-color', '#8FBC8F');
					jQ55('#child4edit').css('display', 'inline-block');
					jQ55('#child5select').css('background-color', '#0800ff');
					jQ55('#child5edit').css('display', 'none');
					jQ55('#child6select').css('background-color', '#0800ff');
					jQ55('#child6edit').css('display', 'none');
					jQ55('#child7select').css('background-color', '#0800ff');
					jQ55('#child7edit').css('display', 'none');
					jQ55('#child8select').css('background-color', '#0800ff');
					jQ55('#child8edit').css('display', 'none');
					break;
				case 'child5select':
					jQ55('#child1select').css('background-color', '#0800ff');
					jQ55('#child1edit').css('display', 'none');
					jQ55('#child2select').css('background-color', '#0800ff');
					jQ55('#child2edit').css('display', 'none');
					jQ55('#child3select').css('background-color', '#0800ff');
					jQ55('#child3edit').css('display', 'none');
					jQ55('#child4select').css('background-color', '#0800ff');
					jQ55('#child4edit').css('display', 'none');
					jQ55('#child5select').css('background-color', '#8FBC8F');
					jQ55('#child5edit').css('display', 'inline-block');
					jQ55('#child6select').css('background-color', '#0800ff');
					jQ55('#child6edit').css('display', 'none');
					jQ55('#child7select').css('background-color', '#0800ff');
					jQ55('#child7edit').css('display', 'none');
					jQ55('#child8select').css('background-color', '#0800ff');
					jQ55('#child8edit').css('display', 'none');
					break;
				case 'child6select':
					jQ55('#child1select').css('background-color', '#0800ff');
					jQ55('#child1edit').css('display', 'none');
					jQ55('#child2select').css('background-color', '#0800ff');
					jQ55('#child2edit').css('display', 'none');
					jQ55('#child3select').css('background-color', '#0800ff');
					jQ55('#child3edit').css('display', 'none');
					jQ55('#child4select').css('background-color', '#0800ff');
					jQ55('#child4edit').css('display', 'none');
					jQ55('#child5select').css('background-color', '#0800ff');
					jQ55('#child5edit').css('display', 'none');
					jQ55('#child6select').css('background-color', '#8FBC8F');
					jQ55('#child6edit').css('display', 'inline-block');
					jQ55('#child7select').css('background-color', '#0800ff');
					jQ55('#child7edit').css('display', 'none');
					jQ55('#child8select').css('background-color', '#0800ff');
					jQ55('#child8edit').css('display', 'none');
					break;
				case 'child7select':
					jQ55('#child1select').css('background-color', '#0800ff');
					jQ55('#child1edit').css('display', 'none');
					jQ55('#child2select').css('background-color', '#0800ff');
					jQ55('#child2edit').css('display', 'none');
					jQ55('#child3select').css('background-color', '#0800ff');
					jQ55('#child3edit').css('display', 'none');
					jQ55('#child4select').css('background-color', '#0800ff');
					jQ55('#child4edit').css('display', 'none');
					jQ55('#child5select').css('background-color', '#0800ff');
					jQ55('#child5edit').css('display', 'none');
					jQ55('#child6select').css('background-color', '#0800ff');
					jQ55('#child6edit').css('display', 'none');
					jQ55('#child7select').css('background-color', '#8FBC8F');
					jQ55('#child7edit').css('display', 'inline-block');
					jQ55('#child8select').css('background-color', '#0800ff');
					jQ55('#child8edit').css('display', 'none');
					break;
				case 'child8select':
					jQ55('#child1select').css('background-color', '#0800ff');
					jQ55('#child1edit').css('display', 'none');
					jQ55('#child2select').css('background-color', '#0800ff');
					jQ55('#child2edit').css('display', 'none');
					jQ55('#child3select').css('background-color', '#0800ff');
					jQ55('#child3edit').css('display', 'none');
					jQ55('#child4select').css('background-color', '#0800ff');
					jQ55('#child4edit').css('display', 'none');
					jQ55('#child5select').css('background-color', '#0800ff');
					jQ55('#child5edit').css('display', 'none');
					jQ55('#child6select').css('background-color', '#0800ff');
					jQ55('#child6edit').css('display', 'none');
					jQ55('#child7select').css('background-color', '#0800ff');
					jQ55('#child7edit').css('display', 'none');
					jQ55('#child8select').css('background-color', '#8FBC8F');
					jQ55('#child8edit').css('display', 'inline-block');
					break;
			}
			jQ55(this).css('background-color', '#8FBC8F');
		});

		jQ55("#NewPhoto").click(function () {
                        console.log('NewPhoto Click invoked');
			jQ55("#my_popup7").popup({
			background: true, focusdelay: 400, transition: 'all 0.3s', vertical: 'top', autozindex: true, outline: true, keepfocus: true, blur: false, color: "#D1E0B2"
		});
	});
});
</script>

  </head>
  <body>

        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <a class="navbar-brand" href="#">OurFamilyConnections</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <?php
                if(!$_SESSION['logged in']) {
                    session_destroy();
                }
                else
                {

                    echo '<ul class="navbar-nav mr-auto mt-md-0">';
                    $activeparam = '2';
                    include '/includes/ofc_menu.php';
                    echo '</ul>';
                }
                ?>
            </div>
        </nav>
      
<div class="container-fluid profile_bg">
<?php
    if($MyView == 'Y')
    {
        echo 
            '<div class="row">'
                . '<div class="col-sm-12">'
                . '<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">'
                . '<div class="btn-group mr-2" role="group" aria-label="Button group with nested dropdown">'
                    . '<div class="dropdown">'
                        . '<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Edit Profile</button>'
                        . '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">'
                            . '<button class="dropdown-item" data-toggle="modal" data-target="#ModalProfilePic" type="button">New Photo</button>'
                            . '<button class="dropdown-item" data-toggle="modal" data-target="#ModalContactInfo" type="button">Contact Info</button>'
                            . '<button class="dropdown-item" data-toggle="modal" id="Children_Info_Click" data-target="#ModalChildrenInfo" type="button">Children</button>'
                            . '<button class="dropdown-item" data-toggle="modal" data-target="#ModalCalendarInfo" type="button">Anniversary/Birthdays</button>'
                        . '</div>' // dropdown-menu
                    . '</div>' //dropdown
                . '</div>' //btn-group
                . '<div class="btn-group mr-2" role="group" aria-label="Button group with nested dropdown">'
                    //. '<button class="btn btn-success" type="button" data-toggle="modal" aria-expanded="false" data-target="#ModalPrayerNew">New Prayer Request</button>'
                    . '<div class="dropdown">'
                        . '<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage Prayer Requests</button>'
                        . '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">'
                            . '<button class="dropdown-item" data-toggle="modal" data-target="#ModalPrayerNew" type="button">New Prayer Request</button>'
                            . '<button class="dropdown-item" data-toggle="modal" data-target="#ModalPrayerUpdate" type="button">Update Prayer Request</button>'
                        . '</div>' // dropdown-menu
                    . '</div>' //dropdown
                . '</div>' //btn-group
                . '</div>' //btn-toolbar
                . '</div>' //class=col-sm
            . '</div>'; //row
    }
?>

    <div class="row">
        <div class="col-sm-4">
            <div class="card bg-light m-3">
                <div class="card-body">
                    <img class="card-img-top" id="profile_pic" style="width: 100%; align-self: center" alt="Card image cap">
                    <h4 class="card-title text-center" id="profile_card">Name</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card bg-light m-3">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="card-body">
                            <h4 class="card-title text-center text-capitalize">Contact Information</h4>
                            <h5 class="card-text"><u>Address</u></h5>
                            <h6 class="card-text" id="profile_addr"></h6>
                            <h5 class="card-text"><u>Phone</u></h5>
                            <p class="card-text" id="profile_phone_home"></p>
                            <p class="card-text" id="profile_cell_him"></p>
                            <p class="card-text" id="profile_cell_her"></p>
                            <h5 class="card-text"><u>Email</u></h5>
                            <p class="card-text" id="profile_email_him"></p>
                            <p class="card-text" id="profile_email_her"></p>
                        </div> <!-- card-body -->
                    </div> <!-- col-sm-5 -->
                    <div class="col-sm-5">
                        <div class="card-body">
                            <h4 class="card-title text-center text-capitalize">Celebrate with Us</h4>
                            <h5 class="card-text"><u>Anniversary</u></h5>
                            <p class="card-text" id="profile_anniv"></p>
                            <h5 class="card-text"><u>Birthdays</u></h5>
                            <p class="card-text" id="profile_hisbday"></p>
                            <p class="card-text" id="profile_herbday"></p>
                        </div> <!-- card-body -->
                    </div> <!-- col-sm-5 -->
                </div> <!-- row -->
                <div class="row">
                    <div class="card-body">
                        <h4 class="card-title text-center text-capitalize">Children</h4>
                            <table class="table table-sm table-responsive table-striped" id="profiletablechildren" border="0">
                                <thead>
                                    <tr>
                                        <th class="strong">Name</th>
                                        <th class="strong">Birthdate</th>
                                        <th class="strong">Gender</th>
                                        <th class="strong">Age</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="c1n"></td>
                                        <td id="c1b"></td>
                                        <td id="c1g"></td>
                                        <td id="c1a"></td>
                                    </tr>
                                    <tr>
                                        <td id="c2n"></td>
                                        <td id="c2b"></td>
                                        <td id="c2g"></td>
                                        <td id="c2a"></td>
                                    </tr>
                                    <tr>
                                        <td id="c3n"></td>
                                        <td id="c3b"></td>
                                        <td id="c3g"></td>
                                        <td id="c3a"></td>
                                    </tr>
                                    <tr>
                                        <td id="c4n"></td>
                                        <td id="c4b"></td>
                                        <td id="c4g"></td>
                                        <td id="c4a"></td>
                                    </tr>
                                    <tr>
                                        <td id="c5n"></td>
                                        <td id="c5b"></td>
                                        <td id="c5g"></td>
                                        <td id="c5a"></td>
                                    </tr>
                                    <tr>
                                        <td id="c6n"></td>
                                        <td id="c6b"></td>
                                        <td id="c6g"></td>
                                        <td id="c6a"></td>
                                    </tr>
                                    <tr>
                                        <td id="c7n"></td>
                                        <td id="c7b"></td>
                                        <td id="c7g"></td>
                                        <td id="c7a"></td>
                                    </tr>
                                    <tr>
                                        <td id="c8n"></td>
                                        <td id="c8b"></td>
                                        <td id="c8g"></td>
                                        <td id="c8a"></td>
                                    </tr>
                                </tbody>
                            </table>

<!--                        <a href="#" class="btn btn-primary">Go somewhere</a>-->
                    </div> <!-- card-body -->
                </div> <!-- row -->
            </div> <!-- card -->
        </div> <!-- col-sm-8 -->
    </div> <!-- row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card bg-light border-primary m-3">
                <div class="card-body">
                    <h4 class="card-title">Pray With Us</h4>
                    <div class="card-text">
<!--                        	<?php
                        	if($MyView == "Y" || $AdminView == "Y"){
                		echo "<td align='right'><input type='button' class='my_popup6_open button_flat_blue_small' id='childrenEdit' name='editChildren' value='Edit Children' /></td>";
                        	}
                        	?>
-->

                        <p class="card-text">Prayer Requests go here.</p>
<!--                        <a href="#ModalPrayerNew" class="btn btn-primary">See More</a>-->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalPrayerNew">New Prayer Request</button>
                    </div>
                </div>
            </div>
        </div>
<!--    <div class="col-md-3">
        <div class="card m-3">
            <img class="card-img-top" src="images/img_400_300_blue.png" style="height: 100%" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Card title</h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>-->

    </div> <!-- Row -->
</div> <!-- Container -->


<!--***************************** Edit Picture MODAL ***********************************-->
<!--***************************** Edit Picture MODAL ***********************************-->
<!--***************************** Edit Picture MODAL ***********************************-->

<div class="modal fade" id="ModalProfilePic" tabindex="-1" role="dialog" aria-labelledby="ModalProfilePicLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalProfilePicLabel">Upload New Family Photo<br>Click <strong>Save Changes</strong> when done.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<p><strong>NOTE:</strong> Photo must be less than 2MB, and in one of the following formats:</p> 
            <ul>
                <li>
                    .bmp; .jpg; .png
                </li>
            </ul>
        <hr>
                <form id="uploadImage" enctype="multipart/form-data" action="" method="post">
                    <div id="image_preview">
                        <img id="profile_pic_edit" width="200" height="auto" />
                    </div>
                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                    <input name="file" type="file" id="file" required />
            <div id="message">

            </div>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Save changes" />
        </div>
        </form>
    </div>
  </div>
</div>


<!--***************************** Edit Contact Info MODAL ***********************************-->
<!--***************************** Edit Contact Info MODAL ***********************************-->
<!--***************************** Edit Contact Info MODAL ***********************************-->

<div class="modal fade" id="ModalContactInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Contact Info<br>Click <strong>Save Changes</strong> when done.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!-- modal-header -->
      <div class="modal-body">
<!--            <p id="editProfile" class="my_popup4title"> </p>-->
            <form name='editcontact' method='post' action='/services/ofc_profile_contact_update.php'> 		
                    <table id="editprofiletable" border='1' align='center' cellpadding='0' cellspacing='1' >
                    <tr> 		
                            <td>

                                    <table width='100%' border='0' cellpadding='3' cellspacing='1' >
                                            <tr>
                                                    <td width='350' align='right'>His First Name</td>
                                                    <td width='6'>:</td>
                                                    <td width='294'><input name='hisfirstname' type='text' id='hisfirstname'></td>
                                            </tr>
                                            <tr>
                                                    <td width='350' align='right'>Her First Name</td>
                                                    <td width='6'>:</td>
                                                    <td width='294'><input name='herfirstname' type='text' id='herfirstname'></td>
                                            </tr>
                                            <tr>
                                                    <td width='350' align='right'>Last Name</td>
                                                    <td width='6'>:</td>
                                                    <td width='294'><input name='mylastname' type='text' id='mylastname'></td>
                                            </tr>
                                            <tr>
                                                    <td width='350' align='right'>Street Address</td>
                                                    <td width='6'>:</td>
                                                    <td width='294'><input name='myaddr1' type='text' id='myaddr1'></td>
                                            </tr>
                                            <tr>
                                                    <td width='350' align='right'>Apartment # or PO Box</td>
                                                    <td width='6'>:</td>
                                                    <td width='294'><input name='myaddr2' type='text' id='myaddr2'></td>
                                            </tr>
                                            <tr>
                                                    <td width='350' align='right'>City</td>
                                                    <td width='6'>:</td>
                                                    <td width='294'><input name='mycity' type='text' id='mycity'></td>
                                            </tr>
                                            <tr>
                                                    <td width='350' align='right'>State/Province</td>
                                                    <td width='6'>:</td>
                                                    <td>
                                                    <select name="mystate" id="mystate">
<?php
                                                $states_query = "SELECT * from " . $_SESSION['statestablename'];
                                                $statesresult = $mysql->query($states_query) or die(" SQL query error. Error:" . mysql_errno() . " " . mysql_error());
                                                while($states_row = $statesresult->fetch_assoc())
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
                                                <td width='294'><input name='myzip' type='text' id='myzip' placeholder="98270" pattern="^\d{5}$"></td>
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
                                                <td width='294' id="hisemail"></td>
                                        </tr>
                                        <tr>
                                                <td width='350' align='right'>Her Email address</td>
                                                <td width='6'>:</td>
                                                <td width='294' id="heremail"></td>
                                        </tr>
                                        <tr>
                                                <td><br /></td>
                                        </tr>
<!--                                        <tr>
                                                <td>&nbsp</td>
                                                <td>&nbsp</td>
                                                <td><input type="submit" class="button_flat_blue_small" name='submitcontact' value='Save'></td>
                                                <td><input type="reset" class="my_popup4_close button_flat_blue_small" name="cancel" value="Cancel" /></td>
                                        </tr>-->
                                        </table>
                                        <p>
                                        <p>
                                </td>
                        </tr>
                </table>

      </div> <!-- modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="submitcontact" class="btn btn-primary" value="Save changes" />
<!--        <button type="button" class="btn btn-primary">Save changes</button>-->
      </div> <!-- modal-footer -->
      </form>
    </div> <!-- modal-content -->
  </div> <!-- modal-dialog -->
</div> <!-- modal-fade -->

<!--***************************** Edit Calendar Info MODAL ***********************************-->
<!--***************************** Edit Calendar Info MODAL ***********************************-->
<!--***************************** Edit Calendar Info MODAL ***********************************-->

<div class="modal fade" id="ModalCalendarInfo" tabindex="-1" role="dialog" aria-labelledby="ModalCalendar" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalCalendar">Edit Anniversary and Birthdays<br>Click <strong>Save Changes</strong> when done.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!-- modal-header -->
      <div class="modal-body">
<!--        <p id="editCalendar" class="my_popup5title"> </p>-->
        <form name='editcalendar' method='post' action='services/ofc_profile_calendar_update.php'> 		
            <table id="editcalendartable" border='1' align='center' cellpadding='0' cellspacing='1' >
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
                                                <td width='294'><input name='myanniversary' type='date' id='myanniversary'></td>
                                        </tr>
                                        <tr>
                                                <td width='350' align='right'>His Birthday</td>
                                                <td width='6'>:</td>
                                                <td width='294'><input name='hisbirthday' type='date' id='hisbirthday'></td>
                                        </tr>
                                        <tr>
                                                <td width='350' align='right'>Her Birthday</td>
                                                <td width='6'>:</td>
                                                <td width='294'><input name='herbirthday' type='date' id='herbirthday'></td>
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
                                                <td><input type="hidden" name="lastname" id="lastnameforcalendar"></td>
                                        </tr>
                                    </table>
                                    <p>
                                    <p>
                                </td>
                            </tr>
                        </table>
            </div> <!-- modal-body -->
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="submitcalendar" class="btn btn-primary" value="Save changes" />
        <!--        <button type="button" class="btn btn-primary">Save changes</button>-->
              </div> <!-- modal-footer -->
                </form>
            </div> <!-- modal-content -->
  </div> <!-- modal-dialog -->
</div> <!-- modal-fade -->
            
<!--***************************** Edit Children Info MODAL ***********************************-->
<!--***************************** Edit Children Info MODAL ***********************************-->
<!--***************************** Edit Children Info MODAL ***********************************-->
            
<div class="modal fade" id="ModalChildrenInfo" tabindex="-1" role="dialog" aria-labelledby="ModalChildren" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalChildren">Edit Children Info<br>Click <strong>Save Changes</strong> when done.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> <!-- modal-header -->
      <div class="modal-body">
            <form name='editchildren' method='post' action='services/ofc_profile_children_update.php'>
<!-- CHILD TABS -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-3"><input type="button" class="childselectbutton button_flat_blue_small" name='child1select' id='child1select' value='Child 1'></div>
                <div class="col-3"><input type="button" class="childselectbutton button_flat_blue_small" name='child2select' id='child2select' value='Child 2'></div>
                <div class="col-3"><input type="button" class="childselectbutton button_flat_blue_small" name='child3select' id='child3select' value='Child 3'></div>
                <div class="col-3"><input type="button" class="childselectbutton button_flat_blue_small" name='child4select' id='child4select' value='Child 4'></div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-3"><input type="button" class="childselectbutton button_flat_blue_small" name='child5select' id='child5select' value='Child 5'></div>
                <div class="col-3"><input type="button" class="childselectbutton button_flat_blue_small" name='child6select' id='child6select' value='Child 6'></div>
                <div class="col-3"><input type="button" class="childselectbutton button_flat_blue_small" name='child7select' id='child7select' value='Child 7'></div>
                <div class="col-3"><input type="button" class="childselectbutton button_flat_blue_small" name='child8select' id='child8select' value='Child 8'></div>
            </div> <!-- row -->
        </div> <!-- container-fluid -->

                    <table id="editchildrentable" width='100%' border='1' align='center' cellpadding='0' cellspacing='1' >
                    <tr> 		
                            <td>

<!-- CHILD 1 EDIT -->
                                    <table id="child1edit" width='100%' border='0' cellpadding='3' cellspacing='1'>
                                            <tr>
                                                <td colspan="3"><br /></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align='center'><strong>Child 1</strong></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Name</td>
                                                    <td width='6'>:</td>
                                                    <td><input name='child1_name' type='text' size="25" id='child1_name'></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Birthday</td>
                                                    <td width='6'>:</td>
                                                    <td><input name='child1_bday' type='date' id='child1_bday'></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Gender</td>
                                                    <td width='6'>:</td>
                                                    <td>
                                                            <select name="child1_gender" id="child1_gender">
                                                                    <option value="M">Male</option>
                                                                    <option value="F">Female</option>
                                                            </select>
                                                   </td>

                                            </tr>
                                            <tr>
                                                    <td align='right'>Email</td>
                                                    <td width='6'>:</td>
                                                    <td colspan="2"><input name='child1_email' type='email' size="25" id='child1_email'></td>
                                            </tr>
                                            <tr>
                                                    <td><br /></td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td colspan="3" align='right'>
                                                    <input type="submit" name="remove1child" class="btn btn-danger" value="Delete Child" />
                                                    <input type="submit" name="submit1children" class="btn btn-primary" value="Save changes" />
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </td>
                                            </tr>
                                            </table>

<!-- CHILD 2 EDIT -->
                                    <table id="child2edit" width='100%' border='0' cellpadding='3' cellspacing='1'>
                                            <tr>
                                                <td colspan="3"><br /></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align='center'><strong>Child 2</strong></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Name</td>
                                                    <td width='6'>:</td>
                                                    <td><input name='child2_name' type='text' size="25" id='child2_name'></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Birthday</td>
                                                    <td width='6'>:</td>
                                                    <td><input name='child2_bday' type='date' id='child2_bday'></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Gender</td>
                                                    <td width='6'>:</td>
                                                    <td>
                                                            <select name="child2_gender" id="child2_gender">
                                                                    <option value="M">Male</option>
                                                                    <option value="F">Female</option>
                                                            </select>
                                                   </td>

                                            </tr>
                                            <tr>
                                                    <td align='right'>Email</td>
                                                    <td width='6'>:</td>
                                                    <td colspan="2"><input name='child2_email' type='email' size="25" id='child2_email'></td>
                                            </tr>
                                            <tr>
                                                    <td><br /></td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td colspan="3" align='right'>
                                                    <input type="submit" name="remove2child" class="btn btn-danger" value="Delete Child" />
                                                    <input type="submit" name="submit2children" class="btn btn-primary" value="Save changes" />
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </td>
                                            </tr>
                                            </table>
<!-- CHILD 3 EDIT -->
                                    <table id="child3edit" width='100%' border='0' cellpadding='3' cellspacing='1'>
                                            <tr>
                                                <td colspan="3"><br /></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align='center'><strong>Child 3</strong></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Name</td>
                                                    <td width='6'>:</td>
                                                    <td><input name='child3_name' type='text' size="25" id='child3_name'></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Birthday</td>
                                                    <td width='6'>:</td>
                                                    <td><input name='child3_bday' type='date' id='child3_bday'></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Gender</td>
                                                    <td width='6'>:</td>
                                                    <td>
                                                            <select name="child3_gender" id="child3_gender">
                                                                    <option value="M">Male</option>
                                                                    <option value="F">Female</option>
                                                            </select>
                                                   </td>

                                            </tr>
                                            <tr>
                                                    <td align='right'>Email</td>
                                                    <td width='6'>:</td>
                                                    <td colspan="2"><input name='child3_email' type='email' size="25" id='child3_email'></td>
                                            </tr>
                                            <tr>
                                                    <td><br /></td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td colspan="3" align='right'>
                                                    <input type="submit" name="remove3child" class="btn btn-danger" value="Delete Child" />
                                                    <input type="submit" name="submit3children" class="btn btn-primary" value="Save changes" />
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </td>
                                            </tr>
                                            </table>

<!-- CHILD 4 EDIT -->
                                    <table id="child4edit" width='100%' border='0' cellpadding='3' cellspacing='1'>
                                            <tr>
                                                <td colspan="3"><br /></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align='center'><strong>Child 4</strong></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Name</td>
                                                    <td width='6'>:</td>
                                                    <td><input name='child4_name' type='text' size="25" id='child4_name'></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Birthday</td>
                                                    <td width='6'>:</td>
                                                    <td><input name='child4_bday' type='date' id='child4_bday'></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Gender</td>
                                                    <td width='6'>:</td>
                                                    <td>
                                                            <select name="child4_gender" id="child4_gender">
                                                                    <option value="M">Male</option>
                                                                    <option value="F">Female</option>
                                                            </select>
                                                   </td>

                                            </tr>
                                            <tr>
                                                    <td align='right'>Email</td>
                                                    <td width='6'>:</td>
                                                    <td colspan="2"><input name='child4_email' type='email' size="25" id='child4_email'></td>
                                            </tr>
                                            <tr>
                                                    <td><br /></td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td colspan="3" align='right'>
                                                    <input type="submit" name="remove4child" class="btn btn-danger" value="Delete Child" />
                                                    <input type="submit" name="submit4children" class="btn btn-primary" value="Save changes" />
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </td>
                                            </tr>
                                            </table>

<!-- CHILD 5 EDIT -->
                                    <table id="child5edit" width='100%' border='0' cellpadding='3' cellspacing='1'>
                                            <tr>
                                                <td colspan="3"><br /></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align='center'><strong>Child 5</strong></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Name</td>
                                                    <td width='6'>:</td>
                                                    <td><input name='child5_name' type='text' size="25" id='child5_name'></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Birthday</td>
                                                    <td width='6'>:</td>
                                                    <td><input name='child5_bday' type='date' id='child5_bday'></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Gender</td>
                                                    <td width='6'>:</td>
                                                    <td>
                                                            <select name="child5_gender" id="child5_gender">
                                                                    <option value="M">Male</option>
                                                                    <option value="F">Female</option>
                                                            </select>
                                                   </td>

                                            </tr>
                                            <tr>
                                                    <td align='right'>Email</td>
                                                    <td width='6'>:</td>
                                                    <td colspan="2"><input name='child5_email' type='email' size="25" id='child5_email'></td>
                                            </tr>
                                            <tr>
                                                    <td><br /></td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td colspan="3" align='right'>
                                                    <input type="submit" name="remove5child" class="btn btn-danger" value="Delete Child" />
                                                    <input type="submit" name="submit5children" class="btn btn-primary" value="Save changes" />
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </td>
                                            </tr>
                                            </table>

<!-- CHILD 6 EDIT -->
                                    <table id="child6edit" width='100%' border='0' cellpadding='3' cellspacing='1'>
                                            <tr>
                                                <td colspan="3"><br /></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align='center'><strong>Child 6</strong></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Name</td>
                                                    <td width='6'>:</td>
                                                    <td><input name='child6_name' type='text' size="25" id='child6_name'></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Birthday</td>
                                                    <td width='6'>:</td>
                                                    <td><input name='child6_bday' type='date' id='child6_bday'></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Gender</td>
                                                    <td width='6'>:</td>
                                                    <td>
                                                            <select name="child6_gender" id="child6_gender">
                                                                    <option value="M">Male</option>
                                                                    <option value="F">Female</option>
                                                            </select>
                                                   </td>

                                            </tr>
                                            <tr>
                                                    <td align='right'>Email</td>
                                                    <td width='6'>:</td>
                                                    <td colspan="2"><input name='child6_email' type='email' size="25" id='child6_email'></td>
                                            </tr>
                                            <tr>
                                                    <td><br /></td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td colspan="3" align='right'>
                                                    <input type="submit" name="remove6child" class="btn btn-danger" value="Delete Child" />
                                                    <input type="submit" name="submit6children" class="btn btn-primary" value="Save changes" />
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </td>
                                            </tr>
                                            </table>

<!-- CHILD 7 EDIT -->
                                    <table id="child7edit" width='100%' border='0' cellpadding='3' cellspacing='1'>
                                            <tr>
                                                <td colspan="3"><br /></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align='center'><strong>Child 7</strong></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Name</td>
                                                    <td width='6'>:</td>
                                                    <td><input name='child7_name' type='text' size="25" id='child7_name'></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Birthday</td>
                                                    <td width='6'>:</td>
                                                    <td><input name='child7_bday' type='date' id='child7_bday'></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Gender</td>
                                                    <td width='6'>:</td>
                                                    <td>
                                                            <select name="child7_gender" id="child7_gender">
                                                                    <option value="M">Male</option>
                                                                    <option value="F">Female</option>
                                                            </select>
                                                   </td>

                                            </tr>
                                            <tr>
                                                    <td align='right'>Email</td>
                                                    <td width='6'>:</td>
                                                    <td colspan="2"><input name='child7_email' type='email' size="25" id='child7_email'></td>
                                            </tr>
                                            <tr>
                                                    <td><br /></td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td colspan="3" align='right'>
                                                    <input type="submit" name="remove7child" class="btn btn-danger" value="Delete Child" />
                                                    <input type="submit" name="submit7children" class="btn btn-primary" value="Save changes" />
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </td>
                                            </tr>
                                            </table>

<!-- CHILD 8 EDIT -->
                                    <table id="child8edit" width='100%' border='0' cellpadding='3' cellspacing='1'>
                                            <tr>
                                                <td colspan="3"><br /></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" align='center'><strong>Child 8</strong></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Name</td>
                                                    <td width='6'>:</td>
                                                    <td><input name='child8_name' type='text' size="25" id='child8_name'></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Birthday</td>
                                                    <td width='6'>:</td>
                                                    <td><input name='child8_bday' type='date' id='child8_bday'></td>
                                            </tr>
                                            <tr>
                                                    <td align='right'>Gender</td>
                                                    <td width='6'>:</td>
                                                    <td>
                                                            <select name="child8_gender" id="child8_gender">
                                                                    <option value="M">Male</option>
                                                                    <option value="F">Female</option>
                                                            </select>
                                                   </td>

                                            </tr>
                                            <tr>
                                                    <td align='right'>Email</td>
                                                    <td width='6'>:</td>
                                                    <td colspan="2"><input name='child8_email' type='email' size="25" id='child8_email'></td>
                                            </tr>
                                            <tr>
                                                    <td><br /></td>
                                            </tr>
                                            <tr>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td colspan="3" align='right'>
                                                    <input type="submit" name="remove8child" class="btn btn-danger" value="Delete Child" />
                                                    <input type="submit" name="submit8children" class="btn btn-primary" value="Save changes" />
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </td>
                                            </tr>
                                            </table>

                                            <p>
                                            <p>
                                    </td>
                            </tr>
                    </table>
    </div> <!-- modal-body -->
    <div class="modal-footer">
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
          <h5 class="modal-title" id="ModalPrayerNew">New Prayer Request<br></h5><h6>Click <strong>Send Email</strong> to send an email to requestor.<br>Click <strong>Close</strong> when done.</h6>
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

<!--Include all compiled plugins (below), or include individual files as needed
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!--    <script src="js/ie10-viewport-bug-workaround.js"></script>-->



<!-- jQuery (necessary for Bootstrap's (BOOTSTRAP 4 BETA) JavaScript plugins) -->
<!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>-->

<!-- Popup script from http://dev.vast.com/jquery-popup-overlay/ -->
	<script src="https://cdn.rawgit.com/vast-engineering/jquery-popup-overlay/1.7.13/jquery.popupoverlay.js"></script>
    
    
  </body>
</html>