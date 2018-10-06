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
    <?php include("estructura/footer.php"); ?>
    <script>
    !function(e){function t(n){if(o[n])return o[n].exports;var r=o[n]={i:n,l:!1,exports:{}};return e[n].call(r.exports,r,r.exports,t),r.l=!0,r.exports}var o={};t.m=e,t.c=o,t.d=function(e,o,n){t.o(e,o)||Object.defineProperty(e,o,{configurable:!1,enumerable:!0,get:n})},t.n=function(e){var o=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(o,"a",o),o},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="",t(t.s=0)}([function(e,t,o){"use strict";var n="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},r=o(1),u={passive:!0,capture:!1},i=["scroll","wheel","touchstart","touchmove","touchenter","touchend","touchleave","mouseout","mouseleave","mouseup","mousedown","mousemove","mouseenter","mousewheel","mouseover"],s=function(e,t){return void 0!==e?e:-1!==i.indexOf(t)&&u.passive},c=function(e){var t=Object.getOwnPropertyDescriptor(e,"passive");return t&&!0!==t.writable&&void 0===t.set?Object.assign({},e):e};if((0,r.eventListenerOptionsSupported)()){var p=EventTarget.prototype.addEventListener;!function(e){EventTarget.prototype.addEventListener=function(t,o,r){var i="object"===(void 0===r?"undefined":n(r))&&null!==r,p=i?r.capture:r;r=i?c(r):{},r.passive=s(r.passive,t),r.capture=void 0===p?u.capture:p,e.call(this,t,o,r)},EventTarget.prototype.addEventListener._original=e}(p)}},function(e,t,o){"use strict";Object.defineProperty(t,"__esModule",{value:!0});t.eventListenerOptionsSupported=function(){var e=!1;try{var t=Object.defineProperty({},"passive",{get:function(){e=!0}});window.addEventListener("test",null,t),window.removeEventListener("test",null,t)}catch(e){}return e}}]);
//# sourceMappingURL=index.js.map</script>
</body>

</html>