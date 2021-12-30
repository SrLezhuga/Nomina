<?php
include("../conexion.php");
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");

$Empleado = $_POST["Ide"];

$queryEmpleado = "SELECT * FROM nomina.tab_baja WHERE id_empleado = '" . $Empleado . "'";
$rsEmpleado = mysqli_query($con, $queryEmpleado) or die(mysqli_error($con));
$Empleado_datos = mysqli_fetch_array($rsEmpleado);

$data = array();

if (empty($Empleado_datos['id_empleado'])) {
    $data['status'] = 'ok';
    $data['id_emp'] = $Empleado;
    $data['fecha_emp'] = date('Y-m-d', strtotime("now"));
    $data['status_emp'] = "ACTIVO";
    $data['motivo_emp'] = "";
} else {
    $data['status'] = 'ok';
    $data['id_emp'] = $Empleado_datos['id_empleado'];
    $data['fecha_emp'] = $Empleado_datos['fecha'];
    $data['status_emp'] = $Empleado_datos['status'];
    $data['motivo_emp'] = $Empleado_datos['motivo'];
}

//returns data as JSON format
echo json_encode($data);
