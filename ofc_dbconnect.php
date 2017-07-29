<?php
session_start();
	$host="50.62.209.187:3306"; // Host name 
	$username="OFCDIR_TEST"; // Mysql username 
	$password="Thr33Bl!ndM!c3"; // Mysql password 
	$db_name="OFCDIR_TEST"; // Database name 
	$login_tbl_name="login"; // Master User Login Table name 
	$admin_tbl_name="admins"; //Administration Table name	
	$dir_tbl_name="directory"; // Members Table name 
	$l2l_tbl_name="Life2Life"; //L2L Table name	
	$prayer_tbl_name="prayer";
	$prayer_uid_tbl_name="prayer_uid";
	$prayer_follow_tbl_name="prayer_follow";
	$prayer_update_tbl_name="prayer_update";
	$access_log_tbl_name="access_log";
	$states_tbl_name="states";
	$event_tbl_name="Events";
	
	$_SESSION['logintablename'] = $login_tbl_name;
	$_SESSION['dirtablename'] = $dir_tbl_name;
	$_SESSION['l2ltablename'] = $l2l_tbl_name;
	$_SESSION['admintablename'] = $admin_tbl_name;
	$_SESSION['prayertable'] = $prayer_tbl_name;
	$_SESSION['prayerfollow'] = $prayer_follow_tbl_name;
	$_SESSION['prayerupdate'] = $prayer_update_tbl_name;
	$_SESSION['prayeruidtable'] = $prayer_uid_tbl_name;
	$_SESSION['accesslogtable'] = $access_log_tbl_name;
	$_SESSION['statestablename'] = $states_tbl_name;
	$_SESSION['eventtablename'] = $event_tbl_name;

//   $db = @mysql_connect($host, $username, $password) or die("cannot connect to ofcdir_test. Error #" . mysql_errno() . " " . mysql_error());
//
//    if (!$db) {
//        echo "Unable to establish connection to tecdir2 database server";
//        exit;
//    }
//
//    if (!@mysql_select_db($db_name)) {
//        echo "Unable to connect to database tecdir2. Error #" . mysql_errno() . " " . mysql_error();
//        exit;
//    }

        $mysql = new mysqli($host, $username, $password, $db_name);
        if ($mysql->connect_error){
            echo 'Unable to establish connection to database';
            echo 'Error #: ' . $mysql->connect_errno . ' Description: ' . $mysql->connect_error;
        }
        ?>
