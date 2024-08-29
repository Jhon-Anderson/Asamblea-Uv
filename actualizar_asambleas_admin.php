<?php
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idasamblea = $_POST['idasamblea'];
    $accion = $_POST['accion'];

    $conexion = Database::obtenerConexion();

    function ActualizarEstadoAsamblea($conexion, $idasamblea, $accion){
        // Verificar si la acción es activar
        if ($accion === "Activar") {
            // Verificar si hay alguna asamblea activa
            $sql_asamblea_activa = "SELECT * FROM asambleas WHERE estado='activa'";
            $resultado_asamblea_activa = $conexion->query($sql_asamblea_activa);
            
            if ($resultado_asamblea_activa->num_rows == 0) {
                // No hay asambleas activas, se puede activar esta
                $query = "UPDATE asambleas SET estado='activa' WHERE idasamblea='$idasamblea'";
                
                if ($conexion->query($query) === TRUE) {
                    ?>
                    <script>
                        alert("Asamblea activada correctamente.");
                        window.history.back();
                    </script>
                    <?php

                } else {
                    ?>
                    <script>
                        alert("Error al activar la asamblea: " . $conexion->error);
                        window.history.back();
                    </script>
                    <?php
                }
            } else {
                ?>
                <script>
                    alert("Ya existe una asamblea activa. No se puede activar otra.");
                    window.history.back();
                </script>
                <?php
            }
        } elseif ($accion === "Cerrar") {
            // Si la acción es cerrar, simplemente se actualiza el estado
            $query = "UPDATE asambleas SET estado='cerrada' WHERE idasamblea='$idasamblea'";
            
            if ($conexion->query($query) === TRUE) {
                ?>
                <script>
                    alert("Asamblea cerrada correctamente.");
                    window.history.back();
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("Error al cerrar la asamblea: " . $conexion->error);
                    window.history.back();
                </script>
                <?php
            }
        } else {
            // Si la acción no es válida
            ?>
            <script>
                alert("Acción no válida.");
                window.history.back();
            </script>
            <?php
        }
    }

    ActualizarEstadoAsamblea($conexion, $idasamblea, $accion);
    //$conexion->close();
}
?>
