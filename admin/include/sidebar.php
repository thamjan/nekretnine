<div id="sidebar">
    <div class="box">
        <?php
        if ($thisPage == "Dashboard")
            include './include/sidebar/dashboard.php';
        ?>
        <?php
        if ($thisPage == "Nekretnine")
            include './include/sidebar/nekretnine.php';
        ?>
        <?php
        if ($thisPage == "Vesti")
            include './include/sidebar/vesti.php';
        ?>
        <?php
        if ($thisPage == "Lokacije")
            include './include/sidebar/lokacije.php';
        ?>
    </div>
</div>