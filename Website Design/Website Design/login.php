<?php
    include 'header.php';


//
$message = "";
$username;
$password;

if (isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $loggedIn = $userMod->LoginUser($username,$password);
    if($loggedIn == true){
        header("location:  myFiles.php");
    }else{
            $message = "<p>Invalid Username or password</p>";
    }
}

?>	
<div class="container">
    <br />
     <div>
         <?php
            if(strlen($message) > 0){
                echo $message;
            }
         ?>
     </div>
     
    <form class="loginForm" name="LoginForm" method="post" action="">
        <p>
        <input type="text" name="username" placeholder="Username" />
        </p>
        <p>
        <input type="password" name="password" placeholder="Password" />
        </p>
        <p>
        <input type="submit" name="button" id="button" value="Submit" />
        </p>
    </form>
</div>

<?php
	include 'footer.php';
?>