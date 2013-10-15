<?php $thisPage="Nekretnine"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php include_once './include/head.php'; ?>
		<script type="text/javascript" src="js/adding.js"></script>
    </head>
    <body>
        <div class="wrap">
            <?php include_once './include/header.php'; ?>
            <div id="content">
                <?php include_once './include/sidebar.php'; ?>
                <div id="main">


                    <div class="full_w">
                        <div class="h_title">Dodavanje novog atributa</div>

                        <form>
                            <div class="element">
                                <label for="name">Naziv atributa</label>
                                <input id="txtNaziv" name="txtNaziv" class="text err" />
                            </div>
							<!--<div class="element">
                                <label for="name">Tip atributa</label>
                                <input id="txtTip" name="txtTip" class="text err" />
                            </div>-->
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
                            </div>
                        </form>
                        <div class="sep"></div>

                    </div>

                </div>	
            </div>

            <div id="footer">

            </div>
        </div>

    </body>

</html>
