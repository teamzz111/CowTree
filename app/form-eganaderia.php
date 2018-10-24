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
                            <table class="table" id = "dtBasicExample">
                                <thead>
                                    <tr>
                                        <th class = "hidden-md-down">ID</th>
                                        <th>Nombre</th>
                                        <th class = "hidden-xs-down">Ubicación</th>
                                        <th class = "hidden-sm-down">Divisa</th>
                                        <th class = "hidden-md-down">Lineas</th>
                                        <th>Modificar</th>
                                        <th class = "hidden-xs-down">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = $con->query('SELECT Id, Nombre, Ubicacion, Divisa, Encastes, Lineas FROM ganaderia');
                                    while($elemento = $result-> fetch_array(MYSQLI_ASSOC)):
                                ?>
                                    <tr>
                                        <td class = "hidden-md-down">
                                            <?php echo $elemento['Id']; ?>
                                        </td>
                                        <td><span>
                                                <?php 
                                                if(!isset($elemento['Nombre'])){
                                                    echo "Sin definir";
                                                } else {
                                                    echo $elemento['Nombre'];} ?></span></td>
                                        <td class = "hidden-xs-down" ><span>
                                                <?php echo $elemento['Ubicacion']; ?></span></td>
                                        <td class = "hidden-sm-down"><span>
                                                <?php echo $elemento['Divisa']; ?></span></td>
                                        <td class = "hidden-md-down"><span>
                                                <?php echo $elemento['Lineas']; ?></span></td>
                                        <td>

                                            <button type="button" class="btn btn-success" onclick="function(<?php echo $elemento['Id']; ?>)">Modificar</button>
                                        </td>
                                        <td class = "hidden-xs-down">
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
    <script>

    </script>
</body>

</html>