<?php
include("conexion.php");
$id = $_GET['id'];

// 1. Si se presionó "Actualizar", guardamos los cambios
if ($_POST) {
    $nombre  = $_POST['nombre'];
    $correo  = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    mysqli_query($conexion, "UPDATE mensajes SET nombre='$nombre', correo='$correo', mensaje='$mensaje' WHERE id=$id");
    header("Location: admin.php");
    exit();
}

// 2. Consultamos los datos actuales para mostrarlos en los inputs
$resultado = mysqli_query($conexion, "SELECT * FROM mensajes WHERE id=$id");
$datos = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mensaje</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

    <header>
        <h1>Editar Mensaje</h1>
    </header>

    <nav>
        <a href="admin.php">🔙 Volver a Admin</a>
    </nav>

    <main>
        <section>
            <form method="POST">
                <label>Nombre</label>
                <input type="text" name="nombre" value="<?php echo $datos['nombre']; ?>" required>

                <label>Correo</label>
                <input type="email" name="correo" value="<?php echo $datos['correo']; ?>" required>

                <label>Mensaje</label>
                <textarea name="mensaje" rows="4" required><?php echo $datos['mensaje']; ?></textarea>

                <button type="submit">Actualizar Mensaje</button>
            </form>
        </section>
    </main>

</body>
</html>