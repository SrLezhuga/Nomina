<?php
session_start();
include("../conexion.php");

// Obtengo los datos cargados en el formulario de login.
$emp_numero              = $_POST['form_numero_empleado'];
$emp_sueldo              = $_POST['form_sueldo'];
$emp_sueldo_diario       = $_POST['form_sueldo_diario'];
$emp_fiscal              = $_POST['form_fiscal'];
$emp_complemento         = $_POST['form_complemento'];
$emp_num_cuenta          = $_POST['form_num_cuenta'];
$emp_pago_neto           = $_POST['form_complemento'];


// Consulta segura para evitar inyecciones SQL.

$sql = "INSERT INTO tab_sueldo VALUES ('$emp_numero', $emp_sueldo_diario, $emp_sueldo, 
$emp_fiscal, $emp_complemento, $emp_pago_neto, $emp_num_cuenta);";

if (mysqli_query($con, $sql)) {

    header("HTTP/1.0 404 Not Found");
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Nomina/altaSueldo?alert=0'");
}

// close connection

mysqli_close($con);

?>