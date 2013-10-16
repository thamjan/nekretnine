<?php

session_start();
unset($_SESSION['user']);
unset($_SESSION['active']);

//header("Location: ../../index.php");
header("Location: login.php");
die("Redirecting to: login.php");
?>