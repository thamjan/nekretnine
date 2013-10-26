<?php 
session_start(); 
include 'common.php';

$id = $_POST['value'];
$odgovor = array(); 
	$query = "SELECT atributi.id_atributa as id, atributi.naziv_atributa as naziv, atributi.tip as tip 
			  FROM atributi 
			  left join kategorije_atributi on kategorije_atributi.id_atributa = atributi.id_atributa 
			  WHERE kategorije_atributi.id_kategorije = $id 
			  ORDER BY sorting_index";
	try {
	$stmt = $db->prepare($query);
	$result = $stmt->execute();
	} catch (PDOException $ex) {
		die("Failed to run query: " . $ex->getMessage());
		}
	while (($row = $stmt->fetch()) != NULL) {
		$odgovor[] = $row;
	}
echo json_encode($odgovor);

?>
