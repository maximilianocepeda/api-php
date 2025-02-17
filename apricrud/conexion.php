<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "apricrud_db";

$conexion = new mysqli($servidor, $usuario, $password, $basedatos);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>      