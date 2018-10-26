<?php

    require_once ('Conexion.php');
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
        '$Reseña','$Ganaderia','$Criador','$Fenotipo','$Defector','$Calificacion','$Comportamiento',
        '$Observadores','$Padre','$Madre')";
        $rs = $con->query($query);
        if (!$rs) {echo 'false';}
        
        $arbol="Arbol de $Nombre";
        
            $query= "INSERT INTO arbol VALUES (0, '$arbol')";//SE CREA EL ÁRBOL DE LA VACA QUE SE ACABA DE INSERTAR
            $rs=$con->query($query);
            if ($rs) 
            {
                $query="SELECT Id FROM arbol ORDER BY ID DESC LIMIT 1"; //BUSCA EL ÚLTIMO ÁRBOL QUE FUE CREADO PARA METER LA VACAS AHÍ
                $result= $con->query($query); 
                if (!$result) {
                    trigger_error('Invalid query: ' . $con->error);
                }
                else 
                {
                    $row = $result ->fetch_array(MYSQLI_ASSOC);
                    $Tree= $row['Id'];//el id del árbol que se acaba de crear
    
                    $query1= "INSERT INTO rama VALUES ('$Tree','$Ejemplar','1')"; //introduce la vaca al árbol recien creado    
                    $rs = $con->query($query1);
                    if (!$rs){echo 'false';} 
                }  
            }
            else{echo 'false'; echo $con->error;}
        
        
            //$result=false;
            $resul=false;
            if($Padre!='')
            {                
                $query="SELECT count(*) FROM rama WHERE IdVaca='$Padre'";
                $result=$con->query($query);
                $row = $result ->fetch_array(MYSQLI_ASSOC);
                $Numvacas = $row['count(*)'];
                echo $Numvacas;

                /*for($i=0; $i<$Numvacas; $i++)
                {
                    $query="SELECT IdArbol FROM rama WHERE IdVaca=$Padre";     
                    $query"INSERT INTO rama VALUES ('$a[$i]','$Ejemplar',)";
                    
                }

               /* 
                
                
                while($fila=$result->fetch_array(MYSQLI_ASSOC))
                {
                    $lel=$fila['IdArbol'];
                    $query="SELECT IdArbol FROM rama WHERE IdVaca=$Padre";
                    echo $lel;
                    $query1="SELECT Nivel FROM rama WHERE IdArbol=$lel AND IdVaca=$Padre";
                    $row = $result ->fetch_array(MYSQLI_ASSOC);
                    $lvl = $row['Nivel']+1;
                    
                    $query1="INSERT INTO rama VALUES ('$lel','$Ejemplar','$lvl')";
                    $result1 = $con->query($query);
                    if(!$result1){echo "false";}
                }*/
            }
            if($Madre!='')
            {
                $query="SELECT IdArbol FROM rama WHERE IdVaca=$Madre";
                $resul = $con->query($query);
                echo $con->error;

                while($fila=$resul->fetch_array(MYSQLI_ASSOC))
                {
                    $lel=$fila['IdArbol'];
                    $query1="SELECT Nivel FROM rama WHERE IdArbol=$lel AND IdVaca=$Madre";
                    $row = $resul ->fetch_array(MYSQLI_ASSOC);
                    $lvl = $row['Nivel']+1;
                    
                    $query1="INSERT INTO rama VALUES ('$lel','$Ejemplar','$lvl')";
                    $result1 = $con->query($query);
                    if(!$result1){echo "false";}
                }
            }
            //if(($resul || $result) || $rs){echo "true";}
            //else {echo false;}
        }        
        
        
    
?>
