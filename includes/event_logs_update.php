<?php

	function eventLogUpdate($logpointer, $logwho, $logwhat, $logmetric) {

		// This function will log events into corresponding event log tables as outlined below:
		// $logpointer='admin_update' = event_log_admin_update
		// $logpointer='mail' = event_log_mail
		// $logpointer='prayer' = event_log_prayer
		// $logpointer='profile_update' = event_log_profile_update

if($logpointer == "admin_update") {
	
	$eventlogquery = "INSERT INTO " . $_SESSION['eventlogadminupdate'] . "(log_admin_update_who, log_admin_update_what, log_admin_update_metric) VALUES ('$logwho', '$logwhat', '$logmetric')";			
	$eventlogresult = @mysql_query($eventlogquery)or die("Event Log Admin Update function failed at db INSERT. Please notify your administrator with the following. Error : " . mysql_errno() . mysql_error());
}
elseif($logpointer == "mail") {
	
	$eventlogquery = "INSERT INTO " . $_SESSION['eventlogmail'] . "(log_mail_who, log_mail_what, log_mail_metric) VALUES ('$logwho', '$logwhat', '$logmetric')";			
	$eventlogresult = @mysql_query($eventlogquery)or die("Event Log Mail function failed at db INSERT. Please notify your administrator with the following. Error : " . mysql_errno() . mysql_error());
}
elseif($logpointer == "prayer") {
	
	$eventlogquery = "INSERT INTO " . $_SESSION['eventlogprayer'] . "(log_prayer_who, log_prayer_what, log_prayer_metric) VALUES ('$logwho', '$logwhat', '$logmetric')";			
	$eventlogresult = @mysql_query($eventlogquery)or die("Event Log Prayer function failed at db INSERT. Please notify your administrator with the following. Error : " . mysql_errno() . mysql_error());
}
if($logpointer == "profile_update") {
	
	$eventlogquery = "INSERT INTO " . $_SESSION['eventlogprofileupdate'] . " (log_profile_update_who, log_profile_update_what, log_profile_update_metric) VALUES ('$logwho', '$logwhat', '$logmetric')";			
	$eventlogresult = @mysql_query($eventlogquery)or die("Event Log Profile Update function failed at db INSERT. Please notify your administrator with the following. Error : " . mysql_errno() . mysql_error());
}
}
?>