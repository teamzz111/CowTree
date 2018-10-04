<?php

include 'Conexion.php';

        $Id = $input['id'];
        $Nombre = $input['nombre'];
        $Ganaderia=$input["ganaderia"];
        $Usuario=$input["usuario"];
        $Pass=$input["pass"];
        $Cargo=$input["cargo"];


        if ($con->connect_error) {
            echo 'false';
        }

        $query1="SELECT * FROM Usuario WHERE Id = '$Id'";
        $resultado = $con->query($query1);

        if ($resultado->num_rows>0) {
            echo ('ese id ya está registrado');
        }
        else{
            $query = "INSERT INTO Usuario VALUES (
                '$Id','$Nombre','$Ganaderia','$Usuario','$Pass','$Cargo')";
            $rs = $con->query($query);
            if ($rs) {
                echo 'true';
                }
                else {
                    echo 'false';
                }
            }
        
    
?>
