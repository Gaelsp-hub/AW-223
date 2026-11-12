<?php
require_once "config/conexion.php";
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["guardar_usuario"])) {
    $nombre = trim($_POST["nombre"] ?? "");
    $correo = trim($_POST["correo"] ?? "");

    if ($nombre !== "" && filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $sql = "INSERT INTO usuarios (nombre, correo) VALUES (?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $nombre, $correo);

        if ($stmt->execute()) {
            $mensaje = "Usuario registrado correctamente.";
        } else {
            $mensaje = "Error al registrar: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $mensaje = "Revisa el nombre y el formato del correo.";
    }
}

$resultado = $conexion->query("SELECT id_usuario, nombre, correo FROM usuarios ORDER BY id_usuario DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/validaciones.js" defer></script>
</head>
<body>
<header><h1>Módulo de usuarios</h1></header>
<nav>
    <a href="index.php">Inicio</a><a href="usuarios.php">Usuarios</a>
    <a href="equipos.php">Equipos</a><a href="solicitudes.php">Solicitudes</a>
    <a href="seguimiento.php">Seguimiento</a>
</nav>
<main class="container">
    <?php if ($mensaje !== ""): ?><p class="alert"><?php echo htmlspecialchars($mensaje); ?></p><?php endif; ?>
    <section class="card">
        <h2>Registrar usuario</h2>
        <form method="POST" action="" data-validar>
            <label for="nombre">Nombre:</label>
            <input id="nombre" type="text" name="nombre" required maxlength="100">
            <label for="correo">Correo:</label>
            <input id="correo" type="email" name="correo" required maxlength="150">
            <button type="submit" name="guardar_usuario">Guardar usuario</button>
        </form>
    </section>
    <section class="card">
        <h2>Lista de usuarios</h2>
        <div class="table-wrap"><table>
            <tr><th>ID</th><th>Nombre</th><th>Correo</th></tr>
            <?php while ($fila = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?php echo (int)$fila["id_usuario"]; ?></td>
                <td><?php echo htmlspecialchars($fila["nombre"]); ?></td>
                <td><?php echo htmlspecialchars($fila["correo"]); ?></td>
            </tr>
            <?php endwhile; ?>
        </table></div>
    </section>
</main>
<footer><p>Módulo de usuarios</p></footer>
</body>
</html>
<?php $conexion->close(); ?>
