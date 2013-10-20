<?php $thisPage = "Nekretnine"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php include_once './include/head.php'; ?>
		<script type="text/javascript" src="js/editing.js"></script>
		<style>
			.cellEditing {
				background-color: aqua;
			}
			
		</style>
    </head>
    <body>
		<div class="tranparentOverlay">
		</div>
		<div class="editWindow">
			<form id="formEdit">				
				<label style="color: black;">Naziv</label><br />						
				<input type="text" id="txtEditNaziv" value="initialValue"/>						
				<button type="submit" id="btnEditSubmit">Sačuvaj</button>						
			</form>
		</div>
		<div class="deleteWindow">
			<form id="formDelete">
				<label style="color: black;">Obrisati izabranu stavku?</label>			
				<button id="btnDeleteYes">Da</button>											
				<button id="btnDeleteNo">Ne</button>						
			</form>
		</div>
        <div class="wrap">
            <?php include_once './include/header.php'; ?>
            <div id="content">
                <?php include_once './include/sidebar.php'; ?>
                <div id="main">


                    <div class="full_w">
                        <div class="h_title">Uređivanje atributa</div>
                        <h2>Atributi</h2>
						
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col">Naziv</th>
									<th scope="col">Tip</th>
                                    <th scope="col">Broj oglasa</th>
                                    <th scope="col" style="width: 44px;"></th>
                                </tr>
                            </thead>

                            <?php
                            include './logic/common.php';
                            $query = '
								SELECT a.id_atributa as id, a.naziv_atributa AS ime, a.tip as tip, COUNT(oa.id_oglas) AS broj_oglasa
								FROM atributi a, oglas_atributi oa
								WHERE oa.id_atribut = a.id_atributa
								GROUP BY a.id_atributa
								ORDER BY COUNT(oa.id_oglas) DESC
							';


                            try {
                                $stmt = $db->prepare($query);
                                $result = $stmt->execute();
                            } catch (PDOException $ex) {
                                die("Failed to run query: " . $ex->getMessage());
                            }

                            while (($row = $stmt->fetch()) != NULL) {
								if($row['tip'] === '2') {
									$tip_attr = 'Opis';
								}
								else if($row['tip'] === '1'){
									$tip_attr = 'Ima/Nema';
								}
                                echo '
                                    <tr>
                                        <td class="align-center" id="tdNaziv' . $row['ime']  . '">' . $row['ime'] . '</td>
										<td class="align-center" id="tdTip' . $tip_attr  . '">' . $tip_attr . '</td>
                                        <td class="align-center">' . $row['broj_oglasa'] . '</td>';
								?>
                                
                                            <td>
                                                <a 	href="#" 
													class="table-icon edit" 
													idTu="<?php echo $row['id']; ?>" 
													naz="<?php echo $row['ime']; ?>"
													par="11"
													title="Edit">
												</a>
												<a 	href="#" 
													class="table-icon delete" 
													idTu="<?php echo $row['id']; ?>" 
													naz="<?php echo $row['ime']; ?>"
													par="11"
													title="Delete">
												</a>                                           
                                            </td>
                                 </tr>  
                                        
                            
							<?php
							}
                            ?>

                            </tbody>
                        </table>
                        <div class="entry">
                            <div class="pagination">
                                <span>« First</span>
                                <span class="active">1</span>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <span>...</span>
                                <a href="#">23</a>
                                <a href="#">24</a>
                                <a href="#">Last »</a>
                            </div>
                        </div>

                        <div class="entry">
                            <div class="sep"></div>
                        </div>
                    </div>
                </div>	
            </div>

            <div id="footer">

            </div>
        </div>

    </body>

</html>
