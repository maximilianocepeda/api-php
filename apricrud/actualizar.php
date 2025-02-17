<?php
include 'conexion.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['id']) || empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['telefono'])) {
        echo json_encode(array("error" => "Todos los campos son obligatorios"));
        exit;
    }

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE usuarios SET nombre='$nombre', email='$email', telefono='$telefono' WHERE id=$id";

    if ($conexion->query($sql) === TRUE) {
        echo json_encode(array("mensaje" => "Usuario actualizado correctamente"));
    } else {
        echo json_encode(array("error" => "Error al actualizar el usuario: " . $conexion->error));
    }
} else {
    echo json_encode(array("error" => "Método no permitido"));
}

$conexion->close();
?>