<?php
session_start();
require_once 'crud/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
  $nombre = $_POST['usuario'];
  $contrasenia = md5($_POST['contrasenia']);

  $sql = "SELECT * FROM usuarios WHERE nombre = '$nombre' AND contrasenia = '$contrasenia'";

  $resultado = $conexion->query($sql);

  if($resultado->num_rows > 0){
    $_SESSION['nombre'] = $nombre;
    header("Location: crud/read.php");
  }else{
    echo "Nombre de usuario o contraseña incorrectos";
  }

}

$conexion->close();

?>