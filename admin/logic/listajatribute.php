<?php 
session_start(); 
include 'common.php';

$id = $_POST['id'];

	$query = "SELECT atributi.id_atributa as id, atributi.naziv_atributa as naziv, '1' as status FROM atributi left join kategorije_atributi on kategorije_atributi.id_atributa = atributi.id_atributa where kategorije_atributi.id_kategorije = '$id' ORDER BY sorting_index";

$odgovor = array(); 
	
	try {
	$stmt = $db->prepare($query);
	$result = $stmt->execute();
	} catch (PDOException $ex) {
		die("Failed to run query: " . $ex->getMessage());
		}
	while (($row = $stmt->fetch()) != NULL) {
		$odgovor[] = $row;
	}
	
	$rest = "SELECT atributi.id_atributa as id, atributi.naziv_atributa as naziv, '0' as status
			FROM atributi
			WHERE id_atributa NOT 
			IN (
				SELECT id_atributa
				FROM kategorije_atributi
				WHERE kategorije_atributi.id_kategorije = '$id'
			)";

	try {
	$stmt = $db->prepare($rest);
	$result = $stmt->execute();
	} catch (PDOException $ex) {
		die("Failed to run query: " . $ex->getMessage());
		}
	while (($row = $stmt->fetch()) != NULL) {
		$odgovor[] = $row;
	}
			
	echo json_encode($odgovor);
	
?>
