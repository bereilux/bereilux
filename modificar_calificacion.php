<?php

// Establecer la conexión con la base de datos
$conexion = new mysqli("localhost", "root", "123456789", "umerida");

// Validar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si los datos están presentes en $_POST
if (isset($_POST['matricula'], $_POST['clave_materia'], $_POST['promedio'])) {

    $matricula = $_POST['matricula'];
    $clave_materia = $_POST['clave_materia'];
    $promedio = $_POST['promedio'];

    // Validar si la matrícula existe
    $sql = "SELECT matricula FROM alumnos WHERE matricula = '$matricula'";
    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        
        // Validar si la materia existe
        $sql_materia = "SELECT clave_materia FROM materias WHERE clave_materia = '$clave_materia'";
        $resultado_materia = $conexion->query($sql_materia);

        if ($resultado_materia && $resultado_materia->num_rows > 0) {

            // Realizar la actualización de la calificación
            $sql_update = "UPDATE calificaciones
                           SET promedio = '$promedio'
                           WHERE matricula = '$matricula' AND clave_materia = '$clave_materia'";
            
            if ($conexion->query($sql_update) === TRUE) {
                echo "Calificación actualizada correctamente.";
            } else {
                echo "Error al actualizar la calificación: " . $conexion->error;
            }

        } else {
            echo "La materia con clave '$clave_materia' no existe.";
        }

    } else {
        echo "La matrícula '$matricula' no existe.";
    }
} else {
    echo "Datos incompletos. Por favor, revisa el formulario.";
}

// Cerrar la conexión
$conexion->close();

?>
