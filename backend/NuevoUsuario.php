<?php
    require_once 'Conexion.php';
    session_start();
    $Id = $_POST['id'];
    $Nombre = $['nombre'];
    $Ganaderia=$_POST["ganaderia"];
    $Usuario=$_POST["usuario"];
    $Pass=$_POST["pass"];
    $Cargo=$_POST["cargo"];

    if ($con->connect_error) {
        echo 'false';
    }

    $query1="SELECT * FROM usuario WHERE Id = '$Id'";
    $resultado = $con->query($query1);

    if ($resultado->num_rows>0) {
        echo ('ese id ya está registrado');
    }
    else{
        $query = "INSERT INTO usuario VALUES (
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
