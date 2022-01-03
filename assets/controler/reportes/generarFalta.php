<?php
include("../conexion.php");

$fecha_inicio = $_SESSION['form_fecha_in'];
$fecha_fin = $_SESSION['form_fecha_out'];

$queryEmpleado = "SELECT id_empleado, nom_empleado, sum(status = 1) AS Asistencias, sum(status = 'F') AS Faltas FROM tab_asistencia WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin' GROUP BY id_empleado";
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
                <h1 class="display-2 text-center"><strong>REPORTE DE FALTAS</strong></h1>
                <div class="row col-12" style="height: 6rem;">
                            <table class="table table-borderless table-sm table-striped table-dark"  width="100%" cellspacing="0">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Asistencias</th>
                                    <th>Faltas</th>
                                </tr>
                                </thead>
                                <tbody>';

$i = 0;

while ($Empleado = mysqli_fetch_array($rsEmpleado)) {

    $item[$i]['id_empleado'] = $Empleado['id_empleado'];
    $item[$i]['nom_empleado'] = $Empleado['nom_empleado'];
    $item[$i]['Asistencias'] = $Empleado['Asistencias'];
    $item[$i]['Faltas'] = $Empleado['Faltas'];

    echo '
        <tr>
            <td>' . $item[$i]['id_empleado'] . '</td>
            <td>' . $item[$i]['nom_empleado'] . '</td>
            <td>' . $item[$i]['Asistencias'] . '</td>
            <td>' . $item[$i]['Faltas'] . '</td>
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
