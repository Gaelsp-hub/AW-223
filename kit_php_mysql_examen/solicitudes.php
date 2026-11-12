<?php
require_once "config/conexion.php";
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["guardar_solicitud"])) {
    $id_usuario = (int)($_POST["id_usuario"] ?? 0);
    $id_equipo = (int)($_POST["id_equipo"] ?? 0);
    $descripcion = trim($_POST["descripcion"] ?? "");

    if ($id_usuario > 0 && $id_equipo > 0 && $descripcion !== "") {
        $sql = "INSERT INTO solicitudes (id_usuario, id_equipo, descripcion) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("iis", $id_usuario, $id_equipo, $descripcion);

        if ($stmt->execute()) {
            $mensaje = "Solicitud registrada con estado Pendiente.";
        } else {
            $mensaje = "Error al registrar: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $mensaje = "Selecciona un usuario, un equipo y escribe la descripción.";
    }
}

$usuarios = $conexion->query("SELECT id_usuario, nombre FROM usuarios ORDER BY nombre");
$equipos = $conexion->query("SELECT id_equipo, nombre FROM equipos ORDER BY nombre");

$sqlLista = "SELECT s.id_solicitud, u.nombre AS usuario, e.nombre AS equipo,
                    s.descripcion, s.estado, s.fecha_creacion
             FROM solicitudes s
             INNER JOIN usuarios u ON s.id_usuario = u.id_usuario
             INNER JOIN equipos e ON s.id_equipo = e.id_equipo
             ORDER BY s.id_solicitud DESC";
$solicitudes = $conexion->query($sqlLista);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/validaciones.js" defer></script>
</head>
<body>
<header><h1>Módulo de solicitudes</h1></header>
<nav>
    <a href="index.php">Inicio</a><a href="usuarios.php">Usuarios</a>
    <a href="equipos.php">Equipos</a><a href="solicitudes.php">Solicitudes</a>
    <a href="seguimiento.php">Seguimiento</a>
</nav>
<main class="container">
    <?php if ($mensaje !== ""): ?><p class="alert"><?php echo htmlspecialchars($mensaje); ?></p><?php endif; ?>
    <section class="card">
        <h2>Crear solicitud</h2>
        <form method="POST" action="" data-validar>
            <label for="id_usuario">Usuario:</label>
            <select id="id_usuario" name="id_usuario" required>
                <option value="">Selecciona un usuario</option>
                <?php while ($u = $usuarios->fetch_assoc()): ?>
                    <option value="<?php echo (int)$u["id_usuario"]; ?>"><?php echo htmlspecialchars($u["nombre"]); ?></option>
                <?php endwhile; ?>
            </select>

            <label for="id_equipo">Equipo:</label>
            <select id="id_equipo" name="id_equipo" required>
                <option value="">Selecciona un equipo</option>
                <?php while ($e = $equipos->fetch_assoc()): ?>
                    <option value="<?php echo (int)$e["id_equipo"]; ?>"><?php echo htmlspecialchars($e["nombre"]); ?></option>
                <?php endwhile; ?>
            </select>

            <label for="descripcion">Descripción del problema:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
            <button type="submit" name="guardar_solicitud">Guardar solicitud</button>
        </form>
    </section>
    <section class="card">
        <h2>Solicitudes registradas</h2>
        <div class="table-wrap"><table>
            <tr><th>ID</th><th>Usuario</th><th>Equipo</th><th>Descripción</th><th>Estado</th><th>Fecha</th></tr>
            <?php while ($s = $solicitudes->fetch_assoc()): ?>
            <tr>
                <td><?php echo (int)$s["id_solicitud"]; ?></td>
                <td><?php echo htmlspecialchars($s["usuario"]); ?></td>
                <td><?php echo htmlspecialchars($s["equipo"]); ?></td>
                <td><?php echo htmlspecialchars($s["descripcion"]); ?></td>
                <td><?php echo htmlspecialchars($s["estado"]); ?></td>
                <td><?php echo htmlspecialchars($s["fecha_creacion"]); ?></td>
            </tr>
            <?php endwhile; ?>
        </table></div>
    </section>
</main>
<footer><p>Módulo de solicitudes</p></footer>
</body>
</html>
<?php $conexion->close(); ?>
