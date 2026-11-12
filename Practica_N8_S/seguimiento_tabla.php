<?php
require_once 'conexion.php';

$sql = "SELECT seg.id_seguimiento, seg.id_solicitud, seg.observaciones,
               seg.fecha, s.estado
        FROM seguimiento seg
        INNER JOIN solicitudes s ON seg.id_solicitud = s.id_solicitud
        ORDER BY seg.id_seguimiento DESC";

$historial = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de seguimiento</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header><h1>Historial de seguimiento</h1></header>
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
        <div class="card">
            <h2>Tabla de seguimiento</h2>
            <table>
                <tr><th>ID seguimiento</th><th>ID solicitud</th><th>Observaciones</th><th>Estado</th><th>Fecha</th></tr>
                <?php while ($h = $historial->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $h['id_seguimiento']; ?></td>
                        <td><?php echo $h['id_solicitud']; ?></td>
                        <td><?php echo htmlspecialchars($h['observaciones']); ?></td>
                        <td><?php echo htmlspecialchars($h['estado']); ?></td>
                        <td><?php echo htmlspecialchars($h['fecha']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
            <p><a href="seguimiento.php">Registrar otro seguimiento</a></p>
        </div>
    </div>
    <footer>
        <p>© 2026 Practica 8</p>
        <p>Práctica de Programación Web</p>
    </footer>
</body>
</html>
