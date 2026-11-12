<?php
require_once 'conexion.php';
$mensaje = "";

if (isset($_POST['guardar_equipo'])) {
    $nombre_eq = $conexion->real_escape_string(trim($_POST['nombre_equipo']));
    $desc_eq = $conexion->real_escape_string(trim($_POST['descripcion_equipo']));

    $sql = "INSERT INTO equipos (nombre_equipo, descripcion) VALUES ('$nombre_eq', '$desc_eq')";

    if ($conexion->query($sql)) {
        $mensaje = "Equipo registrado con éxito.";
    } else {
        $mensaje = "Error: " . $conexion->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar equipo</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header><h1>Registrar equipo</h1></header>
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
            <h2>Formulario de equipo</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Nombre del equipo:</label>
                    <input type="text" name="nombre_equipo" required>
                </div>
                <div class="form-group">
                    <label>Descripción:</label>
                    <textarea name="descripcion_equipo" rows="3" required></textarea>
                </div>
                <button type="submit" name="guardar_equipo" class="btn-primary">Guardar equipo</button>
            </form>
            <p><a href="equipos_tabla.php">Ver tabla de equipos</a></p>
        </div>
    </div>
    <footer>
        <p>© 2026 Practica 8</p>
        <p>Práctica de Programación Web</p>
    </footer>
</body>
</html>
