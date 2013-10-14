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
                                    <th scope="col">Broj oglasa</th>
                                    <th scope="col" style="width: 44px;"></th>
                                </tr>
                            </thead>

                            <?php
                            include './logic/common.php';
                            $query = '
								SELECT DISTINCT k.naziv_kategorije AS ime, COUNT(o.kategorija) AS broj_oglasa
								FROM kategorije k
								LEFT JOIN oglas o ON o.kategorija = k.id_kategorije
								GROUP BY k.naziv_kategorije
								ORDER BY k.naziv_kategorije ASC
							';
								


                            try {
                                $stmt = $db->prepare($query);
//                            $result = $stmt->execute($query_params);
                                $result = $stmt->execute();
                            } catch (PDOException $ex) {
                                die("Failed to run query: " . $ex->getMessage());
                            }

                            while (($row = $stmt->fetch()) != NULL) {
//                                    echo '<br />row[ime]' . $row['Opstina'];
                                echo '
                                    <tr>
                                        <td class="align-center" id="tdNaziv">' . $row['ime'] . '</td>
                                        <td class="align-center">' . $row['broj_oglasa'] . '</td>';
								?>
                                
                                            <td>
                                                <a href="#" class="table-icon edit" title="Edit"></a>
                                                <a href="#" class="table-icon delete" title="Delete"></a>
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
