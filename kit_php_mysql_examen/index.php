<?php
$titulo = "Sistema de soporte técnico";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Soporte técnico</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<header>
    <h1><?php echo htmlspecialchars($titulo); ?></h1>
    <p>Panel principal</p>
</header>
<nav>
    <a href="index.php">Inicio</a>
    <a href="usuarios.php">Usuarios</a>
    <a href="equipos.php">Equipos</a>
    <a href="solicitudes.php">Solicitudes</a>
    <a href="seguimiento.php">Seguimiento</a>
</nav>
<main class="container">
    <h2>Bienvenido</h2>
    <p>Selecciona un módulo para registrar, consultar o actualizar información.</p>
    <div class="cards">
        <a class="card link-card" href="usuarios.php"><h3>Usuarios</h3><p>Registrar y consultar usuarios.</p></a>
        <a class="card link-card" href="equipos.php"><h3>Equipos</h3><p>Registrar y consultar equipos.</p></a>
        <a class="card link-card" href="solicitudes.php"><h3>Solicitudes</h3><p>Crear solicitudes de soporte.</p></a>
        <a class="card link-card" href="seguimiento.php"><h3>Seguimiento</h3><p>Actualizar estado y observaciones.</p></a>
    </div>
</main>
<footer><p>Práctica de Programación Web — Kit de estudio</p></footer>
</body>
</html>
