<?php
include("assets/controler/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nomina MFA | Alta Empleado</title>
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
                            <center>Alta de empleados</center>
                        </h1>
                        <form class="form" id="cleanForm" action="assets/controler/empleado/altaEmp.php" method="POST">

                            <!-- form empleado -->
                            <fieldset class='border p-2'>
                                <legend class='w-auto'>Datos del Empleado:</legend>
                                <div class="row">

                                    <!--Campo Numero de Empleado -->
                                    <div class="col-4">
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

                                    <!--Campo apellido paterno -->
                                    <div class="col-4">
                                        <label>Apellido paterno:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Apellido Paterno" name="form_apellido_paterno" required>
                                        </div>
                                    </div>

                                    <!--Campo apellido materno -->
                                    <div class="col-4">
                                        <label>Apellido materno:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Apellido materno" name="form_apellido_materno" required>
                                        </div>
                                    </div>

                                    <!--Campo Nombres -->
                                    <div class="col-6">
                                        <label>Nombres:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-user-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Nombres" name="form_nombres" required>
                                        </div>
                                    </div>

                                    <!--Campo Domicilio -->
                                    <div class="col-6">
                                        <label>Domicilio:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-address-book"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Domicilio" name="form_domicilio" required>
                                        </div>
                                    </div>

                                    <!--Campo Colonia -->
                                    <div class="col-3">
                                        <label>Colonia:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-address-book"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Colonia" name="form_colonia" required>
                                        </div>
                                    </div>

                                    <!--Campo Codigo postal -->
                                    <div class="col-3">
                                        <label>Codigo postal:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Codigo postal" name="form_codigo_postal" required>
                                        </div>
                                    </div>

                                    <!--Campo Ciudad -->
                                    <div class="col-3">
                                        <label>Ciudad:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ciudad" name="form_ciudad" required>
                                        </div>
                                    </div>

                                    <!--Campo Estado -->
                                    <div class="col-3">
                                        <label>Estado:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Estado" name="form_estado" required>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class='border p-2'>
                                <legend class='w-auto'>Id Nacionales:</legend>
                                <div class="row">


                                    <!--Campo NSS -->
                                    <div class="col-4">
                                        <label>NSS:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-id-card-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="NSS" name="form_NSS" required>
                                        </div>
                                    </div>

                                    <!--Campo RFC -->
                                    <div class="col-4">
                                        <label>RFC:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-id-card-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="RFC" name="form_RFC" required>
                                        </div>
                                    </div>

                                    <!--Campo CURP -->
                                    <div class="col-4">
                                        <label>CURP:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-id-card-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="CURP" name="form_CURP" required>
                                        </div>
                                    </div>
                                </div>

                            </fieldset>
                            <fieldset class='border p-2'>
                                <legend class='w-auto'>Datos de Nacimiento:</legend>
                                <div class="row">

                                    <!--Campo sexo -->
                                    <div class="col-4">
                                        <label>Sexo:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-restroom"></i>
                                                </span>
                                            </div>
                                            <select name="form_sexo" class="custom-select" required>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!--Campo fecha nacimiento -->
                                    <div class="col-4">
                                        <label>Fecha nacimiento:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="date" class="form-control" placeholder="fecha nacimiento" name="form_fecha_nacimiento" required>
                                        </div>
                                    </div>

                                    <!--Campo pais nacimiento -->
                                    <div class="col-4">
                                        <label>Pais nacimiento:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-map"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Pais nacimiento" name="form_pais_nacimiento" required>
                                        </div>
                                    </div>

                                    <!--Campo estado nacimiento -->
                                    <div class="col-4">
                                        <label>Estado nacimiento:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-map"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Estado nacimiento" name="form_estado_nacimiento" required>
                                        </div>
                                    </div>

                                    <!--Campo ciudad nacimiento -->
                                    <div class="col-4">
                                        <label>Ciudad nacimiento:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-map"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Ciudad nacimiento" name="form_ciudad_nacimiento" required>
                                        </div>
                                    </div>

                                    <!--Campo Estado civil -->
                                    <div class="col-4">
                                        <label>Estado civil:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-house-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Estado civil" name="form_estado_civil" required>
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
                                        <button type="submit" class="btn btn-outline-pink btn-block"><i class="fas fa-user-plus"></i> Dar de alta</button>
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
                "Se registró el empleado",
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