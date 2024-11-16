<?php
class DatabaseBackupRestore
{
    private static $nombreBD = 'aplicacion';
    private static $usuario = 'root';
    private static $contrasena = '';
    private static $host = 'localhost';
    private static $mysqlPath = 'C:\\xampp\\mysql\\bin\\mysql';

    // Función para respaldar la base de datos
    public static function respaldarBD()
    {
        $directorio = 'C:/xampp/htdocs/App/respaldo';
        $nombreArchivo = 'respaldo_' . date('Ymd_His') . '.sql';
        $rutaArchivo = $directorio . '/' . $nombreArchivo;
        $mysqldumpPath = 'C:\\xampp\\mysql\\bin\\mysqldump';

        if (!is_dir($directorio)) {
            mkdir($directorio, 0777, true);
        }

        $comando = "{$mysqldumpPath} --user=" . self::$usuario . " --password=" . self::$contrasena . " " . self::$nombreBD . " > {$rutaArchivo}";
        $resultado = shell_exec($comando);

        if (file_exists($rutaArchivo)) {
            return "Respaldo creado exitosamente: {$rutaArchivo}";
        } else {
            return "Error en el respaldo: " . $resultado;
        }
    }

    // Función para restaurar la base de datos
    public static function restaurarBD($archivoRespaldo)
    {
        try {
            $conexion = new PDO("mysql:host=" . self::$host, self::$usuario, self::$contrasena);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $existeBD = $conexion->query("SHOW DATABASES LIKE '" . self::$nombreBD . "'")->fetch();

            if (!$existeBD) {
                $conexion->exec("CREATE DATABASE " . self::$nombreBD);
                echo "Base de datos '" . self::$nombreBD . "' creada exitosamente.\n";
            } else {
                echo "La base de datos '" . self::$nombreBD . "' ya existe.\n";
            }

            $conexion = null;

            // Verificar si el archivo de respaldo existe
            if (!file_exists($archivoRespaldo)) {
                return "El archivo de respaldo no existe: {$archivoRespaldo}";
            }

            // Comando para restaurar la base de datos
            $comandoRestaurar = self::$mysqlPath . " --user=" . self::$usuario . " --password=" . self::$contrasena . " " . self::$nombreBD . " < " . $archivoRespaldo;
            $resultadoRestaurar = shell_exec($comandoRestaurar);

            if ($resultadoRestaurar === null) {
                return "Restauración completada con éxito desde {$archivoRespaldo}";
            } else {
                return "Error en la restauración: " . $resultadoRestaurar;
            }
        } catch (PDOException $e) {
            return "Error al conectar o crear la base de datos: " . $e->getMessage();
        }
    }
}
