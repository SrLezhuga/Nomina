<?php
include("../conexion.php"); 

$fecha = $_POST['Fec'];
$id_emp = $_POST['Ide'];

$data = array();

if (empty($fecha)) {
    $data['status'] = 'error';
    $data['msg'] = 'Selecciona una fecha';
} else if (empty($id_emp)) {
    $data['status'] = 'error';
    $data['msg'] = 'Selecciona un empleado';
} else {


    $date_obj = new DateTime($fecha); // Crear un objeto de fecha
    $num_day = $date_obj->format('w'); // 0-dom, 1-lun, ... 6-sab
    $date_obj->modify("-$num_day day"); // Posicionar el objeto en domingo
    $wdays = array();
    for ($i = 0; $i < 7; $i++) {
        $wdays[] = $date_obj->format('Y-m-d');
        $date_obj->modify('+1 day'); // Incrementar el objeto 1 dia
    }

    //query datos
    $queryEmpleado = "SELECT DISTINCT id_empleado, nom_empleado FROM tab_asistencia WHERE id_empleado = '$id_emp'";
    $rsEmpleado = mysqli_query($con, $queryEmpleado) or die(mysqli_error($con));
    $Empleado = mysqli_fetch_array($rsEmpleado);
    $nom_empleado = $Empleado['nom_empleado'];

    //query domingo
    $queryDom = "SELECT status AS Dom FROM tab_asistencia WHERE id_empleado = '" . $id_emp . "' AND fecha = '" . $wdays[0] . "';";
    $rsDom = mysqli_query($con, $queryDom) or die("Error de consulta");
    $Dom = mysqli_fetch_array($rsDom);
    if (empty($Dom['Dom'])) {
        $Domingo = '0';
    } else {
        $Domingo = $Dom['Dom'];
    }
    $Fec_Domingo = $wdays[0];

    //query lunes
    $queryLun = "SELECT status AS Lun FROM tab_asistencia WHERE id_empleado = '" . $id_emp . "' AND fecha = '" . $wdays[1] . "';";
    $rsLun = mysqli_query($con, $queryLun) or die("Error de consulta");
    $Lun = mysqli_fetch_array($rsLun);
    if (empty($Lun['Lun'])) {
        $Lunes = '0';
    } else {
        $Lunes = $Lun['Lun'];
    }
    $Fec_Lunes = $wdays[1];

    //query martes
    $queryMar = "SELECT status AS Mar FROM tab_asistencia WHERE id_empleado = '" . $id_emp . "' AND fecha = '" . $wdays[2] . "';";
    $rsMar = mysqli_query($con, $queryMar) or die("Error de consulta");
    $Mar = mysqli_fetch_array($rsMar);
    if (empty($Mar['Mar'])) {
        $Martes = '0';
    } else {
        $Martes = $Mar['Mar'];
    }
    $Fec_Martes = $wdays[2];

    //query miercoles
    $queryMie = "SELECT status AS Mie FROM tab_asistencia WHERE id_empleado = '" . $id_emp . "' AND fecha = '" . $wdays[3] . "';";
    $rsMie = mysqli_query($con, $queryMie) or die("Error de consulta");
    $Mie = mysqli_fetch_array($rsMie);
    if (empty($Mie['Mie'])) {
        $Miercoles = '0';
    } else {
        $Miercoles = $Mie['Mie'];
    }
    $Fec_Miercoles = $wdays[3];

    //query jueves
    $queryJue = "SELECT status AS Jue FROM tab_asistencia WHERE id_empleado = '" . $id_emp . "' AND fecha = '" . $wdays[4] . "';";
    $rsJue = mysqli_query($con, $queryJue) or die("Error de consulta");
    $Jue = mysqli_fetch_array($rsJue);
    if (empty($Jue['Jue'])) {
        $Jueves = '0';
    } else {
        $Jueves = $Jue['Jue'];
    }
    $Fec_Jueves = $wdays[4];

    //query viernes
    $queryVie = "SELECT status AS Vie FROM tab_asistencia WHERE id_empleado = '" . $id_emp . "' AND fecha = '" . $wdays[5] . "';";
    $rsVie = mysqli_query($con, $queryVie) or die("Error de consulta");
    $Vie = mysqli_fetch_array($rsVie);
    if (empty($Vie['Vie'])) {
        $Viernes = '0';
    } else {
        $Viernes = $Vie['Vie'];
    }
    $Fec_Viernes = $wdays[5];

    //query sabado
    $querySab = "SELECT status AS Sab FROM tab_asistencia WHERE id_empleado = '" . $id_emp . "' AND fecha = '" . $wdays[6] . "';";
    $rsSab = mysqli_query($con, $querySab) or die("Error de consulta");
    $Sab = mysqli_fetch_array($rsSab);
    if (empty($Sab['Sab'])) {
        $Sabado = '0';
    } else {
        $Sabado = $Sab['Sab'];
    }
    $Fec_Sabado = $wdays[6];

    //array
    $data['status'] = 'ok';
    $data['fec_ini'] = $wdays[0];
    $data['fec_fin'] = $wdays[6];
    $data['id_empleado'] = $id_emp;
    $data['nom_empleado'] = $nom_empleado;
    //Domingo
    $data['Domingo'] = $Domingo;
    $data['Fec_Domingo'] = $Fec_Domingo;
    //Lunes
    $data['Lunes'] = $Lunes;
    $data['Fec_Lunes'] = $Fec_Lunes;
    //Martes
    $data['Martes'] = $Martes;
    $data['Fec_Martes'] = $Fec_Martes;
    //Miercoles
    $data['Miercoles'] = $Miercoles;
    $data['Fec_Miercoles'] = $Fec_Miercoles;
    //Jueves
    $data['Jueves'] = $Jueves;
    $data['Fec_Jueves'] = $Fec_Jueves;
    //Viernes
    $data['Viernes'] = $Viernes;
    $data['Fec_Viernes'] = $Fec_Viernes;
    //Sabado
    $data['Sabado'] = $Sabado;
    $data['Fec_Sabado'] = $Fec_Sabado;
}

//returns data as JSON format
echo json_encode($data);
