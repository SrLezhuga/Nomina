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
    <title> Nómina | Alta Puesto</title>
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
                            <center>Puesto del Empleados</center>
                        </h1>
                        <!-- form Puesto -->
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Empleado:</legend>
                            <div class="row">
                                <!--Campo Empleado -->
                                <div class="col-12">
                                    <label>Empleado:</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                        <select name="FromEmpleado" id="FromEmpleado" class="mi-selector custom-select" onchange="getPuesto();">
                                            <option value="0" selected disabled>Seleccione datos del empleado</option>
                                            <?php $listEmp = "SELECT id_empleado, concat(apellido_pat_empleado, ' ', apellido_mat_empleado, ' ', nombre_empleado) as nombre, status_empleado FROM nomina.tab_empleado ORDER BY apellido_pat_empleado ASC";
                                            $rsEmp = mysqli_query($con, $listEmp) or die("Error de consulta");
                                            while ($itemEmp = mysqli_fetch_array($rsEmp)) {
                                                echo "<option value='" . $itemEmp['id_empleado'] . "'>" . $itemEmp['id_empleado'] . " | " . $itemEmp['nombre'] .  "</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <!-- form Puesto -->
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Datos del Puesto:</legend>
                            <div class="row">

                                <!--Campo Numero de Puesto -->
                                <div class="col-3">
                                    <label>Numero de Empleado:</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-hashtag"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Numero de Empleado" name="num_empleado" id="num_empleado" readonly="yes" value="">
                                    </div>
                                </div>

                                <!--Campo Puesto -->
                                <div class="col-4">
                                    <label>Puesto:</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-portrait"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Puesto" name="puesto_emp" id="puesto_emp" value="">
                                    </div>
                                </div>

                                <!--Campo Nombre Supervisor -->
                                <div class="col-5">
                                    <label>Nombre Supervisor:</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-friends"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nombre Supervisor" name="nom_supervisor" id="nom_supervisor" value="">
                                    </div>
                                </div>

                                <!--Campo Fecha Contrato -->
                                <div class="col-4">
                                    <label>Fecha Contrato:</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="date" class="form-control" placeholder="Fecha Contrato" name="fecha_contrato" id="fecha_contrato" value="">
                                    </div>
                                </div>

                                <!--Campo Fecha Termino -->
                                <div class="col-4">
                                    <label>Fecha Termino:</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="date" class="form-control" placeholder="Fecha Termino" name="fecha_fin_contrato" id="fecha_fin_contrato" value="">
                                    </div>
                                </div>

                                <!--Campo Nuevo Contrato -->
                                <div class="col-4">
                                    <label>Nuevo Contrato:</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="date" class="form-control" placeholder="Nuevo Contrato" name="nuevo_contrato" id="nuevo_contrato" value="">
                                    </div>
                                </div>

                                <!--Campo Edificio/Agencia -->

                                <div class="col-6">
                                    <label>Edificio/Agencia:</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-city"></i>
                                            </span>
                                        </div>
                                        <select name="edificio_agencia" id="edificio_agencia" class="custom-select" required>
                                            <option value="0" selected disabled>Selecciona Cedis</option>
                                            <option value="ESCUELA NORMAL RURAL MIGUEL HIDALGO">ESCUELA NORMAL RURAL MIGUEL HIDALGO</option>
                                        </select>
                                    </div>
                                </div>

                                <!--Campo Turno -->
                                <div class="col-3">
                                    <label>Turno:</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </span>
                                        </div>
                                        <select name="turno" id="turno" class="custom-select">
                                            <option value="" disabled selected>Sin asignar</option>
                                            <option value="Completo">Completo</option>
                                            <option value="Medio Turno">Medio Turno</option>
                                        </select>
                                    </div>
                                </div>

                                <!--Campo Status -->
                                <div class="col-3">
                                    <label>Status:</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-tag"></i>
                                            </span>
                                        </div>
                                        <select name="status_emp" id="status_emp" class="custom-select">
                                            <option value="" disabled selected>Sin asignar</option>
                                            <option value="Completo">Prueba</option>
                                            <option value="Medio Turno">Planta</option>
                                            <option value="Indeterminado">Indeterminado</option>
                                        </select>
                                    </div>
                                </div>
                                


                            </div>
                        </fieldset>
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Acciones:</legend>

                            <div class="row">
                                <div class="col-6">
                                    <button type="button" onclick="clean()" class="btn btn-outline-secondary btn-block" id="btn_clean" disabled><i class="fas fa-eraser"></i> Borrar</button>
                                </div>
                                <br>
                                <div class="col-6">
                                    <button type="button" onclick="guardarDatos()" class="btn btn-outline-pink btn-block" id="btn_asignar" disabled><i class="fas fa-user-plus"></i> Guardar Datos</button>
                                </div>
                            </div>
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
                "Se registró el puesto",
                "success"
            );
        </script>
    <?php } ?>
    <script>
        //Limpiar formularios
        function clean() {
            $("#FromEmpleado").prop('selectedIndex', 1);
            $("#num_empleado").val("Sin asignar");
            $("#puesto_emp").val("Sin asignar");
            $("#nom_supervisor").val("Sin asignar");
            $("#fecha_contrato").val("");
            $("#fecha_fin_contrato").val("");
            $("#edificio_agencia").val("Sin asignar");
            $("#turno").prop('selectedIndex', 0);
            $("#status_emp").val("Sin asignar");
            $("#nuevo_contrato").val("");
            document.getElementById("btn_asignar").disabled = true;
            document.getElementById("btn_clean").disabled = true;
            Swal.fire(
                "Mensaje de confirmación",
                "Formulario vacío",
                "success"
            );
        }
    </script>

    <script>
        jQuery(document).ready(function($) {
            $(document).ready(function() {
                $('.mi-selector').select2();
            });
        });
    </script>

    <script>
        function getPuesto() {
            var id_empleado = $("#FromEmpleado").val();

            $.ajax({
                url: "assets/controler/puesto/precarga.php",
                type: "post",
                data: {
                    Ide: id_empleado
                },
                success: function(data) {
                    var obj = JSON.parse(data);
                    if (obj.status == "ok") {
                        $("#num_empleado").val(obj.id_emp);
                        $("#puesto_emp").val(obj.puesto);
                        $("#nom_supervisor").val(obj.nombre_supervisor);
                        $("#fecha_contrato").val(obj.fecha_contrato);
                        $("#fecha_fin_contrato").val(obj.fecha_fin_contrato);
                        $("#edificio_agencia").val(obj.edificio_agencia);
                        $("#turno").val(obj.turno);
                        $("#status_emp").val(obj.status_emp);
                        $("#nuevo_contrato").val(obj.nuevo_contrato);
                        document.getElementById("btn_asignar").disabled = false;
                        document.getElementById("btn_clean").disabled = false;
                    } else {
                        alert(data);
                    }
                }
            });
        }

        function guardarDatos() {
            var num_empleado = $("#num_empleado").val();
            var puesto_emp = $("#puesto_emp").val();
            var nom_supervisor = $("#nom_supervisor").val();
            var fecha_contrato = $("#fecha_contrato").val();
            var fecha_fin_contrato = $("#fecha_fin_contrato").val();
            var edificio_agencia = $("#edificio_agencia").val();
            var turno = $("#turno").val();
            var status_emp = $("#status_emp").val();
            var nuevo_contrato = $("#nuevo_contrato").val();


            $.ajax({
                url: "assets/controler/puesto/carga.php",
                type: "post",
                data: {
                    Num_emp: num_empleado,
                    Pue_emp: puesto_emp,
                    Sup_emp: nom_supervisor,
                    Fec_emp: fecha_contrato,
                    Fin_emp: fecha_fin_contrato,
                    Edi_emp: edificio_agencia,
                    Tur_emp: turno,
                    Sta_emp: status_emp,
                    Nue_emp: nuevo_contrato
                },
                success: function(data) {
                    if (data == 0) {
                        Swal.fire(
                            "Mensaje de confirmación",
                            "Se actualizaron los datos del empleado.",
                            "success"
                        );
                        getPuesto();
                    } else {
                        Swal.fire(
                            "Mensaje de confirmación",
                            "Error:" + data,
                            "error"
                        );
                    }
                }
            });
        }
    </script>

</body>

</html>