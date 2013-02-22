<?php
require('DatabaseModule.php');
require('UserModule.php');

//START DB TEST
$dbMod = new DatabaseModule();
$connection = $dbMod->connect();
if($connection == false){
	echo "<p> Not Connected to the database </p>";
}else{
	echo "Connected to the database";
}
//END DB TEST

//START USER TEST
$userMod = new UserModule($connection);

$loggedIn = $userMod->LoginUser("trc202","password");
if($loggedIn == true){
	echo "</p>Login successful, this should not happen at this point in time. Username is: " . $userMod->GetUserName() . "</p>";
}else{
	echo "<p>User not logged in. This means the test is successful.</p>";
}

if(session_id() == ''){
	session_start();
}
echo "<p>Creating a fake login manually...</p>";
$_SESSION['username'] = "trc202";

if($userMod->IsUserLoggedIn()){
	echo "<p>User logged in.</p>";
}else{
	echo "<p>User not logged in.</p>";
}

if($userMod->IsUserLoggedIn()){
	echo "<p>Username is " . $userMod->GetUserName() . "</p>";
}else{
	echo "<p>User not logged in </p>";
}

if($userMod->LogoutUser()){
	echo "<p>User logged out. </p>";
	echo "<p>Username is \"" . $userMod->GetUserName() . "\" <- This should be empty.</p>";
}else{
	echo "<p>User not logged out.</p>";
}

//END USER TEST
$connection->close();
?>