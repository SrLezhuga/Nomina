<?php
include("assets/controler/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nómina | Incapacidad</title>
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
                            <center>Incapacidades</center>
                        </h1>
                        <!-- form Puesto -->
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Empleado:</legend>
                            <div class="row">
                                <!--Campo Empleado -->
                                <div class="col-8">
                                    <label>Empleado:</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </span>
                                        </div>

                                        <select name="FromEmpleado" id="FromEmpleado" class="mi-selector custom-select">
                                            <option value="0" selected disabled>Seleccione datos del empleado</option>
                                            <?php $listEmp = "SELECT id_empleado, concat(apellido_pat_empleado, ' ', apellido_mat_empleado, ' ', nombre_empleado) as nombre, status_empleado FROM nomina.tab_empleado WHERE status_empleado = 'ACTIVO' ORDER BY apellido_pat_empleado ASC";
                                            $rsEmp = mysqli_query($con, $listEmp) or die("Error de consulta");
                                            while ($itemEmp = mysqli_fetch_array($rsEmp)) {
                                                echo "<option value='" . $itemEmp['id_empleado'] . "'>" . $itemEmp['id_empleado'] . " | " . $itemEmp['nombre'] .  "</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label>Consultar:</label>
                                    <div class="input-group ">
                                        <button type="button" class="btn btn-sm btn-outline-secondary btn-block" onclick="upLista()"><i class="fas fa-database"></i> Cargar Datos</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Datos de la incapacidad:</legend>

                            <div class="table-responsive">
                                <table class="table table-hover table-sm" id="dataTablePuesto" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Puesto</th>
                                            <th>Supervisor</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Turno</th>
                                            <th>Status </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $queryEmpleado = "SELECT id_empleado, puesto, nombre_supervisor, fecha_contrato, fecha_fin_contrato, turno, status FROM tab_puesto";
                                        $rsEmpleado = mysqli_query($con, $queryEmpleado) or die("Error de consulta");
                                        while ($Empleado = mysqli_fetch_array($rsEmpleado)) {
                                            $queryNombre = "SELECT concat(apellido_pat_empleado, ' ', apellido_mat_empleado, ' ', nombre_empleado) AS nom_empleado FROM tab_empleado WHERE id_empleado = '" . $Empleado['id_empleado'] . "'";
                                            $rsNombre = mysqli_query($con, $queryNombre) or die("Error de consulta");
                                            $Nombre = mysqli_fetch_array($rsNombre);

                                            echo "
                                            <tr>
                                                <td>" . $Empleado['id_empleado'] . "</td>
                                                <td>" . $Nombre['nom_empleado'] . "</td>
                                                <td>" . $Empleado['puesto'] . "</td>
                                                <td>" . $Empleado['nombre_supervisor'] . "</td>
                                                <td>" . $Empleado['fecha_contrato'] . "</td>
                                                <td>" . $Empleado['fecha_fin_contrato'] . "</td>
                                                <td>" . $Empleado['turno'] . "</td>
                                                <td>" . $Empleado['status'] . "</td>
                                            </tr>
                                        ";
                                        } ?>
                                    </tbody>
                                </table>
                            </div>



                        </fieldset>
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Acciones:</legend>

                            <div class="row">
                                <div class="col-6 offset-6">
                                    <button type="button" onClick=clean() class="btn btn-outline-secondary btn-block"><i class="fas fa-eraser"></i> Borrar</button>
                                </div>
                            </div>

                            <!--/. form-->
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

        function upLista() {
            var id_emp = $('#FromEmpleado').val('');

            console.log(id_emp);

            $.ajax({
                type: "POST",
                url: "assets/controler/incapacidad/select.php",
                success: function(data) {
                   
                    
                }
            });

        }
    </script>

</body>

</html>