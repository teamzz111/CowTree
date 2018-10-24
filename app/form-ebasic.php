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
                        <h4>Ganaderos registrados</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id = "dtBasicExample">
                                <thead>
                                    <tr>
                                        <th class="hidden-md-down">ID</th>
                                        <th>Nombre</th>
                                        <th class="hidden-sm-down">Ganaderia</th>
                                        <th class = "hidden-xs-down">Cargo</th>
                                        <th>Modificar</th>
                 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = $con->query(
                                'SELECT ganaderia.Nombre AS ganaderia_nombre, usuario.Id, usuario.Nombre, usuario.Cargo FROM usuario LEFT JOIN ganaderia ON usuario.Ganaderia_Id = ganaderia.Id LIMIT 10');
                                        echo $con->error;
                                while($elemento = $result-> fetch_array(MYSQLI_ASSOC)):
                                ?>
                                    <tr>
                                        <td class="hidden-md-down">
                                            <?php echo $elemento['Id']; ?>
                                        </td>
                                        <td><span>
                                                <?php 
                                                if(!isset($elemento['Nombre'])){
                                                    echo "Sin definir";
                                                } else {
                                                    echo $elemento['Nombre'];} ?></span></td>
                                        <td class="hidden-sm-down"> <span>
                                                <?php echo $elemento['ganaderia_nombre']; ?></span></td>
                                        <td class = "hidden-xs-down"><span>
                                                <?php echo $elemento['Cargo']; ?></span></td>                            
                                        <td>

                                            <button type="button" class="btn btn-success" onclick="function(<?php echo $elemento['Id']; ?>)">Modificar</button>
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
        ! function (e) {
            function t(n) {
                if (o[n]) return o[n].exports;
                var r = o[n] = {
                    i: n,
                    l: !1,
                    exports: {}
                };
                return e[n].call(r.exports, r, r.exports, t), r.l = !0, r.exports
            }
            var o = {};
            t.m = e, t.c = o, t.d = function (e, o, n) {
                t.o(e, o) || Object.defineProperty(e, o, {
                    configurable: !1,
                    enumerable: !0,
                    get: n
                })
            }, t.n = function (e) {
                var o = e && e.__esModule ? function () {
                    return e.default
                } : function () {
                    return e
                };
                return t.d(o, "a", o), o
            }, t.o = function (e, t) {
                return Object.prototype.hasOwnProperty.call(e, t)
            }, t.p = "", t(t.s = 0)
        }([function (e, t, o) {
            "use strict";
            var n = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                    return typeof e
                } : function (e) {
                    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ?
                        "symbol" : typeof e
                },
                r = o(1),
                u = {
                    passive: !0,
                    capture: !1
                },
                i = ["scroll", "wheel", "touchstart", "touchmove", "touchenter", "touchend", "touchleave",
                    "mouseout", "mouseleave", "mouseup", "mousedown", "mousemove", "mouseenter", "mousewheel",
                    "mouseover"
                ],
                s = function (e, t) {
                    return void 0 !== e ? e : -1 !== i.indexOf(t) && u.passive
                },
                c = function (e) {
                    var t = Object.getOwnPropertyDescriptor(e, "passive");
                    return t && !0 !== t.writable && void 0 === t.set ? Object.assign({}, e) : e
                };
            if ((0, r.eventListenerOptionsSupported)()) {
                var p = EventTarget.prototype.addEventListener;
                ! function (e) {
                    EventTarget.prototype.addEventListener = function (t, o, r) {
                        var i = "object" === (void 0 === r ? "undefined" : n(r)) && null !== r,
                            p = i ? r.capture : r;
                        r = i ? c(r) : {}, r.passive = s(r.passive, t), r.capture = void 0 === p ? u.capture :
                            p, e.call(this, t, o, r)
                    }, EventTarget.prototype.addEventListener._original = e
                }(p)
            }
        }, function (e, t, o) {
            "use strict";
            Object.defineProperty(t, "__esModule", {
                value: !0
            });
            t.eventListenerOptionsSupported = function () {
                var e = !1;
                try {
                    var t = Object.defineProperty({}, "passive", {
                        get: function () {
                            e = !0
                        }
                    });
                    window.addEventListener("test", null, t), window.removeEventListener("test", null, t)
                } catch (e) {}
                return e
            }
        }]);
        //# sourceMappingURL=index.js.map
    </script>
</body>

</html>