<?php session_start(); 
	if(!$_SESSION['active']){
		  header( 'Location: login.php' ) ;
	}
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="google" value="notranslate" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/navi.css" media="screen" />
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<title><?php echo $thisPage; ?></title>
