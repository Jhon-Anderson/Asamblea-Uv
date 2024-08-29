<?php
// Aquí se debería incluir el archivo de conexión a la base de datos
require_once 'database.php';

// Obtener los datos de las propuestas desde la base de datos
$conexion = Database::obtenerConexion();

// Consulta SQL para obtener las propuestas
$query = "SELECT * FROM asambleas";

$resultado = $conexion->query($query);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Mostrar los datos en la tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['idasamblea'] . "</td>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['fecha'] . "</td>";
        echo "<td>" . $fila['estado'] . "</td>";
        echo "</tr>";
    }
} else {
    // Si no se encontraron propuestas, mostrar un mensaje en la primera fila de la tabla
    echo "<tr><td colspan='5'>No se encontraron asambleas.</td></tr>";
}

// Cerrar la conexión a la base de datos
//$conexion->close();
?>