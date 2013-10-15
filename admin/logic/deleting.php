<?php

try {
    $p = $_POST['p'];
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}

include_once './common.php';
//echo 'p: ' . @$_POST['p'] . ', id: ' . @$_POST['id'];
switch ($p) {
    // brisanje kategorije
    case '10':
		$update_params = array(
		':id' => @$_POST['id']
		);
		$update = "DELETE FROM kategorije WHERE id_kategorije=:id";
        break;
	// brisanje atributa	
    case '11':
        
		$update_params = array(
		':id' => @$_POST['id']
		);
		$update = "DELETE FROM atributi WHERE id_atributa=:id";
        break;
        
    default :
        break;
}


try {
    $stmt = $db->prepare($update);
    $result = $stmt->execute($update_params);
	echo 'Uspešno izbrisano!';
} catch (PDOException $e) {
    die("Failed to run update: " . $e->getMessage());
}

?>
