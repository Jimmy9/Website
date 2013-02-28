<?php
  include 'header.php';
?>

       <!--User Information-->
<table border="5" width=1000 cellpadding="4" cellspacing="3">
	<tr>
		<th colspan="6"><br><h2>User Information </h2>
		</th>
	</tr>
	<tr>
	<th>Username</th>
	<th>Email</th>
	<th>Last Logged In</th>
	<th>Password</th>
	<th># of Files Uploaded</th>
	<th>Permission</th>
	</tr>
	<tr align="center">


	<div style=’height: 200px; overflow: auto;’> 
		<td class ="usernamecell" width= 300;> 
			<form>
				<input type="checkbox" name="username"> username
			</form>	
		</td>	
	<div style=’height: 200px; overflow: auto;’> 	
		<td class="emailcell" width= 200> email@gmail.com </td>
	<div style=’height: 200px; overflow: auto;’> 	
		<td class="lastloggedincell" width= 150> 2013-02-28 T 11:20 EST </td>
	<div style=’height: 200px; overflow: auto;’> 	
		<td class="passwordcell" width= 150> passw0rd </td>
	<div style=’height: 200px; overflow: auto;’> 	
		<td class="numfilecell" width= 100> 25 </td>
	<div style=’height: 200px; overflow: auto;’> 	
		<td class="permissioncell" width= 100>
			<select name="txn" tabindex="3" id="txn" class="fixed" onfocus="highlightInput(this.id)" onblur="unhighlightInput(this.id)">
			<option value="Admin" my="{{txn|genselected:"Admin"|safe}>Admin</option>
			<option value="User" my="{{txn|genselected:"User"|safe}}>User</option>
			</select> </td>
	<div style=’height: 200px; overflow: auto;’> 	
	</tr>
</table>

     <!--Admin Options-->
<table id="adminoptions" border="3" align="right" >
    <thead>
      <tr>
          <th><h3>Admin Options</h3></th>
      </tr>
    </thead>
    <tbody>
       <tr> 
           <td>
               <form name="f2" action="javascript:select();" >
                <input id="edit" type="submit" name="edit" value="   Edit   " />
				<input id="delete" type="submit" name="delete" value="  Delete  " />
				<input id="delete" type="submit" name="delete" value="  Add  " />
               </form>
           </td>
      </tr>
   </tbody>
</table>

<?php
	include 'footer.php';
?>