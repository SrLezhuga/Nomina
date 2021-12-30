<?php
session_start();
include("../conexion.php");
$id = $_GET['id'];

$query = "SELECT * FROM tab_empleado WHERE id_empleado = " . $id;
$resultSet = mysqli_query($con, $query) or die("Error de consulta");
$item = mysqli_fetch_array($resultSet);

echo '
        <!-- form empleado -->
        <fieldset class="border p-2">
            <legend class="w-auto">Datos del Empleado:</legend>
            <div class="row">

                <!--Campo Numero de Empleado -->
                <div class="col-4">
                    <label>Numero de Empleado:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >
                                <i class="fas fa-hashtag"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Numero de Empleado" id="form_numero_empleado" value="' . $item['id_empleado'] . '" autocomplete="off" readonly="yes" required>
                    </div>
                </div>

                <!--Campo apellido paterno -->
                <div class="col-4">
                    <label>Apellido paterno:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-user-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Apellido Paterno" id="form_apellido_paterno" value="' . $item['apellido_pat_empleado'] . '" autocomplete="off" required>
                    </div>
                </div>

                <!--Campo apellido materno -->
                <div class="col-4">
                    <label>Apellido materno:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-user-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Apellido materno" id="form_apellido_materno" value="' . $item['apellido_mat_empleado'] . '" autocomplete="off" required>
                    </div>
                </div>

                <!--Campo Nombres -->
                <div class="col-6">
                    <label>Nombres:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-user-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Nombres" id="form_nombres" value="' . $item['nombre_empleado'] . '" autocomplete="off" required>
                    </div>
                </div>

                <!--Campo Domicilio -->
                <div class="col-6">
                    <label>Domicilio:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-address-book"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Domicilio" id="form_domicilio" value="' . $item['domicilio_empleado'] . '" autocomplete="off" required>
                    </div>
                </div>

                <!--Campo Colonia -->
                <div class="col-3">
                    <label>Colonia:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-address-book"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Colonia" id="form_colonia" value="' . $item['colonia_empleado'] . '" autocomplete="off" required>
                    </div>
                </div>

                <!--Campo Codigo postal -->
                <div class="col-3">
                    <label>Codigo postal:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Codigo postal" id="form_codigo_postal" value="' . $item['codigo_postal_empleado'] . '" autocomplete="off" required>
                    </div>
                </div>

                <!--Campo Ciudad -->
                <div class="col-3">
                    <label>Ciudad:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Ciudad" id="form_ciudad" value="' . $item['ciudad_empleado'] . '" autocomplete="off" required>
                    </div>
                </div>

                <!--Campo Estado -->
                <div class="col-3">
                    <label>Estado:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Estado" id="form_estado" value="' . $item['estado_empleado'] . '" autocomplete="off" required>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset class="border p-2">
            <legend class="w-auto">Id Nacionales:</legend>
            <div class="row">


                <!--Campo NSS -->
                <div class="col-4">
                    <label>NSS:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-id-card-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="NSS" id="form_NSS" value="' . $item['NSS_empleado'] . '" autocomplete="off" required>
                    </div>
                </div>

                <!--Campo RFC -->
                <div class="col-4">
                    <label>RFC:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-id-card-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="RFC" id="form_RFC" value="' . $item['RFC_empleado'] . '" autocomplete="off" required>
                    </div>
                </div>

                <!--Campo CURP -->
                <div class="col-4">
                    <label>CURP:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-id-card-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="CURP" id="form_CURP" value="' . $item['CURP_empleado'] . '" autocomplete="off" required>
                    </div>
                </div>
            </div>

        </fieldset>
        <fieldset class="border p-2">
            <legend class="w-auto">Datos de Nacimiento:</legend>
            <div class="row">

                <!--Campo sexo -->
                <div class="col-4">
                    <label>Sexo:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-restroom"></i>
                            </span>
                        </div>
                        <select id="form_sexo" class="custom-select" required>';
                        if ($item['sexo_empleado'] == "Masculino") {
                            echo '
                                <option value="Masculino" selected>Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otro">Otro</option>
                            ';
                        } else if ($item['sexo_empleado'] == "Femenino") {
                            echo '
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino" selected>Femenino</option>
                                <option value="Otro">Otro</option>
                            ';
                        } else {
                            echo '
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otro" selected>Otro</option>
                            ';
                        }
                            echo '
                        </select>
                    </div>
                </div>

                <!--Campo fecha nacimiento -->
                <div class="col-4">
                    <label>Fecha nacimiento:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input type="date" class="form-control" placeholder="fecha nacimiento" id="form_fecha_nacimiento" value="' . $item['fecha_nacimiento_empleado'] . '" required>
                    </div>
                </div>

                <!--Campo pais nacimiento -->
                <div class="col-4">
                    <label>Pais nacimiento:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-map"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Pais nacimiento" id="form_pais_nacimiento" value="' . $item['pais_nacimiento_empleado'] . '" autocomplete="off" required>
                    </div>
                </div>

                <!--Campo estado nacimiento -->
                <div class="col-4">
                    <label>Estado nacimiento:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-map"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Estado nacimiento" id="form_estado_nacimiento" value="' . $item['estado_nacimiento_empleado'] . '" autocomplete="off" required>
                    </div>
                </div>

                <!--Campo ciudad nacimiento -->
                <div class="col-4">
                    <label>Ciudad nacimiento:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-map"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Ciudad nacimiento" id="form_ciudad_nacimiento" value="' . $item['ciudad_nacimiento_empleado'] . '" autocomplete="off" required>
                    </div>
                </div>

                <!--Campo Estado civil -->
                <div class="col-4">
                    <label>Estado civil:</label>
                    <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-house-user"></i>
                            </span>
                        </div>
                        <select id="form_estado_civil" class="custom-select"  required>';
                        if ($item['estado_civil_empleado'] == "Soltero-Soltera") {
                            echo '
                            <option value="Soltero-Soltera" selected>Soltero / Soltera</option>
                            <option value="Casado-Casada">Casado / Casada</option>
                            <option value="Divorciado-Divorciado">Divorciado / Divorciada</option>
                            <option value="Viudo-Viudo">Viudo / Viuda </option>
                            <option value="Concubinato">Concubinato</option>
                            <option value="Otro">Otro</option>
                                ';
                        } else if ($item['estado_civil_empleado'] == "Casado-Casada") {
                            echo '
                            <option value="Soltero-Soltera">Soltero / Soltera</option>
                            <option value="Casado-Casada" selected>Casado / Casada</option>
                            <option value="Divorciado-Divorciado">Divorciado / Divorciada</option>
                            <option value="Viudo-Viudo">Viudo / Viuda </option>
                            <option value="Concubinato">Concubinato</option>
                            <option value="Otro">Otro</option>
                                ';
                        } else if ($item['estado_civil_empleado'] == "Divorciado-Divorciado") {
                            echo '
                            <option value="Soltero-Soltera">Soltero / Soltera</option>
                            <option value="Casado-Casada">Casado / Casada</option>
                            <option value="Divorciado-Divorciado" selected>Divorciado / Divorciada</option>
                            <option value="Viudo-Viudo">Viudo / Viuda </option>
                            <option value="Concubinato">Concubinato</option>
                            <option value="Otro">Otro</option>
                                ';
                        } else if ($item['estado_civil_empleado'] == "Viudo-Viudo") {
                            echo '
                            <option value="Soltero-Soltera">Soltero / Soltera</option>
                            <option value="Casado-Casada">Casado / Casada</option>
                            <option value="Divorciado-Divorciado">Divorciado / Divorciada</option>
                            <option value="Viudo-Viudo" selected>Viudo / Viuda </option>
                            <option value="Concubinato">Concubinato</option>
                            <option value="Otro">Otro</option>
                                ';
                        } else if ($item['estado_civil_empleado'] == "Concubinato") {
                            echo '
                            <option value="Soltero-Soltera">Soltero / Soltera</option>
                            <option value="Casado-Casada">Casado / Casada</option>
                            <option value="Divorciado-Divorciado">Divorciado / Divorciada</option>
                            <option value="Viudo-Viudo">Viudo / Viuda </option>
                            <option value="Concubinato" selected>Concubinato</option>
                            <option value="Otro">Otro</option>
                                ';
                        } else if ($item['estado_civil_empleado'] == "Otro") {
                            echo '
                            <option value="Soltero-Soltera">Soltero / Soltera</option>
                            <option value="Casado-Casada">Casado / Casada</option>
                            <option value="Divorciado-Divorciado">Divorciado / Divorciada</option>
                            <option value="Viudo-Viudo">Viudo / Viuda </option>
                            <option value="Concubinato">Concubinato</option>
                            <option value="Otro" selected>Otro</option>
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
