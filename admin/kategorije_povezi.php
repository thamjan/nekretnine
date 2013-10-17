<?php $thisPage = "Nekretnine"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php include_once './include/head.php'; ?>
		<script src="js/jquery-ui.js"></script>
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
                        <div class="h_title">Povezivanje kategorija i atributa</div>
                        <h2>Izaberite kategoriju</h2>
							<select id="kat-select">
							<option value="0">lista kategorija</option>
                            <?php
                            include_once './logic/common.php';
                            $query = '

								SELECT * FROM kategorije

							';
								


                            try {
                                $stmt = $db->prepare($query);
                                $result = $stmt->execute();
                            } catch (PDOException $ex) {
                                die("Failed to run query: " . $ex->getMessage());
                            }

                            while (($row = $stmt->fetch()) != NULL) {
                                echo '
                                       <option  value='.$row['id_kategorije']. '>'.$row['naziv_kategorije']. '</option>';
                                  }	
							?>
                            </select>    
							<hr/>
							<div class="kat-sort">
								
								<ul id="target" class="lista-atributa">
								  <li>Item 1</li>
								  <li>Item 2</li>
								  <li>Item 3</li>
								  <li>Item 4</li>
								  <li class="ui-state-default">Item 5</li>
								</ul>
								 
								<ul id="all" class="lista-atributa">
								  <li>Item 1</li>
								  <li>Item 2</li>
								  <li>Item 3</li>
								  <li>Item 4</li>
								  <li>Item 5</li>
								</ul>
 
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
		  $(function() {
			$( "#target, #all" ).sortable({
			  connectWith: ".lista-atributa",
			  cursor: "move"
			}).disableSelection();
		  });
		  
		  $(document).ready(function(){
				$("#kat-select").change(function(){
					
					var id_kat = $(this).val();
					
					if(id_kat > 0){
						console.log(id_kat)
						$.post("logic/listajatribute.php",{
							id: id_kat
						},function(result){
							alert(result);
							
						});
						
						
						
					}
					
					return false;
				});
		  });
		</script>
    </body>

</html>
