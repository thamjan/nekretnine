<?php

$ok = false;
$error = 'Popunite sva polja!';
$update = '';
$query = '';

try {
    $p = $_POST['p'];
	$naziv = @$_POST['naziv'];
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
			$query = "SELECT naziv_kategorije FROM kategorije WHERE naziv_kategorije=:naziv";
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
			$query = "SELECT naziv_atributa FROM atributi WHERE naziv_atributa=:naziv AND tip=:tip";
			$update = "INSERT INTO atributi (naziv_atributa, tip) VALUES(:naziv, :tip)";
			$ok = true;
		}
        break;
        
    default :
        break;
}

if($ok) {
	try {
		$stmt = $db->prepare($query);
		$result = $stmt->execute($update_params);
		if($stmt->fetch() == NULL) {
			//console.log('xxxx');
			$stmt2 = $db->prepare($update);
			$result2 = $stmt2->execute($update_params);
			echo 'Uspešno dodato!'; 
			}
		else {
			echo "Stavka: $naziv već postoji!";
		}
	} catch (PDOException $e) {
		die("Failed to run update: " . $e->getMessage());
	}
}
else {
	echo $error;
}

?>
