<?php 
// Incluir PhpSpreadsheet
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

// Crear una nueva hoja de cálculo
$spreadsheet = new Spreadsheet();

// Obtener la hoja activa y cambiarle el nombre
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('pagos');  // Cambiar el nombre de la hoja aquí

// Establecer el nombre del archivo a descargar
$filename = "pagos.xlsx";

// Escribir los encabezados
$sheet->setCellValue('A1', 'Número de empleado');
$sheet->setCellValue('B1', 'Nombre');
$sheet->setCellValue('C1', 'Puesto');
$sheet->setCellValue('D1', 'Área');
$sheet->setCellValue('E1', 'Ceco');
$sheet->setCellValue('F1', '$ Variable');

// Conectar con la base de datos y obtener los indicadores
require_once('conexion/conexion.php');
require_once('layout/session.php');
require_once('helpers/utils.php');
require_once('helpers/consultas.php');

if(isset($_GET['areaid']) && $_GET['areaid']!="0"){
    $indicadores = Consultas::listIndicatorByArea($conn, $_GET['areaid']);
} else {
    $indicadores = Consultas::listIndicator($conn);
}

// Rellenar los datos en la hoja
$row = 2;  
// Empezamos en la fila 2 porque la 1 tiene los encabezados
for ($i = 0; $i < count($indicadores); $i++) {
    $cont=$i+1;
    $sheet->setCellValue('A'.$row, $indicadores[$i]['id']." - ".$indicadores[$i]['nombreIndicador']);
    //$sheet->setCellValue('B' . $row, $indicadores[$i]['nombreIndicador']);    
    // Puedes añadir más valores en las otras columnas si es necesario
    $row++;
}

// Insertar imagen en la hoja activa
//$drawing = new Drawing();
//$drawing->setName('Logo'); // Nombre de la imagen
//$drawing->setDescription('Logo de la empresa'); // Descripción de la imagen
//$drawing->setPath('assets/img/formatos.jpg'); // Ruta de la imagen
//$drawing->setHeight(70); // Altura de la imagen (puedes ajustar esto)
//$drawing->setCoordinates('G1'); // Celda donde se ubicará la imagen
//$drawing->setOffsetX(10); // Desplazamiento horizontal dentro de la celda
//$drawing->setOffsetY(10); // Desplazamiento vertical dentro de la celda
//$drawing->setWorksheet($spreadsheet->getActiveSheet()); // Añadir la imagen a la hoja

// Crear un escritor de Excel
$writer = new Xlsx($spreadsheet);

// Encabezados para forzar la descarga del archivo Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// Enviar el archivo al navegador
$writer->save('php://output');
exit;
?>