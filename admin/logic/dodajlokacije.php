<?php 
session_start(); 
include 'common.php';

$name = $_POST['naziv'];
$tip = $_POST['tip'];

		switch ($tip)
		{
		case "1":
			$query = "SELECT * FROM gradovi WHERE naziv = :name";
			$error = "Uneti grad već postoji";
			$success = "INSERT INTO gradovi(naziv) VALUES('$name')";
			break;
		case "2":
			$grad = $_POST['opstina_grad'];
		    $query = "SELECT * FROM opstine INNER JOIN gradovi ON gradovi.id_grad = $grad WHERE opstine.naziv = :name";
			$error = "Uneta opstina već postoji za zadati grad";
			$success = "INSERT INTO opstine(id_grad, naziv) VALUES('$grad', '$name')";
		  break;
		case "3":
			$grad = $_POST['opstina_grad'];
			$opstina = $_POST['opstina'];
			$query = "SELECT * FROM mz INNER JOIN opstine ON mz.id_opstine = $opstina INNER JOIN gradovi ON gradovi.id_grad = opstine.id_grad WHERE mz.naziv = :name";
			$error = "Uneta MZ već postoji za zadatu opstinu i grad";
			$success = "INSERT INTO mz(id_opstine, naziv) VALUES('$opstina', '$name')";
		  break;
		default:
		  break;
		}
	
	$stmt = $db->prepare($query);

	$result = $stmt->execute(array(':name' => $name));
	
	if (($row = $stmt->fetch()) != NULL) {
		echo $error;
	}
	else {
		$dodaj = $db->prepare($success);
		$dodaj->execute();
		echo "Uspesan Unos!!!";
	}
//echo $name."  ".$tip; // success message

?>
