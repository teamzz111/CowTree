<?php require_once("../backend/Conexion.php");
    session_start();
    if(!isset($_SESSION['loggedin'])){
        //header("Location: ../index.html");
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include("estructura/head.php"); ?>
    <link rel="stylesheet" type="text/css" href="../backend/Arbol/joint.css" />
    <link rel="stylesheet" href="../backend/Arbol/style.css">
</head>

<body class="fix-header fix-sidebar">
    <?php include("estructura/header.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-title">
                        <h4>Árbol genealógico</h4>
                    </div>
                    <div class="card-body">
                    <?php 

require_once ('../backend/Conexion.php');

$Vaca=$_GET['id'];
//$Vaca=1;

$query="UPDATE rama SET posicion=1 WHERE IdVaca=$Vaca AND Nivel='1'";// busca el árbol en el que esta vaca es padre
$result=$con->query($query);   

$query="SELECT * FROM rama WHERE IdVaca=$Vaca AND Nivel='1'";// busca el árbol en el que esta vaca es padre
$result = $con->query($query);
$row = $result ->fetch_array(MYSQLI_ASSOC);
$Tree=$row['IdArbol'];

$query="SELECT count(*) FROM arbol WHERE Id=$Tree";// busca cuántas vacas hay en el árbol
$result = $con->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
$Cant=$row['count(*)'];

$query="SELECT Nivel FROM rama WHERE IdArbol='$Tree' ORDER BY Nivel DESC LIMIT 1";//busca cuántos niveles hay viendo cuál es el de más abajo xddd
$result=$con->query($query);
$row=$result->fetch_array(MYSQLI_ASSOC);
$Num=$row['Nivel'];
$a=array();   
for($i=1; $i<=$Num; $i++)
{
    $query="SELECT count(*) FROM rama WHERE Nivel= '$i' AND IdArbol='$Tree'";//
    $result=$con->query($query);
    $row = $result ->fetch_array(MYSQLI_ASSOC);
    array_push($a, $row['count(*)']);//Guarda en un array cuántas vacas hay en cada nivel
}
//buscar cuál tiene más vacas viendo cuál es el mayor número en el array a y su posición +1 será el nivel con más vacas,
$x=$a[0];
$y=0;
for($i=1; $i<$Num; $i++)
{
    if($a[$i]>$x)
    {
        $x=$a[$i];
        $y=$i;
    }
}
$y++;
/*AHORA Y TIENE ES EL NIVEL QUE TIENE MÁS VACAS Y X ES EL NÚMERO DE vacaS QUE TIENE ESE NIVEL
EL ANCHO DEL DIV O LO QUE SEA DEPENDERÁ DE X, SERÁ UN ANCHO PARA QUE ESA CANTIDAD DE vacaS SE ACOMODEN
*/

$ancho= ($x*190); //ESTE SERÁ EL ANCHO QUE DEBE TENER EJ MAIN.JS PARA QUE QUEPAN TODAS LAS vacaS


for($i=1; $i<$Num; $i++)
{
    $N=1;
    $query1="SELECT IdVaca FROM rama WHERE Nivel=$i AND IdArbol= $Tree ORDER BY posicion ASC";
    $result1=$con->query($query1);
    while ($row1 = $result1->fetch_array(MYSQLI_ASSOC))
    {
        $okii= $row1['IdVaca'];
        $query="SELECT Ejemplar FROM vaca WHERE IdPadre=$okii OR IdMadre=$okii";
        $result=$con->query($query);
        while ($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $ejemplar=$row['Ejemplar'];
            $nivel=$i+1;
            $query2="UPDATE rama SET posicion=$N WHERE IdVaca=$ejemplar AND IdArbol=$Tree AND Nivel=$nivel";
            $N++;
            $resultado=$con->query($query2);            
            if(!$resultado) {echo "false";}
        }
    }
}

$Niveles=array();

for($i=1; $i<=$Num; $i++)//guarda en un array todas las vacas en orden según sus padres
{
    $N=1;
    $query1="SELECT * FROM rama WHERE IdArbol=$Tree AND Nivel=$i ORDER BY posicion ASC";
    $result1=$con->query($query1);
    while ($row = $result1->fetch_array(MYSQLI_ASSOC))
    {
        $les=$row['IdVaca'];
        $query="SELECT * FROM vaca WHERE Ejemplar=$les";
        $result=$con->query($query);
        $row1 = $result->fetch_array(MYSQLI_ASSOC);
        $Nombre=$row1['Nombre'];
        $Niveles[$i][]=$les;
    }
}
?>
    <div style="width: 100%; overflow: scroll;">

        <div style="width: <?php echo $ancho+($x*30);?>px;" id="paper" class="lol">

        </div>
    </div>

    <script src="../backend/Arbol/jquery.js"></script>
    <script src="../backend/Arbol/lodash.js"></script>
    <script src="../backend/Arbol/backbone.js"></script>
    <script src="../backend/Arbol/joint.js"></script>
    <script>
        var graph = new joint.dia.Graph();

        var paper = new joint.dia.Paper({
            el: $('#paper'),
            width: '100%',
            height: 600,
            gridSize: 5,
            model: graph,
            perpendicularLinks: true,
            restrictTranslate: true
        });
        console.log(paper);
        var member = function (x, y, rank, name, image, background, textColor) {

            textColor = textColor || "#000";

            var cell = new joint.shapes.org.Member({
                position: {
                    x: x,
                    y: y
                },
                attrs: {
                    '.card': {
                        fill: background,
                        stroke: 'none'
                    },
                    image: {
                        'xlink:href': 'images/' + image,
                        opacity: 0.7
                    },
                    '.rank': {
                        text: rank,
                        fill: textColor,
                        'word-spacing': '-5px',
                        'letter-spacing': 0
                    },
                    '.name': {
                        text: name,
                        fill: textColor,
                        'font-size': 13,
                        'font-family': 'Arial',
                        'letter-spacing': 0
                    }
                }
            });
            graph.addCell(cell);
            return cell;
        };

        function link(source, target, breakpoints) {

            var cell = new joint.shapes.org.Arrow({
                source: {
                    id: source.id
                },
                target: {
                    id: target.id
                },
                vertices: breakpoints,
                attrs: {
                    '.connection': {
                        'fill': 'none',
                        'stroke-linejoin': 'round',
                        'stroke-width': '2',
                        'stroke': '#4b4a67'
                    }
                }

            });
            graph.addCell(cell);
            return cell;
        }

</script>
        <?php
        $posicion=0;
for ($i=1;  $i<=$Num; $i++)
{
    foreach($Niveles as $i=>$valor)
    {
        $Alto=$i*100;
        foreach($valor as $t=>$g)
        {
            $query="SELECT r.posicion, a.Nombre, a.IdPadre, a.IdMadre FROM rama as r, vaca as a WHERE r.IdVaca=$g and r.IdArbol=$Tree and a.Ejemplar=$g";
            $result=$con->query($query);
            $row1 = $result->fetch_array(MYSQLI_ASSOC);
            $p=$row1['posicion'];
            $papu=$row1['IdPadre'];
            $query1="SELECT * FROM rama WHERE IdVaca=$papu";
            $resultado = $con->query($query1);
            if ($papu=="" || !$resultado) {
                $papu=$row1['IdMadre'];
            }
            else if ($resultado->num_rows<1)
            {
                $papu=$row1['IdMadre'];
            }
            $vaquita=$row1['Nombre'];
            if($p==1 && $i==1){ $posicion=($ancho/sizeof($valor))/2;}
            else
            {   
                if ($p==1){$posicion=($ancho/sizeof($valor))/2;}
                else {$posicion+=($ancho/sizeof($valor));}
                $query2="SELECT posicion FROM rama WHERE IdVaca=$papu AND IdArbol=$Tree";
                $res=$con->query($query2);
                $ro=$res->fetch_array(MYSQLI_ASSOC);
                $pp=$ro['posicion'];
            }
            //if($g==8 || $g==3) {$posicion+=200; $Alto+=10;}
            $query2="UPDATE rama SET posicion=$posicion WHERE IdVaca=$g AND IdArbol=$Tree";
            $result1=$con->query($query2);
        ?>
        <script>var <?php echo "v$g";?> = member(<?php echo "$posicion, $Alto";?>, 'CEO', '<?php echo $vaquita;?>', 'male.png', '#30d0c6');</script>
        <?php 
        if ($i>1) {?>  <script>  link(<?php echo "v$papu";?>,<?php echo "v$g";?>, [{x: <?php echo $pp+95;?>, y: <?php echo $Alto-15;?>}, {x:<?php echo $posicion+95;?> , y: <?php echo $Alto-15;?>}]); </script> <?php } ?>
        
        <?php
        } 
    }
}
?>

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