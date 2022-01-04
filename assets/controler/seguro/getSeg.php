<?php
session_start();
include("../conexion.php");
$id = $_GET['id'];

$query = "SELECT * FROM tab_seguro WHERE id_empleado = " . $id;
$resultSet = mysqli_query($con, $query) or die("Error de consulta");
$item = mysqli_fetch_array($resultSet);

echo '
        <!-- form Puesto -->
        <fieldset class="border p-2">
            <legend class="w-auto">Actualizar datos:</legend>
            <div class="row">

                <!--Campo Numero de Puesto -->
                <div class="col-2">
                    <label>Empleado:</label>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-hashtag"></i>
                            </span>
                        </div>
                        <input type="text" id="form_numero_empleado" name="form_numero_empleado"  class="form-control" placeholder="Empleado" value="' . $item['id_empleado'] . '" autocomplete="off" readonly="yes" required>
                    </div>
                </div>

                <!--Campo Unidad Medica Familiar -->
                <div class="col-3">
                    <label>Unidad Medica Familiar:</label>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-hospital-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Unidad Medica Familiar" value="' . $item['unidad_medica_familiar'] . '" name="form_umf" id="form_umf" required>
                    </div>
                </div>

                <!--Campo Número de Seguro -->
                <div class="col-3">
                    <label>Número de Seguro:</label>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-list-ol"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Número de Seguro" value="' . $item['sueldo_diario_imss'] . '" name="form_sueldo_diario" id="form_sueldo_diario" required>
                    </div>
                </div>

                <!--Campo sexo -->
                <div class="col-4">
                    <label>Sexo:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-question"></i>
                            </span>
                        </div>
                        <select id="form_status" name="form_status" class="custom-select form-control" required>';
                        if ($item['alta_imss'] == "VIGENTE") {
                            echo '
                                <option value="VIGENTE" selected>VIGENTE</option>
                                <option value="BAJA">BAJA</option>
                                <option value="TRAMITE">TRAMITE</option>
                            ';
                        } else if ($item['alta_imss'] == "BAJA") {
                            echo '
                                <option value="VIGENTE">VIGENTE</option>
                                <option value="BAJA" selected>BAJA</option>
                                <option value="TRAMITE">TRAMITE</option>
                            ';
                        } else {
                            echo '
                                <option value="VIGENTE">VIGENTE</option>
                                <option value="BAJA">BAJA</option>
                                <option value="TRAMITE" selected>TRAMITE</option>
                            ';
                        }
                        echo '
                        </select>
                    </div>
                </div>

            </div>
        </fieldset>
      
        ';


mysqli_close($con);
