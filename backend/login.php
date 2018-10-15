<?php
    require_once('Conexion.php');

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $result = $con->query("SELECT Pass, Nombre, Cargo FROM usuario WHERE Id = ".$user);
    if($result->num_rows > 0){
        $row = $result ->fetch_array(MYSQLI_ASSOC);
        //if (encrypt($pass, $key) == $row['contrasena']){
        if($row['Pass'] == $pass){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user;
            $_SESSION['cargo'] = $row['Cargo'];
                echo "true";
            }
            else{
                echo "false";
            }
    } else {
        echo "noexiste";
    }
?>