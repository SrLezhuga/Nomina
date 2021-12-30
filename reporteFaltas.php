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
                            <center>Reportes Asistencias</center>
                        </h1>
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Datos del reporte:</legend>
                            <div class="row">
                                <!-- form Puesto -->

                                <!--Campo Empleado -->
                                <div class="col-4">
                                    <label for="formEmpleado" class="form-label">Empleado:</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                        <select name="formEmpleado" id="formEmpleado" class="mi-selector custom-select">
                                            <option value="" selected disabled>Seleccione datos del empleado</option>
                                            <option value="TODOS">000 | Todos los empleados</option>
                                            <?php $listEmp = "SELECT id_empleado, concat(apellido_pat_empleado, ' ', apellido_mat_empleado, ' ', nombre_empleado) as nombre, status_empleado FROM nomina.tab_empleado ORDER BY apellido_pat_empleado ASC";
                                            $rsEmp = mysqli_query($con, $listEmp) or die("Error de consulta");
                                            while ($itemEmp = mysqli_fetch_array($rsEmp)) {
                                                echo "<option value='" . $itemEmp['id_empleado'] . "'>" . $itemEmp['id_empleado'] . " | " . $itemEmp['nombre'] .  "</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="form_inicio" class="form-label">Fecha Inicio:</label>
                                        <input type="date" class="form-control" id="form_inicio" name="form_inicio" value="<?php echo date('Y-m-d', strtotime("now")); ?>">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="form_fin" class="form-label">Fecha Final:</label>
                                        <input type="date" class="form-control" id="form_fin" name="form_fin" value="<?php echo date('Y-m-d', strtotime("now")); ?>">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <label>Consultar:</label>
                                    <div class="input-group ">
                                        <button type="button" class="btn btn-sm btn-outline-secondary btn-block" onclick="CargarAsistencias()"><i class="fas fa-database"></i> Cargar Datos</button>
                                    </div>
                                </div>
                            </div>
                            <div class='table-responsive' id='loadtable'>
                                <table class="table table-hover table-sm" id="dataTablePuesto" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Fecha</th>
                                            <th>Status </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
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
                                    <button type="button" onClick=clean() class="btn btn-outline-danger btn-block"><i class="fas fa-file-pdf"></i> Exportar PDF</button>
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


        function CargarAsistencias() {
            var formData = new FormData();

            var empleado = $('#formEmpleado').val();

            if (empleado == null) {
                Swal.fire("Mensaje de confirmación", "Campo empleado sin llenar", "error");
                return;
            }

            var fecha_inicio = $('#form_inicio').val();

            if (fecha_inicio == null) {
                Swal.fire("Mensaje de confirmación", "Campo fecha inicio sin llenar", "error");
                return;
            }

            var fecha_fin = $('#form_fin').val();

            if (fecha_fin == null) {
                Swal.fire("Mensaje de confirmación", "Campo fecha final sin llenar", "error");
                return;
            }


            formData.append("fecha_inicio", fecha_inicio);
            formData.append("fecha_fin", fecha_fin);
            formData.append("empleado", empleado);

            $.ajax({
                type: "POST",
                url: "assets/controler/reportes/rep_asistencia.php",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {

                    $('#loadtable').empty();
                    $("#loadtable").append(data);
                    $("#btn_generar_pdf").prop("disabled", false);
                    loadTable();

                }
            });


        }

        function crearPDF() {
            var fecha_inicio = $('#form_inicio').val();
            var fecha_fin = $('#form_fin').val();

            var URL = 'assets/controler/reportes/rep_asistencia.php';

            window.open(URL, '_blank');

            $.ajax({
                type: "POST",
                url: "assets/controler/reportes/rep_asistencia.php",
                data: formData,
                contentType: false,
                processData: false,
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