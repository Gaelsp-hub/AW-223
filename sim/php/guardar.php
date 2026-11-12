<?php
include("conexion.php");

$nombre  = $_POST['nombre'];
$correo  = $_POST['correo'];
$mensaje = $_POST['mensaje'];

$sql = "INSERT INTO mensajes (nombre, correo, mensaje) VALUES ('$nombre', '$correo', '$mensaje')";

if (mysqli_query($conexion, $sql)) {
    echo "<script>
            alert('Mensaje guardado correctamente');
            window.location = '../index.php';
          </script>";
} else {
    echo "Error al guardar: " . mysqli_error($conexion);
}
?>