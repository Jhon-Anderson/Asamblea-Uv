<?php
require_once 'database.php';

// Recoger los datos del usuario de la URL
$id = $_GET['id'];
$idpropuesta = $_POST['idpropuesta'] ?? '0';
$idasamblea = $_POST['idasamblea'] ?? '0';


$conexion = Database::obtenerConexion();

// Consulta SQL para buscar al usuario en la base de datos
$query = "SELECT idasamblea, nombre FROM asambleas WHERE estado='activa'";

// Ejecutar la consulta
$resultado = $conexion->query($query);

// Verificar si se encontró algún resultado
if ($resultado->num_rows > 0) {        

    $data = $resultado->fetch_assoc();
    $idasamblea=$data['idasamblea'];
    $nombre=$data['nombre'];

    echo "<div class='encabezado'>ASAMBLEA ACTUAL <br> ID: <span>$idasamblea</span> - TEMA: <span>$nombre</span></div>";



}     

    
?>