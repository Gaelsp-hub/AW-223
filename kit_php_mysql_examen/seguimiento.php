<?php
require_once "config/conexion.php";
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["actualizar_solicitud"])) {
    $id = (int)($_POST["id_solicitud"] ?? 0);
    $estado = $_POST["estado"] ?? "";
    $observacion = trim($_POST["observacion"] ?? "");
    $estadosPermitidos = ["Pendiente", "En proceso", "Resuelta"];

    if ($id > 0 && in_array($estado, $estadosPermitidos, true)) {
        $sql = "UPDATE solicitudes SET estado = ?, observacion = ? WHERE id_solicitud = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssi", $estado, $observacion, $id);

        if ($stmt->execute() && $stmt->affected_rows >= 0) {
            $mensaje = "Solicitud actualizada.";
        } else {
            $mensaje = "Error al actualizar: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $mensaje = "Selecciona una solicitud y un estado válido.";
    }
}

$sql = "SELECT s.id_solicitud, u.nombre AS usuario, e.nombre AS equipo,
               s.descripcion, s.estado, s.observacion
        FROM solicitudes s
        INNER JOIN usuarios u ON s.id_usuario = u.id_usuario
        INNER JOIN equipos e ON s.id_equipo = e.id_equipo
        ORDER BY s.id_solicitud DESC";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguimiento</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<header><h1>Módulo de seguimiento</h1></header>
<nav>
    <a href="index.php">Inicio</a><a href="usuarios.php">Usuarios</a>
    <a href="equipos.php">Equipos</a><a href="solicitudes.php">Solicitudes</a>
    <a href="seguimiento.php">Seguimiento</a>
</nav>
<main class="container">
    <?php if ($mensaje !== ""): ?><p class="alert"><?php echo htmlspecialchars($mensaje); ?></p><?php endif; ?>
    <section class="card">
        <h2>Actualizar solicitudes</h2>
        <div class="table-wrap"><table>
            <tr><th>ID</th><th>Usuario</th><th>Equipo</th><th>Problema</th><th>Estado actual</th><th>Actualizar</th></tr>
            <?php while ($s = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?php echo (int)$s["id_solicitud"]; ?></td>
                <td><?php echo htmlspecialchars($s["usuario"]); ?></td>
                <td><?php echo htmlspecialchars($s["equipo"]); ?></td>
                <td><?php echo htmlspecialchars($s["descripcion"]); ?></td>
                <td><?php echo htmlspecialchars($s["estado"]); ?></td>
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="id_solicitud" value="<?php echo (int)$s["id_solicitud"]; ?>">
                        <select name="estado" required>
                            <option value="Pendiente" <?php echo $s["estado"] === "Pendiente" ? "selected" : ""; ?>>Pendiente</option>
                            <option value="En proceso" <?php echo $s["estado"] === "En proceso" ? "selected" : ""; ?>>En proceso</option>
                            <option value="Resuelta" <?php echo $s["estado"] === "Resuelta" ? "selected" : ""; ?>>Resuelta</option>
                        </select>
                        <textarea name="observacion" placeholder="Observación"><?php echo htmlspecialchars($s["observacion"] ?? ""); ?></textarea>
                        <button type="submit" name="actualizar_solicitud">Guardar cambios</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table></div>
    </section>
</main>
<footer><p>Módulo de seguimiento</p></footer>
</body>
</html>
<?php $conexion->close(); ?>
