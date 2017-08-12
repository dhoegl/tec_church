<?php
session_start();
if(!$_SESSION['logged in']) {
	session_destroy();
	exit();
}
   require_once('../ofc_dbconnect.php');

 	if (isset($_POST['profile_id']) ) 
	{
            $profileID = $_POST['profile_id'];
        }
/*Query Directory for profile info */
		$profilequery = $mysql->query("SELECT * FROM $dir_tbl_name WHERE idDirectory = '" . $profileID . "'");
		$profilequerycount = $profilequery->num_rows;
              
                // Fetch user profile details from Directory table"
		if ($profilequerycount == 0)
		{
			echo "no profile information";
                        exit();
		}
		$listarray = array();
                while ($dirrow = $profilequery->fetch_assoc())
                {
                $lastname = $dirrow['Surname'];
                $hisname = $dirrow['Name_1'];
                $hername = $dirrow['Name_2'];
                $addr1 = $dirrow['Address'];
                $addr2 = $dirrow['Address2'];
                $city = $dirrow['City'];
                $state = $dirrow['State'];
                $zip = $dirrow['Zip'];
//		$recordEmail1 = $row['Email_1'];
//		$recordEmail2 = $row['Email_2'];
//		$recordPhoneH = $row['Phone_Home'];
//		$recordPhoneC1 = $row['Phone_Cell1'];
//		$recordPhoneC2 = $row['Phone_Cell2'];
//		$recordBDay1 = $row['BDay_1_Date'];
//		$recordBDay2 = $row['BDay_2_Date'];
//		$recordAnniv = $row['Anniv_Date'];
//		$recordpiclink = $row['Picture_Link'];
//		$recordpiclink2 = $row['ProfilePhoto_New'];
//		$recordL2L = $row['L2L_ID'];
//		$recordChild_1_Name = $row['Child_1_Name'];
//		$recordChild_1_BDay = $row['Child_1_Bday_Date'];
//		$recordChild_1_Email = $row['Child_1_Email'];
//		$recordChild_1_Gender = $row['Child_1_Gender'];
//		$recordChild_2_Name = $row['Child_2_Name'];
//		$recordChild_2_BDay = $row['Child_2_Bday_Date'];
//		$recordChild_2_Email = $row['Child_2_Email'];
//		$recordChild_2_Gender = $row['Child_2_Gender'];
//		$recordChild_3_Name = $row['Child_3_Name'];
//		$recordChild_3_BDay = $row['Child_3_Bday_Date'];
//		$recordChild_3_Email = $row['Child_3_Email'];
//		$recordChild_3_Gender = $row['Child_3_Gender'];
//		$recordChild_4_Name = $row['Child_4_Name'];
//		$recordChild_4_BDay = $row['Child_4_Bday_Date'];
//		$recordChild_4_Email = $row['Child_4_Email'];
//		$recordChild_4_Gender = $row['Child_4_Gender'];
//		$recordChild_5_Name = $row['Child_5_Name'];
//		$recordChild_5_BDay = $row['Child_5_Bday_Date'];
//		$recordChild_5_Email = $row['Child_5_Email'];
//		$recordChild_5_Gender = $row['Child_5_Gender'];
//		$recordChild_6_Name = $row['Child_6_Name'];
//		$recordChild_6_BDay = $row['Child_6_Bday_Date'];
//		$recordChild_6_Email = $row['Child_6_Email'];
//		$recordChild_6_Gender = $row['Child_6_Gender'];
//		$recordChild_7_Name = $row['Child_7_Name'];
//		$recordChild_7_BDay = $row['Child_7_Bday_Date'];
//		$recordChild_7_Email = $row['Child_7_Email'];
//		$recordChild_7_Gender = $row['Child_7_Gender'];
//		$recordChild_8_Name = $row['Child_8_Name'];
//		$recordChild_8_BDay = $row['Child_8_Bday_Date'];
//		$recordChild_8_Email = $row['Child_8_Email'];
//		$recordChild_8_Gender = $row['Child_8_Gender'];


                    // Stores profile data into an array 
                    $buildjson = array('lastname' => $lastname, 'hisname' => $hisname, 'hername' => $hername, 'addr1' => $addr1, 'addr2' => $addr2, 'city' => $city, 'state' => $state, 'zip' => $zip); 
                    // Adds each array into the container array 
                    array_push($listarray, $buildjson); 
                }

	header('Content-type: application/json');
	echo json_encode($listarray); 

?>

