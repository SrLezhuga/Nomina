<?php
session_start();
include("../conexion.php");
$id = $_POST['id'];

$query = "SELECT concat(e.apellido_pat_empleado, ' ', e.apellido_mat_empleado, ' ', e.nombre_empleado) as nombre, e.status_empleado, p.puesto
FROM nomina.tab_empleado as e
JOIN tab_puesto as p
ON e.id_empleado = p.id_empleado
WHERE e.id_empleado = " . $id;
$resultSet = mysqli_query($con, $query) or die(mysqli_error($con));
$item = mysqli_fetch_array($resultSet);

$data = array();

if ($item==null) {
 
    $data['status'] = 'error';
}

else{

    $data['status'] = 'ok';
    $data['nombre'] = $item['nombre'];
    $data['status_empleado'] = $item['status_empleado'];
    $data['puesto'] = $item['puesto'];
    $data['id'] = $id;
    
}

//returns data as JSON format
    echo json_encode($data);

?>