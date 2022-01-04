<?php session_start();
if (isset($_SESSION['code_user']) && !$_SESSION['code_user']==0 ) {
    # code...
}else {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Nomina/Index'");
}


include("assets/controler/conexion.php");
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nómina | Inicio</title>
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


                <div class="card border-left-pink shadow-lg mb-5 mt-5 ">
                    <div class="card-body">
                        <h2>
                            <center>Avisos</center>
                        </h2>

                        <div class="row">
                            <div class="col-6">
                                <fieldset class='border p-2'>
                                    <legend class='w-auto'><?php echo $hoy = date('Y-m-d');
                                                            echo $f_month = date('m');
                                                            echo $f_day = date('d') ?></legend>
                                    <!-- Anuncios Hoy -->

                                    <?php
                                    //Cumpleaños
                                    $queryCumpleHoy = "SELECT CONCAT(apellido_pat_empleado, ' ', apellido_mat_empleado, ' ', nombre_empleado) AS nom_empleado, Date_format(fecha_nacimiento_empleado,'%d') AS Dia, Date_format(fecha_nacimiento_empleado,'%m') AS Mes FROM tab_empleado
                                    WHERE Date_format(fecha_nacimiento_empleado,'%d') = $f_day AND Date_format(fecha_nacimiento_empleado,'%m') = $f_month;";
                                    $rsCumpleHoy = mysqli_query($con, $queryCumpleHoy) or die(mysqli_error($con));
                                    $CumpleHoy = mysqli_fetch_array($rsCumpleHoy);

                                    if (empty($CumpleHoy['nombre'])) {
                                        echo '
                                            <div class="alert alert-success alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <strong>No hay cumpleaños que celebrar hoy.</strong>
                                            </div>
                                        ';
                                    } else {
                                        while ($CumpleHoy = mysqli_fetch_array($rsCumpleHoy)) {
                                            echo '
                                                <div class="alert alert-primary alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <strong>' . $CumpleHoy['nom_empleado'] . '</strong><br>Cumple años el dia de hoy!
                                                </div>
                                                ';
                                        }
                                    }



                                    ?>


                                    <div class="alert alert-info alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Aviso</strong><br>No tienes contratos vencidos.
                                    </div>


                                </fieldset>
                            </div>
                            <div class="col-6">
                                <fieldset class='border p-2'>
                                    <legend class='w-auto'><?php echo $manana = date('Y-m-d', strtotime("+ 1 days")); ?></legend>

                                    <!-- Anuncios Mañana -->
                                    <?php
                                    //Cumpleaños
                                    $queryCumpleHoy = "SELECT CONCAT(apellido_pat_empleado, ' ', apellido_mat_empleado, ' ', nombre_empleado) AS nombre, fecha_nacimiento_empleado FROM tab_empleado WHERE fecha_nacimiento_empleado = NOW() + INTERVAL 1 DAY;";
                                    $rsCumpleHoy = mysqli_query($con, $queryCumpleHoy) or die(mysqli_error($con));
                                    $CumpleHoy = mysqli_fetch_array($rsCumpleHoy);

                                    if (empty($CumpleHoy['nombre'])) {
                                        echo '
                                            <div class="alert alert-success alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <strong>No hay cumpleaños que celebrar.</strong>
                                            </div>
                                        ';
                                    } else {
                                        while ($CumpleHoy = mysqli_fetch_array($rsCumpleHoy)) {
                                            echo '
                                                <div class="alert alert-primary alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <strong>' . $CumpleHoy['nom_empleado'] . '</strong><br>Cumple años mañana!
                                                </div>
                                                ';
                                        }
                                    }

                                    ?>

<div class="alert alert-info alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Aviso</strong><br>No tienes contratos por vencer.
                                    </div>
                                </fieldset>

                            </div>
                        </div>

                    </div>
                </div>



            </div>

        </div>
        <!-- /#page-content-wrapper -->


    </div>
    <!-- /#wrapper -->


    <!-- footer -->
    <?php include("assets/common/foter.php"); ?>
    <!-- End of footer -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</body>

</html>