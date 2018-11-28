<?php

class DB {
	public function test(){
		
		$conn = $this->DBconnect();
		$sth = $conn->query('SELECT * FROM users');
		while ($row = $sth->fetch()){
			echo $row['name'] . "</br>";
		}
		$sth = null;
		$conn = null;
	}
    protected function DBconnect(){
	    try{
            $db = new PDO('mysql:host=mysql-parauemman.alwaysdata.net;dbname=parauemman_vdsa;charset=utf8', '166296_root', 'Nellatrax162');
		}catch (PDOException $e) {
            $errorMessage = $e->getMessage();
            require(Path::view(array('errorView.php')));
        }
        return $db;
    }
}