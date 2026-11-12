<?php
require_once "config/conexion.php";
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["guardar_equipo"])) {
    $nombre = trim($_POST["nombre"] ?? "");
    $descripcion = trim($_POST["descripcion"] ?? "");

    if ($nombre !== "" && $descripcion !== "") {
        $sql = "INSERT INTO equipos (nombre, descripcion) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $nombre, $descripcion);

        if ($stmt->execute()) {
            $mensaje = "Equipo registrado correctamente.";
        } else {
            $mensaje = "Error al registrar: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $mensaje = "Completa todos los campos.";
    }
}

$resultado = $conexion->query("SELECT id_equipo, nombre, descripcion FROM equipos ORDER BY id_equipo DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/validaciones.js" defer></script>
</head>
<body>
<header><h1>Módulo de equipos</h1></header>
<nav>
    <a href="index.php">Inicio</a><a href="usuarios.php">Usuarios</a>
    <a href="equipos.php">Equipos</a><a href="solicitudes.php">Solicitudes</a>
    <a href="seguimiento.php">Seguimiento</a>
</nav>
<main class="container">
    <?php if ($mensaje !== ""): ?><p class="alert"><?php echo htmlspecialchars($mensaje); ?></p><?php endif; ?>
    <section class="card">
        <h2>Registrar equipo</h2>
        <form method="POST" action="" data-validar>
            <label for="nombre">Nombre del equipo:</label>
            <input id="nombre" type="text" name="nombre" required maxlength="100">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
            <button type="submit" name="guardar_equipo">Guardar equipo</button>
        </form>
    </section>
    <section class="card">
        <h2>Lista de equipos</h2>
        <div class="table-wrap"><table>
            <tr><th>ID</th><th>Nombre</th><th>Descripción</th></tr>
            <?php while ($fila = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?php echo (int)$fila["id_equipo"]; ?></td>
                <td><?php echo htmlspecialchars($fila["nombre"]); ?></td>
                <td><?php echo htmlspecialchars($fila["descripcion"]); ?></td>
            </tr>
            <?php endwhile; ?>
        </table></div>
    </section>
</main>
<footer><p>Módulo de equipos</p></footer>
</body>
</html>
<?php $conexion->close(); ?>
