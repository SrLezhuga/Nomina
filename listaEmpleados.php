<?php
include("assets/controler/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nomina MFA | Lista Empleados</title>
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
                            <center>Lista de empleados</center>
                        </h1>
                        <!-- DataTales -->
                        <div class="table-responsive">
                            <table class="table table-hover table-sm" id="dataTableCliente" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Ap. Paterno</th>
                                        <th>Ap. Materno</th>
                                        <th>Nombres</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $queryEmpleado = "SELECT id_empleado, apellido_pat_empleado, apellido_mat_empleado, nombre_empleado FROM tab_empleado";
                                    $rsEmpleado = mysqli_query($con, $queryEmpleado) or die("Error de consulta");
                                    while ($Empleado = mysqli_fetch_array($rsEmpleado)) {
                                        echo "
                                            <tr>
                                                <td>" . $Empleado['id_empleado'] . "</td>
                                                <td>" . $Empleado['apellido_pat_empleado'] . "</td>
                                                <td>" . $Empleado['apellido_mat_empleado'] . "</td>
                                                <td>" . $Empleado['nombre_empleado'] . "</td>
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