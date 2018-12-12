<?php

class boardModel extends DB
{

    function verif(){
        $conn = $this->DBconnect();
        echo json_encode($conn->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC));
    }
    

    //$conn = new DB;
    //$a = $conn->DBconnect();
    //$sth = $a->query('SELECT * FROM users');
}
