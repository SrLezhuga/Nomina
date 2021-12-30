<?php
include("../conexion.php");

$Num_emp= $_POST['Num_emp'];
$Pue_emp= $_POST['Pue_emp'];
$Sup_emp= $_POST['Sup_emp'];
$Fec_emp= $_POST['Fec_emp'];
$Fin_emp= $_POST['Fin_emp'];
$Edi_emp= $_POST['Edi_emp'];
$Tur_emp= $_POST['Tur_emp'];
$Sta_emp= $_POST['Sta_emp'];
$Nue_emp= $_POST['Nue_emp'];

if (empty($Num_emp) | empty($Pue_emp) | empty($Sup_emp) | empty($Fec_emp) | empty($Fin_emp) |
    empty($Edi_emp) | empty($Tur_emp) | empty($Sta_emp) | empty($Nue_emp)) {
    echo "Uno o más campos vacíos";
}else {
    
    // Consulta segura para evitar inyecciones SQL.

    $sql = "INSERT INTO tab_puesto 
    VALUES('".$Num_emp."', '".$Pue_emp."', '".$Sup_emp."', '".$Fec_emp."', '".$Fin_emp."', 
    '".$Edi_emp."', '".$Tur_emp."', '".$Sta_emp."', '".$Nue_emp."') 
    ON DUPLICATE KEY UPDATE 
    puesto = '".$Pue_emp."',
    nombre_supervisor = '".$Sup_emp."',
    fecha_contrato = '".$Fec_emp."',
    fecha_fin_contrato = '".$Fin_emp."',
    edificio_agencia = '".$Edi_emp."',
    turno = '".$Tur_emp."',
    status = '".$Sta_emp."',
    nuevo_contrato = '".$Nue_emp."' ";

    if (mysqli_query($con, $sql)) {
        echo 0;
    }else {
        echo mysqli_error($con);
    }

    mysqli_close($con);

}
?>