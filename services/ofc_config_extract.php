<?php
/* extract tenant user config details; called from all pages */

//session_start();
//session_destroy();
error_reporting(E_ERROR);

require_once('../ofc_dbconnect.php');

if(isset($_POST['config']) )
{
	$config_post = $_POST['config'];
    $response = "";
	$usernamecheckquery = $mysql->query("SELECT username FROM " . $_SESSION['logintablename'] . " WHERE username = '$username_post'") or die("Prayer Notify function failed at db SELECT. Please notify your administrator with the following. Error : " . mysql_errno() . mysql_error());
	$usernamecheckcount = $usernamecheckquery->num_rows;
	if($usernamecheckcount > 0) {
        $response->username_status = "NAME_USED";
	}
    else {
        $response->username_status = "USERNAME_AVAILABLE";
    }
}
$responseJSON = json_encode($response);
//    header('Content-type: application/json');
echo $responseJSON;
?>