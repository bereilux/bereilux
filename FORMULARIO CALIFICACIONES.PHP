<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Calificaciones</title>
    <style>
        body {
            font-family: 'Merriweather', sans-serif;
            background-color: #fbeefb; /* Fondo suave rosado claro */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            padding-top: 40px; /* Espaciado superior */
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 550px;
            margin-top: 20px;
        }

        h2 {
            text-align: center;
            color: #ec407a; /* Rosado intenso */
            font-size: 28px;
        }

        label {
            font-size: 16px;
            color: #ec407a;
            display: block;
            margin-bottom: 8px;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 14px;
            border: 1px solid #f1c0c6; /* Borde rosado claro */
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        select:focus, input[type="text"]:focus {
            border-color: #f50057; /* Rosado brillante al hacer foco */
            outline: none;
        }

        button {
            width: 100%;
            padding: 14px;
            background-color: #f06292; /* Rosado suave */
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        button:hover {
            background-color: #ec407a; /* Rosado más fuerte en hover */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .hidden-form {
            display: none;
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #f1c0c6;
            border-radius: 8px;
            margin-top: 25px;
        }

        .form-buttons {
            margin-top: 30px;
            text-align: center;
        }

        .form-buttons button {
            width: 45%;
            margin: 10px 2%;
            font-size: 16px;
            padding: 12px;
            border-radius: 8px;
            background-color: #f06292;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-buttons button:hover {
            background-color: #ec407a;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Cambios para hacer la interfaz más responsiva en pantallas pequeñas */
        @media (max-width: 600px) {
            .form-container {
                padding: 20px;
            }

            button {
                padding: 14px;
                font-size: 14px;
            }

            .form-buttons button {
                width: 100%;
                margin: 10px 0;
            }
        }

    </style>
</head>
<body>

<div class="form-container">
    <!-- Formulario para Captura de Calificaciones -->
    <form action="guardar_calificacion.php" method="post">
        
        <!-- Alumno -->
        <div class="form-group">
            <label for="matricula">Alumno:</label>
            <select name="matricula" id="matricula" required>
                <?php
                $conn = new mysqli('localhost', 'root', '123456789', 'umerida');
                if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);
                
                $result = $conn->query("SELECT matricula, nombres FROM alumnos");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['matricula']}'>{$row['nombres']} (Matrícula: {$row['matricula']})</option>";
                }
                ?>
            </select>
        </div>

        <!-- Materia -->
        <div class="form-group">
            <label for="clave_materia">Materia:</label>
            <select name="clave_materia" id="clave_materia" required>
                <?php
                $result = $conn->query("SELECT clave_materia, nombre_materia FROM materias");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['clave_materia']}'>{$row['nombre_materia']}</option>";
                }
                ?>
            </select>
        </div>

        <!-- Maestro -->
        <div class="form-group">
            <label for="clave_maestro">Maestro:</label>
            <select name="clave_maestro" id="clave_maestro" required>
                <?php
                $result = $conn->query("SELECT clave_maestro, nombres, rfc FROM maestros");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['clave_maestro']}'>{$row['nombres']} (RFC: {$row['rfc']})</option>";
                }
                ?>
            </select>
        </div>

        <!-- Promedio -->
        <div class="form-group">
            <label for="promedio">Promedio:</label>
            <input type="text" name="promedio" id="promedio" required pattern="\d+(\.\d{1,2})?" placeholder="Ej. 8.5" />
        </div>

        <button type="submit">Guardar Calificación</button>
    </form>

    <!-- Sección para Eliminar Calificación -->
    <div class="hidden-form" id="deleteForm">
        <h2>Eliminar Calificación</h2>
        <form action="eliminarcalificacion.php" method="POST">
            <div class="form-group">
                <label for="deleteMatricula">Matrícula del Alumno:</label>
                <input type="text" id="deleteMatricula" name="matricula" required>
            </div>
            <div class="form-group">
                <label for="deleteClaveMateria">Clave de la Materia:</label>
                <input type="text" id="deleteClaveMateria" name="clave_materia" required>
            </div>
            <button type="submit">Eliminar Calificación</button>
        </form>
    </div>

    <!-- Sección para Modificar Calificación -->
    <div class="hidden-form" id="modifyForm">
        <h2>Modificar Calificación</h2>
        <form action="modificar_calificacion.php" method="POST">
            <div class="form-group">
                <label for="modifyMatricula">Matrícula del Alumno:</label>
                <input type="text" id="modifyMatricula" name="matricula" required>
            </div>
            <div class="form-group">
                <label for="modifyClaveMateria">Clave de la Materia:</label>
                <input type="text" id="modifyClaveMateria" name="clave_materia" required>
            </div>
            <div class="form-group">
                <label for="modifyPromedio">Nuevo Promedio:</label>
                <input type="text" id="modifyPromedio" name="promedio" required pattern="\d+(\.\d{1,2})?" placeholder="Ej. 9.0" />
            </div>
            <button type="submit">Modificar Calificación</button>
        </form>
    </div>

    <!-- Botones para mostrar los formularios -->
    <div class="form-buttons">
        <button onclick="showDeleteForm()">Eliminar Calificación</button>
        <button onclick="showModifyForm()">Modificar Calificación</button>
    </div>
</div>

<script>
    function showDeleteForm() {
        // botones
        document.getElementById("deleteForm").style.display = "block";
        document.getElementById("modifyForm").style.display = "none";
    }

    function showModifyForm() {
        // botones
        document.getElementById("modifyForm").style.display = "block";
        document.getElementById("deleteForm").style.display = "none";
    }
</script>

</body>
</html>
