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
    <link rel="stylesheet" href="../css/selectize.css">
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
                            <form id="RegistroVacas">
                                <div class="form-group">
                                    <label>Nombre del ejemplar</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre">
                                </div>
                                <div class="form-group">
                                    <label>Ejemlar</label>
                                    <input type="text" name="ejemplar" class="form-control" placeholder="Ingrese Ejemplar">
                                </div>
                                <div class="form-group">
                                    <label>Estado</label>
                                    <input type="text" name="estado" class="form-control" placeholder="Ingrese Estado">
                                </div>
                                <div class="form-group">
                                    <label>Destino</label>
                                    <input type="text" name="destino" class="form-control" placeholder="Ingrese Destino">
                                </div>
                                <div class="form-group">
                                    <label>Edad</label>
                                    <input type="number" name="edad" class="form-control" placeholder="Ingrese Edad">
                                </div>
                                <div class="form-group">
                                    <label>Herrado</label>
                                    <br>
                                    <select name="herrado" id="" class="name">
                                        <option value="sí">Sí</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Destetado</label>
                                    <br>
                                    <select name="destetado" id="" class="name">
                                        <option value="sí">Sí</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                                                                <div class="form-group">
                                    <label>Sexo</label>
                                    <br>
                                    <select name="sexo" id="" class="name">
                                        <option value="macho">Macho</option>
                                        <option value="hembra">Hembra</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Fecha nacimiento</label>
                                    <input type="date" name="fecha_nacimiento" class="form-control" placeholder="Ingrese Fecha de nacimiento">
                                </div>
                                <div class="form-group">
                                    <label>Encaste</label>
                                    <br>
                                    <select name="encaste" id="" class="name">
                                        <option value="sí">Sí</option>
                                        <option value="no">No</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Reseña</label>
                                    <input type="text" name="reseña" class="form-control" placeholder="Ingrese Reseña">
                                </div>
                                <div class="form-group">
                                    <label>Ganadero</label>
                                    <select data-placeholder="Elija un usuario o busque" id="select-beast" name="criador_id">
                                        <?php 
                                                $rs = $con->query("SELECT ganaderia.Nombre, usuario.Nombre, usuario.Id
                                                FROM usuario
                                                LEFT JOIN ganaderia ON ganaderia.Id = usuario.Ganaderia_Id;");
                                                while($row = $rs->fetch_array(MYSQLI_ASSOC)):
                                        ?>
                                        <option value="<?php echo $row['Id']; ?>">
                                            <?php echo$row['Nombre'];?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Árbol ID</label>
                                    <select data-placeholder="Elija un usuario o busque" id="arbol" name="arbol_id">
                                            <?php 
                                                $rs = $con->query("SELECT * FROM arbol"); 
                                                while($row = $rs->fetch_array(MYSQLI_ASSOC)):
                                            ?>
                                            <option value="<?php echo $row['Id']; ?>">
                                                   <?php echo$row['Nombre'];?>
                                            </option>
                                            <?php endwhile; ?>
                                    </select>                                    
                
                                </div>
                                <div class="form-group">
                                    <label>Ganaderia</label>
                                    <br>
                                    <select name="ganaderia_id" id="ganaderia_id">
                                        <?php
                                            $rs = $con->query('SELECT Id, Nombre FROM ganaderia');
                                            while($row = $rs->fetch_array(MYSQLI_ASSOC)):
                                        ?>
                                            <option value="<?php echo $row['Id']; ?>">
                                                <?php echo $row['Nombre']; ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Fenotipo</label>
                                    <input type="text" name="fenotipo" class="form-control" placeholder="Ingrese Fenotipo">
                                </div>
                                <div class="form-group">
                                    <label>Defectos</label>
                                    <input type="text" name="defectos" class="form-control" placeholder="Ingrese Defectos">
                                </div>
                                <div class="form-group">
                                    <label>Calificación</label>
                                    <input type="number" name="calificacion" class="form-control" placeholder="Ingrese Calificación">
                                </div>

                                <div class="form-group">
                                    <label>Comportamiento</label>
                                    <input type="text" name="comportamiento" class="form-control" placeholder="Ingrese Comportamiento">
                                </div>
                                <div class="form-group">
                                    <label>Observadores</label>
                                    <input type="text" name="observadores" class="form-control" placeholder="Ingrese Observadores">
                                </div>
                                <div class="form-group">
                                    <label>Pareja</label>
                                    <input type="text" name="idpadre" class="form-control" placeholder="Ingrese Pareja">
                                </div>
                                <div class="form-group">
                                    <label>Padre</label>
                                    <input type="text" name="idpareja" class="form-control" placeholder="Ingrese Padre">
                                </div>
                                <div class="exito" style="display: none; padding-bottom: 0.5em">
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

    <?php include("estructura/footer.php"); ?>
    <script src="../js/microplugin.js"></script>
    <script src="../js/sifter.js"></script>
    <script src="../js/selectize.js"></script>
    <script>
        $('#select-beast, #ganaderia_id, #arbol').selectize({
            highlight: false,
            create: false,
            sortField: 'text'
        });
    </script>

</body>

</html>