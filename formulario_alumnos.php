<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Alumnos</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #fbeefb; /* Fondo suave rosado claro */
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #ec407a; /* Rosado brillante */
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            color: #777;
            margin-bottom: 40px;
        }

        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
        }

        td:first-child {
            text-align: right;
            font-weight: bold;
        }

        input[type="text"], input[type="submit"], input[type="button"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #f1c0c6; /* Borde rosado suave */
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"], input[type="button"] {
            background-color: #f06292; /* Rosado suave */
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #ec407a; /* Rosado más fuerte en hover */
        }

        .hidden-form {
            display: none;
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .hidden-form h2 {
            margin-top: 0;
            font-size: 20px;
            color: #ec407a; /* Título con rosado brillante */
        }

        .btn-group {
            text-align: center;
        }

        .btn-group input {
            width: auto;
            margin: 10px 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestión de Alumnos</h1>
        <p>Administra la información de los estudiantes de manera sencilla.</p>

        <!-- Formulario principal -->
        <form action="GUARDADATOSALUMNOS.php" method="post">
            <table>
                <tr>
                    <td><label for="matricula">Matrícula:</label></td>
                    <td><input id="matricula" type="text" name="matricula" required></td>
                </tr>
                <tr>
                    <td><label for="nombres">Nombre:</label></td>
                    <td><input id="nombres" type="text" name="nombres" required></td>
                </tr>
                <tr>
                    <td><label for="apellido_paterno">Apellido Paterno:</label></td>
                    <td><input id="apellido_paterno" type="text" name="apellido_paterno" required></td>
                </tr>
            </table>
            <div class="btn-group">
                <input type="submit" value="Registrar datos">
                <input type="button" value="Eliminar datos" onclick="showDeleteForm()">
                <input type="button" value="Modificar datos" onclick="showModifyForm()">
            </div>
        </form>

        <!-- Formulario de eliminación -->
        <div id="deleteForm" class="hidden-form">
            <h2>Eliminar Alumno</h2>
            <form action="eliminar_alumnos.php" method="POST">
                <label for="deleteID">Matrícula del Alumno:</label>
                <input type="text" id="deleteID" name="matricula" required>
                <input type="submit" value="Eliminar">
            </form>
        </div>

        <!-- Formulario de modificación -->
        <div id="modifyForm" class="hidden-form">
            <h2>Modificar Información</h2>
            <form action="modificar_alumnos.php" method="POST">
                <label for="modMatricula">Matrícula:</label>
                <input type="text" id="modMatricula" name="matricula" required>
                <label for="nuevoNombre">Nuevo Nombre:</label>
                <input type="text" id="nuevoNombre" name="nuevo_nombres" required>
                <label for="nuevoApellido">Nuevo Apellido:</label>
                <input type="text" id="nuevoApellido" name="nuevo_apellido" required>
                <input type="submit" value="Modificar">
            </form>
        </div>
    </div>

    <script>
        function showDeleteForm() {
            document.getElementById("deleteForm").style.display = "block";
            document.getElementById("modifyForm").style.display = "none";
        }

        function showModifyForm() {
            document.getElementById("modifyForm").style.display = "block";
            document.getElementById("deleteForm").style.display = "none";
        }
    </script>
</body>
</html>
