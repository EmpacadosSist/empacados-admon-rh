<?php

require_once('../conexion/conexion.php');

if(count($_POST)>0){

    $idPosition = isset($_POST['puestoid']) ? $_POST['puestoid'] : "";
    $idTask = isset($_POST['id']) ? $_POST['id'] : "";

    if($idTask && $idPosition){
        $sqlSP = "CALL delete_task_by_user($idPosition, $idTask)";
        $resultsql = $conn->query($sqlSP);
    
        if($resultsql){
    
            $resultado = ["ok"=>true, "message"=>"Tarea eliminada exitosamente"];
        }
        else{
            $resultado = ["ok"=>false, "message"=>"error en el codigo"];
        }

    }else{
        $resultado = ["ok"=>false,"message"=>"id vacio"];
    }

}else{
    $resultado = ["ok"=>false,"message"=>"Sin parametros"];
}

echo json_encode($resultado);

?>