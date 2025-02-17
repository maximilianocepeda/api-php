<?php
include 'conexion.php';

header('Content-Type: application/json'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    
    if (empty($nombre) || empty($email) || empty($telefono)) {
        echo json_encode(array("error" => "Todos los campos son obligatorios"));
        exit;
    }

   
    $sql = "INSERT INTO usuarios (nombre, email, telefono) VALUES ('$nombre', '$email', '$telefono')";

    if ($conexion->query($sql) === TRUE) {
        echo json_encode(array("mensaje" => "Usuario creado correctamente")); 
    } else {
        echo json_encode(array("error" => "Error al crear el usuario: " . $conexion->error)); 
    }
} else {
    echo json_encode(array("error" => "Método no permitido")); 
}

$conexion->close();
?> 