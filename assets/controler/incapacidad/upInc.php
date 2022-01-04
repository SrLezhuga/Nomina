<?php
session_start();
include("../conexion.php");

$data = array();

// Obtengo los datos cargados en el formulario de login.
$form_numero_empleado                = $_POST['form_numero_empleado'];
$form_nom_empleado           = $_POST['form_nom_empleado'];
$form_fecha           = $_POST['form_fecha'];
$form_status           = $_POST['form_status'];
$form_comentario           = $_POST['form_comentario'];

if (
    empty($form_numero_empleado) ||
    empty($form_nom_empleado) ||
    empty($form_fecha) ||
    empty($form_status) ||
    empty($form_comentario)
) {
    $data['status'] = 'error';
    $data['msj'] = 'Uno o mas campos vacios';
} else {

    
    // Consulta segura para evitar inyecciones SQL.

    $sql = "INSERT INTO tab_incapacidad VALUES ('$form_numero_empleado', 
'$form_nom_empleado','$form_fecha','$form_status', '$form_comentario')
 on duplicate key update 
 motivo = '$form_status',
 Comentarios = '$form_comentario'";

    if (mysqli_query($con, $sql)) {
        $data['status'] = 'ok';
        $data['msj'] = 'Se actualizó falta';
    } else {
        $data['status'] = 'error';
        $data['msj'] = 'No se guardaron los cambios.';
        $data['error'] = mysqli_error($con);
    }
}
echo json_encode($data);

// close connection

mysqli_close($con);
