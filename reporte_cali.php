<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Calificaciones</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #ec407a; /* Color rosado para el título */
            padding: 20px;
            background-color: #fff;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background-color: #ec407a; /* Color de fondo para las cabeceras */
            color: white;
            font-size: 16px;
            font-weight: bold;
        }

        td {
            background-color: #fbeefb; /* Fondo rosado claro */
            border: 1px solid #f1c0c6; /* Borde suave de color rosado */
        }

        tr:nth-child(even) td {
            background-color: #f7d4e5; /* Fondo suave rosado para filas pares */
        }

        tr:hover {
            background-color: #f1c0c6; /* Fondo rosado más intenso al pasar el cursor */
        }

        table td, table th {
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <h1>Reporte de Calificaciones</h1>

    <table border="1">
        <tr>
            <th>Matricula</th>
            <th>Nombre Materia</th>
            <th>Calificación Final</th>
        </tr>
        <tr>
            <td>1</td>
            <td>MAT</td>
            <td>8</td>
        </tr>
        <tr>
            <td>3</td>
            <td>MAT</td>
            <td>9</td>
        </tr>
        <tr>
            <td>4</td>
            <td>MAT</td>
            <td>7</td>
        </tr>
        <tr>
            <td>5</td>
            <td>MAT</td>
            <td>10</td>
        </tr>
        <tr>
            <td>6</td>
            <td>MAT</td>
            <td>8</td>
        </tr>
    </table>

</body>
</html>
