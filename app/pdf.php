<?php 

	require_once('lib/tcpdf/tcpdf.php');
	
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('');
    $pdf->SetTitle('CowTree - Sistema de gestión de ganado');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
	$pdf->SetFont('Helvetica', '', 6);

    $pdf->SetHeaderData("logo2.png", 13,'FICHA GENERAL DEL EJEMPLAR', "GANADERÍA: \nwww.andreslargo.com/Proyecto", array(0,64,255), array(0,64,128));
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->SetMargins(20, 20, 20, 10); 
	$pdf->SetAutoPageBreak(true, 20); 
    $pdf->SetFont('Helvetica', '', 20);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFont('helvetica', '', 10);

    // add a page
    $pdf->AddPage();

    /* NOTE:
    * *********************************************************
    * You can load external XHTML using :
    *
    * $html = file_get_contents('/path/to/your/file.html');
    *
    * External CSS files will be automatically loaded.
    * Sometimes you need to fix the path of the external CSS.
    * *********************************************************
    */

    // define some HTML content with style
    //$html = file_get_contents('report.html');
    $html = <<<EOF
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
        <div class="informacion">
            <p><strong>Ejemplar: </strong> ASP-188-188-2004-H-SOSPECHOSA,
            <strong>Encaste: </strong> Baltasar Iban,
            <strong>Reseña: </strong> tt.,
            <strong>Estado: </strong> Vivo,
            <strong>Destino: </strong> Tentar,
            <strong>Nacido: </strong> 01-ene-2004,
            <strong>Destetado: </strong> No,
            <strong>Herrado: </strong> Sí,
            <strong>Edad: </strong> 4 años, 6 meses y 1 días
            </p>
        </div>
        
        <table  border="0" cellpadding="6">
            <tr class = "papu">
                <td>CLASE</td>
                <td>DESCRIPCION</td>
            </tr>
        <tr>
                <td>Fenotipo</td>
                <td>desconocido</td>
            </tr>
            <tr>
                <td>Defectos</td>
                <td>Ninguno</td>
            </tr>
            <tr>
                <td>Calificación</td>
                <td>5.0</td>
            </tr>
            <tr>
                <td>Comportamiento</td>
                <td>Agresivo</td>
            </tr>
            <tr>
                <td>Observaciones</td>
                <td>Es lindo</td>
            </tr>
        </table>
EOF;

    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
    // reset pointer to the last page
    $pdf->lastPage();

    // ---------------------------------------------------------

    //Close and output PDF document
    $pdf->Output('example_061.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>
		 


?>