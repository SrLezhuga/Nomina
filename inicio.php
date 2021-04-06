<?php
include("assets/controler/conexion.php");
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nomina MFA | Inicio</title>
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
                            <center>Avisos</center>
                        </h2>

                        <div class="row">
                            <div class="col-6">
                                <fieldset class='border p-2'>
                                    <legend class='w-auto'><?php echo $hoy = date('Y-m-d'); ?></legend>
                                    <?php

                                    $queryRenovacion = "SELECT concat(apellido_pat_empleado, ' ', apellido_mat_empleado, ' ', nombre_empleado) AS nom_empleado FROM tab_empleado AS e
                                    JOIN tab_puesto AS p
                                    ON e.id_empleado = p.id_empleado
                                    WHERE nuevo_contrato = '" . $hoy . "'";
                                    $rsRenovacion = mysqli_query($con, $queryRenovacion) or die("Error de consulta");
                                    $Renovacion = mysqli_fetch_array($rsRenovacion);

                                    while ($Renovacion = mysqli_fetch_array($rsRenovacion)) {
                                        echo '
                                            <div class="alert alert-primary alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <strong>' . $Renovacion['nom_empleado'] . '</strong><br>Necesita renovar contrato!
                                            </div>
                                            ';
                                    }

                                    ?>
                                </fieldset>
                            </div>
                            <div class="col-6">
                                <fieldset class='border p-2'>
                                    <legend class='w-auto'><?php echo $manana = date('Y-m-d', strtotime("+ 1 days")); ?></legend>
                                    <?php
                                    $queryRenovacion = "SELECT concat(apellido_pat_empleado, ' ', apellido_mat_empleado, ' ', nombre_empleado) AS nom_empleado FROM tab_empleado AS e
                                    JOIN tab_puesto AS p
                                    ON e.id_empleado = p.id_empleado
                                    WHERE nuevo_contrato = '" . $manana . "'";
                                    $rsRenovacion = mysqli_query($con, $queryRenovacion) or die("Error de consulta");
                                    while ($Renovacion = mysqli_fetch_array($rsRenovacion)) {
                                        echo '
                                        <div class="alert alert-primary alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>' . $Renovacion['nom_empleado'] . '</strong><br>Vencerá su contrato!
                                        </div>
                                        ';
                                    }
                                    ?>
                                </fieldset>

                            </div>
                        </div>

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