<?php
require_once 'conexion.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM preguntas WHERE id=$id";

    if ($conexion->query($sql) === TRUE) {
        echo "Pregunta eliminada con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
} else {
    echo "ID no especificado.";
}
?>
<br><a href="read.php">Volver a la lista de preguntas</a>
