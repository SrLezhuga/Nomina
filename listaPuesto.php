<?php
include("assets/controler/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nomina MFA | Lista Puesto</title>
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
                            <center>Lista Puesto</center>
                        </h1>
                        <!-- DataTales -->
                        <div class="table-responsive">
                            <table class="table table-hover table-sm" id="dataTableCliente" width="100%" cellspacing="0">
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
                                        <th>Acciones</th>
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
                                                <td><button type='button' class='btn btn-outline-light text-dark btn-sm BtnCliente' data-toggle='modal' data-target='#modalCliente'value=" . $Empleado['id_empleado'] . ">
                                                <i class='fas fa-pencil-alt'></i></button></td>
                                            </tr>
                                        ";
                                    } ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- DataTales End -->

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