<?php //Generic outbound email function
    function mail_out($source, $owner, $mailto, $mailsubject, $mailmessage, $mailheaders) {
        $mailresult = mail($mailto,$mailsubject,$mailmessage,$mailheaders);
        $tempurl = "ofc_profile.php?id=";
        echo "<script language='javascript'>
                console.log('Source = ' + $source);
                console.log('Owner = ' + $owner);
                if(!$mailresult == 1){
                    alert('Oops - your request did not go through - please contact your administrator with error code A101');
                    window.location = 'ofc_welcome.php';
                }
                else {
                    alert('Your request has been submitted for review. Please allow time for our admins to approve.');
                    if($source == 'profile') {
                        window.location = $tempurl . $owner;
                    }
                    if($source == 'prayer') {
                        window.location = 'ofc_prayer.php';
                    }
                    if($source == 'prayer_admin') {
                        window.location = 'ofc_prayeradmin.php';
                    }
                }";
        //echo "<script language='javascript'>";
        //echo "var xyz;";
        //echo "var abc;";
        //echo "if($mailresult == 1){";
        //echo "alert('Your request has been submitted for review. Please allow time for our admins to approve.');";
        //echo "if($source == 'profile') {";
        //echo "xyz = 'ofc_profile.php?id=';";
        //echo "abc = $owner;";
        //echo "window.location = " . xyz . abc . ";}";
        //echo "if($source == 'prayer') {";
        //echo "window.location = 'ofc_prayer.php');}";
        //echo "if($source == 'prayer_admin') {";
        //echo "window.location = 'ofc_prayeradmin.php');}";
        //echo "}";
        //echo "else{";
        //echo "alert('Oops - your request did not go through - please contact your administrator with error code A101');";
        //echo "window.location = 'ofc_welcome.php';}";
        //echo "</script>";

    }