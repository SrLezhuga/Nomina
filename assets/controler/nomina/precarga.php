<?php
include("../conexion.php");
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");

$empleado = $_POST['empleado'];
$fecha = $_POST['fecha'];

function unidad($numuero)
{
    switch ($numuero) {
        case 9: {
                $numu = "NUEVE";
                break;
            }
        case 8: {
                $numu = "OCHO";
                break;
            }
        case 7: {
                $numu = "SIETE";
                break;
            }
        case 6: {
                $numu = "SEIS";
                break;
            }
        case 5: {
                $numu = "CINCO";
                break;
            }
        case 4: {
                $numu = "CUATRO";
                break;
            }
        case 3: {
                $numu = "TRES";
                break;
            }
        case 2: {
                $numu = "DOS";
                break;
            }
        case 1: {
                $numu = "UNO";
                break;
            }
        case 0: {
                $numu = "";
                break;
            }
    }
    return $numu;
}

function decena($numdero)
{

    if ($numdero >= 90 && $numdero <= 99) {
        $numd = "NOVENTA ";
        if ($numdero > 90)
            $numd = $numd . "Y " . (unidad($numdero - 90));
    } else if ($numdero >= 80 && $numdero <= 89) {
        $numd = "OCHENTA ";
        if ($numdero > 80)
            $numd = $numd . "Y " . (unidad($numdero - 80));
    } else if ($numdero >= 70 && $numdero <= 79) {
        $numd = "SETENTA ";
        if ($numdero > 70)
            $numd = $numd . "Y " . (unidad($numdero - 70));
    } else if ($numdero >= 60 && $numdero <= 69) {
        $numd = "SESENTA ";
        if ($numdero > 60)
            $numd = $numd . "Y " . (unidad($numdero - 60));
    } else if ($numdero >= 50 && $numdero <= 59) {
        $numd = "CINCUENTA ";
        if ($numdero > 50)
            $numd = $numd . "Y " . (unidad($numdero - 50));
    } else if ($numdero >= 40 && $numdero <= 49) {
        $numd = "CUARENTA ";
        if ($numdero > 40)
            $numd = $numd . "Y " . (unidad($numdero - 40));
    } else if ($numdero >= 30 && $numdero <= 39) {
        $numd = "TREINTA ";
        if ($numdero > 30)
            $numd = $numd . "Y " . (unidad($numdero - 30));
    } else if ($numdero >= 20 && $numdero <= 29) {
        if ($numdero == 20)
            $numd = "VEINTE ";
        else
            $numd = "VEINTI" . (unidad($numdero - 20));
    } else if ($numdero >= 10 && $numdero <= 19) {
        switch ($numdero) {
            case 10: {
                    $numd = "DIEZ ";
                    break;
                }
            case 11: {
                    $numd = "ONCE ";
                    break;
                }
            case 12: {
                    $numd = "DOCE ";
                    break;
                }
            case 13: {
                    $numd = "TRECE ";
                    break;
                }
            case 14: {
                    $numd = "CATORCE ";
                    break;
                }
            case 15: {
                    $numd = "QUINCE ";
                    break;
                }
            case 16: {
                    $numd = "DIECISEIS ";
                    break;
                }
            case 17: {
                    $numd = "DIECISIETE ";
                    break;
                }
            case 18: {
                    $numd = "DIECIOCHO ";
                    break;
                }
            case 19: {
                    $numd = "DIECINUEVE ";
                    break;
                }
        }
    } else
        $numd = unidad($numdero);
    return $numd;
}

function centena($numc)
{
    if ($numc >= 100) {
        if ($numc >= 900 && $numc <= 999) {
            $numce = "NOVECIENTOS ";
            if ($numc > 900)
                $numce = $numce . (decena($numc - 900));
        } else if ($numc >= 800 && $numc <= 899) {
            $numce = "OCHOCIENTOS ";
            if ($numc > 800)
                $numce = $numce . (decena($numc - 800));
        } else if ($numc >= 700 && $numc <= 799) {
            $numce = "SETECIENTOS ";
            if ($numc > 700)
                $numce = $numce . (decena($numc - 700));
        } else if ($numc >= 600 && $numc <= 699) {
            $numce = "SEISCIENTOS ";
            if ($numc > 600)
                $numce = $numce . (decena($numc - 600));
        } else if ($numc >= 500 && $numc <= 599) {
            $numce = "QUINIENTOS ";
            if ($numc > 500)
                $numce = $numce . (decena($numc - 500));
        } else if ($numc >= 400 && $numc <= 499) {
            $numce = "CUATROCIENTOS ";
            if ($numc > 400)
                $numce = $numce . (decena($numc - 400));
        } else if ($numc >= 300 && $numc <= 399) {
            $numce = "TRESCIENTOS ";
            if ($numc > 300)
                $numce = $numce . (decena($numc - 300));
        } else if ($numc >= 200 && $numc <= 299) {
            $numce = "DOSCIENTOS ";
            if ($numc > 200)
                $numce = $numce . (decena($numc - 200));
        } else if ($numc >= 100 && $numc <= 199) {
            if ($numc == 100)
                $numce = "CIEN ";
            else
                $numce = "CIENTO " . (decena($numc - 100));
        }
    } else
        $numce = decena($numc);

    return $numce;
}

function miles($nummero)
{
    if ($nummero >= 1000 && $nummero < 2000) {
        $numm = "MIL " . (centena($nummero % 1000));
    }
    if ($nummero >= 2000 && $nummero < 10000) {
        $numm = unidad(Floor($nummero / 1000)) . " MIL " . (centena($nummero % 1000));
    }
    if ($nummero < 1000)
        $numm = centena($nummero);

    return $numm;
}

function decmiles($numdmero)
{
    if ($numdmero == 10000)
        $numde = "DIEZ MIL";
    if ($numdmero > 10000 && $numdmero < 20000) {
        $numde = decena(Floor($numdmero / 1000)) . "MIL " . (centena($numdmero % 1000));
    }
    if ($numdmero >= 20000 && $numdmero < 100000) {
        $numde = decena(Floor($numdmero / 1000)) . " MIL " . (miles($numdmero % 1000));
    }
    if ($numdmero < 10000)
        $numde = miles($numdmero);

    return $numde;
}

function cienmiles($numcmero)
{
    if ($numcmero == 100000)
        $num_letracm = "CIEN MIL";
    if ($numcmero >= 100000 && $numcmero < 1000000) {
        $num_letracm = centena(Floor($numcmero / 1000)) . " MIL " . (centena($numcmero % 1000));
    }
    if ($numcmero < 100000)
        $num_letracm = decmiles($numcmero);
    return $num_letracm;
}

function millon($nummiero)
{
    if ($nummiero >= 1000000 && $nummiero < 2000000) {
        $num_letramm = "UN MILLON " . (cienmiles($nummiero % 1000000));
    }
    if ($nummiero >= 2000000 && $nummiero < 10000000) {
        $num_letramm = unidad(Floor($nummiero / 1000000)) . " MILLONES " . (cienmiles($nummiero % 1000000));
    }
    if ($nummiero < 1000000)
        $num_letramm = cienmiles($nummiero);

    return $num_letramm;
}

function decmillon($numerodm)
{
    if ($numerodm == 10000000)
        $num_letradmm = "DIEZ MILLONES";
    if ($numerodm > 10000000 && $numerodm < 20000000) {
        $num_letradmm = decena(Floor($numerodm / 1000000)) . "MILLONES " . (cienmiles($numerodm % 1000000));
    }
    if ($numerodm >= 20000000 && $numerodm < 100000000) {
        $num_letradmm = decena(Floor($numerodm / 1000000)) . " MILLONES " . (millon($numerodm % 1000000));
    }
    if ($numerodm < 10000000)
        $num_letradmm = millon($numerodm);

    return $num_letradmm;
}

function cienmillon($numcmeros)
{
    if ($numcmeros == 100000000)
        $num_letracms = "CIEN MILLONES";
    if ($numcmeros >= 100000000 && $numcmeros < 1000000000) {
        $num_letracms = centena(Floor($numcmeros / 1000000)) . " MILLONES " . (millon($numcmeros % 1000000));
    }
    if ($numcmeros < 100000000)
        $num_letracms = decmillon($numcmeros);
    return $num_letracms;
}

function milmillon($nummierod)
{
    if ($nummierod >= 1000000000 && $nummierod < 2000000000) {
        $num_letrammd = "MIL " . (cienmillon($nummierod % 1000000000));
    }
    if ($nummierod >= 2000000000 && $nummierod < 10000000000) {
        $num_letrammd = unidad(Floor($nummierod / 1000000000)) . " MIL " . (cienmillon($nummierod % 1000000000));
    }
    if ($nummierod < 1000000000)
        $num_letrammd = cienmillon($nummierod);

    return $num_letrammd;
}

function convertir($numero)
{
    $num = str_replace(",", "", $numero);
    $num = number_format($num, 2, '.', '');
    $cents = substr($num, strlen($num) - 2, strlen($num) - 1);
    $num = (int)$num;

    $numf = milmillon($num);

    return $numf . " PESOS CON " . $cents . "/100 M.N.";
}

function fechaletra($fecha_inicio)
{

    $Inicio = explode("-", $fecha_inicio);
    $dia = $Inicio[2];
    $mes = $Inicio[1];
    $año = $Inicio[0];

    switch ($mes) {
        case '01':
            $m = "Enero";
            break;
        case '02':
            $m = "Febrero";
            break;
        case '03':
            $m = "Marzo";
            break;
        case '04':
            $m = "Abril";
            break;
        case '05':
            $m = "Mayo";
            break;
        case '06':
            $m = "Junio";
            break;
        case '07':
            $m = "Julio";
            break;
        case '08':
            $m = "Agosto";
            break;
        case '09':
            $m = "Septiembre";
            break;
        case '10':
            $m = "Octubre";
            break;
        case '11':
            $m = "Noviembre";
            break;
        case '12':
            $m = "Diciembre";
            break;
    }

    return $dia . " de " . $m . " del " . $año;
}

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

$fecha_actual = date("Y-m-d");
$fecha_before = date("Y-m-d", strtotime($fecha_actual . "+ 1 day"));
$fecha_after = date("Y-m-d", strtotime($fecha_actual . "- 1 day"));

if ($fecha >= $fecha_before) {
    $data = array();
    $data['status'] = 'error';
    $data['msg'] = 'La fecha no puede ser mayor a la actual';
} else {
    if ($fecha <= $fecha_after) {
        $data = array();
        $data['status'] = 'error';
        $data['msg'] = 'La fecha no puede ser menor a la actual';
    } else {

        $queryEmpleado = "SELECT * FROM tab_sueldo";
        $rsEmpleado = mysqli_query($con, $queryEmpleado) or die(mysqli_error($con));
        while ($Empleado = mysqli_fetch_array($rsEmpleado)) {

            $queryPuesto = "SELECT puesto, edificio_agencia
          FROM tab_puesto 
          WHERE id_empleado = '" . $empleado . "'";
            $rsPuesto = mysqli_query($con, $queryPuesto) or die(mysqli_error($con));
            $Puesto = mysqli_fetch_array($rsPuesto);

            $CedisEmpleado = strtoupper($Puesto['edificio_agencia']);

            $queryCedis = "SELECT * FROM tab_cedis WHERE nombre = '" . $CedisEmpleado . "'";
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
          WHERE a.id_empleado = '" . $empleado . "' AND a.fecha BETWEEN '" . $wdays[0] . "' AND '" . $wdays[6] . "'
          GROUP BY nom_empleado";
            $rsAsistencia = mysqli_query($con, $queryAsistencia) or die(mysqli_error($con));
            $Asistencia = mysqli_fetch_array($rsAsistencia);

            if (empty($Asistencia['nom_empleado'])) {
                $data = array();
                $data['status'] = 'error';
                $data['msg'] = 'El empleado no tiene todas las asistencias capturadas.';
            } else {



                /*   $queryBono = "SELECT bono
          FROM tab_bono 
          WHERE id_empleado = '" . $empleado . "'";
    $rsBono = mysqli_query($con, $queryBono) or die(mysqli_error($con));
    $Bono = mysqli_fetch_array($rsBono);*/

                /* $queryCaja = "SELECT caja_ahorro
          FROM tab_caja 
          WHERE id_empleado = '" . $empleado . "'";
    $rsCaja = mysqli_query($con, $queryCaja) or die(mysqli_error($con));
    $Caja = mysqli_fetch_array($rsCaja);*/

                /*  $queryInfonavit = "SELECT descuento
          FROM tab_infonavit 
          WHERE id_empleado = '" . $empleado . "'";
    $rsInfonavit = mysqli_query($con, $queryInfonavit) or die(mysqli_error($con));
    $Infonavit = mysqli_fetch_array($rsInfonavit);*/

                /*  $queryPrestamo = "SELECT descuento_semana
          FROM tab_prestamo 
          WHERE id_empleado = '" . $empleado . "'";
    $rsPrestamo = mysqli_query($con, $queryPrestamo) or die(mysqli_error($con));
    $Prestamo = mysqli_fetch_array($rsPrestamo);*/

                $NumeroEmpleado = $empleado;
                $SalarioDiario = $Empleado['sueldo_diario'];
                $Deposito = $Empleado['fiscal'];
                $Salario = $Empleado['salario'];

                $ValBono = (!empty($Bono['bono'])) ? $BonoEmpleado = $Bono['bono'] : $BonoEmpleado = 0.00;
                $Incapacidad = 0.00; //Falta definir
                $ValCaja = (!empty($Caja['caja_ahorro'])) ? $DesCajaAhorro = $Caja['caja_ahorro'] : $DesCajaAhorro = 0.00;
                $ValPrestamo = (!empty($Prestamo['descuento_semana'])) ? $DesPrestamo = $Prestamo['descuento_semana'] : $DesPrestamo = 0.00;
                $ValInfonavit = (!empty($Infonavit['descuento'])) ? $DesInfonavit = $Infonavit['descuento'] : $DesInfonavit = 0.00;

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



                $data = array();
                $data['status'] = 'ok';

                $data['NomCedis'] =  $NomCedis;
                $data['empleado'] =  $empleado;
                $data['DirCedis'] =  $DirCedis;
                $data['ColCedis'] =  $ColCedis;
                $data['CPCedis'] =  $CPCedis;
                $data['RFCCedis'] =  $RFCCedis;
                $data['fecha_viernes'] =  $fecha_viernes;
                $data['fecha_domingo'] =  $fecha_domingo;
                $data['fecha_sabado'] =  $fecha_sabado;
                $data['NombreEmpleado'] =  $NombreEmpleado;
                $data['PuestoEmpleado'] =  $PuestoEmpleado;
                $data['SalarioDiario'] =  $SalarioDiario;
                $data['CountAsistencias'] =  $CountAsistencias;
                $data['Deposito'] =  $Deposito;
                $data['Salario'] =  $Salario;
                $data['Incapacidad'] =  $Incapacidad;
                $data['HorasExtra'] =  $HorasExtra;
                $data['BonoEmpleado'] =  $BonoEmpleado;
                $data['DesCajaAhorro'] =  $DesCajaAhorro;
                $data['DesInfonavit'] =  $DesInfonavit;
                $data['DesPrestamo'] =  $DesPrestamo;
                $data['DescuentoRetardos'] =  $DescuentoRetardos;
                $data['DescuentoFaltas'] =  $DescuentoFaltas;
                $data['TotalNetoLetra'] =  convertir($TotalNeto);
                $data['TotalNeto'] =  $TotalNeto;

                // returns data as JSON format
            }
        }
    }
}


echo json_encode($data);
