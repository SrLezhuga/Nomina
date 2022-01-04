<?php session_start();
if (isset($_SESSION['code_user']) && !$_SESSION['code_user']==0 ) {
    # code...
}else {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Nomina/Index'");
}
include("assets/controler/conexion.php");
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nómina | Crear Nomina</title>
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
                            <center>Nómina por Empleado</center>
                        </h1>


                        <div class="row">
                            <!--Campo Empleado -->
                            <div class="col-6">
                                <label>Empleado:</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                    <select name="Nom_empleado" id="Nom_empleado" class="mi-selector custom-select">
                                        <option value="0" selected disabled>Seleccione datos del empleado</option>
                                        <?php $listEmp = "SELECT id_empleado, concat(apellido_pat_empleado, ' ', apellido_mat_empleado, ' ', nombre_empleado) as nombre, status_empleado FROM nomina.tab_empleado WHERE status_empleado = 'ACTIVO' ORDER BY apellido_pat_empleado ASC";
                                        $rsEmp = mysqli_query($con, $listEmp) or die(mysqli_error($con));
                                        while ($itemEmp = mysqli_fetch_array($rsEmp)) {
                                            echo "<option value='" . $itemEmp['id_empleado'] . "'>" . $itemEmp['id_empleado'] . " | " . $itemEmp['nombre'] .  "</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- Fecha nomina-->
                            <div class="col-4">
                                <label>Fecha:</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="date" class="form-control" placeholder="Fecha de remision" value="<?php echo date('Y-m-d', strtotime("now")); ?>" name="Nom_fecha" id="Nom_fecha" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <label>Visualizar:</label>
                                <div class="input-group ">
                                    <button type="button" class="btn btn-sm btn-outline-secondary btn-block" onclick="cargarNomina()"><i class="fas fa-database"></i> Cargar Datos</button>
                                </div>
                            </div>
                        </div>


                        <br>
                        <fieldset id="prenominaEmpleado" class='border p-2 small'>
                            <div class="row">
                                <div class="col-8">
                                    <h4 class="text-left">
                                        <strong id="NomCedis">
                                            NOMBRE CEDIS
                                        </strong>
                                    </h4>
                                </div>
                                <div class="col-4 text-right">
                                    <h4 class="text-right" style="color: crimson;">
                                        <strong id="empleado">
                                            Nº EMPLEADO: 00000
                                        </strong>
                                    </h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <a id="infoCedis">
                                        DIRECCIÓN CEDIS
                                        <br />
                                        COL CEDIS, C.P. 00000
                                        <br />
                                        RFC. XXXXXXXXXXXX
                                        <br />
                                    </a>
                                </div>
                                <div class="col-4 text-right">
                                    <a id="fecha_viernes">
                                        <b>DIA DE PAGO:</b>
                                        <br>12-24-2999
                                        <br>
                                    </a>
                                </div>
                                <div class="col-4 text-right">
                                    <a id="periodo_pago">
                                        <b>PERIODO DE PAGO:</b>
                                        <br>Del: 12-24-2999
                                        <br>Al: 12-24-2999
                                        <br>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center" style="background-color: #9E9E9E; color:white;">
                                    <a>
                                        <b>RECIBO DE NÓMINA</b>
                                        <br>
                                    </a>
                                </div>
                            </div>
                            <fieldset class="border p-2">
                                <legend class="w-auto"><a><strong>Datos del Empleado:</strong></a></legend>
                                <div class="row">
                                    <div class="col-2">
                                        <a class="text-right">
                                            <b>Nombre:</b>
                                            <br />
                                            <b>Puesto:</b>
                                            <br />
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a id="datos_empleado">
                                            NOMBRE EMPLEADO
                                            <br />
                                            PUESTO EMPLEADO
                                            <br />
                                        </a>
                                    </div>
                                    <div class="col-2">
                                        <a>
                                            <b>Salario Diario:</b>
                                            <br />
                                            <b>Dias Pagados:</b>
                                            <br />
                                            <b>Deposito Tarjeta:</b>
                                            <br />
                                        </a>
                                    </div>
                                    <div class="col-2 ">
                                        <a id="dias_pago">
                                            $ 0.00
                                            <br />
                                            0 dias.
                                            <br />
                                            $ 0.00
                                            <br />
                                        </a>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row">
                                <div class="col-6">
                                    <fieldset class="border p-2">
                                        <legend class="w-auto"><a><strong>Percepciones / Otros pagos:</strong></a></legend>
                                        <div class="row">
                                            <div class="col-3">
                                                <a>
                                                    <b>Sueldo:</b>
                                                    <br />
                                                    <b>Complemento:</b>
                                                    <br />
                                                    <b>
                                                        <!--Incapacidad:-->
                                                    </b>
                                                    <br />
                                                    <b>
                                                        <!--Horas Extra:-->
                                                    </b>
                                                    <br />
                                                    <b>
                                                        <!--Bono:-->
                                                    </b>
                                                    <br />
                                                </a>
                                            </div>
                                            <div class="col-9">
                                                <a id="percepciones">
                                                    $ 0.00
                                                    <br />
                                                    $ 0.00
                                                    <br />
                                                    <!-- $ 0.00-->
                                                    <br />
                                                    <!-- $ 0.00-->
                                                    <br />
                                                    <!-- $ 0.00-->
                                                    <br />
                                                </a>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-6">
                                    <fieldset class="border p-2">
                                        <legend class="w-auto"><a><strong>Descuentos:</strong></a></legend>
                                        <div class="row">
                                            <div class="col-3">
                                                <a>
                                                    <b>Retardos:</b>
                                                    <br />
                                                    <b>Faltas:</b>
                                                    <br />
                                                    <b>
                                                        <!--Caja Ahorro:-->
                                                    </b>
                                                    <br />
                                                    <b>
                                                        <!--Infonavit:-->
                                                    </b>
                                                    <br />
                                                    <b>
                                                        <!--Prestamo:-->
                                                    </b>
                                                    <br />
                                                </a>
                                            </div>
                                            <div class="col-9">
                                                <a id="descuentos">
                                                    -$ 0.00
                                                    <br />
                                                    -$ 0.00
                                                    <br />
                                                    <!-- -$ 0.00-->
                                                    <br />
                                                    <!-- -$ 0.00-->
                                                    <br />
                                                    <!-- -$ 0.00-->
                                                    <br />
                                                </a>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <fieldset class="border p-2">
                                        <legend class="w-auto">
                                            <a>
                                                <strong>Neto en letra:</strong>
                                            </a>
                                        </legend>
                                        <div class="text-center">
                                            <a id="neto_letra" class="text-center">
                                                CERO PESOS 00/100 CENTAVOS.
                                                <br />
                                            </a>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-3">
                                    <fieldset class="border p-2">
                                        <legend class="w-auto">
                                            <a>
                                                <strong>Neto Recibido:</strong>
                                            </a>
                                        </legend>
                                        <div class="text-center">
                                            <a id="neto">
                                                $ 0.00
                                                <br />
                                            </a>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <br>

                        </fieldset>



                        <div class="row mt-3">
                            <div class="col-2 offset-8">
                                <div class="input-group ">
                                    <button type="button" class="btn btn-sm btn-outline-secondary btn-block" id="btn_reset_nomina" onclick="resetNomina()"><i class="fas fa-eraser"></i> Limpiar Datos</button>
                                </div>
                            </div>
                            <div class="col-2">
                                <form class="form" id="cleanForm" action="assets/controler/reportes/nomina.php" method="POST" target="_blank">
                                    <input type="hidden" class="form-control" name="form_empleado" id="form_empleado" value="">
                                    <input type="hidden" class="form-control" name="form_fecha" id="form_fecha" value="">

                                    <div class="input-group ">
                                        <button type="submit" class="btn btn-sm btn-outline-danger btn-block" id="btn_crear_nomina" disabled><i class="fas fa-file-pdf"></i> Crear Nómina</button>
                                    </div>
                                </form>
                            </div>

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

    <script>
        function resetNomina() {

            $("#Nom_empleado").val(0);
            $("#NomCedis").html("NOMBRE CEDIS");
            $("#empleado").html("Nº EMPLEADO: 00000");
            $("#infoCedis").html("DIRECCIÓN <br /> COL, C.P. <br /> RFC. ");
            $("#fecha_viernes").html("<b>DIA DE PAGO:</b><br>12-24-2999<br><br>");
            $("#periodo_pago").html("<b>PERIODO DE PAGO:</b><br>Del: 12-24-2999<br>Al: 12-24-2999<br>");
            $("#datos_empleado").html("NOMBRE EMPLEADO<br />PUESTO EMPLEADO<br />");
            $("#dias_pago").html("$ 0.00<br />0 dias.<br /> $ 0.00<br />");

            $("#percepciones").html("$ 0.00<br />$ 0.00<br /><br /><br /><br />");

            /*$("#percepciones").html("$ " + obj.Salario + "<br />" +
                "$ " + obj.Deposito + "<br />" +
                "$ " + obj.Incapacidad + ".00<br />" +
                "$ " + obj.HorasExtra + ".00<br />" +
                "$ " + obj.BonoEmpleado + ".00<br />");*/

            $("#descuentos").html("-$ 0.00<br />-$ 0.00<br /><br /><br /><br />");

            /* $("#descuentos").html("-$ " + obj.DescuentoRetardos + ".00<br />" +
                 "-$ " + obj.DescuentoFaltas + ".00<br />" +
                 "-$ " + obj.DesCajaAhorro + ".00<br />" +
                 "-$ " + obj.DesInfonavit + ".00<br />" +
                 "-$ " + obj.DesPrestamo + ".00<br />"); */

            $("#neto_letra").html("CERO PESOS 00/100 CENTAVOS.<br />");
            $("#neto").html("$ 0.00<br />");

            $("#btn_crear_nomina").prop("disabled", true);
            $("#Nom_empleado").prop("disabled", false);
            $("#Nom_fecha").prop("disabled", false);

            $("#form_empleado").val('');
            $("#form_fecha").val('');

            Swal.fire("Mensaje de confirmación", "Se limpio la nómina", "success");

        }

        function cargarNomina() {
            var formData = new FormData();
            var empleado = $('#Nom_empleado').val();
            if (empleado == null) {
                Swal.fire("Mensaje de confirmación", "Selecciona un empleado", "error");
                return;
            }

            var fecha = $('#Nom_fecha').val();

            if (fecha == null) {
                Swal.fire("Mensaje de confirmación", "Selecciona una fecha valida", "error");
                return;
            }

            formData.append("empleado", empleado);
            formData.append("fecha", fecha);

            $.ajax({
                url: "./assets/controler/nomina/precarga.php",
                type: "post",
                data: formData,
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                error: function() {
                    alert("error petición ajax");
                },
                success: function(data) {
                    var obj = JSON.parse(data);

                    if (obj.status == "ok") {
                        $("#NomCedis").html(obj.NomCedis);
                        $("#empleado").html("Nº EMPLEADO: " + obj.empleado);
                        $("#infoCedis").html(obj.DirCedis + "<br />" + "COL " +
                            obj.ColCedis + ", C.P. " +
                            obj.CPCedis + "<br />" + "RFC. " +
                            obj.RFCCedis);
                        $("#fecha_viernes").html("<b>DIA DE PAGO:</b><br>" +
                            obj.fecha_viernes + "<br>");
                        $("#periodo_pago").html("<b>PERIODO DE PAGO:</b><br>Del: " +
                            obj.fecha_domingo + "<br>Al: " +
                            obj.fecha_sabado + "<br>");
                        $("#datos_empleado").html(obj.NombreEmpleado + "<br />" +
                            obj.PuestoEmpleado + "<br />");
                        $("#dias_pago").html("$ " + obj.SalarioDiario + "<br />" +
                            obj.CountAsistencias + " dias.<br /> $ " +
                            obj.Deposito + "<br />");

                        $("#percepciones").html("$ " + obj.Salario + "<br />" +
                            "$ " + obj.Deposito + "<br /><br /><br /><br />");

                        /*$("#percepciones").html("$ " + obj.Salario + "<br />" +
                            "$ " + obj.Deposito + "<br />" +
                            "$ " + obj.Incapacidad + ".00<br />" +
                            "$ " + obj.HorasExtra + ".00<br />" +
                            "$ " + obj.BonoEmpleado + ".00<br />");*/

                        $("#descuentos").html("-$ " + obj.DescuentoRetardos + "<br />" +
                            "-$ " + obj.DescuentoFaltas + "<br /><br /><br /><br />");

                        /* $("#descuentos").html("-$ " + obj.DescuentoRetardos + ".00<br />" +
                             "-$ " + obj.DescuentoFaltas + ".00<br />" +
                             "-$ " + obj.DesCajaAhorro + ".00<br />" +
                             "-$ " + obj.DesInfonavit + ".00<br />" +
                             "-$ " + obj.DesPrestamo + ".00<br />"); */

                        $("#neto_letra").html(obj.TotalNetoLetra + "<br />");
                        $("#neto").html("$ " + obj.TotalNeto + "<br />");

                        $("#btn_crear_nomina").prop("disabled", false);

                        $("#Nom_empleado").prop("disabled", true);
                        $("#Nom_fecha").prop("disabled", true);

                        $("#form_empleado").val(empleado);
                        $("#form_fecha").val(fecha);

                    } else {
                        Swal.fire("Mensaje de error", obj.msg, "error");
                    }
                }
            });
        }
    </script>
</body>

</html>