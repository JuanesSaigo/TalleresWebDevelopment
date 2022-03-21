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
    $sqlPersonax = mysqli_query($conexionBD,"SELECT * FROM persona WHERE idP=".$_GET["consultar"]);
    if(mysqli_num_rows($sqlPersonax) > 0){
        $personax = mysqli_fetch_all($sqlPersonax,MYSQLI_ASSOC);
        echo json_encode($personax);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}
//borrar pero se le debe de enviar una clave ( para borrado )
if (isset($_GET["borrar"])){
    $sqlPersonax = mysqli_query($conexionBD,"DELETE FROM persona WHERE idP=".$_GET["borrar"]);
    if($sqlPersonax){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}
//Inserta un nuevo registro y recepciona en método post los datos de nombre y correo
if(isset($_GET["insertar"])){
    $data = json_decode(file_get_contents("php://input"));
    $nombre2=$data->nombre;
    $apellido2=$data->apellido;
    $doc2=$data->doc;
    $lnac2=$data->lnac;
    $fnac2=$data->fnac;
    $email2=$data->email;
    $tel2=$data->tell;
    $user2=$data->user;
    $pass2=$data->passw2;
    $ciudad2=$data->lres;
    $td2=$data->tipodoc;
        if(($pass2!="")&&($user2!="")){
            
    $sqlPersonax = mysqli_query($conexionBD,"INSERT INTO persona(nombreP,apellidoP,documentoP,lugarnacP,fechanacP,emailP,telefonoP,usuarioP,contraseñaP,idresidenciaP,idtdocP) VALUES('$nombre2','$apellido2','$doc2','$lnac2','$fnac2','$email2','$tel2','$user2','$pass2','$ciudad2','$td2') ");
    echo json_encode(["success"=>1]);
        }
    exit();
}
// Actualiza datos pero recepciona datos de nombre, correo y una clave para realizar la actualización
if(isset($_GET["actualizar"])){
    
    $data = json_decode(file_get_contents("php://input"));

    $id=(isset($data->id))?$data->id:$_GET["actualizar"];
    $nombre2=$data->nombre;
    $apellido2=$data->apellido;
    $doc2=$data->doc;
    $lnac2=$data->lnac;
    $fnac2=$data->fnac;
    $email2=$data->email;
    $tel2=$data->tell;
    $user2=$data->user;
    $pass2=$data->passw2;
    $ciudad2=$data->lres;
    $td2=$data->tipodoc;
    
    $sqlPersonax = mysqli_query($conexionBD,"UPDATE persona SET nombreP='$nombre2',apellidoP='$apellido2',documentoP='$doc2',lugarnacP='$lnac2',fechanacP='$fnac2',emailP='$email2',telefonoP='$tel2',usuarioP='$user2',contraseñaP='$pass2',idresidenciaP='$ciudad2',idtdocP='$td2' WHERE idP='$id'");
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