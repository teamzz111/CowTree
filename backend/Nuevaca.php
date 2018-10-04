<?php

require_once 'Conexion.php';
session_start();

        $Nombre = $_POST['nombre'];
        $Ejemplar = $_POST['ejemplar'];
	$Estado=$_POST["estado"];
	$Destino=$_POST["destino"];
	$Edad=$_POST["edad"];
	$Herrado=$_POST["herrado"];
	$Destetado=$_POST["destetado"];
	$fecha_nacimiento=$_POST["fecha_nacimiento"];
	$Encaste=$_POST["encaste"];
	$Reseña=$_POST["reseña"];
	$Arbol_id=$_POST["arbol_id"];
	$Ganaderia=$_POST["ganaderia_id"];
	$Criador=$_POST["criador_id"];
	$Fenotipo=$_POST["fenotipo"];
	$Defector=$_POST["defectos"];
	$Calificacion=$_POST["calificacion"];
	$Comportamiento=$_POST["comportamiento"];
	$Observadores=$_POST["observadores"];
	$Pareja=$_POST["idpadre"];
	$Padre=$_POST["idpareja"];



        $con = new mysqli($host, $user, $pass, $db);
        $con->query("SET NAMES 'utf8'");
        if ($con->connect_error) {
            echo 'false';
        }

        $query1="SELECT * FROM vaca WHERE Ejemplar = '$Ejemplar'";
        $resultado = $con->query($query1);

        if ($resultado->num_rows>0) {
            echo ('ese id ya está registrado');
        }
        else{
            $query = "INSERT INTO vaca VALUES (
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
        
    
?>
