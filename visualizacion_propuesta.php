<?php
// Aquí se debería incluir el archivo de conexión a la base de datos
require_once 'database.php';

// Obtener los datos de las propuestas desde la base de datos
$conexion = Database::obtenerConexion();

// Consulta SQL para obtener las propuestas
$query = "SELECT subtemas.tema, subtemas.idasamblea, propuestas.idpropuesta, usuarios.nombre AS usuario_nombre, usuarios.apellido AS usuario_apellido, propuestas.descripcion, propuestas.votos 
          FROM subtemas
          JOIN propuestas ON subtemas.idtema = propuestas.idtema
          JOIN usuarios ON subtemas.idusuario = usuarios.id
          WHERE subtemas.idasamblea = '$idasamblea' and subtemas.idusuario = '$id'
          ORDER BY subtemas.tema";

$resultado = $conexion->query($query);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    $currentTema = "";
    // Mostrar los datos agrupados por tema
    while ($fila = $resultado->fetch_assoc()) {
        if ($currentTema != $fila['tema']) {
            if ($currentTema != "") {
                echo "</table><hr>";
            }
            $currentTema = $fila['tema'];
            echo "<h3>Tema: " . $currentTema . " --------- Creador: " . $fila['usuario_nombre'] . " " . $fila['usuario_apellido'] . "</h3>";
            echo "<table>";
            echo "<tr>";
            echo "<th>IdAsamblea</th>";
            echo "<th>IdPropuesta</th>";
            echo "<th>Usuario</th>";
            echo "<th>Descripción</th>";
            echo "<th>Votos</th>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td>" . $fila['idasamblea'] . "</td>";
        echo "<td>" . $fila['idpropuesta'] . "</td>";        
        echo "<td>" . $fila['usuario_nombre'] . "</td>";
        echo "<td>" . $fila['descripcion'] . "</td>";
        echo "<td>" . $fila['votos'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    // Si no se encontraron propuestas, mostrar un mensaje
    echo "<p>No se encontraron propuestas.</p>";
}
?>