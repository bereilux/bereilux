<?php
const HOST = 'localhost';
const DBNAME = 'umerida';
const USERNAME = 'root';
const PASSWORD = '123456789';

try {
    $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USERNAME, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['clave_maestro'], $_POST['clave_a_modificar'], $_POST['nuevo_nombres'], $_POST['nuevo_rfc'])) 
    
    {
        $clave_maestro = $_POST['clave_maestro'];
        $clave_a_modificar = $_POST['clave_a_modificar'];
        $nuevo_nombres = $_POST['nuevo_nombres'];
        $nuevo_rfc= $_POST['nuevo_rfc'];

        // Verifica si la clave maestra existe
        $stmt = $pdo->prepare("SELECT 1 FROM clave_maestro WHERE clave_maestro = :clave_maestro");
        $stmt->bindParam(':clave_maestro', $clave_maestro, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->fetch()) {
            // Actualiza los datos
            $sql = "UPDATE clave_maestro SET clave_maestro = :clave_maestro, nuevo_nombres = :nuevo_nombres, nuevo_rfc = :nuevo_rfc WHERE clave_maestro = :clave_maestro";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':clave_maestro', $clave_maestro, PDO::PARAM_INT);
            $stmt->bindParam(':nueva_clave', $nueva_clave, PDO::PARAM_STR);
            $stmt->bindParam(':nuevo_nombres', $nuevo_nombres, PDO::PARAM_STR);
            $stmt->bindParam(':nuevo_rfc', $nuevo_rfc, PDO::PARAM_STR);
            if ($stmt->execute()) {
                echo "clave con ID $clave_maestro modificada correctamente.";
            } else {
                echo "No se pudo modificar la clave con ID $clave_maestro.";
            }
        } else {
            echo "La clave maestro no existe.";
        }
    } else {
        echo "No se han proporcionado todos los datos necesarios para modificar la clave." . $pdo;
    }
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
} finally {
    $pdo = null;
}
?>