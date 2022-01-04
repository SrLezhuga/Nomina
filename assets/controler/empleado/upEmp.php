<?php
session_start();
include("../conexion.php");

$data = array();

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

if (
    empty($emp_numero) ||
    empty($emp_ape_paterno) ||
    empty($emp_ape_materno) ||
    empty($emp_nombres) ||
    empty($emp_domicilio) ||
    empty($emp_colonia) ||
    empty($emp_codigo_postal) ||
    empty($emp_ciudad) ||
    empty($emp_estado) ||
    empty($emp_NSS) ||
    empty($emp_RFC) ||
    empty($emp_CURP) ||
    empty($emp_sexo) ||
    empty($emp_fecha_nacimiento) ||
    empty($emp_pais_nacimiento) ||
    empty($emp_estado_nacimiento) ||
    empty($emp_ciudad_nacimiento) ||
    empty($emp_estado_civil)
) {
    $data['status'] = 'error';
    $data['msj'] = 'Uno o mas campos vacios';
} else {




    // Consulta segura para evitar inyecciones SQL.

    $sql = "INSERT INTO tab_empleado VALUES ('$emp_numero', DEFAULT,
'$emp_ape_paterno','$emp_ape_materno','$emp_nombres','$emp_domicilio','$emp_colonia',
'$emp_codigo_postal', '$emp_ciudad', '$emp_estado', '$emp_NSS', '$emp_RFC', '$emp_CURP'
, '$emp_sexo', '$emp_fecha_nacimiento', '$emp_pais_nacimiento', '$emp_estado_nacimiento',
 '$emp_ciudad_nacimiento', '$emp_estado_civil')
 on duplicate key update 
 apellido_pat_empleado = '$emp_ape_paterno',
 apellido_mat_empleado = '$emp_ape_materno',
 nombre_empleado = '$emp_nombres',
 domicilio_empleado = '$emp_domicilio',
 colonia_empleado = '$emp_colonia',
 codigo_postal_empleado = '$emp_codigo_postal',
 ciudad_empleado = '$emp_ciudad',
 estado_empleado = '$emp_estado', 
 NSS_empleado = '$emp_NSS',
 RFC_empleado = '$emp_RFC', 
 CURP_empleado = '$emp_CURP',
 sexo_empleado = '$emp_sexo',
 fecha_nacimiento_empleado ='$emp_fecha_nacimiento', 
 pais_nacimiento_empleado = '$emp_pais_nacimiento',
 estado_nacimiento_empleado = '$emp_estado_nacimiento',
 ciudad_nacimiento_empleado = '$emp_ciudad_nacimiento',
 estado_civil_empleado =  '$emp_estado_civil';";

    if (mysqli_query($con, $sql)) {
        $data['status'] = 'ok';
        $data['msj'] = 'Se actualizó empleado';
    } else {
        $data['status'] = 'error';
        $data['msj'] = 'No se guardaron los cambios.';
    }
}
echo json_encode($data);

// close connection

mysqli_close($con);