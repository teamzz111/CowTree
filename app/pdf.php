<?php 
    require_once("../backend/Conexion.php");
	require_once('lib/tcpdf/tcpdf.php');
	
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header("Location: ../index.html");
    }

	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('');
    $pdf->SetTitle('CowTree - Sistema de gestión de ganado');
    $pdf->SetSubject('Administración');
    $pdf->SetKeywords('PDF, Reporte, Ejemplar, CowTree');
	$pdf->SetFont('Helvetica', '', 6);

    $vaca = $_GET['id'];
    $result = $con->query("SELECT * FROM vaca WHERE Ejemplar = '$vaca'");
    $elemento = $result-> fetch_array(MYSQLI_ASSOC);
    $result2 = $con->query("SELECT ganaderia.Nombre AS A,usuario.Nombre AS B FROM ganaderia, usuario WHERE usuario.Id =" . $elemento['Criador_Id'] . " AND ganaderia.Id = " . $elemento['Ganaderia_Id']);
    $elemento2 = $result2->fetch_array(MYSQLI_ASSOC); 
    $string = "GANADERÍA: ".$elemento2['A']." \nwww.andreslargo.com/Proyecto";

    $pdf->SetHeaderData("logo2.png", 13,'FICHA GENERAL DEL EJEMPLAR', $string, array(0,64,255), array(0,64,128));
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->SetMargins(20, 20, 20, 10); 
	$pdf->SetAutoPageBreak(true, 20); 
    $pdf->SetFont('Helvetica', '', 20);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFont('helvetica', '', 10);

    $pdf->AddPage();


    $html = "
    <style>
            table {
                border: 1px solid black;
                width: 1200;
                margin: auto;
            }

            th,
            td {
                width: 20%;
                vertical-align: top;
                padding: 10;
                border: 0.5px solid black;
                border-spacing: 0;
                text-transform: uppercase;
                border-collapse: collapse;
            }

        </style>
        <div class='informacion'>
            <p><strong>Ejemplar: </strong> ".$elemento['Ejemplar'].",
            <strong>Encaste: </strong> ".$elemento['Encaste'].",
            <strong>Reseña: </strong> ".$elemento['Reseña'].",
            <strong>Estado: </strong> ".$elemento['Estado'].",
            <strong>Destino: </strong> ".$elemento['Destino'].",
            <strong>Nacido: </strong> ".$elemento['Fecha_nacimiento'].",
            <strong>Destetado: </strong> ".$elemento['Destetado'].",
            <strong>Herrado: </strong> ".$elemento['Herrado'].",
            <strong>Edad: </strong> ".$elemento['Edad']."
            </p>
        </div>
        
        <table  border='0' cellpadding = \"6\">
            <tr class = 'papu'>
                <td>CLASE</td>
                <td>DESCRIPCION</td>
            </tr>
        <tr>
                <td>Fenotipo</td>
                <td>".$elemento['Fenotipo']."</td>
            </tr>
            <tr>
                <td>Defectos</td>
                <td>".$elemento['Defectos']."</td>
            </tr>
            <tr>
                <td>Calificación</td>
                <td>".$elemento['Calificacion']."</td>
            </tr>
            <tr>
                <td>Comportamiento</td>
                <td>".$elemento['Comportamiento']."</td>
            </tr>
            <tr>
                <td>Observadores</td>
                <td>".$elemento['Observadores']."</td>
            </tr>
        </table>
";


    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // reset pointer to the last page
    $pdf->lastPage();

    // ---------------------------------------------------------

    //Close and output PDF document
    $pdf->Output('Reporte.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>
		 


?>