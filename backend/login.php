<?php
    require_once 'Conexion.php';

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $result = $con->query("SELECT Pass, Nombre, Cargo FROM usuario WHERE Id = " . $user);
    if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        //if (encrypt($pass, $key) == $row['contrasena']){
        if ($row['Pass'] == $pass) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user;
            $_SESSION['cargo'] = $row['Cargo'];
            echo nl2br("true");
        } else {
            echo nl2br("false");
        }
    } else {
        echo nl2br("noexiste");
    }
?>

