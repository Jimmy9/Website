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

$row = $adminMod->ViewUser("newUser");
 


$changeUserLog = $adminMod->ChangeUsername("jhurst1", "newUser");	
echo $changeUserLog;

$numOfUsers = $adminMod->TotalNumberOfUsers();
echo '<br/>'.$numOfUsers;

$rows = $adminMod->QueryUserList(0, $numOfUsers, "Username", "ASC");

if( is_array($rows) )
{
	foreach( $rows as $value )
	{
		echo '<br/>'.$value['Username'];
	}
}



//END ADMIN TEST
?>