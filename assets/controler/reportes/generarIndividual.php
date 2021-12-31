<?php
date_default_timezone_set("America/Mexico_City");
date_default_timezone_set('UTC');
include("../conexion.php");
include("traslate.php");

//$fecha = '2021-12-05';
//$dato_empleado = '248';

$fecha = $_SESSION['FechaNomina']; 
$dato_empleado = $_SESSION['EmpleadoNomina'];

$date_obj = new DateTime($fecha); // Crear un objeto de fecha
$num_day = $date_obj->format('w'); // 0-dom, 1-lun, ... 6-sab
$date_obj->modify("-$num_day day"); // Posicionar el objeto en domingo
$wdays = array();
for ($i = 0; $i < 7; $i++) {
    $wdays[] = $date_obj->format('Y-m-d');
    $date_obj->modify('+1 day'); // Incrementar el objeto 1 dia
}

$fecha_viernes = fechaletra($wdays[5]);
$fecha_domingo = fechaletra($wdays[0]);
$fecha_sabado = fechaletra($wdays[6]);

echo '
<!DOCTYPE html>
<html>

<head>
    <title> Nómina | Reporte</title>
    <link rel="icon" href="http://localhost/Nomina/assets/img/Logo/logo.ico" />
    <link href="http://localhost/Nomina/assets/controler/reportes/styles.css" rel="stylesheet" />
</head>

<body>
    ';
    
$queryEmpleado = "SELECT * FROM tab_sueldo WHERE id_empleado = '" . $dato_empleado . "'";
$rsEmpleado = mysqli_query($con, $queryEmpleado) or die(mysqli_error($con));
$Empleado = mysqli_fetch_array($rsEmpleado);

    $queryPuesto = "SELECT puesto, edificio_agencia
          FROM tab_puesto 
          WHERE id_empleado = '" . $Empleado['id_empleado'] . "'";
    $rsPuesto = mysqli_query($con, $queryPuesto) or die(mysqli_error($con));
    $Puesto = mysqli_fetch_array($rsPuesto);

    $CedisEmpleado = strtoupper($Puesto['edificio_agencia']);

    $queryCedis = "SELECT * FROM tab_cedis WHERE nombre = '" .$CedisEmpleado."'";
    $rsCedis = mysqli_query($con, $queryCedis) or die(mysqli_error($con));
    $Cedis = mysqli_fetch_array($rsCedis);
    $NomCedis = $Cedis['nombre'];
    $DirCedis = $Cedis['direccion'];
    $ColCedis = $Cedis['colonia'];
    $CPCedis = $Cedis['codigo_postal'];
    $RFCCedis = $Cedis['rfc'];

    $queryAsistencia = "SELECT concat(e.apellido_pat_empleado, ' ', e.apellido_mat_empleado, ' ', e.nombre_empleado) AS nom_empleado, SUM(a.status = '1') AS T, SUM(a.status = '2') AS TT, SUM(a.status = 'R') AS R, SUM(a.status = 'RR') AS RR, SUM(a.status = 'F') AS F, SUM(a.status = 'M') AS M
          FROM tab_asistencia AS a
          JOIN tab_empleado AS e
          ON a.id_empleado = e.id_empleado
          WHERE a.id_empleado = '" . $dato_empleado . "' AND a.fecha BETWEEN '".$wdays[0]."' AND '".$wdays[6]."'";
    $rsAsistencia = mysqli_query($con, $queryAsistencia) or die(mysqli_error($con));
    $Asistencia = mysqli_fetch_array($rsAsistencia);

   /*$queryBono = "SELECT bono
          FROM tab_bono 
          WHERE id_empleado = '" . $Empleado['id_empleado'] . "'";
    $rsBono = mysqli_query($con, $queryBono) or die(mysqli_error($con));
    $Bono = mysqli_fetch_array($rsBono);

    $queryCaja = "SELECT caja_ahorro
          FROM tab_caja 
          WHERE id_empleado = '" . $Empleado['id_empleado'] . "'";
    $rsCaja = mysqli_query($con, $queryCaja) or die(mysqli_error($con));
    $Caja = mysqli_fetch_array($rsCaja);

    $queryInfonavit = "SELECT descuento
          FROM tab_infonavit 
          WHERE id_empleado = '" . $Empleado['id_empleado'] . "'";
    $rsInfonavit = mysqli_query($con, $queryInfonavit) or die(mysqli_error($con));
    $Infonavit = mysqli_fetch_array($rsInfonavit);

    $queryPrestamo = "SELECT descuento_semana
          FROM tab_prestamo 
          WHERE id_empleado = '" . $Empleado['id_empleado'] . "'";
    $rsPrestamo = mysqli_query($con, $queryPrestamo) or die(mysqli_error($con));
    $Prestamo = mysqli_fetch_array($rsPrestamo);*/

    $NumeroEmpleado = $Empleado['id_empleado'];
    $SalarioDiario = $Empleado['sueldo_diario'];
    $Deposito = $Empleado['fiscal'];
    $Salario = $Empleado['salario'];


    $ValBono = (!empty($Bono['bono'])) ? $BonoEmpleado = $Bono['bono'] : $BonoEmpleado = 0;
    $Incapacidad = 0; //Falta definir
    $ValCaja = (!empty($Caja['caja_ahorro'])) ? $DesCajaAhorro = $Caja['caja_ahorro'] : $DesCajaAhorro = 0;
    $ValPrestamo = (!empty($Prestamo['descuento_semana'])) ? $DesPrestamo = $Prestamo['descuento_semana'] : $DesPrestamo = 0;
    $ValInfonavit = (!empty($Infonavit['descuento'])) ? $DesInfonavit = $Infonavit['descuento'] : $DesInfonavit = 0;



    $PuestoEmpleado = $Puesto['puesto'];
    $NombreEmpleado = $Asistencia['nom_empleado'];
    $CountFaltas = $Asistencia['F'];
    $CountRetardos = $Asistencia['R'] + ($Asistencia['RR'] * 2);
    $CountTExtra = $Asistencia['TT'] + ($Asistencia['M'] * 0.5);
    $CountAsistencias = $Asistencia['T'] + $Asistencia['TT'] + $Asistencia['R'] + $Asistencia['RR'] + $Asistencia['M'];
    $HorasExtra = $CountTExtra * $Empleado['sueldo_diario'];
    $DescuentoRetardos = $CountRetardos * 20;
    $DescuentoFaltas = $CountFaltas * $Empleado['sueldo_diario'];
    $TotalDescuentos = $DesCajaAhorro + $DesPrestamo + $DesInfonavit + $DescuentoFaltas + $DescuentoRetardos;
    $Neto = $Empleado['complemento'] - $TotalDescuentos;
    $TotalNeto = round($Neto + $HorasExtra + $BonoEmpleado);

    echo '
    <div class="container-fluid ">
        <img class="img-l" src="http://localhost/Nomina/assets/img/Logo/logo.png" />
        <div class="row" style="height: 3.5rem;">
            <div class="col-8">
                <h1 class="display-4 text-left"><strong>'.$NomCedis.'</strong></h1>
            </div>
            <div class="col-4 offset-8 text-right">
                <h1 class="display-4 text-right" style="color: crimson;"><strong>Nº EMPLEADO: '.$NumeroEmpleado.'</strong></h1>
            </div>
        </div>
        <div class="row" style="height: 2.5rem;">
            <div class="col-4">
                <a class="display-1">
                    '.$DirCedis.'
                    <br />
                    COL '.$ColCedis.', C.P. '.$CPCedis.'
                    <br />
                    RFC. '.$RFCCedis.'
                    <br />
                </a>
            </div>
            <div class="col-4 offset-4 text-right">
                <a class="display-1">
                    <b>DIA DE PAGO:</b>
                    <br>'.$fecha_viernes.'
                    <br>
                </a>
            </div>
            <div class="col-4 offset-8 text-right">
                <a class="display-1">
                    <b>PERIODO DE PAGO:</b>
                    <br>Del: '.$fecha_domingo.'
                    <br>Al: '.$fecha_sabado.'
                    <br>
                </a>
            </div>
        </div>
        <div class="row" style="height: 1rem;">
            <div class="col-12 text-center" style="background-color: #9E9E9E;">
                <a class="display-2">
                    <b>RECIBO DE NÓMINA</b>
                    <br>
                </a>
            </div>
        </div>
        <fieldset class="border p-2" style="height: 2rem;">
            <legend class="w-auto"><a class="display-1"><strong>Datos del Empleado:</strong></a></legend>
            <div class="row">
                <div class="col-2">
                    <a class="display-1 text-right">
                        <b>Nombre:</b>
                        <br />
                        <b>Puesto:</b>
                        <br />
                    </a>
                </div>
                <div class="col-6 offset-1">
                    <a class="display-1">
                        '.$NombreEmpleado.'
                        <br />
                        '.$PuestoEmpleado.'
                        <br />
                    </a>
                </div>
                <div class="col-2 offset-8">
                    <a class="display-1">
                        <b>Salario Diario:</b>
                        <br />
                        <b>Dias Pagados:</b>
                        <br />
                        <b>Deposito:</b>
                        <br />
                    </a>
                </div>
                <div class="col-2 offset-10">
                    <a class="display-1">
                        $ '.$SalarioDiario.'
                        <br />
                        '.$CountAsistencias.' dias.
                        <br />
                        $ '.$Deposito.'
                        <br />
                    </a>
                </div>
            </div>
        </fieldset>
        <div class="row">
            <div class="col-6" style="height: 4.8rem;">
                <fieldset class="border p-2" style="height: 4rem;">
                    <legend class="w-auto"><a class="display-1"><strong>Percepciones / Otros pagos:</strong></a></legend>
                    <div class="row">
                        <div class="col-3">
                            <a class="display-1">
                                <b>Sueldo:</b>
                                <br />
                                <b>Complemento:</b>
                                <br />
                                <!--<b>Incapacidad:</b>-->
                                <br />
                                <!--<b>Horas Extra:</b>-->
                                <br />
                                <!--<b>Bono:</b>-->
                                <br />
                            </a>
                        </div>
                        <div class="col-9 offset-3">
                            <a class="display-1">
                                $ '.$Deposito.'
                                <br />
                                $ '.$Salario.'
                                <br />
                                <!--$ '.$Incapacidad.'-->
                                <br />
                                <!--$ '.$HorasExtra.'-->
                                <br />
                                <!--$ '.$BonoEmpleado.'-->
                                <br />
                            </a>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-6 offset-6" style="height: 1.5rem;">
                <fieldset class="border p-2" style="height: 4rem;">
                    <legend class="w-auto"><a class="display-1"><strong>Descuentos:</strong></a></legend>
                    <div class="row">
                        <div class="col-3">
                            <a class="display-1">
                                <b>Retardos:</b>
                                <br />
                                <b>Faltas:</b>
                                <br />
                                <!--<b>Caja Ahorro:</b>-->
                                <br />
                                <!--<b>Infonavit:</b>-->
                                <br />
                                <!--<b>Prestamo:</b>-->
                                <br />
                            </a>
                        </div>
                        <div class="col-9 offset-3">
                            <a class="display-1">
                                $ '.$DescuentoRetardos. '
                                <br />
                                $ '.$DescuentoFaltas. '
                                <br />
                                <!--$ '.$DesCajaAhorro.'-->
                                <br />
                                <!--$ '.$DesInfonavit.'-->
                                <br />
                                <!--$ '.$DesPrestamo.'-->
                                <br />
                            </a>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-9 text-center">
                <fieldset class="border p-2" style="height: 1rem;">
                    <legend class="w-auto"><a class="display-1"><strong>Neto en letra:</strong></a></legend>
                    <a class="display-1">
                        '.convertir($TotalNeto).'
                        <br />
                    </a>
                </fieldset>
            </div>
            <div class="col-3 offset-9 text-center">
                <fieldset class="border p-2" style="height: 1rem;">
                    <legend class="w-auto"><a class="display-1"><strong>Neto Recibido:</strong></a></legend>
                    <a class="display-2">
                        $ '.$TotalNeto.'
                        <br />
                    </a>
                </fieldset>
            </div>
        </div>

        <div class="row" style="height: 4.2rem;">
            <div class="col-6 text-center"></div>
            <div class="col-6 offset-6 text-center">
                <a class="display-1">
                    <br>____________________________________
                    <br>'.$NombreEmpleado.'
                    <br><b>Firma</b>
                    <br>
                    <br>
                </a>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="container-fluid img">
        <img class="img-l" src="http://localhost/Nomina/assets/img/Logo/logo.png" />
        <div class="row" style="height: 3.5rem;">
            <div class="col-8">
                <h1 class="display-4 text-left"><strong>'.$NomCedis.'</strong></h1>
            </div>
            <div class="col-4 offset-8 text-right">
                <h1 class="display-4 text-right" style="color: crimson;"><strong>Nº EMPLEADO: '.$NumeroEmpleado.'</strong></h1>
            </div>
        </div>
        <div class="row" style="height: 2.5rem;">
            <div class="col-4">
                <a class="display-1">
                    '.$DirCedis.'
                    <br />
                    COL '.$ColCedis.', C.P. '.$CPCedis.'
                    <br />
                    RFC. '.$RFCCedis.'
                    <br />
                </a>
            </div>
            <div class="col-4 offset-4 text-right">
                <a class="display-1">
                    <b>DIA DE PAGO:</b>
                    <br>'.$fecha_viernes.'
                    <br>
                </a>
            </div>
            <div class="col-4 offset-8 text-right">
                <a class="display-1">
                    <b>PERIODO DE PAGO:</b>
                    <br>Del: '.$fecha_domingo.'
                    <br>Al: '.$fecha_sabado.'
                    <br>
                </a>
            </div>
        </div>
        <div class="row" style="height: 1rem;">
            <div class="col-12 text-center" style="background-color: #9E9E9E;">
                <a class="display-2">
                    <b>RECIBO DE NÓMINA</b>
                    <br>
                </a>
            </div>
        </div>
        <fieldset class="border p-2" style="height: 2rem;">
            <legend class="w-auto"><a class="display-1"><strong>Datos del Empleado:</strong></a></legend>
            <div class="row">
                <div class="col-2">
                    <a class="display-1 text-right">
                        <b>Nombre:</b>
                        <br />
                        <b>Puesto:</b>
                        <br />
                    </a>
                </div>
                <div class="col-6 offset-1">
                    <a class="display-1">
                        '.$NombreEmpleado.'
                        <br />
                        '.$PuestoEmpleado.'
                        <br />
                    </a>
                </div>
                <div class="col-2 offset-8">
                    <a class="display-1">
                        <b>Salario Diario:</b>
                        <br />
                        <b>Dias Pagados:</b>
                        <br />
                        <b>Deposito:</b>
                        <br />
                    </a>
                </div>
                <div class="col-2 offset-10">
                    <a class="display-1">
                        $ '.$SalarioDiario.'
                        <br />
                        '.$CountAsistencias.' dias.
                        <br />
                        $ '.$Deposito.'
                        <br />
                    </a>
                </div>
            </div>
        </fieldset>
        <div class="row">
            <div class="col-6" style="height: 4.8rem;">
                <fieldset class="border p-2" style="height: 4rem;">
                    <legend class="w-auto"><a class="display-1"><strong>Percepciones / Otros pagos:</strong></a></legend>
                    <div class="row">
                        <div class="col-3">
                            <a class="display-1">
                                <b>Sueldo:</b>
                                <br />
                                <b>Complemento:</b>
                                <br />
                                <b>Incapacidad:</b>
                                <br />
                                <b>Horas Extra:</b>
                                <br />
                                <b>Bono:</b>
                                <br />
                            </a>
                        </div>
                        <div class="col-9 offset-3">
                            <a class="display-1">
                                $ '.$Deposito.'
                                <br />
                                $ '.$Salario.'
                                <br />
                                $ '.$Incapacidad.'
                                <br />
                                $ '.$HorasExtra.'
                                <br />
                                $ '.$BonoEmpleado.'
                                <br />
                            </a>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-6 offset-6" style="height: 1.5rem;">
                <fieldset class="border p-2" style="height: 4rem;">
                    <legend class="w-auto"><a class="display-1"><strong>Descuentos:</strong></a></legend>
                    <div class="row">
                        <div class="col-3">
                            <a class="display-1">
                                <b>Caja Ahorro:</b>
                                <br />
                                <b>Infonavit:</b>
                                <br />
                                <b>Prestamo:</b>
                                <br />
                                <b>Retardos:</b>
                                <br />
                                <b>Faltas:</b>
                                <br />
                            </a>
                        </div>
                        <div class="col-9 offset-3">
                            <a class="display-1">
                                $ '.$DesCajaAhorro.'
                                <br />
                                $ '.$DesInfonavit.'
                                <br />
                                $ '.$DesPrestamo.'
                                <br />
                                $ '.$DescuentoRetardos.'
                                <br />
                                $ '.$DescuentoFaltas.'
                                <br />
                            </a>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-9 text-center">
                <fieldset class="border p-2" style="height: 1rem;">
                    <legend class="w-auto"><a class="display-1"><strong>Neto en letra:</strong></a></legend>
                    <a class="display-1">
                        '.convertir($TotalNeto).'
                        <br />
                    </a>
                </fieldset>
            </div>
            <div class="col-3 offset-9 text-center">
                <fieldset class="border p-2" style="height: 1rem;">
                    <legend class="w-auto"><a class="display-1"><strong>Neto Recibido:</strong></a></legend>
                    <a class="display-2">
                        $ '.$TotalNeto.'
                        <br />
                    </a>
                </fieldset>
            </div>
        </div>

        <div class="row" style="height: 4.2rem;">
            <div class="col-6 text-center"></div>
            <div class="col-6 offset-6 text-center">
                <a class="display-1">
                    <br>____________________________________
                    <br>'.$NombreEmpleado.'
                    <br><b>Firma</b>
                    <br>
                    <br>
                </a>
            </div>
        </div>
    </div>

    ';

echo '
</body>

</html>
';

?>


    

    



