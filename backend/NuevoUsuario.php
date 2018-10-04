<?php
    require_once 'Conexion.php';
    session_start();
    $Id = $_POST['id'];
    $Nombre = $_POST['nombre'];
    $Ganaderia=$_POST["ganaderia"];
 
    $Pass=$_POST["id"];
    $Cargo=$_POST["cargo"];

    if ($con->connect_error) {
        echo 'false';
    }

    $query1="SELECT * FROM usuario WHERE Id = '$Id'";
    $resultado = $con->query($query1);

    if ($resultado->num_rows>0) {
        echo ('0');
    }
    else{
        $query = "INSERT INTO usuario VALUES (
        '$Id','$Nombre','$Ganaderia','$Pass','$Cargo')";
        $rs = $con->query($query);
        if ($rs) {
            echo 'true';
        }
        else {
            echo 'false';
        }
    }
?>
