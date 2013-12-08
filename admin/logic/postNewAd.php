<?php 
session_start(); 
include 'common.php';

$user_id = $_SESSION['id_user'];
$naziv = $_SESSION['ad_naziv'];
$opis = $_SESSION['ad_opis'];
$media = $_SESSION['ad_media'];
$media = str_replace("'", "", $media);
$zemlja = 1; //za sad uvek 1 zemlja, neamo druge zemlje, za druge zemlje jos $$$
$grad = $_SESSION['ad_grad'];
$opstina = $_SESSION['ad_opstina'];
$mz = $_SESSION['ad_mz'];
$adresa = $_SESSION['ad_adresa'];
$kategorija = $_SESSION['ad_kategorija'];
$br_pregleda = 0;
$datum = date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']);
$status = 1;//ovo je da li je oglas objavljen ili ne
$cena = $_SESSION['ad_cena'];
$kvadratura = $_SESSION['ad_kvadratura'];
$vrsta = $_SESSION['ad_vrsta'];
$latlon = $_SESSION['ad_latlon'];





        $query = "INSERT INTO oglas(id_user, naziv, opis, media, id_zemlja, id_grad, id_opstina, id_mz, adresa, latlon, kategorija, br_pregleda, datum_objave, status, cena, kvadratura, f_prodaja) 
        VALUES ('$user_id', '$naziv', '$opis', '$media', '$zemlja', '$grad', '$opstina','$mz','$adresa','$latlon','$kategorija','$br_pregleda','$datum','$status','$cena','$kvadratura','$vrsta')";

        //echo $query;


     
        try {
				$db->beginTransaction();
                $db->query($query);
				
				$last_id = $db->lastInsertId();

				
				$json = $_POST['data'];
				$jsonArray = json_decode($json);
				
				//echo $jsonArray;

				foreach($jsonArray->data as $value){
					$id = $value->id;
					echo $id;
					$val = $value->val;
					$db->query("INSERT INTO oglas_atributi (id_oglas, id_atribut, vrednost) VALUES ('$last_id', '$id', '$val')");
				}   
				
				
                $db->commit();
                 echo "Uspešno ste dodali nekretninu!";

        } catch (PDOException $e) {
               
				$db->rollback();
				die("Failed to run update: " . $e->getMessage());
        }
    
        
        
?>