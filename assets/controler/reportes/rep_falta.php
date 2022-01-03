<?php


$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

include("../conexion.php");

echo "
<div class='table-responsive' id='loadtable'>
<table class='table table-hover table-sm' id='dataTableEmpleadoList' width='100%' cellspacing='0'>
<thead>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Asistencias</th>
        <th>Faltas</th>
    </tr>
</thead>
<tbody'>";
$queryEmpleado = "SELECT id_empleado, nom_empleado, sum(status = 1) AS Asistencias, sum(status = 'F') AS Faltas FROM tab_asistencia WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin' GROUP BY id_empleado";
$rsEmpleado = mysqli_query($con, $queryEmpleado) or die("Error de consulta");
while ($Empleado = mysqli_fetch_array($rsEmpleado)) {

    echo "
    <tr>
        <td>" . $Empleado['id_empleado'] . "</td>
        <td>" . $Empleado['nom_empleado'] . "</td>
        <td>" . $Empleado['Asistencias'] . "</td>
        <td>" . $Empleado['Faltas'] . "</td>
    </tr>
";
}

echo "</tbody>
</table>
</div>";

mysqli_close($con);
