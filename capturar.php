<?php
include("assets/controler/conexion.php"); 
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City");?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nomina MFA | Capturar</title>
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
                            <center>Captura Asistencia</center>
                        </h1>
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Capturar asistencias:</legend>
                            <div class="row">
                                <div class="col-4">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="date" class="form-control" placeholder="Fecha de remision" value="<?php echo date('Y-m-d', strtotime("now")); ?>" name="form_Fec" id="form_Fec" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group ">
                                        <button type="button" class="btn btn-outline-secondary btn-block" onclick="CargarAsistencias()"><i class="fas fa-database"></i> Cargar Datos</button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group ">
                                        <button type="button" class="btn btn-outline-danger btn-block " onclick="RegistrarAsistencias()" disabled id="btn_registrar"><i class="fas fa-save"></i> Guardar Datos</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <!-- DataTales -->
                        <div class="col-12" id="div_tabla">
                            <br>
                        </div>

                    </div>
                </div>



            </div>

            <script type="text/javascript">
                function CargarAsistencias() {
                    Swal.fire({
                        title: 'Cargando datos',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        timer: 50000,
                        showConfirmButton: false,
                        willOpen: () => {
                            swal.showLoading();
                        }
                    });

                    fecha = document.getElementById("form_Fec").value;
                    $.ajax({
                        url: './assets/controler/asistencia/capturarAsis.php',
                        type: "post",
                        data: {
                            id: fecha
                        },
                        success: function(resp) {
                            swal.close();
                            $("#div_tabla").html(resp);
                            document.getElementById("btn_registrar").disabled = false;
                        }
                    });
                    return false;
                }

                function RegistrarAsistencias() {

                    Swal.fire({
                        title: 'Cargando datos',
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        timer: 50000,
                        showConfirmButton: false,
                        willOpen: () => {
                            swal.showLoading();
                        }
                    });

                    var contador = 0;
                    var arreglo_id = new Array();
                    var arreglo_nombre = new Array();
                    var arreglo_status = new Array();

                    $("#tabla_asistencia tbody#tbody_tabla_asistencia tr").each(function() {
                        arreglo_id.push($(this).find("td").eq(0).text());
                        arreglo_nombre.push($(this).find("td").eq(1).text());
                        arreglo_status.push($(this).find('input[type="text"]').val());
                        contador++;
                    });

                    var id = arreglo_id.toString();
                    var nombre = arreglo_nombre.toString();
                    var status = arreglo_status.toString();
                    var fecha = document.getElementById("form_Fec").value;

                    $.ajax({
                        url: "./assets/controler/asistencia/controlador_registro.php",
                        type: "post",
                        data: {
                            id: id,
                            nombre: nombre,
                            status: status,
                            fecha: fecha
                        }
                    }).done(function(resp) {
                        swal.close();
                        if (resp == 1) {
                            return Swal.fire(
                                "Mensaje de confirmación",
                                "Se cargaron los datos",
                                "success"
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        } else {
                            return Swal.fire(
                                "Mensaje de error",
                                "Error al cargar intentalo nuevamente",
                                "error"
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        }
                    });
                }
            </script>

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