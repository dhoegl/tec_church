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
/*Query Directory for profile info */
		$profilequery = $mysql->query("SELECT * FROM $dir_tbl_name WHERE idDirectory = '" . $profileID . "'");
		$profilequerycount = $profilequery->num_rows;

                // Fetch user profile details from Directory table"
		if ($profilequerycount == 0)
		{
            //echo "no profile information";
                        exit();
		}
		$childarray = array();
                while ($dirrow = $profilequery->fetch_assoc())
                {
                $child_1_name = $dirrow['Child_1_Name'];
                $child_1_bday = $dirrow['Child_1_Bday_Date'];
                $child_1_age = '1';
                $child_1_email = $dirrow['Child_1_Email'];
                $child_1_gender = $dirrow['Child_1_Gender'];
                $child_1_school = $dirrow['Child_1_School'];
                $child_1_grade = $dirrow['Child_1_Grade'];
                $child_2_name = $dirrow['Child_2_Name'];
                $child_2_bday = $dirrow['Child_2_Bday_Date'];
                $child_2_age = '2';
                $child_2_email = $dirrow['Child_2_Email'];
                $child_2_gender = $dirrow['Child_2_Gender'];
                $child_2_school = $dirrow['Child_2_School'];
                $child_2_grade = $dirrow['Child_2_Grade'];
                $child_3_name = $dirrow['Child_3_Name'];
                $child_3_bday = $dirrow['Child_3_Bday_Date'];
                $child_3_age = '3';
                $child_3_email = $dirrow['Child_3_Email'];
                $child_3_gender = $dirrow['Child_3_Gender'];
                $child_3_school = $dirrow['Child_3_School'];
                $child_3_grade = $dirrow['Child_3_Grade'];
                $child_4_name = $dirrow['Child_4_Name'];
                $child_4_bday = $dirrow['Child_4_Bday_Date'];
                $child_4_age = '4';
                $child_4_email = $dirrow['Child_4_Email'];
                $child_4_gender = $dirrow['Child_4_Gender'];
                $child_4_school = $dirrow['Child_4_School'];
                $child_4_grade = $dirrow['Child_4_Grade'];
                $child_5_name = $dirrow['Child_5_Name'];
                $child_5_bday = $dirrow['Child_5_Bday_Date'];
                $child_5_age = '5';
                $child_5_email = $dirrow['Child_5_Email'];
                $child_5_gender = $dirrow['Child_5_Gender'];
                $child_5_school = $dirrow['Child_5_School'];
                $child_5_grade = $dirrow['Child_5_Grade'];
                $child_6_name = $dirrow['Child_6_Name'];
                $child_6_bday = $dirrow['Child_6_Bday_Date'];
                $child_6_age = '6';
                $child_6_email = $dirrow['Child_6_Email'];
                $child_6_gender = $dirrow['Child_6_Gender'];
                $child_6_school = $dirrow['Child_6_School'];
                $child_6_grade = $dirrow['Child_6_Grade'];
                $child_7_name = $dirrow['Child_7_Name'];
                $child_7_bday = $dirrow['Child_7_Bday_Date'];
                $child_7_age = '7';
                $child_7_email = $dirrow['Child_7_Email'];
                $child_7_gender = $dirrow['Child_7_Gender'];
                $child_7_school = $dirrow['Child_7_School'];
                $child_7_grade = $dirrow['Child_7_Grade'];
                $child_8_name = $dirrow['Child_8_Name'];
                $child_8_bday = $dirrow['Child_8_Bday_Date'];
                $child_8_age = '8';
                $child_8_email = $dirrow['Child_8_Email'];
                $child_8_gender = $dirrow['Child_8_Gender'];
                $child_8_school = $dirrow['Child_8_School'];
                $child_8_grade = $dirrow['Child_8_Grade'];

                    // Stores profile data into an array
                $build1 = array('Name' => $child_1_name, 'Birthdate' => $child_1_bday, 'Gender' => $child_1_gender, 'Age' => $child_1_age, 'Email' => $child_1_email, 'School' => $child_1_school, 'Grade' => $child_1_grade);
                $build2 = array('Name' => $child_2_name, 'Birthdate' => $child_2_bday, 'Gender' => $child_2_gender, 'Age' => $child_2_age, 'Email' => $child_2_email, 'School' => $child_2_school, 'Grade' => $child_2_grade);
                $build3 = array('Name' => $child_3_name, 'Birthdate' => $child_3_bday, 'Gender' => $child_3_gender, 'Age' => $child_3_age, 'Email' => $child_3_email, 'School' => $child_3_school, 'Grade' => $child_3_grade);
                $build4 = array('Name' => $child_4_name, 'Birthdate' => $child_4_bday, 'Gender' => $child_4_gender, 'Age' => $child_4_age, 'Email' => $child_4_email, 'School' => $child_4_school, 'Grade' => $child_4_grade);
                $build5 = array('Name' => $child_5_name, 'Birthdate' => $child_5_bday, 'Gender' => $child_5_gender, 'Age' => $child_5_age, 'Email' => $child_5_email, 'School' => $child_5_school, 'Grade' => $child_5_grade);
                $build6 = array('Name' => $child_6_name, 'Birthdate' => $child_6_bday, 'Gender' => $child_6_gender, 'Age' => $child_6_age, 'Email' => $child_6_email, 'School' => $child_6_school, 'Grade' => $child_6_grade);
                $build7 = array('Name' => $child_7_name, 'Birthdate' => $child_7_bday, 'Gender' => $child_7_gender, 'Age' => $child_7_age, 'Email' => $child_7_email, 'School' => $child_7_school, 'Grade' => $child_7_grade);
                $build8 = array('Name' => $child_8_name, 'Birthdate' => $child_8_bday, 'Gender' => $child_8_gender, 'Age' => $child_8_age, 'Email' => $child_8_email, 'School' => $child_8_school, 'Grade' => $child_8_grade);
                $buildjson = array('child_1_name' => $child_1_name, 'child_1_bday' => $child_1_bday, 'child_1_email' => $child_1_email, 'child_1_gender' => $child_1_gender, 'child_1_school' => $child_1_school, 'child_1_grade' => $child_1_grade, 'child_2_name' => $child_2_name, 'child_2_bday' => $child_2_bday, 'child_2_email' => $child_2_email, 'child_2_gender' => $child_2_gender, 'child_2_school' => $child_2_school, 'child_2_grade' => $child_2_grade, 'child_3_name' => $child_3_name, 'child_3_bday' => $child_3_bday, 'child_3_email' => $child_3_email, 'child_3_gender' => $child_3_gender, 'child_3_school' => $child_3_school, 'child_3_grade' => $child_3_grade, 'child_4_name' => $child_4_name, 'child_4_bday' => $child_4_bday, 'child_4_email' => $child_4_email, 'child_4_gender' => $child_4_gender, 'child_4_school' => $child_4_school, 'child_4_grade' => $child_4_grade, 'child_5_name' => $child_5_name, 'child_5_bday' => $child_5_bday, 'child_5_email' => $child_5_email, 'child_5_gender' => $child_5_gender, 'child_5_school' => $child_5_school, 'child_5_grade' => $child_5_grade, 'child_6_name' => $child_6_name, 'child_6_bday' => $child_6_bday, 'child_6_email' => $child_6_email, 'child_6_gender' => $child_6_gender, 'child_6_school' => $child_6_school, 'child_6_grade' => $child_6_grade, 'child_7_name' => $child_7_name, 'child_7_bday' => $child_7_bday, 'child_7_email' => $child_7_email, 'child_7_gender' => $child_7_gender, 'child_7_school' => $child_7_school, 'child_7_grade' => $child_7_grade, 'child_8_name' => $child_8_name, 'child_8_bday' => $child_8_bday, 'child_8_email' => $child_8_email, 'child_8_gender' => $child_8_gender, 'child_8_school' => $child_8_school, 'child_8_grade' => $child_8_grade);
                //$buildjson = array($build1, $build2, $build3, $build4, $build5, $build6, $build7, $build8);
                // Adds each array into the container array
                    array_push($childarray, $buildjson);
                }

    header('Content-type: application/json');
	echo json_encode($childarray);

?>

