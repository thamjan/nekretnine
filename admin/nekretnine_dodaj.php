<?php $thisPage="Nekretnine"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php include_once './include/head.php'; ?>
		
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1MIIqQUJEfZ036LXGtS40TAXwu0fU7ZI&sensor=false"></script>
		<script type="text/javascript" src="js/oglas-new.js"></script>
		<!-- file upload -->
		<script src="js/fileUpload.js"></script>
		<link rel="stylesheet" href="css/fileUpload.css">
		<!-- end of file upload -->
    </head>
    <body>
        <div class="wrap">
            <?php include_once './include/header.php'; ?>
            <div id="content">
                <?php include_once './include/sidebar.php'; ?>
                <div id="main">


                    <div class="full_w">
                        <div class="h_title">Dodavanje nove nekretnine/oglasa</div>

                        <form>
							<div class='addWrap'>
								<div class='addSection add_1' id="step-1">
									<div class="h_title">Korak 1</div>
									<div class="sep"></div>	
									<div class="full_w">
										<label for="name">Kategorija</label>
										<select name="slKategorija"  class="err" id="add-kat">
											<option value="0">-- izaberite kategoriju</option>
						<?php   
							include_once './logic/common.php';
                            $query = '
								SELECT kategorije.id_kategorije as id, kategorije.naziv_kategorije as ime from kategorije
							';

                            try {
                                $stmt = $db->prepare($query);
                                $result = $stmt->execute();
                            } catch (PDOException $ex) {
                                die("Failed to run query: " . $ex->getMessage());
                            }

                            while (($row = $stmt->fetch()) != NULL) {
                                echo '<option value='.$row['id'].'>'.$row['ime'].'</option>';
                                
							}
						?>
										</select>
									</div>
									<div class="sep"></div>	
									<div class="full_w">
										<label for="name">Vrsta</label>
										Iznajmljivanje&nbsp;<input type='radio' name='rVrsta' checked="checked" value="1"/>
										Prodaja&nbsp;<input type='radio' name='rVrsta' value="2"/>
									</div>
								</div>
								<div class='addSection add_2' id="step-2">
									<div class="h_title">Korak 2</div>
									<div class="sep"></div>	
									<div class="full_w">
										<label for="name">Naziv</label>
										<input style="width:200px;" id="txtNaziv" name="txtNaziv" value="" class="err" />
									</div>
									<div class="sep"></div>	
									<div class="full_w">
										<label for="name">Cena</label>
										<input style="width:70px;" id="txtCena" name="txtCena" value="" class="err" />
									</div>
									<div class="sep"></div>	
									<div class="full_w">
										<label for="name">Kvadratura</label>
										<input style="width:70px;" id="txtKvadratura" name="txtKvadratura" value="" class="err" />
									</div>
									<div class="sep"></div>	
									<div class="full_w">
										<label for="name">Adresa</label>
										<select name="opstina_grad" id="grad-lista" class="err" onchange="listaj(this.value)">
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
										<select name="slOpstina" id="opstine-lista" class="err" onchange="listajM(this.value)">
											<option value="0">-- izaberite opštinu</option>
										</select>
										<select name="slMz" id="mz-lista"  class="err">
											<option value="0">-- izaberite mz</option>
										</select>
										<div style="margin: 10px 0;">
											Ulica:
											<input type="text" name="ulica" class="err" style="width:70%;" value="" id="ulica">
											Prikaži na mapi&nbsp;<input onclick="initialize()"  type='checkbox' name='cbPrikaziNaMapi' />
											<input type="button" onclick="codeAddress()" class="marker-add" value="Postavi Marker">
										</div>
									</div>
									<div class="sep"></div>	
									<div class="full_w" id="gmaps">
										<label for="name">Google API</label>
										<div style="width:100%; height:500px;"id="map-canvas"></div>
										<input type="hidden" name="glat" value="0" id="glat">
										<input type="hidden" name="glon" value="0" id="glon">
									</div>
									<div class="sep"></div>	
									<div class="full_w">
										<label for="name">Opis</label>
										<textarea id="txtOpis" name="txtOpis" class="err txtarea" value="" maxlength="2000" ></textarea>
									</div>
									<div class="sep"></div>	
								</div>
								<div class='addSection add_3' id="step-3">
									<div class="h_title">Korak 3</div>
									<div class="sep"></div>	
									<div class="full_w">
										<label for="name">Atributi</label>
										<table id="attr-list">
											
										</table>
										<button onclick="pokupiAtr()">Testiraj formu Urose</button>
									</div>
									<div class="sep"></div>	
								</div>
								<div class='addSection add_4' id="step-4">
									<div class="h_title">Korak 4</div>
									<div class="full_w">
										<label for="name">Medija</label>											
											<input type="file" id="fileElem" multiple="true" accept="image/*" onchange="handleFiles(this.files)"> 
											<span style="font-size:14px;color: #1F6289;font-weight:bold;">Odaberite fajl slike</span> 
											<div id="dropbox">Prevucite i pustite sliku ovde...</div>
											<div class="upload-progress"></div>
											<div id='listaSLika'>
												
												<table>
													<thead>
														<tr>
															<th scope="col">Slika</th>
															<th scope="col">Ime fajla</th>
															<th scope="col">Featured</th>
															<th scope="col" style="width: 44px;"></th>
														</tr>
													</thead>
													<tbody class="content" id="content"> 
														
													</tbody>
												</table>
											</div>
											<input type='hidden' name='hidImgList' value="" id='hidImgList' />
									</div>
									<div class="sep"></div>	
								</div>
								<div class='addSection add_5' id="step-5">
									<div class="h_title">Korak 5</div>
									<div class="full_w">
										<label for="name">Medija</label>
											<button type="submit" id="btnPreview">Pregled</button><br />
											<button id="btnSubmit">Dodaj Nekretninu</button>
										</select>
									</div>
									<div class="sep"></div>	
									<div class="entry">
											
									</div>
								</div>
								<div class='add_progress'>
									<section class='addWrap_nextPrevious'>
										<button id='btnAddWrapPrevious'>Prethodni</button>
									</section>	
									<div id="add_progressbar"></div>									
									<section class='add_nextPrevious'>
										<button id='btnAddWrapNext'>Sledeći</button>												
									</section>																
								</div>
							</div>
                        </form>
                        <!--<div class="sep"></div>-->
                    </div>

                </div>	
            </div>
			
			
			
            <div id="footer">

            </div>
        </div>
		
		<script>
	
		</script>
    </body>

</html>
