<?php require_once("../backend/Conexion.php");
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header("Location: ../index.html");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("estructura/head.php"); ?>
</head>

<body class="fix-header fix-sidebar">
    <?php include("estructura/header.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-title">
                        <h4>Ganado registrado</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Ejemplar</th>
                                        <th>Estado</th>
                                        <th>Edad</th>
                                        <th>Herrado</th>
                                        <th>Destetado</th>
                                        <th>Modificar</th>
                                        <th>Borrar</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = $con->query('SELECT Nombre, Ejemplar, Estado, Edad, Herrado, Destetado FROM vaca');
                                    while($elemento = $result-> fetch_array(MYSQLI_ASSOC)):
                                ?>
                                    <tr>

                                        <td><span>
                                                <?php 
                                                if(!isset($elemento['Nombre'])){
                                                    echo "Sin definir";
                                                } else {
                                                    echo $elemento['Nombre'];} ?></span></td>
                                        <td><span>
                                                <?php echo $elemento['Ejemplar']; ?></span></td>
                                        <td><span>
                                                <?php echo $elemento['Estado']; ?></span></td>
                                        <td><span>
                                                <?php echo $elemento['Edad']; ?></span></td>
                                        <td><span>
                                                <?php echo $elemento['Destetado']; ?></span></td>
                                                <td><span>
                                                <?php echo $elemento['Herrado']; ?></span></td>
                                        <td>

                                            <button type="button" class="btn btn-success" onclick="function(<?php echo $elemento['Ejemplar']; ?>)">Modificar</button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger">Eliminar</button>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("estructura/footer.php"); ?>
</body>

</html>