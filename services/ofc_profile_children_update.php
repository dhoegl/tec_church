<?php
session_start();
if(!$_SESSION['logged in']) {
	header("location:../ofc_welcome_new.php");
	exit();
}

require_once('../ofc_dbconnect.php');
//include_once('/includes/event_logs_update.php');


/* Process profile update - CHILDREN (name, gender, birthdate, etc.) INFO: Called from ofc_profile.php */
/*********** Child 1 **************/
if(isset($_POST['submit1children']))
	{
	$namelast = $_POST['lastname'];
	$child_name = stripslashes($_POST['child1_name']);
	$child_bday = $_POST['child1_bday'];
	if(!$child_bday) {
		$child_bday == NULL;
	}
	$child_gender = $_POST['child1_gender'];
	$child_email = stripslashes($_POST['child1_email']);

    /*********** ADD SCHOOL + GRADE **************/
	$child_school = $_POST['child1_school'];
    if(!$child_school) {
        $child_school == NULL;
    }
    //$child_grade = $_POST['child1_grade'];
	$child_grade = substr(filter_input(INPUT_POST, 'child1_grade'),0,2);
    //if(!$child_grade) {
    //    $child_grade == NULL;
    //}
    /*********** ADD SCHOOL + GRADE **************/

	$childupdatequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Child_1_Name = '" . $child_name . "', Child_1_BDay_Date = '" . $child_bday . "', Child_1_Gender = '" . $child_gender . "', Child_1_Email = '" . $child_email . "', Child_1_School = '" . $child_school . "', Child_1_Grade = '" . $child_grade . "' WHERE idDirectory = '". $_SESSION['idDirectory'] . "'";
	$childupdate = $mysql->query($childupdatequery) or die("A database error occurred when trying to update child info. See tec_profile_children_update.php. Error : " . mysql_errno() . mysql_error());
//	eventLogUpdate('profile_update', $namelast, 'Profile Update : Children : DirectoryID = ', $_SESSION['idDirectory']);
}
elseif(isset($_POST['remove1child'])) {
	$namelast = $_POST['lastname'];
	$childremovequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Child_1_Name = NULL, Child_1_BDay_Date = NULL, Child_1_Gender = NULL, Child_1_Email = NULL, Child_1_School = NULL, Child_1_Grade = NULL WHERE idDirectory = '". $_SESSION['idDirectory'] . "'";
	$childremove = $mysql->query($childremovequery) or die("A database error occurred when trying to update child 1 info. See tec_profile_children_update.php. Error : " . mysql_errno() . mysql_error());
//	eventLogUpdate('profile_update', $namelast, 'Profile Update : Children : DirectoryID = ', $_SESSION['idDirectory']);
}
/*********** Child 2 **************/
elseif(isset($_POST['submit2children']))
	{
	$namelast = $_POST['lastname'];
	$child_name = stripslashes($_POST['child2_name']);
	$child_bday = $_POST['child2_bday'];
	if(!$child_bday) {
		$child_bday == NULL;
	}
	$child_gender = $_POST['child2_gender'];
	$child_email = stripslashes($_POST['child2_email']);

    /*********** ADD SCHOOL + GRADE **************/
	$child_school = $_POST['child2_school'];
	if(!$child_school) {
		$child_school == NULL;
	}
    $child_grade = substr($_POST['child2_grade'],0,2);
    //$child_grade = substr(filter_input(INPUT_POST, 'child2_grade'),0,2);
	if(!$child_grade) {
		$child_grade == NULL;
	}
    /*********** ADD SCHOOL + GRADE **************/


	$childupdatequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Child_2_Name = '" . $child_name . "', Child_2_BDay_Date = '" . $child_bday . "', Child_2_Gender = '" . $child_gender . "', Child_2_Email = '" . $child_email . "', Child_2_School = '" . $child_school . "', Child_2_Grade = '" . $child_grade . "' WHERE idDirectory = '". $_SESSION['idDirectory'] . "'";
	$childupdate = $mysql->query($childupdatequery) or die("A database error occurred when trying to update child info. See tec_profile_children_update.php. Error : " . mysql_errno() . mysql_error());
//	eventLogUpdate('profile_update', $namelast, 'Profile Update : Children : DirectoryID = ', $_SESSION['idDirectory']);
}
elseif(isset($_POST['remove2child'])) {
	$namelast = $_POST['lastname'];
	$childremovequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Child_2_Name = NULL, Child_2_BDay_Date = NULL, Child_2_Gender = NULL, Child_2_Email = NULL, Child_2_School = NULL, Child_2_Grade = NULL WHERE idDirectory = '". $_SESSION['idDirectory'] . "'";
	$childremove = $mysql->query($childremovequery) or die("A database error occurred when trying to update child 2 info. See tec_profile_children_update.php. Error : " . mysql_errno() . mysql_error());
//	eventLogUpdate('profile_update', $namelast, 'Profile Update : Children : DirectoryID = ', $_SESSION['idDirectory']);
}
elseif(isset($_POST['submit3children']))
	{
	$namelast = $_POST['lastname'];
	$child_name = stripslashes($_POST['child3_name']);
	$child_bday = $_POST['child3_bday'];
	if(!$child_bday) {
		$child_bday == NULL;
	}
	$child_gender = $_POST['child3_gender'];
	$child_email = stripslashes($_POST['child3_email']);

    /*********** ADD SCHOOL + GRADE **************/
	$child_school = $_POST['child3_school'];
	if(!$child_school) {
		$child_school == NULL;
	}
    $child_grade = substr($_POST['child3_grade'],0,2);
    //$child_grade = substr(filter_input(INPUT_POST, 'child2_grade'),0,2);
	if(!$child_grade) {
		$child_grade == NULL;
	}
    /*********** ADD SCHOOL + GRADE **************/

    $childupdatequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Child_3_Name = '" . $child_name . "', Child_3_BDay_Date = '" . $child_bday . "', Child_3_Gender = '" . $child_gender . "', Child_3_Email = '" . $child_email . "', Child_3_School = '" . $child_school . "', Child_3_Grade = '" . $child_grade . "'  WHERE idDirectory = '". $_SESSION['idDirectory'] . "'";
	$childupdate = $mysql->query($childupdatequery) or die("A database error occurred when trying to update child info. See tec_profile_children_update.php. Error : " . mysql_errno() . mysql_error());
//	eventLogUpdate('profile_update', $namelast, 'Profile Update : Children : DirectoryID = ', $_SESSION['idDirectory']);
}
elseif(isset($_POST['remove3child'])) {
	$namelast = $_POST['lastname'];
	$childremovequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Child_3_Name = NULL, Child_3_BDay_Date = NULL, Child_3_Gender = NULL, Child_3_Email = NULL, Child_3_School = NULL, Child_3_Grade = NULL WHERE idDirectory = '". $_SESSION['idDirectory'] . "'";
	$childremove = $mysql->query($childremovequery) or die("A database error occurred when trying to update child 3 info. See tec_profile_children_update.php. Error : " . mysql_errno() . mysql_error());
//	eventLogUpdate('profile_update', $namelast, 'Profile Update : Children : DirectoryID = ', $_SESSION['idDirectory']);
}
elseif(isset($_POST['submit4children']))
	{
	$namelast = $_POST['lastname'];
	$child_name = stripslashes($_POST['child4_name']);
	$child_bday = $_POST['child4_bday'];
	if(!$child_bday) {
		$child_bday == NULL;
	}
	$child_gender = $_POST['child4_gender'];
	$child_email = stripslashes($_POST['child4_email']);

    /*********** ADD SCHOOL + GRADE **************/
	$child_school = $_POST['child4_school'];
	if(!$child_school) {
		$child_school == NULL;
	}
    $child_grade = substr($_POST['child4_grade'],0,2);
    //$child_grade = substr(filter_input(INPUT_POST, 'child2_grade'),0,2);
	if(!$child_grade) {
		$child_grade == NULL;
	}
    /*********** ADD SCHOOL + GRADE **************/

    $childupdatequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Child_4_Name = '" . $child_name . "', Child_4_BDay_Date = '" . $child_bday . "', Child_4_Gender = '" . $child_gender . "', Child_4_Email = '" . $child_email . "', Child_4_School = '" . $child_school . "', Child_4_Grade = '" . $child_grade . "'  WHERE idDirectory = '". $_SESSION['idDirectory'] . "'";
	$childupdate = $mysql->query($childupdatequery) or die("A database error occurred when trying to update child info. See tec_profile_children_update.php. Error : " . mysql_errno() . mysql_error());
//	eventLogUpdate('profile_update', $namelast, 'Profile Update : Children : DirectoryID = ', $_SESSION['idDirectory']);
}
elseif(isset($_POST['remove4child'])) {
	$namelast = $_POST['lastname'];
	$childremovequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Child_4_Name = NULL, Child_4_BDay_Date = NULL, Child_4_Gender = NULL, Child_4_Email = NULL, Child_4_School = NULL, Child_4_Grade = NULL WHERE idDirectory = '". $_SESSION['idDirectory'] . "'";
	$childremove = $mysql->query($childremovequery) or die("A database error occurred when trying to update child 4 info. See tec_profile_children_update.php. Error : " . mysql_errno() . mysql_error());
//	eventLogUpdate('profile_update', $namelast, 'Profile Update : Children : DirectoryID = ', $_SESSION['idDirectory']);
}
elseif(isset($_POST['submit5children']))
	{
	$namelast = $_POST['lastname'];
	$child_name = stripslashes($_POST['child5_name']);
	$child_bday = $_POST['child5_bday'];
	if(!$child_bday) {
		$child_bday == NULL;
	}
	$child_gender = $_POST['child5_gender'];
	$child_email = stripslashes($_POST['child5_email']);

    /*********** ADD SCHOOL + GRADE **************/
	$child_school = $_POST['child5_school'];
	if(!$child_school) {
		$child_school == NULL;
	}
    $child_grade = substr($_POST['child5_grade'],0,2);
    //$child_grade = substr(filter_input(INPUT_POST, 'child2_grade'),0,2);
	if(!$child_grade) {
		$child_grade == NULL;
	}
    /*********** ADD SCHOOL + GRADE **************/

    $childupdatequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Child_5_Name = '" . $child_name . "', Child_5_BDay_Date = '" . $child_bday . "', Child_5_Gender = '" . $child_gender . "', Child_5_Email = '" . $child_email . "', Child_5_School = '" . $child_school . "', Child_5_Grade = '" . $child_grade . "'  WHERE idDirectory = '". $_SESSION['idDirectory'] . "'";
	$childupdate = $mysql->query($childupdatequery) or die("A database error occurred when trying to update child info. See tec_profile_children_update.php. Error : " . mysql_errno() . mysql_error());
//	eventLogUpdate('profile_update', $namelast, 'Profile Update : Children : DirectoryID = ', $_SESSION['idDirectory']);
}
elseif(isset($_POST['remove5child'])) {
	$namelast = $_POST['lastname'];
	$childremovequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Child_5_Name = NULL, Child_5_BDay_Date = NULL, Child_5_Gender = NULL, Child_5_Email = NULL, Child_5_School = NULL, Child_5_Grade = NULL WHERE idDirectory = '". $_SESSION['idDirectory'] . "'";
	$childremove = $mysql->query($childremovequery) or die("A database error occurred when trying to update child 5 info. See tec_profile_children_update.php. Error : " . mysql_errno() . mysql_error());
//	eventLogUpdate('profile_update', $namelast, 'Profile Update : Children : DirectoryID = ', $_SESSION['idDirectory']);
}
elseif(isset($_POST['submit6children']))
	{
	$namelast = $_POST['lastname'];
	$child_name = stripslashes($_POST['child6_name']);
	$child_bday = $_POST['child6_bday'];
	if(!$child_bday) {
		$child_bday == NULL;
	}
	$child_gender = $_POST['child6_gender'];
	$child_email = stripslashes($_POST['child6_email']);

    /*********** ADD SCHOOL + GRADE **************/
	$child_school = $_POST['child6_school'];
	if(!$child_school) {
		$child_school == NULL;
	}
    $child_grade = substr($_POST['child6_grade'],0,2);
    //$child_grade = substr(filter_input(INPUT_POST, 'child2_grade'),0,2);
	if(!$child_grade) {
		$child_grade == NULL;
	}
    /*********** ADD SCHOOL + GRADE **************/

    $childupdatequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Child_6_Name = '" . $child_name . "', Child_6_BDay_Date = '" . $child_bday . "', Child_6_Gender = '" . $child_gender . "', Child_6_Email = '" . $child_email . "', Child_6_School = '" . $child_school . "', Child_6_Grade = '" . $child_grade . "'  WHERE idDirectory = '". $_SESSION['idDirectory'] . "'";
	$childupdate = $mysql->query($childupdatequery) or die("A database error occurred when trying to update child info. See tec_profile_children_update.php. Error : " . mysql_errno() . mysql_error());
//	eventLogUpdate('profile_update', $namelast, 'Profile Update : Children : DirectoryID = ', $_SESSION['idDirectory']);
}
elseif(isset($_POST['remove6child'])) {
	$namelast = $_POST['lastname'];
	$childremovequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Child_6_Name = NULL, Child_6_BDay_Date = NULL, Child_6_Gender = NULL, Child_6_Email = NULL, Child_6_School = NULL, Child_6_Grade = NULL WHERE idDirectory = '". $_SESSION['idDirectory'] . "'";
	$childremove = $mysql->query($childremovequery) or die("A database error occurred when trying to update child 6 info. See tec_profile_children_update.php. Error : " . mysql_errno() . mysql_error());
//	eventLogUpdate('profile_update', $namelast, 'Profile Update : Children : DirectoryID = ', $_SESSION['idDirectory']);
}
elseif(isset($_POST['submit7children']))
	{
	$namelast = $_POST['lastname'];
	$child_name = stripslashes($_POST['child7_name']);
	$child_bday = $_POST['child7_bday'];
	if(!$child_bday) {
		$child_bday == NULL;
	}
	$child_gender = $_POST['child7_gender'];
	$child_email = stripslashes($_POST['child7_email']);

    /*********** ADD SCHOOL + GRADE **************/
	$child_school = $_POST['child7_school'];
	if(!$child_school) {
		$child_school == NULL;
	}
    $child_grade = substr($_POST['child7_grade'],0,2);
    //$child_grade = substr(filter_input(INPUT_POST, 'child2_grade'),0,2);
	if(!$child_grade) {
		$child_grade == NULL;
	}
    /*********** ADD SCHOOL + GRADE **************/

    $childupdatequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Child_7_Name = '" . $child_name . "', Child_7_BDay_Date = '" . $child_bday . "', Child_7_Gender = '" . $child_gender . "', Child_7_Email = '" . $child_email . "', Child_7_School = '" . $child_school . "', Child_7_Grade = '" . $child_grade . "'  WHERE idDirectory = '". $_SESSION['idDirectory'] . "'";
	$childupdate = $mysql->query($childupdatequery) or die("A database error occurred when trying to update child info. See tec_profile_children_update.php. Error : " . mysql_errno() . mysql_error());
//	eventLogUpdate('profile_update', $namelast, 'Profile Update : Children : DirectoryID = ', $_SESSION['idDirectory']);
}
elseif(isset($_POST['remove7child'])) {
	$namelast = $_POST['lastname'];
	$childremovequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Child_7_Name = NULL, Child_7_BDay_Date = NULL, Child_7_Gender = NULL, Child_7_Email = NULL, Child_7_School = NULL, Child_7_Grade = NULL WHERE idDirectory = '". $_SESSION['idDirectory'] . "'";
	$childremove = $mysql->query($childremovequery) or die("A database error occurred when trying to update child 7 info. See tec_profile_children_update.php. Error : " . mysql_errno() . mysql_error());
//	eventLogUpdate('profile_update', $namelast, 'Profile Update : Children : DirectoryID = ', $_SESSION['idDirectory']);
}
elseif(isset($_POST['submit8children']))
	{
	$namelast = $_POST['lastname'];
	$child_name = stripslashes($_POST['child8_name']);
	$child_bday = $_POST['child8_bday'];
	if(!$child_bday) {
		$child_bday == NULL;
	}
	$child_gender = $_POST['child8_gender'];
	$child_email = stripslashes($_POST['child8_email']);

    /*********** ADD SCHOOL + GRADE **************/
	$child_school = $_POST['child8_school'];
	if(!$child_school) {
		$child_school == NULL;
	}
    $child_grade = substr($_POST['child8_grade'],0,2);
    //$child_grade = substr(filter_input(INPUT_POST, 'child2_grade'),0,2);
	if(!$child_grade) {
		$child_grade == NULL;
	}
    /*********** ADD SCHOOL + GRADE **************/

    $childupdatequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Child_8_Name = '" . $child_name . "', Child_8_BDay_Date = '" . $child_bday . "', Child_8_Gender = '" . $child_gender . "', Child_8_Email = '" . $child_email . "', Child_8_School = '" . $child_school . "', Child_8_Grade = '" . $child_grade . "'  WHERE idDirectory = '". $_SESSION['idDirectory'] . "'";
	$childupdate = $mysql->query($childupdatequery) or die("A database error occurred when trying to update child info. See tec_profile_children_update.php. Error : " . mysql_errno() . mysql_error());
//	eventLogUpdate('profile_update', $namelast, 'Profile Update : Children : DirectoryID = ', $_SESSION['idDirectory']);
}
elseif(isset($_POST['remove8child'])) {
	$namelast = $_POST['lastname'];
	$childremovequery = "UPDATE " . $_SESSION['dirtablename'] . " SET Child_8_Name = NULL, Child_8_BDay_Date = NULL, Child_8_Gender = NULL, Child_8_Email = NULL, Child_8_School = NULL, Child_8_Grade = NULL WHERE idDirectory = '". $_SESSION['idDirectory'] . "'";
	$childremove = $mysql->query($childremovequery) or die("A database error occurred when trying to update child 8 info. See tec_profile_children_update.php. Error : " . mysql_errno() . mysql_error());
//	eventLogUpdate('profile_update', $namelast, 'Profile Update : Children : DirectoryID = ', $_SESSION['idDirectory']);
}

header("location:../ofc_profile.php?id=" . $_SESSION['idDirectory']);
?>