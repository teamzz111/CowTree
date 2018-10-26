<?php
require_once 'Conexion.php';
session_start();
        $Nombre = "";
        $con = new mysqli($host, $user, $pass, $db);
        $con->query("SET NAMES 'utf8'");
        
        if ($con->connect_error) {
            echo 'false';
        }
        $Tree;
        $vaca = $_POST['nombre']; //debe recibir el id de una vaca para generar el árbol de ella
        $Seleccion=$_POST['seleccion'];
        $result=false;

        if($Seleccion=='Padre')
        {
            $query="SELECT Id FROM arbol, vaca WHERE arbol.Id=vaca.Arbol_IdP AND vaca.Ejemplar=$vaca"; 
            $result= $con->query($query); 
            if (!$result)
            { trigger_error('Invalid query: ' . $con->error); }   
        }
        else
        {
            $query="SELECT Id FROM arbol, vaca WHERE arbol.Id=vaca.Arbol_IdM AND vaca.Ejemplar=$vaca"; 
            $result= $con->query($query); 
            if (!$result)
            { trigger_error('Invalid query: ' . $con->error); } 
        }
        
        $row = $result ->fetch_array(MYSQLI_ASSOC);
        $Tree= $row['Id'];//el id del Arbol que el usuario escogió


        ////////////////////////////////////////////////////*quizá así
        /*
         while ($fila = mysqli_fetch_assoc($resultado)) {
                $encuesta = $fila['idEncuesta'];
                $user = $_SESSION['username'];
                $query = "SELECT * FROM Realizado WHERE IdEmpleado = '$user' AND IdEncuesta = '$encuesta'";
                $nresultado = $con->query($query);
                if($nresultado->num_rows == 0){
                     $contador++;
                     $array[] = array_map('html_entity_decode', $fila);
                }
            }*/
        /////////////////////////////////////////////////////


        $query = "SELECT count(*) FROM vaca WHERE Arbol_IdP= '$Tree' OR Arbol_IdM='$Tree'" ;
        $result = $con->query($query);
        $row = $result ->fetch_array(MYSQLI_ASSOC);
        $Numvacas = $row['count(*)'];//número de vacas en un arbol
        $lel=0;
        for($i=0; $i<$Numvacas; $i++)
        {
            $query = "SELECT * from vaca WHERE Arbol_IdM= '$Tree' OR Arbol_IdP='$Tree' ORDER BY Nivel ASC";//busca todas las vacas de ese arbol y busca sus padres
            $result = $con->query($query);
            $row = $result ->fetch_array(MYSQLI_ASSOC);
            $Padre = $row['IdPadre'];
            if ($result && $Padre=="")
            {
                $lel=1;
            }
            else if($lel==0)
            {
                $query1 ="SELECT Nivel FROM vaca WHERE Ejemplar= '$Padre'";//busca el nivel del padre y le suma uno
                $result1= $con->query($query1);
                $row1 = $result1 ->fetch_array(MYSQLI_ASSOC);
                $Nivel = $row1['Nivel'];
                $Nivel++;
                if($result1)
                {
                    $query2 = "UPDATE vaca SET Nivel= '$Nivel' WHERE IdPadre= '$Padre'"; //pone el nivel de su padre +1 a las vacas
                    $result2=$con->query($query2); 
                    if ($result2) {echo 'true';}
                    else {echo 'false'; }  
                }
            }     
        }
        $query="SELECT Nivel FROM vaca WHERE Arbol_Id='$Tree' ORDER BY Nivel DESC LIMIT 1";//busca cuántos niveles hay viendo cuál es el de más abajo xddd
        $row=$result->fetch_array(MYSQLI_ASSOC);
        $Num=$row['Nivel'];
        echo $query;
        $a=array();   
        for($i=1; $i<=$Num; $i++)
        {
            $query="SELECT count(*) FROM vaca WHERE Nivel= '$i' AND Arbol_id='$Tree'";//
            $result=$con->query($query);
            $row = $result ->fetch_array(MYSQLI_ASSOC);
            echo $row['count(*)'];
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
        /*AHORA Y TIENE ES EL NIVEL QUE TIENE MÁS vacaS Y X ES EL NÚMERO DE vacaS QUE TIENE ESE NIVEL
        EL ANCHO DEL DIV O LO QUE SEA DEPENDERÁ DE X, SERÁ UN ANCHO PARA QUE ESA CANTIDAD DE vacaS SE ACOMODEN
        */
        $ancho= $x*190; //ESTE SERÁ EL ANCHO QUE DEBE TENER EJ MAIN.JS PARA QUE QUEPAN TODAS LAS vacaS
?>
