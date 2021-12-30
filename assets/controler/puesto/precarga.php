<?php
include("../conexion.php");
$Empleado = $_POST["Ide"];

$queryEmpleado = "SELECT * FROM nomina.tab_puesto WHERE id_empleado = '" . $Empleado . "'";
$rsEmpleado = mysqli_query($con, $queryEmpleado) or die(mysqli_error($con));
$Empleado_datos = mysqli_fetch_array($rsEmpleado);

$data = array();

if (empty($Empleado_datos['id_empleado'])) {
    $data['status'] = 'ok';
    $data['id_emp'] = $Empleado;
    $data['puesto'] = "Sin asignar";
    $data['nombre_supervisor'] = "Sin asignar";
    $data['fecha_contrato'] = "1800-01-01";
    $data['fecha_fin_contrato'] = "1800-01-01";
    $data['edificio_agencia'] = "Sin asignar";
    $data['turno'] = "Sin asignar";
    $data['status_emp'] = "Sin asignar";
    $data['nuevo_contrato'] = "1800-01-01";
} else {
    $data['status'] = 'ok';
    $data['id_emp'] = $Empleado_datos['id_empleado'];
    $data['puesto'] = $Empleado_datos['puesto'];
    $data['nombre_supervisor'] = $Empleado_datos['nombre_supervisor'];
    $data['fecha_contrato'] = $Empleado_datos['fecha_contrato'];
    $data['fecha_fin_contrato'] = $Empleado_datos['fecha_fin_contrato'];
    $data['edificio_agencia'] = $Empleado_datos['edificio_agencia'];
    $data['turno'] = $Empleado_datos['turno'];
    $data['status_emp'] = $Empleado_datos['status'];
    $data['nuevo_contrato'] = $Empleado_datos['nuevo_contrato'];
}

//returns data as JSON format
echo json_encode($data);
