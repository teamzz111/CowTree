<?php
  global $host, $db, $pass, $key, $user, $con;
  $host = "localhost";
  $db = "mydb";
  $pass = "";
  $user = "root";
  $key = "92AE31B89FEEB2A3"; //llave
  $con = new mysqli($host, $user, $pass, $db);
  $con->query("SET NAMES 'utf8'");
  header('Content-Type: text/html; charset=utf-8');
 ?>
