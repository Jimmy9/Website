<?php
include 'header.php';

include_once('RegistrationModule.php');
include_once('RegistrationModule.php');
include_once('DatabaseModule.php');
$dbMod = new DatabaseModule();
$connection = $dbMod->connect();
$regMod = new RegistrationModule($connection);
$result = false;

if(isset($_GET["registrationId"]))
{
    $result = $regMod->ConfirmUser($_GET["registrationId"]);    
}
?>

<?php if($result){ echo "Successfully registered";}else{echo "Invalid registration key";}?>


<?php include 'footer.php'; ?>
