<?php
require_once 'conexion.php';

session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM preguntas";
$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Read</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            height: 100vh;
            padding: 0 150px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-top: 20px;
        }

        p {
            color: #555;
            text-align: center;
        }

        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
            margin-right: 20px;
        }

        a:hover {
            color: #0056b3;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f8f8f8;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <h1>Bienvenido <?php echo $_SESSION['nombre'] ?></h1>
    <h2>Lista de Preguntas</h2>
    <a href="create.php">Nueva pregunta</a>
    <a href="../../index.php">Cerrar sesion</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Pregunta</th>
            <th>Opciones</th>
            <th>Respuesta Correcta</th>
            <th>Acciones</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pregunta = htmlspecialchars($row["pregunta"]);

                // Convertir JSON en un array y luego unir los elementos con comas
                $opcionesArray = json_decode($row["opciones"], true);
                $opciones = htmlspecialchars(implode(", ", $opcionesArray));

                $respuestaCorrecta = htmlspecialchars($row["respuestaCorrecta"] + 1); // Ajustar índice según el formato de respuesta
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $pregunta . "</td>
                        <td>" . $opciones . "</td>
                        <td>" . $respuestaCorrecta . "</td>
                        <td>
                            <a href='update.php?id=" . $row["id"] . "'>Editar</a>
                            <a href='delete.php?id=" . $row["id"] . "' onclick='return confirm(\"¿Estás seguro de eliminar esta pregunta?\")'>Eliminar</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay preguntas disponibles</td></tr>";
        }
        $conexion->close();
        ?>
    </table>
</body>

</html>