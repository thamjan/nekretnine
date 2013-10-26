<?php 
session_start(); 
include 'common.php';

$id = $_POST['value'];
$tip = $_POST['tip'];
if($tip == "1"){
	$query = "SELECT opstine.id_opstina as ID, opstine.naziv as Naziv FROM opstine where opstine.id_grad = $id";
	}
else if ($tip == "2"){
	$query = "SELECT mz.id_mz as ID, mz.naziv as Naziv FROM mz where mz.id_opstine = $id";
}	
	try {
	$stmt = $db->prepare($query);
	$result = $stmt->execute();
	} catch (PDOException $ex) {
		die("Failed to run query: " . $ex->getMessage());
		}
	while (($row = $stmt->fetch()) != NULL) {
		echo '<option value='.$row['ID'].'>'.$row['Naziv'].	 '</option>';
	}


?>
