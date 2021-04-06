<?php
        
class Modelo_Asistencia{

    private $conexion;
    function __construct()
    {
        require_once 'modelo_conexion.php';
        $this->conexion = new conexion();
        $this->conexion->conectar();
    }
    function Registrar_Asistencia($array_id,$fecha,$arreglo_nombre,$arreglo_status){
        $sql = "INSERT INTO tab_asistencia VALUES ('$array_id','$fecha','$arreglo_nombre','$arreglo_status') ON DUPLICATE KEY UPDATE status = '$arreglo_status';";
        
        if ($resultado = $this->conexion->conexion->query($sql)) {
            $id_retornado = mysqli_insert_id($this->conexion->conexion);
            return 1;
        }else {
            return 0;
        }
        $this->conexion->cerrar();
    }
}


?>