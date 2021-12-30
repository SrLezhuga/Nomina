<?php
include("../conexion.php");

$fecha = $_POST['f_fecha'];
$id = $_POST['id_empleado'];
$empelado = $_POST['nom_empleado'];
$dom = $_POST['v_dom'];
$lun = $_POST['v_lun'];
$mar = $_POST['v_mar'];
$mie = $_POST['v_mie'];
$jue = $_POST['v_jue'];
$vie = $_POST['v_vie'];
$sab = $_POST['v_sab'];

$data = array();

if (
    empty($fecha) || empty($id) || empty($empelado) || empty($dom) || empty($lun) || empty($mar) || empty($mie)
    || empty($jue) || empty($vie) || empty($sab)
) {
    $data['status'] = 'error';
    $data['msg'] = 'Uno o mas campos vacios';
} else {

    $date_obj = new DateTime($fecha); // Crear un objeto de fecha
    $num_day = $date_obj->format('w'); // 0-dom, 1-lun, ... 6-sab
    $date_obj->modify("-$num_day day"); // Posicionar el objeto en domingo
    $wdays = array();
    for ($i = 0; $i < 7; $i++) {
        $wdays[] = $date_obj->format('Y-m-d');
        $date_obj->modify('+1 day'); // Incrementar el objeto 1 dia
    }

    $f_dom = $wdays[0];
    $f_lun = $wdays[1];
    $f_mar = $wdays[2];
    $f_mie = $wdays[3];
    $f_jue = $wdays[4];
    $f_vie = $wdays[5];
    $f_sab = $wdays[6];


    $sql = "INSERT INTO tab_asistencia VALUES 
        ('$id','$f_dom','$empelado','$dom'),
        ('$id','$f_lun','$empelado','$lun'),
        ('$id','$f_mar','$empelado','$mar'),
        ('$id','$f_mie','$empelado','$mie'),
        ('$id','$f_jue','$empelado','$jue'),
        ('$id','$f_vie','$empelado','$vie'),
        ('$id','$f_sab','$empelado','$sab')
        ON DUPLICATE KEY UPDATE status = VALUES(status);";

    if (mysqli_query($con, $sql)) {
        $data['status'] = 'ok';
        $data['msg'] = 'Se registraron asistencias de ' . $empelado;
    }
}

echo json_encode($data);

// close connection

mysqli_close($con);
