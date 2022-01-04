<?php

     
include "conexion.php";

$user      = $_POST['formUser'];
$password  = $_POST['formPass'];
$user_id   = 0;

$encry=sha1($password);
$sql        =  "SELECT * FROM tab_login WHERE nom_user= '$user' AND pass_user = '$password'";
$query      =  $con->query($sql);
$rs         =  $query->fetch_array();
$user_id    =  $rs['id_user'];

if ($user_id == 0) {
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Nomina/index?alert=1");
} else {
    session_start();
    $_SESSION['code_user'] = $user_id;
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/Nomina/inicio");
}

mysqli_close($con);



?>