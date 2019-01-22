<?php
    require_once 'Conexion.php';
    session_start();

    
    $Nombre = $_POST['nombre'];
    $Ejemplar = $_POST['ejemplar'];
    $Estado = $_POST["estado"];
    $Destino = $_POST["destino"];
    $Edad = $_POST["edad"];
    $Sexo = $_POST["sexo"];
    $Herrado = $_POST["herrado"];
    $Destetado = $_POST["destetado"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $Encaste = $_POST["encaste"];
    $Reseña = $_POST["reseña"];
    $Ganaderia = $_POST["ganaderia_id"];
    $Criador = $_POST["criador_id"];
    $Fenotipo = $_POST["fenotipo"];
    $Defector = $_POST["defectos"];
    $Calificacion = $_POST["calificacion"];
    $Comportamiento = $_POST["comportamiento"];
    $Observadores = $_POST["observadores"];
    $Padre = $_POST["idpadre"];
    $Madre = $_POST["idmadre"];
?>