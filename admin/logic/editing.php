<?php

try {
    $p = $_POST['p'];
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}

include_once './common.php';

switch ($p) {
    // promena kategorija
    case '10':
		$update_params = array(
		':id' => @$_POST['id'],
		':noviNaziv' => @$_POST['noviNaziv']
		);
		$update = "UPDATE kategorije SET naziv_kategorije=:noviNaziv WHERE id_kategorije=:id";
        break;
	// promena atributa	
    case '11':
        
		$update_params = array(
		':id' => @$_POST['id'],
		':noviNaziv' => @$_POST['noviNaziv']
		);
		$update = "UPDATE atributi SET naziv_atributa=:noviNaziv WHERE id_atributa=:id";
        break;
        
    default :
        break;
}


try {
    $stmt = $db->prepare($update);
    $result = $stmt->execute($update_params);
	echo 'Uspešno promenjeno!';
} catch (PDOException $e) {
    die("Failed to run update: " . $e->getMessage());
}

?>
