<?php
// 1. Define las variables que usas arriba
$tituloPagina = "Admin - Mensajes";
$subtitulo = "Mensajes recibidos";

// 2. Conexión y consulta
require "consulta_mensajes.php";
$rsMensajes = consultaMensajes();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tituloPagina; ?></title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

    <header>
        <h1><?php echo $tituloPagina; ?></h1>
        <p><?php echo $subtitulo; ?></p>
    </header>

    <div class="bar-iconos">
        <a href="../index.php" title="Volver al Portafolio">🏠</a>
    </div>

    <main>
        <div class="contenedor-admin">
            <h2><?php echo $subtitulo; ?></h2>

            <table class="tabla-admin">
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
                    <?php while ($arrMensajes = mysqli_fetch_array($rsMensajes)) { ?>
                        <tr>
                           <td><?php echo htmlspecialchars($arrMensajes['nombre']); ?></td>
                           <td><?php echo htmlspecialchars($arrMensajes['correo']); ?></td>
                           <td><?php echo htmlspecialchars($arrMensajes['mensaje']); ?></td>
                           <td><?php echo $arrMensajes['timesStaps']; ?></td>
                            <td>
                              <a href="editar.php?id=<?php echo $arrMensajes['id']; ?>" class="acciones-icono" title="Editar">✏️</a>
                              <a href="borrar.php?id=<?php echo $arrMensajes['id']; ?>" class="acciones-icono" title="Borrar" onclick="return confirm('¿Confirmas que deseas eliminar este mensaje?');">🗑️</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Mi Portafolio</p>
        <p>Práctica de Programación Web</p>
    </footer>

</body>
</html>