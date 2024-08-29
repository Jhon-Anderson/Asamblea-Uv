<?php
require_once 'database.php';

// Capturar los datos del formulario
$idasamblea = $_POST["idasamblea"];

// Obtener la conexión a la base de datos
$conexion = Database::obtenerConexion();

// Validar votos y actualizar la propuesta
function validarAsamblea($conexion, $idasamblea){
    $sql = "SELECT * FROM asambleas, subtemas WHERE asambleas.idasamblea = subtemas.idasamblea and asambleas.idasamblea = '$idasamblea'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        
        ?>
        <script>
            alert("No se puede eliminar la asamblea porque ya tiene propuestas registradas.");
            window.history.back();
        </script>
        <?php        
    } else {
        $query = "DELETE FROM asambleas WHERE idasamblea = '$idasamblea'";
        
        if ($conexion->query($query) === TRUE) {
            
            ?>
            <script>
                alert("asamblea eliminada correctamente.");
                window.history.back();
            </script>
            <?php            
        } else {
            
            ?>
            <script>
                alert("Error al eliminar asamblea: " . $conexion->error);
                window.history.back();
            </script>
            <?php            
        }        
    }
}

// Llamar a la función para validar votos y actualizar la propuesta
validarAsamblea($conexion, $idasamblea);

// Cerrar la conexión a la base de datos
$conexion->close();
?>