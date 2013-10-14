<?php 
session_start(); 
include 'common.php';

$naslov = $_POST['naslov'];
$sadrzaj = $_POST['sadrzaj'];
$objavi = isset($_POST['objavi']) && $_POST['objavi']  ? "1" : "0";
$datum = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
$tip_posta = $_POST['tip_posta']; //1 vest 2 zaposlenje

	if ($tip_posta ==  1){
		$kategorija = "vesti";
	}
	else {
		$kategorija = "zaposlenje";
	}

	$query = "INSERT INTO post(id_user, text, datum_objave, status, tip) VALUES ('1', '$sadrzaj', '$datum', '$objavi', '$tip_posta')";

	$stmt = $db->prepare($query);
	$stmt->execute();
	
echo "Uspešno ste dodali post '".$naslov."' u kategoriji <b>".$kategorija."</b>";
?>
