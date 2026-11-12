<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Portafolio</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <header>
        <h1>Mi Portafolio</h1>
        <p>Bienvenido a mi sitio web personal</p>
    </header>

    <nav>
        <a href="#inicio">Inicio</a>
        <a href="#sobre-mi">Sobre mí</a>
        <a href="#habilidades">Habilidades</a>
        <a href="#proyectos">Proyectos</a>
        <a href="#contacto">Contacto</a>
        <a href="php/admin.php">Admin</a>
    </nav>

    <main>
        <section id="inicio" class="centrado">
            <h2>Hola, Soy Gael</h2>
            <p>Soy Estudiante de la UPQ y estoy en TIID</p>
            <a class="boton" href="#proyectos">Ver mis Proyectos</a>
        </section>

        <section id="sobre-mi">
            <h2>Sobre Mí</h2>
            <div class="fila">
                <img src="css/diamante.jpg" alt="Foto sobre mí" class="foto-perfil">
                <div>
                    <p>Algo sobre mi imagen</p>
                    <p>En esta práctica estoy aprendiendo HTML, CSS, PHP y MySQL.</p>
                </div>
            </div>
        </section>

        <section id="habilidades">
            <h2>Mis Habilidades</h2>
            <ul class="lista-habilidades">
                <li>Java</li>
                <li>Scratch</li>
                <li>PSeInt</li>
                <li>Packet Tracer</li>
                <li>MySQL</li>
            </ul>
        </section>

        <section id="proyectos">
            <h2>Mis Proyectos</h2>
            <div class="fila">
                <article class="tarjeta">
                    <h3>Sistema de control y monitoreo de luz</h3>
                    <p>Descripción del sistema.</p>
                    <a href="#">Ver Proyecto</a>
                </article>
                <article class="tarjeta">
                    <h3>Proyecto 2</h3>
                    <p>Descripción del sistema.</p>
                    <a href="#">Ver Proyecto</a>
                </article>
            </div>
        </section>

        <section id="contacto">
            <h2>Contacto</h2>
            <form action="php/guardar.php" method="POST">
                <label>Nombre</label>
                <input type="text" name="nombre" placeholder="Escribe tu nombre" required>

                <label>Correo electrónico</label>
                <input type="email" name="correo" placeholder="ejemplo@correo.com" required>

                <label>Mensaje</label>
                <textarea name="mensaje" rows="4" placeholder="Escribe tu mensaje" required></textarea>

                <button type="submit">Enviar mensaje</button>
            </form>
        </section>
    </main>

    <footer>
        <p>© 2026 Mi Portafolio - Práctica de Programación Web</p>
    </footer>

</body>
</html>