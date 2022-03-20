<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Conecta a la base de datos  con usuario, contraseña y nombre de la BD
$servidor = "localhost"; $usuario = "root"; $passwordbd = ""; $nombreBaseDatos = "mpaspa";
$conexionBD = new mysqli($servidor, $usuario, $passwordbd, $nombreBaseDatos);


// Consulta datos y recepciona una clave para consultar dichos datos con dicha clave
if (isset($_GET["consultar"])){
    $sqlPersonax = mysqli_query($conexionBD,"SELECT * FROM empleados WHERE id=".$_GET["consultar"]);
    if(mysqli_num_rows($sqlPersonax) > 0){
        $personax = mysqli_fetch_all($sqlPersonax,MYSQLI_ASSOC);
        echo json_encode($personax);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}
//borrar pero se le debe de enviar una clave ( para borrado )
if (isset($_GET["borrar"])){
    $sqlPersonax = mysqli_query($conexionBD,"DELETE FROM persona WHERE id=".$_GET["borrar"]);
    if($sqlPersonax){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}
//Inserta un nuevo registro y recepciona en método post los datos de nombre y correo
if(isset($_GET["insertar"])){
    $data = json_decode(file_get_contents("php://api"));
    $nombre=$data->nombre;
    $correo=$data->correo;
        if(($correo!="")&&($nombre!="")){
            
    $sqlPersonax = mysqli_query($conexionBD,"INSERT INTO persona(nombre,correo) VALUES('$nombre','$correo') ");
    echo json_encode(["success"=>1]);
        }
    exit();
}
// Actualiza datos pero recepciona datos de nombre, correo y una clave para realizar la actualización
if(isset($_GET["actualizar"])){
    
    $data = json_decode(file_get_contents("php://api"));

    $id=(isset($data->id))?$data->id:$_GET["actualizar"];
    $nombre=$data->nombre;
    $correo=$data->correo;
    
    $sqlPersonax = mysqli_query($conexionBD,"UPDATE persona SET nombre='$nombre',correo='$correo' WHERE id='$id'");
    echo json_encode(["success"=>1]);
    exit();
}
// Consulta todos los registros de la tabla persona
$sqlPersonax = mysqli_query($conexionBD,"SELECT * FROM persona inner JOIN tipodocumento ON persona.idtdocP = tipodocumento.idTD inner JOIN ciudad ON persona.idresidenciaP = ciudad.idC;");
if(mysqli_num_rows($sqlPersonax) > 0){
    $personax = mysqli_fetch_all($sqlPersonax,MYSQLI_ASSOC);
    echo json_encode($personax);
}
else{ echo json_encode([["success"=>0]]); }


?>