<?php 
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	header("location:ofc_welcome.php");
	exit();
}
?> 

<!DOCTYPE html>
<html lang="en" class="full-height">

<head>
<!-- BOOTSTRAP 4 - Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home</title>
    
    <!--<script>
        document.title = "Online Family Connection";
    </script>-->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts - Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">
    <!-- Extended styles for this page -->
    <link href="css/ofc_css_style.css" rel="stylesheet">
    <!-- Tenant-specific stylesheet -->
    <link href="_tenant/css/tenant.css" rel="stylesheet">

</head>

<body>

        <!--Main Navigation-->
        <header>

            <!--Navbar-->
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <a class="navbar-brand" href="ofc_welcome.php">OurFamilyConnections</a>
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
                    $activeparam = '1';
                    include '/includes/ofc_menu.php';
                    echo '</ul>';
                }
                ?>
            </div>
        </nav>

            <!-- Intro Section -->
<!--            <div class="view hm-black-light jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(https://mdbootstrap.com/img/Photos/Others/img%20%2848%29.jpg);">-->
            <div class="view hm-black-light jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(/_tenant/images/cropped-ECS-2016-31.jpg);">
                <div class="full-bg-img">
                    <div class="container flex-center">
                        <div class="row pt-5 mt-3">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <h1 class="h1-reponsive white-text text-uppercase font-weight-bold mb-3 wow fadeInDown" data-wow-delay="0.3s"><strong>Evangel Classical School</strong></h1>
                                    <hr class="hr-light mt-4 wow fadeInDown" data-wow-delay="0.4s">
                                    <h5 class="text-uppercase mb-5 white-text wow fadeInDown" data-wow-delay="0.4s"><strong>You are the Body of Christ</strong></h5>
                                    <a class="btn btn-outline-white wow fadeInDown" data-wow-delay="0.4s">Upcoming classes</a>
                                    <a class="btn btn-outline-white wow fadeInDown" data-wow-delay="0.4s">About Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <!--Main Navigation-->

        <!--Main Layout-->
        <main>

            <div class="container">

                <!--Grid row-->
                <div class="row py-5 mt-4">

                    <!--Grid column-->
                    <div class="col-md-12 text-left">

                        <p>We are a K-12 classical and Christian school in Marysville, Washington. We meet for classes from 9:00 AM to 3:00 PM Tuesday through Friday at 9015 44th Dr. NE. Come by or email to arrange a visit.</p>
                        <h2>
                            Our Mission:
                        </h2>
                        <p>
                            <img data-attachment-id="1165" data-permalink="http://evangelcs.org/mission/attachment/mission1/" data-orig-file="https://i1.wp.com/evangelcs.org/wp-content/uploads/2018/02/mission1.jpg?fit=1500%2C1500" data-orig-size="1500,1500" data-comments-opened="0" data-image-meta="{&quot;aperture&quot;:&quot;0&quot;,&quot;credit&quot;:&quot;&quot;,&quot;camera&quot;:&quot;&quot;,&quot;caption&quot;:&quot;&quot;,&quot;created_timestamp&quot;:&quot;0&quot;,&quot;copyright&quot;:&quot;&quot;,&quot;focal_length&quot;:&quot;0&quot;,&quot;iso&quot;:&quot;0&quot;,&quot;shutter_speed&quot;:&quot;0&quot;,&quot;title&quot;:&quot;&quot;,&quot;orientation&quot;:&quot;1&quot;}" data-image-title="mission1" data-image-description="" data-medium-file="https://i1.wp.com/evangelcs.org/wp-content/uploads/2018/02/mission1.jpg?fit=300%2C300" data-large-file="https://i1.wp.com/evangelcs.org/wp-content/uploads/2018/02/mission1.jpg?fit=644%2C644" src="https://i1.wp.com/evangelcs.org/wp-content/uploads/2018/02/mission1.jpg?resize=525%2C525" alt="" width="525" height="525" class="aligncenter size-large wp-image-1165" srcset="https://i1.wp.com/evangelcs.org/wp-content/uploads/2018/02/mission1.jpg?resize=1024%2C1024 1024w, https://i1.wp.com/evangelcs.org/wp-content/uploads/2018/02/mission1.jpg?resize=150%2C150 150w, https://i1.wp.com/evangelcs.org/wp-content/uploads/2018/02/mission1.jpg?resize=300%2C300 300w, https://i1.wp.com/evangelcs.org/wp-content/uploads/2018/02/mission1.jpg?resize=768%2C768 768w, https://i1.wp.com/evangelcs.org/wp-content/uploads/2018/02/mission1.jpg?resize=100%2C100 100w, https://i1.wp.com/evangelcs.org/wp-content/uploads/2018/02/mission1.jpg?w=1500 1500w, https://i1.wp.com/evangelcs.org/wp-content/uploads/2018/02/mission1.jpg?w=1288 1288w" sizes="(max-width: 525px) 100vw, 525px">
                        </p>
                        <h2>
                            At ECS:
                        </h2>
                        <ul>
                            <li>we believe that submission to Christ is the starting point for education.</li>
                            <li>we proclaim <a href="http://evangelcs.org/kuyper/">Christ’s sovereign lordship in every arena of life</a>.</li>  
                            <li>we employ the <a href="http://evangelcs.org/vision/#trivium/">curriculum of the trivium</a>: the grammar, the logic, and the rhetoric.</li>
                            <li>we help our students to understand and appreciate our position in Western Culture.</li>  
                            <li>we embrace that Christians who are happy are the most useful for Christ, so <a href="http://evangelcs.org/laughter/">we laugh</a>…a lot.</li>
                        </ul>

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </div>

        </main>
        <!--Main Layout-->



<!-- /Start your project here-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!-- Tenant Configuration JavaScript Call -->
    <script type="text/javascript" src="/js/ofc_config_ajax_call.js"></script>
</body>

</html>