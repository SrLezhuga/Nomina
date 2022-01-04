<?php
session_start();
include("../conexion.php");

// Obtengo los datos cargados en el formulario de login.
$emp_numero              = $_POST['form_numero_empleado'];
$emp_seguro              = $_POST['form_umf'];
$emp_sueldo              = $_POST['form_sueldo'];


// Consulta segura para evitar inyecciones SQL.

$sql = "INSERT INTO tab_seguro VALUES ('$emp_numero', '$emp_seguro', '$emp_sueldo', 'VIGENTE');";

if (mysqli_query($con, $sql)) {

    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Nomina/altaIssste?alert=0'");
}

// close connection

mysqli_close($con);

?>