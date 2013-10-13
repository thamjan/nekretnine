<div id="header">
    <div id="top">
        <div class="left">
            <p>Dobrodošli, <strong><?= @$_SESSION['ime'] ?></strong> [ <a href="odjava.php">odjava</a> ]</p>
        </div>
        <div class="right">
            <div class="align-right">
                <p>Poslednje logovanje: <strong><?= @$_SESSION['lastLogin'] ?></strong></p>
            </div>
        </div>
    </div>
    
    <div id="nav">
        <ul>
            <li class="upp"
                <?php if ($thisPage == "Dashboard")
    echo " id=\"currentpage\"";
?>>
                <a href="dashboard.php">Dashboard</a>

            </li>
            <li class="upp"<?php if ($thisPage == "Nekretnine")
    echo " id=\"currentpage\"";
?>>
                <a href="nekretnine_lista.php">Nekretnine</a>
            </li>
            <li class="upp"<?php if ($thisPage == "Vesti")
    echo " id=\"currentpage\"";
?>>
                <a href="vesti_lista.php">Vesti</a>
            </li>
            <li class="upp"<?php if ($thisPage == "Lokacije")
    echo " id=\"currentpage\"";
?>>
                <a href="lokacije_lista.php">Lokacije</a>
            </li>
        </ul>
    </div>
</div>