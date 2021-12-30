<?php
include("../conexion.php");

$Num_emp = $_POST['Num_emp'];
$Fec_emp = $_POST['Fec_emp'];
$Sta_emp = $_POST['Sta_emp'];
$Mot_emp = $_POST['Mot_emp'];

if (empty($Num_emp) | empty($Fec_emp) | empty($Sta_emp) | empty($Mot_emp)) {
    echo "Uno o más campos vacíos";
} else {

    // Consulta segura para evitar inyecciones SQL.

    $sql = "INSERT INTO tab_baja
    VALUES('" . $Num_emp . "', '" . $Fec_emp . "', '" . $Sta_emp . "', '" . $Mot_emp . "') 
    ON DUPLICATE KEY UPDATE 
    fecha = '" . $Fec_emp . "',
    status = '" . $Sta_emp . "',
    motivo = '" . $Mot_emp . "' ";

    $sqlPuesto = "UPDATE tab_puesto 
    SET tab_puesto.status = 'Baja',
    fecha_fin_contrato = '" . $Fec_emp . "',
    nuevo_contrato = '2099-01-01'
    WHERE id_empleado = '" . $Num_emp . "'";

    $sqlEmpleado = "UPDATE tab_empleado
    SET status_empleado = 'BAJA'
    WHERE id_empleado = '" . $Num_emp . "'";

    if (mysqli_query($con, $sql)) {
        if (mysqli_query($con, $sqlPuesto)) {
            if (mysqli_query($con, $sqlEmpleado)) {
                echo 0;
            } else {
                echo mysqli_error($con);
            }
        } else {
            echo mysqli_error($con);
        }
    } else {
        echo mysqli_error($con);
    }

    mysqli_close($con);
}
