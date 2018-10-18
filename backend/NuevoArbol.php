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
        else { echo 'false'; }

        $Tree;
        $Vaca = $_POST['vaca']; //debe recibir el id de una vaca para generar el árbol de ella
        $con = new mysqli($host, $user);

        $pa=1;
        while($pa=1)
        {
            $query1="SELECT IdPadre FROM Vaca WHERE Id = '$Vaca'";
            $resultado = $con->query($query1);

            if ($resultado->num_rows=0) {
                $query1="UPDATE Vaca SET Nivel='1' WHERE Ejemplar = '$Vaca'";
                $resultado1 = $con->query($query1);
                $pa=2;
            }
            else
            {
                $row = $resultado ->fetch_array(MYSQLI_ASSOC);
                $Vaca=$row['IdPadre'];
            }
        }
        $query="SELECT TOP 1 Id FROM Arbol ORDER BY ID DESC"
        $result= $con->query($query);     
        $row = $result ->fetch_array(MYSQLI_ASSOC);
        $Tree= $row['Id'];//el id del Arbol que se acaba de crear

     //   $query="SELECT IdPadre FROM Vaca WHERE Arbol_Id=";

        $query = "SELECT count(*) FROM Vaca WHERE Arbol_Id= '$Tree'" ;
        $result = $con->query($query);
        $row = $result ->fetch_array(MYSQLI_ASSOC);
        $NumVacas = $row['count(*)'];//número de vacas en un arbol

        $lel=0;
        for($i=0; $i<$NumVacas; $i++)
        {
            $query = "SELECT * from Vaca WHERE Arbol_Id= '$Tree' ORDER BY Nivel ASC";//busca todas las vacas de ese arbol y busca sus padres
            $result = $con->query($query);
            $row = $result ->fetch_array(MYSQLI_ASSOC);
            $Padre = $row['IdPadre'];
            if ($result && $Padre=="")
            {
                $lel=1;
            }
            else if($lel==0)
            {
                $query1 "SELECT Nivel FROM Vaca WHERE Ejemplar= '$Padre'";//busca el nivel del padre y le suma uno
                $result1= $con->query($query1);
                $row1 = $result1 ->fetch_array(MYSQLI_ASSOC);
                $Nivel = $row1['Nivel'];
                $Nivel++;

                if($result1)
                {
                    $query2 = "UPDATE Vaca SET Nivel= '$Nivel' WHERE IdPadre= '$Padre'"; //pone el nivel de su padre +1 a las vacas
                    $result2=$con->query($query2); 
                    if ($result2) {echo 'true';}
                    else {echo 'false'; }  
                }
            }     
        }
        $query="SELECT TOP 1 Nivel FROM Vaca WHERE Id_Arbol='$Tree' ORDER BY Nivel DESC";//busca cuántos niveles hay viendo cuál es el de más abajo xddd
        $result =$con->query($query);
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $Num=$row['Nivel'];

        $a=array();   
        for($i=1; i<=$Num; $i++)
        {
            $query="SELECT count(*) FROM Vaca WHERE Nivel= '$i' AND Arbol_id='$Tree'";//
            $result=$con->query($query);
            $row = $result ->fetch_array(MYSQLI_ASSOC);
            $a[$i]=$row['count(*)'];//Guarda en un array cuántas vacas hay en cada nivel
        }
        //buscar cuál tiene más vacas viendo cuál es el mayor número en el array a y su posición +1 será el nivel con más vacas,
        $x=$a[0];
        $y=0;
        for($i=1; $i<$Num; $i++)
        {
            if($a[$i]>$x)
            {
                $x=$a[$i];
                $y=$i;
            }
        }
        $y++;
        /*AHORA Y TIENE ES EL NIVEL QUE TIENE MÁS VACAS Y X ES EL NÚMERO DE VACAS QUE TIENE ESE NIVEL
        EL ANCHO DEL DIV O LO QUE SEA DEPENDERÁ DE X, SERÁ UN ANCHO PARA QUE ESA CANTIDAD DE VACAS SE ACOMODEN
        */
?>
