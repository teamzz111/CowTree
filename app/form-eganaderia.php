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
                        <h4>Ganaderías registradas</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Ubicación</th>
                                        <th>Divisa</th>
                                        <th>Lineas</th>
                                        <th>Modificar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = $con->query('SELECT Id, Nombre, Ubicación, Divisa, Encastes, Lineas FROM ganaderia');
                                    while($elemento = $result-> fetch_array(MYSQLI_ASSOC)):
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $elemento['Id']; ?>
                                        </td>
                                        <td><span>
                                                <?php 
                                                if(!isset($elemento['Nombre'])){
                                                    echo "Sin definir";
                                                } else {
                                                    echo $elemento['Nombre'];} ?></span></td>
                                        <td><span>
                                                <?php echo $elemento['Ubicación']; ?></span></td>
                                        <td><span>
                                                <?php echo $elemento['Divisa']; ?></span></td>
                                        <td><span>
                                                <?php echo $elemento['Lineas']; ?></span></td>
                                        <td>

                                            <button type="button" class="btn btn-success" onclick="function(<?php echo $elemento['Id']; ?>)">Modificar</button>
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