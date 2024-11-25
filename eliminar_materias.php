<?php

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "123456789", "umerida");

if ($conexion == TRUE) {
    // Recuperar la clave de la materia desde el formulario
    $clave_materia = $_POST['clave_materia'];

    // Verificar si la clave de la materia existe
    $sql = "SELECT clave_materia FROM materias WHERE clave_materia = '$clave_materia'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        // Si la materia existe, proceder a borrarla
        $sql_borrar = "DELETE FROM materias WHERE clave_materia = '$clave_materia'";

        if ($conexion->query($sql_borrar)) {
            echo "MATERIA BORRADA";
        } else {
            echo "ERROR AL BORRAR LA MATERIA: " . $conexion->error;
        }
    } else {
        // Si la clave de la materia no existe
        echo "LA MATERIA NO EXISTE EN LA BASE DE DATOS";
    }
} else {
    echo "ERROR DE CONEXIÓN A LA BASE DE DATOS";
}

// Cerrar la conexión
$conexion->close();

?>
