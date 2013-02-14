<?php
/*This file takes the information from registration.php and
inserts it into a temporary table pending the user clicking on 
a comfirmation code.

Note in order for this class to do anything you must make sure
that the RegForm action in registration points to this file.
*/ 


//--------------- Start sql setup -----------------------------------//
//TODO: replace with single config file
$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = "not telling you github"; // Mysql password
$db_name = "discourseanalysis"; // Database name
$dbLink = new mysqli("$host", "$username", "$password", "$db_name");

//Connect to the database
if ($dbLink->connect_errno) {
    printf("Connect failed: %s\n", $dbLink->connect_error);
    exit();
}
//--------------------------End sql setup ---------------------------//

$defaultURL = "http://www.trc202.com";

// temp table name
$tempTable="tempusersinfo";

// Random confirmation code
$confirm_code=md5(uniqid(rand()));

// values sent from form
$username=$_POST['username'];
$password=$_POST['password']; 
$email=$_POST['email'];
$fName=$_POST['firstName'];
$lName=$_POST['lastName'];
$name = $fName . " " . $lName; 
// Insert data into database
$sql="INSERT INTO $tempTable(confirm_code, Username, Password, Email, Name)VALUES('$confirm_code', '$username', '$password', '$email', '$name' )";
$result=$dbLink->query($sql);

// if suceesfully inserted data into database, send confirmation link to email
if($result){
	// ---------------- SEND MAIL FORM ----------------

	// send e-mail to ...
	$to=$email;

	// Your subject
	$subject="Your confirmation link here";

	// From
	$header="from: your name <your email>";

	// Your message
	$message="Your Comfirmation link \r\n";
	$message.="Click on this link to activate your account \r\n";
	$message.=$defaultURL ."/confirmation.php?registrationId=$confirm_code";


	// send email
	$sentmail = mail($to,$subject,$message,$header);
}// if not found
else {
	echo "Failed to save the confirmation code to the database, please try again. If the problem persists please contact the owner of the website.";
}


// if your email succesfully sent
if($sentmail){
	echo "Your Confirmation link Has Been Sent To Your Email Address.";
}
else {
	echo "Cannot send Confirmation link to your e-mail address";
}

?>