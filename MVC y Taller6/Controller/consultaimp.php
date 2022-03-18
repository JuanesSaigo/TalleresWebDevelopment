<?php
    
    include_once '../Model/conexion.php';
    $nombre2 = $_POST["inp-nombre-p"];
    $apellido2 = $_POST["inp-apellido-p"];
    $doc2 = $_POST["inp-doc-p"];
    $td2 = $_POST["select-1"];
    $lnac2 = $_POST["inp-lnac-p"];
    $fnac2 = $_POST["inp-fnac-p"];
    $email2 = $_POST["inp-email-p"];
    $tel2 = $_POST["inp-telefono-p"];
    $user2 = $_POST["inp-user-p"];
    $pass2 = $_POST["inp-pass-p"];
    $ciudad2 = $_POST["select-2"];

    

    if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['Bagregar'])){
        if(empty($_POST["inp-user-p"]) || empty($_POST["inp-pass-p"]) || empty($_POST["inp-email-p"]) || empty($_POST["inp-nombre-p"]) || empty($_POST["inp-doc-p"])){
            header('Location: reguser.php?mensaje=faltaP');
            exit();
        }
        $validar = "SELECT * FROM persona WHERE usuarioP = '$user2' & documentoP = '$doc2' & emailP = '$email2'";
        $validando = $bd->query($validar);
        if($validando->rowCount()>0){
            header('Location: ../Views/reguser.php?mensaje=ERRORRegistradoP');
        }
        else{
            $sentencia = $bd->prepare("INSERT INTO persona(nombreP,apellidoP,documentoP,lugarnacP,fechanacP,emailP,telefonoP,usuarioP,contraseñaP,idresidenciaP,idtdocP) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
            $resultado2 = $sentencia->execute([$nombre2,$apellido2,$doc2,$lnac2,$fnac2,$email2,$tel2,$user2,$pass2,$ciudad2,$td2]);

            if($resultado2===TRUE){
                header('Location: ../Views/reguser.php?mensaje=registradoP');
            }
            else{
                header('Location: ../Views/reguser.php?mensaje=ERRORRegistradoP');
                exit();
            }
        }
    }

    if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['Bborrar'])){
        $id2 = $_POST["select-3"];
        $sentencia = $bd->prepare("DELETE FROM persona WHERE idP=?; ALTER TABLE persona AUTO_INCREMENT = 1;");
        $resultado2 = $sentencia->execute([$id2]);
        if($resultado2===TRUE){
            header('Location: ../Views/reguser.php?mensaje=registradoP');
        }
        else{
            header('Location: ../Views/reguser.php?mensaje=ERRORRegistradoP');
            exit();
        }
    }
    
?>