<?php
include 'conexion.php';

header('Content-Type: application/json'); 

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM usuarios WHERE id = $id";

    if ($conexion->query($sql) === TRUE) {
        echo json_encode(array("mensaje" => "Usuario eliminado correctamente")); 
    } else {
        echo json_encode(array("error" => "Error al eliminar el usuario: " . $conexion->error)); 
    }
} else {
    echo json_encode(array("error" => "Método no permitido o ID no proporcionado")); 
}

$conexion->close();
?> 