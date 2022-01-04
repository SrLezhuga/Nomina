<?php
session_start();
include("../conexion.php");


$empleado = $_GET['id'];

$item_exp = explode("|", $empleado);

$item_exp[0];
$item_exp[1];


$query = "SELECT * FROM tab_asistencia WHERE status = 'F' AND id_empleado = '" . $item_exp[0] . "' AND fecha = '" . $item_exp[1] . "'";
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

                <!--Campo Empleado -->
                <div class="col-10">
                    <label>Empleado:</label>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-hospital-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Fecha Incidencia" value="' . $item['nom_empleado'] . '" name="form_nom_empleado" id="form_nom_empleado" readonly="yes" required>
                    </div>
                </div>

                <!--Campo Fecha Incidencia -->
                <div class="col-4">
                    <label>Fecha Incidencia:</label>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-hospital-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Fecha Incidencia" value="' . $item['fecha'] . '" name="form_fecha" id="form_fecha" readonly="yes" required>
                    </div>
                </div>

                <!--Campo Motivo -->
                <div class="col-8">
                    <label>Motivo:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-question"></i>
                            </span>
                        </div>
                        <select id="form_status" name="form_status" class="custom-select form-control" required>';
if ($item['motivo'] == "Sin justificar") {
    echo '
                                <option value="Sin justificar" selected>Sin justificar</option>
                                <option value="Permiso Sin Goce">Permiso Sin Goce</option>
                                <option value="Permiso Con Goce">Permiso Con Goce</option>
                                <option value="Enfermedad General">Enfermedad General</option>
                                <option value="Incapacidad">Incapacidad</option>
                                <option value="Otro">Otro</option>
                            ';
} else if ($item['motivo'] == "Permiso Sin Goce") {
    echo '
                                <option value="Sin justificar">Sin justificar</option>
                                <option value="Permiso Sin Goce" selected>Permiso Sin Goce</option>
                                <option value="Permiso Con Goce">Permiso Con Goce</option>
                                <option value="Enfermedad General">Enfermedad General</option>
                                <option value="Incapacidad">Incapacidad</option>
                                <option value="Otro">Otro</option>
                            ';
} else if ($item['motivo'] == "Permiso Con Goce") {
    echo '
                                <option value="Sin justificar">Sin justificar</option>
                                <option value="Permiso Sin Goce">Permiso Sin Goce</option>
                                <option value="Permiso Con Goce" selected>Permiso Con Goce</option>
                                <option value="Enfermedad General">Enfermedad General</option>
                                <option value="Incapacidad">Incapacidad</option>
                                <option value="Otro">Otro</option>
                            ';
} else if ($item['motivo'] == "Enfermedad General") {
    echo '
                                <option value="Sin justificar">Sin justificar</option>
                                <option value="Permiso Sin Goce">Permiso Sin Goce</option>
                                <option value="Permiso Con Goce">Permiso Con Goce</option>
                                <option value="Enfermedad General" selected>Enfermedad General</option>
                                <option value="Incapacidad">Incapacidad</option>
                                <option value="Otro">Otro</option>
                            ';
} else if ($item['motivo'] == "Incapacidad") {
    echo '
                                <option value="Sin justificar">Sin justificar</option>
                                <option value="Permiso Sin Goce">Permiso Sin Goce</option>
                                <option value="Permiso Con Goce">Permiso Con Goce</option>
                                <option value="Enfermedad General">Enfermedad General</option>
                                <option value="Incapacidad" selected>Incapacidad</option>
                                <option value="Otro">Otro</option>
                            ';
} else {
    echo '
                                <option value="Sin justificar">Sin justificar</option>
                                <option value="Permiso Sin Goce">Permiso Sin Goce</option>
                                <option value="Permiso Con Goce">Permiso Con Goce</option>
                                <option value="Enfermedad General">Enfermedad General</option>
                                <option value="Incapacidad">Incapacidad</option>
                                <option value="Otro" selected>Otro</option>
                            ';
}
echo '
                        </select>
                    </div>
                </div>

                <!--Campo Comentario -->
                <div class="col-12">
                    <label>Comentario:</label>
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-list-ol"></i>
                            </span>
                        </div>
                        <textarea class="form-control" name="form_comentario" id="form_comentario" rows="3" placeholder="Comentarios" value="' . $item['sueldo_diario_imss'] . '" required></textarea>

                    </div>
                </div>

            </div>
        </fieldset>
      
        ';


mysqli_close($con);
