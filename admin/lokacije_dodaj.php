<?php $thisPage="Lokacije"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php include_once './include/head.php'; ?>
    </head>
    <body>
        <div class="wrap">
            <?php include_once './include/header.php'; ?>
            <div id="content">
                <?php include_once './include/sidebar.php'; ?>
                <div id="main">


                    <div class="full_w">
                        <div class="h_title">Dodavanje nove lokacije</div>
						 <form action="#" method="post" id="dodaj-grad">
                        <div >
                            <h3><a href="#">Grad</a></h3>
                        </div>                      
                            <div class="element">
                                <label for="name">Ime grada</label>
                                <input name="naziv" class="text err" />
                                <input type="hidden" name="tip" value="1" class="text err" />
                            </div>
                            <div class="entry">
                                <button type="submit" data-type="grad" class="dodaj">Dodaj</button>
                            </div>
						</form>
                        <div class="sep"></div>
                        <div >
                            <h3><a href="#">Opština</a></h3>
                        </div>
                        <form action="#" method="post" id="dodaj-opstinu">
                            <div class="element">
                                <label for="category">Grad</label>
                                <select name="opstina_grad" class="err">
                                    <option value="0">-- izaberite grad</option>
										<?php
											include './logic/common.php';
											$query = 'select gradovi.id_grad as ID_grad, gradovi.naziv as Grad 
											from gradovi';
											try {
												$stmt = $db->prepare($query);
												$result = $stmt->execute();
											} catch (PDOException $ex) {
												die("Failed to run query: " . $ex->getMessage());
											}
											while (($row = $stmt->fetch()) != NULL) {
												echo '<option value='.$row['ID_grad'].'>'.$row['Grad']. '</option>';
											}
										?>
                                </select>
                            </div>
                            <div class="element">
                                <label for="name">Ime opštine</label>
                                <input name="naziv" class="text err" />
								<input type="hidden" name="tip" value="2" class="text err" />
                            </div>
                            <div class="entry">
                                <button type="submit" data-type="opstina" class="dodaj">Dodaj</button>
                            </div>
                        </form>
                        <div class="sep"></div>

                        <div >
                            <h3><a href="#">MZ</a></h3>
                        </div>
                        <form action="#" method="post" id="dodaj-mz">
                            <div class="element">
                                <label for="category">Grad</label>
                                <select name="opstina_grad"  class="err" onchange="listaj(this.value)">
                                    <option value="0">-- izaberite grad</option>
                                    <?php
										$query = 'select gradovi.id_grad as ID_grad, gradovi.naziv as Grad 
										from gradovi';
										try {
											$stmt = $db->prepare($query);
											$result = $stmt->execute();
										} catch (PDOException $ex) {
											die("Failed to run query: " . $ex->getMessage());
										}
										while (($row = $stmt->fetch()) != NULL) {
											echo '<option value='.$row['ID_grad'].'>'.$row['Grad']. '</option>';
										}
									?>
                                </select>
                            </div>
                            <div class="element">
                                <label for="category">Opština</label>
                                <select name="opstina" class="err" id="opstine-lista">
                                    
                                </select>
                            </div>
                            <div class="element">
                                <label for="naziv">Ime MZ</label>
                                <input name="naziv" class="text err" />
								<input type="hidden" name="tip" value="3" class="text err" />
                            </div>
                            <div class="entry">
                                <button type="submit" data-type="mz" class="dodaj">Dodaj</button>
                            </div>
                        </form>
                        <div class="sep"></div>


                    </div>

                </div>	
            </div>

            <div id="footer">

            </div>
        </div>
		<script>
			$(document).ready(function(){
				$(".dodaj").click(function(){
					var tip = $(this).attr('data-type');
					var id_forme;
					switch (tip)
						{
						case "grad":
							id_forme = "#dodaj-grad";
						  break;
						case "opstina":
							id_forme = "#dodaj-opstinu";
						  break;
						case "mz":
							id_forme = "#dodaj-mz";
						  break;
						default:
						  id_forme = "#dodaj-grad";
						}
					$.post("logic/dodajlokacije.php", $(id_forme).serialize(),  function(response) {
						//$("#footer").html(response)
						alert(response)
						});
					return false;
				});
			});
			
			function listaj(val){
				console.log(val)
				$.post("logic/listanje.php",  { value: val, tip: "1" },  function(response) {
						//$("#footer").html(response)
						$("#opstine-lista").html(response);
						});
				
			}
		</script>
    </body>

</html>
