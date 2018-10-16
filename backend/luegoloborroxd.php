<?php

$query = "SELECT count(*) FROM Vaca WHERE Arbol_Id= '$LAvariabledelarbolxd'" ;
$result = $con->query($query);
$row = $result ->fetch_array(MYSQLI_ASSOC);
$NumVacas = $row['count(*)'];//número de vacas en un arbol

$lel=0;
for($i=0; $i<$NumVacas; $i++)
{
    $query = "SELECT * from Vaca WHERE Arbol_Id= '$LAvariabledelarbolxd'";//busca todas las vacas de ese arbol y busca sus padres
    $result = $con->query($query);
    $row = $result ->fetch_array(MYSQLI_ASSOC);
    $Padre = $row['IdPadre'];
    if ($result && $Padre=="")
    {
        $lel=1;
    }
    else if($lel==0)
    {
        $query1 "SELECT Nivel FROM Vaca WHERE Id= '$Padre'";//busca el nivel del padre y le suma uno
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
$query="SELECT TOP 1 Nivel FROM Vaca WHERE Id_Arbol='$LAvariabledelarbolxd' ORDER BY Nivel DESC";//busca cuántos niveles hay viendo cuál es el de más abajo xddd
$result =$con->query($query);
$row=$result->fetch_array(MYSQLI_ASSOC);
$Num=$row['Nivel'];

$a=array();   
for($i=1; i<=$Num; $i++)
{
    $query="SELECT count(*) FROM Vaca WHERE Nivel= '$i' AND Arbol_id='$LAvariabledelarbolxd'";//
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