<?php
require('DatabaseModule.php');
require('AdminModule.php');

//START DB TEST
$dbMod = new DatabaseModule();
$connection = $dbMod->connect();
if($connection == false){
	echo "<p> Not Connected to the database </p>";
}else{
	echo "<p>Connected to the database</p>";
}
//END DB TEST

//START ADMIN TEST
$adminMod = new AdminUserModule($connection);

$changeUserLog = $adminMod->ChangeUsername("jhurst1", "newUser");	

echo $changeUserLog;

//END ADMIN TEST
?>