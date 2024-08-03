<?php
require_once 'login/crud/conexion.php';

// Ejecutar la consulta
$sql = "SELECT pregunta, opciones, respuestaCorrecta FROM preguntas";
$result = $conexion->query($sql);

$preguntas = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['opciones'] = json_decode($row['opciones'], true);
        $preguntas[] = $row;
    }
}

// Enviar los datos como JSON
// Se escapa el JSON para asegurarse de que el contenido esté correctamente formateado en JavaScript
$preguntasJson = json_encode($preguntas);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Preguntas y Respuestas</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="contenedor">
        <a href="login/index.php" id="link-login">Iniciar Sesión</a>
        <div class="info-juego">
            <p class="contador-preguntas">Pregunta <span id="numero-pregunta"></span> de <span id="total-preguntas"></span></p>
            <p id="puntaje">Puntaje: <span id="puntaje-final"></span></p>
        </div>
        <h1>Juego de Preguntas y Respuestas</h1>
        <p id="pregunta"></p>
        <div id="opciones">
            <!-- Lista de opciones para elegir -->
        </div>
        <div class="botones-navegacion">
            <button id="boton-siguiente" onclick="mostrarSiguientePregunta()">Siguiente</button>
            <button id="boton-reiniciar" onclick="reiniciarJuego()">Reiniciar</button>
        </div>
    </div>
    <script>
        // Array de objetos que contiene las preguntas del cuestionario desde la base de datos
        const preguntas = <?php echo $preguntasJson; ?>;
    </script>
    <script src="app.js"></script>
</body>

</html>