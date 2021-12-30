<?php
//Ene
$sqlEne = "SELECT id_empleado, apellido_pat_empleado, apellido_mat_empleado, nombre_empleado, sexo_empleado, fecha_nacimiento_empleado
FROM nomina.tab_empleado
WHERE MONTH(fecha_nacimiento_empleado) = '01'";
$rsEne = mysqli_query($con, $sqlEne) or die(mysqli_error($con));

//Feb
$sqlFeb = "SELECT id_empleado, apellido_pat_empleado, apellido_mat_empleado, nombre_empleado, sexo_empleado, fecha_nacimiento_empleado
FROM nomina.tab_empleado
WHERE MONTH(fecha_nacimiento_empleado) = '02'";
$rsFeb = mysqli_query($con, $sqlFeb) or die(mysqli_error($con));

//Mar
$sqlMar = "SELECT id_empleado, apellido_pat_empleado, apellido_mat_empleado, nombre_empleado, sexo_empleado, fecha_nacimiento_empleado
FROM nomina.tab_empleado
WHERE MONTH(fecha_nacimiento_empleado) = '03'";
$rsMar = mysqli_query($con, $sqlMar) or die(mysqli_error($con));

//Abr
$sqlAbr = "SELECT id_empleado, apellido_pat_empleado, apellido_mat_empleado, nombre_empleado, sexo_empleado, fecha_nacimiento_empleado
FROM nomina.tab_empleado
WHERE MONTH(fecha_nacimiento_empleado) = '04'";
$rsAbr = mysqli_query($con, $sqlAbr) or die(mysqli_error($con));

//May
$sqlMay = "SELECT id_empleado, apellido_pat_empleado, apellido_mat_empleado, nombre_empleado, sexo_empleado, fecha_nacimiento_empleado
FROM nomina.tab_empleado
WHERE MONTH(fecha_nacimiento_empleado) = '05'";
$rsMay = mysqli_query($con, $sqlMay) or die(mysqli_error($con));

//Jun
$sqlJun = "SELECT id_empleado, apellido_pat_empleado, apellido_mat_empleado, nombre_empleado, sexo_empleado, fecha_nacimiento_empleado
FROM nomina.tab_empleado
WHERE MONTH(fecha_nacimiento_empleado) = '06'";
$rsJun = mysqli_query($con, $sqlJun) or die(mysqli_error($con));

//Jul
$sqlJul = "SELECT id_empleado, apellido_pat_empleado, apellido_mat_empleado, nombre_empleado, sexo_empleado, fecha_nacimiento_empleado
FROM nomina.tab_empleado
WHERE MONTH(fecha_nacimiento_empleado) = '07'";
$rsJul = mysqli_query($con, $sqlJul) or die(mysqli_error($con));

//Ago
$sqlAgo = "SELECT id_empleado, apellido_pat_empleado, apellido_mat_empleado, nombre_empleado, sexo_empleado, fecha_nacimiento_empleado
FROM nomina.tab_empleado
WHERE MONTH(fecha_nacimiento_empleado) = '08'";
$rsAgo = mysqli_query($con, $sqlAgo) or die(mysqli_error($con));

//Sep
$sqlSep = "SELECT id_empleado, apellido_pat_empleado, apellido_mat_empleado, nombre_empleado, sexo_empleado, fecha_nacimiento_empleado
FROM nomina.tab_empleado
WHERE MONTH(fecha_nacimiento_empleado) = '09'";
$rsSep = mysqli_query($con, $sqlSep) or die(mysqli_error($con));

//Oct
$sqlOct = "SELECT id_empleado, apellido_pat_empleado, apellido_mat_empleado, nombre_empleado, sexo_empleado, fecha_nacimiento_empleado
FROM nomina.tab_empleado
WHERE MONTH(fecha_nacimiento_empleado) = '10'";
$rsOct = mysqli_query($con, $sqlOct) or die(mysqli_error($con));

//Nov
$sqlNov = "SELECT id_empleado, apellido_pat_empleado, apellido_mat_empleado, nombre_empleado, sexo_empleado, fecha_nacimiento_empleado
FROM nomina.tab_empleado
WHERE MONTH(fecha_nacimiento_empleado) = '11'";
$rsNov = mysqli_query($con, $sqlNov) or die(mysqli_error($con));

//Dic
$sqlDic = "SELECT id_empleado, apellido_pat_empleado, apellido_mat_empleado, nombre_empleado, sexo_empleado, fecha_nacimiento_empleado
FROM nomina.tab_empleado
WHERE MONTH(fecha_nacimiento_empleado) = '12'";
$rsDic = mysqli_query($con, $sqlDic) or die(mysqli_error($con));