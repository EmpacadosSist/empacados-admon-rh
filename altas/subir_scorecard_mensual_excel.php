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
//SE RECIBIRA EL NUMERO DE INDICADORES PARA CONTAR LAS COLUMNAS +3
//$numind=3+3;

//$numInd= isset($_POST['numIndicadores']) ? $_POST['numIndicadores'] : "";
//$numIndVal = Validar::validarNum($numInd);  

//$paymentVar = isset($_POST['paymentVar']) ? $_POST['paymentVar'] : "";    
//$paymentVarVal = Validar::validarNum($paymentVar);

$month = isset($_POST['month']) ? $_POST['month'] : "";
$monthVal = Validar::validarNum($month);

$year = isset($_POST['year']) ? $_POST['year'] : "";
$yearVal = Validar::validarNum($year);  

if($monthVal&&$yearVal){
  //aqui se suma 3 al total
  //$numInd+=3;

  $arrInd=[];
  $indicadores=Consultas::listIndicator($conn);

  for($i=0; $i<count($indicadores); $i++){
    array_push($arrInd, $indicadores[$i]['id']);
  }



  $spreadsheet = new Spreadsheet();

  $inputFileType = 'Xlsx';
  //$inputFileName = 'SUBIR_PPTO.xlsx';
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
    
    if($sheetName=="scorecard"){
      $existehoja=true;
    
      //Load $inputFileName to a Spreadsheet Object 
      $reader->setLoadSheetsOnly($sheetName);
      $spreadsheet = $reader->load($inputFileName);

      $worksheet = $spreadsheet->getActiveSheet();
      $arr = $worksheet->toArray();
      
      //recorrer las filas
      for ($i=1; $i < count($arr); $i++) {  

        if($arr[$i][1]!=""){
          //$nombre=$arr[$i][0];
          $real=($arr[$i][0]==""||!is_numeric($arr[$i][0])) ? "0.00" : $arr[$i][0];
          $objetivo=($arr[$i][1]==""||!is_numeric($arr[$i][1])) ? "0.00" : $arr[$i][1];;
          $formato=$arr[$i][2];                    

          //$resultado .= " ** $real * $objetivo * $formato** ";
          
          //tomar id de los indicadores para actualizar o agregar
          $indicatorId=$arrInd[$i-1];
          //$resultado .= "CALL update_value_per_month($indicatorId, '$real', '$objetivo', $formato, $month, $year)";
          
          //actualizar variable del empleado
          $sql="CALL update_value_per_month($indicatorId, '$real', '$objetivo', $formato, $month, $year)";
          $resultSP=$conn->query($sql);

          if($resultSP){
            //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
            $resultado .= "exito variable; ";              
          }else{
            //se guarda en una variable el resultado de haber un error al agregar a la bd      
            $resultado .= "fallo variable; ";              
          }  
          
          /*
          for($j=3; $j<$numInd; $j++){
            //dependiendo el numero de indicadores, sera el indice del array
            $indicadorId=$indicadores[$j-3]["id"];
            
            //primer campo - clave cliente
            $valor=isset($arr[$i][$j]) ? $arr[$i][$j] : "";

            //verificar que no tenga valor y que este vacio, luego hacer negativa la condicion
            if(!(is_null($valor) || $valor === '')){

              $valorVal = Validar::validarNum($valor);
              
              if($valorVal){
                $sql="call insert_position_indicator_excel('$numemp', '$indicadorId', '$valor', @position_id);";
                $resultSP=$conn->query($sql);
              }else{
                $resultSP=false;
              }
              
              if($resultSP){
                //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
                $resultado .= "exito; ";              
              }else{
                //se guarda en una variable el resultado de haber un error al agregar a la bd      
                $resultado .= "fallo; ";              
              }   
            }else{
              $resultado .= "vacio; $valor";
            }
          }
          */

        }			
      }
    }
  }

  if($existehoja){
    echo $resultado;
  }else{
    echo "wrongfile";
  }

}else{
  echo "invalido";
}