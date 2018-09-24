<?php
    if($activeparam == '1') // $activeparam sets nav element highlight on Nav bar - originates on all pages to identify (by 'Active' class and bold text) which page is being displayed
    {
        echo '<li class="nav-item active"><a class="nav-link" href="ofc_home.php">Home</a></li>';
    }
    else
    {
        echo '<li class="nav-item"><a class="nav-link" href="ofc_home.php">Home</a></li>';
    }
    if($activeparam == '2')
    {
        if($MyView == 'Y')
        {
            echo '<li class="nav-item active"><a class="nav-link" href="ofc_profile.php?id=' . $_SESSION['idDirectory'] . '">My Profile</a></li>';
        }
        else {
            echo '<li class="nav-item"><a class="nav-link" href="ofc_profile.php?id=' . $_SESSION['idDirectory'] . '">My Profile</a></li>';
            }
    }
    else
    {
        echo '<li class="nav-item"><a class="nav-link" href="ofc_profile.php?id=' . $_SESSION['idDirectory'] . '">My Profile</a></li>';
    }
    if($activeparam == '3' || ($activeparam == '2' && $MyView == 'N'))
    {
        echo '<li class="nav-item active"><a class="nav-link" href="ofc_family.php">Directory</a></li>';
    }
    else
    {
        echo '<li class="nav-item"><a class="nav-link" href="ofc_family.php">Directory</a></li>';
    }
    if($activeparam == '4')
    {
        echo '<li class="nav-item active"><a class="nav-link" href="ofc_calendar.php">Calendar</a></li>';
    }
    else
    {
        echo '<li class="nav-item"><a class="nav-link" href="ofc_calendar.php">Calendar</a></li>';
    }
    if($activeparam == '5')
    {
        echo '<li class="nav-item active"><a class="nav-link" href="ofc_prayer.php">Prayer</a></li>';
    }
    else
    {
        echo '<li class="nav-item"><a class="nav-link" href="ofc_prayer.php">Prayer</a></li>';
    }
    if($activeparam == '6')
    {
        echo '<li class="nav-item active"><a class="nav-link" href="#">Events</a></li>';
    }
    else
    {
        echo '<li class="nav-item"><a class="nav-link" href="#">Events</a></li>';
    }
    if($_SESSION['reg_admin'] == '1') {
        echo '<li class="nav-item"><a class="nav-link" href="#">Registration Admin</a></li>';
    }
    if($_SESSION['pray_admin'] == '1') {
        if($activeparam == '8')
        {
            echo '<li class="nav-item active"><a class="nav-link" href="ofc_prayeradmin.php">Prayer Admin</a></li>';
        }
        else {
            echo '<li class="nav-item"><a class="nav-link" href="ofc_prayeradmin.php">Prayer Admin</a></li>';
        }
    }
    echo '<li class="nav-item"><a class="nav-link" href="ofc_logout.php">Logout</a></li>';
?>
<!--<li><a href='/ofc_family.php'>Family Directory</a></li>-->

<!--<?php
//if($_SESSION['super_admin'] == 1 || $_SESSION['reg_admin'] == 1 || $_SESSION['pray_admin'] == 1 || $_SESSION['accesslevel'] == '3'){ // Administrator or Authorized user
// 	 echo "<li><a href='/ofc_prayer.php'>Prayer</a></li>";
//}
//if($_SESSION['reg_admin'] == 1){ // Registration Administrator
// 	 echo "<li><a href='/ofc_memberadmin.php'>Access Admin</a></li>";
//}
//if($_SESSION['pray_admin'] == 1){ // Administrator
// 	 echo "<li><a href='/ofc_prayeradmin.php'>Prayer Admin</a></li>";
//}
//if($_SESSION['super_admin'] == 1){ // SuperUser
//	 echo "<li><a href='/ofc_maint_page.php'>Maintenance</a></li>";
//}
// ?>

//<li><a href='/ofc_calendar.php'>Calendar</a></li>

//<?php
//if($_SESSION['accesslevel'] == '3'){ // Authorized User
// 	 echo "<li><a href='/ofc_famview.php?id=" . $_SESSION['idDirectory'] . "'>My Profile</a></li>";
//}
//?>

-->	


