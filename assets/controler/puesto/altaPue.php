<?php
session_start();
include("../conexion.php");

// Obtengo los datos cargados en el formulario de login.
$emp_numero              = $_POST['form_numero_empleado'];
$emp_puesto              = $_POST['form_puesto'];
$emp_nom_supervisor      = $_POST['form_nom_supervisor'];
$emp_fecha_contrato      = $_POST['form_fecha_contrato'];
$emp_fecha_termino       = $_POST['form_fecha_termino'];
$emp_edificio_agencia    = $_POST['form_edificio_agencia'];
$emp_status              = $_POST['form_status'];
$emp_turno               = $_POST['form_turno'];
$emp_nuevo_contrato      = $_POST['form_nuevo_contrato'];


// Consulta segura para evitar inyecciones SQL.

$sql = "INSERT INTO tab_puesto VALUES ('$emp_numero', '$emp_puesto', '$emp_nom_supervisor', 
'$emp_fecha_contrato', '$emp_fecha_termino', '$emp_edificio_agencia', '$emp_turno', '$emp_status', 
'$emp_nuevo_contrato');";

if (mysqli_query($con, $sql)) {

    header("HTTP/1.0 404 Not Found");
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Nomina/altaPuesto?alert=0'");
}

// close connection

mysqli_close($con);

?>