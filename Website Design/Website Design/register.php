<?php 

include 'header.php';
include_once dirname(__FILE__).'\secureimage\securimage.php';

    class RegForm
    {
        var $userName = "";
        var $passowrd = "";
        var $realName = "";
        var $email = "";
        var $validCaptcha = false;
        var $isError = false;

        function grabFromSubmit($uName, $pWord, $repPWord, $email, $fName, $lName)
        {
                $this->userName = $uName;
                if($pWord == $repPWord)
                {
                        $this->password = hash('sha256', $pWord);
                }
                $this->email = $email;
                $this->realName = $fName . $lName;
        } 

        function printData()
        {
                echo $this->userName . $this->realName;
        }

    };

    $reg = new RegForm;
    $securimage = new Securimage();
    $catpchaError = null;
    $username = $password = $passwordAgain = $emial = $fname = $lname = null;


    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordAgain'])
            && isset($_POST['firstName'])  && isset($_POST['lastName'])
            && isset($_POST['email']) )	
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordAgain = $_POST['passwordAgain'];
        $emial = $_POST['email'];
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];

        if($securimage->check($_POST['captcha_code']) == true){
            $reg->grabFromSubmit($username, $password, $passwordAgain, $emial, $fname, $lname);
            $reg->printData();
        }
        else{
            $catpchaError = "The code did not match. Try Again";
        }
    }
    
    function checkIsset($str){
        if (isset($str)){
            echo $str;
        }
        else{
            return "";
        }
    }
?>

    <script type="text/javascript">
        var formError = Array();
        formError[false, false, false];
        $(document).ready(function(){
            $('#button').click(function(){
                if($('#username').val() == ""){
                    if(!formError[0]){
                        $("#username").after("<span><img src='Images/red-x.gif' alt='X'/></span>");
                    }
                    formError[0] = true;
                    return false;
                }
                if($("#password").val() != $("#passwordAgain").val() || $("#password").val() == "" || $("#passwordAgain").val() == ""){
                    if(!formError[1]){
                        $("#password").after("<span><img src='Images/red-x.gif' alt='X'/></span>");
                        $("#passwordAgain").after("<span><img src='Images/red-x.gif' alt='X'/><div style='color:red'>Passwords must match</div></span>");
                    }
                    formError[1] = true;
                    return false;
                }
                if($('#email').val() == ""){
                    if(!formError[2]){
                        $("#email").after("<span><img src='Images/red-x.gif' alt='X'/></span>");
                    }
                    formError[2] = true;
                    return false;
                }
            });
        }); 
    </script>
    <style>
    .regHeader{
        margin-left: auto; 
        margin-right: auto; 
        width:300px; 
        background-color: #E65C00; 
        padding: 10px;
        text-align: center;
        position: relative;
    }
    .regHeader:before {
        content:"";
        position:absolute;
        top:0;
        right:0;
        border-width:0 30px 30px 0;
        border-style:solid;
        border-color:#F6F6F6 #F6F6F6 #E65C00 #E65C00;
        background:#E65C00;
        -webkit-box-shadow:0 1px 1px rgba(0,0,0,0.3), -1px 1px 1px rgba(0,0,0,0.2);
        -moz-box-shadow:0 1px 1px rgba(0,0,0,0.3), -1px 1px 1px rgba(0,0,0,0.2);
        box-shadow:0 1px 1px rgba(0,0,0,0.3), -1px 1px 1px rgba(0,0,0,0.2);
        display:block; 
        width:0;
    }
    input[type=text], input[type=password]{
        border-radius: 3px;
        height: 25px;
        border: 1px solid white;
        background-color: #FAFAFA;
    }

        </style>
<div class="container">

    <br />
    <form name="RegForm" method="post" action="">
        <div class="regHeader">
            <div style="text-align:left; padding:5px; color: white; font-family: Impact, Charcoal, sans-serif; ">Register Here !<hr /></div>
            
            <p>
                    <input type="text" id="username" size="35" name="username" placeholder="Username" value="<?php checkIsset($username) ?>" />
            </p>
            <p>
                    <input type="password" id="password" size="35" name="password" placeholder="Password" value="<?php checkIsset($password) ?>" />
            </p>
            <p>
                    <input type="password" id="passwordAgain" size="35" name="passwordAgain" placeholder="Password Again" value="<?php checkIsset($passwordAgain) ?>" />
            </p>
            <p>
                    <input type="text" id="email" size="35" name="email" placeholder="Email Address" value="<?php checkIsset($emial) ?>" />
            </p>
            <p>
                    <input type="text" name="firstName" size="35" placeholder="First Name" value="<?php checkIsset($fname) ?>"/>
            </p>
            <p>
                    <input type="text" name="lastName" size="35" placeholder="Last Name" value="<?php checkIsset($lname) ?>" />
            </p>
            <br />
            <table align="center">
                <tr>
                    <td>
                        <img id="captcha" style="border: 1px solid #2F343B" src="secureimage/securimage_show.php" alt="CAPTCHA Image" />
                    </td>
                    <td>
                        <a href="#" onclick="document.getElementById('captcha').src = 'secureimage/securimage_show.php';"><img src="secureimage/Images/Refresh Icon.jpg" alt="Refresh Image"/></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Enter Code: <input type="text" name="captcha_code" size="10" maxlength="6" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="color:red">
                        <?php checkIsset($catpchaError) ?>
                    </td>
                </tr>
            </table>
            <p>
                <input type="submit" name="button" id="button" value="Submit" />
            </p>
        <div>
    </form>
</div>

<?php include 'footer.php';?>