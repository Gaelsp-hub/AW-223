<?php
require_once 'conexion.php';

$sql = "SELECT s.id_solicitud, u.nombre AS usuario, e.nombre_equipo AS equipo,
               s.descripcion_problema, s.estado
        FROM solicitudes s
        INNER JOIN usuarios u ON s.id_usuario = u.id_usuario
        INNER JOIN equipos e ON s.id_equipo = e.id_equipo
        ORDER BY s.id_solicitud DESC";

$solicitudes = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de solicitudes</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header><h1>Solicitudes registradas</h1></header>
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
            <h2>Tabla de solicitudes</h2>
            <table>
                <tr><th>ID</th><th>Usuario</th><th>Equipo</th><th>Descripción</th><th>Estado</th></tr>
                <?php while ($s = $solicitudes->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $s['id_solicitud']; ?></td>
                        <td><?php echo htmlspecialchars($s['usuario']); ?></td>
                        <td><?php echo htmlspecialchars($s['equipo']); ?></td>
                        <td><?php echo htmlspecialchars($s['descripcion_problema']); ?></td>
                        <td><?php echo htmlspecialchars($s['estado']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
            <p><a href="solicitudes.php">Registrar otra solicitud</a></p>
        </div>
    </div>
    <footer>
        <p>© 2026 Practica 8</p>
        <p>Práctica de Programación Web</p>
    </footer>
</body>
</html>
