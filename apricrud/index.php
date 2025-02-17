<?php
include 'conexion.php';

header('Content-Type: application/json'); 

$sql = "SELECT * FROM usuarios";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $usuarios = array();
    while ($fila = $resultado->fetch_assoc()) {
        $usuarios[] = $fila;
    }
    echo json_encode($usuarios); 
} else {
    echo json_encode(array("mensaje" => "No hay usuarios registrados")); 
}

$conexion->close();
?> 