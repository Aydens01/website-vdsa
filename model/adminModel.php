<?php

class adminModel extends DB
{
	function send($csv){
		$tmp_name = $csv['tmp_name'];
		$tmp_name = str_replace('\\', '/', $tmp_name);
		if(($handle = fopen($tmp_name, 'r')) !== FALSE) {
			set_time_limit(0);
			
			$row = 0;
			$data0 = fgetcsv($handle, 1000, ';');
			$data0 = array_map('strtolower', $data0);
			//$af= array("code rep","code clt","cod fam","lib famille","cod sfam","lib sfam","cp cli liv","ville cli liv","date doc","vte facturées","marge %(ba)");
			//				0			1			2			3			4			5		6				7			8				9				10
			$conn = $this->DBconnect2();
			
			
			while(($data = fgetcsv($handle, 1000, ';')) !== FALSE) {
				
				// protection injections sql 
				//$data = array_map('mysql_real_escape_string ',$data); obselète ? voir pdo::quote
				
				$sth = $conn->query('SELECT codeFamille FROM familles');
				$famille_id_list = $sth->fetchAll(PDO::FETCH_COLUMN, 0);
				
				$sth = $conn->query('SELECT id_client FROM clients');
				$client_id_list = $sth->fetchAll(PDO::FETCH_COLUMN, 0);
				// ajout client
				if (!(in_array($data[1],$client_id_list))){
						if (strlen($data[6])!=5 || $data[6]<=0){
							$sql="INSERT INTO `clients`(`codePostal`, `id_client`, `ville`) VALUES (NULL,".$data[1].",NULL)";
							$conn -> exec($sql);
						}else{
							$sql="INSERT INTO `clients`(`codePostal`, `id_client`, `ville`) VALUES (".$data[6].",".$data[1].",".$data[7].")";
							$conn -> exec($sql);
						}
					}
				// ajout famille
				if (!(in_array($data[2],$famille_id_list))){
						if (strlen($data[3]>1)){
							$sql="INSERT INTO `familles`(`codeFamille`, `libelle`) VALUES (".$data[2].",".$data[3].")";
							$conn -> exec($sql);
						}else{
							$sql="INSERT INTO `familles`(`codeFamille`, `libelle`) VALUES (".$data[2].",".$data[2].")";
							$conn -> exec($sql);
						}
				}
				// ajout sous-famille need query
				$sth = $conn->query('SELECT codeSousFamille FROM sousFamilles WHERE codeFamille="'.$data[2].'"');
				$sousfamille_id_list = $sth->fetchAll(PDO::FETCH_COLUMN, 0);
				if (!(in_array($data[4],$sousfamille_id_list))){
						if (strlen($data[5]>1)){
							$sql="INSERT INTO `sousFamilles`(`codeSousFamille`, `codeFamille`, `libelle`) VALUES (".$data[4].",".$data[2].",".$data[5].")";
							$conn -> exec($sql);
						}else{
							$sql="INSERT INTO `sousFamilles`(`codeSousFamille`, `codeFamille`, `libelle`) VALUES (".$data[4].",".$data[2].",NULL)";
							$conn -> exec($sql);
						}
				}
				// transformer ville cp en NULL si c'est trop court
				if (strlen($data[6])!=5 || $data[6]<=0){
						$ville="NULL";
						$cp="NULL";
					}else{
						$ville=$data[7];
						$cp=$data[6];
				}
				//transformer d/m/y en format date sql
				$dateOrig = $data[8];
				$Date = DateTime::createFromFormat('d/m/Y', $dateOrig, new DateTimeZone(('UTC')));
				$date = $Date->format('Y-m-d');
				// ajout commande
				$sql="INSERT INTO `commandes`(`id_client`, `id_vendeur`, `date`, `marge`, `ville`, `codePostal`, `CA`, `codeFamille`, `codeSousFamille`) VALUES (".$data[1].",".$data[0].",".$date.",".$data[10].",".$ville.",".$cp.",".$data[9].",".$data[2].",".$data[4].")";
				$conn -> exec($sql);
				$row++;
			}
			$sth = null;
			$conn = null;
			fclose($handle);
		}
	
	}
	
	function verify($csv){
		$name = $csv['name'];
		$ext = explode('.',$name)[1];
		$tmp_name = $csv['tmp_name'];
		$tmp_name = str_replace('\\', '/', $tmp_name);
		
		if ($csv['type']=='application/vnd.ms-excel' && $ext === "csv"){
			if(($handle = fopen($tmp_name, 'r')) !== FALSE) {
				set_time_limit(0);
				
				// verifies that all the fields are there
				$row = 0;
				$data0 = fgetcsv($handle, 1000, ';');
				$data0 = array_map('strtolower', $data0);
				
				//acceptable fields array
				$af= array("code rep","code clt","cod fam","lib famille","cod sfam","lib sfam","cp cli liv","ville cli liv","date doc","vte facturées","marge %(ba)");
				
				
				if (count($data0)!=11 &&!(in_array($data0[0],$af)&& in_array($data0[1],$af)&& in_array($data0[2],$af)&& in_array($data0[3],$af)&& in_array($data0[4],$af)&& in_array($data0[5],$af)&& in_array($data0[6],$af)&& in_array($data0[7],$af)&& in_array($data0[8],$af)&& in_array($data0[9],$af)&& in_array($data0[10],$af))){
					echo "\nbad field";
					echo "\n".count($data);
					return false;
				}
				
				// verifies that every command has an identified trader
				$conn = $this->DBconnect2();
				
				$sth = $conn->query('SELECT id_vendeur FROM users WHERE role="trader"');
				$trader_id_list = $sth->fetchAll(PDO::FETCH_COLUMN, 0);
				
				$sth = null;
				$conn = null;
				
				while(($data = fgetcsv($handle, 1000, ';')) !== FALSE) {
					
					$col_count = count($data);

					if (!(in_array($data[0],$trader_id_list))){
						echo "\nbad trader";
						return false;
					}

					$row++;
				}
				fclose($handle);
				return true;
			}
		}else{
			echo "\nbad csv type";
			return false;
		}
	}
	function get_info(){
		$conn = $this->DBconnect2();
		$sth = $conn->query('SELECT * FROM users ORDER BY id');
		$info = $sth->fetchAll();
		$sth = null;
		$conn = null;
		return ($info);
		
	}
	function delete($mail){
		$conn = $this->DBconnect2();
		$sql="DELETE FROM users WHERE email=".$mail;
		$conn -> exec($sql);
		$sth = null;
		$conn = null;
	}
}
