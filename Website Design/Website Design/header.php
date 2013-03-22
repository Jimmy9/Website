<?php
require('UserModule.php');
require('DatabaseModule.php');
    $loginBar;
    $loginError = "";
    $dbMod = new DatabaseModule();
    $connection = $dbMod->connect();
    $userMod = new UserModule($connection);
    
    if(isset($_POST['action'])){
        if ($_POST['action'] == "logout"){
            $userMod->LogoutUser();
        }
    }
    if((isset($_GET['action']))){
        if($_GET['action'] == "loginError"){
            $loginError = "You must be logged in to access that page";
        }
    }
    
    if($userMod->IsUserLoggedIn()){
        $loginBar = "<span style='padding: 5px;'><b>Welcome, ". $userMod->GetUserName()." ! <a href='#' onclick='document.logout.submit();'>(logout)</a></b></span>";
    }
    else{
        $loginBar = "";
    }

?>
<html>
<head>
    <title>Discourse Analysis - Welcome!</title>
    <link rel="stylesheet" href="stylesheet.css" type="text/css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</head>
<body>
    <div id="header">
        <img src="logo.jpg" height="200" width="80%" alt="Logo" />
        <div id="menu">
            <ul id="navigation">
                <li><a class="navButton" href="home.php">Home</a></li>
                <li><a class="navButton" href="upload.php">Upload to Workspace</a></li>
                <li><a class="navButton" href="myFiles.php">My Files</a></li>
                <li>
                    <a class="navButton" href="adminuser.php">Administrative Options</a>
                    <ul>
                        <li><a class="navButton" href="adminuser.php">File Options</a></li>
                        <li><a class="navButton" href="adminuser.php">User Options</a></li>
                    </ul>
                </li>
                <li>
                    <a class="navButton" href="">Login / Register</a>
                    <ul>
                        <li><a class="navButton" href="login.php">Login</a></li>
                        <li><a class="navButton" href="register.php">Register</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="triangle-l"></div>
        <div class="triangle-r"></div>
    </div>
    <div class="loginBar">
        <form style="padding-bottom: -2px"name="logout" id="logout" action="login.php" method="post">
            <input type="hidden" name="action" value="logout"></input>
        <?php   
            echo $loginBar;
        ?>
            <br />
        </form>
        <div style="text-align: left; padding-left: 10px; color:red; font-weight: bold">
            <?php 
                echo $loginError;
            ?>
        </div>
    </div>