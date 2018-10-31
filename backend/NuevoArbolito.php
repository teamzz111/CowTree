<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Arbol/joint.css" />
    <link rel="stylesheet" href="Arbol/style.css">
</head>

<body>
    <?php 

require_once ('Conexion.php');
session_start();

//$Vaca=$_POST['vaca'];
$Vaca=1;

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


///////////////////////
for($i=1; $i<$Num; $i++)
{
    $N=1;
    $query1="SELECT IdVaca FROM rama WHERE Nivel=$i AND IdArbol= $Tree";
    $result1=$con->query($query1);
    while ($row1 = $result1->fetch_array(MYSQLI_ASSOC))
    {
        $okii= $row1['IdVaca'];
        $query="SELECT Ejemplar FROM vaca WHERE IdPadre=$okii";
        $result=$con->query($query);
        while ($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            $nivel=$i+1;
            $query2="UPDATE rama SET posicion=$N WHERE IdVaca=$row[Ejemplar] AND IdArbol=$Tree AND Nivel=$nivel";
            $N++;
            ECHO $query2;
            print "</pre>";
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
print "<pre>"; 
print_r($Niveles);
print "</pre>";



?>


    <div style="width: 100%; overflow: scroll;">

        <div style="width: 100%;" id="paper" class="lol">

        </div>
    </div>

    <script src="Arbol/jquery.js"></script>
    <script src="Arbol/lodash.js"></script>
    <script src="Arbol/backbone.js"></script>
    <script src="Arbol/joint.js"></script>
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
for ($i=1;  $i<=$Num; $i++)
{
    foreach($Niveles as $i=>$valor)
    {
        $Alto=$i*100;
        foreach($valor as $t=>$g)
        {
            $query="SELECT r.posicion, a.Nombre FROM rama as r, vaca as a WHERE r.IdVaca=$g and r.IdArbol=$Tree and a.Ejemplar=$g";
            $result=$con->query($query);
            $row1 = $result->fetch_array(MYSQLI_ASSOC);
            $p=$row1['posicion'];
            $vaquita=$row1['Nombre'];
            if($p==1){ $posicion=($ancho/sizeof($valor))/2;}
            else { $posicion+=($ancho/sizeof($valor));}
            
        ?>
        <script>var <?php echo "v$g";?> = member(<?php echo "$posicion, $Alto";?>, 'CEO', '<?php echo $vaquita;?>', 'male.png', '#30d0c6');</script>
        <?php
        } 
    }
}
?>
<script>
//link(v1, v07, [{x: 385, y: 180}]);
        /*
        var bart = member(300, 70, 'CEO', 'Bart Simpson', 'male.png', '#30d0c6');
        var homer = member(90, 200, 'VP Marketing', 'Homer Simpson', 'male.png', '#7c68fd', '#f1f1f1');
        var marge = member(300, 200, 'VP Sales', 'Marge Simpson', 'female.png', '#7c68fd', '#f1f1f1');
        var lisa = member(500, 200, 'VP Production' , 'Lisa Simpson', 'female.png', '#7c68fd', '#f1f1f1');
        var maggie = member(400, 350, 'Manager', 'Maggie Simpson', 'female.png', '#feb563');
        var lenny = member(190, 350, 'Manager', 'Lenny Leonard', 'male.png', '#feb563');
        var carl = member(190, 500, 'Manager', 'Carl Carlson', 'male.png', '#feb563');

       
        link(bart, homer, [{x: 385, y: 180}, {x: 175, y: 180}]);
        link(bart, lisa, [{x: 385, y: 180}, {x: 585, y: 180}]);
        link(homer, lenny, [{x:175 , y: 380}]);
        link(homer, carl, [{x:175 , y: 530}]);
        link(marge, maggie, [{x:385 , y: 380}]);*/
    </script>
</body>
<?php 
?>