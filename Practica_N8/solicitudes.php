<?php
require_once 'conexion.php';
$mensaje = "";

if (isset($_POST['registrar_solicitud'])) {
    $id_usuario = intval($_POST['id_usuario']);
    $id_equipo = intval($_POST['id_equipo']);
    $desc = $conexion->real_escape_string(trim($_POST['descripcion_problema']));

    $sql = "INSERT INTO solicitudes (id_usuario, id_equipo, descripcion_problema, estado) 
            VALUES ($id_usuario, $id_equipo, '$desc', 'Pendiente')";
    $mensaje = $conexion->query($sql) ? "Solicitud registrada correctamente." : "Error: " . $conexion->error;
}

$usuarios = $conexion->query("SELECT id_usuario, nombre FROM usuarios ORDER BY nombre ASC");
$equipos = $conexion->query("SELECT id_equipo, nombre_equipo FROM equipos ORDER BY nombre_equipo ASC");

$query_lista = "SELECT s.id_solicitud, u.nombre AS usuario, e.nombre_equipo AS equipo, s.descripcion_problema, s.estado
                FROM solicitudes s
                JOIN usuarios u ON s.id_usuario = u.id_usuario
                JOIN equipos e ON s.id_equipo = e.id_equipo
                ORDER BY s.id_solicitud DESC";
$lista_solicitudes = $conexion->query($query_lista);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Módulo Solicitudes</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header><h1>NUEVA SOLICITUD</h1></header>
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
            <h2>NUEVA SOLICITUD</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Seleccionar usuario:</label>
                    <select name="id_usuario" required>
                        <option value="">Elegir usuario...</option>
                        <?php while($u = $usuarios->fetch_assoc()): ?>
                            <option value="<?php echo $u['id_usuario']; ?>"><?php echo htmlspecialchars($u['nombre']); ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Seleccionar equipo:</label>
                    <select name="id_equipo" required>
                        <option value="">Elegir equipo...</option>
                        <?php while($e = $equipos->fetch_assoc()): ?>
                            <option value="<?php echo $e['id_equipo']; ?>"><?php echo htmlspecialchars($e['nombre_equipo']); ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Descripción del problema:</label>
                    <textarea name="descripcion_problema" rows="4" placeholder="Escriba el problema aquí" required></textarea>
                </div>

                <button type="submit" name="registrar_solicitud" class="btn-primary">REGISTRAR SOLICITUD</button>
            </form>
        </div>

        <div class="card">
            <h2>Solicitudes Registradas</h2>
            <table>
                <tr>
                    <th>ID Solicitud</th>
                    <th>Usuario</th>
                    <th>Equipo</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                </tr>
                <?php while($row = $lista_solicitudes->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id_solicitud']; ?></td>
                        <td><?php echo htmlspecialchars($row['usuario']); ?></td>
                        <td><?php echo htmlspecialchars($row['equipo']); ?></td>
                        <td><?php echo htmlspecialchars($row['descripcion_problema']); ?></td>
                        <td><strong><?php echo $row['estado']; ?></strong></td>
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