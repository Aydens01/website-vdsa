<?php
/**
 * User.php -- User class
 * 
 * @author Parau Emmanuel
 * @date 10.11.2018
 * @description
 *  User class pertaining to the variables in the users table in the database
 * @TODO
 * 
 * @FIXME
 */
class User {
	
	/**
     * @param integer $id unique user id can be NULL if initialized as such
     */
	protected $id;
	
	/**
     * @param string $email user email can be NULL if initialized as such
     */
	protected $email;
	
	/**
     * @param string $password user password can be NULL if initialized as such, should be hashed
     */
	protected $password;
	
	/**
     * @param string $role user role
     */
	protected $role;
	
	/**
     * Initializes the User class
     * 
     * @param integer $id unique user id
     * @param string $email user email can be NULL if initialized as such
     * @param string $password user password ,should be hashed
     * @param string $role user role
     */

	public function __construct($id,$email,$password,$role){
		$this -> id = $id;
		$this -> email = $email;
		$this -> password = $password;
		$this -> role = $role;
	}

	/**
     * Returns the id of a User object
     * 
     * @return integer user id
     */
	public function getId(){
		return $this ->id;
	}
	
	public function getFirstName(){
		return $this ->firstname;
	}

	/**
     * Returns the email of a User object
     * 
     * @return string user email
     */
	public function getMail(){
		return $this ->email;
	}
	
	/**
     * Returns the password of a User object
     * 
     * @return string user password, hashed
     */
	public function getPassword(){
		return $this ->password;
	}
	
	/**
     * Returns the role of a User object
     * 
     * @return string user role
     */
	public function getRole(){
		return $this ->role;
	}
	
	/**
     * Setter function for the user role
     */
	protected function setRole($newRole){
		$this->role=$newRole;
	}
}