<?php
// Incluir el archivo de conexión a la base de datos
require_once 'database.php';
$conexion = Database::obtenerConexion(); 

// Verificar si la conexión se ha establecido correctamente
if (!$conexion) {
    die("Error al conectar a la base de datos.");
}

// Obtener los datos del formulario
$search = $_POST['search'];
$filter = $_POST['filter'];

// Inicializar la consulta SQL
$sql = "";

// Construir la consulta SQL según el filtro seleccionado
switch ($filter) {
    case "propuesta":
        $sql = "SELECT p.idpropuesta, p.descripcion, p.votos, s.tema, a.nombre AS asamblea 
                FROM propuestas p 
                JOIN subtemas s ON p.idtema = s.idtema 
                JOIN asambleas a ON s.idasamblea = a.idasamblea 
                WHERE p.descripcion LIKE '%$search%'";
        break;
    case "asamblea":
        $sql = "SELECT a.idasamblea, a.nombre, a.fecha, a.estado 
                FROM asambleas a 
                WHERE a.nombre LIKE '%$search%'";
        break;
    case "tema":
        $sql = "SELECT s.idtema, s.tema, s.estado, u.nombre AS usuario, a.nombre AS asamblea 
                FROM subtemas s 
                JOIN usuarios u ON s.idusuario = u.id 
                JOIN asambleas a ON s.idasamblea = a.idasamblea 
                WHERE s.tema LIKE '%$search%'";
        break;
    case "usuario":
        $sql = "SELECT u.id, u.nombre, u.apellido, u.edad, u.cargo, u.email 
                FROM usuarios u 
                WHERE u.nombre LIKE '%$search%' OR u.apellido LIKE '%$search%' OR u.usuario LIKE '%$search%'";
        break;
}

// Ejecutar la consulta SQL y manejar los resultados
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>";

    // Mostrar las cabeceras de la tabla según el filtro
    switch ($filter) {
        case "propuesta":
            echo "<th>ID Propuesta</th><th>Descripción</th><th>Votos</th><th>Tema</th><th>Asamblea</th>";
            break;
        case "asamblea":
            echo "<th>ID Asamblea</th><th>Nombre</th><th>Fecha</th><th>Estado</th>";
            break;
        case "tema":
            echo "<th>ID Tema</th><th>Tema</th><th>Estado</th><th>Usuario</th><th>Asamblea</th>";
            break;
        case "usuario":
            echo "<th>ID</th><th>Nombre</th><th>Apellido</th><th>Edad</th><th>Cargo</th><th>Email</th>";
            break;
    }

    echo "</tr>";

    // Mostrar los resultados en la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";

        switch ($filter) {
            case "propuesta":
                echo "<td>{$row['idpropuesta']}</td><td>{$row['descripcion']}</td><td>{$row['votos']}</td><td>{$row['tema']}</td><td>{$row['asamblea']}</td>";
                break;
            case "asamblea":
                echo "<td>{$row['idasamblea']}</td><td>{$row['nombre']}</td><td>{$row['fecha']}</td><td>{$row['estado']}</td>";
                break;
            case "tema":
                echo "<td>{$row['idtema']}</td><td>{$row['tema']}</td><td>{$row['estado']}</td><td>{$row['usuario']}</td><td>{$row['asamblea']}</td>";
                break;
            case "usuario":
                echo "<td>{$row['id']}</td><td>{$row['nombre']}</td><td>{$row['apellido']}</td><td>{$row['edad']}</td><td>{$row['cargo']}</td><td>{$row['email']}</td>";
                break;
        }

        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

?>