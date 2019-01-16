<?php

class loginModel extends DB
{
	function verif($email,$password){
		// $token = '' ; 
		$conn = $this->DBconnect();
		//$email = $conn->quote($email);
		$request = 'SELECT * FROM users WHERE email ="'.$email.'"';
		$sth = $conn->query($request);
		if ($sth != false){
			$user_info = $sth->fetch();
			
			$conn = null;
			$sth = null;
			
			$hash = $user_info['password'];
			if (password_verify($password, $hash)) {
				$user = new User($user_info['id'],$user_info['email'],$user_info['password'],$user_info['role']);
				$_SESSION['user']=$user;
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
