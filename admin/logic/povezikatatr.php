<?php 
session_start(); 
include 'common.php';

$json = json_decode($_POST['data'], true );
$kat_id = $json['id_kat'];

$lista = array();
//echo "ID KATEGORIJE JE: ".$kat_id;
	if (isset($json) && is_array($json) ) {
	
	
		$query = "INSERT INTO kategorije_atributi (id_kategorije, id_atributa, sorting_index) values ";
	
        foreach($json['atribut'] as $datarow) {
			
			
			
			$id = $datarow['id'];
			$index = $datarow['index'];
			$id_kat = $kat_id;
			
			
			
			//PISI U BAZU  
			$query = "
					INSERT INTO kategorije_atributi ( id_kategorije, id_atributa, sorting_index )
        VALUES ( '$kat_id', '$id', '$index' )
        ON DUPLICATE KEY UPDATE sorting_index = '$index'";					
					
					

			try {
				$stmt = $db->prepare($query);
				$stmt->execute();
				echo "Uspešno ste dodali ovo";
				
			} catch (PDOException $e) {
				die("Failed to run update: " . $e->getMessage());
			}  
					  
		}
	}
	
	else echo "\$json['data'] is not an array";
	
	//echo $kat_id;
	
	
	
	
?>
