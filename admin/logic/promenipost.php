<?php 
session_start(); 
include 'common.php';

$naslov = $_POST['naslov'];
$sadrzaj = $_POST['sadrzaj'];
$objavi = isset($_POST['objavi']) && $_POST['objavi']  ? "1" : "0";
$datum = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
$tip_posta = $_POST['tip_posta']; //1 vest 2 zaposlenje
$id_korisnika = $_SESSION['id_user'];
$id_posta = $_POST['id'];
	if ($tip_posta ==  1){
		$kategorija = "vesti";
	}
	else {
		$kategorija = "zaposlenje";
	}

	$query = "
		UPDATE post
		SET naslov='$naslov', text='$sadrzaj', status='$objavi'
		WHERE id_post=$id_posta
	";
	try {
		$stmt = $db->prepare($query);
		$stmt->execute();
		echo "Uspešno ste izmenili post.";
	} catch (PDOException $e) {
		die("Failed to run update: " . $e->getMessage());
	}
	
	
?>
