<?php
include("conexion.php");
$resultado = mysqli_query($conexion, "SELECT * FROM mensajes");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Mensajes</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

    <header>
        <h1>Admin - Mensajes</h1>
        <p>Mensajes recibidos</p>
    </header>

    <nav>
        <a href="../index.php">🏠 Volver al Portafolio</a>
    </nav>

    <main>
        <section>
            <h2>Lista de Mensajes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                        <tr>
                            <td><?php echo $fila['nombre']; ?></td>
                            <td><?php echo $fila['correo']; ?></td>
                            <td><?php echo $fila['mensaje']; ?></td>
                            <td><?php echo $fila['fecha']; ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $fila['id']; ?>">✏️</a>
                                <a href="borrar.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Eliminar este mensaje?');">🗑️</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>

</body>
</html>