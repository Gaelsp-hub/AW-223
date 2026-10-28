<?php
require_once 'conexion.php';
$mensaje = "";

if (isset($_POST['guardar_usuario'])) {
    $nombre = $conexion->real_escape_string(trim($_POST['nombre']));
    $correo = $conexion->real_escape_string(trim($_POST['correo']));
    $sql = "INSERT INTO usuarios (nombre, correo) VALUES ('$nombre', '$correo')";
    $mensaje = $conexion->query($sql) ? "Usuario registrado con éxito." : "Error: " . $conexion->error;
}

$usuarios = $conexion->query("SELECT * FROM usuarios ORDER BY id_usuario DESC");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Módulo Usuarios</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header><h1>Módulo Usuarios</h1></header>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="usuarios.php">Módulo Usuarios</a>
        <a href="equipos.php">Módulo Equipo</a>
        <a href="solicitudes.php">Módulo Solicitudes</a>
        <a href="seguimiento.php">Módulo Seguimiento</a>
    </nav>

    <div class="container">
        <?php if ($mensaje): ?><div class="alert-success"><?php echo $mensaje; ?></div><?php endif; ?>

        <div class="grid">
            <!-- Registrar Usuario -->
            <div>
                <div class="card">
                    <h2>Registrar Usuario</h2>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label>Correo:</label>
                            <input type="email" name="correo" required>
                        </div>
                        <button type="submit" name="guardar_usuario" class="btn-primary">Guardar Usuario</button>
                    </form>
                </div>
                <div class="card">
                    <h2>Lista de Usuarios</h2>
                    <table>
                        <tr><th>ID</th><th>Nombre</th><th>Correo</th></tr>
                        <?php while($u = $usuarios->fetch_assoc()): ?>
                            <tr><td><?php echo $u['id_usuario']; ?></td><td><?php echo htmlspecialchars($u['nombre']); ?></td><td><?php echo htmlspecialchars($u['correo']); ?></td></tr>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>© 2026 Practica 8</p>
        <p>Práctica de Programación Web</p>
    </footer>
</body>
</html>