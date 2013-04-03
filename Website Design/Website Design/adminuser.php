<?php
	include 'header.php';
	include 'AdminModule.php';

	include_once('DatabaseModule.php');
	$dbMod = new DatabaseModule();
	$connection = $dbMod->connect();
	$adminUserMod = new AdminUserModule($connection);
    //if the user is not logged in then it will redirect them to the login page
	/*
    if(!$userMod->IsUserLoggedIn()){
        header("location: login.php?action=loginError");
    }
	*/
?>
<div class="container">
    
        <table id="adminoptions" border="0" align="center" >
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
    <br />
    
       <!--User Information-->
    <table border="5" cellpadding="4" cellspacing="3" align="center">
            <tr>
                    <th colspan="6"><br><h2>User Information </h2>
                    </th>
            </tr>
            <tr>
            <th>Username</th>
            <th>Email</th>
			<th>Full Name</th>
			<th>Password</th> 
            <th>Last Logged In</th>
            <th># of Files Uploaded</th>
            <th>Permission</th>
            </tr>
			
			<?php
			
			
			$requestedUsers = $adminUserMod->QueryUserList(0, $adminUserMod->TotalNumberOfUsers(), "", "");
			
			if ( is_array($requestedUsers) )
			{
				foreach ( $requestedUsers as $user )
				{
					echo '<tr align="center">';
					echo '<td class="usernamecell" width=300>';
					echo '<a href="#" onclick="window.open(\'editUserName.php?uname='.$user['Username'].'\', \'_blank\', \'width=200, height=200, resizable=no\' )">'.$user['Username'].'</a>';
					echo '</td>';
					echo '<td class="emailcell" width=200><a href="#" onclick="window.open( \'editUserName.php?uname='.$user['Username'].'\', \'_blank\', \'width=200, height=200, resizable=no\'  )" > '.$user['Email'].'</a></td>';
					echo '<td class="namecell" width=200><a href="#" onclick="window.open( \'editUserRName.php?uname='.$user['Username'].'\', \'_blank\', \'width=200, height=200, resizable=no\'  )" > '.$user['Name'].'</a></td>';
					echo '<td class="passwordcell" width=120><button type="pwchange" onclick="window.open( \'editUserPassword.php?uname='.$user['Username'].'\', \'_blank\', \'width=200, height=200, resizable=no\'  )">Change Password</td>'; 
					echo '</tr>';
					
				}			
			}
			
			?>
    </table>
</dv>
<?php
	include 'footer.php';
?>