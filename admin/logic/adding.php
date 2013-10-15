<?php

$ok = false;
$error = 'Popunite sva polja!';

try {
    $p = $_POST['p'];
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}

include_once './common.php';

switch ($p) {
    // nova kategorija
    case '10':
		if(@$_POST['naziv'] != '' && @$_POST['naziv'] != null) {
			$update_params = array(
			':naziv' => @$_POST['naziv']
			);
			$update = "INSERT INTO kategorije (naziv_kategorije) VALUES(:naziv)";
			$ok = true;
		}
        break;
	// nov atribut	
    case '11':
		if(@$_POST['naziv'] != '' && @$_POST['naziv'] != null && (@$_POST['tip'] == '1' || @$_POST['tip'] == '2')) {		
			$update_params = array(
			':naziv' => @$_POST['naziv'],
			':tip' => @$_POST['tip']
			);
			$update = "INSERT INTO atributi (naziv_atributa, tip) VALUES(:naziv, :tip)";
			$ok = true;
		}
        break;
        
    default :
        break;
}

if($ok) {
	try {
		$stmt = $db->prepare($update);
		$result = $stmt->execute($update_params);
		echo 'Uspešno dodato!';
	} catch (PDOException $e) {
		die("Failed to run update: " . $e->getMessage());
	}
}
else {
	echo $error;
}

?>
