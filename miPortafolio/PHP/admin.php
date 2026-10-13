<?php
$tituloPagina = "Zona Administración";
$subtitulo = "Mensajes Recibidos";

// Arreglo dinámico de mensajes
$mensajes = [
    [
        "id" => 1,
        "nombre" => "Ana",
        "correo" => "ana@example.com",
        "mensaje" => "Hola, me interesa tu portafolio."
    ],
    [
        "id" => 2,
        "nombre" => "José",
        "correo" => "jose@example.com",
        "mensaje" => "Quisiera más información sobre tus proyectos."
    ]
];
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

    <!-- Encabezado Admin -->
    <header>
        <h1><?php echo $tituloPagina; ?></h1>
        <p><?php echo $subtitulo; ?></p>
    </header>

    <!-- Ícono de regreso al portafolio -->
    <div class="bar-iconos">
        <a href="../index.html" title="Volver al Portafolio">INICIO</a>
    </div>

    <!-- Contenido principal -->
    <main>
        <div class="contenedor-admin">
            <h2><?php echo $subtitulo; ?></h2>

            <table class="tabla-admin">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Mensaje</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mensajes as $msg): ?>
                        <tr>
                            <td><?php echo $msg['id']; ?></td>
                            <td><?php echo $msg['nombre']; ?></td>
                            <td><?php echo $msg['correo']; ?></td>
                            <td><?php echo $msg['mensaje']; ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $msg['id']; ?>" class="acciones-icono" title="Editar">✏️</a>
                                <a href="#" class="acciones-icono" title="Borrar">🗑️</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Pie de página -->
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Mi Portafolio</p>
        <p>Práctica de Programación Web</p>
    </footer>

</body>
</html>