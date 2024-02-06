<?php
require('fpdf184/fpdf.php');
// Generar PDF y almacenarlo en una variable


if (isset($_POST['generate_contract'])) {
    // Obtener los valores del formulario
    $workArea = $_POST['work_area'];
    $department = $_POST['department'];
    $position = $_POST['position'];
    $costs = $_POST['Costs'];

    // Crear una nueva instancia de FPDF
    $pdf = new FPDF();

    // Agregar una página al PDF
    $pdf->AddPage();

    // Establecer el tipo de letra y tamaño
    $pdf->SetFont('Arial', '', 12,'B');
    $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(65, 0, '', 0);
        $pdf->Cell(90, 0, 'CONTRATO DE SERVICIOS', 0);
    // Contenido del contrato (ejemplo ficticio)
    $pdf->Ln(10);
    $pdf->Image('assets/img/arroz12.png' , 15 ,10, 0, 10,'PNG');
    $pdf->SetDrawColor(207,4,59);
        $pdf->SetLineWidth(1);
        $pdf->Line(191,22,15,22);
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetLineWidth(0);
        $pdf->SetFont('Arial','B', 8);
        $pdf->SetXY(14,22);
        $pdf->Cell(15, 8, utf8_decode('GRUPO EMPACADOS'), 0, 'L');  
    $pdf->Ln(10);
    
    $pdf->MultiCell(76, 3, utf8_decode('Av. Los Angeles No. 2200 C, Col. Mariano Escobedo, Mty. N.L.C.P.64510'), 0, 'L');

    // Agregar información dinámica del formulario al PDF
    $pdf->MultiCell(0, 12, 'Entre [Nombre del Cliente], en adelante "EL CLIENTE", con domicilio en [Domicilio del Cliente], y [Nombre de la Empresa], en adelante "EL PROVEEDOR", con domicilio en [Domicilio de la Empresa], se acuerda el siguiente contrato de servicios:', 0, 'J');
    $pdf->Ln(10);

    $pdf->MultiCell(0, 12, '1. DESCRIPCION DEL SERVICIO:', 0, 'J');
    $pdf->MultiCell(0, 12, 'El proveedor se compromete a proporcionar [Descripción del Servicio] al cliente.', 0, 'J');
    $pdf->Ln(5);

    $pdf->MultiCell(0, 12, '2. TARIFAS Y PAGOS:', 0, 'J');
    $pdf->MultiCell(0, 12, 'El cliente pagará al proveedor la cantidad de [Monto] por [Frecuencia de Pago].', 0, 'J');
    $pdf->Ln(5);

    // Agregar información dinámica del formulario al PDF
    $pdf->MultiCell(0, 12, "Departamento: $department", 0, 'L');  // Cambié 'J' por 'L' para alinear a la izquierda
    $pdf->MultiCell(0, 12, "Puesto: $position", 0, 'L');  // Cambié 'J' por 'L' para alinear a la izquierda
    $pdf->MultiCell(0, 12, "Centro de Costos: $costs", 0, 'L');  // Cambié 'J' por 'L' para alinear a la izquierda

    // ... Puedes seguir agregando más secciones según sea necesario

    // Salida del PDF al navegador
        $pdf->isFinished = false;
        $pdf->Output('Pedido_.pdf','I');  

}
?>
