<?php
    /*
    $conn = $this->DBconnect();
    $query = 'SELECT * FROM users';
    $result = $conn->query($query);
    while ($resultat = $result->fetch(PDO::FETCH_ASSOC))
    {
        $data["name"] = $row["name"]
    }
    */
    $conn = new DB;
    $conn->DBconnect();
    echo json_encode($conn->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC));
    /*
    $data = array(
        "freq" => $_POST["freq"],
        "margeCA" => $_POST["margeCA"],
        "famille" => $_POST["famille"],
        "sousFamille"=> $_POST["sousFamille"]
    );

    echo json_encode($data);
    */
?>