<?php
include("../conexion.php");

$queryEmpleado = "SELECT id_empleado, puesto, nombre_supervisor, fecha_contrato, fecha_fin_contrato, turno, status FROM tab_puesto";
$rsEmpleado = mysqli_query($con, $queryEmpleado) or die("Error de consulta");

echo '
    <html>
      <head>
      <title> Nómina | Reporte</title>
        <link rel="icon" href="http://localhost/Nomina/assets/img/Logo/MFA.ico" />
        <link rel="stylesheet" href="http://localhost/Nomina/assets/controler/reportes/styles.css">
      </head>
        <body>
            <div class="row header"  style="height: 5.5rem;">
            <img class="img-l" src="http://localhost/Nomina/assets/img/Logo/logo.png" />
                
            </div>  
            <div class="container-fluid">
            <h1 class="display-4 text-center"><strong>ESCUELA NORMAL RURAL MIGUEL HIDALGO</strong></h1>
                <br>
                <h1 class="display-2 text-center"><strong>REPORTE DE EMPLEADOS</strong></h1>
                <div class="row" style="height: 6rem;">
                            <table class="table table-borderless table-sm table-striped table-dark"  width="100%" cellspacing="0">
                                <thead class="thead-dark">
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
                                <tbody>';

$i = 0;

while ($Empleado = mysqli_fetch_array($rsEmpleado)) {
    $queryNombre = "SELECT concat(apellido_pat_empleado, ' ', apellido_mat_empleado, ' ', nombre_empleado) AS nom_empleado FROM tab_empleado WHERE id_empleado = '" . $Empleado['id_empleado'] . "'";
    $rsNombre = mysqli_query($con, $queryNombre) or die("Error de consulta");
    $Nombre = mysqli_fetch_array($rsNombre);

    $item[$i]['id_empleado'] = $Empleado['id_empleado'];
    $item[$i]['nom_empleado'] = $Nombre['nom_empleado'];
    $item[$i]['puesto'] = $Empleado['puesto'];
    $item[$i]['nombre_supervisor'] = $Empleado['nombre_supervisor'];
    $item[$i]['fecha_contrato'] = $Empleado['fecha_contrato'];
    $item[$i]['fecha_fin_contrato'] = $Empleado['fecha_fin_contrato'];
    $item[$i]['turno'] = $Empleado['turno'];
    $item[$i]['status'] = $Empleado['status'];



    echo '
        <tr>
            <td>' . $item[$i]['id_empleado'] . '</td>
            <td>' . $item[$i]['nom_empleado'] . '</td>
            <td>' . $item[$i]['puesto'] . '</td>
            <td>' . $item[$i]['nombre_supervisor'] . '</td>
            <td>' . $item[$i]['fecha_contrato'] . '</td>
            <td>' . $item[$i]['fecha_fin_contrato'] . '</td>
            <td>' . $item[$i]['turno'] . '</td>
            <td>' . $item[$i]['status'] . '</td>
        </tr> ';
    $i++;
}
echo '
                                </tbody>
                            </table>
                    </div>  
            </div>  
        </body>
    </html>
    ';
