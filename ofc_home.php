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
                profileinfo = [];
                profilepic = [];
                console.log('Profile Info Zip = ' + data[0].zip);
                console.log('Picture file = ' + data[0].piclink2);
                jQ05("#profile_card").empty();
                profileinfo.push(data[0].hisname + ' & ' + data[0].hername + ' ' + data[0].lastname);
                jQ05("#profile_card").append(profileinfo.join(''));
                jQ05("#profile_pic").attr("src", "profile_img/" + data[0].piclink2);
                jQ05("#profile_email_him").html(data[0].hisname + " (or both): " + "<a href='mailto:" + data[0].email1 + "'>" + data[0].email1 + "</a>");
                jQ05("#profile_email_her").html(data[0].hername + ": <a href='mailto:" + data[0].email2 + "'>" + data[0].email2 + "</a>");
                jQ05("#profile_phone_home").html("Home: " + data[0].phonehome);
                jQ05("#profile_cell_him").html(data[0].hisname + " cell: <a href='tel:" + data[0].hiscell + "'>" + data[0].hiscell + "</a>");
                jQ05("#profile_cell_her").html(data[0].hername + " cell: <a href='tel:" + data[0].hercell + "'>" + data[0].hercell + "</a>");
                jQ05("#profile_addr").html(data[0].addr1 + "\r\n" + data[0].addr2 + "\r\n" + data[0].city + ", " + data[0].state + " " + data[0].zip);
               
                
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
                    include '/includes/ofc_menu.php';
                    echo '</ul>';
                }
                ?>
            </div>
        </nav>
      
<div class="container-fluid profile_bg">
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-light border-primary m-3">
                <img class="card-img-top" id="profile_pic" style="width: 75%; align-self: center" alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title text-center" id="profile_card">Card title</h3>
                    <h4 class="card-text text-center">Contact Info</h4>
                    <h5 class="card-text">Email:</h5>
                    <p class="card-text" id="profile_email_him"></p>
                    <p class="card-text" id="profile_email_her"></p>
                    <h5 class="card-text">Phone:</h5>
                    <p class="card-text" id="profile_phone_home"></p>
                    <p class="card-text" id="profile_cell_him"></p>
                    <p class="card-text" id="profile_cell_her"></p>
                    <h5 class="card-text">Home Address:</h5>
                    <p class="card-text" id="profile_addr"></p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card m-3">
                <img class="card-img-top" src="images/img_400_300_blue.png" style="height: 100%" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light border-primary m-3">
                <div class="card-body">
                    <h4 class="card-title">Our Children</h4>
                    <div class="card-text">
                        <table id="profiletablechildren" border="0">
                            <tr valign="top">
                                <td class="strong">Name</td>
                                <td class="strong">Birthdate</td>
                                <td class="strong">Gender</td>
                                <td class="strong">Age</td>
                        	<?php
                        	if($MyView == "Y" || $AdminView == "Y"){
                		echo "<td align='right'><input type='button' class='my_popup6_open button_flat_blue_small' id='childrenEdit' name='editChildren' value='Edit Children' /></td>";
                        	}
                        	?>
                            </tr>
                            <tr valign="top">
                                <td><?php echo $recordChild_1_Name ?></td>
                                <td>
                                    <?php
                                        if($recordChild_1_BDay) {
                			$Tformat = 'Y-m-d';
                                	$DateWhole = DateTime::createFromFormat($Tformat, $recordChild_1_BDay);
                                        $DateSQLFormat = $DateWhole->format('M d, Y');
                                        echo $DateSQLFormat;
                                        }
                                    ?>
                                </td>
                                <td><?php echo $recordChild_1_Gender ?></td>
                                <td>
                                    <?php
                                        if($recordChild_1_BDay) {
                                        $childage = date_diff(date_create($recordChild_1_BDay), date_create('now'))->y;
                                        echo $childage;
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr valign="top">
                                <td><?php echo $recordChild_2_Name ?></td>
                                <td>
                                    <?php
                                        if($recordChild_2_BDay) {
                                        $Tformat = 'Y-m-d';
                                        $DateWhole = DateTime::createFromFormat($Tformat, $recordChild_2_BDay);
                                        $DateSQLFormat = $DateWhole->format('M d, Y');
                                        echo $DateSQLFormat;
                                        }
                                    ?>
                                </td>
                                <td><?php echo $recordChild_2_Gender ?></td>
                                <td>
                                        <?php
                                                if($recordChild_2_BDay) {
                                                        $childage = date_diff(date_create($recordChild_2_BDay), date_create('now'))->y;
                                                        echo $childage;
                                                        }
                                        ?>
                                </td>
                            </tr>
                            <tr valign="top">
                                <td><?php echo $recordChild_3_Name ?></td>
                                <td>
                                    <?php
                                        if($recordChild_3_BDay) {
                                        $Tformat = 'Y-m-d';
                                        $DateWhole = DateTime::createFromFormat($Tformat, $recordChild_3_BDay);
                                        $DateSQLFormat = $DateWhole->format('M d, Y');
                                        echo $DateSQLFormat;
                                        }
                                    ?>
                                </td>
                                <td><?php echo $recordChild_3_Gender ?></td>
                                <td>
                                    <?php
                                        if($recordChild_3_BDay) {
                                        $childage = date_diff(date_create($recordChild_3_BDay), date_create('now'))->y;
                                        echo $childage;
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr valign="top">
                                <td><?php echo $recordChild_4_Name ?></td>
                                <td>
                                    <?php
                                        if($recordChild_4_BDay) {
                                        $Tformat = 'Y-m-d';
                                        $DateWhole = DateTime::createFromFormat($Tformat, $recordChild_4_BDay);
                                        $DateSQLFormat = $DateWhole->format('M d, Y');
                                        echo $DateSQLFormat;
                                        }
                                    ?>
                                </td>
                                <td><?php echo $recordChild_4_Gender ?></td>
                                <td>
                                    <?php
                                        if($recordChild_4_BDay) {
                                        $childage = date_diff(date_create($recordChild_4_BDay), date_create('now'))->y;
                                        echo $childage;
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr valign="top">
                                <td><?php echo $recordChild_5_Name ?></td>
                                <td>
                                    <?php
                                        if($recordChild_5_BDay) {
                                        $Tformat = 'Y-m-d';
                                        $DateWhole = DateTime::createFromFormat($Tformat, $recordChild_5_BDay);
                                        $DateSQLFormat = $DateWhole->format('M d, Y');
                                        echo $DateSQLFormat;
                                        }
                                    ?>
                                </td>
                                <td><?php echo $recordChild_5_Gender ?></td>
                                <td>
                                    <?php
                                        if($recordChild_5_BDay) {
                                        $childage = date_diff(date_create($recordChild_5_BDay), date_create('now'))->y;
                                        echo $childage;
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr valign="top">
                                <td><?php echo $recordChild_6_Name ?></td>
                                <td>
                                    <?php
                                        if($recordChild_6_BDay) {
                                        $Tformat = 'Y-m-d';
                                        $DateWhole = DateTime::createFromFormat($Tformat, $recordChild_6_BDay);
                                        $DateSQLFormat = $DateWhole->format('M d, Y');
                                        echo $DateSQLFormat;
                                        }
                                    ?>
                                </td>
                                <td><?php echo $recordChild_6_Gender ?></td>
                                <td>
                                    <?php
                                        if($recordChild_6_BDay) {
                                        $childage = date_diff(date_create($recordChild_6_BDay), date_create('now'))->y;
                                        echo $childage;
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr valign="top">
                                <td><?php echo $recordChild_7_Name ?></td>
                                <td>
                                    <?php
                                        if($recordChild_7_BDay) {
                                        $Tformat = 'Y-m-d';
                                        $DateWhole = DateTime::createFromFormat($Tformat, $recordChild_7_BDay);
                                        $DateSQLFormat = $DateWhole->format('M d, Y');
                                        echo $DateSQLFormat;
                                        }
                                    ?>
                                </td>
                                <td><?php echo $recordChild_7_Gender ?></td>
                                <td>
                                    <?php
                                        if($recordChild_7_BDay) {
                                        $childage = date_diff(date_create($recordChild_7_BDay), date_create('now'))->y;
                                        echo $childage;
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr valign="top">
                                <td><?php echo $recordChild_8_Name ?></td>
                                <td>
                                    <?php
                                        if($recordChild_8_BDay) {
                                        $Tformat = 'Y-m-d';
                                        $DateWhole = DateTime::createFromFormat($Tformat, $recordChild_8_BDay);
                                        $DateSQLFormat = $DateWhole->format('M d, Y');
                                        echo $DateSQLFormat;
                                        }
                                    ?>
                                </td>
                                <td><?php echo $recordChild_8_Gender ?></td>
                                <td>
                                    <?php
                                        if($recordChild_8_BDay) {
                                        $childage = date_diff(date_create($recordChild_8_BDay), date_create('now'))->y;
                                        echo $childage;
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>

                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>      

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline-primary mt-3">
                <img class="card-img-top" src="images/trinity_logo_web.png" width="auto" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center mt-3" style="background-color: #FFFFFF">
                <img class="card-img-top" height="100%" src="images/tfcbanner3.png" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">Card title</h2>
                    <p class="card-text">This is a card with text center div.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card w-100 h-100 text-center mt-3" style="background-color: #FFFFFF">
                <div class="card-body">
                    <h2 class="card-title">Card title</h2>
                </div>
                <div class="card-block">
                    <img class="card-img-top" height="100px" src="images/tfcbanner3.png" alt="Card image cap">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="card-block">
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div> <!--container-->




<!--Include all compiled plugins (below), or include individual files as needed
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>


<!-- jQuery (necessary for Bootstrap's (BOOTSTRAP 4 BETA) JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


    
    
  </body>
</html>