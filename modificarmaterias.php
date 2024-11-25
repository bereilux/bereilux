<?php

// Crear la conexión
$conexion = new mysqli("localhost", "root", "123456789", "umerida");

// Validar si hay error de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si los datos están presentes en $_POST
if (isset($_POST['clave_materia'], $_POST['nuevo_nombre_materia'])) {

    $clave_materia = $_POST['clave_materia'];
    $nuevo_nombre_materia = $_POST['nuevo_nombre_materia'];
    
    // Validar si existe la clave de la materia
    $sql = "SELECT clave_materia FROM materias WHERE clave_materia = '$clave_materia'";
    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        // Realizar la actualización
        $sql_update = "UPDATE materias 
                       SET nombre_materia = '$nuevo_nombre_materia'
                       WHERE clave_materia = '$clave_materia'";

        if ($conexion->query($sql_update) === TRUE) {
            echo "Datos actualizados correctamente.";
        } else {
            echo "Error al actualizar los datos: " . $conexion->error;
        }
    } else {
        echo "La clave de la materia no existe.";
    }
} else {
    echo "Datos incompletos. Por favor, revisa el formulario.";
}

// Cerrar la conexión
$conexion->close();

?>
