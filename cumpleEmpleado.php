<?php
include("assets/controler/conexion.php"); ?>
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
            <div class="container-fluid">

                <div class="card border-left-pink shadow ">
                    <div class="card-body">
                        <h3>
                            <center>Cumpleaños <?php echo date('Y', strtotime("now")); ?></center>
                        </h3>

                        <?php include_once("assets/controler/cumple/precarga.php") ?>

                        <!-- 01 -->
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Enero:</legend>
                            <div class="row">
                                <?php while ($Ene_datos = mysqli_fetch_array($rsEne)) { ?>
                                    <!-- Tarjeta -->
                                    <div class="col-3">
                                        <div class="card border-left-pink shadow ">
                                            <div class="card-body" style="padding-right: 0.25rem !important; padding-left: 0.25rem !important; line-height: 1 !important;">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <img class='img-fluid mx-auto d-block' src='../Nomina/assets/img/Avatar/<?php echo $Ene_datos['sexo_empleado'];  ?>.png' style='height: auto; width: auto; z-index: 0; opacity: 1;' onContextMenu='return false;' draggable='false'>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6> <b><?php echo date("Y", strtotime("now")) - date('Y', strtotime($Ene_datos['fecha_nacimiento_empleado']));  ?> Años</b> </h6>
                                                        <a style="font-size: smaller;"><?php echo $Ene_datos['apellido_pat_empleado'] . " " . $Ene_datos['apellido_mat_empleado']; ?>
                                                            <br><?php echo $Ene_datos['nombre_empleado']; ?>
                                                            <br><?php echo date('d', strtotime($Ene_datos['fecha_nacimiento_empleado']));  ?> Enero
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php   } ?>
                            </div>
                        </fieldset>
                        <!-- 02 -->
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Febrero:</legend>
                            <div class="row">
                                <?php while ($Feb_datos = mysqli_fetch_array($rsFeb)) { ?>
                                    <!-- Tarjeta -->
                                    <div class="col-3">
                                        <div class="card border-left-pink shadow ">
                                            <div class="card-body" style="padding-right: 0.25rem !important; padding-left: 0.25rem !important; line-height: 1 !important;">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <img class='img-fluid mx-auto d-block' src='../Nomina/assets/img/Avatar/<?php echo $Feb_datos['sexo_empleado'];  ?>.png' style='height: auto; width: auto; z-index: 0; opacity: 1;' onContextMenu='return false;' draggable='false'>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6> <b><?php echo date("Y", strtotime("now")) - date('Y', strtotime($Feb_datos['fecha_nacimiento_empleado']));  ?> Años</b> </h6>
                                                        <a style="font-size: smaller;"><?php echo $Feb_datos['apellido_pat_empleado'] . " " . $Feb_datos['apellido_mat_empleado']; ?>
                                                            <br><?php echo $Feb_datos['nombre_empleado']; ?>
                                                            <br><?php echo date('d', strtotime($Feb_datos['fecha_nacimiento_empleado']));  ?> Febrero
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php   } ?>
                            </div>
                        </fieldset>
                        <!-- 03 -->
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Marzo:</legend>
                            <div class="row">
                                <?php while ($Mar_datos = mysqli_fetch_array($rsMar)) { ?>
                                    <!-- Tarjeta -->
                                    <div class="col-3">
                                        <div class="card border-left-pink shadow ">
                                            <div class="card-body" style="padding-right: 0.25rem !important; padding-left: 0.25rem !important; line-height: 1 !important;">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <img class='img-fluid mx-auto d-block' src='../Nomina/assets/img/Avatar/<?php echo $Mar_datos['sexo_empleado'];  ?>.png' style='height: auto; width: auto; z-index: 0; opacity: 1;' onContextMenu='return false;' draggable='false'>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6> <b><?php echo date("Y", strtotime("now")) - date('Y', strtotime($Mar_datos['fecha_nacimiento_empleado']));  ?> Años</b> </h6>
                                                        <a style="font-size: smaller;"><?php echo $Mar_datos['apellido_pat_empleado'] . " " . $Mar_datos['apellido_mat_empleado']; ?>
                                                            <br><?php echo $Mar_datos['nombre_empleado']; ?>
                                                            <br><?php echo date('d', strtotime($Mar_datos['fecha_nacimiento_empleado']));  ?> MArzo
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php   } ?>
                            </div>
                        </fieldset>
                        <!-- 04 -->
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Abril:</legend>
                            <div class="row">
                                <?php while ($Abr_datos = mysqli_fetch_array($rsAbr)) { ?>
                                    <!-- Tarjeta -->
                                    <div class="col-3">
                                        <div class="card border-left-pink shadow ">
                                            <div class="card-body" style="padding-right: 0.25rem !important; padding-left: 0.25rem !important; line-height: 1 !important;">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <img class='img-fluid mx-auto d-block' src='../Nomina/assets/img/Avatar/<?php echo $Abr_datos['sexo_empleado'];  ?>.png' style='height: auto; width: auto; z-index: 0; opacity: 1;' onContextMenu='return false;' draggable='false'>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6> <b><?php echo date("Y", strtotime("now")) - date('Y', strtotime($Abr_datos['fecha_nacimiento_empleado']));  ?> Años</b> </h6>
                                                        <a style="font-size: smaller;"><?php echo $Abr_datos['apellido_pat_empleado'] . " " . $Abr_datos['apellido_mat_empleado']; ?>
                                                            <br><?php echo $Abr_datos['nombre_empleado']; ?>
                                                            <br><?php echo date('d', strtotime($Abr_datos['fecha_nacimiento_empleado']));  ?> Abril
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php   } ?>
                            </div>
                        </fieldset>
                        <!-- 05 -->
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Mayo:</legend>
                            <div class="row">
                                <?php while ($May_datos = mysqli_fetch_array($rsMay)) { ?>
                                    <!-- Tarjeta -->
                                    <div class="col-3">
                                        <div class="card border-left-pink shadow ">
                                            <div class="card-body" style="padding-right: 0.25rem !important; padding-left: 0.25rem !important; line-height: 1 !important;">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <img class='img-fluid mx-auto d-block' src='../Nomina/assets/img/Avatar/<?php echo $May_datos['sexo_empleado'];  ?>.png' style='height: auto; width: auto; z-index: 0; opacity: 1;' onContextMenu='return false;' draggable='false'>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6> <b><?php echo date("Y", strtotime("now")) - date('Y', strtotime($May_datos['fecha_nacimiento_empleado']));  ?> Años</b> </h6>
                                                        <a style="font-size: smaller;"><?php echo $May_datos['apellido_pat_empleado'] . " " . $May_datos['apellido_mat_empleado']; ?>
                                                            <br><?php echo $May_datos['nombre_empleado']; ?>
                                                            <br><?php echo date('d', strtotime($May_datos['fecha_nacimiento_empleado']));  ?> Mayo
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php   } ?>
                            </div>
                        </fieldset>
                        <!-- 06 -->
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Junio:</legend>
                            <div class="row">
                                <?php while ($Jun_datos = mysqli_fetch_array($rsJun)) { ?>
                                    <!-- Tarjeta -->
                                    <div class="col-3">
                                        <div class="card border-left-pink shadow ">
                                            <div class="card-body" style="padding-right: 0.25rem !important; padding-left: 0.25rem !important; line-height: 1 !important;">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <img class='img-fluid mx-auto d-block' src='../Nomina/assets/img/Avatar/<?php echo $Jun_datos['sexo_empleado'];  ?>.png' style='height: auto; width: auto; z-index: 0; opacity: 1;' onContextMenu='return false;' draggable='false'>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6> <b><?php echo date("Y", strtotime("now")) - date('Y', strtotime($Jun_datos['fecha_nacimiento_empleado']));  ?> Años</b> </h6>
                                                        <a style="font-size: smaller;"><?php echo $Jun_datos['apellido_pat_empleado'] . " " . $Jun_datos['apellido_mat_empleado']; ?>
                                                            <br><?php echo $Jun_datos['nombre_empleado']; ?>
                                                            <br><?php echo date('d', strtotime($Jun_datos['fecha_nacimiento_empleado']));  ?> Junio
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php   } ?>
                            </div>
                        </fieldset>
                        <!-- 07 -->
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Julio:</legend>
                            <div class="row">
                                <?php while ($Jul_datos = mysqli_fetch_array($rsJul)) { ?>
                                    <!-- Tarjeta -->
                                    <div class="col-3">
                                        <div class="card border-left-pink shadow ">
                                            <div class="card-body" style="padding-right: 0.25rem !important; padding-left: 0.25rem !important; line-height: 1 !important;">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <img class='img-fluid mx-auto d-block' src='../Nomina/assets/img/Avatar/<?php echo $Jul_datos['sexo_empleado'];  ?>.png' style='height: auto; width: auto; z-index: 0; opacity: 1;' onContextMenu='return false;' draggable='false'>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6> <b><?php echo date("Y", strtotime("now")) - date('Y', strtotime($Jul_datos['fecha_nacimiento_empleado']));  ?> Años</b> </h6>
                                                        <a style="font-size: smaller;"><?php echo $Jul_datos['apellido_pat_empleado'] . " " . $Jul_datos['apellido_mat_empleado']; ?>
                                                            <br><?php echo $Jul_datos['nombre_empleado']; ?>
                                                            <br><?php echo date('d', strtotime($Jul_datos['fecha_nacimiento_empleado']));  ?> Julio
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php   } ?>
                            </div>
                        </fieldset>
                        <!-- 08 -->
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Agosto:</legend>
                            <div class="row">
                                <?php while ($Ago_datos = mysqli_fetch_array($rsAgo)) { ?>
                                    <!-- Tarjeta -->
                                    <div class="col-3">
                                        <div class="card border-left-pink shadow ">
                                            <div class="card-body" style="padding-right: 0.25rem !important; padding-left: 0.25rem !important; line-height: 1 !important;">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <img class='img-fluid mx-auto d-block' src='../Nomina/assets/img/Avatar/<?php echo $Ago_datos['sexo_empleado'];  ?>.png' style='height: auto; width: auto; z-index: 0; opacity: 1;' onContextMenu='return false;' draggable='false'>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6> <b><?php echo date("Y", strtotime("now")) - date('Y', strtotime($Ago_datos['fecha_nacimiento_empleado']));  ?> Años</b> </h6>
                                                        <a style="font-size: smaller;"><?php echo $Ago_datos['apellido_pat_empleado'] . " " . $Ago_datos['apellido_mat_empleado']; ?>
                                                            <br><?php echo $Ago_datos['nombre_empleado']; ?>
                                                            <br><?php echo date('d', strtotime($Ago_datos['fecha_nacimiento_empleado']));  ?> Agosto
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php   } ?>
                            </div>
                        </fieldset>
                        <!-- 09 -->
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Septiembre:</legend>
                            <div class="row">
                                <?php while ($Sep_datos = mysqli_fetch_array($rsSep)) { ?>
                                    <!-- Tarjeta -->
                                    <div class="col-3">
                                        <div class="card border-left-pink shadow ">
                                            <div class="card-body" style="padding-right: 0.25rem !important; padding-left: 0.25rem !important; line-height: 1 !important;">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <img class='img-fluid mx-auto d-block' src='../Nomina/assets/img/Avatar/<?php echo $Sep_datos['sexo_empleado'];  ?>.png' style='height: auto; width: auto; z-index: 0; opacity: 1;' onContextMenu='return false;' draggable='false'>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6> <b><?php echo date("Y", strtotime("now")) - date('Y', strtotime($Sep_datos['fecha_nacimiento_empleado']));  ?> Años</b> </h6>
                                                        <a style="font-size: smaller;"><?php echo $Sep_datos['apellido_pat_empleado'] . " " . $Sep_datos['apellido_mat_empleado']; ?>
                                                            <br><?php echo $Sep_datos['nombre_empleado']; ?>
                                                            <br><?php echo date('d', strtotime($Sep_datos['fecha_nacimiento_empleado']));  ?> Septiembre
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php   } ?>
                            </div>
                        </fieldset>
                        <!-- 10 -->
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Octubre:</legend>
                            <div class="row">
                                <?php while ($Oct_datos = mysqli_fetch_array($rsOct)) { ?>
                                    <!-- Tarjeta -->
                                    <div class="col-3">
                                        <div class="card border-left-pink shadow ">
                                            <div class="card-body" style="padding-right: 0.25rem !important; padding-left: 0.25rem !important; line-height: 1 !important;">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <img class='img-fluid mx-auto d-block' src='../Nomina/assets/img/Avatar/<?php echo $Oct_datos['sexo_empleado'];  ?>.png' style='height: auto; width: auto; z-index: 0; opacity: 1;' onContextMenu='return false;' draggable='false'>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6> <b><?php echo date("Y", strtotime("now")) - date('Y', strtotime($Oct_datos['fecha_nacimiento_empleado']));  ?> Años</b> </h6>
                                                        <a style="font-size: smaller;"><?php echo $Oct_datos['apellido_pat_empleado'] . " " . $Oct_datos['apellido_mat_empleado']; ?>
                                                            <br><?php echo $Oct_datos['nombre_empleado']; ?>
                                                            <br><?php echo date('d', strtotime($Oct_datos['fecha_nacimiento_empleado']));  ?> Octubre
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php   } ?>
                            </div>
                        </fieldset>
                        <!-- 11 -->
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Noviembre:</legend>
                            <div class="row">
                                <?php while ($Nov_datos = mysqli_fetch_array($rsNov)) { ?>
                                    <!-- Tarjeta -->
                                    <div class="col-3">
                                        <div class="card border-left-pink shadow ">
                                            <div class="card-body" style="padding-right: 0.25rem !important; padding-left: 0.25rem !important; line-height: 1 !important;">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <img class='img-fluid mx-auto d-block' src='../Nomina/assets/img/Avatar/<?php echo $Nov_datos['sexo_empleado'];  ?>.png' style='height: auto; width: auto; z-index: 0; opacity: 1;' onContextMenu='return false;' draggable='false'>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6> <b><?php echo date("Y", strtotime("now")) - date('Y', strtotime($Nov_datos['fecha_nacimiento_empleado']));  ?> Años</b> </h6>
                                                        <a style="font-size: smaller;"><?php echo $Nov_datos['apellido_pat_empleado'] . " " . $Nov_datos['apellido_mat_empleado']; ?>
                                                            <br><?php echo $Nov_datos['nombre_empleado']; ?>
                                                            <br><?php echo date('d', strtotime($Nov_datos['fecha_nacimiento_empleado']));  ?> Noviembre
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php   } ?>
                            </div>
                        </fieldset>
                        <!-- 12 -->
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Diciembre:</legend>
                            <div class="row">
                                <?php while ($Dic_datos = mysqli_fetch_array($rsDic)) { ?>
                                    <!-- Tarjeta -->
                                    <div class="col-3">
                                        <div class="card border-left-pink shadow ">
                                            <div class="card-body" style="padding-right: 0.25rem !important; padding-left: 0.25rem !important; line-height: 1 !important;">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <img class='img-fluid mx-auto d-block' src='../Nomina/assets/img/Avatar/<?php echo $Nov_datos['sexo_empleado'];  ?>.png' style='height: auto; width: auto; z-index: 0; opacity: 1;' onContextMenu='return false;' draggable='false'>
                                                    </div>
                                                    <div class="col-8">
                                                        <h6> <b><?php echo date("Y", strtotime("now")) - date('Y', strtotime($Nov_datos['fecha_nacimiento_empleado']));  ?> Años</b> </h6>
                                                        <a style="font-size: smaller;"><?php echo $Nov_datos['apellido_pat_empleado'] . " " . $Nov_datos['apellido_mat_empleado']; ?>
                                                            <br><?php echo $Nov_datos['nombre_empleado']; ?>
                                                            <br><?php echo date('d', strtotime($Nov_datos['fecha_nacimiento_empleado']));  ?> Diciembre
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php   } ?>
                            </div>
                        </fieldset>

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