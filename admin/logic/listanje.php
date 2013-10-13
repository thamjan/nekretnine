<?php 
session_start(); 
include 'common.php';

$id = $_POST['value'];

	$query = "SELECT opstine.id_opstina as ID_opstina, opstine.naziv as Opstina FROM opstine where opstine.id_grad = $id";
	
	try {
	$stmt = $db->prepare($query);
	$result = $stmt->execute();
	} catch (PDOException $ex) {
		die("Failed to run query: " . $ex->getMessage());
		}
	while (($row = $stmt->fetch()) != NULL) {
		echo '<option value='.$row['ID_opstina'].'>'.$row['Opstina']. '</option>';
	}


?>
