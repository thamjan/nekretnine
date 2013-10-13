<?php

require "common.php";
if (@$_SESSION['timeout'] + 30*60 < time()) {
    echo '<script type=\'text/javascript\'>alert(\'Istekla sesija!!!\');</script>';
    // require '../odjava.php'; // this way is better ???
    echo '<script type=\'text/javascript\'>top.location.href = "odjava.php";</script>';
} else {
    
}
@$_SESSION['timeout'] = time();

?> 