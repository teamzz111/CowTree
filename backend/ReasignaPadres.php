<?php

function AsignaPadre($Ejemplar,$Padre,$Madre){
    if ($Padre != '') {
        $query = "SELECT * FROM rama WHERE IdVaca=$Padre";
        $result = $con->query($query);
        while ($row1 = $result->fetch_array(MYSQLI_ASSOC)) {
            $lvl = $row1['Nivel'] + 1;
            $Tree = $row1['IdArbol'];
            $query1 = "INSERT INTO rama VALUES ('$Tree', '$Ejemplar', '$lvl','')";
            $resultado = $con->query($query1);
            echo $con->error;
            if (!$resultado) {echo "false";}
        }
    }
    if ($Madre != '') {
        $query = "SELECT * FROM rama WHERE IdVaca=$Madre";
        $result = $con->query($query);
        while ($row1 = $result->fetch_array(MYSQLI_ASSOC)) {
            $lvl = $row1['Nivel'] + 1;
            $Tree = $row1['IdArbol'];
            $query1 = "INSERT INTO rama VALUES ('$Tree', '$Ejemplar', '$lvl','')";
            $resultado = $con->query($query1);
            echo $con->error;
            if (!$resultado) {echo "false";}
        }
    }
}

?>