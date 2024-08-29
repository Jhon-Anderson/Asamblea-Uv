<?php
    require_once 'database.php';

    // Recoger los datos del usuario de la URL
    $id = $_GET['id'];
    $conexion = Database::obtenerConexion();

    // Consulta SQL para buscar al usuario en la base de datos
    $query = "SELECT nombre, apellido FROM usuarios WHERE id='$id'";

    // Ejecutar la consulta
    $resultado = $conexion->query($query);

    // Verificar si se encontró algún resultado
    if ($resultado->num_rows > 0) {        

        $usuario = $resultado->fetch_assoc();
        $nombre=$usuario['nombre'];
        $apellido=$usuario['apellido'];

        echo "<div class='encabezado'>Bienvenido, <span>$id</span> - <span>$nombre</span> - <span>$apellido</span></div>";



    }     

    
?>