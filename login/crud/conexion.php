<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'quiz_app';

//Crear la conexion a la base de datos
$conexion = new mysqli($servername,$username,$password,$dbname);

//Verificar la conexion
if($conexion->connect_error){
  die("Conexion fallida: ").$conexion->connect_error;
}

?>