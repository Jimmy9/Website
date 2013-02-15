<?php


//--------------- Start sql setup -----------------------------------//
//TODO: replace with single config file
$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = "not telling github my password"; // Mysql password
$db_name = "discourseanalysis"; // Database name
$dbLink = new mysqli("$host", "$username", "$password", "$db_name");

//Connect to the database
if ($dbLink->connect_errno) {
    printf("Connect failed: %s\n", $dbLink->connect_error);
    exit();
}
//--------------------------End sql setup ---------------------------//

// temporary table name
$tempTable="tempusersinfo";

//permanent table name
$permanentTable="usersinfo";

// registration identifer for a user
$registrationId=$_GET['registrationId'];


// Retrieve data from table where row that match the unique id
$uniqueIdsQuery="SELECT * FROM $tempTable WHERE confirm_code ='$registrationId'";
$uniqueIdsQueryResult=$dbLink->query($uniqueIdsQuery);

// If successfully queried
if($uniqueIdsQueryResult){
	// Count how many row has this registrationId
	$count = $uniqueIdsQueryResult->num_rows;

	// if found this registrationId in our database, retrieve data from table listed in 
	if($count==1){
	
		$rows=$uniqueIdsQueryResult->fetch_array(MYSQLI_ASSOC);
		$username=$rows['Username'];
		$email=$rows['Email'];
		$password=$rows['Password'];
		$name=$rows['Name'];

		// Copy data from the temp table into the permanent table
		$moveDataQuery="INSERT INTO $permanentTable(Username, Password, Email, Name)VALUES('$username', '$password', '$email', '$name' )";
		$successfullyActivated=$dbLink->query($moveDataQuery);
		
		// if successfully moved data from the temp table to the permanent table
		// and display activation notice while deleting the old data from the temp table
		if($successfullyActivated){
			echo "Your account has been activated";

			// Delete information of this user from table "temp_members_db" that has this registrationId
			$sql3="DELETE FROM $tempTable WHERE confirm_code = '$registrationId'";
			$result3=$dbLink->query($sql3);
		}
		
	} // if not found registrationId, display message "Wrong Confirmation code"
	else{
		echo "Invalid Confirmation code";
	}
}
?>