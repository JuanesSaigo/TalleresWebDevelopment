<?php
    
    include_once '../Model/conexion.php';
    $nombre2 = $_POST["inp-nombre-c"];
    $desc2 = $_POST["inp-desc-c"];

    if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['Bagregar'])){
        if(empty($_POST["inp-nombre-c"]) || empty($_POST["inp-desc-c"])){
            header('Location: regcity.php?mensaje=faltaC');
            exit();
        }
        $validar = "SELECT * FROM ciudad WHERE nombreC = '$nombre2'";
        $validando = $bd->query($validar);
        if($validando->rowCount()>0){
            header('Location: ../Views/regcity.php?mensaje=ERRORRegistradoC');
        }
        else{
            $sentencia = $bd->prepare("INSERT INTO ciudad(nombreC,descripcionC) VALUES (?,?);");
            $resultado2 = $sentencia->execute([$nombre2,$desc2]);

            if($resultado2===TRUE){
                header('Location: ../Views/regcity.php?mensaje=registradoC');
            }
            else{
                header('Location: ../Views/regcity.php?mensaje=ERRORRegistradoC');
                exit();
            }
        }
    }

    if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['Bmodificar'])){
        $id2 = $_POST["select-1"];
        if(empty($_POST["inp-nombre-c"]) || empty($_POST["inp-desc-c"])){
            header('Location: regcity.php?mensaje=faltaC');
            exit();
        }
        $sentencia = $bd->prepare("UPDATE ciudad SET nombreC = ? , descripcionC = ? WHERE idC = ?;");
            $resultado2 = $sentencia->execute([$nombre2,$desc2,$id2]);

            if($resultado2===TRUE){
                header('Location: ../Views/regcity.php?mensaje=registradoC');
            }
            else{
                header('Location: ../Views/regcity.php?mensaje=ERRORRegistradoC');
                exit();
            }

    }
    if($_SERVER['REQUEST_METHOD']=="POST" and isset($_POST['Bborrar'])){
        $id2 = $_POST["select-2"];
        $sentencia = $bd->prepare("DELETE FROM ciudad WHERE idC=?; ALTER TABLE ciudad AUTO_INCREMENT = 1;");
        $resultado2 = $sentencia->execute([$id2]);
        if($resultado2===TRUE){
            header('Location: ../Views/regcity.php?mensaje=registradoC');
        }
        else{
            header('Location: ../Views/regcity.php?mensaje=ERRORRegistradoC');
            exit();
        }
    }
    
?>