<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Materias</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #fbeefb; /* Fondo suave rosado claro */
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            color: #ec407a; /* Rosado brillante */
            margin-bottom: 30px;
            font-size: 28px;
        }

        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin-bottom: 20px;
            transition: box-shadow 0.3s ease;
        }

        .form-container:hover {
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 12px 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #ec407a;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #f1c0c6; /* Borde rosado claro */
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #f50057; /* Rosado brillante al hacer foco */
            outline: none;
        }

        input[type="submit"], input[type="button"] {
            width: 100%;
            padding: 12px;
            background-color: #f06292; /* Rosado suave */
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 15px;
        }

        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #ec407a; /* Rosado más fuerte en hover */
        }

        .btn-group {
            text-align: center;
            margin-top: 20px;
        }

        .btn-group input {
            width: auto;
            margin: 10px 5px;
        }

        .action-section h3 {
            color: #ec407a;
            font-size: 22px;
            margin-bottom: 20px;
        }

        @media (max-width: 600px) {
            .form-container {
                width: 90%;
            }

            h1 {
                font-size: 24px;
            }

            input[type="text"], input[type="submit"] {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h1>Formulario de Materias</h1>

    <!-- Contenedor principal -->
    <div class="form-container">

        <!-- Formulario para registrar datos -->
        <form action="guardadatosdematerias.php" enctype="multipart/form-data" method="post">
            <table>
                <tr>
                    <td>
                        <label for="clave_materia">Clave de la materia:</label>
                    </td>
                    <td>
                        <input id="clave_materia" type="text" name="clave_materia" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nombre_materia">Nombre de la materia:</label>
                    </td>
                    <td>
                        <input id="nombre_materia" type="text" name="nombre_materia" required>
                    </td>
                </tr>
            </table>
            <div class="btn-group">
                <input type="submit" value="Registrar datos" name="ok" id="ok">
            </div>
        </form>

        <!-- Botones para eliminar y modificar -->
        <div class="btn-group">
            <input type="button" value="Eliminar Materia" onclick="showDeleteForm()">
            <input type="button" value="Modificar Materia" onclick="showModifyForm()">
        </div>

        <!-- Sección para eliminar datos -->
        <div id="deleteForm" class="hidden-form action-section" style="display:none;">
            <h3>Eliminar Materia</h3>
            <form action="eliminarmaterias.php" method="post">
                <label for="clave_materia_eliminar">Clave de la materia:</label>
                <input id="clave_materia_eliminar" type="text" name="clave_materia" required>
                <input type="submit" value="Eliminar">
            </form>
        </div>

        <!-- Sección para modificar datos -->
        <div id="modifyForm" class="hidden-form action-section" style="display:none;">
            <h3>Modificar Materia</h3>
            <form action="modificarmaterias.php" method="post">
                <label for="clave_materia_modificar">Clave de la materia:</label>
                <input id="clave_materia_modificar" type="text" name="clave_materia" required>
                <label for="nuevo_nombre_materia">Nuevo nombre de la materia:</label>
                <input id="nuevo_nombre_materia" type="text" name="nuevo_nombre_materia" required>
                <input type="submit" value="Modificar">
            </form>
        </div>

    </div> 

    <script>
        function showDeleteForm() {
            // Mostrar el formulario de eliminación
            document.getElementById("deleteForm").style.display = "block";
            document.getElementById("modifyForm").style.display = "none";
        }

        function showModifyForm() {
            // Mostrar el formulario de modificación
            document.getElementById("modifyForm").style.display = "block";
            document.getElementById("deleteForm").style.display = "none";
        }
    </script>
</body>
</html>
