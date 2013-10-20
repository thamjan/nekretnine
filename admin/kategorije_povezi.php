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
								<div class="atr-selector">
								<h4>Izabrani atributi</h4>
								<ul id="target" class="lista-atributa">
								 
								</ul>
								</div> 
								<div class="atr-selector"> 
								<h4>Ostali atributi</h4>
								<ul id="all" class="lista-atributa">
								 
								</ul>
								</div> 
							</div>


                        <div class="entry">
							<button id="kat-atr-p">Sačuvaj Promene</button>
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
						$("#kat-atr-p").show();
						$.post("logic/listajatribute.php",{
							id: id_kat
						},function(result){						
							var listaAtributa = {
								povezaniAtr: [],
								ostaliAtr:[]
							}
												
							//console.log(result)
							var data = $.parseJSON(result);
							$.each(data, function(i, item){
							var status = this['status'];
								if(status=='1'){
									listaAtributa.povezaniAtr.push({
										id: this['id'],
										naziv: this['naziv']
									});
								}								
								else{
									listaAtributa.ostaliAtr.push({
										id: this['id'],
										naziv: this['naziv']
									});	
								}
								
							});							
							//isprazni liste
							$("#target").html("");
							$("#all").html("");
							//pravi html za liste
							$.each( listaAtributa.povezaniAtr, function( i, item ) {								
								$("#target").append("<li data-id='"+this['id']+"'>"+this['naziv']+"</li>");		
								
							});							
							$.each( listaAtributa.ostaliAtr, function( i, item ) {								
								$("#all").append("<li data-id="+this['id']+">"+this['naziv']+"</li>");								
							});
							
						});
					}					
					else {
						$("#target").html("");
						$("#all").html("");
						$("#kat-atr-p").hide();
					}					
					return false;
				});
				
				$("#kat-atr-p").click(function(){
						var kat_id = $("#kat-select").val();
				
						var elementi = {
							id_kat: kat_id,
							atribut: []
						}
					
						
						//console.log('id kategorije je '+kat_id)
					$("#target li").each(function(){						
						var atr_id = $(this).attr('data-id');
						var atr_index = $(this).index();
						elementi.atribut.push({
							id: atr_id,
							index: atr_index
						});
						
						//JSON.stringify(elementi);
						
						});		
						
						console.log(JSON.stringify(elementi))
						$.post ("logic/povezikatatr.php", { data: JSON.stringify(elementi) }, function (result) {
							alert(result);
								
					})
				});
		  });
		</script>
    </body>

</html>
