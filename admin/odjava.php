<?php

require("./logic/common.php");
unset($_SESSION['user']);
unset($_SESSION['errMsg']);

//header("Location: ../../index.php");
header("Location: login.php");
die("Redirecting to: login.php");
?>