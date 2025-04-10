<?php 
// Incluir PhpSpreadsheet
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

/*
$month=isset($_POST['month']) ? $_POST['month'] : ""; 
$month = $month != "" ? $month : date('m');
$year = date('Y');

if($month=="1"){
    $month="12";
    $year=date('Y')-1;
}else{
    $month=date('m')-1;    
}  
*/

$month=isset($_GET['month']) ? $_GET['month'] : "";    
$year=isset($_GET['year']) ? $_GET['year'] : "";  

$month = $month != "" ? $month : date('m');
$year = $year != "" ? $year : date('Y');

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

$permisoPagosTodos  = Utils::buscarPermiso(12);
$areaId = isset($_GET['areaid']) ? $_GET['areaid'] : "0"; 

    if($permisoPagosTodos){
        $current_user_id = 1;
    
    }else{
        $current_user_id = $_SESSION['identity']->userId;
        $areaId = $_SESSION['identity']->areaId;
    }

$usuarios=Consultas::listUsersBySupervisor($conn, $current_user_id);

if($areaId!="0"){
    $indicadores = Consultas::listIndicatorByArea($conn, $areaId);
} else {
    $indicadores = Consultas::listIndicator($conn);
}

// Rellenar los datos en la hoja
$numcolumn = 7;  
// Empezamos en la columna 7 porque las primeras 6 ya estan ocupadas
for ($i = 0; $i < count($indicadores); $i++) {
    $cont=$i+1;
    $coor=Coordinate::stringFromColumnIndex($numcolumn);
    $sheet->setCellValue($coor.'1', $indicadores[$i]['id']." - ".$indicadores[$i]['nombreIndicador']);

    $numcolumn++;
}
$coorFija=Coordinate::stringFromColumnIndex($numcolumn);
$sheet->setCellValue($coorFija.'1', 'Total');
$coorFija=Coordinate::stringFromColumnIndex($numcolumn+1);
$sheet->setCellValue($coorFija.'1', '');

$row=2;

$arrIds2=[];
$paramIds2="";
$checkChildren2=false;
for($k=0;$k<count($usuarios);$k++){

    $sumaPagos=0;
    $usuariosArr=$usuarios[$k];

    if($areaId==$usuariosArr['areaId'] || $areaId=='0'){
        array_push($arrIds2,$usuariosArr['usuarioId']);
        $sheet->setCellValue('A'.$row, $usuariosArr['numEmpleado']);
        $sheet->setCellValue('B'.$row, $usuariosArr['nombre']." ".$usuariosArr['apellido1']." ".$usuariosArr['apellido2']);
        $sheet->setCellValue('C'.$row, $usuariosArr['puesto']);
        $sheet->setCellValue('D'.$row, $usuariosArr['area']);
        $sheet->setCellValue('E'.$row, $usuariosArr['ceco']);
        $sheet->setCellValue('F'.$row, '$ '.$usuariosArr['variable']);
        $numcolumnK=7;
        for($j=0;$j<count($indicadores);$j++){ 
            $indicadorId=$indicadores[$j]['id'];
            $porcentaje=Consultas::paymentVar($conn, $usuariosArr['puestoId'], $indicadorId);
            $valorPorcentaje= isset($porcentaje[0]) ? $porcentaje[0]['porcentaje'] : 0; 
            //var_dump($muestra); 
            $indicadoresReglaGyD=Consultas::listBonusRuleByIndicatorId($conn,$indicadores[$j]['id'],0);
            $indicadoresReglaSyL=Consultas::listBonusRuleByIndicatorId($conn,$indicadores[$j]['id'],1);
            
            $indicadorValores=Consultas::listIndicatorVPMIndiv($conn,$indicadores[$j]['id'],$month,$year);
            $real=isset($indicadorValores[0]['real']) ? $indicadorValores[0]['real'] : "";
            $objetivo=isset($indicadorValores[0]['objetivo']) ? $indicadorValores[0]['objetivo'] : "";
            $formatoId=isset($indicadorValores[0]['formatoId']) ? $indicadorValores[0]['formatoId'] : "0";

            $porcCumplimiento = Utils::porcCumplimiento((float)$real, (float)$objetivo);

            $diffPorc = Utils::diffPorc($real,$objetivo); 

            if($formatoId=='4' || $formatoId=='5' || $formatoId=='6'){
            $porcCumplimiento= Utils::porcCumplimiento((float)$objetivo, (float)$real);
            $diffPorc = Utils::diffPorc($objetivo, $real);
            }
            
            $totalpago=0; 
            $valorGyD=Utils::calcularPorc($indicadoresReglaGyD,$porcCumplimiento,$indicadores[$j]['calculo'],$real,$diffPorc);
            $valorSyL=Utils::calcularPorc($indicadoresReglaSyL,$porcCumplimiento,$indicadores[$j]['calculo'],$real,$diffPorc);
            
            if($usuariosArr['nivel']=='1'||$usuariosArr['nivel']=='2'){
            $totalpago=$valorPorcentaje/100 * $valorGyD/100;
            }else{
            $totalpago=$valorPorcentaje/100 * $valorSyL/100;
            }

            $totalpago=$totalpago*$usuariosArr['variable'];
            $sumaPagos+=round($totalpago, 0, PHP_ROUND_HALF_UP);

            $coor=Coordinate::stringFromColumnIndex($numcolumnK);
            $sheet->setCellValue($coor.$row, "$ ".round($totalpago, 0, PHP_ROUND_HALF_UP));
        
            $numcolumnK++;        


            ///siguen totales


            
            //echo "$ ".round($totalpago, 0, PHP_ROUND_HALF_UP);        
        }

        $coor=Coordinate::stringFromColumnIndex($numcolumnK);
        $sheet->setCellValue($coor.$row, "$ ".$sumaPagos);
        $numcolumnK++;
        $coor=Coordinate::stringFromColumnIndex($numcolumnK);        
        if($usuariosArr['variable']!=0){
            $totalfinal= round((($sumaPagos/$usuariosArr['variable'])*100), 0, PHP_ROUND_HALF_UP);

        }else{
            $totalfinal= "0";
        }
        $sheet->setCellValue($coor.$row, $totalfinal." %");

        $row++;

    }
}


if(count($arrIds2)>0){
    $checkChildren2=true;
    $paramIds2=implode(",", $arrIds2);
}

while($checkChildren2){
    $arrIds2=[];
    $usuariosChildren=[];
    $usuariosChildren=Consultas::listUsersBySupervisor($conn, $paramIds2);
    for($l=0;$l<count($usuariosChildren);$l++){

        
        $sumaPagos=0;
        $usuariosArr=$usuariosChildren[$l];

        if($areaId==$usuariosArr['areaId'] || $areaId=='0'){        
            array_push($arrIds2,$usuariosArr['usuarioId']); 
            $sheet->setCellValue('A'.$row, $usuariosArr['numEmpleado']);
            $sheet->setCellValue('B'.$row, $usuariosArr['nombre']." ".$usuariosArr['apellido1']." ".$usuariosArr['apellido2']);
            $sheet->setCellValue('C'.$row, $usuariosArr['puesto']);
            $sheet->setCellValue('D'.$row, $usuariosArr['area']);
            $sheet->setCellValue('E'.$row, $usuariosArr['ceco']);
            $sheet->setCellValue('F'.$row, '$ '.$usuariosArr['variable']);  
            $numcolumnK=7;     
            for($j=0;$j<count($indicadores);$j++){ 
                $indicadorId=$indicadores[$j]['id'];
                $porcentaje=Consultas::paymentVar($conn, $usuariosArr['puestoId'], $indicadorId);
                $valorPorcentaje= isset($porcentaje[0]) ? $porcentaje[0]['porcentaje'] : 0; 
                //var_dump($muestra); 
                $indicadoresReglaGyD=Consultas::listBonusRuleByIndicatorId($conn,$indicadores[$j]['id'],0);
                $indicadoresReglaSyL=Consultas::listBonusRuleByIndicatorId($conn,$indicadores[$j]['id'],1);
                
                $indicadorValores=Consultas::listIndicatorVPMIndiv($conn,$indicadores[$j]['id'],$month,$year);
                $real=isset($indicadorValores[0]['real']) ? $indicadorValores[0]['real'] : "";
                $objetivo=isset($indicadorValores[0]['objetivo']) ? $indicadorValores[0]['objetivo'] : "";
                $formatoId=isset($indicadorValores[0]['formatoId']) ? $indicadorValores[0]['formatoId'] : "0";

                $porcCumplimiento = Utils::porcCumplimiento((float)$real, (float)$objetivo);

                $diffPorc = Utils::diffPorc($real,$objetivo); 

                if($formatoId=='4' || $formatoId=='5' || $formatoId=='6'){
                $porcCumplimiento= Utils::porcCumplimiento((float)$objetivo, (float)$real);
                $diffPorc = Utils::diffPorc($objetivo, $real);
                }
                
                $totalpago=0; 
                $valorGyD=Utils::calcularPorc($indicadoresReglaGyD,$porcCumplimiento,$indicadores[$j]['calculo'],$real,$diffPorc);
                $valorSyL=Utils::calcularPorc($indicadoresReglaSyL,$porcCumplimiento,$indicadores[$j]['calculo'],$real,$diffPorc);
                
                if($usuariosArr['nivel']=='1'||$usuariosArr['nivel']=='2'){
                $totalpago=$valorPorcentaje/100 * $valorGyD/100;
                }else{
                $totalpago=$valorPorcentaje/100 * $valorSyL/100;
                }

                $totalpago=$totalpago*$usuariosArr['variable'];
                $sumaPagos+=round($totalpago, 0, PHP_ROUND_HALF_UP);
                //echo "$ ".round($totalpago, 0, PHP_ROUND_HALF_UP);     
                
                $coor=Coordinate::stringFromColumnIndex($numcolumnK);
                $sheet->setCellValue($coor.$row, "$ ".round($totalpago, 0, PHP_ROUND_HALF_UP));
            
                $numcolumnK++; 
                
                    
            }
            
            $coor=Coordinate::stringFromColumnIndex($numcolumnK);
            $sheet->setCellValue($coor.$row, "$ ".$sumaPagos);
            $numcolumnK++;
            $coor=Coordinate::stringFromColumnIndex($numcolumnK);
            if($usuariosArr['variable']!=0){
                $totalfinal= round((($sumaPagos/$usuariosArr['variable'])*100), 0, PHP_ROUND_HALF_UP);
            }else{
                $totalfinal= "0";
            }
            $sheet->setCellValue($coor.$row, $totalfinal." %");            

            $row++;     
        }  
    }         

    if(count($arrIds2)>0){
        $paramIds2=implode(",", $arrIds2);
    }else{
        $checkChildren2=false;
    }  

}

foreach ($sheet->getColumnIterator() as $column) {
    $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
}

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