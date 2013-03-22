<?php
  include 'header.php';
    //if the user is not logged in then it will redirect them to the login page
    if(!$userMod->IsUserLoggedIn()){
        header("location: login.php?action=loginError");
    }
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
            <th>Last Logged In</th>
            <th>Password</th>
            <th># of Files Uploaded</th>
            <th>Permission</th>
            </tr>
            <tr align="center">


                    <td class ="usernamecell" width= 300;> 
                            <form>
                                    <input type="checkbox" name="username"> username
                            </form>	
                    </td>	
                    <td class="emailcell" width= 200> email@gmail.com </td>
                    <td class="lastloggedincell" width= 150> 2013-02-28 T 11:20 EST </td>
                    <td class="passwordcell" width= 150> password </td>
                    <td class="numfilecell" width= 100> 25 </td>
                    <td class="permissioncell" width= 100>
                        <select name="txn" tabindex="3" id="txn" class="fixed" onfocus="highlightInput(this.id)" onblur="unhighlightInput(this.id)">
                            <option value="Admin" my="{{txn|genselected:"Admin"|safe}>Admin</option>
                            <option value="User" my="{{txn|genselected:"User"|safe}}>User</option>
                        </select> 
                    </td>
            </tr>
    </table>
</dv>
<?php
	include 'footer.php';
?>