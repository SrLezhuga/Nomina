<?php
session_start();
include("../conexion.php");

$id = $_POST['id'];

$items = explode("-", $id);
    $dia=$items[2];
    $mes=$items[1];
    $año=$items[0];
    
    switch ($mes) {
        case '01':
            $m="Enero";
            break;
        case '02':
            $m="Febrero";
            break;
        case '03':
            $m="Marzo";
            break;
        case '04':
            $m="Abril";
            break;
        case '05':
            $m="Mayo";
            break;
        case '06':
            $m="Junio";
            break;
         case '07':
            $m="Julio";
            break;
        case '08':
             $m="Agosto";
            break;        
        case '09':
            $m="Septiembre";
            break;
        case '10':
            $m="Octubre";
            break;
        case '11':
            $m="Noviembre";
            break;
        case '12':
            $m="Diciembre";
            break;
    }
    
    $fechaInicio =$dia . " de " . $m . " del " . $año;

    $query = "SELECT count(id_empleado) AS contador FROM tab_asistencia WHERE fecha = '" . $id."'";
    $resultSet = mysqli_query($con, $query) or die("Error de consulta");
    $item = mysqli_fetch_array($resultSet);
    if ($item['contador']==0) {

        $query = "SELECT id_empleado, concat(apellido_pat_empleado, ' ', apellido_mat_empleado, ' ', nombre_empleado) AS nom_empleado FROM tab_empleado WHERE status_empleado = 'ACTIVO'";
        $resultSet = mysqli_query($con, $query) or die("Error de consulta");
        echo "<br>";
        echo "<h4>".$fechaInicio."</h4>";
        echo "<center><h6>1 = Asistencia 2 = Doble Turno R= Retardo RR= Doble Retardo F=Falta M=Medio Turno</h6></center>";
        echo "
        <table class='table table-hover table-sm' id='tabla_asistencia'  width='100%' cellspacing='0'>
            <thead>    
                <tr>
                    <th>Id</th>
                    <th>Empleado</th>
                    <th>Asistencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id='tbody_tabla_asistencia'>
        ";
        while ($item = mysqli_fetch_array($resultSet)){
            
        echo "
            <tr>
                <td>" . $item['id_empleado'] . "</td>
                <td>" . $item['nom_empleado'] . "</td>
                <td>
                    <div class='input-group'>
                        <div class='input-group-prepend'>
                            <span class='input-group-text'><i class='fas fa-calendar-alt'></i></span>
                        </div>
                        <input type='text' class='form-control validar' placeholder='Asistencia' title='Asistencia' value='1' required>
                    </div>    
                </td> 
                <td><button type='button' class='btn btn-outline-light text-dark btn-sm BtnCliente' data-toggle='modal' data-target='#modalCliente'value=" . $item['id_empleado'] . ">
                <i class='fas fa-pencil-alt'></i></button></td>
            </tr>
        ";
        }
        echo "
            </tbody>
        </table>
        ";
    }else{

        $query = "SELECT * FROM tab_asistencia WHERE fecha = '" . $id."'";
        $resultSet = mysqli_query($con, $query) or die("Error de consulta");
        echo "<br>";
        echo "<h4>".$fechaInicio."</h4>";
        echo "<center><h6>1 = Asistencia 2 = Doble Turno R= Retardo RR= Doble Retardo F=Falta M=Medio Turno</h6></center>";
        echo "
        <table class='table table-hover table-sm' id='tabla_asistencia' width='100%' cellspacing='0'>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Empleado</th>
                    <th>Asistencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id='tbody_tabla_asistencia'>
        ";
        while ($item = mysqli_fetch_array($resultSet)){
            
        echo "
            <tr>
                <td>" . $item['id_empleado'] . "</td>
                <td>" . $item['nom_empleado'] . "</td>
                <td>
                    <div class='input-group'>
                        <div class='input-group-prepend'>
                            <span class='input-group-text'><i class='fas fa-calendar-alt'></i></span>
                        </div>
                        <input type='text' class='form-control validar' placeholder='Asistencia' title='Asistencia' value='" . $item['status'] . "' required>
                    </div>    
                </td> 
                <td><button type='button' class='btn btn-outline-light text-dark btn-sm BtnCliente' data-toggle='modal' data-target='#modalCliente'value=" . $item['id_empleado'] . ">
                <i class='fas fa-pencil-alt'></i></button></td>
            </tr>
        ";
        }
        echo "
            </tbody>
        </table>
        ";
          
    }     
?>