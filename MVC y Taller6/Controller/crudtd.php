<?php
    
    include_once '../Model/conexion.php';
    $nombre2 = $_POST["inp-nombre-td"];
    $desc2 = $_POST["inp-desc-td"];

    if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['Bagregar'])){
        if(empty($_POST["inp-nombre-td"]) || empty($_POST["inp-desc-td"])){
            header('Location: ../Views/regdoc.php?mensaje=faltaTD');
            exit();
        }
        $validar = "SELECT * FROM tipodocumento WHERE nombreTD = '$nombre2'";
        $validando = $bd->query($validar);
        if($validando->rowCount()>0){
            header('Location: ../Views/regdoc.php?mensaje=ERRORRegistradoTD');
        }
        else{
            $sentencia = $bd->prepare("INSERT INTO tipodocumento(nombreTD,descripcionTD) VALUES (?,?);");
            $resultado2 = $sentencia->execute([$nombre2,$desc2]);

            if($resultado2===TRUE){
                header('Location: ../Views/regdoc.php?mensaje=registradoTD');
            }
            else{
                header('Location: ../Views/regdoc.php?mensaje=ERRORRegistradoTD');
                exit();
            }
        }
    }

    if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['Bmodificar'])){
        $id2 = $_POST["select-1"];
        if(empty($_POST["inp-nombre-td"]) || empty($_POST["inp-desc-td"])){
            header('Location: regdoc.php?mensaje=faltaTD');
            exit();
        }
        $sentencia = $bd->prepare("UPDATE tipodocumento SET nombreTD = ? , descripcionTD = ? WHERE idTD = ?;");
            $resultado2 = $sentencia->execute([$nombre2,$desc2,$id2]);

            if($resultado2===TRUE){
                header('Location: ../Views/regdoc.php?mensaje=registradoTD');
            }
            else{
                header('Location: ../Views/regdoc.php?mensaje=ERRORRegistradoTD');
                exit();
            }

    }
    if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['Bborrar'])){
        $id2 = $_POST["select-2"];
        $sentencia = $bd->prepare("DELETE FROM tipodocumento WHERE idTD=?; ALTER TABLE tipodocumento AUTO_INCREMENT = 1;");
        $resultado2 = $sentencia->execute([$id2]);
        if($resultado2===TRUE){
            header('Location: ../Views/regdoc.php?mensaje=registradoTD');
        }
        else{
            header('Location: ../Views/regdoc.php?mensaje=ERRORRegistradoTD');
            exit();
        }
    }
    
?>