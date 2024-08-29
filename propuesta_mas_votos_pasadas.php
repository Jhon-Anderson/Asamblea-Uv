<?php
// Aquí se debería incluir el archivo de conexión a la base de datos
require_once 'database.php';

// Obtener la conexión a la base de datos
$conexion = Database::obtenerConexion();

// Consulta SQL para obtener la propuesta más votada por asamblea en estado "cerrada"
$query = "SELECT p.idasamblea, p.idpropuesta, p.titulo, p.descripcion, p.votos AS max_votos, a.estado FROM propuestas p, asambleas a WHERE p.idasamblea = a.idasamblea AND a.estado = 'cerrada' AND p.votos = (SELECT MAX(votos) FROM propuestas WHERE idasamblea = p.idasamblea) GROUP BY p.idasamblea";

$resultado = $conexion->query($query);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {

    while ($fila = $resultado->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $fila['idasamblea'] . '</td>';
        echo '<td>' . $fila['idpropuesta'] . '</td>';
        echo '<td>' . $fila['titulo'] . '</td>';
        echo '<td>' . $fila['descripcion'] . '</td>';
        echo '<td>' . $fila['max_votos'] . '</td>';
        echo '<td>' . $fila['estado'] . '</td>';
        echo '</tr>';
    }
}

// Cerrar la conexión a la base de datos después de utilizarla completamente
//$conexion->close();
?>
