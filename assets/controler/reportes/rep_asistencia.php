<?php


$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$empleado = $_POST['empleado'];

if ($empleado == 'TODOS') {
    $condicion = '';
} else {
    $condicion = "id_empleado = '$empleado' AND";
}

include("../conexion.php");

echo "
<div class='table-responsive' id='loadtable'>
<table class='table table-hover table-sm' id='dataTableEmpleadoList' width='100%' cellspacing='0'>
<thead>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Status </th>
    </tr>
</thead>
<tbody'>";
$queryEmpleado = "SELECT * FROM tab_asistencia WHERE $condicion fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
$rsEmpleado = mysqli_query($con, $queryEmpleado) or die("Error de consulta");
while ($Empleado = mysqli_fetch_array($rsEmpleado)) {

    if ($Empleado['status'] == 1) {
        $status = 'Asistencia';
    } else {
        $status = 'Falta';
    }


    echo "
    <tr>
        <td>" . $Empleado['id_empleado'] . "</td>
        <td>" . $Empleado['nom_empleado'] . "</td>
        <td>" . $Empleado['fecha'] . "</td>
        <td>" . $status . "</td>
    </tr>
";
}

echo "</tbody>
</table>
</div>";

mysqli_close($con);
