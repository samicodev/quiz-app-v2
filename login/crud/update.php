<?php
include 'conexion.php';

// Manejo de la solicitud GET para mostrar el formulario de actualización
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM preguntas WHERE id=$id";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontró la pregunta.";
        exit;
    }
}

// Manejo de la solicitud POST para actualizar los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $pregunta = $_POST["pregunta"];
    $opciones = json_encode($_POST["opciones"]);
    $respuestaCorrecta = $_POST["respuestaCorrecta"] - 1;

    $sql = "UPDATE preguntas SET pregunta='$pregunta', opciones='$opciones', respuestaCorrecta='$respuestaCorrecta' WHERE id=$id";

    if ($conexion->query($sql) === TRUE) {
        echo "Pregunta actualizada con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
    echo '<br><a href="read.php">Volver a la lista de preguntas</a>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
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
    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="pregunta">Pregunta:</label>
        <input type="text" name="pregunta" id="pregunta" value="<?php echo $row['pregunta']; ?>" required><br>

        <?php
        $opciones = json_decode($row['opciones']);
        for ($i = 0; $i < count($opciones); $i++) {
            echo "<label for='opcion$i'>Opción " . ($i + 1) . ":</label>
                  <input type='text' name='opciones[]' id='opcion$i' value='$opciones[$i]' required><br>";
        }
        ?>

        <label for="respuestaCorrecta">Respuesta Correcta (Número de Opción):</label>
        <input type="number" name="respuestaCorrecta" id="respuestaCorrecta" value="<?php echo $row['respuestaCorrecta'] + 1; ?>" min="1" max="4" required><br>

        <input type="submit" value="Actualizar Pregunta">
        <a href="read.php">Volver a la lista de preguntas</a>
    </form>
</body>
</html>
