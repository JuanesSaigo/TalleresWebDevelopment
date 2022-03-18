<?php include '../Views/head.php' ?>

<?php
    include_once "../Model/conexion.php";
    $sentencia = $bd -> query('SELECT * FROM persona inner JOIN tipodocumento ON persona.idtdocP = tipodocumento.idTD inner JOIN ciudad ON persona.idresidenciaP = ciudad.idC;');
    $tdocumento = $sentencia->fetchAll(PDO::FETCH_OBJ);
    $tdocumento2 = $tdocumento;

    $sentencia1 = $bd -> query('SELECT * FROM tipodocumento');
    $tdocumento3 = $sentencia1->fetchAll(PDO::FETCH_OBJ);
    $tdocumento4 = $tdocumento3;

    $sentencia2 = $bd -> query('SELECT * FROM ciudad');
    $tdocumento5 = $sentencia2->fetchAll(PDO::FETCH_OBJ);
    $tdocumento6 = $tdocumento5;
?>
<link rel="stylesheet" href="./extras/1.css">
    <script>
        document.getElementById("adoc").href = "./regdoc.php";
        document.getElementById("ac").href = "./regcity.php";
        document.getElementById("auser").href = "./reguser.php";
    </script>
    
        <div class="row" style="margin-top: 70px;">
            <div class="col"></div>
            <div class="col-8">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Registro TipoDocumento
                        </div>

                        <div class="row -sm">
                            <form action="../Controller/consultaimp.php" class="p-4" method="POST">
                                <div class="mb-3">
                                    <label class="center" for="ntd">Nombres</label>
                                    <input class="form-control" type="text" name="inp-nombre-p" id="inp-nombre-p" aria-describedby="basic-addon1">
                                </div>
                                <div class="mb-3">
                                    <label for="ntd">Apellidos</label>
                                    <input class="form-control" type="text" name="inp-apellido-p" id="inp-apellido-p" aria-describedby="basic-addon1">
                                </div>
                                <div class="mb-3">
                                    <label class="center" for="ntd">Tipo de documento:</label>
                                    <select class="form-select" aria-label="Default select example" name="select-1" id="select-1">
                                        <option selected>Seleccione el tipo</option>
                                        <?php
                                            foreach ($tdocumento3 as $valorestd){
                                                
                                        ?>
                                        <option value='<?php echo $valorestd->idTD ?>'><?php echo $valorestd->nombreTD ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="ntd">Documento</label>
                                    <input class="form-control" type="text" name="inp-doc-p" id="inp-doc-p" aria-describedby="basic-addon1">
                                </div>
                                <div class="mb-3">
                                    <label class="center" for="ntd">Lugar de Nacimiento</label>
                                    <input class="form-control" type="text" name="inp-lnac-p" id="inp-lnac-p" aria-describedby="basic-addon1">
                                </div>
                                <div class="mb-3">
                                    <label class="center" for="ntd">Fecha de Nacimiento</label>
                                    <input class="form-control" type="text" name="inp-fnac-p" id="inp-fnac-p" placeholder="DD/MM/YYYY" aria-describedby="basic-addon1">
                                </div>
                                <div class="mb-3">
                                    <label class="center" for="ntd">Email</label>
                                    <input class="form-control" type="text" name="inp-email-p" id="inp-email-p" placeholder="Example@correo.com" aria-describedby="basic-addon1">
                                </div>
                                <div class="mb-3">
                                    <label class="center" for="ntd">Telefono</label>
                                    <input class="form-control" type="text" name="inp-telefono-p" id="inp-telefono-p" aria-describedby="basic-addon1">
                                </div>
                                <div class="mb-3">
                                    <label class="center" for="ntd">Nombre de Usuario</label>
                                    <input class="form-control" type="text" name="inp-user-p" id="inp-user-p" aria-describedby="basic-addon1">
                                </div>
                                <div class="mb-3">
                                    <label class="center" for="ntd">Contraseña</label>
                                    <input class="form-control" type="password" name="inp-pass-p" id="inp-pass-p" aria-describedby="basic-addon1">
                                </div>
                                <div class="mb-3">
                                    <label class="center" for="ntd">Confirmar Contraseña</label>
                                    <input class="form-control" type="password" name="inp-pass2-p" id="inp-pass2-p" aria-describedby="basic-addon1">
                                </div>
                                <div class="mb-3">
                                    <label class="center" for="ntd">Lugar de Residencia:</label>
                                    <select class="form-select" aria-label="Default select example" name="select-2" id="select-2">
                                        <option selected>Seleccione el tipo</option>
                                        <?php
                                            foreach ($tdocumento5 as $valoresc){
                                                
                                        ?>
                                        <option value='<?php echo $valoresc->idC ?>'><?php echo $valoresc->nombreC ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="row mb-1 justify-content-center">
                                    <div class="col-2"></div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-success" name="Bagregar">Agregar</button>
                                    </div>
                                    <div class="col-2">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal2">Borrar</button>
                                    </div>
                                    <div class="col-2"></div>

                                    <?php
                                        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'faltaP' ){

                                    ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>Alerta.</strong> Rellena todos los campos. 
                                    </div>
                                    <?php
                                        }
                                    ?>  

                                    <?php
                                        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registradoP' ){

                                    ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>Listo.</strong> Se ha completado. 
                                    </div>
                                    <?php
                                        }
                                    ?>

                                    <?php
                                        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'ERRORRegistradoP' ){

                                    ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>¡Error!</strong> Hay campos que ya existen en la BD o un error de conexión. 
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel2">Atención</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                Elija un campo a Borrar de la BD
                                                <select class="form-select" aria-label="Default select example" name="select-3">
                                                    <option selected>Seleccione el campo</option>
                                                    <?php
                                                        foreach ($tdocumento2 as $valores){
                                                
                                                    ?>
                                                    <option value='<?php echo $valores->idTD ?>'><?php echo $valores->nombreTD ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary" name="Bborrar">Borrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col"></div>
            <div class="row" style="padding-top: 20px;"> </div>
            <div class="card">
                        <div class="card-header">
                            Tabla Usuarios
                        </div>
                        <div class="row p-4 ">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>TDoc</th>
                                        <th>Documento</th>
                                        <th>LNacimiento</th>
                                        <th>FechaNacimiento</th>
                                        <th>Email</th>
                                        <th>Telefono</th>
                                        <th>Usuario</th>
                                        <th>LResidencia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div class="row">
                                    <?php
                                        foreach($tdocumento as $dato){

                                    ?>
                                        <tr>
                                            <td scope="row"><?php echo $dato->idP ?></td>
                                            <td><?php echo $dato->nombreP ?></td>
                                            <td><?php echo $dato->apellidoP ?></td>
                                            <td><?php echo $dato->nombreTD ?></td>
                                            <td><?php echo $dato->documentoP ?></td>
                                            <td><?php echo $dato->lugarnacP ?></td>
                                            <td><?php echo $dato->fechanacP ?></td>
                                            <td><?php echo $dato->emailP ?></td>
                                            <td><?php echo $dato->telefonoP ?></td>
                                            <td><?php echo $dato->usuarioP ?></td>
                                            <td><?php echo $dato->nombreC ?></td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    </div>
                                </tbody>
                            </table>
                            
                        </div>
            </div>
                    
            <div class="row" style="padding-top: 70px;"> </div>
        </div>
        <div class="row" style="padding-top: 70px;"> </div>
<?php include '../Views/foot.php' ?>