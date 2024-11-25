<?php
// Configuración de la base de datos
$host = 'localhost'; 
$dbname = 'umerida'; 
$username = 'root'; 
$password = '123456789'; 

try {
    // Conexión PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Para manejar errores

    // Verifica si el ID de la venta está enviado
    if (isset($_POST['clave_maestro'])) {
        $clave_maestro = $_POST['clave_maestro'];

        // Preparamos la consulta para eliminar el registro
        $sql = "DELETE FROM maestros WHERE clave_maestro = :clave_maestro";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':clave_maestro', $clave_maestro, PDO::PARAM_INT);

        // Ejecutamos la consulta
        if ($stmt->execute()) {
            echo "Datos eliminados correctamente.";
        } else {
            echo "No se pudo eliminar la venta con ID $clave_maestro.";
        }
    } else {
        echo "No se ha proporcionado la clave del maestro para eliminar.";
    }
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
