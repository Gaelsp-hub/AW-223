<?php
require_once 'conexion.php';
$mensaje = "";

if (isset($_POST['guardar_usuario'])) {
    $nombre = $conexion->real_escape_string(trim($_POST['nombre']));
    $correo = $conexion->real_escape_string(trim($_POST['correo']));

    $sql = "INSERT INTO usuarios (nombre, correo) VALUES ('$nombre', '$correo')";

    if ($conexion->query($sql)) {
        $mensaje = "Usuario registrado con éxito.";
    } else {
        $mensaje = "Error: " . $conexion->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar usuario</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header><h1>Registrar usuario</h1></header>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="usuarios.php">Formulario usuarios</a>
        <a href="usuarios_tabla.php">Tabla usuarios</a>
        <a href="equipos.php">Formulario equipos</a>
        <a href="equipos_tabla.php">Tabla equipos</a>
        <a href="solicitudes.php">Formulario solicitudes</a>
        <a href="solicitudes_tabla.php">Tabla solicitudes</a>
        <a href="seguimiento.php">Formulario seguimiento</a>
        <a href="seguimiento_tabla.php">Tabla seguimiento</a>
    </nav>
    <div class="container">
        <?php if ($mensaje != ""): ?>
            <div class="alert-success"><?php echo htmlspecialchars($mensaje); ?></div>
        <?php endif; ?>

        <div class="card">
            <h2>Formulario de usuario</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" required>
                </div>
                <div class="form-group">
                    <label>Correo:</label>
                    <input type="email" name="correo" required>
                </div>
                <button type="submit" name="guardar_usuario" class="btn-primary">Guardar usuario</button>
            </form>
            <p><a href="usuarios_tabla.php">Ver tabla de usuarios</a></p>
        </div>
    </div>
    <footer>
        <p>© 2026 Practica 8</p>
        <p>Práctica de Programación Web</p>
    </footer>
</body>
</html>
