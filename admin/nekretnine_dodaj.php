<?php $thisPage="Nekretnine"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php include_once './include/head.php'; ?>
		<script type="text/javascript" src="js/oglas-new.js"></script>
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
								<div class='addSection add_1'>
									<div class="h_title">Korak 1</div>
									<!--<table>
										<tr>
											<td>Kategorija:</td>
											<td><input type='text' name='txtKategorija' /></td>
										</tr>
										<tr>
											<td>Vrsta:</td>
											<td>
												Iznajmljivanje&nbsp;<input type='radio' name='rVrsta' checked/>
											</td>
											<td>
												Prodaja&nbsp;<input type='radio' name='rVrsta' />
											</td>
										</tr>
										<tr>
											<td></td>
										</tr>
									</table>-->
									<div class="sep"></div>	
									<div class="full_w">
										<label for="name">Kategorija</label>
										<select name="slKategorija"  class="err"">
											<option value="0">-- izaberite kategoriju</option>
										</select>
									</div>
									<div class="sep"></div>	
									<div class="full_w">
										<label for="name">Vrsta</label>
										Iznajmljivanje&nbsp;<input type='radio' name='rVrsta' checked="checked" value="1"/>
										Prodaja&nbsp;<input type='radio' name='rVrsta' value="2"/>
										<!--<div class="element">
											<label for="name">Naziv atributa</label>
											<input id="txtNaziv" name="txtNaziv" class="text err" />
										</div>									
										<div class="element">
											<label for="category">Tip atributa</label>
											<select name="category" class="err" id="txtTip">
												<option value="0">-- Odaberite</option>
												<option value="1">Ima/Nema</option>
												<option value="2">Opis</option>
											</select>
										</div>
										<div class="entry">
											<button type="submit" class="btnSubmit" val='11'>Dodaj</button>
										</div>-->
									</div>
								</div>
								<div class='addSection add_2'>
									<div class="h_title">Korak 2</div>
									<div class="sep"></div>	
									<div class="full_w">
										<label for="name">Naziv</label>
										<input id="txtNaziv" name="txtNaziv" class="err" />
									</div>
									<div class="sep"></div>	
									<div class="full_w">
										<label for="name">Cena</label>
										<input id="txtCena" name="txtCena" class="err" />
									</div>
									<div class="sep"></div>	
									<div class="full_w">
										<label for="name">Kvadratura</label>
										<input id="txtKvadratura" name="txtKvadratura" class="err" />
									</div>
									<div class="sep"></div>	
									<div class="full_w">
										<label for="name">Adresa</label>
										<select name="slGrad"  class="err"">
											<option value="0">-- izaberite grad</option>
										</select>
										<select name="slOpstina"  class="err"">
											<option value="0">-- izaberite opštinu</option>
										</select>
										<select name="slMz"  class="err"">
											<option value="0">-- izaberite mz</option>
										</select>
										<select name="slUlica"  class="err"">
											<option value="0">-- izaberite ulicu</option>
										</select>
										Prikaži na mapi&nbsp;<input type='checkbox' name='cbPrikaziNaMapi' />
									</div>
									<div class="sep"></div>	
									<div class="full_w">
										<label for="name">Google API</label>										
									</div>
									<div class="sep"></div>	
									<div class="full_w">
										<label for="name">Opis</label>
										<input id="txtOpis" name="txtOpis" class="err" />
									</div>
									<div class="sep"></div>	
								</div>
								<div class='addSection add_3'>
									<div class="h_title">Korak 3</div>
									<div class="sep"></div>	
									<div class="full_w">
										<label for="name">Atributi</label>
											Atribut&nbsp;<input type='checkbox' name='Atribut' />&nbsp;
											Atribut&nbsp;<input type='checkbox' name='Atribut' />&nbsp;
											Atribut&nbsp;<input type='checkbox' name='Atribut' />&nbsp;
											Atribut&nbsp;<input type='checkbox' name='Atribut' />&nbsp;
											Atribut&nbsp;<input type='checkbox' name='Atribut' />&nbsp;
											Atribut&nbsp;<input type='checkbox' name='Atribut' />&nbsp;
											Atribut&nbsp;<input type='checkbox' name='Atribut' />&nbsp;
											Atribut&nbsp;<input type='checkbox' name='Atribut' />&nbsp;
											Atribut&nbsp;<input type='checkbox' name='Atribut' /><br />
											Atribut&nbsp;<input type='checkbox' name='Atribut' />&nbsp;
											Atribut&nbsp;<input type='checkbox' name='Atribut' />&nbsp;
											Atribut&nbsp;<input type='checkbox' name='Atribut' />&nbsp;
											Atribut&nbsp;<input type='checkbox' name='Atribut' />&nbsp;
											Atribut&nbsp;<input type='checkbox' name='Atribut' />&nbsp;
											Atribut&nbsp;<input type='checkbox' name='Atribut' />&nbsp;
											Atribut&nbsp;<input type='checkbox' name='Atribut' />&nbsp;
											Atribut&nbsp;<input type='checkbox' name='Atribut' />&nbsp;
											Atribut&nbsp;<input type='checkbox' name='Atribut' />
										</select>
									</div>
									<div class="sep"></div>	
								</div>
								<div class='addSection add_4'>
									<div class="h_title">Korak 4</div>
									<div class="full_w">
										<label for="name">Medija</label>
											<input type="file" name="fSlike" />
										</select>
									</div>
									<div class="sep"></div>	
								</div>
								<div class='addSection add_5'>
									<div class="h_title">Korak 5</div>
									<div class="full_w">
										<label for="name">Medija</label>
											<button type="submit" id="btnPreview">Pregled</button><br />
											<button type="submit" id="btnSubmit">Dodaj Nekretninu</button>
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

    </body>

</html>
