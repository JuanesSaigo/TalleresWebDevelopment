<?php include '../Views/head.php' ?>

<?php
    include_once "../Model/conexion.php";
    $sentencia = $bd -> query('SELECT * FROM tipodocumento');
    $tdocumento = $sentencia->fetchAll(PDO::FETCH_OBJ);
    $tdocumento2 = $tdocumento;
?>
<link rel="stylesheet" href="./extras/1.css">
    <script>
        document.getElementById("adoc").href = "./regdoc.php";
        document.getElementById("ac").href = "./regcity.php";
        document.getElementById("auser").href = "./reguser.php";
    </script>
    
        <div class="row" style="margin-top: 70px;">
            <div class="col"></div>
            <div class="col-7">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Registro TipoDocumento
                        </div>

                        <div class="row -sm">
                            <form action="../Controller/crudtd.php" class="p-4" method="POST">
                                <div class="mb-3">
                                    <label class="center" for="ntd">Nombre del tipo de documento:</label>
                                    <input class="form-control" type="text" name="inp-nombre-td" id="inp-nombre-td" placeholder="CC, TI, CE, etc." >
                                </div>
                                <div class="mb-3">
                                    <label for="ntd">Descripción:</label>
                                    <input class="form-control" type="text" name="inp-desc-td" id="inp-desc-td" placeholder="Cedula de ciudadania, tarjeta de identidad, etc.">
                                </div>

                                <div class="row mb-1 justify-content-center">
                                    <div class="col-2"></div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-success" name="Bagregar">Agregar</button>
                                    </div>
                                    <div class="col-2">
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Modificar</button>
                                    </div>
                                    <div class="col-2">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal2">Borrar</button>
                                    </div>
                                    <div class="col-2"></div>

                                    <?php
                                        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'faltaTD' ){

                                    ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>Alerta.</strong> Rellena todos los campos. 
                                    </div>
                                    <?php
                                        }
                                    ?>  

                                    <?php
                                        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registradoTD' ){

                                    ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>Listo.</strong> Se ha completado. 
                                    </div>
                                    <?php
                                        }
                                    ?>

                                    <?php
                                        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'ERRORRegistradoTD' ){

                                    ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>¡Error!</strong> Hay campos que ya existen en la BD o un error de conexión. 
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Atención</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                Recuerde haber llenado los campos con el Nombre que desea cambiar y su Descripción
                                                <select class="form-select" aria-label="Default select example" name="select-1">
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
                                                    <button type="submit" class="btn btn-primary" name="Bmodificar">Modificar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel2">Atención</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                Elija un campo a Borrar de la BD
                                                <select class="form-select" aria-label="Default select example" name="select-2">
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
                        <div class="row p-4">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php
                                        foreach($tdocumento as $dato){
                                    ?>
                                    <tr>
                                        <td scope="row"><?php echo $dato->idTD ?></td>
                                        <td><?php echo $dato->nombreTD ?></td>
                                        <td><?php echo $dato->descripcionTD ?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
            <div class="row" style="padding-top: 70px;"> </div>
        </div>
        
<?php include '../Views/foot.php' ?>