<?php
require '../vendor/autoload.php';
require '../conexion/conexion.php';
require '../helpers/consultas.php';
require_once('../helpers/validar.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$tipo       = $_FILES['archivo']['type'];
$tamanio    = $_FILES['archivo']['size'];
$archivotmp = $_FILES['archivo']['tmp_name'];
$sql="";

/*
$arrInd=[];
$indicadores=Consultas::listIndicator($conn);

for($i=0; $i<count($indicadores); $i++){
  array_push($arrInd, $indicadores[$i]['id']);
}
*/

$spreadsheet = new Spreadsheet();

$inputFileType = 'Xlsx';
$inputFileName = $archivotmp;
//Create a new Reader of the type defined in $inputFileType 
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
// Advise the Reader that we only want to load cell data 
$reader->setReadDataOnly(true);

$worksheetData = $reader->listWorksheetInfo($inputFileName);
$existehoja=false;
$completo="";
$resultado="";
foreach ($worksheetData as $worksheet) {
  $sheetName = $worksheet['worksheetName'];
  
  if($sheetName=="vacaciones"){
    $existehoja=true;
  
    //Load $inputFileName to a Spreadsheet Object 
    $reader->setLoadSheetsOnly($sheetName);
    $spreadsheet = $reader->load($inputFileName);

    $worksheet = $spreadsheet->getActiveSheet();
    $arr = $worksheet->toArray();
    
    //recorrer las filas
    for ($i=1; $i < count($arr); $i++) {  

      if($arr[$i][1]!=""){
        $empNum=$arr[$i][0];
        $days=($arr[$i][2]==""||!is_numeric($arr[$i][2])) ? "0" : $arr[$i][2];                

        //actualizar variable del empleado
        $sql="CALL update_vacations_days_manual('$empNum', $days)";
        $resultSP=$conn->query($sql);

        if($resultSP){
          //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
          $resultado .= "exito; ";              
        }else{
          //se guarda en una variable el resultado de haber un error al agregar a la bd      
          $resultado .= "fallo; ";              
        }  
      }			
    }
  }
}

if($existehoja){
  echo $resultado;
}else{
  echo "wrongfile";
}

