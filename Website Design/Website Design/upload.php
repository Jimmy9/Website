<?php
    include 'header.php';
    //if the user is not logged in then it will redirect them to the login page
    if(!$userMod->IsUserLoggedIn()){
        header("location: login.php?action=loginError");
    }
?>

<div class="container">
	<div id="upload">
		<center><h2>Please choose your file to upload</h2></center>
		<table align="center" width="40%" border=2 cellpadding=2 cellspacing=4 style="page-break-before: always">
		<tr>
			<td width=40% bgcolor="#ffffff">
			<form id="uploadarea">
				File Name: <input type="text" name="filename"><br><br>
				File Location: <name="file" method="post" enctype="multipart/form-data">
				<input type="file" name="fileaddress" size="40"><br><br>
				Make this file public: <input type="checkbox" name="public"><br><br>
				<center><input type="submit" name="submit"></center>
			</form>
			</td>
		</tr>
	</div>
</div>

<?php
	include 'footer.php';
?>