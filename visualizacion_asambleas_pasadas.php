<?php
// Aquí se debería incluir el archivo de conexión a la base de datos
require_once 'database.php';

// Obtener la conexión a la base de datos
$conexion = Database::obtenerConexion();

// Consulta SQL para obtener el nombre de la asamblea, el tema y la propuesta con más votos del tema
$query = "
SELECT 
    asambleas.nombre AS nombre_asamblea, 
    subtemas.tema AS nombre_tema, 
    propuestas.descripcion AS propuesta_con_mas_votos,
    MAX(propuestas.votos) AS max_votos
FROM 
    asambleas
JOIN 
    subtemas ON asambleas.idasamblea = subtemas.idasamblea
JOIN 
    propuestas ON subtemas.idtema = propuestas.idtema
WHERE 
    asambleas.estado = 'cerrada'
GROUP BY 
    asambleas.nombre, subtemas.tema
ORDER BY 
    asambleas.nombre, subtemas.tema";

$resultado = $conexion->query($query);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Mostrar los datos en la tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['nombre_asamblea'] . "</td>";
        echo "<td>" . $fila['nombre_tema'] . "</td>";
        echo "<td>" . $fila['propuesta_con_mas_votos'] . "</td>";
        echo "<td>" . $fila['max_votos'] . "</td>";
        echo "</tr>";
        echo "<tr><td colspan='3'>-----------------------------</td></tr>";
    }
} else {
    // Si no se encontraron asambleas o propuestas, mostrar un mensaje en la tabla
    echo "<tr><td colspan='3'>No se encontraron asambleas o propuestas.</td></tr>";
}

// Cerrar la conexión a la base de datos
//$conexion->close();
?>