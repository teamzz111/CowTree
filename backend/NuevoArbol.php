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

        $Tree;
        $Vaca = $_POST['vaca'];
        $con = new mysqli($host, $user);
        $con->query("SET NAMES 'utf8'");
        if ($con->connect_error) {
            echo 'false';
        }
        $pa=1;
        while($pa=1)
        {
            $query1="SELECT IdPadre FROM Vaca WHERE Id = '$Vaca'";
            $resultado = $con->query($query1);

            if ($resultado->num_rows=0) {
                $query1="UPDATE Vaca SET Nivel='1' WHERE Id = '$Vaca'";
                $resultado = $con->query($query1);
                $pa=2;
            }
            else
            {
                $row = $resultado ->fetch_array(MYSQLI_ASSOC);
                $Vaca=$row['IdPadre'];
            }
        }
        $query="SELECT TOP 1 Id FROM Arbol ORDER BY ID DESC";

        
                

        $query="SELECT IdPadre FROM Vaca WHERE Arbol_Id=";


?>
