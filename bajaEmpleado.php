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
    <title> Nómina  | Baja Empleado</title>
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
                            <center>Baja de Empleados</center>
                        </h1>
                        <!-- form Puesto -->
                        <fieldset class='border p-2'>
                            <legend class='w-auto'>Empleado:</legend>
                            <div class="row">
                                <!--Campo Empleado -->
                                <div class="col-12">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                        <select name="FromEmpleado" id="FromEmpleado" class="mi-selector custom-select" onchange="getEmpleado();">
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
                            <legend class='w-auto'>Datos de la Baja:</legend>
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
                                        <input type="text" class="form-control" placeholder="Numero de Empleado" name="num_empleado" id="num_empleado" value="">
                                    </div>
                                </div>

                                <!--Campo Fecha -->
                                <div class="col-4">
                                    <label>Fecha de Baja:</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="date" class="form-control" value="<?php echo date('Y-m-d', strtotime("now")); ?>" name="fecha_emp" id="fecha_emp">
                                    </div>
                                </div>

                                <!--Campo Status -->
                                <div class="col-5">
                                    <label>Status:</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user-tag"></i>
                                            </span>
                                        </div>
                                        <select id="status_emp" class="custom-select" required>
                                            <option value="ACTIVO">Activo</option>
                                            <option value="BAJA">Baja</option>
                                        </select>
                                    </div>
                                </div>

                                <!--Campo Motivo de baja -->
                                <div class="col-12">
                                    <label>Motivo de baja:</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <textarea placeholder="Descripción de la baja" class="form-control" id="motivo_emp" rows="3"></textarea>
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
                                    <button type="button" onclick="guardarDatos()" class="btn btn-outline-pink btn-block" id="btn_bajar" disabled><i class="fas fa-user-plus"></i> Guardar Datos</button>
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
            $("#num_empleado").val("");
            $("#fecha_emp").val("");
            $("#status_emp").prop('selectedIndex', 0);
            $("#motivo_emp").val("");
            document.getElementById("btn_bajar").disabled = true;
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
        function getEmpleado() {
            var id_empleado = $("#FromEmpleado").val();

            $.ajax({
                url: "assets/controler/baja/precarga.php",
                type: "post",
                data: {
                    Ide: id_empleado
                },
                success: function(data) {
                    var obj = JSON.parse(data);
                    if (obj.status == "ok") {
                        $("#num_empleado").val(obj.id_emp);
                        $("#fecha_emp").val(obj.fecha_emp);
                        $("#status_emp").val(obj.status_emp);
                        $("#motivo_emp").val(obj.motivo_emp);
                        document.getElementById("btn_bajar").disabled = false;
                        document.getElementById("btn_clean").disabled = false;
                    } else {
                        alert(data);
                    }
                }
            });
        }

        function guardarDatos() {
            var num_empleado = $("#num_empleado").val();
            var fecha_emp = $("#fecha_emp").val();
            var status_emp = $("#status_emp").val();
            var motivo_emp = $("#motivo_emp").val();


            $.ajax({
                url: "assets/controler/baja/carga.php",
                type: "post",
                data: {
                    Num_emp: num_empleado,
                    Fec_emp: fecha_emp,
                    Sta_emp: status_emp,
                    Mot_emp: motivo_emp
                },
                success: function(data) {
                    if (data == 0) {
                        Swal.fire(
                            "Mensaje de confirmación",
                            "Se actualizaron los datos del empleado.",
                            "success"
                        );
                        getEmpleado();
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