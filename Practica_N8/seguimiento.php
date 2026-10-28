// Lo realizo: GAEL<?php
require_once 'conexion.php';
$mensaje = "";

if (isset($_POST['guardar_seguimiento'])) {
    $id_solicitud = intval($_POST['id_solicitud']);
    $nuevo_estado = $conexion->real_escape_string($_POST['estado']);
    $observaciones = $conexion->real_escape_string(trim($_POST['observaciones']));

    // Actualiza el estado en solicitudes
    $conexion->query("UPDATE solicitudes SET estado = '$nuevo_estado' WHERE id_solicitud = $id_solicitud");

    // Guarda el registro en la tabla seguimiento
    $sql = "INSERT INTO seguimiento (id_solicitud, observaciones) VALUES ($id_solicitud, '$observaciones')";
    $mensaje = $conexion->query($sql) ? "Seguimiento actualizado correctamente." : "Error: " . $conexion->error;
}

$query_solicitudes = "SELECT s.id_solicitud, u.nombre AS usuario, e.nombre_equipo AS equipo, s.descripcion_problema, s.estado
                      FROM solicitudes s
                      JOIN usuarios u ON s.id_usuario = u.id_usuario
                      JOIN equipos e ON s.id_equipo = e.id_equipo
                      ORDER BY s.id_solicitud DESC";
$solicitudes = $conexion->query($query_solicitudes);

$query_historial = "SELECT seg.id_seguimiento, seg.id_solicitud, seg.observaciones, seg.fecha, s.estado 
                     FROM seguimiento seg
                     JOIN solicitudes s ON seg.id_solicitud = s.id_solicitud
                     ORDER BY seg.id_seguimiento DESC";
$historial = $conexion->query($query_historial);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Módulo Seguimiento</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header><h1>Módulo Seguimiento</h1></header>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="usuarios.php">Módulo Usuarios</a>
        <a href="equipos.php">Módulo Equipo</a>
        <a href="solicitudes.php">Módulo Solicitudes</a>
        <a href="seguimiento.php">Módulo Seguimiento</a>
    </nav>

    <div class="container">
        <?php if ($mensaje): ?><div class="alert-success"><?php echo $mensaje; ?></div><?php endif; ?>

        <div class="card" style="max-width: 600px; margin: 0 auto 30px auto;">
            <h2>Actualizar Seguimiento</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Seleccionar Solicitud ID:</label>
                    <select name="id_solicitud" required>
                        <option value="">Elegir solicitud...</option>
                        <?php 
                        $solicitudes_select = $conexion->query("SELECT id_solicitud, estado FROM solicitudes");
                        while($s = $solicitudes_select->fetch_assoc()): 
                        ?>
                            <option value="<?php echo $s['id_solicitud']; ?>">
                                Solicitud #<?php echo $s['id_solicitud']; ?> - (<?php echo $s['estado']; ?>)
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Nuevo Estado:</label>
                    <select name="estado" required>
                        <option value="Pendiente">Pendiente</option>
                        <option value="En proceso">En proceso</option>
                        <option value="Resuelta">Resuelta</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Observaciones:</label>
                    <textarea name="observaciones" rows="3" placeholder="Escriba las observaciones del servicio..." required></textarea>
                </div>

                <button type="submit" name="guardar_seguimiento" class="btn-primary">Guardar Seguimiento</button>
            </form>
        </div>

        <div class="card">
            <h2>Historial de Seguimiento</h2>
            <table>
                <tr>
                    <th>ID Seguimiento</th>
                    <th>ID Solicitud</th>
                    <th>Observaciones</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                </tr>
                <?php while($h = $historial->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $h['id_seguimiento']; ?></td>
                        <td>#<?php echo $h['id_solicitud']; ?></td>
                        <td><?php echo htmlspecialchars($h['observaciones']); ?></td>
                        <td><strong><?php echo $h['estado']; ?></strong></td>
                        <td><?php echo $h['fecha']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>

    <footer>
        <p>© 2026 Practica 8</p>
        <p>Práctica de Programación Web</p>
    </footer>
</body>
</html>