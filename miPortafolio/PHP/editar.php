<?php
require_once "conexion.php";

// 1. Validar que exista el ID en la URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: admin.php");
    exit();
}

$id = (int)$_GET['id'];

// 2. Procesar el formulario cuando se presiona "Actualizar Mensaje"
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre  = $_POST['nombre'];
    $correo  = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $stmt = $conexion->prepare("UPDATE mensajes SET nombre = ?, correo = ?, mensaje = ? WHERE id = ?");
    $stmt->bind_param("sssi", $nombre, $correo, $mensaje, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: admin.php");
    exit();
}

// 3. Consultar los datos actuales del registro
$stmt = $conexion->prepare("SELECT * FROM mensajes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$datos = $resultado->fetch_assoc();

if (!$datos) {
    header("Location: admin.php");
    exit();
}
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
        <h1>Zona Administración</h1>
        <p>Formulario para Editar</p>
    </header>

    <div class="bar-iconos">
        <a href="admin.php" title="Volver a Admin">🔙</a>
        <a href="../index.php" title="Volver al Portafolio">🏠</a>
    </div>

    <main>
        <div class="contenedor-admin">
            <h2>Editar Mensaje</h2>

            <form action="editar.php?id=<?php echo $id; ?>" method="POST">
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input 
                        type="text" 
                        id="nombre" 
                        name="nombre" 
                        value="<?php echo htmlspecialchars($datos['nombre']); ?>"
                        required
                    >
                </div>

                <div class="campo">
                    <label for="email">Correo electrónico</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="<?php echo htmlspecialchars($datos['correo']); ?>"
                        required
                    >
                </div>

                <div class="campo">
                    <label for="mensaje">Mensaje</label>
                    <textarea 
                        id="mensaje" 
                        name="mensaje" 
                        rows="5" 
                        required
                    ><?php echo htmlspecialchars($datos['mensaje']); ?></textarea>
                </div>

                <button type="submit">Actualizar Mensaje</button>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Mi Portafolio</p>
        <p>Práctica de Programación Web</p>
    </footer>

</body>
</html>