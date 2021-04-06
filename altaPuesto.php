<?php
include("assets/controler/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nomina MFA | Alta Puesto</title>
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
                            <center>Puesto del Empleados</center>
                        </h1>
                        <form class="form" id="cleanForm" action="assets/controler/puesto/altaPue.php" method="POST">

                            <!-- form Puesto -->
                            <fieldset class='border p-2'>
                                <legend class='w-auto'>Datos del Puesto:</legend>
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

                                    <!--Campo Puesto -->
                                    <div class="col-4">
                                        <label>Puesto:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-portrait"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Puesto" name="form_puesto" required>
                                        </div>
                                    </div>

                                    <!--Campo Nombre Supervisor -->
                                    <div class="col-5">
                                        <label>Nombre Supervisor:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user-friends"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Nombre Supervisor" name="form_nom_supervisor" required>
                                        </div>
                                    </div>

                                    <!--Campo Fecha Contrato -->
                                    <div class="col-6">
                                        <label>Fecha Contrato:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="date" class="form-control" placeholder="Fecha Contrato" name="form_fecha_contrato" required>
                                        </div>
                                    </div>

                                    <!--Campo Fecha Termino -->
                                    <div class="col-6">
                                        <label>Fecha Termino:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="date" class="form-control" placeholder="Fecha Termino" name="form_fecha_termino" required>
                                        </div>
                                    </div>

                                    <!--Campo Edificio/Agencia -->
                                    <div class="col-3">
                                        <label>Edificio/Agencia:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-city"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Edificio/Agencia" name="form_edificio_agencia" required>
                                        </div>
                                    </div>

                                    <!--Campo Turno -->
                                    <div class="col-3">
                                        <label>Turno:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-clock"></i>
                                                </span>
                                            </div>
                                            <select name="form_turno" class="custom-select" required>
                                                <option value="Completo">Completo</option>
                                                <option value="Medio Turno">Medio Turno</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!--Campo Status -->
                                    <div class="col-3">
                                        <label>Status:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user-tag"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Status" name="form_status" required>
                                        </div>
                                    </div>

                                    <!--Campo Nuevo Contrato -->
                                    <div class="col-3">
                                        <label>Nuevo Contrato:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="date" class="form-control" placeholder="Nuevo Contrato" name="form_nuevo_contrato" required>
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
                                        <button type="submit" class="btn btn-outline-pink btn-block"><i class="fas fa-user-plus"></i> Asignar Puesto</button>
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
                "Se registró el puesto",
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