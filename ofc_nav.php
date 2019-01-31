<!--Navbar-->
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <a class="navbar-brand" href="ofc_welcome_new.php">
        <!--<img src="/docs/4.1/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="" />-->
        <!--<img src="/_tenant/images/raggantssbs_or.png" width="30" height="30" class="d-inline-block align-top" alt="" />-->
        <img id="nav_logo" width="30" height="30" class="d-inline-block align-top" alt="" />
        <!--OurFamilyConnections-->
        <span id="navbar_brand"></span>
    </a>
    <!--<a class="navbar-brand" href="ofc_welcome.php">OurFamilyConnections</a>-->
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
