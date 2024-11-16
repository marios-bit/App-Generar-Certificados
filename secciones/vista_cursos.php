<?php include("../templates/cabecera.php"); ?>
<?php include("cursos.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <br>
            <div class="row">
                <div class="col-md-5">
                    <form action="" method="post">
                        <div class="card">

                            <div class="card-header">Cursos</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">ID</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="id"
                                        id="id"
                                        value="<?php echo $id; ?>"
                                        aria-describedby="helpId"
                                        placeholder="ID" />
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Nombre del curso</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="nombre_curso"
                                        id="nombre_curso"
                                        value="<?php echo $nombre_curso; ?>"
                                        aria-describedby="helpId"
                                        placeholder="Escriba el nombre del curso" />

                                    <br>

                                    <div class="btn-group" role="group" aria-label="Button group name">
                                        <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
                                        <button type="submit" name="accion" value="editar" class="btn btn-warning">Editar</button>
                                        <button type="submit" name="accion" value="eliminar" class="btn btn-danger">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-7 ">
                    <div
                        class="table-responsive">
                        <table
                            class="table table-primary">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($listaCusrsos as $curso){ ?>
                                    <tr class="">
                                    <td> <?php echo $curso['id']; ?> </td>
                                    <td> <?php echo $curso['nombre_curso']; ?> </td>
                                    <td> 
                                        <form action="" method="post">
                                            <input type="hidden" name="id" id="" value="<?php echo $curso['id']; ?>" />
                                            <input type="submit" value="Seleccionar" name="accion" class="btn btn-info">
                                        </form>
                                    </td>
                                </tr>
                                <?php } ?>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("../templates/pie.php"); ?>