<?php
//INSERT INTO `cursos` (`id`, `nombre_curso`) VALUES (NULL, 'Sitio Web PHP');
include_once '../configuraciones/db.php';
$conexionDB = BD::crearinstancia();

// Insertar datos a la BD
$id = isset($_POST['id']) ? $_POST['id'] : '';
$nombre_curso = isset($_POST['nombre_curso']) ? $_POST['nombre_curso'] : '';
//print_r($_POST);
$accion = isset($_POST['accion']) ? $_POST['accion'] : '';

if ($accion) {
    switch ($accion) {
        case 'agregar'; // Agregar un registro de la base de datos
            $sql = "INSERT INTO cursos (id, nombre_curso) VALUES (NULL, :nombre_curso)";
            $consulta = $conexionDB->prepare($sql);
            $consulta->bindParam(':nombre_curso', $nombre_curso);
            $consulta->execute();
            break;
        case 'editar'; // Editar un registro de la base de datos
            $sql = "UPDATE cursos SET nombre_curso =:nombre_curso WHERE id=:id";
            $consulta=$conexionDB->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->bindParam(':nombre_curso', $nombre_curso);
            $consulta->execute();
            break;
        case 'eliminar'; // Eliminar un registro de la base de datos
            $sql = "DELETE FROM cursos WHERE id=:id";
            $consulta = $conexionDB->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            break;
        case 'Seleccionar'; // Seleccionar un registro de la base de datos
            $sql = "SELECT * FROM cursos WHERE id=:id";
            $consulta = $conexionDB->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $curso = $consulta->fetch(PDO::FETCH_ASSOC);
            $nombre_curso = $curso['nombre_curso'];
            break;
    }
}

// Mostrar datos de la BD
$consulta = $conexionDB->prepare("SELECT * FROM cursos");
$consulta->execute();
$listaCusrsos = $consulta->fetchAll();
