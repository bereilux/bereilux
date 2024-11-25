<?php

$conexion = new mysqli("localhost", "root", "123456789", "umerida");

// Validar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si los datos están presentes en $_POST
if (isset($_POST['matricula'], $_POST['nuevo_nombres'], $_POST['nuevo_apellido'])) {

    $matricula = $_POST['matricula'];
    $nombre = $_POST['nuevo_nombres'];
    $apellido = $_POST['nuevo_apellido'];


    // Validar si existe la matricula existe
    $sql = "SELECT matricula FROM alumnos WHERE matricula = '$matricula'";
    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
       
        // Realizar la actualización
        $sql_update = "UPDATE alumnos 
                       SET nombres = '$nombre', apellido_paterno = '$apellido' 
                       WHERE matricula = '$matricula'";
                       
        if ($conexion->query($sql_update) === TRUE) {
            echo "Datos actualizados correctamente.";
        } else {
            echo "Error al actualizar los datos: " . $conexion->error;
        }
    }     else {
        echo "La clave del maestro no existe.";
}
} else {
    echo "Datos incompletos. Por favor, revisa el formulario.";
}

// Cerrar la conexión
$conexion->close();
?>