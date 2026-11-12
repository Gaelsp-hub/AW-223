<?php
include("conexion.php");
$id = $_GET['id'];

mysqli_query($conexion, "DELETE FROM mensajes WHERE id=$id");
header("Location: admin.php");
?>