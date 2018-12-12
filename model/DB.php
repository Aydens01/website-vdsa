<?php
/**
 * DB.php -- DB class
 * 
 * @author Parau Emmanuel
 * @date 17.09.2018
 * @description
 *  base class to make calls to the database
 * @TODO Put the important variables in a php variable inside config.php
 * 	Move DB.php to /core/
 * @FIXME Needs the functions to display the error messages
 */
class DB {
	
	/**
     * Prints the name value of every entry in the users database
     * Used to test connection to the servers
     */
	public function test(){
		
		$conn = $this->DBconnect();
		$sth = $conn->query('SELECT * FROM users');
		while ($row = $sth->fetch()){
			echo $row['name'] . "</br>";
		}
		$sth = null;
		$conn = null;
	}
	
	/**
     * Returns a PDO object to make PDO queries on
     * 
     * @return PDO object A PDO object to make PDO queries on
     */
    protected function DBconnect(){
	    try{
            $db = new PDO('mysql:host=mysql-parauemman.alwaysdata.net;dbname=parauemman_vdsa;charset=utf8', '166296_root', 'Nellatrax162');
		}catch (PDOException $e) {
			die();
            //$errorMessage = $e->getMessage();
            //require(Path::view(array('home.php')));
        }
        return $db;
    }
}