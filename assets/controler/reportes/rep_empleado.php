<?php
include("../conexion.php");

echo "
<div class='table-responsive' id='loadtable'>
<table class='table table-hover table-sm' id='dataTableEmpleadoList' width='100%' cellspacing='0'>
<thead>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Puesto</th>
        <th>Supervisor</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Turno</th>
        <th>Status </th>
    </tr> 
</thead>
<tbody'>";
$queryEmpleado = "SELECT id_empleado, puesto, nombre_supervisor, fecha_contrato, fecha_fin_contrato, turno, status FROM tab_puesto";
$rsEmpleado = mysqli_query($con, $queryEmpleado) or die("Error de consulta");
while ($Empleado = mysqli_fetch_array($rsEmpleado)) {
    $queryNombre = "SELECT concat(apellido_pat_empleado, ' ', apellido_mat_empleado, ' ', nombre_empleado) AS nom_empleado FROM tab_empleado WHERE id_empleado = '" . $Empleado['id_empleado'] . "'";
    $rsNombre = mysqli_query($con, $queryNombre) or die("Error de consulta");
    $Nombre = mysqli_fetch_array($rsNombre);

    echo "
        <tr id='tab_empleado'>
            <td>" . $Empleado['id_empleado'] . "</td>
            <td>" . $Nombre['nom_empleado'] . "</td>
            <td>" . $Empleado['puesto'] . "</td>
            <td>" . $Empleado['nombre_supervisor'] . "</td>
            <td>" . $Empleado['fecha_contrato'] . "</td>
            <td>" . $Empleado['fecha_fin_contrato'] . "</td>
            <td>" . $Empleado['turno'] . "</td>
            <td>" . $Empleado['status'] . "</td>
        </tr>
    ";
}

echo "</tbody>
</table>
</div>";

mysqli_close($con);
