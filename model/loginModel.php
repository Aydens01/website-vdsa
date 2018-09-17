<?php

class loginModel extends DB
{
	function verif($mail,$password){
		$conn = $this->DBconnect();
		$request = 'SELECT * FROM users WHERE email ="'.$mail.'"';
		$sth = $conn->query($request);
		if ($sth != false){
			$user = $sth->fetch();
			  
			$conn = null;
			$sth = null;
			  
			$hash = $user['password'];
			if (password_verify($password, $hash)) {
				return true;
			} 
			else {
				return false; //mdp non valide
			}
		}
		else{
			return false; //email non valide
		}
	}
}
