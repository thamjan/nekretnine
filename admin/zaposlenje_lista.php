<?php $thisPage = "Vesti"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php include_once './include/head.php'; ?>
		<script type="text/javascript" src="js/post.js"></script>
    </head>
    <body>
		<div class="tranparentOverlay">
		</div>
		<div class="deleteWindow">
			<form id="formDelete">
				<label style="color: black;">Obrisati izabranu stavku?</label>			
				<button id="btnDeleteYes">Da</button>											
				<button id="btnDeleteNo">Ne</button>						
			</form>
		</div>
        <div class="wrap">
            <?php include './include/header.php'; ?>
            <div id="content">
                <?php include './include/sidebar.php'; ?>
                <div id="main">


                    <div class="full_w">
                        <div class="h_title">Lista zaposlenja</div>
						
					</div>
					
					<?php
                            include_once './logic/common.php';
                            $query = '
								SELECT *
								FROM post
								WHERE tip=2
								ORDER BY datum_objave DESC
							';
								


                            try {
                                $stmt = $db->prepare($query);
                                $result = $stmt->execute();
                            } catch (PDOException $ex) {
                                die("Failed to run query: " . $ex->getMessage());
                            }

							$even = false;
                            while (($row = $stmt->fetch()) != NULL) {
								$naslov = $row['naslov'];
								$datum_objave = $row['datum_objave'];
								$tekst = $row['text'];
								$id = $row['id_post'];
								if($even) {
									$orientation = 'right';
								}
								else {
									$orientation = 'left';
								}
								
								echo "
									<div class=half_w half_$orientation>
										<form id='form_$id' method='post' action='zaposlenje_izmeni.php' >
											<div class=h_title>
												$naslov
											</div>
											<article>
												<h4>$datum_objave</h4>
												$tekst
											</article>
											<section class='alignRight'>
												<a href='#' class='table-icon edit' title='Edit' idTu='$id'></a>
												<a href='#' class='table-icon delete' title='Delete' par='12' idTu='$id'></a>
											</section>
										</form>
									</div>									
								";
								$even = !$even;
							}
                        ?>					
                </div>	
            </div>

            <div id="footer">

            </div>
        </div>

    </body>

</html>
