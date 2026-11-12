<?php
require_once 'conexion.php';
$mensaje = "";

if (isset($_POST['registrar_solicitud'])) {
    $id_usuario = intval($_POST['id_usuario']);
    $id_equipo = intval($_POST['id_equipo']);
    $desc = $conexion->real_escape_string(trim($_POST['descripcion_problema']));

    $sql = "INSERT INTO solicitudes (id_usuario, id_equipo, descripcion_problema, estado)
            VALUES ($id_usuario, $id_equipo, '$desc', 'Pendiente')";

    if ($conexion->query($sql)) {
        $mensaje = "Solicitud registrada correctamente.";
    } else {
        $mensaje = "Error: " . $conexion->error;
    }
}

$usuarios = $conexion->query("SELECT id_usuario, nombre FROM usuarios ORDER BY nombre ASC");
$equipos = $conexion->query("SELECT id_equipo, nombre_equipo FROM equipos ORDER BY nombre_equipo ASC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva solicitud</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header><h1>Nueva solicitud</h1></header>
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
        <?php if ($mensaje != ""): ?>
            <div class="alert-success"><?php echo htmlspecialchars($mensaje); ?></div>
        <?php endif; ?>
        <div class="card">
            <h2>Formulario de solicitud</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Seleccionar usuario:</label>
                    <select name="id_usuario" required>
                        <option value="">Elegir usuario...</option>
                        <?php while ($u = $usuarios->fetch_assoc()): ?>
                            <option value="<?php echo $u['id_usuario']; ?>"><?php echo htmlspecialchars($u['nombre']); ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Seleccionar equipo:</label>
                    <select name="id_equipo" required>
                        <option value="">Elegir equipo...</option>
                        <?php while ($e = $equipos->fetch_assoc()): ?>
                            <option value="<?php echo $e['id_equipo']; ?>"><?php echo htmlspecialchars($e['nombre_equipo']); ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Descripción del problema:</label>
                    <textarea name="descripcion_problema" rows="4" required></textarea>
                </div>
                <button type="submit" name="registrar_solicitud" class="btn-primary">Registrar solicitud</button>
            </form>
            <p><a href="solicitudes_tabla.php">Ver tabla de solicitudes</a></p>
        </div>
    </div>
    <footer>
        <p>© 2026 Practica 8</p>
        <p>Práctica de Programación Web</p>
    </footer>
</body>
</html>
