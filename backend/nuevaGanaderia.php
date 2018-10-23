<?php
    require_once 'Conexion.php';
    session_start();

    $name = $_POST['name'];
    $ubication = $_POST["ubication"];
 
    $divisa = $_POST["divisa"];
    $encaste = $_POST["encastes"];
    $lineas  = $_POST["lineas"];

    if ($con->connect_error) {
        echo 'false';
    } else {
        $query = "INSERT INTO `ganaderia` (`Id`,`Nombre`, `Ubicacion`, `Divisa`, `Encastes`, `Lineas`) VALUES (0,'$name', '$ubication', '$divisa', '$encaste', '$lineas')";
        $rs = $con->query($query);
        if ($rs) {
            echo 'true';
        }
        else {
            echo 'false';
        }
    }
?>
