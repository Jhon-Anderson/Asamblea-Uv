<?php
// Aquí se debería incluir el archivo de conexión a la base de datos
require_once 'database.php';

// Obtener los datos de las propuestas desde la base de datos
$conexion = Database::obtenerConexion();

// Consulta SQL para obtener las propuestas que el usuario ha votado
$query = "SELECT subtemas.idasamblea, propuestas.idpropuesta, propuestas.descripcion, propuestas.descripcion, subtemas.estado 
          FROM votaciones 
          JOIN propuestas ON votaciones.idpropuesta = propuestas.idpropuesta 
          JOIN subtemas ON subtemas.idtema = propuestas.idtema 
          WHERE votaciones.idvotante = '$id'";

$resultado = $conexion->query($query);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Mostrar los datos en la tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['idasamblea'] . "</td>";
        echo "<td>" . $fila['idpropuesta'] . "</td>";
        echo "<td>" . $fila['descripcion'] . "</td>";
        echo "<td>" . $fila['estado'] . "</td>";
        echo "<td>";
        echo "<form action='eliminar_voto.php?id=$id' method='post'>";
        echo "<input type='hidden' name='idpropuesta' value='" . $fila['idpropuesta'] . "'>";
        echo "<input type='hidden' name='idasamblea' value='" . $fila['idasamblea'] . "'>";
        echo "<input type='submit' name='btn_eliminar' value='Eliminar'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    // Si no se encontraron propuestas, mostrar un mensaje en la primera fila de la tabla
    echo "<tr><td colspan='6'>No se encontraron propuestas.</td></tr>";
}
?>