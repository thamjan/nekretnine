<?php 
session_start(); 
include 'common.php';

$naslov = $_POST['naslov'];
$sadrzaj = $_POST['sadrzaj'];
$objavi = isset($_POST['objavi']) && $_POST['objavi']  ? "1" : "0";
$datum = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
$tip_posta = $_POST['tip_posta']; //1 vest 2 zaposlenje
$id_korisnika = $_SESSION['id_user'];
	if ($tip_posta ==  1){
		$kategorija = "vesti";
	}
	else {
		$kategorija = "zaposlenje";
	}

	console.log($tip_posta);
	
	$query = "INSERT INTO post(id_user, naslov, text, datum_objave, status, tip) VALUES ('$id_korisnika', '$naslov', '$sadrzaj', '$datum', '$objavi', '$tip_posta')";

	try {
		$stmt = $db->prepare($query);
		$stmt->execute();
		echo "Uspešno ste dodali post";
		//echo "Uspešno ste dodali post '".$naslov."' u kategoriji <b>".$kategorija."</b>";
	} catch (PDOException $e) {
		die("Failed to run update: " . $e->getMessage());
	}
	
	
?>
