<?php
include("assets/controler/conexion.php");
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nomina MFA | Asistencias</title>
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
                        <h2>
                            <center>Tabla de asistencias</center>
                        </h2>
                        <table class="table table-hover table-striped" id="dataTableEmpleado" style="font-size: smaller;">
                            <thead>
                                <tr>
                                    <th>Empleado</th>
                                    <th>Lun</th>
                                    <th>Mar</th>
                                    <th>Mie</th>
                                    <th>Jue</th>
                                    <th>Vie</th>
                                    <th>Sab</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
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

                                echo "<center><h4>Semana del " . $wdays[1] . " al " . $wdays[6] . "</h4></center>";
                                echo "<center><h6>1 = Asistencia 2 = Doble Turno R= Retardo RR= Doble Retardo F=Falta M=Medio Turno</h6></center>";

                                $queryEmpleado = "SELECT DISTINCT id_empleado, nom_empleado FROM tab_asistencia;";
                                $rsEmpleado = mysqli_query($con, $queryEmpleado) or die("Error de consulta");
                                while ($Empleado = mysqli_fetch_array($rsEmpleado)) {

                                    $queryLun = "SELECT status AS Lun, fecha FROM tab_asistencia WHERE id_empleado = '" . $Empleado['id_empleado'] . "' AND fecha = '" . $wdays[1] . "';";
                                    $rsLun = mysqli_query($con, $queryLun) or die("Error de consulta");
                                    $Lun = mysqli_fetch_array($rsLun);

                                    $queryMar = "SELECT status AS Mar, fecha FROM tab_asistencia WHERE id_empleado = '" . $Empleado['id_empleado'] . "' AND fecha = '" . $wdays[2] . "';";
                                    $rsMar = mysqli_query($con, $queryMar) or die("Error de consulta");
                                    $Mar = mysqli_fetch_array($rsMar);

                                    $queryMie = "SELECT status AS Mie, fecha FROM tab_asistencia WHERE id_empleado = '" . $Empleado['id_empleado'] . "' AND fecha = '" . $wdays[3] . "';";
                                    $rsMie = mysqli_query($con, $queryMie) or die("Error de consulta");
                                    $Mie = mysqli_fetch_array($rsMie);

                                    $queryJue = "SELECT status AS Jue, fecha FROM tab_asistencia WHERE id_empleado = '" . $Empleado['id_empleado'] . "' AND fecha = '" . $wdays[4] . "';";
                                    $rsJue = mysqli_query($con, $queryJue) or die("Error de consulta");
                                    $Jue = mysqli_fetch_array($rsJue);

                                    $queryVie = "SELECT status AS Vie, fecha FROM tab_asistencia WHERE id_empleado = '" . $Empleado['id_empleado'] . "' AND fecha = '" . $wdays[5] . "';";
                                    $rsVie = mysqli_query($con, $queryVie) or die("Error de consulta");
                                    $Vie = mysqli_fetch_array($rsVie);

                                    $querySab = "SELECT status AS Sab, fecha FROM tab_asistencia WHERE id_empleado = '" . $Empleado['id_empleado'] . "' AND fecha = '" . $wdays[6] . "';";
                                    $rsSab = mysqli_query($con, $querySab) or die("Error de consulta");
                                    $Sab = mysqli_fetch_array($rsSab);

                                    echo "
                                <tr>
                                    <td>" . $Empleado['id_empleado'] . " - " . $Empleado['nom_empleado'] . "</td>
                                    <td>
                                        <div class='form-group'>
                                            <label>" . $Lun['fecha'] . "</label>
                                            <input type='hidden' name='' id='' value='" . $Lun['fecha'] . "'>
                                            <input type='text' class='form-control form-control-sm' name='' id='' value='" . $Lun['Lun'] . "'>
                                        </div>
                                    </td>
                                    <td>
                                        <div class='form-group'>
                                            <label>" . $Mar['fecha'] . "</label>
                                            <input type='hidden' name='' id='' value='" . $Mar['fecha'] . "'>
                                            <input type='text' class='form-control form-control-sm' name='' id='' value='" . $Mar['Mar'] . "'>
                                        </div>
                                    </td>
                                    <td>
                                        <div class='form-group'>
                                            <label>" . $Mie['fecha'] . "</label>
                                            <input type='hidden' name='' id='' value='" . $Mie['fecha'] . "'>
                                            <input type='text' class='form-control form-control-sm' name='' id='' value='" . $Mie['Mie'] . "'>
                                        </div>
                                    </td>
                                    <td>
                                        <div class='form-group'>
                                            <label>" . $Jue['fecha'] . "</label>
                                            <input type='hidden' name='' id='' value='" . $Jue['fecha'] . "'>
                                            <input type='text' class='form-control form-control-sm' name='' id='' value='" . $Jue['Jue'] . "'>
                                        </div>
                                    </td>
                                    <td>
                                        <div class='form-group'>
                                            <label>" . $Vie['fecha'] . "</label>
                                            <input type='hidden' name='' id='' value='" . $Vie['fecha'] . "'>
                                            <input type='text' class='form-control form-control-sm' name='' id='' value='" . $Vie['Vie'] . "'>
                                        </div>
                                    </td>
                                    <td>
                                        <div class='form-group'>
                                            <label>" . $Sab['fecha'] . "</label>
                                            <input type='hidden' name='' id='' value='" . $Sab['fecha'] . "'>
                                            <input type='text' class='form-control form-control-sm' name='' id='' value='" . $Sab['Sab'] . "'>
                                        </div>
                                    </td>
                                    <td>
                                        <div class='form-group'>
                                            <label>Guardar</label>
                                            <button class='btn btn-pink btn-block btn-sm' type='submit'><i class='fas fa-save'></i></button>
                                        </div>
                                    </td>
                                </tr>
                                ";
                                }

                                ?>
                            </tbody>
                        </table>

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