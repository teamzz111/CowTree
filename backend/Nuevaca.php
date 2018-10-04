<?php

include 'Conexion.php';

        $Nombre = $input['nombre'];
        $Ejemplar = $input['ejemplar'];
        $Estado=$input["estado"];
        $Destino=$input["destino"];
        $Edad=$input["edad"];
        $Herrado=$input["herrado"];
        $Destetado=$input["destetado"];
        $fecha_nacimiento=$input["fecha_nacimiento"];
        $Encaste=$input["encaste"];
        $Reseña=$input["reseña"];
        $Arbol_id=$input["arbol_id"];
        $Ganaderia=$input["ganaderia_id"];
        $Criador=$input["criador_id"];
        $Fenotipo=$input["fenotipo"];
        $Defector=$input["defectos"];
        $Calificacion=$input["calificacion"];
        $Comportamiento=$input["comportamiento"];
        $Observadores=$input["observadores"];
        $Pareja=$input["idpadre"];
        $Padre=$input["idpareja"];


        $con = new mysqli($host, $user, $pass, $db);
        $con->query("SET NAMES 'utf8'");
        if ($con->connect_error) {
            echo 'false';
        }

        $query1="SELECT * FROM Vaca WHERE Ejemplar = '$Ejemplar'";
        $resultado = $con->query($query1);

        if ($resultado->num_rows>0) {
            echo ('ese id ya está registrado');
        }
        else{
            $query = "INSERT INTO Vaca VALUES (
                '$Ejemplar','$Nombre' ,'$Estado','$Destino','$Edad','$Herrado','$Destetado','$fecha_nacimiento','$Encaste',
                '$Reseña','$Arbol_id','$Ganaderia','$Criador','$Fenotipo','$Defector','$Calificacion','$Comportamiento',
                '$Observadores','$Pareja','$Padre')";
            $rs = $con->query($query);
            if ($rs) {
                echo 'true';
                }
                else {
                    echo 'false';
                }
            }
        }
    
?>
