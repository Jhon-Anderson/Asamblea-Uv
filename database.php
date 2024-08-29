<?php

class Database {
    // Atributo privado estático para almacenar la única instancia de la conexión
    private static $conexion;

    // Método privado constructor para evitar la creación de instancias fuera de la clase
    private function __construct() {}

    // Método estático para obtener la instancia de la conexión (singleton)
    public static function obtenerConexion() {
        // Verificar si la conexión ya está establecida
        if (!isset(self::$conexion)) {
            // Credenciales de la base de datos
            $server = "localhost";
            $user = "root";
            $pass = "";
            $db = "asamblea";

            // Conexión a la base de datos
            self::$conexion = new mysqli($server, $user, $pass, $db);

            // Verificar errores en la conexión
            if (self::$conexion->connect_errno) {
                die("Error al conectar a la base de datos: " . self::$conexion->connect_error);
            } else {
                
            }
        }

        // Devolver la instancia de la conexión
        return self::$conexion;
    }
}

?>