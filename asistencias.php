<?php
include("assets/controler/conexion.php");
date_default_timezone_set('UTC');
date_default_timezone_set("America/Mexico_City"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nomina MFA | Asistencias</title>
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


                <div class="card border-left-pink shadow ">
                    <div class="card-body">
                        <h2>
                            <center>Captura semanal de asistencias</center>
                        </h2>
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Capturar asistencias:</legend>
                            <div class="row">
                                <div class="col-3">
                                    <label>Fecha:</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="date" class="form-control" name="form_Fec" id="form_Fec">
                                    </div>
                                </div>
                                <!--Campo Empleado -->
                                <div class="col-6">
                                    <label>Empleado:</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                        <select name="FromEmpleado" id="FromEmpleado" class="mi-selector custom-select">
                                            <option value="0" selected disabled>Seleccione datos del empleado</option>
                                            <?php $listEmp = "SELECT id_empleado, concat(apellido_pat_empleado, ' ', apellido_mat_empleado, ' ', nombre_empleado) as nombre, status_empleado FROM nomina.tab_empleado WHERE status_empleado = 'ACTIVO' ORDER BY apellido_pat_empleado ASC";
                                            $rsEmp = mysqli_query($con, $listEmp) or die("Error de consulta");
                                            while ($itemEmp = mysqli_fetch_array($rsEmp)) {
                                                echo "<option value='" . $itemEmp['id_empleado'] . "'>" . $itemEmp['id_empleado'] . " | " . $itemEmp['nombre'] .  "</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <label>Consultar:</label>
                                    <div class="input-group ">
                                        <button type="button" class="btn btn-sm btn-outline-secondary btn-block" onclick="CargarAsistencias()"><i class="fas fa-database"></i> Cargar Datos</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <br>
                                    <center>
                                        <h4>Semana del <b id="fecha_inicio">0000-00-00</b> al <b id="fecha_final">0000-00-00</b> .</h4>
                                    </center>
                                    <center>
                                        <h6><b>1</b>= Asistencia <b>F</b>= Falta</h6>
                                    </center>
                                    <br>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <!--Campo Empleado -->
                                        <div class="col-5">
                                            <div class='form-group'>
                                                <label><b>Empleado</b><br> <a id="id_empleado">00000</a></label>
                                                <input type='text' class='form-control form-control-sm' value='' id="nom_empleado" autocomplete="false" readonly="true">
                                            </div>
                                        </div>
                                        <!--Campo Domingo -->
                                        <div class="col-1">
                                            <div class='form-group'>
                                                <label><b>Domingo</b> <br> <a id="Fec_Domingo"> 1999-99-99 </a></label>
                                                <input type='text' class='form-control form-control-sm' value='' id="Domingo">
                                            </div>
                                        </div>
                                        <!--Campo Lunes -->
                                        <div class="col-1">
                                            <div class='form-group'>
                                                <label><b>Lunes</b> <br> <a id="Fec_Lunes"> 1999-99-99 </a></label>
                                                <input type='text' class='form-control form-control-sm' value='' id="Lunes">
                                            </div>
                                        </div>
                                        <!--Campo Martes -->
                                        <div class="col-1">
                                            <div class=' form-group'>
                                                <label><b>Martes</b> <br> <a id="Fec_Martes"> 1999-99-99 </a></label>
                                                <input type='text' class='form-control form-control-sm' value='' id="Martes">
                                            </div>
                                        </div>
                                        <!--Campo Miercoles -->
                                        <div class="col-1">
                                            <div class=' form-group'>
                                                <label><b>Miercoles</b> <br> <a id="Fec_Miercoles"> 1999-99-99 </a></label>
                                                <input type='text' class='form-control form-control-sm' value='' id="Miercoles">
                                            </div>
                                        </div>
                                        <!--Campo Jueves -->
                                        <div class="col-1">
                                            <div class=' form-group'>
                                                <label><b>Jueves</b> <br> <a id="Fec_Jueves"> 1999-99-99 </a></label>
                                                <input type='text' class='form-control form-control-sm' value='' id="Jueves">
                                            </div>
                                        </div>
                                        <!--Campo Viernes -->
                                        <div class="col-1">
                                            <div class=' form-group'>
                                                <label><b>Viernes</b> <br> <a id="Fec_Viernes"> 1999-99-99 </a></label>
                                                <input type='text' class='form-control form-control-sm' value='' id="Viernes">
                                            </div>
                                        </div>
                                        <!--Campo Sabado -->
                                        <div class="col-1">
                                            <div class=' form-group'>
                                                <label> <b> Sabado </b><br> <a id="Fec_Sabado"> 1999-99-99 </a></label>
                                                <input type='text' class='form-control form-control-sm' value='' id="Sabado">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9"></div>
                                <div class="col-3">
                                    <div class="input-group ">
                                        <button type="button" class="btn btn-sm btn-outline-pink btn-block " onclick="RegistrarAsistencias()" disabled id="btn_guardar"><i class="fas fa-save"></i> Guardar Datos</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <script>
                            $(document).ready(function() {
                                DesactivarCampos();
                            });

                            function CargarAsistencias() {
                                var id_empleado = $("#FromEmpleado").val();
                                var fecha = $("#form_Fec").val();

                                $.ajax({
                                    url: "assets/controler/semanal/precarga.php",
                                    type: "post",
                                    data: {
                                        Ide: id_empleado,
                                        Fec: fecha
                                    },
                                    success: function(data) {
                                        var obj = JSON.parse(data);
                                        if (obj.status == "ok") {
                                            $("#fecha_inicio").html(obj.fec_ini);
                                            $("#fecha_final").html(obj.fec_fin);
                                            $("#id_empleado").html(obj.id_empleado);
                                            $("#nom_empleado").val(obj.nom_empleado);
                                            //Domingo
                                            $("#Fec_Domingo").html(obj.Fec_Domingo);
                                            $("#Domingo").val(obj.Domingo);
                                            //Lunes
                                            $("#Fec_Lunes").html(obj.Fec_Lunes);
                                            $("#Lunes").val(obj.Lunes);
                                            //Martes
                                            $("#Fec_Martes").html(obj.Fec_Martes);
                                            $("#Martes").val(obj.Martes);
                                            //Miercoles
                                            $("#Fec_Miercoles").html(obj.Fec_Miercoles);
                                            $("#Miercoles").val(obj.Miercoles);
                                            //Jueves
                                            $("#Fec_Jueves").html(obj.Fec_Jueves);
                                            $("#Jueves").val(obj.Jueves);
                                            //Viernes
                                            $("#Fec_Viernes").html(obj.Fec_Viernes);
                                            $("#Viernes").val(obj.Viernes);
                                            //Sabado
                                            $("#Fec_Sabado").html(obj.Fec_Sabado);
                                            $("#Sabado").val(obj.Sabado);
                                            ActivarCampos();
                                        } else {
                                            Swal.fire(
                                                "Mensaje de advertencia",
                                                "Error: " + obj.msg,
                                                "error"
                                            );
                                        }
                                    }
                                });
                            }

                            function DesactivarCampos() {
                                document.getElementById("btn_guardar").disabled = true;
                                //Domingo
                                var v_dom = $("#Domingo").prop("disabled", true);
                                //Lunes
                                var v_lun = $("#Lunes").prop("disabled", true);
                                //Martes
                                var v_mar = $("#Martes").prop("disabled", true);
                                //Miercoles
                                var v_mie = $("#Miercoles").prop("disabled", true);
                                //Jueves
                                var v_jue = $("#Jueves").prop("disabled", true);
                                //Viernes
                                var v_vie = $("#Viernes").prop("disabled", true);
                                //Sabado
                                var v_sab = $("#Sabado").prop("disabled", true);
                            }

                            function ActivarCampos() {
                                document.getElementById("btn_guardar").disabled = false;
                                //Domingo
                                var v_dom = $("#Domingo").prop("disabled", false);
                                //Lunes
                                var v_lun = $("#Lunes").prop("disabled", false);
                                //Martes
                                var v_mar = $("#Martes").prop("disabled", false);
                                //Miercoles
                                var v_mie = $("#Miercoles").prop("disabled", false);
                                //Jueves
                                var v_jue = $("#Jueves").prop("disabled", false);
                                //Viernes
                                var v_vie = $("#Viernes").prop("disabled", false);
                                //Sabado
                                var v_sab = $("#Sabado").prop("disabled", false);

                            }

                            function RegistrarAsistencias() {
                                var formData = new FormData();

                                var f_fecha = $("#form_Fec").val();
                                var id_empleado = $("#FromEmpleado").val();
                                var nom_empleado = $("#nom_empleado").val();

                                //Domingo
                                if ($("#Domingo").val() == 0) {
                                    Swal.fire(
                                        "Mensaje de error",
                                        "Falta valor en campo domingo",
                                        "error"
                                    );
                                    return;
                                } else {
                                    var v_dom = $("#Domingo").val();
                                }

                                //Lunes
                                if ($("#Lunes").val() == 0) {
                                    Swal.fire(
                                        "Mensaje de error",
                                        "Falta valor en campo lunes",
                                        "error"
                                    );
                                    return;
                                } else {
                                    var v_lun = $("#Lunes").val();
                                }

                                //Martes
                                if ($("#Martes").val() == 0) {
                                    Swal.fire(
                                        "Mensaje de error",
                                        "Falta valor en campo martes",
                                        "error"
                                    );
                                    return;
                                } else {
                                    var v_mar = $("#Martes").val();
                                }

                                //Miercoles
                                if ($("#Miercoles").val() == 0) {
                                    Swal.fire(
                                        "Mensaje de error",
                                        "Falta valor en campo miercoles",
                                        "error"
                                    );
                                    return;
                                } else {
                                    var v_mie = $("#Miercoles").val();
                                }

                                //Jueves
                                if ($("#Jueves").val() == 0) {
                                    Swal.fire(
                                        "Mensaje de error",
                                        "Falta valor en campo jueves",
                                        "error"
                                    );
                                    return;
                                } else {
                                    var v_jue = $("#Jueves").val();
                                }

                                //Viernes
                                if ($("#Viernes").val() == 0) {
                                    Swal.fire(
                                        "Mensaje de error",
                                        "Falta valor en campo viernes",
                                        "error"
                                    );
                                    return;
                                } else {
                                    var v_vie = $("#Viernes").val();
                                }

                                //Sabado
                                if ($("#Sabado").val() == 0) {
                                    Swal.fire(
                                        "Mensaje de error",
                                        "Falta valor en campo sabado",
                                        "error"
                                    );
                                    return;
                                } else {
                                    var v_sab = $("#Sabado").val();
                                }

                                formData.append("f_fecha", f_fecha);
                                formData.append("id_empleado", id_empleado);
                                formData.append("nom_empleado", nom_empleado);
                                formData.append("v_dom", v_dom);
                                formData.append("v_lun", v_lun);
                                formData.append("v_mar", v_mar);
                                formData.append("v_mie", v_mie);
                                formData.append("v_jue", v_jue);
                                formData.append("v_vie", v_vie);
                                formData.append("v_sab", v_sab);

                                $.ajax({
                                    url: "assets/controler/semanal/upSemanal.php",
                                    type: "post",
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success: function(data) {

                                        console.log(data);
                                        var obj = JSON.parse(data);
                                        if (obj.status == "ok") {

                                            Swal.fire(
                                                "Mensaje de confirmación",
                                                "Correcto: " + obj.msg,
                                                "success"
                                            );
                                            DesactivarCampos();
                                            CargarAsistencias();
                                        } else {
                                            Swal.fire(
                                                "Mensaje de advertencia",
                                                "Error: " + obj.msg,
                                                "error"
                                            );
                                        }
                                    }
                                });
                            }
                        </script>


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