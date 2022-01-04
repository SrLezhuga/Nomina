<?php
session_start();
include("../conexion.php");

$query = "SELECT id_empleado FROM tab_empleado ORDER by id_empleado DESC LIMIT 1";
$resultSet = mysqli_query($con, $query) or die(mysqli_error($con));
$item = mysqli_fetch_array($resultSet);

$count = $item['id_empleado'] + 1;


$data = array();
$data['status'] = 'ok';
$data['id_empleado'] = $count;

mysqli_close($con);

echo json_encode($data);


