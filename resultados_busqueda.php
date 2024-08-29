<?php
// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Mostrar los datos en la tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['nombre_asamblea'] . "</td>";
        echo "<td>" . $fila['nombre_tema'] . "</td>";
        echo "<td>" . $fila['propuesta_con_mas_votos'] . " (Votos: " . $fila['max_votos'] . ")</td>";
        echo "</tr>";
        echo "<tr><td colspan='3'>-----------------------------</td></tr>";
    }
} else {
    // Si no se encontraron propuestas, mostrar un mensaje en la tabla
    echo "<tr><td colspan='3'>No se encontraron propuestas.</td></tr>";
}
?>