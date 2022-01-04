<?php
include("assets/controler/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nómina  | Alta seguro</title>
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
                        <h1>
                            <center>Unidad Medica Familiar</center>
                        </h1>
                        <form class="form" id="cleanForm" action="assets/controler/seguro/altaSeguro.php" method="POST"> 

                            <!-- form Puesto -->
                            <fieldset class='border p-2'>
                                <legend class='w-auto'>Datos de la UMF:</legend>
                                <div class="row">

                                    <!--Campo Numero de Puesto -->
                                    <div class="col-3">
                                        <label>Numero de Empleado:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-hashtag"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Numero de Empleado" name="form_numero_empleado" required>
                                        </div>
                                    </div>

                                    <!--Campo Unidad Medica Familiar -->
                                    <div class="col-4">
                                        <label>Unidad Medica Familiar:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-hospital-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Unidad Medica Familiar" name="form_umf" required>
                                        </div>
                                    </div>

                                    <!--Campo Número de Seguro -->
                                    <div class="col-5">
                                        <label>Número de Seguro:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-list-ol"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Número de Seguro" name="form_sueldo" required>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class='border p-2'>
                                <legend class='w-auto'>Acciones:</legend>

                                <div class="row">
                                    <div class="col-6">
                                        <button type="button" onClick=clean() class="btn btn-outline-secondary btn-block"><i class="fas fa-eraser"></i> Borrar</button>
                                    </div>
                                    <br>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-outline-pink btn-block"><i class="fas fa-user-plus"></i> Asignar UMF</button>
                                    </div>
                                </div>

                                <!--/. form-->
                            </fieldset>
                        </form>

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

    <!-- Alerts! -->
    <?php if (isset($_GET['alert']) && $_GET['alert'] == 0) { ?>
        <script>
            Swal.fire(
                "Mensaje de confirmación",
                "Se registró el seguro",
                "success"
            );
        </script>
    <?php } ?>
    <script>
        //Limpiar formularios
        function clean() {
            document.getElementById("cleanForm").reset();
            Swal.fire(
                "Mensaje de confirmación",
                "Formulario vacío",
                "success"
            );
        }
    </script>

</body>

</html>