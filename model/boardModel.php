<?php
/**
 * boardModel.php -- boardModel class
 * 
 * @author Leroux Louis-Clément
 * @date 09.12.2018
 * @description
 *  Recupere les données nécessaire dans la BDD en fonction des valeurs du formulaire
 * @TODO
 * @FIXME
 */

class boardModel extends DB
{

    function dataGraph(){

        $client = 0;
        $famille = 0;
        $sousFamille = 0;
        $condition = 0;

        $conn = $this->DBconnect();
        $r = 'SELECT MONTH(date), YEAR(date),';

        if ($_POST["margeCA"] == 'CA') {
            $r = $r . " SUM(CA) "; 
        } else {
            $r = $r . " SUM(marge) ";
        }

        $r = $r . 'FROM commandes';


        if ($_POST["client"] != "" || $_POST["famille"] != 0 || $_POST["sousFamille"] != 0){

            $r = $r . ' WHERE';
        
            if ($_POST["client"] != "") {
                
                $r = $r . ' id_client = :idClient';
                $client = 1;
                $condition = 1;
            }
            if ($_POST["famille"] != 0) {

                if ($condition == 1){

                    $r = $r . ' AND';
                }
                $r = $r . ' codeFamille = :codeFamille';
                $famille = 1;
                $condition = 1;
            }
            if ($_POST["sousFamille"] != 0) {

                if ($condition == 1){

                    $r = $r . ' AND';
                }
                $r = $r . ' codeSousFamille = :codeSousFamille';
                $sousFamille = 1;
                $condition = 1;
            }
        }
        
        $r = $r . ' GROUP BY MONTH(date), YEAR(date);';
        
        $req = $conn->prepare($r);
        //$req->bindParam(':idVendeur', $_POST["vendeur"]);

        if ($client == 1){
            $req->bindParam(':idClient', $_POST["client"]);
        }
        if ($famille == 1){
            $req->bindParam(':codeFamille', $_POST["famille"]);
        }
        if ($sousFamille == 1){
            $req->bindParam(':codeSousFamille', $_POST["sousFamille"]);
        }
        


        //$req = $conn->query('SELECT * FROM users');
        $req->execute();

        /*
        // Ajouter AND id_vendeur = :idVendeur
        // Avec l'user
        $fam = 'SELECT MONTH(date), YEAR(date), SUM(CA)
                FROM commandes WHERE
                id_client = :idClient
                AND codeFamille = :codeFamille
                AND codeSousFamille = :codeSousFamille
                GROUP BY MONTH(date), YEAR(date);';
        $req = $conn->prepare($fam);
        //$req->bindParam(':idVendeur', $_POST["vendeur"]);
        $req->bindParam(':idClient', $_POST["client"]);
        $req->bindParam(':codeFamille', $_POST["famille"]);
        $req->bindParam(':codeSousFamille', $_POST["sousFamille"]);
        $req->execute();
        */
        echo json_encode($req->fetchAll(PDO::FETCH_ASSOC));

        /*
            SELECT MONTH(date), YEAR(date), SUM(CA) FROM commandes WHERE
            id_vendeur = 0
            AND id_client = 'D00639'
            AND codeFamille = 20
            AND codeSousFamille = 3
            GROUP BY MONTH(date), YEAR(date);
        */
    }

    function familleSousFam(){

        $conn = $this->DBconnect();

        if($_POST["famille"] == 0){
            $fam = 'SELECT * FROM sousFamilles';
            $req = $conn->query($fam);
        } else {
            $fam = 'SELECT * FROM sousFamilles WHERE codeFamille = :codeFamille';
            $req = $conn->prepare($fam);
            $req->bindParam(':codeFamille', $_POST["famille"]);
            $req->execute();
        }
        
        echo json_encode($req->fetchAll(PDO::FETCH_ASSOC));
       
    }

    function clientAnneeN($annee){

        $conn = $this->DBconnect();
        
        $r = 'SELECT COUNT(DISTINCT id_client) FROM commandes WHERE YEAR(date) = :annee';
        $req = $conn->prepare($r);
        $req->bindParam(':annee', $annee);
        $req->execute();
        
        if ($req != null) {
            while ($row = $req->fetch()) {
                $output[]=$row;
            }
        }else{
            $output = array(array('FAIL'));
        }
        $req = null;
        $conn = null;

        return $output;
    }

    function margeCATotal($annee){

        $conn = $this->DBconnect();
        
        $r = 'SELECT SUM(CA), SUM(marge) FROM commandes WHERE YEAR(date) = :annee';
        $req = $conn->prepare($r);
        $req->bindParam(':annee', $annee);
        $req->execute();
        
        if ($req != null) {
            while ($row = $req->fetch()) {
                $output[]=$row;
            }
        }else{
            $output = array(array('FAIL'));
        }
        $req = null;
        $conn = null;

        return $output;
    }

    function dataGeo(){

        $client = 0;
        $famille = 0;
        $sousFamille = 0;
        $condition = 0;

        $conn = $this->DBconnect();

        $r = 'SELECT ville, codePostal, SUM(marge), SUM(CA) FROM commandes';


        if ($_POST["client"] != "" || $_POST["famille"] != 0 || $_POST["sousFamille"] != 0){

            $r = $r . ' WHERE';
        
            if ($_POST["client"] != "") {
                
                $r = $r . ' id_client = :idClient';
                $client = 1;
                $condition = 1;
            }
            if ($_POST["famille"] != 0) {

                if ($condition == 1){

                    $r = $r . ' AND';
                }
                $r = $r . ' codeFamille = :codeFamille';
                $famille = 1;
                $condition = 1;
            }
            if ($_POST["sousFamille"] != 0) {

                if ($condition == 1){

                    $r = $r . ' AND';
                }
                $r = $r . ' codeSousFamille = :codeSousFamille';
                $sousFamille = 1;
                $condition = 1;
            }
        }        

        $r = $r . ' GROUP BY ville, codePostal;';
        $req = $conn->prepare($r);
        //$req->bindParam(':idVendeur', $_POST["vendeur"]);

        if ($client == 1){
            $req->bindParam(':idClient', $_POST["client"]);
        }
        if ($famille == 1){
            $req->bindParam(':codeFamille', $_POST["famille"]);
        }
        if ($sousFamille == 1){
            $req->bindParam(':codeSousFamille', $_POST["sousFamille"]);
        }
        
        $req->execute();
        echo json_encode($req->fetchAll(PDO::FETCH_ASSOC));
       
    }

    function test(){
        $conn = $this->DBconnect();
		$sth = $conn->query('SELECT * FROM users');
		while ($row = $sth->fetch()){
			echo $row;
		}
		$sth = null;
		$conn = null;
    }

    function famille(){

        $conn = $this->DBconnect();
        $response = $conn->query('SELECT * FROM familles');
        if ($response != null) {
            while ($row = $response->fetch()) {
                $output[]=$row;
            }
        }else{
            $output = array(array('FAIL'));
        }
        $response = null;
        $conn = null;

        return $output;
    }

    function sousFamille(){

        $conn = $this->DBconnect();
        $response = $conn->query('SELECT * FROM sousFamilles');
        if ($response != null) {
            while ($row = $response->fetch()) {
                $output[]=$row;
            }
        }else{
            $output = array(array('FAIL'));
        }
        $response = null;
        $conn = null;

        return $output;
    }
}
