<?php
session_start();
include("../conexion.php");

// Obtengo los datos cargados en el formulario de login.
$emp_numero                = $_POST['form_numero_empleado'];
$emp_ape_paterno           = $_POST['form_apellido_paterno'];
$emp_ape_materno           = $_POST['form_apellido_materno'];
$emp_nombres               = $_POST['form_nombres'];
$emp_domicilio             = $_POST['form_domicilio'];
$emp_colonia               = $_POST['form_colonia'];
$emp_codigo_postal         = $_POST['form_codigo_postal'];
$emp_ciudad                = $_POST['form_ciudad'];
$emp_estado                = $_POST['form_estado'];
$emp_NSS                   = $_POST['form_NSS'];
$emp_RFC                   = $_POST['form_RFC'];
$emp_CURP                  = $_POST['form_CURP'];
$emp_sexo                  = $_POST['form_sexo'];
$emp_fecha_nacimiento      = $_POST['form_fecha_nacimiento'];
$emp_pais_nacimiento       = $_POST['form_pais_nacimiento'];
$emp_estado_nacimiento     = $_POST['form_estado_nacimiento'];
$emp_ciudad_nacimiento     = $_POST['form_ciudad_nacimiento'];
$emp_estado_civil          = $_POST['form_estado_civil'];

// Consulta segura para evitar inyecciones SQL.

$sql = "INSERT INTO tab_empleado VALUES ('$emp_numero', DEFAULT,
'$emp_ape_paterno','$emp_ape_materno','$emp_nombres','$emp_domicilio','$emp_colonia',
'$emp_codigo_postal', '$emp_ciudad', '$emp_estado', '$emp_NSS', '$emp_RFC', '$emp_CURP'
, '$emp_sexo', '$emp_fecha_nacimiento', '$emp_pais_nacimiento', '$emp_estado_nacimiento',
 '$emp_ciudad_nacimiento', '$emp_estado_civil');";

if (mysqli_query($con, $sql)) {

    header("HTTP/1.0 404 Not Found");
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Nomina/altaEmpleado?alert=0'");
}

// close connection

mysqli_close($con);

?>