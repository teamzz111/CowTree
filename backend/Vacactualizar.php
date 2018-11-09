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
    <?php include("estructura/header.php"); 
    $Vaca = $_POST['vaca'];
    $query="SELECT * FROM vaca WHERE Ejemplar='$Vaca'";
    $resultado = $con->query($query1);
    $row = $result->fetch_array(MYSQLI_ASSOC); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4>Actualización de ganado</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form id="RegistroVacas">
                                <div class="form-group">
                                    <label>Nombre del ejemplar</label>
                                    <input  type="text" name="nombre" class="form-control" value="<?php echo $row['Nombre']; ?>" placeholder="Ingrese Nombre" >
                                </div>
                                <div class="form-group">
                                    <label>Ejemplar</label>
                                    <input type="text" name="ejemplar" class="form-control" value="<?php echo $row['Ejemplar']; ?>" placeholder="Ingrese Ejemplar" >
                                </div>
                                <div class="form-group">
                                    <label>Estado</label>
                                    <input type="text" name="estado" class="form-control" value="<?php echo $row['Estado']; ?>" placeholder="Ingrese Estado">
                                </div>
                                <div class="form-group">
                                    <label>Destino</label>
                                    <input type="text" name="destino" class="form-control" value="<?php echo $row['Destino']; ?>" placeholder="Ingrese Destino">
                                </div>
                                <div class="form-group">
                                    <label>Edad</label>
                                    <input type="number" name="edad" class="form-control" value="<?php echo $row['Edad']; ?>"placeholder="Ingrese Edad">
                                </div>
                                <div class="form-group">
                                    <label>Herrado</label>
                                    <br>
                                    <select name="herrado" id="" class="name">
                                       <?php if($row['Herrado']=='sí')
                                       {
                                         ?><option selected value="sí">Sí</option>
                                         <option value="no">No</option>
                                       <?php 
                                       }
                                       else
                                       { ?>
                                        <option value="sí">Sí</option>
                                        <option selected value="no">No</option>
                                       <?php 
                                       }
                                       ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Destetado</label>
                                    <br>
                                    <select name="destetado" id="" class="name">
                                       <?php if($row['Destetado']=='sí')
                                       {
                                         ?><option selected value="sí">Sí</option>
                                         <option value="no">No</option>
                                       <?php 
                                       }
                                       else
                                       { ?>
                                        <option value="sí">Sí</option>
                                        <option selected value="no">No</option>
                                       <?php 
                                       }
                                       ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Fecha nacimiento</label>
                                    <input type="date" name="fecha_nacimiento" value="<?php echo $row['Fecha_nacimiento']; ?>" class="form-control" placeholder="Ingrese Fecha de nacimiento">
                                </div>
                                </div>
                                <div class="form-group">
                                    <label>Encaste</label>
                                    <input type="text" name="encaste" class="form-control" value="<?php echo $row['Encaste']; ?>" placeholder="Ingrese encaste">
                                </div>
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <br>
                                    <select name="sexo" id="" class="name">
                                        <option value="Macho">Macho</option>
                                        <option value="Hembra">Hembra</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Reseña</label>
                                    <input type="text" name="reseña" class="form-control" value="<?php echo $row['Reseña']; ?>" placeholder="Ingrese Reseña">
                                </div>
                                <div class="form-group">
                                    <label>Ganadero</label>
                                    <select data-placeholder="Elija un usuario o busque" id="select-beast" name="criador_id">
                                        <?php 
                                                $rs = $con->query("SELECT ganaderia.Nombre, usuario.Nombre, usuario.Id
                                                FROM usuario
                                                LEFT JOIN ganaderia ON ganaderia.Id = usuario.Ganaderia_Id;");
                                                while($row1 = $rs->fetch_array(MYSQLI_ASSOC)):
                                        if ($row1['Id']==$row['Ganaderia_Id']){?>
                                        <option selected value="<?php echo $row1['Id']; ?>">
                                            <?php echo$row1['Nombre'];?>
                                        </option>
                                                <?php //QUEDA PENDIENTE }
                                            else
                                            { ?>
                                            <option value="<?php echo $row1['Id']; ?>">
                                                <?php echo$row1['Nombre'];?>
                                            </option> 
                                            <?php } endwhile; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Ganaderia</label>
                                    <br>
                                    <select name="ganaderia_id" id="ganaderia_id">
                                        <?php
                                            $rs = $con->query('SELECT Id, Nombre FROM ganaderia');
                                            while($row1 = $rs->fetch_array(MYSQLI_ASSOC)):
                                        ?>
                                            <option value="<?php echo $row1['Id']; ?>">
                                                <?php echo $row1['Nombre']; ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label>Padre</label>
                                <select data-placeholder="Elija el padre del ejemplar" id="select-beast" name="idpadre">
                                        <?php 
                                                $rs = $con->query("SELECT Nombre, Ejemplar FROM vaca WHERE sexo='Macho'");
                                                while($row1 = $rs->fetch_array(MYSQLI_ASSOC)):
                                        ?>
                                        <option value="<?php echo $row1['Ejemplar']; ?>">
                                            <?php echo$row1['Nombre'];?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label>Madre</label>
                                
                                    <select data-placeholder="Elija la madre del ejemplar" id="select-beast" name="idmadre">
                                        <?php 
                                                $rs = $con->query("SELECT Nombre, Ejemplar FROM vaca WHERE sexo='Hembra'");
                                                while($row1 = $rs->fetch_array(MYSQLI_ASSOC)):
                                        ?>
                                        <option value="<?php echo $row1['Ejemplar']; ?>">
                                            <?php echo$row1['Nombre'];?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Fenotipo</label>
                                    <input type="text" name="fenotipo" value="<?php echo $row['Fenotipo']; ?>" class="form-control" placeholder="Ingrese Fenotipo">
                                </div>
                                <div class="form-group">
                                    <label>Defectos</label>
                                    <input type="text" name="defectos" value="<?php echo $row['Defectos']; ?>" class="form-control" placeholder="Ingrese Defectos">
                                </div>
                                <div class="form-group">
                                    <label>Calificación</label>
                                    <input type="number" name="calificacion" value="<?php echo $row['Calificacion']; ?>" class="form-control" placeholder="Ingrese Calificación">
                                </div>

                                <div class="form-group">
                                    <label>Comportamiento</label>
                                    <input type="text" name="comportamiento" value="<?php echo $row['Comportamiento']; ?>" class="form-control" placeholder="Ingrese Comportamiento">
                                </div>
                                <div class="form-group">
                                    <label>Observadores</label>
                                    <input type="text" name="observadores" value="<?php echo $row['Observadores']; ?>" class="form-control" placeholder="Ingrese Observadores">
                                </div>
                      
                                <div class="exito" style="display: none; padding-bottom: 0.5em">
                                    <p>Usuario o contraseña incorrecta</p>
                                    <br>
                                </div>
                                <button type="submit" class="btn btn-default">Modificar</button>
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