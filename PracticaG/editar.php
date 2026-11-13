
<?php
require_once 'conexion.php';

$mensaje = "";
$tipoMensaje = "";

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    die("ID de usuario no válido.");
}

// Buscar usuario
$sql = "SELECT * FROM usuarios WHERE id_usuario = $id";
$resultado = $conexion->query($sql);

if (!$resultado || $resultado->num_rows == 0) {
    die("El usuario no existe.");
}

$usuario = $resultado->fetch_assoc();

// Actualizar usuario
if (isset($_POST['actualizar_usuario'])) {

    $nombre = $conexion->real_escape_string(trim($_POST['nombre']));
    $correo = $conexion->real_escape_string(trim($_POST['correo']));

    $sql = "UPDATE usuarios
            SET nombre = '$nombre', correo = '$correo'
            WHERE id_usuario = $id";

    if ($conexion->query($sql)) {

        $mensaje = "Usuario actualizado correctamente.";
        $tipoMensaje = "alert-success";

        // Volver a consultar los datos actualizados
        $resultado = $conexion->query("SELECT * FROM usuarios WHERE id_usuario = $id");
        $usuario = $resultado->fetch_assoc();

    } else {
        $mensaje = "Error al actualizar: " . $conexion->error;
        $tipoMensaje = "alert-error";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

<header>
    <h1>Tienda Web</h1>
    <h2>Editar usuario</h2>
</header>

<nav>
    <a href="index.php">Agregar usuarios</a>
    <a href="VerProducts.php">Ver usuarios</a>
</nav>

<div class="container">

    <?php if ($mensaje != ""): ?>
        <div class="<?php echo $tipoMensaje; ?>">
            <?php echo htmlspecialchars($mensaje); ?>
        </div>
    <?php endif; ?>

    <div class="card">

        <h2>Modificar información</h2>

        <form action="" method="POST">

            <div class="form-group">
                <label>ID:</label>
                <input type="text"
                       value="<?php echo $usuario['id_usuario']; ?>"
                       disabled>
            </div>

            <div class="form-group">
                <label>Nombre:</label>
                <input type="text"
                       name="nombre"
                       value="<?php echo htmlspecialchars($usuario['nombre']); ?>"
                       required>
            </div>

            <div class="form-group">
                <label>Correo:</label>
                <input type="email"
                       name="correo"
                       value="<?php echo htmlspecialchars($usuario['correo']); ?>"
                       required>
            </div>

            <button type="submit" name="actualizar_usuario" class="btn-primary">
                Actualizar usuario
            </button>

        </form>

        <br>

        <a href="VerProducts.php" class="btn btn-secondary">
            Regresar a la tabla
        </a>

    </div>

</div>

<footer>
    <p>Redes Sociales</p>
    <p>Practicas</p>
</footer>

</body>
</html>
