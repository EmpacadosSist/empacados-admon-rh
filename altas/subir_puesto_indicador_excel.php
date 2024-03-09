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
//SE RECIBIRA EL NUMERO DE INDICADORES PARA CONTAR LAS COLUMNAS +2
//$numind=3+2;

$numInd= isset($_POST['numIndicadores']) ? $_POST['numIndicadores'] : "";
$numIndVal = Validar::validarNum($numInd);  

if($numInd!=""&&($numIndVal&&$numInd>0)){
  //aqui se suma 2 al total
  $numInd=5;

  $arrInd=[];
  $indicadores=Consultas::listIndicator($conn);

  for($i=0; $i<count($indicadores); $i++){
    array_push($arrInd, $indicadores[$i]);
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
    
    if($sheetName=="porcentaje"){
      $existehoja=true;
    
      //Load $inputFileName to a Spreadsheet Object 
      $reader->setLoadSheetsOnly($sheetName);
      $spreadsheet = $reader->load($inputFileName);

      $worksheet = $spreadsheet->getActiveSheet();
      $arr = $worksheet->toArray();
      
      //recorrer las filas
      for ($i=1; $i < count($arr); $i++) { 
        // code...
        if($arr[$i][0]!=""){
          //$completo.=$arr[$i][0]."<->";
          //$completo.=$arr[$i][1]." ->";        
          $numemp=$arr[$i][0];
          $variable=$arr[$i][1];
          
          for($j=2; $j<$numInd; $j++){
            //dependiendo el numero de indicadores, sera el indice del array
            $indicadorId=$indicadores[$j-2]["id"];

            //primer campo - clave cliente
            $valor=$arr[$i][$j];
            //$numemp=
            if(!($valor=="0"||$valor==""||$valor==0)){

              $sql="call insert_position_indicator_excel('$numemp', '$indicadorId', '$valor', @position_id);";
              $resultSP=$conn->query($sql);

              if($resultSP){
                //se guarda en una variable el resultado de haber agregado o atcualizado exitosamente el empleado
                $resultado .= "exito; ";              
              }else{
                //se guarda en una variable el resultado de haber un error al agregar a la bd      
                $resultado .= "fallo; ";              
              }   
            }else{
              $resultado .= "vacio; ";
            }

            $completo.=$sql." ";
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

}else{
  echo "invalido";
}