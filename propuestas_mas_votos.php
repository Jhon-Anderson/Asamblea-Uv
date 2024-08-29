<?php
// Aquí se debería incluir el archivo de conexión a la base de datos
require_once 'database.php';

// Obtener los datos de las propuestas desde la base de datos
$conexion = Database::obtenerConexion();

// Consulta SQL para obtener las propuestas
$query = "SELECT subtemas.idasamblea, propuestas.descripcion, propuestas.votos FROM propuestas, subtemas WHERE subtemas.idtema = propuestas.idtema and subtemas.idasamblea = '$idasamblea' ORDER BY votos DESC LIMIT 2;";

$resultado = $conexion->query($query);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Mostrar los datos en la tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['idasamblea'] . "</td>";
        echo "<td>" . $fila['descripcion'] . "</td>";
        echo "<td>" . $fila['votos'] . "</td>";
        echo "</tr>";
    }
} else {
    // Si no se encontraron propuestas, mostrar un mensaje en la primera fila de la tabla
    echo "<tr><td colspan='5'>No se encontraron propuestas.</td></tr>";
}

// Cerrar la conexión a la base de datos
//$conexion->close();
?>