<?php
include("assets/controler/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nómina | Lista Seguro</title>
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
                            <center>Lista seguro</center>
                        </h1>
                        <!-- DataTales -->
                        <div class="table-responsive">
                            <table class="table table-hover table-sm" id="dataTableCliente" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>UMF</th>
                                        <th>Número del Seguro</th>
                                        <th>Vigencia</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $queryEmpleado = "SELECT * FROM tab_seguro";
                                    $rsEmpleado = mysqli_query($con, $queryEmpleado) or die("Error de consulta");
                                    while ($Empleado = mysqli_fetch_array($rsEmpleado)) {
                                        $queryNombre = "SELECT concat(apellido_pat_empleado, ' ', apellido_mat_empleado, ' ', nombre_empleado) AS nom_empleado FROM tab_empleado WHERE id_empleado = '" . $Empleado['id_empleado'] . "'";
                                        $rsNombre = mysqli_query($con, $queryNombre) or die("Error de consulta");
                                        $Nombre = mysqli_fetch_array($rsNombre);

                                        echo "
                                            <tr>
                                                <td>" . $Empleado['id_empleado'] . "</td>
                                                <td>" . $Nombre['nom_empleado'] . "</td>
                                                <td>" . $Empleado['unidad_medica_familiar'] . "</td>
                                                <td>" . $Empleado['sueldo_diario_imss'] . "</td>
                                                <td>" . $Empleado['alta_imss'] . "</td>
                                                <td><button type='button' class='btn btn-outline-light text-dark btn-sm BtnSeguro' data-toggle='modal' data-target='#modalCliente'value=" . $Empleado['id_empleado'] . ">
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

    <!-- The Modal -->
    <div class="modal fade" id="modalSeguro">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-left-danger shadow">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Datos de los Empleados</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="getSeguro">
                    </div>
                    <fieldset class="border p-2">
                        <legend class="w-auto">Acciones:</legend>

                        <div class="row">

                            <div class="col-12">
                                <button type="btn" class="btn btn-outline-pink btn-block" onclick="upSeguro()"><i class="fas fa-user-plus"></i> Actualizar Datos</button>
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
        $('.BtnSeguro').on('click', function() {
            var id_button = $(this).val();
            $('.getSeguro').load('./assets/controler/seguro/getSeg.php?id=' + id_button, function() {
                $('#modalSeguro').modal({
                    show: true
                });
            });
        });

        function upSeguro() {
            var formData = new FormData();

            var numero_empleado = $("#form_numero_empleado").val();

            var form_umf = $("#form_umf").val();

            var form_sueldo_diario = $("#form_sueldo_diario").val();

            var form_status = $("#form_status").val();

            formData.append("numero_empleado", numero_empleado);
            formData.append("form_umf", form_umf);
            formData.append("form_sueldo_diario", form_sueldo_diario);
            formData.append("form_status", form_status);

            $.ajax({
                url: "./assets/controler/seguro/upSeg.php",
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    var obj = JSON.parse(data);
                    if (obj.status == "ok") {
                        Swal.fire("Mensaje de confirmación", obj.msj, "success").then((result) => {
                            $('#modalSeguro').modal('hide');
                            location.reload(true)
                        })

                    } else {
                        Swal.fire("Mensaje de confirmación", obj.msj, "error");
                       
                    }
                }
            });

        }
    </script>
</body>

</html>