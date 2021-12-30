<?php
include("assets/controler/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nómina | Lista Empleados</title>
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
                        <h3>
                            <center>Lista de empleados</center>
                        </h3>
                        <!-- DataTales -->
                        <div class="table-responsive">
                            <table class="table table-hover table-sm" id="dataTableEmpleado" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre empleado</th>
                                        <th>Status</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $queryEmpleado = "SELECT id_empleado, concat(apellido_pat_empleado, ' ', apellido_mat_empleado, ' ', nombre_empleado) AS nombre, status_empleado FROM tab_empleado";
                                    $rsEmpleado = mysqli_query($con, $queryEmpleado) or die("Error de consulta");
                                    while ($Empleado = mysqli_fetch_array($rsEmpleado)) {
                                        if ($Empleado['status_empleado'] == "BAJA") {
                                            $bg = "class='table-danger'";
                                        } else {
                                            $bg = '';
                                        }
                                        echo "
                                            <tr " . $bg . ">
                                                <td>" . $Empleado['id_empleado'] . "</td>
                                                <td>" . $Empleado['nombre'] . "</td>
                                                <td>" . $Empleado['status_empleado'] . "</td>
                                                <td><button type='button' class='btn btn-outline-light text-dark btn-sm BtnEmpleado' data-toggle='modal' data-target='#modalEmpleado'value=" . $Empleado['id_empleado'] . ">
                                                <i class='fas fa-eye'></i> Ver Datos</button></td>
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

    <!-- The Modal -->
    <div class="modal fade" id="modalEmpleado">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-left-danger shadow">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Datos de los Empleados</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="getEmpleado">
                    </div>
                    <fieldset class="border p-2">
                        <legend class="w-auto">Acciones:</legend>

                        <div class="row">

                            <div class="col-12">
                                <button type="btn" class="btn btn-outline-pink btn-block" onclick="upEmpleado()"><i class="fas fa-user-plus"></i> Actualizar Datos</button>
                            </div>
                        </div>

                        <!--/. form-->
                    </fieldset>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i>
                        Cancelar</button>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        // Modal tarjeta cliente
        $('.BtnEmpleado').on('click', function() {
            var id_button = $(this).val();
            $('.getEmpleado').load('./assets/controler/empleado/getEmp.php?id=' + id_button, function() {
                $('#modalEmpleado').modal({
                    show: true
                });
            });
        });

        function upEmpleado() {
            var formData = new FormData();

            var numero_empleado = $("#form_numero_empleado").val();
            var apellido_paterno = $("#form_apellido_paterno").val();
            var apellido_materno = $("#form_apellido_materno").val();
            var nombres = $("#form_nombres").val();
            var domicilio = $("#form_domicilio").val();
            var colonia = $("#form_colonia").val();
            var codigo_postal = $("#form_codigo_postal").val();
            var ciudad = $("#form_ciudad").val();
            var estado = $("#form_estado").val();
            var NSS = $("#form_NSS").val();
            var RFC = $("#form_RFC").val();
            var CURP = $("#form_CURP").val();
            var sexo = $("#form_sexo").val();
            var fecha_nacimiento = $("#form_fecha_nacimiento").val();
            var pais_nacimiento = $("#form_pais_nacimiento").val();
            var estado_nacimiento = $("#form_estado_nacimiento").val();
            var ciudad_nacimiento = $("#form_ciudad_nacimiento").val();
            var estado_civil = $("#form_estado_civil").val();

            formData.append("form_numero_empleado", numero_empleado);
            formData.append("form_apellido_paterno", apellido_paterno);
            formData.append("form_apellido_materno", apellido_materno);
            formData.append("form_nombres", nombres);
            formData.append("form_domicilio", domicilio);
            formData.append("form_colonia", colonia);
            formData.append("form_codigo_postal", codigo_postal);
            formData.append("form_ciudad", ciudad);
            formData.append("form_estado", estado);
            formData.append("form_NSS", NSS);
            formData.append("form_RFC", RFC);
            formData.append("form_CURP", CURP);
            formData.append("form_sexo", sexo);
            formData.append("form_fecha_nacimiento", fecha_nacimiento);
            formData.append("form_pais_nacimiento", pais_nacimiento);
            formData.append("form_estado_nacimiento", estado_nacimiento);
            formData.append("form_ciudad_nacimiento", ciudad_nacimiento);
            formData.append("form_estado_civil", estado_civil);

            $.ajax({
                url: "./assets/controler/empleado/upEmp.php",
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    var obj = JSON.parse(data);
                    if (obj.status == "ok") {
                        Swal.fire("Mensaje de confirmación", obj.msj, "success");
                        $('#modalEmpleado').modal('hide');
                    } else {
                        Swal.fire("Mensaje de confirmación", obj.msj, "error");
                    }
                }
            });

        }
    </script>

</body>

</html>