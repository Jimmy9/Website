<?php
	include 'header.php';
?>

<div class="container">
	<div id="registration">
		<center><h2><br>Please enter your registration information:</h2></center>
		<p class="sidenotes">All fields are required.</p><br>
		<form>
		Username: <input type="text" name="username"><br>
		Password: <input type="password" name="password"><br>
		Confirm Password: <input type="password" name="confirm"><br>
		Name: <input type="text" name="name"><br>
		Email: <input type="text" name="email"><br>
		<center><input type="submit" name="submit"></center>
		</form>
	</div>
</div>

<?php
	include 'footer.php';
?>