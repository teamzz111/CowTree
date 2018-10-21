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
            <div class="col-xl-12 ">
                <div class="card ">
                    <div class="card-title">
                        <h4>Ganado registrado</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table center-block">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th class="hidden-sm-down">Ejemplar</th>
                                        <th class="hidden-sm-down">Estado</th>
                                        <th class="hidden-md-down">Edad</th>
                                        <th class="hidden-md-down">Herrado</t>
                                        <th class="hidden-md-down">Destetado</th>
                                        <th>Ver reporte</th>
                                    
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
                                        <td class="hidden-sm-down"> <span>
                                                <?php echo $elemento['Ejemplar']; ?></span></td>
                                        <td class="hidden-sm-down"><span>
                                                <?php echo $elemento['Estado']; ?></span></td>
                                        <td class="hidden-md-down"><span>
                                                <?php echo $elemento['Edad']; ?></span></td>
                                        <td class="hidden-md-down"><span>
                                                <?php echo $elemento['Destetado']; ?></span></td>
                                        <td class="hidden-md-down"><span>
                                                <?php echo $elemento['Herrado']; ?></span></td>
                                        <td>
                                            
                                                <button type="button" class="btn btn-warning" onclick="location.href = 'pdf.php'">Generar</button>
                                           
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