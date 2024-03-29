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
    <title> Nómina | Buscar Empleados</title>
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
                            <center>Buscar empleados</center>
                        </h3>

                        <div class="row">
                            <!-- Content Row -->
                            <div class="col-4">
                                <!-- Formulario orden -->
                                <fieldset class='border p-2'>
                                    <legend class='w-auto'>Buscar:</legend>
                                    <div class="row">
                                        <!--Campo Cliente -->
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12">
                                            <label> N° Empleado:</label>
                                            <div class="input-group input-group-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-hashtag"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control validar" placeholder="Número Empelado" id="Empleado" name="Empleado" pattern='[0-9]{5}' title="Empleado: XXXXX" required>
                                            </div>
                                        </div>
                                        <!--Campo Cliente -->
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-lg-12">
                                            <br>
                                            <button type="button" onclick="buscar()" class="btn btn-outline-pink btn-block BtnBuscar"><i class="fas fa-search"></i> Buscar</button>
                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <!-- Content Row -->
                            <div class="col-8" id="Datos">
                                <!-- Formulario -->
                                <div class="col-xl-12 col-md-12 mb-12">

                                    <fieldset class='border p-2'>
                                        <legend class='w-auto'><a id="Id_empleado">N° Empleado: XXXXX</a></legend>

                                        <div class="row">
                                            <!--Campo Nombre del Empleado -->
                                            <div class="col-12">
                                                <label>Nombre del Empleado:</label>
                                                <span><i class="fas fa-user-alt"></i> </span>
                                                <a><b id="Nombre_empleado">&nbsp;</b></a>
                                            </div>
                                            <!--Campo Puesto -->
                                            <div class="col-12">
                                                <label>Puesto:</label>
                                                <span><i class="fas fa-portrait"></i></span>
                                                <a><b id="Puesto_empleado">&nbsp;</b></a>
                                            </div>
                                            <!--Campo Status -->
                                            <div class="col-12">
                                                <label>Status:</label> <span> <i class="fas fa-user-tag"></i></span>
                                                <a><b id="Status_empleado">&nbsp;</b></a>
                                            </div>

                                            <div class="col-12">

                                                <div class="row">
                                                    <div class="col-6">
                                                        <button type="button" onclick=clean() class="btn btn-outline-secondary btn-block" disabled id="btn_clear"><i class="fas fa-eraser"></i> Borrar</button>
                                                    </div>
                                                    <br>
                                                    <div class="col-6">
                                                        <button type="button" class="btn btn-outline-pink btn-block BtnDetalles" disabled id="btn_detalles"><i class="fas fa-user-plus"></i> Ver Detalles</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </fieldset>


                                </div>
                            </div>
                            <!-- Content Row -->
                        </div>

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
                    <h3 class="modal-title">Detalles del Empleado</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="getEmpleado"></div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i>
                        Cerrar</button>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        // Modal tarjeta Orden
        $(function() {
            $("#Empleado").keydown(function(event) {
                //alert(event.keyCode);
                if (event.keyCode == 13) {
                    buscar();
                } else if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !== 190 && event.keyCode !== 110 && event.keyCode !== 8 && event.keyCode !== 9) {
                    return false;
                }
            });
        });



        $('.BtnDetalles').on('click', function() {
            var id_button = $("#Empleado").val();
            $('.getEmpleado').load('./assets/controler/empleado/getDetail.php?id=' + id_button, function() {
                $('#modalEmpleado').modal({
                    show: true
                });
            });
        });


        function buscar() {

            var costo = $("#Empleado").val();

            if (costo == "") {
                return Swal.fire(
                    "Mensaje de advertencia",
                    "No se capturó empleado",
                    "info"
                );
            }

            $.ajax({
                url: "./assets/controler/buscar/buscarEmpleado.php",
                type: "post",
                data: {
                    id: costo
                },
                success: function(data) {
                    var obj = JSON.parse(data);

                    if (obj.status == "ok") {
                        $("#Id_empleado").html("N° Empleado: " + obj.id);
                        $("#Nombre_empleado").html(obj.nombre);
                        $("#Status_empleado").html(obj.status_empleado);
                        $("#Puesto_empleado").html(obj.puesto);
                        document.getElementById("btn_clear").disabled = false;
                        document.getElementById("btn_detalles").disabled = false;
                    } else {
                        return Swal.fire(
                            "Mensaje de error",
                            "No se encontro empleado",
                            "error"
                        );
                        clean();
                    }
                }
            });

        };

        function clean() {
            $("#Id_empleado").html("N° Empleado: XXXXX");
            $("#Nombre_empleado").html("");
            $("#Status_empleado").html("");
            $("#Puesto_empleado").html("");
            $("#Empleado").val("");

            document.getElementById("btn_clear").disabled = true;
            document.getElementById("btn_detalles").disabled = true;
        }
    </script>

</body>

</html>