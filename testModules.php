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

$loggedIn = $userMod->LoginUser("workingPW","thisisworkingtest");
if($loggedIn == true){
	echo "</p>Login successful, it works !!!!!!!!!!</p>";
}else{
	echo "<p>User not logged in. This means the test is successful.</p>";
}

if(session_id() == ''){
	session_start();
}

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

if($userMod->IsAdmin()){
	echo "<p> User is admin </p>";
}else{
	echo "<p> User is not admin </p>";
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