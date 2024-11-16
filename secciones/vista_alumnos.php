<?php include("../templates/cabecera.php"); ?>
<?php include("alumnos.php"); ?>

<div class="container">
    <div class="row">
        <div class="clo-12">
            <br>
            <div class="row">
                <div class="col-5">
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-header">
                                Alumnos
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">ID</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="id"
                                        value="<?php echo $id; ?>"
                                        id="id"
                                        aria-describedby=""
                                        placeholder="ID" />
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Nombre</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="nombres"
                                        value="<?php echo $nombres; ?>"
                                        id="nombres"
                                        aria-describedby="helpId"
                                        placeholder="Escriba su Nombre" />
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Apellido</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="apellidos"
                                        value="<?php echo $apellidos; ?>"
                                        id="apellidos"
                                        aria-describedby="helpId"
                                        placeholder="Escriba su Apellido" />
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Cursos del alumno:</label>
                                    <select multiple class="form-control" name="cursos[]" id="listaCursos">
                                        <option>Selecione una Opción</option>
                                        <?php foreach ($cursos as $curso) { ?>
                                            <option
                                                <?php
                                                if (!empty($arreglo_cursos)):
                                                    if (in_array($curso['id'], $arreglo_cursos)):
                                                        echo "Selected";
                                                    endif;
                                                endif;
                                                ?>
                                                value="<?php echo $curso['id']; ?>">
                                                <?php echo $curso['id']; ?> - <?php echo $curso['nombre_curso']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="btn-group" role="group" aria-label="Button group name">
                                    <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
                                    <button type="submit" name="accion" value="editar" class="btn btn-warning">Editar</button>
                                    <button type="submit" name="accion" value="eliminar" class="btn btn-danger">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-7">
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
                                <?php foreach ($alumnos as $alumno): ?>
                                    <tr>
                                        <td><?php echo $alumno['id']; ?></td>
                                        <td>
                                            <?php echo $alumno['nombres']; ?> <?php echo $alumno['apellidos']; ?>
                                            <br>
                                            <?php foreach ($alumno["cursos"] as $curso) { ?>
                                                <a href="certificado.php?id_curso=<?php echo $curso['id']; ?>&id_alumno=<?php echo $alumno['id']; ?>">
                                                    <?php echo $curso['nombre_curso']; ?> </a><br>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="id" value="<?php echo $alumno['id']; ?>">
                                                <input type="submit" value="Seleccionar" name="accion" class="btn btn-info">
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>

<script>
    new TomSelect("#listaCursos");
</script>

<?php include("../templates/pie.php"); ?>