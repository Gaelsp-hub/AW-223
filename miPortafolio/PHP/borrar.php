<?php
require_once "conexion.php"; // Carga la conexión $conexion

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int)$_GET['id'];

    $stmt = $conexion->prepare("DELETE FROM mensajes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Redirige de nuevo a la lista
header("Location: admin.php");
exit();
?>