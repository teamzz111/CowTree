<?php 
    require_once("../backend/Conexion.php");
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
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fas fa-feather f-s-40 color-primary"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2>
                                <?php
                                    $result = $con->query('SELECT count(*) as total FROM vaca') or  die("Last error: {$con->error}\n");
                                    $row = $result ->fetch_array(MYSQLI_ASSOC);
                                    echo $row['total'];
                                ?>
                            </h2>
                            <p class="m-b-0">Ganado registrado</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fas fa-tree f-s-40 color-success"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2>
                                <?php
                                    $result = $con->query('SELECT count(*) as total FROM arbol');
                                    $row = $result ->fetch_array(MYSQLI_ASSOC);
                                    echo $row['total'];
                                ?>
                            </h2>
                            <p class="m-b-0">Árboles registrados</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2>
                                <?php
                                    $result = $con->query('SELECT count(*) as total FROM ganaderia');
                                    $row = $result ->fetch_array(MYSQLI_ASSOC);
                                    echo $row['total'];
                                ?>
                            </h2>
                            <p class="m-b-0">Ganaderias</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2>
                                <?php
                                    $result = $con->query('SELECT count(*) as total FROM usuario');
                                    $row = $result ->fetch_array(MYSQLI_ASSOC);
                                     echo $row['total'];
                                ?>
                            </h2>
                            <p class="m-b-0">Usuarios</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
        <div class="row">

            <div class="col-lg-5">
                <div class="card">
                    <div class="card-title">
                        <h4>Usuarios registrados </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Ganaderia</th>
                                        <th>Cargo</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $result = $con->query('SELECT ganaderia.Nombre AS ganaderia_nombre, usuario.Nombre, usuario.Cargo FROM usuario LEFT JOIN ganaderia ON usuario.Ganaderia_Id = ganaderia.Id');
                                        while($elemento = $result-> fetch_array(MYSQLI_ASSOC)):
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="round-img">
                                                <a href=""><img src="images/avatar/4.jpg" alt=""></a>
                                            </div>
                                        </td>
                                        <td>
                                            <?php echo $elemento['Nombre']; ?>
                                        </td>
                                        <td><span>
                                                <?php echo $elemento['ganaderia_nombre']; ?></span></td>
                                        <td><span>
                                                <?php echo $elemento['Cargo']; ?></span></td>
                                        <td><span class="badge badge-success">Activo</span></td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-title">
                        <h4>Ganado registrado </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Ejemplar</th>
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                        <th>Destino</th>
                                        <th>Encaste</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = $con->query('SELECT Ejemplar, Nombre, Estado, Destino, Encaste FROM vaca');
                                    while($elemento = $result-> fetch_array(MYSQLI_ASSOC)):
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $elemento['Ejemplar']; ?>
                                        </td>
                                        <td><span>
                                                <?php 
                                                if(!isset($elemento['Nombre'])){
                                                    echo "Sin definir";
                                                } else {
                                                    echo $elemento['Nombre'];} ?></span></td>

                                        <td><span>
                                                <?php echo $elemento['Estado']; ?></span></td>
                                        <td><span>
                                                <?php echo $elemento['Destino']; ?></span></td>
                                        <td><span>
                                                <?php echo $elemento['Encaste']; ?></span></td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <!-- End Container fluid  -->
    <?php include("estructura/footer.php"); ?>

</body>

</html>