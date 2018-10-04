<?php

  global $host, $db, $pass, $key, $user, $con;
  $host = "sql100.hostlibre.ml";
  $db = "teolo_21117533_mydb";
  $pass = "3192934192321";
  $user = "teolo_21117533";
  $key = "92AE31B89FEEB2A3"; //llave
  $con = new mysqli($host, $user, $pass, $db);
  $con->query("SET NAMES 'utf8'");
 ?>
