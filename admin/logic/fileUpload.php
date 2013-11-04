<?php
  $str = file_get_contents('php://input');
  $filename = @$_SERVER['HTTP_X_FILE_NAME'];
  echo $filename;
  file_put_contents("../uploads/".$filename,$str);
?>