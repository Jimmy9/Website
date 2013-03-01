<?php

/**
 * This module handles the commands the admin
 * will be able to use to control users and 
 * their files. 
 *
 * All of these functions will check 
 * admin creditentials before proceeding
 *
 **/

class AdminUserModule
{

	/**
	 * Changes a username from one username to another.
	 * This will notify the user of the username change, and the new username.
	 * 
	 * @param string $oldUsername the current name of the user
	 * @param string $newUsername the name the user will have after it is changed
	 *
	 * @return bool returns false if the name could not be changed
	 *
	 */
	function ChangeUsername($oldUsername, $newUsername)
	{
	
	}
	
	/**
	 * Changes the password of a given user. This will notify the
	 * user of a password change.
	 * 
	 * @param string $username The name of the user who password will be changed.
	 * @param string $newPassword The new password for the user.
	 *
	 * @return bool Returns false is the change failed for some reason
	 *
	 */
	function ChangePassword($username, $newPassword)
	{
	
	}
	
	/**
	 *
	 * Changes the email of the give user. Will notify both emails of the change.
	 *
	 * @param string $username The name of the user who email will be changed.
	 * @param string $newEmail The new email address the user will have set.
	 *
	 * @return bool Return false if the email could not be changed
	 */
	function ChangeEmail($username, $newEmail)
	{
	
	}
	
	/**
	 *
	 * Changes the real name of the given user. The user will be notified
	 * of the name change
	 *
	 * @param string $username The name of the user who real name will be changed.
	 * @param string $newName The new real name of the user.
	 *
	 * @return bool Return false if the real name could not be changed.
	 *
	 */
	function ChangeName($username, $newName)
	{
	
	}
	
	/**
	 * Will not specify until we declare what Delete user will require
	 */
	function DeleteUser()
	{
	
	}
	
	/**
	 * Grabs the entry for given user
	 *
	 * @param $user the user we wish to view
	 * 
	 * @return the complete entry of user
	 */
	function ViewUser($user)
	{
	
	}

	/**
	 * Grabs the total number of users in the database
	 *
	 * @return int of number of users
	 */
	function TotalNumberOfUsers()
	{
	
	}
	
	/**
	 *  Grabs an array of users from a given a range.
	 * 
	 * @param int $startRange starting location of the query
	 * @param int $endRange ending location of the query
	 * @param string $sortType Type of sorting? (Name, Email)
	 *
	 * @return returns the list of users.
	 *
	 */
	function QueryUserList($startRange, $endRange, $sortType)
	{
	
	}
} 
class AdminFileModule
{
	function EditFileOwner()
	{
	
	}
	
	function ChangeFilePermissions()
	{
	
	}
	
	function EditFilename()
	{
	
	}
	
	function EditFileLocation()
	{
	
	}
	
	Function DeleteFile()
	{
	
	}
	
	Function ViewFile()
	{
	
	}
	
	Function GetUserFileList()
	{
	
	}
	
	Function AddFileToUser()
	{
	
	}
	
	
}

?>