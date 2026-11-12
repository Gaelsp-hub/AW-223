<?php
require_once 'conexion.php';
$mensaje = "";

if (isset($_POST['guardar_seguimiento'])) {
    $id_solicitud = intval($_POST['id_solicitud']);
    $nuevo_estado = $conexion->real_escape_string($_POST['estado']);
    $observaciones = $conexion->real_escape_string(trim($_POST['observaciones']));

    $actualizar = "UPDATE solicitudes SET estado = '$nuevo_estado'
                   WHERE id_solicitud = $id_solicitud";
    $conexion->query($actualizar);

    $insertar = "INSERT INTO seguimiento (id_solicitud, observaciones)
                 VALUES ($id_solicitud, '$observaciones')";

    if ($conexion->query($insertar)) {
        $mensaje = "Seguimiento guardado correctamente.";
    } else {
        $mensaje = "Error: " . $conexion->error;
    }
}

$solicitudes = $conexion->query("SELECT id_solicitud, estado FROM solicitudes ORDER BY id_solicitud DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar seguimiento</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header><h1>Registrar seguimiento</h1></header>
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
            <h2>Formulario de seguimiento</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Seleccionar solicitud:</label>
                    <select name="id_solicitud" required>
                        <option value="">Elegir solicitud...</option>
                        <?php while ($s = $solicitudes->fetch_assoc()): ?>
                            <option value="<?php echo $s['id_solicitud']; ?>">
                                Solicitud #<?php echo $s['id_solicitud']; ?> - (<?php echo htmlspecialchars($s['estado']); ?>)
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nuevo estado:</label>
                    <select name="estado" required>
                        <option value="Pendiente">Pendiente</option>
                        <option value="En proceso">En proceso</option>
                        <option value="Resuelta">Resuelta</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Observaciones:</label>
                    <textarea name="observaciones" rows="3" required></textarea>
                </div>
                <button type="submit" name="guardar_seguimiento" class="btn-primary">Guardar seguimiento</button>
            </form>
            <p><a href="seguimiento_tabla.php">Ver historial de seguimiento</a></p>
        </div>
    </div>
    <footer>
        <p>© 2026 Practica 8</p>
        <p>Práctica de Programación Web</p>
    </footer>
</body>
</html>
