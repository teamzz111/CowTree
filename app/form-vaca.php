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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Registro de ganado</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form id = "RegistroVacas">
                                        <div class="form-group">
                                            <label>Nombre del ejemplar</label>
                                            <input type="text" name = "nombre" class="form-control" placeholder="Nombre">
                                        </div>
                                        <div class="form-group">
                                            <label>Ejemlar</label>
                                            <input type="text" name = "ejemplar" class="form-control" placeholder="Ejemplar">
                                        </div>
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <input type="text" name = "estado" class="form-control" placeholder="Estado">
                                        </div>
                                        <div class="form-group">
                                            <label>Destino</label>
                                            <input type="text" name = "destino" class="form-control" placeholder="Destino">
                                        </div>
                                        <div class="form-group">
                                            <label>Edad</label>
                                            <input type="text" name = "edad" class="form-control" placeholder="Edad">
                                        </div>
                                        <div class="form-group">
                                            <label>Herrado</label>
                                            <input type="text" name = "herrado" class="form-control" placeholder="Herrado">
                                        </div>
                                        <div class="form-group">
                                            <label>Destetado</label>
                                            <input type="text" name =  "destetado" class="form-control" placeholder="Destetado">
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha nacimiento</label>
                                            <input type="text" name = "fecha_nacimiento" class="form-control" placeholder="Fecha de nacimiento">
                                        </div>
                                        <div class="form-group">
                                            <label>Encaste</label>
                                            <input type="text" name = "encaste" class="form-control" placeholder="Encaste">
                                        </div>
                                        <div class="form-group">
                                            <label>Reseña</label>
                                            <input type="text" name = "reseña" class="form-control" placeholder="Reseña">
                                        </div>
                                        <div class="form-group">
                                            <label>Árbol ID</label>
                                            <input type="text" name = "arbol_id" class="form-control" placeholder="ID del arbol">
                                        </div>
                                        <div class="form-group">
                                            <label>Ganaderia</label>
                                            <input type="text" name = "ganaderia_id" class="form-control" placeholder="Ganaderia">
                                        </div>
                                        <div class="form-group">
                                            <label>Criador</label>
                                            <input type="text" name = "criador_id" class="form-control" placeholder="CC del criador">
                                        </div>
                                        <div class="form-group">
                                            <label>Fenotipo</label>
                                            <input type="text" name = "fenotipo" class="form-control" placeholder="Fenotipo">
                                        </div>
                                        <div class="form-group">
                                            <label>Defectos</label>
                                            <input type="text" name = "defectos" class="form-control" placeholder="Defectos">
                                        </div>
                                        <div class="form-group">
                                            <label>Calificación</label>
                                            <input type="text" name = "calificacion" class="form-control" placeholder="Calificación">
                                        </div>

                                        <div class="form-group">
                                            <label>Comportamiento</label>
                                            <input type="text" name = "comportamiento" class="form-control" placeholder="Comportamiento">
                                        </div>
                                        <div class="form-group">
                                            <label>Observadores</label>
                                            <input type="text" name = "observadores" class="form-control" placeholder="Observadores">
                                        </div>
                                        <div class="form-group">
                                            <label>Pareja</label>
                                            <input type="text" name = "idpadre" class="form-control" placeholder="Pareja">
                                        </div>
                                        <div class="form-group">
                                            <label>Padre</label>
                                            <input type="text" name = "idpareja" class="form-control" placeholder="Padre">
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