<?php
if(!$_SESSION['logged in']) {
    return;
}
else
{

}
?>
<li>
    <a href='/tecfamily.php'>Family Directory</a>
</li>

<?php
if($_SESSION['super_admin'] == 1 || $_SESSION['reg_admin'] == 1 || $_SESSION['pray_admin'] == 1 || $_SESSION['accesslevel'] == '3'){ // Administrator or Authorized user
    echo "<li><a href='/tecprayer.php'>Prayer</a></li>";
}
if($_SESSION['reg_admin'] == 1){ // Registration Administrator
    echo "<li><a href='/tecmemberadmin.php'>Registration Admin</a></li>";
}
if($_SESSION['pray_admin'] == 1){ // Administrator
    echo "<li><a href='/tecprayeradmin.php'>Prayer Admin</a></li>";
}
if($_SESSION['super_admin'] == 1){ // SuperUser
    echo "<li><a href='/tec_maint_page.php'>Maintenance</a></li>";
}
?>

<li>
    <a href='/teccalendar.php'>Calendar</a>
</li>

<?php
if($_SESSION['accesslevel'] == '3'){ // Authorized User
    echo "<li><a href='/tecfamview.php?id=" . $_SESSION['idDirectory'] . "'>My Profile</a></li>";
}
?>

<li>
    <a href='/teclogout.php'>Logout</a>
</li>