<?php

require_once 'Conexion.php';
session_start();

        $Id = $_POST['id'];
        $Nombre = $_POST['nombre'];
        $Ubicacion=$_POST["ubicacion"];
        $Divisa=$_POST["divisa"];
        $Encastes=$_POST["encastes"];
 ;       $Lineas=$_POST["lineas"]

        $con = new mysqli($host, $user, $pass, $db);
        $con->query("SET NAMES 'utf8'");
        if ($con->connect_error) {
            echo 'false';
        }

        $query1="SELECT * FROM ganaderia WHERE Id = '$Id'";
        $resultado = $con->query($query1);

        if ($resultado->num_rows>0) {
            echo ('ese id ya está registrado');
        }
        else{
            $query = "INSERT INTO ganaderia VALUES (
                '$Id','$Nombre','$Ubicacion','$Divisa','$Encastes','$Lineas')";
            $rs = $con->query($query);
            if ($rs) {
                echo 'true';
                }
                else {
                    echo 'false';
                }
            }
        
    
?>
