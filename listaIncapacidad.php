<?php session_start();
if (isset($_SESSION['code_user']) && !$_SESSION['code_user']==0 ) {
    # code...
}else {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Nomina/Index'");
}
include("assets/controler/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nómina | Lista Faltas</title>
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
                            <center>Lista Faltas</center>
                        </h1>
                        <!-- DataTales -->
                        <div class="table-responsive" id="loadtable">
                            <table class="table table-hover table-sm" id="dataTableEmpleadoList" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $queryEmpleado = "SELECT * FROM tab_asistencia WHERE status = 'F'";
                                    $rsEmpleado = mysqli_query($con, $queryEmpleado) or die("Error de consulta");
                                    while ($Empleado = mysqli_fetch_array($rsEmpleado)) {

                                        $val_motivo = (!empty($Empleado['motivo'])) ? $Empleado['motivo'] : 'Sin asignar';
                                        $val_comentario = (!empty($Empleado['Comentarios'])) ? $Empleado['Comentarios'] : 'Sin comentarios';


                                        echo "
                                            <tr>
                                                <td>" . $Empleado['id_empleado'] . "</td>
                                                <td>" . $Empleado['nom_empleado'] . "</td>
                                                <td>" . $Empleado['fecha'] . "</td>
                                               
                                                <td><button type='button' class='btn btn-outline-light text-dark btn-sm BtnIncapacidad' data-toggle='modal' data-target='#modalCliente'value=" . $Empleado['id_empleado'] . "|" . $Empleado['fecha'] . ">
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
    <div class="modal fade" id="modalIncapacidad">
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

    <script>
        $(document).ready(function() {
            loadTable();
        });

        // Modal tarjeta cliente
        $('.BtnIncapacidad').on('click', function() {
            var id_button = $(this).val();
            $('.getSeguro').load('./assets/controler/incapacidad/select.php?id=' + id_button, function() {
                $('#modalIncapacidad').modal({
                    show: true
                });
            });
        });

        function upSeguro() {

            var formData = new FormData();

            var form_numero_empleado = $("#form_numero_empleado").val();
            var form_nom_empleado = $("#form_nom_empleado").val();
            var form_fecha = $("#form_fecha").val();
            var form_status = $("#form_status").val();
            var form_comentario = $("#form_comentario").val();

            formData.append("form_numero_empleado", form_numero_empleado);
            formData.append("form_nom_empleado", form_nom_empleado);
            formData.append("form_fecha", form_fecha);
            formData.append("form_status", form_status);
            formData.append("form_comentario", form_comentario);

            $.ajax({
                url: "./assets/controler/incapacidad/upInc.php",
                type: "post",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    var obj = JSON.parse(data);
                    if (obj.status == "ok") {
                        Swal.fire("Mensaje de confirmación", obj.msj, "success").then((result) => {
                            $('#modalIncapacidad').modal('hide');
                            location.reload(true)
                        })

                    } else {
                        Swal.fire("Mensaje de confirmación", obj.msj, "error");

                    }
                }
            });

        }

        function loadTable() {
            $('#dataTableEmpleadoList').DataTable({
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ empleados",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando  _START_ a _END_ empleados de un total de _TOTAL_ empleados",
                    "sInfoEmpty": "Sin empleados que mostrar",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ empleados)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "<i class='fas fa-angle-double-left'></i>",
                        "sLast": "<i class='fas fa-angle-double-right'></i>",
                        "sNext": "<i class='fas fa-angle-right'></i>",
                        "sPrevious": "<i class='fas fa-angle-left'></i>"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                }
            });
        }
    </script>
</body>

</html>