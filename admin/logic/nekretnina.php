<?php 
session_start(); 
include 'common.php';

// echo 'nek!!';

$user_id = $_SESSION['id_user'];
$naziv = $_POST['txtNaziv'];
$opis = $_POST['txtOpis'];
$media = $_POST['hidImgList'];
$media = str_replace("'", "", $media);
$zemlja = 1; //za sad uvek 1 zemlja, neamo druge zemlje, za druge zemlje jos $$$
$grad = $_POST['opstina_grad'];
$opstina = $_POST['slOpstina'];
$mz = $_POST['slMz'];
$adresa = $_POST['ulica'];
$kategorija = $_POST['slKategorija'];
$br_pregleda = 0;
$datum = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
$status = 1;//ovo je da li je oglas objavljen ili ne
$cena = $_POST['txtCena'];
$kvadratura = $_POST['txtKvadratura'];
$vrsta = $_POST['rVrsta'];

// sad custom iz jsona
// $customs = json_decode($_POST['custom'], true );

// $latlon = $customs['lat'].",".$customs['lon'];
$latlon = $_POST['glat'].",".$_POST['glon'];

	$query = "INSERT INTO oglas(id_user, naziv, opis, media, id_zemlja, id_grad, id_opstina, id_mz, adresa, latlon, kategorija, br_pregleda, datum_objave, status, cena, kvadratura, vrsta) 
	VALUES ('$user_id', '$naziv', '$opis', '$media', '$zemlja', '$grad', '$opstina','$mz','$adresa','$latlon','$kategorija','$br_pregleda','$datum','$status','$cena','$kvadratura','$vrsta')";

	//echo $query;
	
	try {
		$stmt = $db->prepare($query);
		$stmt->execute();
		// echo "Uspešno ste dodali nekretninu!";
		// echo "Uspešno ste dodali post '".$naslov."' u kategoriji <b>".$kategorija."</b>";
	} catch (PDOException $e) {
		die("Failed to run update: " . $e->getMessage());
	}
	

$id_oglasa = mysql_insert_id();
	

		
		echo "Oglas $naziv je uspešno dodat!";
		die(); 
	
	
?>
