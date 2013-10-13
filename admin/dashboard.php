<?php $thisPage="Dashboard"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <?php include './include/head.php'; ?>
    </head>
    <body>
        <div class="wrap">
            <?php include './include/header.php'; ?>
            <div id="content">
                <?php include './include/sidebar.php'; ?>
                <div id="main">
                    <div class="half_w half_left">
                        <div class="h_title">Statistika</div>
                        <div class="stats">
                            <div class="today">
                                <h3>Oglasi</h3>
                                <p class="count">30</p>
                                <p class="type">Ukupno</p>
                                <p class="count">10</p>
                                <p class="type">Izdvojenih</p>
                                <p class="count">20</p>
                                <p class="type">Aktivnih</p>
                            </div>
                            <div class="week">
                                <h3>Pregledi</h3>
                                <p class="count">532</p>
                                <p class="type">ukupno</p>
                                <h3>&nbsp;</h3>
                                <h3>Najpopularniji</h3>
                                <p class="type"><a href="#">Oglas1</a></p>
                                <p class="type"><a href="#">Oglas2</a></p>
                                <p class="type"><a href="#">Oglas3</a></p>
                            </div>
                        </div>
                    </div>
                </div>	
            </div>
            <div id="footer">
            </div>
        </div>

    </body>

</html>
