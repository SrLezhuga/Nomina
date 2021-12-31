<?php
include("../conexion.php");

$fecha_inicio = $_SESSION['form_fecha_in'];
$fecha_fin = $_SESSION['form_fecha_out'];
$empleado = $_SESSION['form_empleado'];

if ($empleado == 'TODOS') {
    $condicion = '';
} else {
    $condicion = "id_empleado = '$empleado' AND";
}

$queryEmpleado = "SELECT * FROM tab_asistencia WHERE $condicion fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'";
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
                <h1 class="display-2 text-center"><strong>REPORTE DE ASISTENCIAS</strong></h1>
                <div class="row col-12" style="height: 6rem;">
                            <table class="table table-borderless table-sm table-striped table-dark"  width="100%" cellspacing="0">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Status </th>
                                </tr>
                                </thead>
                                <tbody>';

$i = 0;

while ($Empleado = mysqli_fetch_array($rsEmpleado)) {

    if ($Empleado['status'] == 1) {
        $status = 'Asistencia';
    } else {
        $status = 'Falta';
    }

    $item[$i]['status'] = $status;
    $item[$i]['id_empleado'] = $Empleado['id_empleado'];
    $item[$i]['nom_empleado'] = $Empleado['nom_empleado'];
    $item[$i]['fecha'] = $Empleado['fecha'];

    echo '
        <tr>
            <td>' . $item[$i]['id_empleado'] . '</td>
            <td>' . $item[$i]['nom_empleado'] . '</td>
            <td>' . $item[$i]['fecha'] . '</td>
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
