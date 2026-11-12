<?php
require_once 'conexion.php';
$usuarios = $conexion->query("SELECT * FROM usuarios ORDER BY id_usuario DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de usuarios</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header><h1>Usuarios registrados</h1></header>
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
            <h2>Tabla de usuarios</h2>
            <table>
                <tr><th>ID</th><th>Nombre</th><th>Correo</th></tr>
                <?php while ($u = $usuarios->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $u['id_usuario']; ?></td>
                        <td><?php echo htmlspecialchars($u['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($u['correo']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
            <p><a href="usuarios.php">Registrar otro usuario</a></p>
        </div>
    </div>
    <footer>
        <p>© 2026 Practica 8</p>
        <p>Práctica de Programación Web</p>
    </footer>
</body>
</html>
