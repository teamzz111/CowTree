<?php
  global $host, $db, $pass, $key, $user, $con;
  $host = "YOUR_DB_HOST";
  $db = "YOUR_DB_NAME";
  $pass = "YOUR_DB_PASSWORD";
  $user = "YOUR_DB_USER";
  $key = "YOUR_APP_KEY"; //llave
  $con = new mysqli($host, $user, $pass, $db);
  $con->query("SET NAMES 'utf8'");
  header('Content-Type: text/html; charset=utf-8');
 ?>
