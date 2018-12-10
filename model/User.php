<?php

class User {
	private $id='';
	private $email='';
	private $password='';
	private $role = 'guest';
	
	public function __construct($id,$email,$password,$role){
		$this -> id = $id;
		$this -> email = $email;
		$this -> password = $password;
		$this -> role = $role;
	}
	
	public function getId(){
		return $this ->id;
	}
	
	public function getMail(){
		return $this ->email;
	}
	
	public function getPassword(){
		return $this ->password;
	}
	
	public function getRole(){
		return $this ->role;
	}
	
	protected function setRole($newRole){
		$this->role=$newRole;
	}
	
}