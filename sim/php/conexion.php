<?php
$conexion = mysqli_connect("localhost", "root", "", "portafolio_db2");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>