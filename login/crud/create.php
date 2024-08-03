<?php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pregunta = $_POST["pregunta"];
    $opciones = json_encode($_POST["opciones"]);
    $respuestaCorrecta = $_POST["respuestaCorrecta"] -1;

    $sql = "INSERT INTO preguntas (pregunta, opciones, respuestaCorrecta) VALUES ('$pregunta', '$opciones', '$respuestaCorrecta')";

    if ($conexion->query($sql) === TRUE) {
        header("Location: read.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
            display: inline-block;
            margin-bottom: 20px;
        }

        a:hover {
            color: #0056b3;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-top: 10px;
            color: #333;
            text-align: left;
            width: 100%;
            max-width: 400px;
        }

        input[type="text"],
        input[type="number"] {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            max-width: 400px;
            outline: none;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
            margin-top: 20px;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <form method="post" action="create.php">
        <label for="pregunta">Pregunta:</label>
        <input type="text" name="pregunta" id="pregunta" required><br>

        <label for="opciones">Opciones:</label>
        <input type="text" name="opciones[]" required><br>
        <input type="text" name="opciones[]" required><br>
        <input type="text" name="opciones[]" required><br>
        <input type="text" name="opciones[]" required><br>

        <label for="respuestaCorrecta">Respuesta Correcta (Número de Opción):</label>
        <input type="number" id="miNumero" name="respuestaCorrecta" id="respuestaCorrecta" min="1" max="4" required>

        <input type="submit" value="Crear Pregunta">
        <a href="read.php">Regresar</a>
    </form>
</body>

</html>