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
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Registro de ganadero</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form id = "Registro" method="POST" action= "../backend/NuevoUsuario.php">
                                        <div class="form-group">
                                            <label>Nombre del usuario</label>
                                            <input type="text" name = "nombre" class="form-control" placeholder="Nombre">
                                        </div>
                                        <div class="form-group">
                                            <label>Cédula del usuario</label>
                                            <input type="number" name = "id" class="form-control" placeholder="Cédula del usuario">
                                        </div>
                                        <div class="form-group">
                                            <label>Cargo</label>
                                            <select class="form-control" name = "cargo">
                                                <option value="Ganadero">Ganadero</option>
                                                <option value="Dueno">Dueño</option>
                                                <option value="Criador">Criador</option>
                                            </select>                                       </div>
                                        <div class="form-group" >
                                            <label>Ganaderia</label>
                                            <select class = "form-control" id="" name = "ganaderia">

                                            
                                            <?php
                                                $rs = $con->query('SELECT Nombre FROM ganaderia');
                                                while($row = $rs->fetch_array(MYSQLI_ASSOC)){
                                            ?>
                                                <option value = "<?php echo $row['Nombre']; ?>"> <?php echo $row['Nombre']; ?> </option>";                                        
                                                <?php } ?>

                                        </select>
                                        </div>
                                        <div class="exito" style = "display: none; padding-bottom: 0.5em">
                                            <p>Usuario o contraseña incorrecta</p>
                                            <br>
                                        </div>
                                        <button type="submit" class="btn btn-default">Registrar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <!-- /# column -->
                </div>

                    <!-- /# column -->
                    <!-- /# column -->
                </div>
                <!-- /# row -->
            </div>
        </div>
        <!-- /# column -->

        <!-- /# column -->
    </div>
    <!-- /# row -->

    <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
    <!-- footer -->
    <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="https://colorlib.com">Colorlib</a></footer>
    <!-- End footer -->
    </div>
    <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>