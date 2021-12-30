<?php
include("assets/controler/conexion.php"); 
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nómina  | Asistencias</title>
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
            <div class="container-fluid">


                <div class="card border-left-pink shadow-lg mb-5 mt-5 ">
                    <div class="card-body">
                        <h2>
                            <center>Tabla de asistencias</center>
                        </h2>
                        <select name="fromRefId" class="mi-selector custom-select" required>
                            <option value="" selected disabled>Seleccione fecha</option>
                            <?php
                            $queryFecha = "SELECT DISTINCT fecha FROM tab_semanal;";
                            $rsFecha = mysqli_query($con, $queryFecha) or die("Error de consulta");
                            while ($Fecha = mysqli_fetch_array($rsFecha)) {
                                echo "<option value='" . $Fecha['fecha'] . "'>" . $Fecha['fecha'] . "</option>";
                            }
                            ?>
                        </select>

                        <?php

                        $fecha_sem = '2021-02-12';

                        $queryEmpleado = "SELECT DISTINCT id_empleado, nom_empleado FROM tab_asistencia;";
                        $rsEmpleado = mysqli_query($con, $queryEmpleado) or die("Error de consulta");
                        while ($Empleado = mysqli_fetch_array($rsEmpleado)) {
                            $querySemana = "SELECT * FROM tab_semanal WHERE id_empleado = '" . $Empleado['id_empleado'] . "' AND fecha = '" . $fecha_sem . "';";
                            $rsSemana = mysqli_query($con, $querySemana) or die("Error de consulta");
                            $Semana = mysqli_fetch_array($rsSemana);

                            echo  $Empleado['id_empleado'] . " - " . $Empleado['nom_empleado'];
                            echo $Semana['fecha'];
                            echo $Semana['lun'];
                            echo $Semana['mar'];
                            echo $Semana['mie'];
                            echo $Semana['jue'];
                            echo $Semana['vie'];
                            echo $Semana['sab'];
                            echo $Semana['dom'];

                            echo "<br>";
                        }




                        ?>

                        <table class="table table-hover" id="dataTableEmpleado" style="font-size: smaller;">
                            <thead>
                                <tr>
                                    <th>Empleado</th>
                                    <th>Semana L - S</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sem_actual = date('Y-m-d');
                                $date_obj = new DateTime($sem_actual); // Crear un objeto de fecha
                                $num_day = $date_obj->format('w'); // 0-dom, 1-lun, ... 6-sab
                                $date_obj->modify("-$num_day day"); // Posicionar el objeto en domingo
                                $wdays = array();
                                for ($i = 0; $i < 7; $i++) {
                                    $wdays[] = $date_obj->format('Y-m-d');
                                    $date_obj->modify('+1 day'); // Incrementar el objeto 1 dia
                                }

                                print_r($wdays);

                                $queryEmpleado = "SELECT DISTINCT id_empleado, nom_empleado FROM tab_asistencia;";
                                $rsEmpleado = mysqli_query($con, $queryEmpleado) or die("Error de consulta");
                                while ($Empleado = mysqli_fetch_array($rsEmpleado)) {
                                    $querySemana = "SELECT * FROM tab_semanal WHERE id_empleado = '" . $Empleado['id_empleado'] . "' AND fecha = '" . $wdays[5] . "';";
                                    $rsSemana = mysqli_query($con, $querySemana) or die("Error de consulta");
                                    $Semana = mysqli_fetch_array($rsSemana);

                                    echo "
                                <tr>
                                    <td>" . $Empleado['id_empleado'] . " - " . $Empleado['nom_empleado'] . "</td>
                                    <td>
                                        <label>" . $Semana['fecha'] . "</label>
                                        <div class='input-group mb-2 input-group-sm'>
                                            <div class='input-group-prepend'>
                                                <span class='input-group-text'><i class='fas fa-calendar-alt'></i></span>
                                            </div>
                                            <input type='text' class='form-control' value='" . $Semana['lun'] . "'>
                                            <input type='text' class='form-control' value='" . $Semana['mar'] . "'>
                                            <input type='text' class='form-control' value='" . $Semana['mie'] . "'>
                                            <input type='text' class='form-control' value='" . $Semana['jue'] . "'>
                                            <input type='text' class='form-control' value='" . $Semana['vie'] . "'>
                                            <input type='text' class='form-control' value='" . $Semana['sab'] . "'>
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