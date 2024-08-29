<?php
// Aquí se debería incluir el archivo de conexión a la base de datos
require_once 'database.php';
$conexion = Database::obtenerConexion();
// Obtener el ID del usuario
$id = $_GET['id'];
// Obtener el ID de la propuesta y el ID de la asamblea seleccionada
$idpropuesta = $_POST['idpropuesta'];
$idasamblea = $_POST['idasamblea'];

// Realizar una consulta JOIN para obtener los datos de la propuesta, la asamblea y los votos
$query = "SELECT * FROM asambleas WHERE idasamblea='$idasamblea' and estado='activa'";

$resultado = $conexion->query($query);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    $sql = "DELETE FROM votaciones WHERE idpropuesta = '$idpropuesta' and idvotante='$id'";

    $query = "UPDATE propuestas SET votos=votos-1 WHERE idpropuesta='$idpropuesta'";
    
    if ($conexion->query($sql) === TRUE and $conexion->query($query) === TRUE) {
        
        ?>
        <script>
            alert("Voto eliminado correctamente.");
            window.history.back();
        </script>
        <?php
    }    
} else {
    ?>
    <script>
        alert("No puede eliminar votos de asambleas cerradas.");
        window.history.back();
    </script>
    <?php
}
?>