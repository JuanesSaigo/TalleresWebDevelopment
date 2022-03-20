<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Conecta a la base de datos  con usuario, contraseña y nombre de la BD
$servidor = "localhost"; $usuario = "root"; $passwordbd = ""; $nombreBaseDatos = "mpaspa";
$conexionBD = new mysqli($servidor, $usuario, $passwordbd, $nombreBaseDatos);

// Consulta todos los registros de la tabla ciudad
$sqlCiudadx = mysqli_query($conexionBD,"SELECT * FROM ciudad");
if(mysqli_num_rows($sqlCiudadx) > 0){
    $ciudadx = mysqli_fetch_all($sqlCiudadx,MYSQLI_ASSOC);
    echo json_encode($ciudadx);
}
else{ echo json_encode([["success"=>0]]); }
?>