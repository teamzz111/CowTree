<?php

    require_once 'Conexion.php';
    session_start();

    $Nombre = $_POST['nombre'];
    $Ejemplar = $_POST['ejemplar'];
	$Estado=$_POST["estado"];
	$Destino=$_POST["destino"];
    $Edad=$_POST["edad"];
    $Sexo=$_POST["sexo"];
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
    $Padre=$_POST["idpadre"];
    $Madre=$_POST["idmadre"];

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
        '$Ejemplar','$Nombre' ,'$Estado','$Destino','$Edad','$Sexo','$Herrado','$Destetado','$fecha_nacimiento','$Encaste',
        '$Reseña','','$Ganaderia','$Criador','$Fenotipo','$Defector','$Calificacion','$Comportamiento',
        '$Observadores','$Padre',$Madre)";
        $rs = $con->query($query);
        if ($rs) { echo 'true';}
        else{echo 'false';}
        
        $arbol="Arbol de $Nombre";
        if($Padre=="")
        {
            $query= "INSERT INTO arbol VALUES (0, '$arbol')";
            $rs=$con->query($query);
            if ($rs) // si la vaca que se acaba de crear no tiene padre, se crea un árbol y se le pone a la misma el id de ese arbol nuevo
            {
                $query="SELECT Id FROM arbol ORDER BY ID DESC LIMIT 1"; //BUSCA EL ÚLTIMO ÁRBOL QUE FUE CREADO PARA METER LAS VACAS AHÍ
                $result= $con->query($query); 
                if (!$result) {
                    trigger_error('Invalid query: ' . $con->error);
                }
                else 
                {
                    echo $query;
                    $row = $result ->fetch_array(MYSQLI_ASSOC);
                    $Tree= $row['Id'];//el id del árbol que se acaba de crear
    
                    $query1= "UPDATE vaca SET Arbol_Id= '$Tree' WHERE Ejemplar='$Ejemplar'"; //introduce la vaca al árbol recien creado
                    $rs = $con->query($query1);
                    if ($rs) { echo 'true';}
                    else{echo 'false';} 
                }  
            }
            else{echo 'false';}
        }
        else 
        }

    
        
    
?>
