<?php require_once('../helpers/consultas.php'); ?>
<?php require_once('../helpers/utils.php'); ?>
<?php require_once('../conexion/conexion.php');
  $areaId=isset($_POST['areaId']) ? $_POST['areaId'] : ""; 
  $positionId=isset($_POST['positionId']) ? $_POST['positionId'] : "0"; 
  
  
  if($areaId==""){
    $indicadores=Consultas::listIndicator($conn); 
  }else{
    $indicadores=Consultas::listIndicator($conn); 
    //$indicadores=Consultas::listIndicatorByArea($conn,$areaId);
  }

  //consulta para ver un solo usuario con el id  


  $isInd=isset($_POST['indiv']) ? true : false;
  $userId=isset($_POST['userId']) ? $_POST['userId'] : false;
  $currentUserId=isset($_POST['currentUserId']) ? $_POST['currentUserId'] : "";  
  $month=isset($_POST['month']) ? $_POST['month'] : "";    
  $year=isset($_POST['year']) ? $_POST['year'] : "";      
  $validacion="";  
  $cantValidados=false;

  $month = $month != "" ? $month : date('m');
  $year = $year != "" ? $year : date('Y');

  /*
  if($month=="1"){
    $month="12";
    $year=date('Y')-1;
  }else{
    $month=date('m')-1;
    //$month=$month-1;
  }    
  */

  if($isInd){
    $usuarios=Consultas::listOneUser($conn, $userId);
    $validacion=Consultas::isValidated($conn, $month, $year, '11');   
    $cantValidados=$validacion[0]['cantValidados'];
  }else{
    //$usuarios=Consultas::listUsers($conn);
    if($currentUserId==1){
      $usuarios=Consultas::listAllUsers($conn);      
    }else{
      $usuarios=Consultas::listUsersBySupervisor($conn, $currentUserId);

    }
  }
//$month = 12;
$indicadorValorestest = Consultas::listAllIndicatorVPMIndiv($conn, $year); // Devuelve todos

$valoresIndicadoresIndexado = [];
foreach($indicadorValorestest as $val){
  $valoresIndicadoresIndexado[$val['indicadorId']][$val['mes']] = $val;
}


$reglasGyD = [];
$reglasSyL = [];
foreach ($indicadores as $ind) {
    $reglasGyD[$ind['id']] = Consultas::listBonusRuleByIndicatorId($conn, $ind['id'], 0);
    $reglasSyL[$ind['id']] = Consultas::listBonusRuleByIndicatorId($conn, $ind['id'], 1);
}

$porcentajesValores = Consultas::allPaymentVar($conn); 

$porcentajes = [];
foreach($porcentajesValores as $val){
  $porcentajes[$val['puestoId']][$val['indicadorId']] = $val;
}

//var_dump($indicadores);
/*
if($month=="13"){
  $month="1";
  $year=date('Y')+1;
}
*/

//var_dump($indicadorValores[0]);
//var_dump($valoresIndicadoresIndexado[1][1]);
  
?>

<?php if(($isInd==false) || ($isInd==true && $cantValidados!=false && $cantValidados>0)): ?>
<table class="table table-striped table-bordered table-sm" id="tablaPestana2" data-month="<?=$month?>" data-year="<?=$year?>">
  <?php //var_dump($cantValidados) ?>
  <!-- Contenido de la tabla -->
  <thead>
    <tr>
      <th class="st">No. de empleado</th>
      <th class="st1">Nombre</th>
      <th>Puesto</th>
      <th>Area</th>
      <th>Ceco</th>
      <th>$ Variable</th>
      <!-- <th>Nivel en estructura</th> -->
      <?php 
        for($i=0; $i<$month; $i++){
          $mesletra=Utils::obtenerNombreMes($i+1);
      ?>
      <!--<th>Total <?=$mesletra?></th>-->
      <th style="white-space: nowrap;">Total <?=$mesletra?></th>
      <?php             
        }
      ?>
      <!-- Agrega más columnas según tus necesidades -->
    </tr>
  </thead>
  <tbody>
    <?php 
      $arrIds2=[];
      $paramIds2="";
      $checkChildren2=false;

        if($year<=date('Y')):
      for($k=0;$k<count($usuarios);$k++){
        $sumaPagos=0;
        $usuariosArr=$usuarios[$k];
        array_push($arrIds2,$usuariosArr['usuarioId']);
    ?>
    <tr class="<?=$usuariosArr['areaId']?>" data-user-id="<?=$usuariosArr['usuarioId']?>" data-pos-id="<?=$usuariosArr['puestoId']?>">
      <td class="st" style="min-width: 100px;"><?=$usuariosArr['numEmpleado']?></td>
      <td class="st1" style="min-width: 300px;">
        <?=$usuariosArr['nombre']." ".$usuariosArr['apellido1']." ".$usuariosArr['apellido2']?>
      </td>
      <td style="min-width: 300px;"><?=$usuariosArr['puesto']?></td>
      <td style="min-width: 100px;"><?=$usuariosArr['area']?></td>
      <td style="min-width: 100px;"><?=$usuariosArr['ceco']?></td>
      <td style="min-width: 200px;">
        $ <?=$usuariosArr['variable']?>
      </td>
      <?php 
        for($n=0; $n<$month; $n++){
          $sumaPagos=0;
          $monthNum=$n+1;
        for($j=0;$j<count($indicadores);$j++){ 
          $indicadorId=$indicadores[$j]['id'];
          
          //$porcentaje=Consultas::paymentVar($conn, $usuariosArr['puestoId'], $indicadorId);
          $porcentaje=isset($porcentajes[$usuariosArr['puestoId']][$indicadorId]['porcentaje']) ? $porcentajes[$usuariosArr['puestoId']][$indicadorId]['porcentaje'] : 0 ;
          $valorPorcentaje= isset($porcentaje) ? $porcentaje : 0; 
          //var_dump($muestra); 
          //$indicadoresReglaGyD=Consultas::listBonusRuleByIndicatorId($conn,$indicadores[$j]['id'],0);
          //$indicadoresReglaSyL=Consultas::listBonusRuleByIndicatorId($conn,$indicadores[$j]['id'],1);
          
          $indicadoresReglaGyD = $reglasGyD[$indicadores[$j]['id']];
          $indicadoresReglaSyL = $reglasSyL[$indicadores[$j]['id']];

          //$indicadorValores=Consultas::listIndicatorVPMIndiv($conn,$indicadores[$j]['id'],$monthNum,$year);
          $indicadorValores = $valoresIndicadoresIndexado[$indicadores[$j]['id']][$monthNum] ?? [];


          $real=(isset($indicadorValores['real'])&&$indicadorValores['real']!="") ? $indicadorValores['real'] : "0";
          $objetivo=(isset($indicadorValores['objetivo'])&&$indicadorValores['objetivo']!="") ? $indicadorValores['objetivo'] : "0";
          $formatoId=(isset($indicadorValores['formatoId'])&&$indicadorValores['formatoId']!="") ? $indicadorValores['formatoId'] : "0";

          $porcCumplimiento= Utils::porcCumplimiento($real,$objetivo);

          $diffPorc = Utils::diffPorc($real,$objetivo); 

          if($formatoId=='4' || $formatoId=='5' || $formatoId=='6'){
            $porcCumplimiento= Utils::porcCumplimiento($objetivo, $real);
            $diffPorc = Utils::diffPorc($objetivo, $real);
          }                          
                  
          if(!$isInd || $valorPorcentaje>0){
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
          } 
        } 
      ?>

      <!--<td style="min-width: 100px;">$ <?=$sumaPagos?></td>--> <!-- Agrega más filas según tus necesidades -->
      <td style="min-width: 100px;">
        <?php 
          if($usuariosArr['variable']!=0){
            echo round((($sumaPagos/$usuariosArr['variable'])*100), 0, PHP_ROUND_HALF_UP);
          }else{
            echo "0";
          }
        ?> %</td>
  <?php } ?> 

    </tr>

    <?php 

        } 
      endif;

    ?>

  </tbody>
</table>
<?php else: ?>
  <div class="container mt-4">
        <div class="row">
          <div class="col-2">

          </div>
          <div class="col" style="text-align: center;">
            <h2>Pagos en proceso de autorización</h2>

          </div>
          <div class="col-2"></div>
        </div>
      </div>  
<?php endif; ?>