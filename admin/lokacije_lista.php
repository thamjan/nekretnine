<?php $thisPage = "Lokacije"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php include_once './include/head.php'; ?>
		<script type="text/javascript" src="js/jquery.pajinate.min.js"></script>
    </head>
    <body>
        <div class="wrap">
            <?php include_once './include/header.php'; ?>
            <div id="content">
                <?php include_once './include/sidebar.php'; ?>
                <div id="main">


                    <div class="full_w">
                        <div class="h_title">Uređivanje lokacija</div>
                        <h2>Gradovi</h2>							
						<div id="gradovi-p">
							<table>
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Grad</th>
										<!--<th scope="col">Datum unosa</th>-->
										<th scope="col" style="width: 44px;"></th>
									</tr>
								</thead>
								<tbody class="content">
									<?php
									include './logic/common.php';
									$query = 'select gradovi.id_grad as ID_grad, gradovi.naziv as Grad 
										from gradovi';
		//                        $query_params = array(
		//                            ':username' => $_POST['username']
		//                        );

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
													<td class="align-center">' .
										$row['ID_grad']
										. '</td>
													<td>' .
										$row['Grad']
										. '</td>
													<td>
														<a href="#" class="table-icon edit" title="Edit"></a>
														<a href="#" class="table-icon delete" title="Delete"></a>
													</td>
												</tr>  
												';
		//                            $row = $stmt->fetch();
									}
									?>

								</tbody>
							</table>
								<div class="page_navigation pagination"></div>	
							</div>
                     
                        <div class="entry">
                            <div class="sep"></div>
                        </div>



                        <h2>Opština</h2>

						<div id="opstine-p">
                        <table>
						
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Opština</th>
                                    <th scope="col">Grad</th>
                                    <!--<th scope="col">Datum unosa</th>-->
                                    <th scope="col" style="width: 44px;"></th>
                                </tr>
                            </thead>

                            <tbody class="content">
							
                                <?php
//                                include './logic/common.php';
                                $query = 'select opstine.id_opstina as ID_opstina, opstine.naziv as Opstina,
                                    gradovi.naziv as Grad 
                                from gradovi inner join opstine on opstine.id_grad = gradovi.id_grad';
//                        $query_params = array(
//                            ':username' => $_POST['username']
//                        );

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
                                            <td class="align-center">' .
                                    $row['ID_opstina']
                                    . '</td>
                                            <td>' .
                                    $row['Opstina']
                                    . '</td>
                                        <td>' .
                                    $row['Grad']
                                    . '</td>
                                            <td>
                                                <a href="#" class="table-icon edit" title="Edit"></a>
                                                <a href="#" class="table-icon delete" title="Delete"></a>
                                            </td>
                                        </tr>  
                                        ';
//                            $row = $stmt->fetch();
                                }
                                ?>
								
                            </tbody>						
                        </table>
							<div class="page_navigation pagination"></div>	
						</div>
						
                        <div class="entry">
                            <div class="sep"></div>
                        </div>
						
                        <h2>MZ</h2>
						<div id="mz-p">
							<table>
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Naziv Mesna Zajednica</th>
										<th scope="col">Opština</th>
										<th scope="col">Grad</th>
										<!--<th scope="col">Datum unosa</th>-->
										<th scope="col" style="width: 44px;"></th>
									</tr>
								</thead>

								<tbody class="content">
									<?php
	//                                include './logic/common.php';
									$query = 'select
										mz.naziv as MZ, mz.id_mz as ID_MZ,
										opstine.naziv as Opstina,
										gradovi.naziv as Grad 
										from gradovi inner join opstine on opstine.id_grad = gradovi.id_grad inner join mz on mz.id_opstine = opstine.id_opstina';
	//                        $query_params = array(
	//                            ':username' => $_POST['username']
	//                        );

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
												<td class="align-center">' .
										$row['ID_MZ']
										. '</td>
												<td>' .
										$row['MZ']
										. '</td>
												<td>' .
										$row['Opstina']
										. '</td>
											<td>' .
										$row['Grad']
										. '</td>
												<td>
													<a href="#" class="table-icon edit" title="Edit"></a>
													<a href="#" class="table-icon delete" title="Delete"></a>
												</td>
											</tr>  
											';
	//                            $row = $stmt->fetch();
									}
									?>
								</tbody>
							</table>
							<div class="page_navigation pagination"></div>	
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
		<script>
			$(document).ready(function(){
				$('#opstine-p').pajinate({
					items_per_page : 10
				});
				$('#gradovi-p').pajinate({
					items_per_page : 10
				});
				
				$('#mz-p').pajinate({
					items_per_page : 10,
					num_page_links_to_display: 5
				});
			})
		</script>
    </body>

</html>
