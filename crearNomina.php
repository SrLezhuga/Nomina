<?php
include("assets/controler/conexion.php");
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nómina | Crear Nomina</title>
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
                        <h1>
                            <center>Macronomina</center>
                        </h1>
                        <fieldset class="border p-2">
                            <legend class="w-auto"><a><strong>Datos de la nómina:</strong></a></legend>

                            <form class="form" id="cleanForm" action="assets/controler/reportes/macronomina.php" method="POST" target="_blank">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Fecha:</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="date" class="form-control" name="form_fecha" id="form_fecha" placeholder="Fecha de remision" value="<?php echo date('Y-m-d', strtotime("now")); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label>Accion:</label>
                                        <div class="input-group ">
                                            <button type="submit" class="btn btn-sm btn-outline-danger btn-block" id="btn_crear_nomina"><i class="fas fa-file-pdf"></i> Crear Macronómina</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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