<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:../index.php');
}

require_once 'DatabaseBackupRestore.php';

$mensaje = "";

// Ejecutar respaldo si se presiona el botón
if (isset($_POST['respaldar'])) {
    $mensaje = DatabaseBackupRestore::respaldarBD();
}

// Ejecutar restauración si se presiona el botón
if (isset($_POST['restaurar']) && isset($_FILES['archivo_respaldo'])) {
    $archivoRespaldo = $_FILES['archivo_respaldo']['tmp_name'];
    $mensaje = DatabaseBackupRestore::restaurarBD($archivoRespaldo);
}
?>

<!doctype html>
<html lang="es">

<head>
    <title>Administración de la Base de Datos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
</head>

<body>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="index.php">Inicio</a>
            <a class="nav-item nav-link" href="vista_alumnos.php">Alumnos</a>
            <a class="nav-item nav-link" href="vista_cursos.php">Cursos</a>
            <a class="nav-item nav-link" href="cerrar.php">Cerrar Sesión</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Administración de la Base de Datos</h2>

        <!-- Mostrar mensaje de éxito o error -->
        <?php if ($mensaje): ?>
            <div class="alert alert-info"><?php echo $mensaje; ?></div>
        <?php endif; ?>

        <!-- Botón para respaldar la base de datos -->
        <form method="POST" enctype="multipart/form-data">
            <button type="submit" name="respaldar" class="btn btn-primary">Respaldar Base de Datos</button>
        </form>

        <!-- Formulario para restaurar la base de datos -->
        <form method="POST" enctype="multipart/form-data" class="mt-4 p-4 border rounded bg-light">
            <div class="mb-3">
                <label for="archivo_respaldo" class="form-label">Selecciona un archivo para restaurar:</label>
                <input type="file" name="archivo_respaldo" id="archivo_respaldo" class="form-control" required />
            </div>
            <button type="submit" name="restaurar" class="btn btn-warning w-100">Restaurar Base de Datos</button>
        </form>

    </div>
</body>

</html>