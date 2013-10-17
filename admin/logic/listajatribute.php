<?php 
session_start(); 
include 'common.php';

$id = $_POST['id'];
$lista_a = "";
	$query = "SELECT * FROM atributi left join kategorije_atributi on kategorije_atributi.id_atributa = atributi.id_atributa where kategorije_atributi.id_kategorije = '$id'";
	
	try {
	$stmt = $db->prepare($query);
	$result = $stmt->execute();
	} catch (PDOException $ex) {
		die("Failed to run query: " . $ex->getMessage());
		}
	while (($row = $stmt->fetch()) != NULL) {
		$lista_a.= '<li>'.$row['naziv_atributa'].'</li>';
	}

	echo $lista_a;
?>
