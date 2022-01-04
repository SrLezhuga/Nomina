<?php
session_start();
include("../conexion.php");

$data = array();

// Obtengo los datos cargados en el formulario de login.
$numero_empleado                = $_POST['numero_empleado'];
$form_umf           = $_POST['form_umf'];
$form_sueldo_diario           = $_POST['form_sueldo_diario'];
$form_status           = $_POST['form_status'];

if (
    empty($numero_empleado) ||
    empty($form_umf) ||
    empty($form_sueldo_diario) ||
    empty($form_status)
) {
    $data['status'] = 'error';
    $data['msj'] = 'Uno o mas campos vacios';
} else {

    


    // Consulta segura para evitar inyecciones SQL.

    $sql = "INSERT INTO tab_seguro VALUES ('$numero_empleado', 
'$form_umf','$form_sueldo_diario','$form_status')
 on duplicate key update 
 unidad_medica_familiar = '$form_umf',
 sueldo_diario_imss = '$form_sueldo_diario',
 alta_imss = '$form_status';";

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
