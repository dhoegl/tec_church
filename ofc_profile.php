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
            if($_SESSION['idDirectory'] == $profileID) {
		$MyView = 'Y';
            }
            else {
		$MyView = 'N';
            }

    }
        
    else {
        session_destroy();
        header("location:ofc_welcome.php");
        exit();
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

<!-- Initialize jquery js script -->
    <script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>


<!-- Popup script from http://dev.vast.com/jquery-popup-overlay/ -->
	<script src="https://cdn.rawgit.com/vast-engineering/jquery-popup-overlay/1.7.13/jquery.popupoverlay.js"></script>


<!-- Bootstrap 4 BETA CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
<!--    <link href="css/signin.css" rel="stylesheet">-->
    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">
    <!-- Extended styles for this page -->
    <link href="css/ofc_css_style.css" rel="stylesheet">

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
                profileinfo = [];
                profilechildren = [];
                console.log('Profile Info Zip = ' + data[0].zip);
                console.log('Picture file = ' + data[0].piclink2);
                jQ05("#profile_card").empty();
                profileinfo.push(data[0].hisname + ' & ' + data[0].hername + ' ' + data[0].lastname);
                jQ05("#profile_card").append(profileinfo.join(''));
                jQ05("#profile_pic").attr("src", "profile_img/" + data[0].piclink2);
                jQ05("#profile_email_him").html("<h6>" + data[0].hisname + " (or both): " + "<a href='mailto:" + data[0].email1 + "'>" + data[0].email1 + "</a></h6>");
                jQ05("#profile_email_her").html("<h6>" + data[0].hername + ": <a href='mailto:" + data[0].email2 + "'>" + data[0].email2 + "</a></h6>");
                jQ05("#profile_phone_home").html("<h6>Home phone: " + data[0].phonehome) + "</h6>";
                jQ05("#profile_cell_him").html("<h6>" + data[0].hisname + " cell: <a href='tel:" + data[0].hiscell + "'>" + data[0].hiscell + "</a></h6>");
                jQ05("#profile_cell_her").html("<h6>" + data[0].hername + " cell: <a href='tel:" + data[0].hercell + "'>" + data[0].hercell + "</a></h6>");
                jQ05("#profile_addr").html(data[0].addr1 + "\r\n" + data[0].addr2 + "\r\n" + data[0].city + ", " + data[0].state + " " + data[0].zip);
                //
//******************* CHILD DATA ***********
                    // Child 1
                    if(data[0].child_1_name)
                    {
                        jQ05("#c1n").html(data[0].child_1_name);
                        var dob2 = dateConvert(new Date(data[0].child_1_bday));
                        jQ05("#c1b").html(dob2);
                        jQ05("#c1g").html(data[0].child_1_gender);
                        var age2 = calculate_age(new Date(data[0].child_1_bday));
                        jQ05("#c1a").html(age2);
                    }

                    // Child 2
                    if(data[0].child_2_name)
                    {
                        jQ05("#c2n").html(data[0].child_2_name);
                        var dob2 = dateConvert(new Date(data[0].child_2_bday));
                        jQ05("#c2b").html(dob2);
                        jQ05("#c2g").html(data[0].child_2_gender);
                        var age2 = calculate_age(new Date(data[0].child_2_bday));
                        jQ05("#c2a").html(age2);
                    }

                    // Child 3
                    if(data[0].child_3_name)
                    {
                        jQ05("#c3n").html(data[0].child_3_name);
                        var dob2 = dateConvert(new Date(data[0].child_3_bday));
                        jQ05("#c3b").html(dob2);
                        jQ05("#c3g").html(data[0].child_3_gender);
                        var age2 = calculate_age(new Date(data[0].child_3_bday));
                        jQ05("#c3a").html(age2);
                    }

                    // Child 4
                    if(data[0].child_4_name)
                    {
                        jQ05("#c4n").html(data[0].child_4_name);
                        var dob2 = dateConvert(new Date(data[0].child_4_bday));
                        jQ05("#c4b").html(dob2);
                        jQ05("#c4g").html(data[0].child_4_gender);
                        var age2 = calculate_age(new Date(data[0].child_4_bday));
                        jQ05("#c4a").html(age2);
                    }

                    // Child 5
                    if(data[0].child_5_name)
                    {
                        jQ05("#c5n").html(data[0].child_5_name);
                        var dob2 = dateConvert(new Date(data[0].child_5_bday));
                        jQ05("#c5b").html(dob2);
                        jQ05("#c5g").html(data[0].child_5_gender);
                        var age2 = calculate_age(new Date(data[0].child_5_bday));
                        jQ05("#c5a").html(age2);
                    }

                    // Child 6
                    if(data[0].child_6_name)
                    {
                        jQ05("#c6n").html(data[0].child_6_name);
                        var dob2 = dateConvert(new Date(data[0].child_6_bday));
                        jQ05("#c6b").html(dob2);
                        jQ05("#c6g").html(data[0].child_6_gender);
                        var age2 = calculate_age(new Date(data[0].child_6_bday));
                        jQ05("#c6a").html(age2);
                    }

                    // Child 7
                    if(data[0].child_7_name)
                    {
                        jQ05("#c7n").html(data[0].child_7_name);
                        var dob2 = dateConvert(new Date(data[0].child_7_bday));
                        jQ05("#c7b").html(dob2);
                        jQ05("#c7g").html(data[0].child_7_gender);
                        var age2 = calculate_age(new Date(data[0].child_7_bday));
                        jQ05("#c7a").html(age2);
                    }

                    // Child 8
                    if(data[0].child_8_name)
                    {
                        jQ05("#c8n").html(data[0].child_8_name);
                        var dob2 = dateConvert(new Date(data[0].child_8_bday));
                        jQ05("#c8b").html(dob2);
                        jQ05("#c8g").html(data[0].child_8_gender);
                        var age2 = calculate_age(new Date(data[0].child_8_bday));
                        jQ05("#c8a").html(age2);
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
		jQ53("#childrenEdit").click(function () {
			jQ53("#my_popup6").popup({
				background: true, focusdelay: 400, transition: 'all 0.3s', vertical: 'top', autozindex: true, outline: true, keepfocus: true, blur: false, color: "#D1E0B2"
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
});
</script>

<!-- TEST POPUP -->
<script type="text/javascript" >
var jQ55 = jQuery.noConflict();
	jQ55(document).ready(function() {
            console.log('At jQ55');
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
        echo '<div class="row"><div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Edit Profile</button><div class="dropdown-menu" aria-labelledby="dropdownMenuButton"><button id="NewPhoto" class="dropdown-item" type="button">New Photo</button><button class="dropdown-item" type="button">Contact Info</button><button class="dropdown-item" type="button">Children</button><button class="dropdown-item" type="button">Birthday/Anniversary</button></div></div></div>';
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

                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9">
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
                        <a href="#" class="btn btn-primary">See More</a>
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




<!--Include all compiled plugins (below), or include individual files as needed
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>



<!-- jQuery (necessary for Bootstrap's (BOOTSTRAP 4 BETA) JavaScript plugins) -->
<!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    
    
  </body>
</html>