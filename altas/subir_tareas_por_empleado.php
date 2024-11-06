<?php

require_once('../conexion/conexion.php');

if(count($_POST)>0){

    $idpuesto = isset($_POST['puesto']) ? $_POST['puesto'] : "";
    $idtarea = isset($_POST['tarea']) ? $_POST['tarea'] : "";

    if($idpuesto && $idtarea){
        $sqlSP = "CALL insert_task_by_user($idpuesto,$idtarea)";
        $result = $conn->query($sqlSP);

        if($result){

            $respuesta = ["ok"=>true, "message"=>"datos insertados correctamente"];
        }else{
            $respuesta = ["ok"=>false, "message"=>"error en la insercion"];
        }

    }else{
        $respuesta = ["ok"=>false, "message"=>"datos incompletos"];
    }
}else{
    $respuesta = ["ok"=>false, "message"=>"sin parametros"];
}

echo json_encode($respuesta);
?>