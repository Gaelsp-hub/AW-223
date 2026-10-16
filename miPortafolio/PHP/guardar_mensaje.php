<?php
require_once 'conexion.php';

// 1. Recibimos los datos del formulario (HTML)
$nombre  = $_POST['txtnombre'];
$correo  = $_POST['txtemail'];   
$mensaje = $_POST['txtmensaje']; 

// 2. Consulta SQL usando los nombres de tu base de datos (nombre, correo, mensaje)
$sqlInsert = "INSERT INTO mensajes (nombre, correo, mensaje) VALUES (?, ?, ?)";

// 3. Preparamos y vinculamos los parámetros
$stmt = $conexion->prepare($sqlInsert);

// "sss" indica que son 3 cadenas de texto (string, string, string)
// El orden DEBE ser exactamente: $nombre, $correo, $mensaje
$stmt->bind_param("sss", $nombre, $correo, $mensaje);

// 4. Ejecutamos la consulta
if ($stmt->execute()) {
    header("Location: ../index.html?status=success"); // Redirige a la página de inicio después de guardar el mensaje
} else {
    header("Location: ../index.html?status=error"); // Redirige a la página de inicio si hay un error
    
}
?>