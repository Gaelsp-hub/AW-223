<?php
require_once 'conexion.php';
$mensaje = "";

if (isset($_POST['guardar_equipo'])) {
    $nombre_eq = $conexion->real_escape_string(trim($_POST['nombre_equipo']));
    $desc_eq = $conexion->real_escape_string(trim($_POST['descripcion_equipo']));
    $sql = "INSERT INTO equipos (nombre_equipo, descripcion) VALUES ('$nombre_eq', '$desc_eq')";
    $mensaje = $conexion->query($sql) ? "Equipo registrado con éxito." : "Error: " . $conexion->error;
}


$equipos = $conexion->query("SELECT * FROM equipos ORDER BY id_equipo DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Módulo Equipo</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header><h1>Módulo Equipo</h1></header>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="usuarios.php">Módulo Usuarios</a>
        <a href="equipos.php">Módulo Equipo</a>
        <a href="solicitudes.php">Módulo Solicitudes</a>
        <a href="seguimiento.php">Módulo Seguimiento</a>
    </nav>

    <div class="container">
        <?php if ($mensaje): ?><div class="alert-success"><?php echo $mensaje; ?></div><?php endif; ?>

        

            <!-- Registrar Equipo -->
            <div>
                <div class="card">
                    <h2>Registrar Equipo</h2>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Nombre Equipo:</label>
                            <input type="text" name="nombre_equipo" required>
                        </div>
                        <div class="form-group">
                            <label>Descripción:</label>
                            <textarea name="descripcion_equipo" rows="3" required></textarea>
                        </div>
                        <button type="submit" name="guardar_equipo" class="btn-primary">Guardar Equipo</button>
                    </form>
                </div>
                <div class="card">
                    <h2>Lista de Equipos</h2>
                    <table>
                        <tr><th>ID</th><th>Nombre Equipo</th><th>Descripción</th></tr>
                        <?php while($e = $equipos->fetch_assoc()): ?>
                            <tr><td><?php echo $e['id_equipo']; ?></td><td><?php echo htmlspecialchars($e['nombre_equipo']); ?></td><td><?php echo htmlspecialchars($e['descripcion']); ?></td></tr>
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