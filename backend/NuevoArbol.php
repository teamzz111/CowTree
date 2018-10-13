<?php

require_once 'Conexion.php';
session_start();

        $Nombre = $_POST['nombre'];

        $con = new mysqli($host, $user);
        $con->query("SET NAMES 'utf8'");
        if ($con->connect_error) {
            echo 'false';
        }

        $query1="SELECT * FROM arbol WHERE Id = '$Id'";
        $resultado = $con->query($query1);

        $query = "INSERT INTO arbol VALUES (0,'$Nombre')";
        $rs = $con->query($query);
        if ($rs) {echo 'true';}
        else { cho 'false'; }
    /*poner la wea de los niveles de los árboles*/
?>
