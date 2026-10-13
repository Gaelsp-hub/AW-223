<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mensaje</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

    <!-- Encabezado Admin -->
    <header>
        <h1>Zona Administración</h1>
        <p>Formulario para Editar</p>
    </header>

    <!-- Íconos de regreso a la administración y al portafolio -->
    <div class="bar-iconos">
        <a href="admin.php" title="Volver a Admin">CANCELAR</a>
        <a href="../index.html" title="Volver al Portafolio">INICIO</a>
    </div>

    <!-- Contenido principal -->
    <main>
        <div class="contenedor-admin">
            <h2>Editar Mensaje</h2>

            <form action="admin.php" method="POST">
                <div class="campo">
                    <label for="nombre">Nombre</label>
                    <input 
                        type="text" 
                        id="nombre" 
                        name="nombre" 
                        placeholder="Escribe tu nombre"
                        value="Ana"
                        required
                    >
                </div>

                <div class="campo">
                    <label for="email">Correo electrónico</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="ejemplo@correo.com"
                        value="ana@example.com"
                        required
                    >
                </div>

                <div class="campo">
                    <label for="mensaje">Mensaje</label>
                    <textarea 
                        id="mensaje" 
                        name="mensaje" 
                        rows="5" 
                        placeholder="Escribe tu mensaje"
                        required
                    >Hola, me interesa tu portafolio.</textarea>
                </div>

                <button type="submit">Actualizar Mensaje</button>
            </form>
        </div>
    </main>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2026 Mi Portafolio</p>
        <p>Práctica de Programación Web</p>
    </footer>

</body>
</html>