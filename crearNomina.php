<?php
include("assets/controler/conexion.php"); 
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nomina MFA | Crear Nomina</title>
    <?php include("assets/common/header.php"); ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <?php include("assets/common/sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Topbar -->
        <?php include("assets/common/topbar.php"); ?>
        <!-- End of Topbar -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <br>
            <div class="container">


                <div class="card border-left-pink shadow ">
                    <div class="card-body">
                        <h1>
                            <center>Lista sueldo</center>
                        </h1>
                        <!-- DataTales -->
                        <div class="table-responsive">
                            <table class="table table-hover table-sm" id="dataTableCliente" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Sueldo Diario</th>
                                        <th>Salario</th>
                                        <th>Fiscal</th>
                                        <th>Complemento</th>
                                        <th>Numero Cuenta</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>


                            <?php
     $sem_actual = date('Y-m-d');

     $date_obj = new DateTime('2021-01-31'); // Crear un objeto de fecha
     $num_day = $date_obj->format('w'); // 0-dom, 1-lun, ... 6-sab
     $date_obj->modify("-$num_day day"); // Posicionar el objeto en domingo
     $wdays = array();
     for ($i = 0; $i < 7; $i++) {
         $wdays[] = $date_obj->format('Y-m-d');
         $date_obj->modify('+1 day'); // Incrementar el objeto 1 dia
     }

function fechaletra($fecha_inicio){
  
    $Inicio = explode("-", $fecha_inicio);
    $dia=$Inicio[2];
    $mes=$Inicio[1];
    $año=$Inicio[0];
    
    switch ($mes) {
        case '01':
            $m="Enero";
            break;
        case '02':
            $m="Febrero";
            break;
        case '03':
            $m="Marzo";
            break;
        case '04':
            $m="Abril";
            break;
        case '05':
            $m="Mayo";
            break;
        case '06':
            $m="Junio";
            break;
        case '07':
            $m="Julio";
            break;
        case '08':
            $m="Agosto";
            break;        
        case '09':
            $m="Septiembre";
            break;
        case '10':
            $m="Octubre";
            break;
        case '11':
            $m="Noviembre";
            break;
        case '12':
            $m="Diciembre";
            break;
    }
    
    return $dia . " de " . $m . " del " . $año;
    }
    
   echo $fecha_viernes = fechaletra($wdays[5]);
   echo $fecha_lunes = fechaletra($wdays[1]);
   echo $fecha_sabado = fechaletra($wdays[6]);












































                            $queryEmpleado = "SELECT * FROM tab_sueldo";
                            $rsEmpleado = mysqli_query($con, $queryEmpleado) or die(mysqli_error($con));
                            while ($Empleado = mysqli_fetch_array($rsEmpleado)) {

                                $queryAsistencia = "SELECT concat(e.apellido_pat_empleado, ' ', e.apellido_mat_empleado, ' ', e.nombre_empleado) AS nom_empleado, SUM(a.status = '1') AS T, SUM(a.status = '2') AS TT, SUM(a.status = 'R') AS R, SUM(a.status = 'RR') AS RR, SUM(a.status = 'F') AS F, SUM(a.status = 'M') AS M
                                        FROM tab_asistencia AS a
                                        JOIN tab_empleado AS e
                                        ON a.id_empleado = e.id_empleado
                                        WHERE a.id_empleado = '" . $Empleado['id_empleado'] . "' AND a.fecha BETWEEN '2021-01-31' AND '2021-02-06'
                                        GROUP BY nom_empleado";
                                $rsAsistencia = mysqli_query($con, $queryAsistencia) or die(mysqli_error($con));
                                $Asistencia = mysqli_fetch_array($rsAsistencia);

                                $queryBono = "SELECT bono
                                        FROM tab_bono 
                                        WHERE id_empleado = '". $Empleado['id_empleado'] ."'";
                                $rsBono = mysqli_query($con, $queryBono) or die(mysqli_error($con));
                                $Bono = mysqli_fetch_array($rsBono);

                                $queryCaja = "SELECT caja_ahorro
                                        FROM tab_caja 
                                        WHERE id_empleado = '". $Empleado['id_empleado'] ."'";
                                $rsCaja = mysqli_query($con, $queryCaja) or die(mysqli_error($con));
                                $Caja = mysqli_fetch_array($rsCaja);

                                $queryInfonavit = "SELECT descuento
                                        FROM tab_infonavit 
                                        WHERE id_empleado = '". $Empleado['id_empleado'] ."'";
                                $rsInfonavit = mysqli_query($con, $queryInfonavit) or die(mysqli_error($con));
                                $Infonavit = mysqli_fetch_array($rsInfonavit);

                                $queryPrestamo = "SELECT descuento_semana
                                        FROM tab_prestamo 
                                        WHERE id_empleado = '". $Empleado['id_empleado'] ."'";
                                $rsPrestamo = mysqli_query($con, $queryPrestamo) or die(mysqli_error($con));
                                $Prestamo = mysqli_fetch_array($rsPrestamo);

                                $CountFaltas = $Asistencia['F'];
                                $CountRetardos = $Asistencia['R'] + ($Asistencia['RR'] * 2);
                                $CountTExtra = $Asistencia['TT'] + ($Asistencia['M']* 0.5);
                                $CountAsistencias = $Asistencia['T'] + $Asistencia['TT'] + $Asistencia['R'] + $Asistencia['RR']+$Asistencia['M'];
                                $HorasExtra = $CountTExtra * $Empleado['sueldo_diario'];
                                $DescuentoRetardos = $CountRetardos * 20 ;
                                $DescuentoFaltas = $CountFaltas * $Empleado['sueldo_diario'];
                                $TotalDescuentos = $Caja['caja_ahorro']+$Prestamo['descuento_semana']+$Infonavit['descuento']+$DescuentoFaltas+$DescuentoRetardos;
                                $Neto = $Empleado['complemento']-$TotalDescuentos;
                                $TotalNeto = round($Neto+$HorasExtra+$Bono['bono']);
                                




                                echo "
                                            
                                                Empleado: " . $Empleado['id_empleado'] . "<br>
                                                Nombre: " . $Asistencia['nom_empleado'] . "<br>
                                                Sueldo Diario: $ " . $Empleado['sueldo_diario'] . "<br>
                                                Salario: $ " . $Empleado['salario'] . "<br>
                                                Fiscal(Deposito): $ " . $Empleado['fiscal'] . "<br>
                                                Complemento(Efectivo): $ " . $Empleado['complemento'] . "<br>
                                                
                                                Asistencias = " . $CountAsistencias . "<br>
                                                Retardos = " . $CountRetardos . "<br>
                                                Faltas = " . $CountFaltas . "<br>
                                                Tiempo Extra = " . $CountTExtra . "<br>
                                                
                                                Caja de Ahorro =$ " . $Caja['caja_ahorro'] . "<br>
                                                Bono =$ " . $Bono['bono'] . "<br>
                                                Prestamo =$ " . $Prestamo['descuento_semana'] . "<br>
                                                Infonavit =$ " . $Infonavit['descuento'] . "<br>
                                                Horas Extra =$ " .$HorasExtra . "<br>
                                                Descuento Faltas = $ " . $DescuentoFaltas . "<br>
                                                Descuento Retardos = $ " .$DescuentoRetardos . "<br>
                                                ----------- <br>
                                                Total Descuentos<br>
                                                (Caja, Prestamo, Infonavit, Faltas, Retardos) =$ " . $TotalDescuentos . "<br>
                                                Neto =$ " . $Empleado['complemento'] . " - $ " . $TotalDescuentos . " = $ " . $Neto . "<br>
                                                Total Neto (redondeado)<br>
                                                (Bono, Horas Extra) =$ " . $TotalNeto . " <br>
                                                <br><br>
                                        ";
                            } ?>
                        </div>

                        <!-- DataTales End -->

                    </div>
                </div>



            </div>

            <!-- footer -->
            <?php include("assets/common/foter.php"); ?>
            <!-- End of footer -->

        </div>
        <!-- /#page-content-wrapper -->



    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</body>

</html>