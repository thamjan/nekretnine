<?php

try {
    $p = $_POST['p'];
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}

include_once './common.php';

switch ($p) {
    // nova kategorija
    case '10':
		$update_params = array(
		':naziv' => @$_POST['naziv']
		);
		$update = "INSERT INTO kategorije (naziv_kategorije) VALUES(:naziv)";
        break;
	// nov atribut	
    case '11':
        echo 'params: ' . @$_POST['naziv'] . ', ' . @$_POST['tip'];
		$update_params = array(
		':naziv' => @$_POST['naziv'],
		':tip' => @$_POST['tip']
		);
		$update = "INSERT INTO atributi (naziv_atributa, tip) VALUES(:naziv, :tip)";
        break;
        
    default :
        break;
}


try {
    $stmt = $db->prepare($update);
    $result = $stmt->execute($update_params);
	echo 'Uspešno dodato!';
} catch (PDOException $e) {
    die("Failed to run update: " . $e->getMessage());
}

?>
