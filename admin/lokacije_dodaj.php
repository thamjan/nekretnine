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

                        <div >
                            <h3><a href="#">Grad</a></h3>
                        </div>
                        <form action="#" method="post">
                            <div class="element">
                                <label for="name">Ime grada</label>
                                <input id="name" name="name" class="text err" />
                            </div>
                            <div class="entry">
                                <button type="submit" class="add">Dodaj</button>
                            </div>
                        </form>
                        <div class="sep"></div>
                        <div >
                            <h3><a href="#">Opština</a></h3>
                        </div>
                        <form action="#" method="post">
                            <div class="element">
                                <label for="category">Grad</label>
                                <select name="opstina_grad" class="err">
                                    <option value="0">-- izaberite grad</option>
                                    <option value="1">Beograd</option>
                                    <option value="2">Novi Sad</option>
                                </select>
                            </div>
                            <div class="element">
                                <label for="name">Ime opštine</label>
                                <input id="name" name="name" class="text err" />
                            </div>
                            <div class="entry">
                                <button type="submit" class="add">Dodaj</button>
                            </div>
                        </form>
                        <div class="sep"></div>

                        <div >
                            <h3><a href="#">MZ</a></h3>
                        </div>
                        <form action="#" method="post">
                            <div class="element">
                                <label for="category">Grad</label>
                                <select name="opstina_grad" class="err">
                                    <option value="0">-- izaberite grad</option>
                                    <option value="1">Beograd</option>
                                    <option value="2">Novi Sad</option>
                                </select>
                            </div>
                            <div class="element">
                                <label for="category">Opština</label>
                                <select name="opstina_grad" class="err">
                                    <option value="0">-- izaberite opštinu</option>
                                    <option value="1">Novi Beograd</option>
                                    <option value="2">Boleč</option>
                                </select>
                            </div>
                            <div class="element">
                                <label for="name">Ime MZ</label>
                                <input id="name" name="name" class="text err" />
                            </div>
                            <div class="entry">
                                <button type="submit" class="add">Dodaj</button>
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
