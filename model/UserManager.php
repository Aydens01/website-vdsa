<?php
/**
 * UserManager.php -- UserManager class
 * 
 * @author Parau Emmanuel
 * @date 10.11.2018
 * @description
 *  UserManager class used to update the users table on the database
 *  namely adding removing and modfying the users table.
 * @TODO
 *  everything.
 * @FIXME
 */
class UserManager extends DB {
	function updateUser($user){
		$conn = $this->DBconnect();
		$request = 'SELECT * FROM users WHERE id ="'.$user->id.'"';
		$sth = $conn->query($request);
		if ($sth != false){
			$user_info = $sth->fetch();
			  
			$conn = null;
			$sth = null;
			
			// insérer code pour màj l'utilisateur ici
			
			return true;
		}else{
				return false;
		}
	}
	
	function createUser(){
		return true;
	}
}
