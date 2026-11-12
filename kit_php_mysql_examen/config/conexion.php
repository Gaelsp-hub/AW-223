<?php
// Cambia estos datos según el servidor MySQL que estés utilizando.
$host = "127.0.0.1";
$usuario = "root";
$contrasena = ""; // Escribe aquí tu contraseña de MySQL.
$base_datos = "soporte_tecnico";
$puerto = 3306; // XAMPP suele usar 3306. Tu MySQL independiente estaba en 3307.

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos, $puerto);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$conexion->set_charset("utf8mb4");
?>
