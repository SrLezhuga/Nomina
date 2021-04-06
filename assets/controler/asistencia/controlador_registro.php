<?php
require "modelo_asistencia.php";
    $MA = new Modelo_Asistencia(); 

    $id=htmlspecialchars($_POST['id'],ENT_QUOTES,"UTF-8");
    $fecha=$_POST['fecha'];
    $nombre=htmlspecialchars($_POST['nombre'],ENT_QUOTES,"UTF-8");
    $status=htmlspecialchars($_POST['status'],ENT_QUOTES,"UTF-8");

    $array_id=explode(",",$id);
    $array_nombre=explode(",",$nombre);
    $array_status=explode(",",$status);

    for ($i=0; $i < count($array_id); $i++) { 
        $consulta = $MA->Registrar_Asistencia($array_id[$i],$fecha,$array_nombre[$i],$array_status[$i]);
    }
    echo $consulta;
?>