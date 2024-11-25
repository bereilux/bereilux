<?php

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "123456789", "umerida");

// Verificar si la conexión es exitosa
if ($conexion->connect_error) {
    die("ERROR DE CONEXIÓN A LA BASE DE DATOS: " . $conexion->connect_error);
}

// Verificar si se recibió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recuperar los datos del formulario
    $matricula = $_POST['matricula'];
    $clave_materia = $_POST['clave_materia'];

    // Verificar si la calificación existe en la base de datos
    $sql = "SELECT * FROM calificaciones WHERE matricula = '$matricula' AND clave_materia = '$clave_materia'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        // Si la calificación existe, proceder a borrarla
        $sql_borrar = "DELETE FROM calificaciones WHERE matricula = '$matricula' AND clave_materia = '$clave_materia'";

        if ($conexion->query($sql_borrar)) {
            echo "CALIFICACIÓN ELIMINADA EXITOSAMENTE";
        } else {
            echo "ERROR AL ELIMINAR LA CALIFICACIÓN: " . $conexion->error;
        }
    } else {
        // Si no se encuentra la calificación
        echo "LA CALIFICACIÓN NO EXISTE PARA EL ESTUDIANTE Y LA MATERIA INDICADOS";
    }
}

// Cerrar la conexión
$conexion->close();

?>
