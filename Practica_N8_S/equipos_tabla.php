<?php
require_once 'conexion.php';
$equipos = $conexion->query("SELECT * FROM equipos ORDER BY id_equipo DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de equipos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header><h1>Equipos registrados</h1></header>
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
            <h2>Tabla de equipos</h2>
            <table>
                <tr><th>ID</th><th>Nombre del equipo</th><th>Descripción</th></tr>
                <?php while ($e = $equipos->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $e['id_equipo']; ?></td>
                        <td><?php echo htmlspecialchars($e['nombre_equipo']); ?></td>
                        <td><?php echo htmlspecialchars($e['descripcion']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
            <p><a href="equipos.php">Registrar otro equipo</a></p>
        </div>
    </div>
    <footer>
        <p>© 2026 Practica 8</p>
        <p>Práctica de Programación Web</p>
    </footer>
</body>
</html>
