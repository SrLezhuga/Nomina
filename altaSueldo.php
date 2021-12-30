<?php
include("assets/controler/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> Nómina  | Alta Sueldo</title>
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


                <div class="card border-left-pink shadow-lg mb-5 mt-5 ">
                    <div class="card-body">
                        <h1>
                            <center>Sueldo del Empleados</center>
                        </h1>
                        <form class="form" id="cleanForm" action="assets/controler/sueldo/altaSueldo.php" method="POST">

                            <!-- form sueldo -->
                            <fieldset class='border p-2'>
                                <legend class='w-auto'>Datos del sueldo:</legend>
                                <div class="row">

                                    <!--Campo Numero de Empleado -->
                                    <div class="col-3">
                                        <label>Numero de Empleado:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-hashtag"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Numero de Empleado" name="form_numero_empleado" required>
                                        </div>
                                    </div>

                                    <!--Campo Sueldo -->
                                    <div class="col-4">
                                        <label>Sueldo:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-dollar-sign"></i>
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="Sueldo" id="sueldo" onblur="FxSueldo()" name="form_sueldo" required>
                                        </div>
                                    </div>

                                    <!--Campo Sueldo Diario -->
                                    <div class="col-5">
                                        <label>Sueldo Diario:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-money-bill"></i>
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="Sueldo Diario" id="diario" name="form_sueldo_diario" required readonly style="background-color: white;">
                                        </div>
                                    </div>

                                    <!--Campo Fiscal -->
                                    <div class="col-4">
                                        <label>Fiscal:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-money-check-alt"></i>
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="Fiscal" id="fiscal" step="any" onblur="FxComplemento()" name="form_fiscal" required>
                                        </div>
                                    </div>

                                    <!--Campo Complemento -->
                                    <div class="col-4">
                                        <label>Complemento:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-file-invoice-dollar"></i>
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="Complemento" id="complemento" name="form_complemento" required readonly style="background-color: white;">
                                        </div>
                                    </div>

                                    <!--Campo Numero de Cuenta -->
                                    <div class="col-4">
                                        <label>Numero de Cuenta:</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-credit-card"></i>
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="Numero de Cuenta" name="form_num_cuenta" value="0" required>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>
                            <fieldset class='border p-2'>
                                <legend class='w-auto'>Acciones:</legend>

                                <div class="row">
                                    <div class="col-6">
                                        <button type="button" onClick=clean() class="btn btn-outline-secondary btn-block"><i class="fas fa-eraser"></i> Borrar</button>
                                    </div>
                                    <br>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-outline-pink btn-block"><i class="fas fa-user-plus"></i> Asignar Sueldo</button>
                                    </div>
                                </div>

                                <!--/. form-->
                            </fieldset>
                        </form>

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

    <script>
        function redondearDecimales(numero, decimales) {
            numeroRegexp = new RegExp('\\d\\.(\\d){' + decimales + ',}'); // Expresion regular para numeros con un cierto numero de decimales o mas
            if (numeroRegexp.test(numero)) { // Ya que el numero tiene el numero de decimales requeridos o mas, se realiza el redondeo
                return Number(numero.toFixed(decimales));
            } else {
                return Number(numero.toFixed(decimales)) === 0 ? 0 : numero; // En valores muy bajos, se comprueba si el numero es 0 (con el redondeo deseado), si no lo es se devuelve el numero otra vez.
            }
        }

        function FxSueldo() {

            var sueldo = document.getElementById("sueldo").value;

            var diario = sueldo / 7;

            diario = redondearDecimales(diario, 2);

            document.getElementById("diario").value = diario;
        }

        function FxComplemento() {

            var fiscal = document.getElementById("fiscal").value;

            var sueldo = document.getElementById("sueldo").value;

            var complemento = sueldo - fiscal;

            complemento = redondearDecimales(complemento, 2);

            document.getElementById("complemento").value = complemento;
        }
    </script>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Alerts! -->
    <?php if (isset($_GET['alert']) && $_GET['alert'] == 0) { ?>
        <script>
            Swal.fire(
                "Mensaje de confirmación",
                "Se registró el sueldo",
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
    </script>

</body>

</html>