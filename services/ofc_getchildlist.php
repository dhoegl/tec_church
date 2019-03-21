<?php
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	exit();
}
   require_once('../ofc_dbconnect.php');

//ProfileID is captured when called from ofc_profile.php to identify family's children

if (isset($_POST['profile_id']) )
{
    $profileID = $_POST['profile_id'];
}

/*Query active directory listing: status = 1 */
    $activefamilyquery = $mysql->query("SELECT * FROM " . $_SESSION['childtablename'] . " WHERE idDirectory = " . $profileID) or die(" SQL query error at active family list. Error:" . mysql_errno() . " " . mysql_error());
    $activefamilycount = $activefamilyquery->num_rows;

		$listarray = array();

		if ($activefamilycount == 0)
		{
			echo "no data";
		}

        while($activerow = $activefamilyquery->fetch_assoc())
            //echo "<SCRIPT type='text/javascript'>var dob2 = dateConvert(new Date(data[0].child_1_bday));</SCRIPT>";

        {
		    echo "<tr><td>" . $activerow['Name'] . "</td><td>" . $activerow['Birthdate'] . "</td><td>" . $activerow['Gender'] . "</td><td>" . $activerow['Age'] . "</td><td>" . $activerow['Email'] . "</td><td>" . $activerow['School'] . "</td><td>" . $activerow['Grade'] . "</td></tr>";
		}


?>


