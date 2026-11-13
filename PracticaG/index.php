
<?php
require_once 'conexion.php';

$mensaje = "";
$tipoMensaje = "";

if (isset($_POST['guardar_usuario'])) {

    $nombre = $conexion->real_escape_string(trim($_POST['nombre']));
    $correo = $conexion->real_escape_string(trim($_POST['correo']));

    $sql = "INSERT INTO usuarios (nombre, correo)
            VALUES ('$nombre', '$correo')";

    if ($conexion->query($sql)) {
        $mensaje = "Usuario registrado con éxito.";
        $tipoMensaje = "alert-success";
    } else {
        $mensaje = "Error al registrar: " . $conexion->error;
        $tipoMensaje = "alert-error";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar usuarios</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

<header>
    <h1>Tienda Web</h1>
    <h2>Bienvenidos</h2>
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
        <h2>Formulario de usuario</h2>

        <form action="" method="POST">

            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" required>
            </div>

            <div class="form-group">
                <label>Correo:</label>
                <input type="email" name="correo" required>
            </div>

            <button type="submit" name="guardar_usuario" class="btn-primary">
                Guardar usuario
            </button>

        </form>
    </div>

</div>

<footer>
    <p>Redes Sociales</p>
    <p>Practicas</p>
</footer>

</body>
</html>
