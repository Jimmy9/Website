<?php
require('DatabaseModule.php');
require('RegistrationModule.php');

//START DB TEST
$dbMod = new DatabaseModule();
$connection = $dbMod->connect();
if($connection == false){
	echo "<p> Not Connected to the database </p>";
}else{
	echo "Connected to the database";
}
//END DB TEST

//START RegistrationModule TEST
echo "<p>Creating registration Module</p>";
$regMod = new RegistrationModule($connection);
echo "<p>Registration Module Created</p>";
echo "<p>Testing Input Name</p>";
if(!($regMod->InputName("",""))){
	echo "<p>1/4 Input Name test success</p>";
}
if(!($regMod->InputName("First",""))){
	echo "<p>2/4 Input Name test success</p>";
}
if(!($regMod->InputName("","Last"))){
	echo "<p>3/4 Input Name test success</p>";
}
if($regMod->InputName("First","Last")){
	echo "<p>4/4 Input Name test success</p>";
}
echo "<p>Finished testing Input Name, Make sure all 4 tests passed</p>";
echo "<p></p>";



echo "<p>Testing Input Username</p>";
if(!($regMod->InputUsername(""))){
	echo "<p>1/3 Null username test sucess</p>";
}
if(!($regMod->InputUsername("trc202"))){
	echo "<p>2/3 existing user test passed</p>";
}
if(($regMod->InputUsername("workingPW"))){
	echo "<p>3/3 new user test passed</p>";
}
echo "<p>Finished testing Input Username, Make sure all 3 tests passed</p>";
echo "<p></p>";

echo "<p>Testing Input Password</p>";
if(!($regMod->InputPassword("", ""))){
	echo "<p>1/3 Null password test sucess</p>";
}
if(!($regMod->InputPassword("different", "passwords"))){
	echo "<p>2/3  password test sucess</p>";
}
if(($regMod->InputPassword("thisisworkingtest", "thisisworkingtest"))){
	echo "<p>3/3  password test sucess</p>";
}
echo "<p>Finished testing password</p>";
echo "<p></p>";
echo "<p>Testing email input</p>";
if(!($regMod->InputEmail("",""))){
	echo "<p>1/3 email test sucess</p>";
}
if(!($regMod->InputEmail("test","1234"))){
	echo "<p>2/3 email test sucess</p>";
}
if(($regMod->InputEmail("trc202@gmail.com","trc202@gmail.com"))){
	echo "<p>3/3 email test sucess</p>";
}
echo "<p>Finished email input</p>";
echo "<p></p>";

echo "Testing send confirmation";
if($regMod->RequestConfirmation()){
	echo "<p> Sending confirmation successfull </p>";
}
echo "<p>Finished testing send confirmation</p>";
echo "<p></p>";

echo "Testing ConfirmUser";
if($regMod->ConfirmUser("8f617757fb31917da9141eb94af916ae")){
	echo "<p> Confirm User successfull </p>";
}
echo "Finished Testing ConfirmUser";