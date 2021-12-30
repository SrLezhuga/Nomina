<?php
include("assets/controler/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nómina | Reportes</title>
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
                            <center>Reportes Empleados</center>
                        </h1>
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Datos del reporte:</legend>
                            <div class="row">
                                <div class="col-8">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Seleccionar Cedis:</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option>ESCUELA NORMAL RURAL MIGUEL HIDALGO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label>Consultar:</label>
                                    <div class="input-group ">
                                        <button type="button" class="btn btn-sm btn-outline-secondary btn-block" onclick="CargarEmpleado()"><i class="fas fa-database"></i> Cargar Datos</button>
                                    </div>
                                </div>
                            </div>
                            <div class='table-responsive' id='loadtable'>
                                <table class="table table-hover table-sm" id="dataTableEmpleadoList" width="100%" cellspacing="0">
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
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>



                        </fieldset>
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Acciones:</legend>

                            <div class="row">
                                <div class="col-6 offset-6">
                                    <form class="form" action="assets/controler/reportes/reporteEmpleado.php" method="POST" target="_blank">
                                        <div class="input-group ">
                                            <button type="submit" onclick="clear()" class="btn btn-sm btn-outline-danger btn-block" id="btn_generar_pdf" disabled><i class="fas fa-file-pdf"></i> Exportar PDF</button>
                                        </div>
                                    </form>
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
                "Se genero PDF",
                "success"
            );
            $("#btn_generar_pdf").prop("disabled", true);
        }

        function CargarEmpleado() {
            $.ajax({
                type: "POST",
                url: "assets/controler/reportes/rep_empleado.php",
                success: function(data) {
                    $('#loadtable').empty();
                    $("#loadtable").append(data);
                    $("#btn_generar_pdf").prop("disabled", false);
                    loadTable();
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