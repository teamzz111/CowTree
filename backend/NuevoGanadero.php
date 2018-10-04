<?php

include 'Conexion.php';

        $Id = $input['id'];
        $Nombre = $input['nombre'];
        $Ubicacion=$input["ubicacion"];
        $Divisa=$input["divisa"];
        $Encastes=$input["encastes"];
        $Lineas=$input["lineas"];

        $con = new mysqli($host, $user, $pass, $db);
        $con->query("SET NAMES 'utf8'");
        if ($con->connect_error) {
            echo 'false';
        }

        $query1="SELECT * FROM Ganaderia WHERE Id = '$Id'";
        $resultado = $con->query($query1);

        if ($resultado->num_rows>0) {
            echo ('ese id ya está registrado');
        }
        else{
            $query = "INSERT INTO Ganaderia VALUES (
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
