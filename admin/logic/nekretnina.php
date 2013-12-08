<?php 
session_start(); 
include 'common.php';


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

$latlon = $_POST['glat'].",".$_POST['glon'];

$_SESSION['ad_user_id'] = $user_id;
$_SESSION['ad_naziv'] = $naziv;
$_SESSION['ad_opis'] = $opis;
$_SESSION['ad_media'] = $media;
$_SESSION['ad_zemlja'] = $zemlja;
$_SESSION['ad_grad'] = $grad;
$_SESSION['ad_opstina'] = $opstina;
$_SESSION['ad_mz'] = $mz;
$_SESSION['ad_kategorija'] = $kategorija;
$_SESSION['ad_cena'] = $cena;
$_SESSION['ad_adresa'] = $adresa;
$_SESSION['ad_kvadratura'] = $kvadratura;
$_SESSION['ad_vrsta'] = $vrsta;
$_SESSION['ad_latlon'] = $latlon;
		
	echo "sacuvano u sesiju!!!".$naziv;
?>
