<?php
	include 'header.php';
?>

<div class="container">
	<div id="LoginField">
			<center><h2>Please enter your account information</h2></center>
			<form name="input" action="html_form_action.asp" method="get">
			<h4>Username:<input type="text" name="username"><br><br><br><br>
			Password:<input type="password" name="password">
			</h4>
			<center><input type="submit" value="Submit"></center></form>
	</div>
		
	<div id="register">
			<h2><center>Need an account?</center></h2>
			<h3><center>Register <a href="register.html">here</a></center></h3>
	</div>
</div>

<?php
	include 'footer.php';
?>