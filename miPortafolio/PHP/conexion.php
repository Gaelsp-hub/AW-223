<?php

$servidor = "localhost";
$usuario = "root";
$password = "";
$baseDatos = "portafolio_db";

$conexion = new mysqli($servidor, $usuario, $password, $baseDatos);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
echo " ";