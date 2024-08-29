<?php
require_once 'database.php'; 

// Capturar los datos del formulario
$id = $_POST['id'];
$idtema = $_POST['tema']; // Obtener el ID del tema seleccionado del combobox
$descripcion = $_POST['descripcion'];
$idpropuesta = generarNumeroAleatorio();
$conexion = Database::obtenerConexion(); 

$consul = "SELECT idasamblea FROM asambleas WHERE estado='activa'";
$resultado = $conexion->query($consul);

if ($resultado->num_rows > 0) {
    $data = $resultado->fetch_assoc();
    $idasamblea = $data['idasamblea'];

    // Consulta SQL para insertar la propuesta en la base de datos
    $query = "INSERT INTO propuestas (idpropuesta, idtema, descripcion, votos) 
              VALUES ('$idpropuesta', '$idtema', '$descripcion', 0)";

    // Ejecutar la consulta SQL y manejar los errores
    if ($conexion->query($query) === TRUE) {
        ?>
        <script>
            alert("Propuesta registrada correctamente.");
            window.history.back();
        </script>
        <?php            
    } else {
        ?>
        <script>
            alert("Error al registrar la propuesta: <?php echo $conexion->error; ?>");
            window.history.back();
        </script>
        <?php            
    }

    // Cerrar la conexión a la base de datos después de usarla
    $conexion->close();        
} else {
    ?>
    <script>
        alert("Aún no hay asambleas activas.");
        window.history.back();
    </script>
    <?php        
}

// Función para generar un número aleatorio de 5 dígitos que no exista en la base de datos
function generarNumeroAleatorio() {
    $conexion = Database::obtenerConexion();
    $numeroString = '';

    do {
        // Generar un número aleatorio de 5 dígitos
        $numero = rand(10000, 99999);
    
        // Convertir el número en una cadena
        $numeroString = (string) $numero;

        // Verificar si el número ya existe en la base de datos
        $sql = "SELECT idpropuesta FROM propuestas WHERE idpropuesta = '$numeroString'";
        $resultado = $conexion->query($sql);

        // Si el número no existe en la base de datos, salir del bucle
        if ($resultado->num_rows == 0) {
            break;
        }

    } while (true);
    
    return $numeroString;
}
?>